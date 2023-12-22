<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActividadesInspeccion;
use App\Models\Personal;
use App\Models\PlanInspeccion;
use App\Models\UsersLDAP;
use App\Models\CriteriosAuditorias;

class ActividadesInspeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividades = new ActividadesInspeccion;
        $actividades->IdPlanInspeccion = $request->input('IdPlanInspeccion');
        $actividades->IdCriterio = $request->input('IdCriterios');
        $actividades->Actividades = $request->input('Actividades');
        $actividades->Lugar = $request->input('lugar');
        $actividades->IdPersonalInsp = $request->input('IdPersonalInspWS');
        $actividades->IdPersonalInspector = $request->input('IdPersonalInspector');
        $actividades->FechaInicio = $request->input('FechaInicio');
        $actividades->HoraInicio = $request->input('HoraInicio');
        $actividades->FechaCierre = $request->input('FechaCierre');
        $actividades->HoraFinal = $request->input('HoraFinal');
        $actividades->EstadoInsertUsuario = $request->input('estadoUsuario');       
        $actividades->activo = 1;
        $actividades->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPlanInspeccion)
    {
        //die('da');
        // $capacidades = Empresa::find($IdEmpresa)->capacidades;
        // $empresa = Empresa::find($IdEmpresa);
        // return view('fomento.empresas.capacidades_empresa')->with('capacidades', $capacidades)->with('empresa', $empresa);

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $personalWS = UsersLDAP::all();
        $personalWS->prepend('None');

        $criterios = CriteriosAuditorias::all();
        $criterios->prepend('None');

        $actividadesPlan= ActividadesInspeccion::getActividadesPlan($IdPlanInspeccion);

        $planesIns = PlanInspeccion::find($IdPlanInspeccion);

        $estadoAuditoriaUsuario = ActividadesInspeccion::getEstadoUsuarioAuditoria($IdPlanInspeccion);
        $estado = "";
        foreach($estadoAuditoriaUsuario as $key){
            $estado = $key->EstadoInsertOrganizacion;
        }

        $equipoInspector = "";
        if($estado == 'usuarioWS'){
            $equipoInspector = ActividadesInspeccion::getExpertosTecnicosWS($IdPlanInspeccion);
        }else{
            $equipoInspector = ActividadesInspeccion::getExpertosTecnicosEmpresa($IdPlanInspeccion);
        }
        //die($equipoInspector);
        $equipoInspector->prepend('None');
        
        return view('auditoria.ver_actividades_inspeccion')
            ->with('actividadesPlan', $actividadesPlan)
            ->with('planesIns', $planesIns)
            ->with('criterios', $criterios)
            ->with('inspectores', $equipoInspector)
            ->with('personal', $personal)
            ->with('namePlan', $estadoAuditoriaUsuario)
            ->with('estado', $estado)
            ->with('personalWS', $personalWS);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdActividadPlanIns)
    {

        $IdPlanInspeccion = ActividadesInspeccion::getIdPlanInspeccion($IdActividadPlanIns);


        $personalWS = UsersLDAP::all();
        $personalWS->prepend('None');

        $criterios = CriteriosAuditorias::all();
        $criterios->prepend('None');

        $estadoAuditoriaUsuario = ActividadesInspeccion::getEstadoUsuarioAuditoria($IdPlanInspeccion[0]['IdPlanInspeccion']);
        $estado = "";
        foreach($estadoAuditoriaUsuario as $key){
            $estado = $key->EstadoInsertOrganizacion;
        }

        //die($estado);

        $equipoInspector = "";
        if($estado == 'usuarioWS'){
            $equipoInspector = ActividadesInspeccion::getExpertosTecnicosWS($IdPlanInspeccion[0]['IdPlanInspeccion']);
        }else{
            $equipoInspector = ActividadesInspeccion::getExpertosTecnicosEmpresa($IdPlanInspeccion[0]['IdPlanInspeccion']);
        }
        //die($equipoInspector);
        $equipoInspector->prepend('None');

         /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $actividadesInspeccion= ActividadesInspeccion::find($IdActividadPlanIns);

        return view('auditoria.editar_actividades_plan')
              ->withActividadesInspeccion($actividadesInspeccion)
              ->with('criterios', $criterios)
              ->with('personal', $personal)
              ->with('inspectores', $equipoInspector)
              ->with('personalWS', $personalWS);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdActividadPlanIns)
    {
        $actividadesPlan = ActividadesInspeccion::find($IdActividadPlanIns);

        $actividadesPlan->IdPlanInspeccion = $request->input('IdPlanInspeccion');
        $actividadesPlan->IdCriterio = $request->input('IdCriterios');
        $actividadesPlan->Actividades = $request->input('Actividades');
        $actividadesPlan->Lugar = $request->input('Lugar');
        $actividadesPlan->IdPersonalInsp = $request->input('IdPersonalInsp');
        $actividadesPlan->IdPersonalInspector = $request->input('IdPersonalInspector');
        $actividadesPlan->FechaInicio = $request->input('FechaInicio');
        $actividadesPlan->HoraInicio = $request->input('HoraInicio');
        $actividadesPlan->FechaCierre = $request->input('FechaCierre');
        $actividadesPlan->HoraFinal = $request->input('HoraFinal');
        $actividadesPlan->EstadoInsertUsuario = $request->input('estadoUsuario'); 

        $actividadesPlan->save();

        return redirect()->route('actividadesInspeccion.show', $actividadesPlan->IdPlanInspeccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdActividadPlanIns)
    {
        $actividades= ActividadesInspeccion::find($IdActividadPlanIns);
        $actividades->delete();
        return back();
    }
}
