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

class InformeHorasHombrePorPersonalController extends Controller
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

    public function informe_preview($IdPersonal) {
        $personas = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
            ->select('Consecutivo', 'Proyecto')
            ->where('IdPersonal', $IdPersonal)
            ->groupBy('Consecutivo', 'Proyecto')
            ->get();
    
        $persona = \DB::table('AUFACVW_PersonalHH')
            ->where('IdPersonal', $IdPersonal)
            ->first();
    
        $rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
            ->select('Proyecto', 'Rol', 'HorasAprobadas')
            ->where('IdPersonal', $IdPersonal)
            ->get();
    
        $horasPorEspecialista = [];
        foreach ($rolesHoras as $rolHoras) {
            if (isset($horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol])) {
                $horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol] += $rolHoras->HorasAprobadas;
            } else {
                $horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol] = $rolHoras->HorasAprobadas;
            }
        }
        

        
    
        $horasTotalesPorRol = [
            'Responsable de Programa' => 0,
            'Especialista de Certificacion' => 0,
            'Tecnico Especialista de Certificacion' => 0,
            'Auditor Lider' => 0,
            'Auditor' => 0,
            'Profesional Asesor' => 0
        ];
    
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
    
            if (isset($horasPorEspecialista[$especialista->Proyecto])) {
                foreach ($rolesHorasArray as $rol => &$horas) {
                    $horas = $horasPorEspecialista[$especialista->Proyecto][$rol] ?? 0;
                    $totalHorasEspecialista += $horas;
                    $horasTotalesPorRol[$rol] += $horas;
                }
            }
    
            $especialista->rolesHoras = $rolesHorasArray;
            $especialista->totalHorasEspecialista = $totalHorasEspecialista;
        }
    
    
        $html = view('certificacion.horasPersonas.pdf_visual_informehorashombreporpersonal', compact('personas', 'persona', 'horasTotalesPorRol'))
        ->render();

        
        $pdf = Pdf::loadHTML($html);
        $pdf->render();
        $totalPages = $pdf->get_canvas()->get_page_count();
    
        
        $html = str_replace('[[total_pages]]', $totalPages, $html);
    
        
        $pdf = Pdf::loadHTML($html);
    
        return $pdf->stream();
    }
    
    
    public function informe($IdPersonal) {
        
    $personas = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
    ->select(
        'Consecutivo',
        'Proyecto'
    )
    ->where('IdPersonal', $IdPersonal)
    ->groupBy('Consecutivo', 'Proyecto')
    ->get();

    $persona = \DB::table('AUFACVW_PersonalHH')
    ->where('IdPersonal', $IdPersonal)
    ->first();


    $rolesHoras = \DB::table('VWAU_Reg_AprobarHorasEspecialista')
    ->select('Proyecto', 'Rol', 'HorasAprobadas')
    ->where('IdPersonal', $IdPersonal)
    ->get();

$horasPorEspecialista = [];


foreach ($rolesHoras as $rolHoras) {
    if (isset($horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol])) {
        $horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol] += $rolHoras->HorasAprobadas;
    } else {
        $horasPorEspecialista[$rolHoras->Proyecto][$rolHoras->Rol] = $rolHoras->HorasAprobadas;
    }
}

$horasTotalesPorRol = [
    'Responsable de Programa' => 0,
    'Especialista de Certificacion' => 0,
    'Tecnico Especialista de Certificacion' => 0,
    'Auditor Lider' => 0,
    'Auditor' => 0,
    'Profesional Asesor' => 0
];


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

    
    if (isset($horasPorEspecialista[$especialista->Proyecto])) {
        foreach ($rolesHorasArray as $rol => &$horas) {
           
            $horas = $horasPorEspecialista[$especialista->Proyecto][$rol] ?? 0;

            
            $totalHorasEspecialista += $horas;

          
            $horasTotalesPorRol[$rol] += $horas;
        }
    }

   
    $especialista->rolesHoras = $rolesHorasArray;
    $especialista->totalHorasEspecialista = $totalHorasEspecialista;
}

        
        

        
        $html = view('certificacion.horasPersonas.pdf_visual_informehorashombreporpersonal',
                    compact(
                    'personas',
                    'persona',
                    'horasTotalesPorRol'
                    ))->render();

                    
                    $pdf = Pdf::loadHTML($html);
                    $pdf->render();
                    $totalPages = $pdf->get_canvas()->get_page_count();
                
                   
                    $html = str_replace('[[total_pages]]', $totalPages, $html);
                
                   
                    $pdf = Pdf::loadHTML($html);

        return $pdf->download('informe_horashombreporpersonal'.'.pdf');;
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
