<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 300);

use Illuminate\Http\Request;
use Validator;

use App\Models\Unidad;
use App\Models\Aeronave;
use App\Models\Ata;
use App\Models\Cluster;
use App\Models\Empresa;
use App\Models\ClusterAfiliado;
use App\Models\DemandaPotencial;
use App\Models\DemandaPotencialConsumoRotacion;
use App\Models\DemandaPotencialFactibilidadTecnica;
use App\Models\DemandaPotencialPrioridadUma;
use App\Models\DemandaPotencialValoracionEconomica;
use App\Models\DemandaPotencialValoracionTecnica;
use App\Models\DemandaPotencialOfertaAeronautica;
use App\Models\Permiso;

class DemandaPotencialController extends Controller
{
    public function index(){
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $demandaspotenciales= DemandaPotencial::where('Activo',1)->get();

        return view ('certificacion.productosAeronauticos.demandapotencial.ver_tablas_demandapotencial')
                ->with('demandaspotenciales', $demandaspotenciales)->with('permiso', $permiso);
    }

    public function deleteValoracionTecnica($idvaloraciontecnica){
        $record = \DB::table('AU_Reg_DemandaPotencialValoracionTecnica')->where('IdValoracionTecnica', $idvaloraciontecnica)->delete();
        return response()->json($record);
    }
    public function deleteValoracionEconomica($idvaloracioneconomica){
        $record = \DB::table('AU_Reg_DemandaPotencialValoracionEconomica')->where('IdValoracionEconomica', $idvaloracioneconomica)->delete();
        return response()->json($record);
    }
    public function deletePrioridadUma($idPrioridadUma){
        $record = \DB::table('AU_Reg_DemandaPotencialPrioridadUMA')->where('IdPrioridadUMA', $idPrioridadUma)->delete();
        return response()->json($record);
    }
    public function deleteFactibilidadTecnica($idfactibilidad){
        $record = \DB::table('AU_Reg_DemandaPotencialFactibilidadTecnica')->where('IdFactibilidadTecnica', $idfactibilidad)->delete();
        return response()->json($record);
    }
    public function deleteconsumorotacion($idconsumorotacion){
        $record = \DB::table('AU_Reg_DemandaPotencialConsumoRotacion')->where('IdConsumoRotacion', $idconsumorotacion)->delete();
        return response()->json($record);
    }

    public function deleteOfertaAeronautica($idofertaaeronautica){
        $record = \DB::table('AU_Reg_DemandaPotencialOfertaAeronautica')->where('IdOfertaAeronautica', $idofertaaeronautica)->delete();
        return response()->json($record);
    }

    public function getAfiliados(Request $request, $id)
    {
        if($request->ajax())
        {   
            $afiliados = ClusterAfiliado::afiliados($id);
            return response()->json($afiliados);
        }
    }
    
    public function create(){
        // dropdowns 
        $unidades = Unidad::all();
        $aeronaves = Aeronave::all();
        $atas = Ata::all();

        return view('certificacion.productosAeronauticos.demandapotencial.crear_demandapotencial')
            ->with('unidades', $unidades)
            ->with('aeronaves', $aeronaves)
            ->with('atas', $atas);
    }

    
    public function store(Request $req)
    {
        
        $demandapotencial = new DemandaPotencial;

        $demandapotencial->Nombre = $req->input('Nombre');
        $demandapotencial->ParteNumero = $req->input('ParteNumero');
        $demandapotencial->IdAeronave = $req->input('IdAeronave');
        $demandapotencial->IdUnidad = $req->input('IdUnidad');
        $demandapotencial->NSN = $req->input('NSN');
        $demandapotencial->CodigoSAP = $req->input('CodigoSAP');
        $demandapotencial->PublicacionTecnica = $req->input('PublicacionTecnica');
        $demandapotencial->IdATA = $req->input('IdATA');
        $demandapotencial->Identificacion = $req->input('Identificacion');
        $demandapotencial->Funcionamiento = $req->input('Funcionamiento');
        $demandapotencial->Observaciones = $req->input('Observaciones');
        $demandapotencial->Fabricante = $req->input('Fabricante');
        $demandapotencial->PrecioCompra = $req->input('PrecioCompra');
        $demandapotencial->Anio = $req->input('Anio');
        $demandapotencial->TiempoEntrega = $req->input('TiempoEntrega');
        $demandapotencial->PeriodoTiempoEntrega = $req->input('PeriodoTiempoEntrega');
        $demandapotencial->Clase = $req->input('Clase');
        $demandapotencial->Imgen = $req->has('Imgen');
        $demandapotencial->Imgen = $req->input('Imgen');
        $demandapotencial->DocTecnica = $req->input('DocTecnica');
        $demandapotencial->Activo = 1;

        $demandapotencial->save();

        return redirect()->route('demandapotencial.edit', $demandapotencial->IdDemandaPotencial);

    }
    
    public function storeConsumoRotacion(Request $req){

        $currentyear = date("Y");

        $validator = Validator::make($req->all(), [

            'Anio' => 'required|unique:AU_Reg_DemandaPotencialConsumoRotacion,Anio,NULL,id,IdDemandaPotencial,'.$req->IdDemandaPotencial,
            'Cantidad' => 'required',

        ]);

        if ($validator->passes()) {

             foreach ($req->Anio as $key => $v) {
            $data = array(
                'IdDemandaPotencial' => $req->IdDemandaPotencial,
                'Anio' => $req->Anio [$key],
                'Cantidad' => $req->Cantidad [$key],
                'Activo' => 1,
            );
            DemandaPotencialConsumoRotacion::insert($data);

        }

      return response()->json(['success'=>'done']);
    
      

        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }

       

    }

