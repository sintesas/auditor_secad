<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWProyectos;
use App\Models\VWProyectoObservaciones;

class InformeObservacionesController extends Controller
{
    /**
   * Store a newly created resource in storage.
   *Index view
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  function index(){
    $controlProyectData = VWProyectos::Estado();

    return view('fomento.proyectos.observaciones.ver_informe_observaciones')
            ->with('proyectosData', $controlProyectData);
  }

  /**
   * Store a newly created resource in storage.
   *Visual informe redirect
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  function show($IdControlProyecto){
      $dataObservaciones = VWProyectoObservaciones::where('IdControlProyecto', $IdControlProyecto)->where('Estado', '1')->get();
      $dataProyecto = VWProyectos::where('IdControlProyecto', $IdControlProyecto)->where('Estado', '1')->get();
      return view('fomento.proyectos.informes.visual_informe_observaciones')
            ->with('observacionesData', $dataObservaciones)
            ->with('dataProyecto', $dataProyecto);
  }

  /**
   * Store a newly created resource in storage.
   *Edit observaciones
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  function edit($IdControlProyecto){
    $dataObservaciones = VWProyectoObservaciones::where('IdControlProyecto', $IdControlProyecto)
                                                ->where('Estado', '1')->get();
    $dataProyecto = VWProyectos::where('IdControlProyecto', $IdControlProyecto)
                                  ->where('Estado', '1')->get();

    return \PDF::loadView('fomento.proyectos.informes.pdf_informe_observaciones', ['dataObservaciones' => $dataObservaciones, 'dataProyecto' => $dataProyecto])->download('informe-observaciones-proyectos.pdf');

  }   
}
