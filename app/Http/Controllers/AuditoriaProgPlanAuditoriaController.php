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
use App\Models\PlanAuditoriaSeguimiento;
use App\Models\PlanAuditoriaSeguimientoHallazgos;
class AuditoriaProgPlanAuditoriaController extends Controller
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

    return view('certificacion.auditoriaProgramas.ver_tablas_auditoriaprogplanauditoria')
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
     

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

        $normasCriterios = PlanAuditoriaNormasCriterios::getCriterios($id_planauditoria);
        $equipoAuditor = PlanAuditoriaEquipoAuditor::getEquipoAuditor($id_planauditoria);
        $agendaAuditoria = PlanAuditoriaAgendaAuditoria::getAgendaAuditoria($id_planauditoria);

        $horaApertura = date('H:i', strtotime($auditoriaPrograma->hora_reunion_apertura));
        $horaCierre = date('H:i', strtotime($auditoriaPrograma->hora_reunion_cierre));

        $agendaHoras = [];
        $horaInicio = '00:00';
        $horaFin = '00:00';

if (count($agendaAuditoria) > 0) {
    foreach ($agendaAuditoria as $agenda) {
        $horaInicio = isset($agenda->hora_inicio) ? date('H:i', strtotime($agenda->hora_inicio)) : $horaInicio;
        $horaFin = isset($agenda->hora_fin) ? date('H:i', strtotime($agenda->hora_fin)) : $horaFin;

        if ($horaInicio && $horaFin) {
            $agendaHoras[] = [
                'hora_inicio' => $horaInicio,
                'hora_fin' => $horaFin
            ];
        }
    }
} else {
    $agendaHoras[] = [
        'hora_inicio' => $horaInicio,
        'hora_fin' => $horaFin
    ];
}
      
    $Persona = \DB::select("select * from VWAU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA where id_planauditoria = ?", [$id_planauditoria]);
    $PersonalAgenda = collect($Persona);
    $PersonalAgenda->prepend('None');  

    $Persona = \DB::select("select * from VWAU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA where id_planauditoria = ?", [$id_planauditoria]);
    $PersonalAgenda1 = collect($Persona);


    $Personal = Personal::getPersonalWithRango();
    $Personal->prepend('None');  
        $Personal1 = Personal::getPersonalWithRango();


        $auditoriaProgramaIdPrograma = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('id_auditoriaprog', $id_auditoriaprog)
        ->first();
        
        $IdPrograma = $auditoriaProgramaIdPrograma ? $auditoriaProgramaIdPrograma->IdPrograma : '';

        $Repuestos = \DB::select("select * from AUFACVW_BaseCertificacion_Programa where IdPrograma = ?", [$IdPrograma]);
        $Repuesto = collect($Repuestos);

        $Repuesto1 = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortByDesc("Nombre");
      

        $plan_audi = \DB::select("select * from vw_cp_plan_auditoria");
        $plan_aud = collect($plan_audi);
        $plan_aud->prepend('None');

        $modali = \DB::select("select * from vw_cp_modalidad");
        $modalidad = collect($modali);
        $modalidad->prepend('None');
 
        $rol = \DB::select("select * from vw_cp_roles_planauditoria");
        $roles = collect($rol);
        $roles->prepend('None');

        $rol1 = \DB::select("select * from vw_cp_roles_planauditoria");
        $roles1 = collect($rol1);

        $cargo = \DB::select("select * from vw_cp_cargos");
        $cargos = collect($cargo);
        $cargos->prepend('None');

        return view('certificacion.auditoriaProgramas.editar_planauditoria')
               ->with('auditoriaPrograma', $auditoriaPrograma)
               ->with('normasCriterios', $normasCriterios)
               ->with('Personal', $Personal)
               ->with('Personal1', $Personal1)
               ->with('PersonalAgenda', $PersonalAgenda)
               ->with('PersonalAgenda1', $PersonalAgenda1)
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
               ->with('id_auditoriaprog', $id_auditoriaprog)
               ->with('agendaHoras', $agendaHoras)
               ->with('cargos', $cargos);
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

        $request->validate([
            'planauditoria_id_listas' => 'required',
            'modalidad_id_listas' => 'required',
            'objetivo_auditoria' => 'required',
            'alcance_auditoria' => 'required',
            'id_firma1' => 'required',
            'id_cargo_firma1' => 'required',
            'id_firma2' => 'required',
            'id_cargo_firma2' => 'required',
            'id_integrante.*' => 'required',
            'id_rol.*' => 'required'
        ], [
            'planauditoria_id_listas.required' => 'Por favor seleccione un plan de auditoría.',
            'modalidad_id_listas.required' => 'Por favor seleccione una modalidad.',
            'objetivo_auditoria.required' => 'Por favor escriba un objetivo.',
            'alcance_auditoria.required' => 'Por favor escriba un alcance.',
            'id_firma1.required' => 'Por favor seleccione una firma.',
            'id_cargo_firma1.required' => 'Por favor seleccione un cargo.',
            'id_firma2.required' => 'Por favor seleccione una firma.',
            'id_cargo_firma2.required' => 'Por favor seleccione un cargo.',
            'id_integrante.*.required' => 'Por favor seleccione un integrante.',
            'id_rol.*.required' => 'Por favor seleccione un rol.',
            'auditado.required' => 'Por favor escriba un auditado'

        ]);

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
       $planauditoria->id_firma1 = $request->input('id_firma1');
       $planauditoria->id_firma2 = $request->input('id_firma2');
       $planauditoria->auditor_lider = $request->input('auditor_lider');
       $planauditoria->representante_legal = $request->input('representante_legal');
       $planauditoria->id_cargo_firma1 = $request->input('id_cargo_firma1');
       $planauditoria->id_cargo_firma2 = $request->input('id_cargo_firma2');
       $planauditoria->save();

       $id_planauditoria = $planauditoria->getKey();

      

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
    // Eliminar normas y criterios
    $normasCriterios = PlanAuditoriaNormasCriterios::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($normasCriterios as $norma) {
        $norma->delete();
    }

    // Eliminar equipo auditor
    $equipoAuditor = PlanAuditoriaEquipoAuditor::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($equipoAuditor as $equipo) {
        $equipo->delete();
    }

    // Eliminar agenda auditoría
    $agendaAuditoria = PlanAuditoriaAgendaAuditoria::where('id_planauditoria', $id_planauditoria)->get();
    foreach ($agendaAuditoria as $agenda) {
        $agenda->delete();
    }

