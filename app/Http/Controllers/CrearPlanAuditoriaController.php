<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoPrograma;
use App\Models\Aeronave;
use App\Models\Estado;
use App\Models\Unidad;
use App\Models\Ata;
use App\Models\Empresa;
use App\Models\Programa;
use App\Models\DemandaPotencial;
use App\Models\VWPersonal;
use App\Models\Repuesto;
use App\Models\Referencia;
use App\Models\BaseCertificacion;
use App\Models\Personal;
use App\Models\AuditoriaProgPlanAuditoria;
use App\Models\PlanAuditoriaNormasCriterios;
use App\Models\Rol;
use App\Models\PlanAuditoriaEquipoAuditor;
use App\Models\PlanAuditoriaAgendaAuditoria;
class CrearPlanAuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
    //Get Dates
     
        
        $id_auditoriaprog = session('id_auditoriaprog');

        $auditoriaPrograma = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('id_auditoriaprog', $id_auditoriaprog)
        ->first();
        
        $consecutivo = $auditoriaPrograma ? $auditoriaPrograma->Consecutivo : '';
        $descripcion_programa = $auditoriaPrograma ? $auditoriaPrograma->descripcion_programa : '';
        $certificado_aplicable = $auditoriaPrograma ? $auditoriaPrograma->certificado_aplicable : '';
        $organizacion = $auditoriaPrograma ? $auditoriaPrograma->organizacion : '';

        $representantelegal = null;

        if ($organizacion) {
            
            $empresa = Empresa::where('NombreEmpresa', $organizacion)->first(['NombreCertificaInfo']);
            
            
            $representantelegal = $empresa ? $empresa->NombreCertificaInfo : null;
        }
        
        
        if ($representantelegal === null) {
            $representantelegal = 'PENDIENTE';
        }
        
        
      

        //Set Dropdown Personal
        $Personal = Personal::getPersonalWithRango();
        $Personal->prepend('None');  

        $Personal1 = Personal::getPersonalWithRango();


        $IdPrograma = $auditoriaPrograma ? $auditoriaPrograma->IdPrograma : '';

        $normasCriterios = PlanAuditoriaNormasCriterios::getCriteriosBaseCertificacion($IdPrograma);

        //Set Dropdown Repuesto
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


        return view ('certificacion.auditoriaProgramas.crear_planauditoria')
               ->with('consecutivo', $consecutivo)
               ->with('descripcion_programa', $descripcion_programa)
               ->with('certificado_aplicable', $certificado_aplicable)
               ->with('organizacion', $organizacion)
               ->with('Personal', $Personal)
               ->with('Personal1', $Personal1)
               ->with('Repuesto', $Repuesto)
               ->with('Repuesto1', $Repuesto1)
               ->with('plan_aud', $plan_aud)
               ->with('modalidad', $modalidad)
               ->with('id_auditoriaprog', $id_auditoriaprog)
               ->with('roles', $roles)
               ->with('roles1', $roles1)
               ->with('representantelegal', $representantelegal)
               ->with('normasCriterios', $normasCriterios)
               ->with('cargos', $cargos);
    }

    public function generate_numbers($start, $count, $digits) {
     $result = array();
     for ($n = $start; $n < $start + $count; $n++) {
        $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
     }
     return $result;
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

    public function setAuditoriaProgId($auditoriaProgId) {
        session(['id_auditoriaprog' => $auditoriaProgId]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        ]);
        
        
        $id_auditoriaprog = session('id_auditoriaprog');

       $planauditoria = new AuditoriaProgPlanAuditoria;

       // store info        
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

       $id_planauditoriocriterio = $request->input('id_planauditoriocriterio');
       if(is_array($id_planauditoriocriterio)){
           foreach ($id_planauditoriocriterio AS $value) {
               $NormasCriterios = new PlanAuditoriaNormasCriterios;
               $NormasCriterios->id_planauditoria = $id_planauditoria;
               $NormasCriterios->IdBaseCertificacion = $value;
               $NormasCriterios->save();
           }
       }
       
       

    /*$id_integrante = $request->input('id_integrante');
    $id_rol = $request->input('id_rol');

    if (count($id_integrante) !== count($id_rol)) {
        return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
    }

    foreach ($id_integrante as $index => $integrante) {
        $NormasCriterios = new PlanAuditoriaEquipoAuditor;
        $NormasCriterios->id_planauditoria = $id_planauditoria; 
        $NormasCriterios->id_integrante = $integrante;
        $NormasCriterios->id_rol = $id_rol[$index]; 
        $NormasCriterios->save();
    }*/

    /*
    $proceso = $request->input('proceso');
    $hora_inicio = $request->input('hora_inicio');
    $hora_final = $request->input('hora_fin');
    $id_responsable = $request->input('id_responsable');
    $auditado = $request->input('auditado');

    
    if (count($proceso) !== count($hora_inicio) || count($proceso) !== count($hora_final) ||
        count($proceso) !== count($id_responsable) || count($proceso) !== count($auditado)) {
        return response()->json(['error' => 'El número de procesos, horas, responsables y auditados no coincide.'], 400);
    }

    
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
        */

        $notification = array(
            'message' => 'Plan Auditoria Creado Correctamente',
            'alert-type' => 'success'
        );
        return redirect()->route('auditoriaprogplanauditoria.edit', $id_planauditoria)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}