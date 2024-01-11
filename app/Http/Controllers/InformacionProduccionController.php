<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\CaracteristicaEmpresa;
use App\Models\ClienteFfmm;
use App\Models\ProductoFfmm;

//Caracteristicas Empresa
use App\Models\TamanoEmpresa; 
use App\Models\CriterioFinanciero;

// mercado
use App\Models\Mercado;

use App\Models\SectorMercado;
use App\Models\CategoriaTipo;
use App\Models\SubcategoriaTipo;


// materias primas
use App\Models\ListadoMateriasPrimas;
use App\Models\MateriaPrima;


// producto ofrecido
use App\Models\ProductoOfrecido;
use App\Models\ServicioOfrecido;
use App\Models\Empresa;
use App\Models\DemandaPotencial;


// Tecnologias
use App\Models\TecnologiaEmpresa;
use App\Models\AntecedenteAutor;
use App\Models\TecnologiaSuCliente;
use App\Models\ProductoSector;
use App\Models\Desarrollado;
use App\Models\AgenteDesarrollador;

// Produccion Empresa
use App\Models\ProduccionEmpresa;
use App\Models\ProduccionTercerizacion;
use App\Models\MaquinariaEquipoProduccion;
use App\Models\Permiso;

class InformacionProduccionController extends Controller
{
    public function index(){
        /*$idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;

        if (Auth::user()->hasRole('administrador')) {*/
            
            $empresas = Empresa::all();
            $p = new Permiso;
            $permiso = $p->getPermisos('CP');
            return view ('fomento.empresas.ver_tablas_informacion_produccion')->with('empresas', $empresas)->with('permiso', $permiso);

        /*}else{

            if (Auth::user()->hasRole('empresario')) {
                $empresas = Empresa::getById($idEmpresa);
                return view ('fomento.empresas.ver_tablas_informacion_produccion')->with('empresas', $empresas);
            }
        }*/
    }

    public function storeCaracteristicasEmpresa(Request $req){

            
             CaracteristicaEmpresa::updateOrCreate(
            
            ['IdEmpresa'   => $req->IdEmpresa,],
            
            [
                'CantidadFuncionarios' => $req->CantidadFuncionarios ,
                'Areaconstruida' => $req->Areaconstruida ,
                'AreaTerreno' => $req->AreaTerreno ,
                'ActividadEconomica' => $req->ActividadEconomica ,
                'CapitalMonedaNacional' => $req->CapitalMonedaNacional ,
                'CapitalMonedaExtranjera' => $req->CapitalMonedaExtranjera ,
                'IdTamanoEmpresa' => $req->IdTamanoEmpresa ,
                'IdCriterioFinanciero' => $req->IdCriterioFinanciero ,
                'EmpleadosPrimaria' => $req->EmpleadosPrimaria ,
                'EmpleadosSecundaria' => $req->EmpleadosSecundaria ,
                'EmpleadosTecnica' => $req->EmpleadosTecnica ,
                'EmpleadosSuperior' => $req->EmpleadosSuperior ,
                'EmpleadosPostgrado' => $req->EmpleadosPostgrado ,
                'EmpleadosMagister' => $req->EmpleadosMagister ,
                'EmpleadosDoctorado' => $req->EmpleadosDoctorado ,
                'Activo' => 1 ,
        ]);


        
        return response()->json(['success'=>'done']);
    
        return response()->json(['error'=>$validator->errors()->all()]);


    }




    public function deleteProductoFfmm($idproductoffmm){
        $record = \DB::table('AU_Reg_ProductosFFMM')->where('IdProductosFM', $idproductoffmm)->delete();
        return response()->json($record);
    }



