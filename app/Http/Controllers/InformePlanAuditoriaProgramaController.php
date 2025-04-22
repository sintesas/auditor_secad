<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Programa;
use App\Models\InformeLAFR212;
use App\Models\ActividadesInformeLAFR212;
use App\Models\ObservacionesLAFR212;
use App\Models\Tools;
use App\Models\Permiso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class InformePlanAuditoriaProgramaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     
    }

    public function informe_preview($id_planauditoria) {

        $planAuditoria = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();

        $id_auditoriaprog = $planAuditoria->id_auditoriaprog;
        $auditoriaProgramas = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('id_auditoriaprog', $id_auditoriaprog)
        ->first();

        $IdPrograma = $auditoriaProgramas->IdPrograma;
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        $programa = \DB::table('AU_Reg_Programas')
        ->where('IdPrograma', $IdPrograma)
        ->first();

        $IdEmpresa = $programa->IdEmpresa;

        $Empresa = \DB::table('AUFACVW_Empresa')
        ->where('IdEmpresa', $IdEmpresa)
        ->first();

        $criterios = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaCriterios')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        $equipoAuditor = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        $agenda = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaAgenda')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        
        $html = view('certificacion.auditoriaProgramas.pdf_visual_informeplan_auditoriaprograma',
                    compact(
                        'auditoriaProgramas',
                        'Empresa',
                    'planAuditoria',
                    'criterios',
                'equipoAuditor','agenda'))
                ->render();

        
        $pdf = Pdf::loadHTML($html);
        $pdf->render();
        $totalPages = $pdf->get_canvas()->get_page_count();
    
        
        $html = str_replace('[[total_pages]]', $totalPages, $html);
    
        
        $pdf = Pdf::loadHTML($html);

        return $pdf->stream();
    }

    public function informe($id_planauditoria) {
        $planAuditoria = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
        ->where('id_planauditoria', $id_planauditoria)
        ->first();

        $id_auditoriaprog = $planAuditoria->id_auditoriaprog;
        $auditoriaProgramas = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('id_auditoriaprog', $id_auditoriaprog)
        ->first();

        $IdPrograma = $auditoriaProgramas->IdPrograma;
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        $programa = \DB::table('AU_Reg_Programas')
        ->where('IdPrograma', $IdPrograma)
        ->first();

        $IdEmpresa = $programa->IdEmpresa;

        $Empresa = \DB::table('AUFACVW_Empresa')
        ->where('IdEmpresa', $IdEmpresa)
        ->first();

        $criterios = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaCriterios')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        $equipoAuditor = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        $agenda = \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaAgenda')
        ->where('id_planauditoria', $id_planauditoria)
        ->get();

        
       
        
        $html = view('certificacion.auditoriaProgramas.pdf_visual_informeplan_auditoriaprograma',
                    compact(
                        'auditoriaProgramas',
                        'Empresa',
                    'planAuditoria',
                    'criterios',
                'equipoAuditor','agenda'))->render();

                
                $pdf = Pdf::loadHTML($html);
                $pdf->render();
                $totalPages = $pdf->get_canvas()->get_page_count();
            
                
                $html = str_replace('[[total_pages]]', $totalPages, $html);
            
                
                $pdf = Pdf::loadHTML($html);


        return $pdf->download('informe_planauditoria'.'.pdf');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
         
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
