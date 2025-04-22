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

class InformeReporteAprobacionHorasController extends Controller
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

    public function informe_preview($IdPrograma) {

        $programa = \DB::table('VWAU_Reg_EspecialistasSeguimiento')->where('IdPrograma', $IdPrograma)->first();
        if ($programa !== null) {
            $proyecto = $programa->Proyecto;      
        }
      

    $personas = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
    ->select(
        'Cedula',
        'Nombres',
        'IdPersonal'
    )
    ->where('IdPrograma', $IdPrograma)
    ->groupBy('Cedula', 'Nombres', 'IdPersonal')
    ->get();

    if ($programa !== null) {

$rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
    ->select('Especialista', 'Rol', 'HorasAprobadas', 'IdPersonal')
    ->where('Proyecto', $proyecto)
    ->get();
    }else{
        $rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
    ->select('Especialista', 'Rol', 'HorasAprobadas', 'IdPersonal')
    ->get();
    }

    $horasPorEspecialista = [];



    
    foreach ($rolesHoras as $rolHoras) {
        if (isset($horasPorEspecialista[$rolHoras->IdPersonal][$rolHoras->Rol])) {
            $horasPorEspecialista[$rolHoras->IdPersonal][$rolHoras->Rol] += $rolHoras->HorasAprobadas;
        } else {
            $horasPorEspecialista[$rolHoras->IdPersonal][$rolHoras->Rol] = $rolHoras->HorasAprobadas;
        }
    }

    
    
    foreach ($personas as $especialista) {
        
        $totalHorasEspecialista = 0;
    
        
        $rolesHorasArray = [
            'Responsable de Programa' => 0,
            'Especialista de Certificacion' => 0,
            'Tecnico Especialista de Certificacion' => 0,
            'Auditor Lider' => 0,
            'Auditor' => 0,
            'Profesional Asesor' => 0
        ];
    
        
        if (isset($horasPorEspecialista[$especialista->IdPersonal])) {
            foreach ($rolesHorasArray as $rol => &$horas) {
                
                $horas = $horasPorEspecialista[$especialista->IdPersonal][$rol] ?? 0;
    
               
                $totalHorasEspecialista += $horas;
            }
        }
    
        
        $especialista->rolesHoras = $rolesHorasArray;
        $especialista->totalHorasEspecialista = $totalHorasEspecialista;
    }

    


        $programa = \DB::table('AU_Reg_Programas')
        ->where('IdPrograma', $IdPrograma)
        ->first();

        $IdEmpresa = $programa->IdEmpresa;

        $Empresa = \DB::table('AUFACVW_Empresa')
        ->where('IdEmpresa', $IdEmpresa)
        ->first();
        
        
        $html = view('certificacion.horasPersonas.pdf_visual_informeaprobacionhorasprograma',
                    compact(
                    'personas',
                    'programa',
                    'Empresa'
                    ))->render();

                    
                    $pdf = Pdf::loadHTML($html);
                    $pdf->render();
                    $totalPages = $pdf->get_canvas()->get_page_count();
                
                    
                    $html = str_replace('[[total_pages]]', $totalPages, $html);
                
                    
                    $pdf = Pdf::loadHTML($html);

        return $pdf->stream();
    }

    public function informe($IdPrograma) {

        
        $programa = \DB::table('VWAU_Reg_EspecialistasSeguimiento')->where('IdPrograma', $IdPrograma)->first();
        if ($programa !== null) {
            $proyecto = $programa->Proyecto;      
        }
    $personas = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
    ->select(
        'Cedula',
        'Nombres',
        'IdPersonal'
    )
    ->where('IdPrograma', $IdPrograma)
    ->groupBy('Cedula', 'Nombres', 'IdPersonal')
    ->get();


    if ($programa !== null) {

        $rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
            ->select('Especialista', 'Rol', 'HorasAprobadas', 'IdPersonal')
            ->where('Proyecto', $proyecto)
            ->get();
            }else{
                $rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
            ->select('Especialista', 'Rol', 'HorasAprobadas', 'IdPersonal')
            ->get();
            }

    $horasPorEspecialista = [];



    
    foreach ($rolesHoras as $rolHoras) {
        $horasPorEspecialista[$rolHoras->IdPersonal][$rolHoras->Rol] = $rolHoras->HorasAprobadas;
    }

    
    
    foreach ($personas as $especialista) {
        
        $totalHorasEspecialista = 0;
    
        
        $rolesHorasArray = [
            'Responsable de Programa' => 0,
            'Especialista de Certificacion' => 0,
            'Tecnico Especialista de Certificacion' => 0,
            'Auditor Lider' => 0,
            'Auditor' => 0,
            'Profesional Asesor' => 0
        ];
    
        
        if (isset($horasPorEspecialista[$especialista->IdPersonal])) {
            foreach ($rolesHorasArray as $rol => &$horas) {
                
                $horas = $horasPorEspecialista[$especialista->IdPersonal][$rol] ?? 0;
    
               
                $totalHorasEspecialista += $horas;
            }
        }
    
        
        $especialista->rolesHoras = $rolesHorasArray;
        $especialista->totalHorasEspecialista = $totalHorasEspecialista;
    }

    


        $programa = \DB::table('AU_Reg_Programas')
        ->where('IdPrograma', $IdPrograma)
        ->first();

        $IdEmpresa = $programa->IdEmpresa;

        $Empresa = \DB::table('AUFACVW_Empresa')
        ->where('IdEmpresa', $IdEmpresa)
        ->first();
        
        
        $html = view('certificacion.horasPersonas.pdf_visual_informeaprobacionhorasprograma',
                    compact(
                    'personas',
                    'programa',
                    'Empresa'
                    ))->render();

                    
                    $pdf = Pdf::loadHTML($html);
                    $pdf->render();
                    $totalPages = $pdf->get_canvas()->get_page_count();
                
                    
                    $html = str_replace('[[total_pages]]', $totalPages, $html);
                
                    
                    $pdf = Pdf::loadHTML($html);

        return $pdf->download('informe_aprobacionhoras'.'.pdf');;
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
