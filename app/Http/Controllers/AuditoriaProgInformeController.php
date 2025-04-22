<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActividadesInspeccion;
use App\Models\Personal;
use App\Models\PlanInspeccion;
use App\Models\UsersLDAP;
use App\Models\CriteriosAuditorias;
use App\Models\AuditoriaProgPlanAuditoria;
use App\Models\AuditoriaProgramas;
use App\Models\BaseCertificacion;
use App\Models\PlanAuditoriaNormasCriterios;
use App\Models\Rol;
use App\Models\PlanAuditoriaEquipoAuditor;
use App\Models\PlanAuditoriaAgendaAuditoria;
use App\Models\PlanInformeAuditoriaProg;
use App\Models\PlanInformeAuditoriaProgHallazgos;
use App\Models\PlanAccionHallazgos;
use App\Models\PlanAccionHallazgosLista;
class AuditoriaProgInformeController extends Controller
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
    public function show($id_auditoriaprog)
    {
        
       
        $actividadesPlan = AuditoriaProgPlanAuditoria::getPlanAuditoriaAuditoriaProg($id_auditoriaprog);
    
        
        $programaEspecifico = \DB::table('vw_AU_Reg_AuditoriaProgramas')
            ->where('id_auditoriaprog', $id_auditoriaprog)
            ->first(); 

            
    $idPlanauditoriaConDatos = [];

    foreach ($actividadesPlan as $actividad) {
        
        $datos = \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoria')
            ->where('id_planauditoria', $actividad->id_planauditoria)
            ->first(); 
        
        
        if ($datos) {
            $idPlanauditoriaConDatos[] = $actividad->id_planauditoria;
        }
    }

    $idPlanAccionConDatos = [];

    foreach ($actividadesPlan as $actividad) {
        
        $datos = \DB::table('AU_Reg_AuditoriaProgramasPlanAccionHallazgos')
            ->where('id_planauditoria', $actividad->id_planauditoria)
            ->first(); 
        
        
        if ($datos) {
            $idPlanAccionConDatos[] = $actividad->id_planauditoria;
        }
    }

    $idSeguimientoConDatos = [];

    foreach ($actividadesPlan as $actividad) {
        
        $datos = \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimiento')
            ->where('id_planauditoria', $actividad->id_planauditoria)
            ->first(); 
        
        
        if ($datos) {
            $idSeguimientoConDatos[] = $actividad->id_planauditoria;
        }
    }

    return view('certificacion.auditoriaProgramas.verinforme')
        ->with('actividadesPlan', $actividadesPlan)
        ->with('programaEspecifico', $programaEspecifico)
        ->with('idPlanauditoriaConDatos', $idPlanauditoriaConDatos)
        ->with('idPlanAccionConDatos', $idPlanAccionConDatos)
        ->with('idSeguimientoConDatos', $idSeguimientoConDatos); 
}
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_planauditoria)
    {


        
        $auditoriaPrograma = AuditoriaProgPlanAuditoria::getPlanAuditoria($id_planauditoria)->first();
        $auditoriaPrograma22 = AuditoriaProgPlanAuditoria::find($id_planauditoria);

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

        $normasCriterios = PlanAuditoriaNormasCriterios::getCriterios($id_planauditoria);
        $equipoAuditor = PlanAuditoriaEquipoAuditor::getEquipoAuditor($id_planauditoria);
        $agendaAuditoria = PlanAuditoriaAgendaAuditoria::getAgendaAuditoria($id_planauditoria);

        $horaApertura = date('H:i', strtotime($auditoriaPrograma->hora_reunion_apertura));
        $horaCierre = date('H:i', strtotime($auditoriaPrograma->hora_reunion_cierre));

        if ($agendaAuditoria->count() > 1) { 
            foreach ($agendaAuditoria as $auditoria) {
            $horaInicio = date('H:i', strtotime($auditoria->hora_inicio));
            $horaFin = date('H:i', strtotime($auditoria->hora_fin));
        }
    } else{
        $horaInicio = date('H:i', strtotime(0));
        $horaFin = date('H:i', strtotime(0));
    }
       
      
        $Personal = Personal::getPersonalWithRango();
        $Personal->prepend('None');  

        $Personal1 = Personal::getPersonalWithRango();


  
        $Repuesto = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortByDesc("Nombre");
        $Repuesto->prepend('None');  

        $Repuesto1 = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortByDesc("Nombre");
      

        $plan_audi = \DB::select("select * from vw_cp_plan_auditoria");
        $plan_aud = collect($plan_audi);
        $plan_aud->prepend('None');

        $modali = \DB::select("select * from vw_cp_modalidad");
        $modalidad = collect($modali);
        $modalidad->prepend('None');
 
        $roles = Rol::all();
        $roles->prepend('None');  

        $roles1 = Rol::all();

        return view('certificacion.auditoriaProgramas.editar_planauditoria')
               ->with('auditoriaPrograma', $auditoriaPrograma)
               ->with('normasCriterios', $normasCriterios)
               ->with('Personal', $Personal)
               ->with('Personal1', $Personal1)
               ->with('Repuesto', $Repuesto)
               ->with('Repuesto1', $Repuesto1)
               ->with('plan_aud', $plan_aud)
               ->with('modalidad', $modalidad)
               ->with('roles', $roles)
               ->with('roles1', $roles1)
               ->with('horaApertura',$horaApertura)
               ->with('horaCierre',$horaCierre)
               ->with('equipoAuditor', $equipoAuditor)
               ->with('agendaAuditoria', $agendaAuditoria)
               ->with('horaInicio',$horaInicio)
               ->with('horaFin',$horaFin)
               ->with('id_auditoriaprog', $id_auditoriaprog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_planauditoria)
    {

       $planauditoria = AuditoriaProgPlanAuditoria::find($id_planauditoria);
       $planauditoria->id_auditoriaprog = $request->input('id_auditoriaprog');
       $planauditoria->no_programa = $request->input('no_programa');
       $planauditoria->descripcion_programa = $request->input('descripcion_programa');       
       $planauditoria->certificado_aplicable = $request->input('certificado_aplicable');
       $planauditoria->organizacion = $request->input('organizacion');       
       $planauditoria->planauditoria_id_listas = $request->input('planauditoria_id_listas');
       $planauditoria->fecha_planauditoria = $request->input('fecha_planauditoria');
       $planauditoria->fecha_auditoria = $request->input('fecha_auditoria');
       $planauditoria->modalidad_id_listas = $request->input('modalidad_id_listas');
       $planauditoria->objetivo_auditoria = $request->input('objetivo_auditoria');
       $planauditoria->alcance_auditoria = $request->input('alcance_auditoria');
       $planauditoria->fecha_reunion_apertura = $request->input('fecha_reunion_apertura');
       $planauditoria->fecha_reunion_cierre = $request->input('fecha_reunion_cierre');
       $planauditoria->hora_reunion_apertura = $request->input('hora_reunion_apertura');
       $planauditoria->hora_reunion_cierre = $request->input('hora_reunion_cierre');
       $planauditoria->id_jefe_oficina = $request->input('id_jefe_oficina');
       $planauditoria->id_jefe_area = $request->input('id_jefe_area');
       $planauditoria->auditor_lider = $request->input('auditor_lider');
       $planauditoria->representante_legal = $request->input('representante_legal');
       $planauditoria->save();

       $id_planauditoria = $planauditoria->getKey();


       $id_planauditoriocriterio = $request->input('id_planauditoriocriterio');
       if (is_array($id_planauditoriocriterio)) {
           PlanAuditoriaNormasCriterios::where('id_planauditoria', $id_planauditoria)
               ->whereNotNull('IdBaseCertificacion')
               ->delete();
               foreach ($id_planauditoriocriterio as $value) {
               $NormasCriterios = new PlanAuditoriaNormasCriterios;
               $NormasCriterios->id_planauditoria = $id_planauditoria;
               $NormasCriterios->IdBaseCertificacion = $value;
               $NormasCriterios->save();
           }
       }
      
         $id_integrante = $request->input('id_integrante');
         $id_rol = $request->input('id_rol');
         
         if (count($id_integrante) !== count($id_rol)) {
             return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
         }
         
         PlanAuditoriaEquipoAuditor::where('id_planauditoria', $id_planauditoria)
             ->delete();
         
         foreach ($id_integrante as $index => $integrante) {
             $NormasCriterios = new PlanAuditoriaEquipoAuditor;
             $NormasCriterios->id_planauditoria = $id_planauditoria; 
             $NormasCriterios->id_integrante = $integrante;
             $NormasCriterios->id_rol = $id_rol[$index]; 
             $NormasCriterios->save();
         }
         
         $proceso = $request->input('proceso');
    $hora_inicio = $request->input('hora_inicio');
    $hora_final = $request->input('hora_fin');
    $id_responsable = $request->input('id_responsable');
    $auditado = $request->input('auditado');

    
    if (count($proceso) !== count($hora_inicio) || count($proceso) !== count($hora_final) ||
        count($proceso) !== count($id_responsable) || count($proceso) !== count($auditado)) {
        return response()->json(['error' => 'El número de procesos, horas, responsables y auditados no coincide.'], 400);
    }


    PlanAuditoriaAgendaAuditoria::where('id_planauditoria', $id_planauditoria)
    ->delete();

    
    foreach ($proceso as $index => $p) {
        if($p > 1){
        $NormasCriterios = new PlanAuditoriaAgendaAuditoria; 
        $NormasCriterios->id_planauditoria = $id_planauditoria; 
        $NormasCriterios->proceso = $p;
        $NormasCriterios->hora_inicio = $hora_inicio[$index];
        $NormasCriterios->hora_fin = $hora_final[$index];
        $NormasCriterios->id_responsable = $id_responsable[$index];
        $NormasCriterios->auditado = $auditado[$index];
        $NormasCriterios->save();
        }
    }

    $notification = array(
        'message' => 'Plan Auditoria Editado Correctamente',
        'alert-type' => 'success'
    );

        return redirect()->route('auditoriaprogplanauditoria.show', $planauditoria->id_auditoriaprog)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_planauditoria)
{
    $normasCriterios = PlanAuditoriaNormasCriterios::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($normasCriterios as $norma) {
        $norma->delete();
    }

    $equipoAuditor = PlanAuditoriaEquipoAuditor::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($equipoAuditor as $equipo) {
        $equipo->delete();
    }

    $agendaAuditoria = PlanAuditoriaAgendaAuditoria::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($agendaAuditoria as $agenda) {
        $agenda->delete();
    }

    $datos = \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();


    if ($datos) {
        $id_planinformeauditoria = $datos->id_planinformeauditoria;
    
        
        $informeauditoriahallazgos = PlanInformeAuditoriaProgHallazgos::where('id_planinformeauditoria', $id_planinformeauditoria)->get();
        
        foreach ($informeauditoriahallazgos as $hallazgo) {
            \DB::table('AU_Reg_AuditoriaProgramasPlanAccionHallazgosLista')
                ->where('id_informeauditoriahallazgos', $hallazgo->id_informeauditoriahallazgos)
                ->delete();
            
            $hallazgo->delete();
        }
    
        $informeauditoria = PlanInformeAuditoriaProg::find($id_planinformeauditoria);
        if ($informeauditoria) {
            $informeauditoria->delete();
        }
    }
    

   $datosplanaccion = \DB::table('AU_Reg_AuditoriaProgramasPlanAccionHallazgos')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();

    if($datosplanaccion){


    $id_planaccionhallazgos = $datosplanaccion->id_planaccionhallazgos;

    $planaccionhallazgos = PlanAccionHallazgosLista::where('id_planaccionhallazgos', $id_planaccionhallazgos)->get();
    foreach ($planaccionhallazgos as $hallazgos) {
        $hallazgos->delete();
    }


    $planaccionhallazgos = PlanAccionHallazgos::find($id_planaccionhallazgos);
    if ($planaccionhallazgos) {
        $planaccionhallazgos->delete();
    }
}

    // Eliminar plan auditoría
    $planauditoria = AuditoriaProgPlanAuditoria::find($id_planauditoria);
    if ($planauditoria) {
        $planauditoria->delete();
    }

 

    return back();
}


    public function redirigirCrearPlanaAuditoria(Request $request)
{
    
    $request->session()->put('id_auditoriaprog', $request->input('id_auditoriaprog'));
    
    return redirect()->route('crearplanauditoria.index');
}

public function redirigirCrearInforme(Request $request)
{
    
    $request->session()->put('id_planauditoria', $request->input('id_planauditoria'));
    
    
    return redirect()->route('planinformeauditoriaprog.index');
}


public function view($id_planauditoria)
{
    $auditoriaPrograma = AuditoriaProgPlanAuditoria::getPlanAuditoria($id_planauditoria)->first();
    $auditoriaPrograma22 = AuditoriaProgPlanAuditoria::find($id_planauditoria);

    $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;


    $normasCriterios = PlanAuditoriaNormasCriterios::getCriterios($id_planauditoria);
    $equipoAuditor = PlanAuditoriaEquipoAuditor::getEquipoAuditor($id_planauditoria);
    $agendaAuditoria = PlanAuditoriaAgendaAuditoria::getAgendaAuditoria($id_planauditoria);

    $horaApertura = date('H:i', strtotime($auditoriaPrograma->hora_reunion_apertura));
    $horaCierre = date('H:i', strtotime($auditoriaPrograma->hora_reunion_cierre));

    if ($agendaAuditoria->count() > 1) { 
        foreach ($agendaAuditoria as $auditoria) {
        $horaInicio = date('H:i', strtotime($auditoria->hora_inicio));
        $horaFin = date('H:i', strtotime($auditoria->hora_fin));
    }
} else{
    $horaInicio = date('H:i', strtotime(0));
    $horaFin = date('H:i', strtotime(0));
}
  
    $Personal = Personal::getPersonalWithRango();
    $Personal->prepend('None');  

    $Personal1 = Personal::getPersonalWithRango();



    $Repuesto = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortByDesc("Nombre");
    $Repuesto->prepend('None');  

    $Repuesto1 = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortByDesc("Nombre");
  

    $plan_audi = \DB::select("select * from vw_cp_plan_auditoria");
    $plan_aud = collect($plan_audi);
    $plan_aud->prepend('None');

    $modali = \DB::select("select * from vw_cp_modalidad");
    $modalidad = collect($modali);
    $modalidad->prepend('None');

    $roles = Rol::all();
    $roles->prepend('None');  

    $roles1 = Rol::all();

    return view('certificacion.auditoriaProgramas.ver_planauditoria')
           ->with('auditoriaPrograma', $auditoriaPrograma)
           ->with('normasCriterios', $normasCriterios)
           ->with('Personal', $Personal)
           ->with('Personal1', $Personal1)
           ->with('Repuesto', $Repuesto)
           ->with('Repuesto1', $Repuesto1)
           ->with('plan_aud', $plan_aud)
           ->with('modalidad', $modalidad)
           ->with('roles', $roles)
           ->with('roles1', $roles1)
           ->with('horaApertura',$horaApertura)
           ->with('horaCierre',$horaCierre)
           ->with('equipoAuditor', $equipoAuditor)
           ->with('agendaAuditoria', $agendaAuditoria)
           ->with('horaInicio',$horaInicio)
           ->with('horaFin',$horaFin)
           ->with('id_auditoriaprog',$id_auditoriaprog);
}


}