    public function storeProductosffmm(Request $req){

        
        foreach ($req->input('ProductoItem') as $key => $v) {
            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'ProductoItem' => $req->ProductoItem [$key],
                'Ventas' => $req->Ventas [$key],
                'IdClienteFM' => $req->IdClienteFM [$key],
                'Activo' => 1,
            );

            ProductoFfmm::insert($data);
        }

            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);
        
        
    }


    public function storeMercado(Request $req){


        foreach ($req->IdSector as $key => $v) {
            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'IdSector' => $req->IdSector [$key],
                'ParticipacionPorcentual' => $req->ParticipacionPorcentual [$key],
                'IdCategorias' => $req->IdCategorias [$key],
                'IdSubcategoria' => $req->IdSubcategorias [$key],
                'NombreEmpresa' => $req->NombreEmpresa [$key],
                'Pais' => $req->Pais [$key],
                'PrincipalesProductos' => $req->PrincipalesProductos [$key],
                'PorcentajeVentas' => $req->PorcentajeVentas [$key],
                'HaExportado' => $req->HaExportado [$key],
                'Producto' => $req->Producto [$key],
                'PaisDestino' => $req->PaisDestino [$key],
                'Activo' => 1,
            );

            Mercado::insert($data);
        }

            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);

    }


    public function storeTecnologias(Request $req){


        TecnologiaEmpresa::updateOrCreate(
            
            ['IdEmpresa'   => $req->IdEmpresa,],
            [
                'ProductosProcesosPatentados' => $req->ProductosProcesosPatentados,
                'ActividadesInvestigacion' => $req->ActividadesInvestigacion,
                'TransferenciaTecnologiaKnowHow' => $req->TransferenciaTecnologiaKnowHow,
                'ConveniosInteruniversidadesInvestigacion' => $req->ConveniosInteruniversidadesInvestigacion,
                'DetalleConveniosParticipacion' => $req->DetalleConveniosParticipacion,
                'ParticipacionDesarrolloTecnolgico' => $req->ParticipacionDesarrolloTecnolgico,
                'IdEmpresa' => $req->IdEmpresa,
                'Activo' => 1,
        ]);


        if ($req->Tecnologia) {
            
        
        // AntecedenteAutor;
        foreach ($req->Tecnologia as $key => $v) {

            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'AntecedentesAutores' => $req->AntecedentesAutores [$key],
                'Tecnologia' => $req->Tecnologia [$key],
                'Activo' => 1,
            );

            AntecedenteAutor::insert($data);
        }

    }elseif($req->ClienteSocio){

        // TecnologiaSuCliente;
        foreach ($req->ClienteSocio as $key => $v) {

            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'ClienteSocio' => $req->ClienteSocio [$key],
                'SuEmpresa' => $req->SuEmpresa [$key],
                'Activo' => 1,
            );

            TecnologiaSuCliente::insert($data);
        }


    }elseif($req->IdSector){


        // ProductoSector;
        foreach ($req->IdSector as $key => $v) {

            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'ProductoSector' => $req->ProductoSector [$key],
                'IdSector' => $req->IdSector [$key],
                'Activo' => 1,
            );

            ProductoSector::insert($data);
        }


    }elseif($req->IdAgente){
        // Desarrollado;
        foreach ($req->IdAgente as $key => $v) {

            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'IdAgente' => $req->IdAgente [$key],
                'IdSector' => $req->IdSector2 [$key],
                'Activo' => 1,
            );

            Desarrollado::insert($data);
        }
    }

        
        return response()->json(['success'=>'done']);
    
        return response()->json(['error'=>$validator->errors()->all()]);

    }




    public function deleteMateriaPrima($idmateriaprima){
        $record = \DB::table('AU_Reg_MateriasPrimas')->where('IdMateriaPrimaComponentes', $idmateriaprima)->delete();
        return response()->json($record);
    }


    public function storeMateriaPrima(Request $req){

        foreach ($req->PrincipalProveedor as $key => $v) {
            $data = array(
                'IdEmpresa' => $req->IdEmpresa,
                'PrincipalProveedor' => $req->PrincipalProveedor [$key],
                'PaisOrigen' => $req->PaisOrigen [$key],
                'Observaciones' => $req->Observaciones [$key],
                'IdMateriaPrima' => $req->IdMateriaPrima [$key],
                'Activo' => 1,
            );

            MateriaPrima::insert($data);
        }

            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);


    }

    public function storeProduccionEmpresa(Request $req){


        ProduccionEmpresa::updateOrCreate(
            
            ['IdEmpresa'   => $req->IdEmpresa,],
            
            [
                'IdEmpresa'  => $req->IdEmpresa,
                'MecanizadoCNC' => $req->MecanizadoCNC,
                'Forjamiento' => $req->Forjamiento,
                'TratamientosTermicos' => $req->TratamientosTermicos,
                'MetalizacionVacio' => $req->MetalizacionVacio,
                'TratamientosProteccionSuperficies' => $req->TratamientosProteccionSuperficies,
                'MontajeComponentesME' => $req->MontajeComponentesME,
                'CollageMetalesColmenas' => $req->CollageMetalesColmenas,
                'EnsayosNoDestructivos' => $req->EnsayosNoDestructivos,
                'Estampado' => $req->Estampado,
                'ShotPeenning' => $req->ShotPeenning,
                'PeenningForming' => $req->PeenningForming,
                'MecanizadoQuimico' => $req->MecanizadoQuimico,
                'PruebasSistemas' => $req->PruebasSistemas,
                'SoldadurasSMD' => $req->SoldadurasSMD,
                'SoldadurasTIGMIG' => $req->SoldadurasTIGMIG,
                'CorteAguaPlasma' => $req->CorteAguaPlasma,
                'ConformacionFibraVidriol' => $req->ConformacionFibraVidriol,
                'ConformacionFibraCarbono' => $req->ConformacionFibraCarbono,
                'CorteSoldaduraLaser' => $req->CorteSoldaduraLaser,
                'Otros' => $req->Otros,
                'PorcentajeDemandaRelativa' => $req->PorcentajeDemandaRelativa,
                'NumeroTurnosTrabajo' => $req->NumeroTurnosTrabajo,
                'TieneCapacidadAlojamiento' => $req->TieneCapacidadAlojamiento,
                'CapacidadAlojamiento' => $req->CapacidadAlojamiento,
                'TieneGeneradorEnergia' => $req->TieneGeneradorEnergia,
                'CapacidadGenerador' => $req->CapacidadGenerador,
                'Activo' => 1,

        ]);

        
           foreach ($req->NombreMaquinaria as $key => $value) {
               $dataMaquinaria = array(
                    'NombreMaquinaria' => $req->NombreMaquinaria [$key],
                    'PorcentajeNacional' => $req->PorcentajeNacional [$key],
                    'PorcentajeImportado' => $req->PorcentajeImportado [$key],
                    'PorcentajeTotal' => $req->PorcentajeTotal [$key],
                    'IdEmpresa' => $req->input('IdEmpresa'),
                    'Activo' => 1,
               );

               MaquinariaEquipoProduccion::insert($dataMaquinaria);
           }

           foreach ($req->ProcesoTercerizado as $key => $v) {
                $dataTercerizacion = array(
                    'ProcesoTercerizado' => $req->ProcesoTercerizado [$key],
                    'EmpresaTercerizada' => $req->EmpresaTercerizada [$key],
                    'IdEmpresa' => $req->input('IdEmpresa'),
                    'Activo' => 1,
                );
                ProduccionTercerizacion::insert($dataTercerizacion);
           }
            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);
        }




    public function deleteProductoOfrecido($idproductoofrecido){
        $record = \DB::table('AU_Reg_ProductosOfrecidos')->where('IdProductosOfrecidos', $idproductoofrecido)->delete();
        return response()->json($record);
    }


    public function storeProductosOfrecidos(Request $req){

        //informacionproduccion/3/edit

        foreach ($req->Producto as $key => $v)
        {   
            $producto = DemandaPotencial::find($req->IdDemandaPotencial[$key]);
            $data = array(
                'Producto' => $req->Producto [$key],
                'Equipo' => $req->Equipo [$key],
                'PNIntercambiable' => $req->PNIntercambiable [$key],
                'IdDemandaPotencial' => $req->IdDemandaPotencial [$key],
                'OEM' => $producto->ParteNumero,
                'ValorComercialUnidad' => $req->ValorComercialUnidad [$key],
                'TiempoDesarrollo' => $req->TiempoDesarrollo [$key],
                'TiempoEntrega' => $req->TiempoEntrega [$key],
                'EstaCertificado' =>(isset($req->EstaCertificado [$key]))?1:0 ,
                'Observaciones' => $req->Observaciones [$key],
                'IdEmpresa' => $req->IdEmpresa,
                'Activo' => 1,
            );

            ProductoOfrecido::insert($data);
        }

        $notification = array(
          'message' => 'Se ha realizado el registro de productos correctamente',
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }


    public function deleteServicioOfrecido($idservicioofrecido){
        
        $record = \DB::table('AU_Reg_ServiciosOfrecidos')->where('IdServiciosOfrecidos', $idservicioofrecido)->delete();
        return response()->json($record);
    }



    public function storeServiciosOfrecidos(Request $req){
        

        foreach ($req->Servicio as $key => $v) {
            $data = array(
                'Servicio' => $req->Servicio [$key],
                'NombreSericioOfrecido' => $req->NombreSericioOfrecido [$key],
                'DescripcionServicio' => $req->DescripcionServicio [$key],
                'Equipo' => $req->Equipo [$key],
                'CodigoServicio' => $req->CodigoServicio [$key],
                'ValorComercialUnitario' => $req->ValorComercialUnitario [$key],
                'TiempoEjecucionServicio' => $req->TiempoEjecucionServicio [$key],
                'Certificacion' => $req->Certificacion [$key],
                'Observacion' => $req->Observacion [$key],
                'IdEmpresa' => $req->IdEmpresa,
                'Activo' => 1,
            );

            ServicioOfrecido::insert($data);
        }

            return response()->json(['success'=>'done']);
    
            return response()->json(['error'=>$validator->errors()->all()]);


    }


    public function edit($IdEmpresa){


        $empresa = Empresa::find($IdEmpresa);
        $clientesffmm = ClienteFfmm::all();
        $sectoresmercado = SectorMercado::all();
        $categoriastipo = CategoriaTipo::all();
        $subcategoriastipo = SubcategoriaTipo::all();
        $listadomateriasprimas = ListadoMateriasPrimas::all();
        $tamanoempresa = TamanoEmpresa::all();
        $criteriofinanciero = CriterioFinanciero::all();
        $demandapotencial = DemandaPotencial::where('Activo',1)->get();
        $agentedesarrollador = AgenteDesarrollador::all();
        

        // show information
        $caracteristica = Empresa::find($IdEmpresa)->caracteristicaEmpresa;
        $infomercado = Empresa::find($IdEmpresa)->mercados;
        
        $materiasprimas = Empresa::find($IdEmpresa)->materiasPrimas;
        $productosffmm = Empresa::find($IdEmpresa)->productosFfmm;
        $produccionempresa = Empresa::find($IdEmpresa)->produccionEmpresa;
        $producciontercerizacion = Empresa::find($IdEmpresa)->produccionesTercerizacion;
        $maquinarias = Empresa::find($IdEmpresa)->maquinarias;
        $tecnologia = Empresa::find($IdEmpresa)->tecnologiaEmpresa;

        $productosofrecidos = Empresa::find($IdEmpresa)->productosOfrecidos;
        $serviciosofrecidos = Empresa::find($IdEmpresa)->serviciosOfrecidos;
        

        $productossector = Empresa::find($IdEmpresa)->productosSector;
        $antecedentesautor = Empresa::find($IdEmpresa)->antecedentesAutor;
        $desarrollados = Empresa::find($IdEmpresa)->desarrollados;
        $tecnologiassucliente = Empresa::find($IdEmpresa)->tecnologiasSucliente;

        $actEco = new ActividadesEconomicasController();
        $sections = $actEco->ClassSections();
        



        return view('fomento.empresas.ver_detalle_informacion_produccion')
                ->with('empresa', $empresa)
                ->with('clientesffmm', $clientesffmm)
                ->with('sectoresMercado', $sectoresmercado)
                ->with('categoriasTipo', $categoriastipo)
                ->with('subcategoriasTipo', $subcategoriastipo)
                ->with('listadomateriasprimas', $listadomateriasprimas)
                ->with('tamanoempresa', $tamanoempresa)
                ->with('criteriofinanciero', $criteriofinanciero)
                ->with('demandapotencial', $demandapotencial)
                ->with('productosffmm', $productosffmm)
                ->with('infomercado', $infomercado)
                ->with('materiasprimas', $materiasprimas)
                ->with('maquinarias', $maquinarias)
                ->with('producciontercerizacion', $producciontercerizacion)
                ->with('produccionempresa', $produccionempresa)
                ->with('caracteristica', $caracteristica)
                ->with('productosofrecidos', $productosofrecidos)
                ->with('serviciosofrecidos', $serviciosofrecidos)
                ->with('productossector', $productossector)
                ->with('antecedentesautor', $antecedentesautor)
                ->with('desarrollados', $desarrollados)
                ->with('tecnologiassucliente', $tecnologiassucliente)
                ->with('agentedesarrollador', $agentedesarrollador)
                ->with('tecnologia', $tecnologia)
                ->with('secciones', $sections);
    

    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function create()
    {
        //
    }
    public function store(Request $req)
    {
        
    }


    public function show($id)
    {
        //
    }
}
