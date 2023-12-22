<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\VWInformeResumenPrograma;
use App\Models\ResumenProgramaRecord;

class InformeControlObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // $programa = VWInformeResumenPrograma::all();
          $programa = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get();
          $count = VWInformeResumenPrograma::all()->count();
  
          return view ('certificacion.programasSECAD.informes.ver_informe_controlObservacion')
          ->with('programa', $programa)
          ->with('count', $count);
    }

    public function create()
    {
      $programas = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get();
      $count = VWInformeResumenPrograma::all()->count();
      $fecha = date("d-m-Y G:i");
      
      //return view ('certificacion.programasSECAD.informes.pdf_informe_controlobservaciones', compact('data','fecha'));
      return \PDF::loadView('certificacion.programasSECAD.informes.pdf_informe_controlobservaciones', 
            ['programas' => $programas, 'count' => $count, 'fecha' => $fecha])
            ->setOption('margin-top', '15mm')
            ->setOption('lowquality', false)
            ->setOption('page-width', '150000mm')
            ->setOption('orientation', 'landscape')
            ->download('test-proyectos.pdf');
    }
}
