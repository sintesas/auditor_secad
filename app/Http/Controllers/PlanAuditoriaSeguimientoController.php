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
class PlanAuditoriaSeguimientoController extends Controller
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
        'archivo.*' => 'required|file|max:2048', 
        'conclusiones' => 'required',
        'seguimiento.*' => 'required',
    ], [
        'conclusiones.required' => 'Por favor diligencié conclusiones.',
        'seguimiento.*.required' => 'Por favor diligencié seguimiento.',
    ]);


    $id_planauditoria = $request->input('id_planauditoria');

    $planaccion = new PlanAuditoriaSeguimiento;
    $planaccion->id_planauditoria = $id_planauditoria;
    $planaccion->fecha_seguimiento = $request->input('fecha_seguimiento');
    $planaccion->conclusiones = $request->input('conclusiones');
    $planaccion->save();

    $id_planauditoriaseguimiento = $planaccion->getKey();

    $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');
    $descripcion_hallazgos = $request->input('descripcion_hallazgos');
    $id_planaccionhallazgoslista_accionesmejora = $request->input('id_planaccionhallazgoslista_accionesmejora');
    $seguimiento = $request->input('seguimiento'); 


    if (count($id_informeauditoriahallazgos) !== count($descripcion_hallazgos) || 
        count($id_informeauditoriahallazgos) !== count($id_planaccionhallazgoslista_accionesmejora) || 
        count($id_informeauditoriahallazgos) !== count($seguimiento)) {
        
        return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
    }

    foreach ($id_informeauditoriahallazgos as $index => $hallazgos) {
        $planaccionhallazgoslista = new PlanAuditoriaSeguimientoHallazgos;
        $planaccionhallazgoslista->id_planauditoriaseguimiento = $id_planauditoriaseguimiento; 
        $planaccionhallazgoslista->id_informeauditoriahallazgos = $hallazgos;
        $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index]; 
        $planaccionhallazgoslista->id_planaccionhallazgoslista_accionesmejora = $id_planaccionhallazgoslista_accionesmejora[$index]; 
        $planaccionhallazgoslista->seguimiento = $seguimiento[$index]; 

