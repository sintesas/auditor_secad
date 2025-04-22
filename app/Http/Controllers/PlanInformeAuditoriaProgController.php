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
use App\Models\PlanAccionHallazgosLista;
use App\Models\PlanAuditoriaSeguimientoHallazgos;

class PlanInformeAuditoriaProgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //Get Dates
       
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
            'desarrollo_auditoria' => 'required',
            'conclusiones_hallazgos' => 'required',
            'tipohallazgo_id_listas.*' => 'required',
            'descripcion.*' => 'required',
        ], [
            'desarrollo_auditoria.required' => 'Por favor diligencié desarrollo auditoría.',
            'conclusiones_hallazgos.required' => 'Por favor diligencié conclusiones hallazgos.',
            'tipohallazgo_id_listas.*.required' => 'Por favor seleccione un tipo hallazgo.',
            'descripcion.*.required' => 'Por favor diligencié descripción hallazgo.',
        ]);
        

        $id_planauditoria = $request->input('id_planauditoria');

        $informeauditoria = new PlanInformeAuditoriaProg;
        $informeauditoria->id_planauditoria = $request->input('id_planauditoria');
        $informeauditoria->fecha_informe_auditoria = $request->input('fecha_informe_auditoria');
        $informeauditoria->desarrollo_auditoria = $request->input('desarrollo_auditoria');
        $informeauditoria->total_conformidades = $request->input('total_conformidades');
        $informeauditoria->total_no_conformidades_menor = $request->input('total_no_conformidades_menor');
        $informeauditoria->total_oportunidad_mejora = $request->input('total_oportunidad_mejora');
        $informeauditoria->total_no_conformidades_mayor = $request->input('total_no_conformidades_mayor');
        $informeauditoria->conclusiones_hallazgos = $request->input('conclusiones_hallazgos');
        $informeauditoria->save();

        $id_planinformeauditoria = $informeauditoria->getKey();

      // $tipohallazgo_id_listas = $request->input('tipohallazgo_id_listas');
     //  $descripcion = $request->input('descripcion');

   // if (count($tipohallazgo_id_listas) !== count($descripcion)) {
      //  return response()->json(['error' => 'El número de integrantes y roles no coincide.'], 400);
    //}

    
   // foreach ($tipohallazgo_id_listas as $index => $integrante) {
      //  $NormasCriterios = new PlanInformeAuditoriaProgHallazgos;
       // $NormasCriterios->id_planinformeauditoria = $id_planinformeauditoria; 
      //  $NormasCriterios->tipohallazgo_id_listas = $integrante;
      //  $NormasCriterios->descripcion = $descripcion[$index]; // Usa el mismo índice para obtener el rol
      //  $NormasCriterios->save();
    //}

    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();
    $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';


    $notification = array(
        'message' => 'Informe Auditoria Creado Correctamente',
        'alert-type' => 'success'
    );

  
    return redirect()->route('planinformeauditoriaprog.edit', $id_planauditoria)->with($notification);

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
            $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
            $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


    
            $hallazgos = \DB::select("select * from vw_cp_tipo_hallazgo");
            $hallazgosinfo = collect($hallazgos);
            $hallazgosinfo->prepend('None');

            $hallazgosi = \DB::select("select * from vw_cp_tipo_hallazgo");
            $hallazgosinforme = collect($hallazgosi);
     
  
            return view ('certificacion.auditoriaProgramas.crearinformeauditoria')
                   ->with('id_planauditoria', $id_planauditoria)
                   ->with('hallazgosinfo', $hallazgosinfo)
                   ->with('hallazgosinforme', $hallazgosinforme)
                   ->with('id_auditoriaprog', $id_auditoriaprog)
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


        
        $planinforme = PlanInformeAuditoriaProg::getInformeAuditoria($id_planauditoria)->first();
        $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();        

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;
        $id_planinformeauditoria = $planinforme->id_planinformeauditoria;
        $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
        $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';

        $planinformehallazgos = PlanInformeAuditoriaProgHallazgos::getHallazgos($id_planinformeauditoria);


        $hallazgos = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinfo = collect($hallazgos);
        $hallazgosinfo->prepend('None');

        $hallazgosi = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinforme = collect($hallazgosi);
 

        return view('certificacion.auditoriaProgramas.editarinformeauditoria')
               ->with('planinforme', $planinforme)
               ->with('hallazgosinfo', $hallazgosinfo)
               ->with('hallazgosinforme', $hallazgosinforme)
               ->with('planinformehallazgos', $planinformehallazgos)
               ->with('id_auditoriaprog', $id_auditoriaprog)
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
    public function update(Request $request, $id_planinformeauditoria)
    {

        $request->validate([
            'desarrollo_auditoria' => 'required',
            'conclusiones_hallazgos' => 'required',
            'tipohallazgo_id_listas.*' => 'required',
            'descripcion.*' => 'required',
        ], [
            'desarrollo_auditoria.required' => 'Por favor diligencié desarrollo auditoría.',
            'conclusiones_hallazgos.required' => 'Por favor diligencié conclusiones hallazgos.',
            'tipohallazgo_id_listas.*.required' => 'Por favor seleccione un tipo hallazgo.',
            'descripcion.*.required' => 'Por favor diligencié descripción hallazgo.',
        ]);


       $informeauditoria = PlanInformeAuditoriaProg::find($id_planinformeauditoria);
       $informeauditoria->id_planauditoria = $request->input('id_planauditoria');
       $informeauditoria->fecha_informe_auditoria = $request->input('fecha_informe_auditoria');
       $informeauditoria->desarrollo_auditoria = $request->input('desarrollo_auditoria');
       $informeauditoria->total_conformidades = $request->input('total_conformidades');
       $informeauditoria->total_no_conformidades_menor = $request->input('total_no_conformidades_menor');
       $informeauditoria->total_oportunidad_mejora = $request->input('total_oportunidad_mejora');
       $informeauditoria->total_no_conformidades_mayor = $request->input('total_no_conformidades_mayor');
       $informeauditoria->conclusiones_hallazgos = $request->input('conclusiones_hallazgos');
       $informeauditoria->save();

       $id_planinformeauditoria = $informeauditoria->getKey();

    

    
   

       $tipohallazgo_id_listas = $request->input('tipohallazgo_id_listas');
$descripcion = $request->input('descripcion');
$id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');


foreach ($tipohallazgo_id_listas as $index => $integrante) {
    
    if (isset($id_informeauditoriahallazgos[$index])) {
        
        $registro = PlanInformeAuditoriaProgHallazgos::find($id_informeauditoriahallazgos[$index]);

        if ($registro) {
            
            $registro->id_planinformeauditoria = $id_planinformeauditoria;
            $registro->tipohallazgo_id_listas = $integrante;
            $registro->descripcion = $descripcion[$index];
            $registro->save(); 
        }
    } else {
       
        $NormasCriterios = new PlanInformeAuditoriaProgHallazgos;
        $NormasCriterios->id_planinformeauditoria = $id_planinformeauditoria; 
        $NormasCriterios->tipohallazgo_id_listas = $integrante;
        $NormasCriterios->descripcion = $descripcion[$index]; 
        $NormasCriterios->save();
    }
}


    $id_planauditoria = \DB::table('AU_Reg_AuditoriaProgramasPlanInformeAuditoria')
    ->where('id_planinformeauditoria', $id_planinformeauditoria)
    ->select('id_planauditoria')
    ->first();


    $id_planauditoria = $id_planauditoria->id_planauditoria;

    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();
    $id_auditoriaprog = $auditoriaPrograma ? $auditoriaPrograma->id_auditoriaprog : '';
         
    $notification = array(
        'message' => 'Informe Auditoría Editado Correctamente',
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
   
     public function eliminarHallazgo(Request $request)
     {
         
         $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos');
         
         
         if (!$id_informeauditoriahallazgos) {
             return response()->json(['success' => false, 'message' => 'ID no proporcionado.']);
         }
 
         try {
             
             PlanAuditoriaSeguimientoHallazgos::where('id_informeauditoriahallazgos', $id_informeauditoriahallazgos)->delete();
 
            
             PlanAccionHallazgosLista::where('id_informeauditoriahallazgos', $id_informeauditoriahallazgos)->delete();
 
            
             PlanInformeAuditoriaProgHallazgos::where('id_informeauditoriahallazgos', $id_informeauditoriahallazgos)->delete();
 
             return response()->json(['success' => true]);
 
         } catch (\Exception $e) {
             
             return response()->json(['success' => false, 'message' => 'Hubo un error al eliminar los registros: ' . $e->getMessage()]);
         }
     }
     
     


public function view($id_planauditoria)
{
    $planinforme = PlanInformeAuditoriaProg::getInformeAuditoria($id_planauditoria)->first();
    $auditoriaPrograma = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
    ->where('id_planauditoria', $id_planauditoria)
    ->first();        

        $id_auditoriaprog = $auditoriaPrograma->id_auditoriaprog;
        $id_planinformeauditoria = $planinforme->id_planinformeauditoria;

        $planinformehallazgos = PlanInformeAuditoriaProgHallazgos::getHallazgos($id_planinformeauditoria);

        $Consecutivo = $auditoriaPrograma ? $auditoriaPrograma->no_programa : '';
        $plan_auditoria = $auditoriaPrograma ? $auditoriaPrograma->plan_auditoria : '';


        $hallazgos = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinfo = collect($hallazgos);
        $hallazgosinfo->prepend('None');

        $hallazgosi = \DB::select("select * from vw_cp_tipo_hallazgo");
        $hallazgosinforme = collect($hallazgosi);
 

        return view('certificacion.auditoriaProgramas.verinformeauditoria')
               ->with('planinforme', $planinforme)
               ->with('hallazgosinfo', $hallazgosinfo)
               ->with('hallazgosinforme', $hallazgosinforme)
               ->with('planinformehallazgos', $planinformehallazgos)
               ->with('id_auditoriaprog', $id_auditoriaprog)
               ->with('Consecutivo', $Consecutivo)
               ->with('plan_auditoria', $plan_auditoria);
    }

    public function guardarHallazgo(Request $request)
{
    $tipohallazgo_id_listas = $request->input('tipohallazgo_id_listas', []);
    $descripcion = $request->input('descripcion', []);
    $id_informeauditoriahallazgos = $request->input('id_informeauditoriahallazgos', []);
    $id_planinformeauditoria = $request->input('id_planinformeauditoria');

    if (is_null($id_planinformeauditoria)) {
        return response()->json(['error' => 'El id_planinformeauditoria es requerido.'], 400);
    }

    if (count($tipohallazgo_id_listas) !== count($descripcion) || count($tipohallazgo_id_listas) !== count($id_informeauditoriahallazgos)) {
        return response()->json(['error' => 'Las listas de tipohallazgo, descripción e id_informeauditoriahallazgos no coinciden en cantidad.'], 400);
    }

    foreach ($tipohallazgo_id_listas as $index => $integrante) {
        if (isset($id_informeauditoriahallazgos[$index])) {
            $registro = PlanInformeAuditoriaProgHallazgos::find($id_informeauditoriahallazgos[$index]);

            if ($registro) {
                $registro->id_planinformeauditoria = $id_planinformeauditoria;
                $registro->tipohallazgo_id_listas = $integrante;
                $registro->descripcion = $descripcion[$index];
                $registro->save();

                $accionHallazgo = PlanAccionHallazgosLista::where('id_informeauditoriahallazgos', $id_informeauditoriahallazgos[$index])->first();
                if ($accionHallazgo) {
                    $accionHallazgo->descripcion_hallazgos = $descripcion[$index];
                    $accionHallazgo->save();
                }

                $Seguimiento = PlanAuditoriaSeguimientoHallazgos::where('id_informeauditoriahallazgos', $id_informeauditoriahallazgos[$index])->first();
                if ($Seguimiento) {
                    $Seguimiento->descripcion_hallazgos = $descripcion[$index];
                    $Seguimiento->save();
                }
            }
        } else {
            PlanInformeAuditoriaProgHallazgos::create([
                'id_planinformeauditoria' => $id_planinformeauditoria,
                'tipohallazgo_id_listas' => $integrante,
                'descripcion' => $descripcion[$index], 
            ]);
        }
    }

    $informeauditoria = PlanInformeAuditoriaProg::where('id_planinformeauditoria', $id_planinformeauditoria)->first();

    if ($informeauditoria) {
        $informeauditoria->total_conformidades = $request->input('total_conformidades') ?? 0;
        $informeauditoria->total_no_conformidades_menor = $request->input('total_no_conformidades_menor') ?? 0;
        $informeauditoria->total_oportunidad_mejora = $request->input('total_oportunidades') ?? 0;
        $informeauditoria->total_no_conformidades_mayor = $request->input('total_no_conformidades_mayor') ?? 0;
    
        $informeauditoria->save();
    }
    

    return response()->json(['success' => 'Datos guardados correctamente']);
}


}