    public function storeFactibilidadTecnica(Request $req) {
        
        DemandaPotencialFactibilidadTecnica::updateOrCreate(

            ['IdDemandaPotencial' => $req->IdDemandaPotencial,],

            ['IdDemandaPotencial' => $req->IdDemandaPotencial,
            'Severidad' => $req->Severidad,
            'OcurrenciaFalla' => $req->OcurrenciaFalla,
            'Complejidad' => $req->Complejidad,
            'Activo' => 1,

        ]);

    

        return response()->json(['success'=>'done']);

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function storePrioridadUma(Request $req){

        DemandaPotencialPrioridadUma::updateOrCreate(

            ['IdDemandaPotencial' => $req->IdDemandaPotencial,],

            ['IdDemandaPotencial' => $req->IdDemandaPotencial,
            'Prioridad' => $req->Prioridad,
            'Activo' => 1,]

        );

        return response()->json(['success'=>'done']);
        
        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function storeValoracionEconomica(Request $req){

       
        DemandaPotencialValoracionEconomica::updateOrCreate(

             ['IdDemandaPotencial' => $req->IdDemandaPotencial,],

             [
                'IdDemandaPotencial' => $req->IdDemandaPotencial,
                'UltimoPrecio' => $req->UltimoPrecio,
                'ValorHistorico' => $req->ValorHistorico,
                'ValorUnitario' => $req->ValorUnitario,
                'CantidadPrioridad' => $req->CantidadPrioridad,
                'ValorTotal' => $req->ValorTotal,
                'AnioProximaEntrega' => $req->AnioProximaEntrega,
                'ContratarCompra' => $req->ContratarCompra,
                'TipoMonedaUltimoPrecio' => $req->TipoMonedaUltimoPrecio,
                'TipoMonedaValorHistorico' => $req->TipoMonedaValorHistorico,
                'TipoMonedaValorUnitario' => $req->TipoMonedaValorUnitario,
                'TipoMonedaValorTotal' => $req->TipoMonedaValorTotal,
                'Activo' => 1,
                'AnioVUC' => $req->AnioVUC,
                'AnioVH' => $req->AnioVH,
             ]);

      return response()->json(['success'=>'done']);
    
      return response()->json(['error'=>$validator->errors()->all()]);


    }

    public function storeValoracionTecnica(Request $req){

             DemandaPotencialValoracionTecnica::updateOrCreate(

             ['IdDemandaPotencial' => $req->IdDemandaPotencial,],

             [
                'IdDemandaPotencial' => $req->IdDemandaPotencial,
                'TipoLista' => $req->TipoLista,
                'AltaRotacion' => $req->AltaRotacion,
                'BajoMTBF' => $req->BajoMTBF,
                'AltosTiempos' => $req->AltosTiempos,
                'DeficitExistencias' => $req->DeficitExistencias,
                'FabricanteOrinal' => $req->FabricanteOrinal,
                'FlotaAntigua' => $req->FlotaAntigua,
                'Activo' => 1,
             ]);

        

      return response()->json(['success'=>'done']);
    
      return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function storeOfertaAeronautica(Request $req){


        DemandaPotencialOfertaAeronautica::updateOrCreate(

             ['IdDemandaPotencial' => $req->IdDemandaPotencial,],

             [
                'IdDemandaPotencial' => $req->IdDemandaPotencial,
                'IdCluster' => $req->IdCluster,
                'IdEmpresa' => $req->IdEmpresa,
                'ValorUnitario' => $req->ValorUnitario,
                'TiempoEntrega' => $req->TiempoEntrega,
                'Cantidad' => $req->Cantidad,
                'ValorTotal' => $req->ValorTotal,
                'Anio' => $req->Anio,
                'Observaciones' => $req->Observaciones,
                'Activo' => 1,
             ]);


      return response()->json(['success'=>'done']);
    
      return response()->json(['error'=>$validator->errors()->all()]);

    }
    
    public function edit($IdDemandaPotencial)
    {        
        $demandapotencial = DemandaPotencial::find($IdDemandaPotencial);

        // dropdowns

        $unidades = Unidad::all();
        $aeronaves = Aeronave::all();
        $atas = Ata::all();
        $clusters = Cluster::all();
        $empresas = Empresa::all();
        // $empresa = DemandaPotencialOfertaAeronautica::find($IdDemandaPotencial)->empresa;


        // Display one to many relations 

        $consumorotacion = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesConsumoRotacion;
        $factibilidadtecnica = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesFactibilidadTecnica;
        $prioridaduma = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesPrioridadUma;
        $valoracioneconomica = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesValoracionEconomica;
        $valoraciontecnica = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesValoracionTecnica;
        $ofertaaeronautica = DemandaPotencial::find($IdDemandaPotencial)->demandasPotencialesOfertaAeronautica;

        return view('certificacion.productosAeronauticos.demandapotencial.editar_demandapotencial')
            ->with('unidades', $unidades)
            ->with('aeronaves', $aeronaves)
            ->with('atas', $atas)
            ->with('consumorotacion', $consumorotacion)
            ->with('factibilidadtecnica', $factibilidadtecnica)
            ->with('prioridaduma', $prioridaduma)
            ->with('valoracioneconomica', $valoracioneconomica)
            ->with('valoraciontecnica', $valoraciontecnica)
            ->with('demandapotencial', $demandapotencial)
            ->with('ofertaaeronautica', $ofertaaeronautica)
            ->with('clusters', $clusters)
            ->with('empresas', $empresas);
            // ->with('empresa', $empresa);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($id)
    {
        //
    }
}