if ($request->hasFile('archivos') && isset($request->file('archivos')[$index])) {
    $archivo = $request->file('archivos')[$index];
    if ($archivo) {
        $nombreArchivo = $archivo->getClientOriginalName();
        
        $nombreArchivoLimpiado = str_replace(':', '_', $nombreArchivo);
        $nombreArchivoLimpiado = preg_replace('/[\/:*?"<>|]/', '_', $nombreArchivoLimpiado);
        $nombreArchivoLimpiado = preg_replace('/[\p{C}]/u', '', $nombreArchivoLimpiado); 
        
        $nombreArchivoLimpiado = str_replace("\u{202F}", '', $nombreArchivoLimpiado); 

        $ruta = $archivo->storeAs('public/seguimiento', $nombreArchivoLimpiado);
        
        $planaccionhallazgoslista->nombre_archivo = $nombreArchivoLimpiado; 
        $planaccionhallazgoslista->ruta = $ruta; 
    }
}



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
            $planinforme = PlanAccionHallazgos::getPlanAccion($id_planauditoria)->first();
            $id_planinformeauditoria = $planinforme->id_planaccionhallazgos;
            $planinformehallazgos = PlanAuditoriaSeguimientoHallazgos::getHallazgosNoConformidad($id_planinformeauditoria);
            $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
            $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';

    
           
     
  
            return view ('certificacion.auditoriaProgramas.crear_planauditoriasegumiento')
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
        
        $seguimiento = PlanAuditoriaSeguimiento::getSeguimiento($id_planauditoria)->first();
        $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();        

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

        $planinforme = PlanAccionHallazgos::getPlanAccion($id_planauditoria)->first();
        $id_planinformeauditoria = $planinforme->id_planaccionhallazgos;
        $planinformehallazgos = PlanAuditoriaSeguimientoHallazgos::getHallazgosNoConformidad($id_planinformeauditoria);

        $id_planauditoriaseguimiento = $seguimiento->id_planauditoriaseguimiento;
        $seguimientoHallazgos = PlanAuditoriaSeguimientoHallazgos::getHallazgos($id_planauditoriaseguimiento);

        $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
        $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


        




        return view('certificacion.auditoriaProgramas.editar_planauditoriaseguimiento')
               ->with('seguimiento', $seguimiento)
               ->with('seguimientoHallazgos', $seguimientoHallazgos)
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
    public function update(Request $request, $id_planauditoriaseguimiento)
{
    // Validación de los campos del formulario
    $request->validate([
        'archivo.*' => 'required|file|max:2048', 
        'conclusiones' => 'required',
        'seguimiento.*' => 'required',
    ], [
        'conclusiones.required' => 'Por favor diligencié conclusiones.',
        'seguimiento.*.required' => 'Por favor diligencié seguimiento.',
    ]);


    $planaccion = PlanAuditoriaSeguimiento::find($id_planauditoriaseguimiento);
    $planaccion->id_planauditoria = $request->input('id_planauditoria');
    $planaccion->fecha_seguimiento = $request->input('fecha_seguimiento');
    $planaccion->conclusiones = $request->input('conclusiones');
    $planaccion->save();

    $id_planauditoriaseguimiento = $planaccion->getKey();

    $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');
    $descripcion_hallazgos = $request->input('descripcion_hallazgos');
    $id_planaccionhallazgoslista_accionesmejora = $request->input('id_planaccionhallazgoslista_accionesmejora');
    $seguimiento = $request->input('seguimiento');
    
    if (count($id_informeauditoriahallazgos) !== count($descripcion_hallazgos) || 
        count($id_informeauditoriahallazgos) !== count($id_planaccionhallazgoslista_accionesmejora) || 
        count($id_informeauditoriahallazgos) !== count($seguimiento)) {
        
        return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
    }
    
    foreach ($id_informeauditoriahallazgos as $index => $hallazgos) {
        $planaccionhallazgoslista = PlanAuditoriaSeguimientoHallazgos::where([
            'id_planauditoriaseguimiento' => $id_planauditoriaseguimiento,
            'id_informeauditoriahallazgos' => $hallazgos
        ])->first(); 
    
        if ($planaccionhallazgoslista) {
            $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index];
            $planaccionhallazgoslista->id_planaccionhallazgoslista_accionesmejora = $id_planaccionhallazgoslista_accionesmejora[$index];
            $planaccionhallazgoslista->seguimiento = $seguimiento[$index];
        } else {
            $planaccionhallazgoslista = new PlanAuditoriaSeguimientoHallazgos;
            $planaccionhallazgoslista->id_planauditoriaseguimiento = $id_planauditoriaseguimiento;
            $planaccionhallazgoslista->id_informeauditoriahallazgos = $hallazgos;
            $planaccionhallazgoslista->descripcion_hallazgos = $descripcion_hallazgos[$index];
            $planaccionhallazgoslista->id_planaccionhallazgoslista_accionesmejora = $id_planaccionhallazgoslista_accionesmejora[$index];
            $planaccionhallazgoslista->seguimiento = $seguimiento[$index];
        }
    
       
        if ($request->hasFile('archivos') && isset($request->file('archivos')[$index])) {
            $archivo = $request->file('archivos')[$index];
            if ($archivo) {
                
                $nombreArchivo = $archivo->getClientOriginalName();
                
                
                $nombreArchivoLimpiado = str_replace(':', '_', $nombreArchivo); 
                $nombreArchivoLimpiado = preg_replace('/[\/:*?"<>|]/', '_', $nombreArchivoLimpiado); 
                $nombreArchivoLimpiado = preg_replace('/[\p{C}]/u', '', $nombreArchivoLimpiado); 
                
                
                $nombreArchivoLimpiado = str_replace("\u{202F}", '', $nombreArchivoLimpiado); 
    
                
                $ruta = $archivo->storeAs('public/seguimiento', $nombreArchivoLimpiado);
                
                
                $planaccionhallazgoslista->nombre_archivo = $nombreArchivoLimpiado;
                $planaccionhallazgoslista->ruta = $ruta;
            }
        } else {
           
            $hallazgoExistente = PlanAuditoriaSeguimientoHallazgos::where('id_planauditoriaseguimiento', $id_planauditoriaseguimiento)
                ->where('id_informeauditoriahallazgos', $hallazgos)
                ->first();
    
            if ($hallazgoExistente) {
                
                $planaccionhallazgoslista->nombre_archivo = $hallazgoExistente->nombre_archivo;
                $planaccionhallazgoslista->ruta = $hallazgoExistente->ruta;
            }
        }
    
        
        $planaccionhallazgoslista->save();
    }

    
    $id_planauditoria = \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimiento')
        ->where('id_planauditoriaseguimiento', $id_planauditoriaseguimiento)
        ->select('id_planauditoria')
        ->first();

    $id_planauditoria = $id_planauditoria->id_planauditoria;

    
    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();
    $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';

    $notification = array(
        'message' => 'Seguimiento Editado Correctamente',
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
    $seguimiento = PlanAuditoriaSeguimiento::getSeguimiento($id_planauditoria)->first();
    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();    

    $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;

    $planinforme = PlanAccionHallazgos::getPlanAccion($id_planauditoria)->first();
    $id_planinformeauditoria = $planinforme->id_planaccionhallazgos;
    $planinformehallazgos = PlanAuditoriaSeguimientoHallazgos::getHallazgosNoConformidad($id_planinformeauditoria);

    $id_planauditoriaseguimiento = $seguimiento->id_planauditoriaseguimiento;
    $seguimientoHallazgos = PlanAuditoriaSeguimientoHallazgos::getHallazgos($id_planauditoriaseguimiento);

    $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
    $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';





    return view('certificacion.auditoriaProgramas.ver_planauditoriaseguimiento')
           ->with('seguimiento', $seguimiento)
           ->with('seguimientoHallazgos', $seguimientoHallazgos)
           ->with('id_auditoriaprog', $id_auditoriaprog)
           ->with('auditoriaPrograma', $auditoriaPrograma)
           ->with('Consecutivo', $Consecutivo)
           ->with('plan_auditoria', $plan_auditoria);
    }

    public function descargarArchivo($id_planaudseguimientohallazgo)
    {
        $hallazgo = PlanAuditoriaSeguimientoHallazgos::find($id_planaudseguimientohallazgo);
        
        if (!$hallazgo || empty($hallazgo->nombre_archivo)) {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
    
        $filePath = storage_path('app/public/seguimiento/' . $hallazgo->nombre_archivo);
        
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'Archivo no encontrado en el servidor.');
        }
    }
    

}
