<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VistaObservacionesContrato;
use App\Models\ObservacionesContrato;

class ObservacionesContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ObservacionesContratos = ObservacionesContrato::getObservacionesContratosTipo();

        return view ('Normogramaycontratos.Contratos.ver_informeControlContratos')
                ->with('ObservacionesContratos', $ObservacionesContratos);
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
        $dcr = date_create("today");
        $observaciones = new VistaObservacionesContrato;

        $observaciones->IdObservacionesContrato = $request->input('IdObservacionesContrato');
        $observaciones->Observacion = $request->input('Observacion');
        $observaciones->Fecha = $dcr;
        $observaciones->Active = 1;

        $observaciones->save();

        $notification = array(
              'message' => 'Datos guardados correctamente',
              'alert-type' => 'success'
          );

        return redirect()->route('ObservacionesContrato.show', $request->input('IdObservacionesContrato'))->with($notification);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdObservacionesContrato)
    {
        $ObservacionesContrato = ObservacionesContrato::find($IdObservacionesContrato);
        $observaciones = VistaObservacionesContrato::getByIdObservacionesContrato($IdObservacionesContrato);
        $tipoObservacionesContrato = TipoObservacionesContrato::find($ObservacionesContrato->IdTipoObservacionesContrato);
        
        return view ('Normogramaycontratos.Contratos.ver_informeControlContratos')
                ->with('observaciones', $observaciones)
                ->with('tipoObservacionesContrato', $tipoObservacionesContrato)
                ->with('ObservacionesContrato', $ObservacionesContrato);
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
         $observaciones = VistaObservacionesContrato::find($id);
         $observaciones->delete();

         $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );

         return redirect()->route('ObservacionesContrato.show', $observaciones->IdObservacionesContrato)->with($notification);
    }
}
