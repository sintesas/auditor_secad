<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
// use Alert;

use App\Models\Auditoria;
use App\Models\Empresa;
use App\Models\TipoAuditoria;
use App\Models\FuncionariosEmpresa;
use App\Models\VWSeguimiento;
use App\Models\Personal;
use App\Models\CriteriosAuditorias;
use App\Models\CriteriosAsociados;
use App\Models\ExpertosTecnicosAsociados;
use App\Models\UsersLDAP;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rol = UsersLDAP::perteneceIGEFA();

        // if ($rol) {
            $audiorias = Auditoria::getAuditoriasTabla();
            $eso = Auditoria::join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
            //$eso = Auditoria::
            ->leftjoin('dbo.AU_Reg_Empresas as emp2', 'emp2.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresaAudita')
                            ->select('IdAuditoria', 'Codigo', 'AU_Reg_Empresas.SiglasNombreClave as SiglasNombreClave', 'NombreAuditoria', 'emp2.NombreEmpresa as EmpresaAudita')
                            ->get();
                            // echo "<pre>";
                            // dd($eso);
        // }else{
        //     $audiorias = Auditoria::getByUserAuditorias($idPersonal, $name);
        // }
        return view ('auditoria.ver_auditoria')->with('audiorias', $audiorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $criteriosAll = $this->getCriterios();

        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $acciones = ["", "Realizada",
                       "Recibida"];


        return view('auditoria.crear_auditoria')
            ->with('empresas', $empresas)
            ->with('tiposAuditoria', $tiposAuditoria)
            ->with('criterios', $criteriosAll)
            ->with('personal', $personal);
    }

    public function store(Request $request)
    {

        //Fecha Actual
        $hoy = getdate();

      $codigoAuditoria = $request->input('Codigo');
      //$codigoAuditoria = $request->Codigo;
      //var_dump($codigoAuditoria);
      $audioria = Auditoria::validateCode($codigoAuditoria)->count();
      if($audioria == 0){

        $idPersonal = Auth::user()->personal_id;
        $name = Auth::user()->nombre_completo;

        $audioria = new Auditoria;
        // store info
        $audioria->NombreAuditoria = $request->input('NombreAuditoria'); //Nombre Auditoria
        $audioria->FechaInicio = $request->input('FechaInicio'); //Fecha inicio Auditoria
        $audioria->Codigo = $request->input('Codigo');//Codigo Organizacion Auditada
        $audioria->IdEmpresa = $request->input('IdEmpresa');//Organizacion auditada
        $audioria->IdEmpresaAudita = $request->input('IdEmpresaAudita');//Organizacion que audita
        $audioria->IdPersonalInsp = $request->input('IdPersonalInspectorLider');//Inspector Lider
        $audioria->IdPersonalAudi = $request->input('IdPersonalAuditorLider');//Auditor Lider
        $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');//Expertos Técnicos
        $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');//Responsable
        $audioria->CargoRespo = $request->input('CargoRespo');//Cargo
        $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');//Tipo de auditoria
        $audioria->Accion = $request->input('Accion');//Accion
        $audioria->Lugar = $request->input('Lugar');//Lugar
        $audioria->Objeto = $request->input('Objeto');//Objeto
        $audioria->FechaAperAudit = $request->input('FechaAperAudit');//Fecha de apertura
        $audioria->HoraIni = $request->input('HoraInicio');//Hora Inicio
        $audioria->FechaTermino = $request->input('FechaTermino');//Fecha Termino
        $audioria->HoraTermi = $request->input('HoraTermi');//Hora termino
        $audioria->Alcance = $request->input('Alcance'); //Alcance
        $audioria->Observaciones = $request->input('Observaciones');//Observaciones

        $audioria->NameCreatedByUser = $name;
        $audioria->IdCreatedByUser = $idPersonal;
        $audioria->Activo = 1;
        $audioria->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
        $audioria->dependencia = $request->input('Dependencia');

        $audioria->save();

        //Criterios
        $IdAuditoria = $audioria->getKey();
        $IdCriterios = $request->input('IdCriterios');
        if(is_array($IdCriterios)) {
            foreach ($IdCriterios AS $value) {
                $regCriteriosAsociados = new CriteriosAsociados;
                $regCriteriosAsociados->IdAuditoria = $IdAuditoria;
                $regCriteriosAsociados->IdCriterio = $value;
                $regCriteriosAsociados->save();
            }
        }

        if($request->input('EstadoInsertOrganizacion') == 'usuarioWS'){
            //Equipo Auditor FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorWS = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }else{
            //Equipo Auditor No FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorEmpresa = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }



        return redirect()->route('auditoria.index');
      }
      else
      {
        // alert()->error('Digite otro código de auditoria', 'Código Repetido auditoria')->persistent('Close');
        return redirect()->route('auditoria.create');
      }

    }


    public function show($id)
    {
        //
    }


    public function edit($IdAuditoria)
    {
        $auditoria = Auditoria::find($IdAuditoria);
        // dd($auditoria);
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $criterios = CriteriosAuditorias::all();
        $criteriosAll = $this->getCriterios();

        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');

        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        //Criterios
        $resulCriteriosAsociados = CriteriosAsociados::select('IdCriterio')->where('IdAuditoria', '=', $IdAuditoria)->get();

        $buildCriterios = array();
        foreach(json_decode($resulCriteriosAsociados) AS $value){
            $buildCriterios[] = $value->IdCriterio;
        }


        //Equipo Inspector
        $resulEquipoInspectorAsociados = ExpertosTecnicosAsociados::select('IdEquipoInspectorEmpresa')->where('IdAuditoria', '=', $IdAuditoria)->get();

        $buildEquipoInspectorAsociados = array();
        foreach(json_decode($resulEquipoInspectorAsociados) AS $value){
            $buildEquipoInspectorAsociados[] = $value->IdEquipoInspectorEmpresa;
        }

        $resulEquipoInspectorAsociadosWS = ExpertosTecnicosAsociados::select('IdEquipoInspectorWS')->where('IdAuditoria', '=', $IdAuditoria)->get();

        $buildEquipoInspectorAsociadosWS = array();
        foreach(json_decode($resulEquipoInspectorAsociadosWS) AS $value){
            $buildEquipoInspectorAsociadosWS[] = $value->IdEquipoInspectorWS;
        }

        return view('auditoria.editar_auditoria')
              ->withAuditoria($auditoria)
              ->with('empresas', $empresas)
              ->with('tiposAuditoria', $tiposAuditoria)
              ->with('criterios', $criteriosAll)
              ->with('regCriteriosAsociados', json_encode($buildCriterios))
              ->with('regEquipoInspectorAsociadosEmpresa', json_encode($buildEquipoInspectorAsociados))
              ->with('regEquipoInspectorAsociadosWS', json_encode($buildEquipoInspectorAsociadosWS))
              ->with('personal', $personal);
    }


    public function update(Request $request, $IdAuditoria)
    {

        //Fecha Actual
        $hoy = getdate();

       // store info
       $audioria = Auditoria::find($IdAuditoria);

       $audioria->NombreAuditoria = $request->input('NombreAuditoria'); //Nombre Auditoria
        $audioria->FechaInicio = $request->input('FechaInicio'); //Fecha inicio Auditoria
        $audioria->Codigo = $request->input('Codigo');//Codigo Organizacion Auditada
        $audioria->IdEmpresa = $request->input('IdEmpresa');//Organizacion auditada
        $audioria->IdEmpresaAudita = $request->input('IdEmpresaAudita');//Organizacion que audita
        $audioria->IdPersonalInsp = $request->input('IdPersonalInspectorLider');//Inspector Lider
        $audioria->IdPersonalAudi = $request->input('IdPersonalAuditorLider');//Auditor Lider
        $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');//Expertos Técnicos
        $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');//Responsable
        $audioria->CargoRespo = $request->input('CargoRespo');//Cargo
        $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');//Tipo de auditoria
        $audioria->Accion = $request->input('Accion');//Accion
        $audioria->Lugar = $request->input('Lugar');//Lugar
        $audioria->Objeto = $request->input('Objeto');//Objeto
        $audioria->FechaAperAudit = $request->input('FechaAperAudit');//Fecha de apertura
        $audioria->HoraIni = $request->input('HoraIni');//Hora Inicio
        $audioria->FechaTermino = $request->input('FechaTermino');//Fecha Termino
        $audioria->HoraTermi = $request->input('HoraTermi');//Hora termino
        $audioria->Alcance = $request->input('Alcance'); //Alcance
        $audioria->Observaciones = $request->input('Observaciones');//Observaciones

        $audioria->Activo = 1;
        $audioria->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');

       $audioria->save();

       CriteriosAsociados::where('IdAuditoria', $IdAuditoria)->delete();
       $IdCriterios = $request->input('IdCriterios');
        if(is_array($IdCriterios)) {
            foreach ($IdCriterios AS $value) {
                $regCriteriosAsociados = new CriteriosAsociados;
                $regCriteriosAsociados->IdAuditoria = $IdAuditoria;
                $regCriteriosAsociados->IdCriterio = $value;
                $regCriteriosAsociados->save();
            }
        }

        ExpertosTecnicosAsociados::where('IdAuditoria', $IdAuditoria)->delete();
        if($request->input('EstadoInsertOrganizacion') == 'usuarioWS'){
            //Equipo Auditor FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorWS = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }else{
            //Equipo Auditor No FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorEmpresa = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }

       return redirect()->route('auditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdAuditoria)
    {

        $existsAnota = \DB::table('AU_Reg_Anotaciones')->where('IdAuditoria', $IdAuditoria)->first();
        $existsPlane = \DB::table('AU_Reg_PlanesInspeccion')->where('IdAuditoria', $IdAuditoria)->first();

        if(!$existsAnota && !$existsPlane){
            // USING MODELS
            $audioria = Auditoria::find($IdAuditoria);
            $audioria->delete();

            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar esta Auditoria ya que contiene datos de Anotaciones o Planes de Inspección.',
            'alert-type' => 'warning'
          );
        }

        return redirect()->route('auditoria.index')->with($notification);
    }

    public function getFuncionarios(Request $request, $id)
    {
        if($request->ajax())
        {
            $funcionarios = FuncionariosEmpresa::funcionariosEmpresa($id);
            return response()->json($funcionarios);
        }
    }

    public function getFuncionariosLDAP(Request $request)
    {
        if($request->ajax())
        {
            $funcionarios = UsersLDAP::all();
            return response()->json($funcionarios);
        }
    }

    public function getFuncionario(Request $request, $id)
    {
        if($request->ajax())
        {
            $funcionarios = FuncionariosEmpresa::funcionario($id);
            return response()->json($funcionarios);
        }

    }

    public function getAuditorias(Request $request, $id)
    {
        if($request->ajax())
        {
            $auditorias = Auditoria::where('IdPersonalInsp',$id);
            return response()->json($auditorias);
        }
    }

    //GET No VISITAS BY AUDITORIA
    public function getNoVisita(Request $request, $id)
    {
        if($request->ajax())
        {
            $visitas = VWSeguimiento::noVisitasAuditoria($id);
            return response()->json($visitas);
        }
    }

    //Genera Consecutivo auditoria siguente para el empresa
    public function getNextCodeAuditoriaEmpresa(Request $request, $id)
    {
      if($request->ajax())
        {
            $empresa = Empresa::sigla($id);
            return response()->json($empresa);
        }
    }

    //Obtener criterios
    public function getCriterios(){
        $resultCriterios = CriteriosAuditorias::all();
        $buildSection = array();
        foreach(json_decode($resultCriterios) AS $value){
            $buildSection[$value->IdCriterio] = $value->Norma;
        }

        return $buildSection;
    }
}