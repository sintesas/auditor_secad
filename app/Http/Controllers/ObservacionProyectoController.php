<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ControlProyectos;
use App\Models\ControlProyectoObservacion;
use App\Models\VWProyectoObservaciones;

class ObservacionProyectoController extends Controller
{
    function show($idControlProyecto){

        //Data proyecto
        $proyectoData = ControlProyectos::where('IdControlProyecto','=',$idControlProyecto)->get();

        //Data Observación
        $observacionData = ControlProyectoObservacion::DataWhereProyectoId($idControlProyecto);
        //View
        return view('fomento.proyectos.observaciones.index_observaciones')
              ->with('proyectoData', $proyectoData)
              ->with('observacionesData', $observacionData)
              ->with('idControlProyecto', $idControlProyecto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Fecha Actual
        $hoy = getdate();

        // create object to holdd info
        $observacionData = new ControlProyectoObservacion;

        //Data Insert
        $observacionData->IdControlProyecto = $request->input('hiddenId');
        $observacionData->Descripcion = $request->input('Descripcion');
        $observacionData->Estado = '1';
        $observacionData->Created_at = date("Y-m-d H:i.s");
        $observacionData->save();
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdObservacion)
    {
        //Data id Seleccionado
        $observacionData = ControlProyectoObservacion::find($IdObservacion);

        return view('fomento.proyectos.observaciones.edit_observaciones')
                ->with('ObservacionData', $observacionData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdObservacion)
    {
        //Fecha Actual
        $hoy = getdate();
        //Obtener Id
        $idControlProyecto = VWProyectoObservaciones::where('IdObservacion', '=', $IdObservacion)->get();

        //Obtener Data a modificar
        $observacionData = ControlProyectoObservacion::find($IdObservacion);

        //Data Update
        $observacionData->Descripcion = $request->input('Descripcion');
        $observacionData->Updated_at = $hoy['mday']."-".$hoy['mon']."-".$hoy['year']." ".$hoy['hours'].":".$hoy['minutes'];
        $observacionData->save();


        //Redirect
        return redirect()->route('observacionProyecto.show', $idControlProyecto[0]->IdControlProyecto);
    }

    function destroy($IdObservacion){

      // find instance
      $ProyectoObservacion = ControlProyectoObservacion::find($IdObservacion);
      // delete
      $ProyectoObservacion->delete();

      return back();
    }
}