$datosseguimiento= \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimiento')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();

    if($datosseguimiento){


    $id_planauditoriaseguimiento = $datosseguimiento->id_planauditoriaseguimiento;

    $planauditoriaseguimiento = PlanAuditoriaSeguimientoHallazgos::where('id_planauditoriaseguimiento', $id_planauditoriaseguimiento)->get();
    foreach ($planauditoriaseguimiento  as $hallazgos) {
        $hallazgos->delete();
    }


    $planauditoriaseguimiento = PlanAuditoriaSeguimiento::find($id_planauditoriaseguimiento);
    if ($planauditoriaseguimiento) {
        $planauditoriaseguimiento->delete();
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

$datos = \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();


    if ($datos) {
        $id_planinformeauditoria = $datos->id_planinformeauditoria;
    
        
        $informeauditoriahallazgos = PlanInformeAuditoriaProgHallazgos::where('id_planinformeauditoria', $id_planinformeauditoria)->get();
        
        foreach ($informeauditoriahallazgos as $hallazgo) {
            
            \DB::table('Au_Reg_AuditoriaProgramasPlanInformeAuditoriaHallazgos')
                ->where('id_planinformeauditoria', $hallazgo->id_planinformeauditoria)
                ->delete();
            
            
            $hallazgo->delete();
        }
    
        
        $informeauditoria = PlanInformeAuditoriaProg::find($id_planinformeauditoria);
        if ($informeauditoria) {
            $informeauditoria->delete();
        }
    }
    
   
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



    $auditoriaProgramaIdPrograma = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('id_auditoriaprog', $id_auditoriaprog)
        ->first();
        
        $IdPrograma = $auditoriaProgramaIdPrograma ? $auditoriaProgramaIdPrograma->IdPrograma : '';

        $Repuestos = \DB::select("select * from AUFACVW_BaseCertificacion_Programa where IdPrograma = ?", [$IdPrograma]);
        $Repuesto = collect($Repuestos);

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

public function guardar(Request $request)
{
    
    $id_integrante = $request->input('id_integrante');
    $id_rol = $request->input('id_rol');
    $id_planauditoria = $request->input('id_planauditoria');
    $id_equipoauditor = $request->input('id_equipoauditor'); 

    
    if (is_null($id_planauditoria)) {
        return response()->json(['error' => 'El id_planauditoria es requerido.'], 400);
    }

    
    if (count($id_integrante) !== count($id_rol) || count($id_integrante) !== count($id_equipoauditor)) {
        return response()->json(['error' => 'El número de elementos en id_integrante, id_rol y id_equipoauditor debe ser el mismo.'], 400);
    }

    
    \Log::info('Datos recibidos', [
        'id_integrante' => $id_integrante,
        'id_rol' => $id_rol,
        'id_planauditoria' => $id_planauditoria,
        'id_equipoauditor' => $id_equipoauditor,
    ]);

    
    foreach ($id_integrante as $index => $integrante) {
        
        \Log::info('Comprobando si existe el equipo auditor', [
            'id_equipoauditor' => $id_equipoauditor[$index],
            'id_planauditoria' => $id_planauditoria
        ]);

        
        $equipoAuditor = PlanAuditoriaEquipoAuditor::where('id_equipoauditor', $id_equipoauditor[$index])
                                                    ->where('id_planauditoria', $id_planauditoria) 
                                                    ->first();  

                                                    if ($equipoAuditor) {
                                                        
                                                        \Log::info('Actualizando equipo auditor', [
                                                            'id_equipoauditor' => $id_equipoauditor[$index],
                                                            'id_integrante' => $integrante,
                                                            'id_rol' => $id_rol[$index]
                                                        ]);
                                                    
                                                        if ($id_rol[$index] == 2011) {
                                                            $Personal = \App\Models\Personal::getPersonalWithRango()->where('IdPersonal', $integrante)->first();
                                                            $nombreIntegrante = $Personal ? $Personal->Nombres : 'Nombre no disponible';  
                                                    
                                                            \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoria') 
                                                                ->where('id_planauditoria', $id_planauditoria)
                                                                ->update(['auditor_lider' => $nombreIntegrante]);
                                                        }
                                                    
                                                        $equipoAuditor->id_integrante = $integrante;
                                                        $equipoAuditor->id_rol = $id_rol[$index];
                                                        $equipoAuditor->save(); 
                                                    
                                                    } else {
                                                        \Log::info('Creando nuevo equipo auditor', [
                                                            'id_planauditoria' => $id_planauditoria,
                                                            'id_integrante' => $integrante,
                                                            'id_rol' => $id_rol[$index]
                                                        ]);
                                                    
                                                        if ($id_rol[$index] == 2011) {
                                                            $Personal = \App\Models\Personal::getPersonalWithRango()->where('IdPersonal', $integrante)->first();
                                                            $nombreIntegrante = $Personal ? $Personal->Nombres : 'Nombre no disponible';  
                                                    
                                                            \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoria')
                                                            ->where('id_planauditoria', $id_planauditoria)
                                                            ->update(['auditor_lider' => $nombreIntegrante]);

                                                        }
                                                    
                                                        PlanAuditoriaEquipoAuditor::create([
                                                            'id_planauditoria' => $id_planauditoria,
                                                            'id_integrante' => $integrante,
                                                            'id_rol' => $id_rol[$index]
                                                        ]);
                                                    }
                                                    
                                                    
    }
    
    return response()->json(['success' => 'Datos guardados correctamente']);
}

public function guardarAgenda(Request $request)
{
       
    $proceso = $request->input('proceso', []);
    $Fecha = $request->input('Fecha', []);
    $hora_inicio = $request->input('hora_inicio', []);
    $hora_final = $request->input('hora_fin', []);
    $id_responsable = $request->input('id_responsable', []);
    $auditado = $request->input('auditado', []);
    $id_planauditoria = $request->input('id_planauditoria');
    $id_agendaauditoria = $request->input('id_agendaauditoria'); 

    if (is_null($id_planauditoria)) {
        return response()->json(['error' => 'El id_planauditoria es requerido.'], 400);
    }

    if (count($proceso) !== count($Fecha) || count($proceso) !== count($hora_inicio) || count($proceso) !== count($hora_final) ||
    count($proceso) !== count($id_responsable) || count($proceso) !== count($auditado)) {
    return response()->json(['error' => 'El número de procesos, horas, responsables y auditados no coincide.'], 400);
}



    foreach ($proceso as $index => $proceso) {
   
        $agendaAuditoria = PlanAuditoriaAgendaAuditoria::where('id_agendaauditoria', $id_agendaauditoria[$index])
                                                    ->where('id_planauditoria', $id_planauditoria) 
                                                    ->first();  

                                                    if ($agendaAuditoria) {
                                                       
                                                        
                                                        $agendaAuditoria->proceso = $proceso;
                                                        $agendaAuditoria->Fecha = $Fecha[$index];
                                                        $agendaAuditoria->hora_inicio = $hora_inicio[$index];
                                                        $agendaAuditoria->hora_fin = $hora_final[$index];
                                                        $agendaAuditoria->id_responsable = $id_responsable[$index];
                                                        $agendaAuditoria->auditado = $auditado[$index];
                                                        $agendaAuditoria->save();  
                                                    
                                                    } else {

                                                    
                                                        PlanAuditoriaAgendaAuditoria::create([
                                                            'id_planauditoria' => $id_planauditoria,
                                                            'proceso' => $proceso,
                                                            'Fecha' => $Fecha[$index],
                                                            'hora_inicio' => $hora_inicio[$index],
                                                            'hora_fin' => $hora_final[$index],
                                                            'id_responsable' => $id_responsable[$index],
                                                            'auditado' => $auditado[$index],
                                                        ]);
                                                    }
                                                    
                                                    
    }
    
    return response()->json(['success' => 'Datos guardados correctamente']);
}


public function eliminarEquipo(Request $request)
{
    $id_equipoauditor = $request->input('id_equipoauditor');
    
    
    if (!$id_equipoauditor) {
        return response()->json(['success' => false, 'message' => 'ID no proporcionado.']);
    }

    try {
        PlanAuditoriaAgendaAuditoria::where('id_responsable', $id_equipoauditor)
            ->update(['id_responsable' => NULL]);

            $id_rol = $request->input('id_rol'); 

        $equipoAuditor = \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA')
            ->where('id_equipoauditor', $id_equipoauditor)
            ->first(); 
        
        if ($equipoAuditor) {
            $id_planauditoria = $equipoAuditor->id_planauditoria;
            \Log::info('id_planauditoria: ' . $id_planauditoria);  

            $id_rol = $equipoAuditor->id_rol;
            \Log::info('id_rol: ' . $id_rol);
if ($id_rol == 2011) {
    \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->update(['auditor_lider' => 'SIN AUDITOR LÍDER ASOCIADO']);
}

        }

        PlanAuditoriaEquipoAuditor::where('id_equipoauditor', $id_equipoauditor)->delete();

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false, 
            'message' => 'Hubo un error al eliminar los registros: ' . $e->getMessage(),
            'error_details' => $e->getTraceAsString()  
        ]);
    }
}

public function eliminarAgenda(Request $request)
{
    $id_agendaauditoria = $request->input('id_agendaauditoria');
    
    if (!$id_agendaauditoria) {
        return response()->json(['success' => false, 'message' => 'ID no proporcionado.']);
    }

    try {
        $deleted = PlanAuditoriaAgendaAuditoria::where('id_agendaauditoria', $id_agendaauditoria)->delete();

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Registro eliminado exitosamente.']);
        } else {
            return response()->json(['success' => false, 'message' => 'No se pudo encontrar el registro para eliminar.']);
        }

    } catch (\Exception $e) {
        return response()->json([
            'success' => false, 
            'message' => 'Hubo un error al eliminar los registros: ' . $e->getMessage(),
            'error_details' => $e->getTraceAsString()
        ]);
    }
}




}
