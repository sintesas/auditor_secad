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
class PlanAccionHallazgosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
       
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

        $request->validate([
            'observaciones' => 'required',
            'causa_raiz.*' => 'required',
            'acciones_mejora.*' => 'required',
            'evaluacion.*' => 'required',
        ], [
            'observaciones.required' => 'Por favor diligencié observaciones.',
            'causa_raiz.*.required' => 'Por favor diligencié causa_raiz.',
            'acciones_mejora.*.required' => 'Por favor diligencié acciones mejora.',
            'evaluacion.*.required' => 'Por favor diligencié evaluación.',
        ]);

        $id_planauditoria = $request->input('id_planauditoria');

        $planaccion = new PlanAccionHallazgos;
        $planaccion->id_planauditoria = $request->input('id_planauditoria');
        $planaccion->fecha_planaccion = $request->input('fecha_planaccion');
        $planaccion->observaciones = $request->input('observaciones');
        $planaccion->save();

        $id_planaccionhallazgos = $planaccion->getKey();

       $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');
       $descripcion_hallazgos = $request->input('descripcion_hallazgos');
       $causa_raiz = $request->input('causa_raiz');
       $acciones_mejora = $request->input('acciones_mejora');
       $fecha_inicio = $request->input('fecha_inicio');
       $fecha_fin = $request->input('fecha_fin');
       $evaluacion = $request->input('evaluacion');

    if (count($id_informeauditoriahallazgos) !== count($descripcion_hallazgos) || count($id_informeauditoriahallazgos) !== count($causa_raiz) ||
        count($id_informeauditoriahallazgos) !== count($acciones_mejora) || count($id_informeauditoriahallazgos) !== count($fecha_inicio) ||
        count($id_informeauditoriahallazgos) !== count($fecha_fin) || count($id_informeauditoriahallazgos) !== count($evaluacion)) {
        return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
    }

    
    foreach ($id_informeauditoriahallazgos as $index => $hallazgos) {
        $planaccionhallazgoslista = new PlanAccionHallazgosLista;
        $planaccionhallazgoslista->id_planaccionhallazgos = $id_planaccionhallazgos; 
        $planaccionhallazgoslista->id_informeauditoriahallazgos = $hallazgos;
        $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index]; 
        $planaccionhallazgoslista->causa_raiz = $causa_raiz[$index]; 
        $planaccionhallazgoslista->acciones_mejora = $acciones_mejora[$index]; 
        $planaccionhallazgoslista->fecha_inicio = $fecha_inicio[$index]; 
        $planaccionhallazgoslista->fecha_fin = $fecha_fin[$index]; 
        $planaccionhallazgoslista->evaluacion = $evaluacion[$index]; 
        $planaccionhallazgoslista->save();
    }

    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();
    $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';


    $notification = array(
        'message' => 'Plan Acción Creado Correctamente',
        'alert-type' => 'success'
    );
    return redirect()->to('auditoriaprogplanauditoria/' . $id_auditoriaprog)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_planauditoria)
    {
        $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
            ->where('id_planauditoria', $id_planauditoria)
            ->first();

            $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';
            $planinforme = PlanInformeAuditoriaProg::getInformeAuditoria($id_planauditoria)->first();
            $id_planinformeauditoria = $planinforme->id_planinformeauditoria;
            $planinformehallazgos = PlanInformeAuditoriaProgHallazgos::getHallazgosNoConformidad($id_planinformeauditoria);
            $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
            $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


          
    
           
     
  
            return view ('certificacion.auditoriaProgramas.crear_planaccionhallazgos')
                   ->with('id_planauditoria', $id_planauditoria)
                   ->with('id_auditoriaprog', $id_auditoriaprog)
                   ->with('planinformehallazgos', $planinformehallazgos)
                   ->with('auditoriaPrograma', $auditoriaPrograma)
                   ->with('Consecutivo', $Consecutivo)
                   ->with('plan_auditoria', $plan_auditoria);
        }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_planauditoria)
    {
        
        $planaccion = PlanAccionHallazgos::getPlanAccion($id_planauditoria)->first();
        $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();        

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

        $planinforme = PlanInformeAuditoriaProg::getInformeAuditoria($id_planauditoria)->first();
        $id_planaccionhallazgos = $planaccion->id_planaccionhallazgos;
        $planaccionhallazgoslista = PlanAccionHallazgosLista::getHallazgos($id_planaccionhallazgos);
        
        $id_planinformeauditoria = $planinforme->id_planinformeauditoria;

        $planinformehallazgos = PlanInformeAuditoriaProgHallazgos::getHallazgosNoConformidad($id_planinformeauditoria);



        $hallazgos = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinfo = collect($hallazgos);
        $hallazgosinfo->prepend('None');

        $hallazgosi = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinforme = collect($hallazgosi);

        $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
        $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


 

        return view('certificacion.auditoriaProgramas.editar_planaccionhallazgos')
               ->with('planaccion', $planaccion)
               ->with('planaccionhallazgoslista', $planaccionhallazgoslista)
               ->with('id_auditoriaprog', $id_auditoriaprog)
               ->with('auditoriaPrograma', $auditoriaPrograma)
               ->with('planinformehallazgos', $planinformehallazgos)
               ->with('Consecutivo', $Consecutivo)
               ->with('plan_auditoria', $plan_auditoria);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_planaccionhallazgos)
    {

        $request->validate([
            'observaciones' => 'required',
            'causa_raiz.*' => 'required',
            'acciones_mejora.*' => 'required',
            'evaluacion.*' => 'required',
        ], [
            'observaciones.required' => 'Por favor diligencié observaciones.',
            'causa_raiz.*.required' => 'Por favor diligencié causa_raiz.',
            'acciones_mejora.*.required' => 'Por favor diligencié acciones mejora.',
            'evaluacion.*.required' => 'Por favor diligencié evaluación.',
        ]);

        $planaccion = PlanAccionHallazgos::find($id_planaccionhallazgos);
        $planaccion->id_planauditoria = $request->input('id_planauditoria');
        $planaccion->fecha_planaccion = $request->input('fecha_planaccion');
        $planaccion->observaciones = $request->input('observaciones');
        $planaccion->save();

        $id_planaccionhallazgos = $planaccion->getKey();

        
        $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');
$descripcion_hallazgos = $request->input('descripcion_hallazgos');
$causa_raiz = $request->input('causa_raiz');
$acciones_mejora = $request->input('acciones_mejora');
$fecha_inicio = $request->input('fecha_inicio');
$fecha_fin = $request->input('fecha_fin');
$evaluacion = $request->input('evaluacion');

if (count($id_informeauditoriahallazgos) !== count($descripcion_hallazgos) || 
    count($id_informeauditoriahallazgos) !== count($causa_raiz) ||
    count($id_informeauditoriahallazgos) !== count($acciones_mejora) || 
    count($id_informeauditoriahallazgos) !== count($fecha_inicio) ||
    count($id_informeauditoriahallazgos) !== count($fecha_fin) || 
    count($id_informeauditoriahallazgos) !== count($evaluacion)) {
    return response()->json(['error' => 'El número de elementos no coincide.'], 400);
}

foreach ($id_informeauditoriahallazgos as $index => $hallazgos_id) {
    $planaccionhallazgoslista = PlanAccionHallazgosLista::where('id_informeauditoriahallazgos', $hallazgos_id)->first();

    if ($planaccionhallazgoslista) {
        $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index];
        $planaccionhallazgoslista->causa_raiz = $causa_raiz[$index];
        $planaccionhallazgoslista->acciones_mejora = $acciones_mejora[$index];
        $planaccionhallazgoslista->fecha_inicio = $fecha_inicio[$index];
        $planaccionhallazgoslista->fecha_fin = $fecha_fin[$index];
        $planaccionhallazgoslista->evaluacion = $evaluacion[$index];
        $planaccionhallazgoslista->save(); 
    } else {
        $planaccionhallazgoslista = new PlanAccionHallazgosLista;
        $planaccionhallazgoslista->id_planaccionhallazgos = $id_planaccionhallazgos;  
        $planaccionhallazgoslista->id_informeauditoriahallazgos = $hallazgos_id;
        $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index];
        $planaccionhallazgoslista->causa_raiz = $causa_raiz[$index];
        $planaccionhallazgoslista->acciones_mejora = $acciones_mejora[$index];
        $planaccionhallazgoslista->fecha_inicio = $fecha_inicio[$index];
        $planaccionhallazgoslista->fecha_fin = $fecha_fin[$index];
        $planaccionhallazgoslista->evaluacion = $evaluacion[$index];
        $planaccionhallazgoslista->save(); 
    }
}
        


   

    $id_planauditoria = \DB::table('AU_Reg_AuditoriaProgramasPlanAccionHallazgos')
    ->where('id_planaccionhallazgos', $id_planaccionhallazgos)
    ->select('id_planauditoria')
    ->first();


    $id_planauditoria = $id_planauditoria->id_planauditoria;

    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();
    $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';
         
    $notification = array(
        'message' => 'Plan Acción Editado Correctamente',
        'alert-type' => 'success'
    );

    return redirect()->to('auditoriaprogplanauditoria/' . $id_auditoriaprog)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   



public function view($id_planauditoria)
{
    $planaccion = PlanAccionHallazgos::getPlanAccion($id_planauditoria)->first();
    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();        

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

        $planinforme = PlanInformeAuditoriaProg::getInformeAuditoria($id_planauditoria)->first();
        $id_planaccionhallazgos = $planaccion->id_planaccionhallazgos;
        $planaccionhallazgoslista = PlanAccionHallazgosLista::getHallazgos($id_planaccionhallazgos);
          



        $hallazgos = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinfo = collect($hallazgos);
        $hallazgosinfo->prepend('None');

        $hallazgosi = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinforme = collect($hallazgosi);

        $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
        $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


 

        return view('certificacion.auditoriaProgramas.ver_planaccionhallazgos')
               ->with('planaccion', $planaccion)
               ->with('planaccionhallazgoslista', $planaccionhallazgoslista)
               ->with('id_auditoriaprog', $id_auditoriaprog)
               ->with('auditoriaPrograma', $auditoriaPrograma)
               ->with('Consecutivo', $Consecutivo)
               ->with('plan_auditoria', $plan_auditoria);

    }
}
