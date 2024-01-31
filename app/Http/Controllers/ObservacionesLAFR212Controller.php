<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ObservacionesLAFR212;
use App\Models\Programa;
use App\Models\TipoPrograma;
use App\Models\Permiso;

class ObservacionesLAFR212Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::getProgramasTipo();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_observacionesLAFR212_progamas')
                ->with('programas', $programas)->with('permiso', $permiso);
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
        $observaciones = new ObservacionesLAFR212;

        $observaciones->IdPrograma = $request->input('IdPrograma');
        $observaciones->Observacion = $request->input('Observacion');
        $observaciones->Fecha = $dcr;
        $observaciones->Active = 1;

        $observaciones->save();

        $notification = array(
              'message' => 'Datos guardados correctamente',
              'alert-type' => 'success'
          );

        return redirect()->route('obsercavionesfr212.show', $request->input('IdPrograma'))->with($notification);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrograma)
    {
        $programa = Programa::find($IdPrograma);
        $observaciones = ObservacionesLAFR212::getByIdprograma($IdPrograma);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);
        
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_observacionesLAFR212')
                ->with('observaciones', $observaciones)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('programa', $programa);
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
         $observaciones = ObservacionesLAFR212::find($id);
         $observaciones->delete();

         $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );

         return redirect()->route('obsercavionesfr212.show', $observaciones->IdPrograma)->with($notification);
    }
}
