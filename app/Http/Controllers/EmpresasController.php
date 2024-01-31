<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

use App\Models\Empresa;
use App\Models\FuncionariosEmpresa;
use App\Models\Auditoria;
use App\Models\EstadosEmpresa;
use App\Models\DominioIndustrial;
use App\Models\AreasCooperacionIndustrial;
use App\Models\SubAreasCooperacionIndustrial;
use App\Models\ActividadesEconomicas;
use App\Models\RegActividadesEconomicas;
use App\Models\Municipio;
use App\Models\VWEmpresa;
use App\Models\Rol;
use App\Models\Permiso;
class EmpresasController extends Controller
{
    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }   
        
    public function index()
    {   
        //$perfil = Rol::rolUser();
        $empresas = Empresa::all();
        $vwempresa = VWEmpresa::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view ('fomento.empresas.ver_tablas_empresas')
                ->with('empresas', $empresas)
                //->with('perfil', $perfil)
                ->with('vwempresa', $vwempresa)->with('permiso', $permiso);
    }
    
    public function create()
    {

        $municipio = Municipio::all();
        $municipio->prepend('None');

        $estadoEmpresa = EstadosEmpresa::all();
        $estadoEmpresa->prepend('None');

        $dominioIndustrial = DominioIndustrial::all();
        $dominioIndustrial->prepend('None');

        $areasCooperacionIndustrial = AreasCooperacionIndustrial::all();
        $areasCooperacionIndustrial->prepend('None');

        $subAreasCooperacionIndustrial = SubAreasCooperacionIndustrial::all();
        $subAreasCooperacionIndustrial->prepend('None');

        $actividadesEconomicas = ActividadesEconomicas::all();
        $actividadesEconomicas->prepend('None');
        $actEco = new ActividadesEconomicasController();
        $sections = $actEco->ClassSections();

        //die(var_dump($sections));

        $ldate = date('Y-m-d');

        return view('fomento.empresas.crear_empresa')
                ->with('municipio', $municipio)
                ->with('estadoEmpresa', $estadoEmpresa)
                ->with('dominioIndustrial', $dominioIndustrial)
                ->with('areasCooperacionIndustrial', $areasCooperacionIndustrial)
                ->with('subAreasCooperacionIndustrial', $subAreasCooperacionIndustrial)
                ->with('actividadesEconomicas', $sections)
                ->with('ldate', $ldate);
    }

    public function store(Request $request)
    {
        
        $mun =  0;

        $empresa = new Empresa;
        $ip = $this->get_client_ip();
        $empresa->NombreEmpresa = $request->input('NombreEmpresa');
        $empresa->SiglasNombreClave = $request->input('SiglasNombreClave');
        $empresa->Nit = $request->input('Nit');
        $empresa->Email = $request->input('Email');

        $Ciudad =  Municipio::find($request->input('Id_Municipio'));
        //$empresa->Ciudad = $request->has($mun);
        $empresa->Ciudad = $Ciudad->NombreMunicipio;
        $empresa->Telefono = $request->input('Telefono');
        $empresa->PaginaWeb = $request->input('PaginaWeb');
        $empresa->TipoOrganizacion = $request->input('TipoOrganizacion');
        $empresa->Direccion = $request->input('Direccion');

        $empresa->DisenoDesarrollo = $request->has('DisenoDesarrollo');
        $empresa->Fabricante = $request->has('Fabricante');
        $empresa->PrestacionServicios = $request->has('PrestacionServicios');
        $empresa->MantenimientoAeronaves = $request->has('MantenimientoAeronaves');
        $empresa->AutorizacionCT = $request->has('autorizacion');

        $empresa->NombreCertificaInfo = $request->input('NombreCertificaInfo');
        $empresa->CargoCertificaInfo = $request->input('CargoCertificaInfo');

        // $ldate = date('Y-m-d');
        // $empresa->FechaCreacion = $ldate;
        $empresa->FechaCreacion = $request->input('FechaActualizacion');
        $empresa->FechaActualizacion = $request->input('FechaActualizacion');

        $empresa->IdEstadoEmpresa = $request->input('IdEstadoEmpresa');
        $empresa->IdDominioIndustrial = $request->input('IdDominioIndustrial');
        $empresa->IdAreasCooperacionIndustrial = $request->input('IdAreasCooperacionIndustrial');
        $empresa->IdSubAreasCooperacionIndustrial = $request->input('IdSubAreasCooperacionIndustrial');
        $empresa->Alcance = $request->input('Alcance');
        $empresa->Observaciones = $request->input('Observaciones');
        $empresa->Id_Municipio = $request->input('Id_Municipio');
            
        // dd($empresa);
        // STILL PENDING LOGO


        $notification = array(

            'message' => 'Empresa creada',
            'alert-type' => 'success'
        );

        $empresa->save();

        $IdEmpresa = $empresa->getKey();
        $IdActividadesEconomicas = $request->input('IdActividadEconomica');
        if(is_array($IdActividadesEconomicas)) {
            foreach ($IdActividadesEconomicas AS $value) {
                $regActividadesEconomicas = new RegActividadesEconomicas;
                $regActividadesEconomicas->IdEmpresa = $IdEmpresa;
                $regActividadesEconomicas->IdActividadesEconomicas = $value;
                $regActividadesEconomicas->save();
            }
        }

        // activity()
        //     ->performedOn($empresa)
        //     ->withProperties($ip)
        //     ->log('Empresa Creada');

        return redirect()->route('empresa.index')->with($notification);
    }

    public function show($IdEmpresa){
        $empresas= Empresa::orderBy('IdEmpresa', 'desc')->paginate(10);
        return view ('fomento.empresas.empresas')->with('empresas', $empresas);
    }

    public function edit($IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);

        $estadoEmpresa = EstadosEmpresa::all();
        // $estadoEmpresa->prepend('None');

        $dominioIndustrial = DominioIndustrial::all();
        // $dominioIndustrial->prepend('None');

        $areasCooperacionIndustrial = AreasCooperacionIndustrial::all();
        // $areasCooperacionIndustrial->prepend('None');

        $subAreasCooperacionIndustrial = SubAreasCooperacionIndustrial::all();
        //$subAreasCooperacionIndustrial->prepend('None');

        $actividadesEconomicas = ActividadesEconomicas::all();
        //$actividadesEconomicas->prepend('None');

        $result = RegActividadesEconomicas::select('IdActividadesEconomicas')->where('IdEmpresa', '=', $IdEmpresa)->get();
        //$actividadesEconomicas->prepend('None');

        $actividadesEconomicas = ActividadesEconomicas::all();
        $actividadesEconomicas->prepend('None');
        $actEco = new ActividadesEconomicasController();
        $sections = $actEco->ClassSections();

        $build = array();
        foreach(json_decode($result) AS $value){
            $build[] = $value->IdActividadesEconomicas;
        }

        $municipio = Municipio::all();

        $ldate = date('Y-m-d');
        
        return view('fomento.empresas.editar_empresa')
                ->with('empresa', $empresa)
                ->with('municipio', $municipio)
                ->with('estadoEmpresa', $estadoEmpresa)
                ->with('dominioIndustrial', $dominioIndustrial)
                ->with('areasCooperacionIndustrial', $areasCooperacionIndustrial)
                ->with('subAreasCooperacionIndustrial', $subAreasCooperacionIndustrial)
                ->with('actividadesEconomicas', $sections)
                ->with('regActividadesEconomicas', json_encode($build))
                ->with('ldate', $ldate);
    }

    
    public function update(Request $request, $IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);
        $Ciudad =  Municipio::find($request->input('Id_Municipio'));

        $ip = $this->get_client_ip();

        $empresa->NombreEmpresa = $request->input('NombreEmpresa');
        $empresa->Nit = $request->input('Nit');
        $empresa->Email = $request->input('Email');
        $empresa->Ciudad = $Ciudad->NombreMunicipio;
        $empresa->Telefono = $request->input('Telefono');
        $empresa->PaginaWeb = $request->input('PaginaWeb');
        $empresa->TipoOrganizacion = $request->input('TipoOrganizacion');
        $empresa->Direccion = $request->input('Direccion');

        $empresa->DisenoDesarrollo = $request->has('option1');
        $empresa->Fabricante = $request->has('option2');
        $empresa->PrestacionServicios = $request->has('option3');
        $empresa->MantenimientoAeronaves = $request->has('option4');

        $empresa->AutorizacionCT = $request->has('autorizacion');

        $empresa->NombreCertificaInfo = $request->input('NombreCertificaInfo');
        $empresa->CargoCertificaInfo = $request->input('CargoCertificaInfo');

        // $ldate = date('Y-m-d');
        $empresa->FechaActualizacion = $request->input('FechaActualizacion');

        $empresa->IdEstadoEmpresa = $request->input('IdEstadoEmpresa');
        $empresa->IdDominioIndustrial = $request->input('IdDominioIndustrial');
        $empresa->IdAreasCooperacionIndustrial = $request->input('IdAreasCooperacionIndustrial');
        $empresa->IdSubAreasCooperacionIndustrial = $request->input('IdSubAreasCooperacionIndustrial');
        $empresa->Alcance = $request->input('Alcance');
        $empresa->Observaciones = $request->input('Observaciones');
        $empresa->Id_Municipio = $request->input('Id_Municipio');

        $empresa->save();

        RegActividadesEconomicas::where('IdEmpresa', $IdEmpresa)->delete();
        $IdActividadesEconomicas = $request->input('IdActividadEconomica');
        if(is_array($IdActividadesEconomicas)) {
            foreach ($IdActividadesEconomicas AS $value) {
                $regActividadesEconomicas = new RegActividadesEconomicas;
                $regActividadesEconomicas->IdEmpresa = $IdEmpresa;
                $regActividadesEconomicas->IdActividadesEconomicas = $value;
                $regActividadesEconomicas->save();
            }
        }

        // activity()
        //     ->performedOn($empresa)
        //     ->withProperties($ip)
        //     ->log('Empresa editada');

        return redirect()->route('empresa.index');
    }

    
    public function destroy($IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);
        $ip = $this->get_client_ip();

        $empresa->capacidades()->delete();
        $empresa->funcionarios()->delete();
        $empresa->auditorias()->delete();

        $empresa->delete();

        activity()
            ->performedOn($empresa)
            ->withProperties($ip)
            ->log('Empresa Borrada');

        return redirect()->route('empresa.index');
    }
}
