<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;

use App\Models\Empresa;
use App\Models\ObjetivoEstrategico;
use App\Models\GestionCalidad;
// goes first
use App\Models\AspectoEstrategico;
// grid
use App\Models\ObjetivoEstrategicoAspecto;
use App\Models\SistemaCertificacionCalidad;

class InformacionCalidadController extends Controller
{
    public function index()
    {
        // $empresas = Empresa::all();
        // return view('fomento.empresas.ver_tablas_informacion_calidad')
        // ->with('empresas', $empresas);

        // $idPersonal = Auth::user()->IdPersonal;
        // $idEmpresa = Auth::user()->IdEmpresa;

        $empresas = Empresa::all();
        return view ('fomento.empresas.ver_tablas_informacion_calidad')->with('empresas', $empresas);

        // if (Auth::user()->hasRole('administrador')) {
            
        //     $empresas = Empresa::all();
        //     return view ('fomento.empresas.ver_tablas_informacion_calidad')->with('empresas', $empresas);

        // }else{

        //     if (Auth::user()->hasRole('empresario')) {
        //         $empresas = Empresa::getById($idEmpresa);
        //         return view ('fomento.empresas.ver_tablas_informacion_calidad')->with('empresas', $empresas);
        //     }
        // }
    }



    public function deleteAspectoEstrategico($idaspectoestrategico){    
        $record = \DB::table('AU_Reg_ObjetivosEstrategicosAspectos')->where('IdObjetivoEstrategicoEmp', $idaspectoestrategico)->delete();
        return response()->json($record);
    }


    public function storeAspectosEstrategicos(Request $req){
        
        // store everthing as comes, but check if aspecto estrategico in same company already exists, if it does skip it and just save new records on array.

        AspectoEstrategico::updateOrCreate(

             ['IdEmpresa' => $req->IdEmpresa,],

             [
                'SistemasPlaneacion' => $req->SistemasPlaneacion,
                'HorasTiempoTrabajo' => $req->HorasTiempoTrabajo,
                'IdEmpresa' => $req->IdEmpresa,
                'Activo' => 1,
             ]);

        
        if ($req->IdObjetivoEstrategico) {

        foreach ($req->IdObjetivoEstrategico as $key => $v) {
            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'IdObjetivoEstrategico' => $req->IdObjetivoEstrategico [$key],
                'AceptacionObjetivo' => $req->AceptacionObjetivo [$key],
                'Observaciones' => $req->Observaciones [$key],
                'Activo' =>1,

            );
           
            ObjetivoEstrategicoAspecto::insert($data);
        }   
    }

    return response()->json(['success'=>'done']);
    
    return response()->json(['error'=>$validator->errors()->all()]);

}

    public function deleteGestionCalidadSi($idsistemacalidad){    
        // $record = Empresa::destroy($idsistemacalidad);

        $record = \DB::table('AU_Reg_SistemaCertificacionCalidad')->where('IdSistemaCalidad', $idsistemacalidad)->delete();
        return response()->json($record);
    }

    public function storeGestionCalidadSi(Request $req){

       foreach ($req->NormaCertificacion as $key => $v) {
            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'NormaCertificacion' => $req->NormaCertificacion [$key],
                'OrganismoCertificador' => $req->OrganismoCertificador [$key],
                'FechaValidezCertificacion' => $req->FechaValidezCertificacion [$key],
                'Activo' => 1,
            );
            SistemaCertificacionCalidad::insert($data);

        }

        return response()->json(['success'=>'done']);
             
        return response()->json(['error'=>$validator->errors()->all()]);
      
    }

    public function storeGestionCalidadNo(Request $req){

        GestionCalidad::updateOrCreate(

            ['IdEmpresa' => $req->IdEmpresa,],
            [
                'IdEmpresa' => $req->IdEmpresa,
                'SGCImplementado' => $req->SGCImplementado,
                'SGCFaseEjecucion' => $req->SGCFaseEjecucion,
                'ManualCalidadProcedimientos' => $req->ManualCalidadProcedimientos,
                'ProcedimientoControlDocumentos' => $req->ProcedimientoControlDocumentos,
                'ProcesoFabricacionServicios' => $req->ProcesoFabricacionServicios,
                'EspecificacionesCliente' => $req->EspecificacionesCliente,
                'TrazabilidadProductos' => $req->TrazabilidadProductos,
                'ProcedimientoEscritoInspecciones' => $req->ProcedimientoEscritoInspecciones,
                'ProcedimientoProductoNoConforme' => $req->ProcedimientoProductoNoConforme,
                'ProcedimientoAccionesCorrectivas' => $req->ProcedimientoAccionesCorrectivas,
                'PlanCalibracionEquipos' => $req->PlanCalibracionEquipos,
                'SistemasCertificacion' => $req->SistemasCertificacion, 
                'Activo' => 1,
            ]);

            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);


    }

    
    public function edit($IdEmpresa){

        $empresa = Empresa::find($IdEmpresa);
        $objetivos = ObjetivoEstrategico::all();
        

        // display data
        $sistemascertcalidad = Empresa::find($IdEmpresa)->sistemascertificacioncalidad;
        $gestioncalidad = Empresa::find($IdEmpresa)->gestionCalidad;
        $aspectoestrategico = Empresa::find($IdEmpresa)->aspectoEstrategico;

        $objetivosestrategicosaspectos = Empresa::find($IdEmpresa)->objetivossEstratecigosAspectos;

        return view('fomento.empresas.ver_detalle_informacion_calidad')->withObjetivos($objetivos)->withEmpresa($empresa)->with('sistemascertcalidad', $sistemascertcalidad)->with('objetivosestrategicosaspectos', $objetivosestrategicosaspectos)->with('gestioncalidad', $gestioncalidad)->with('aspectoestrategico', $aspectoestrategico);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function create(Empresa $IdEmpresa)
    {
        // 
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {   
        
        //
    }
}
