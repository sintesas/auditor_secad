<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\ListasSeguimiento;
use App\Models\EspecialistasSeguimiento;

class ListaSeguimientoProgActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ids)
    {
        $variables = explode("&", $ids);
        $idActividad = $variables[0];
        $idPrograma = $variables[1];

        $programa = Programa::find($idPrograma);
        $actividad = ActividadesTipoPrograma::find($idActividad);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);
        $seguimientos = ListasSeguimiento::getSeguimientoByProgByActi($idPrograma,$idActividad);

        //return view ('certificacion.programasSECAD.seguimientoProgramas.crear_lista_seguimiento')
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_lista_seguimiento')
                ->with('programa', $programa)
                ->with('actividad', $actividad)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('seguimientos', $seguimientos);
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
    public function update(Request $request, $IdListaSeguimiento)
    {
        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);

        $seguimiento->IdPrograma = $request->input('IdPrograma');
        $seguimiento->IdTipoPrograma = $request->input('IdTipoPrograma');
        $seguimiento->IdActividad = $request->input('IdActividad');

        $seguimiento->Fecha = $request->input('Fecha');
        $seguimiento->Situacion = $request->input('Situacion');

        $seguimiento->Evidencias = $request->input('Evidencias');

        $seguimiento->save();

        return redirect()->route('listasProyecto.show', $seguimiento->IdPrograma);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdListaSeguimiento)
    {
        $especi = EspecialistasSeguimiento::where('IdListaSeguimiento', '=',$IdListaSeguimiento);
        $especi->delete();


        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);
        $seguimiento->delete();



        $notification = array(
                'message' => 'Datos eliminados correctamente', 
                'alert-type' => 'success'
            );
         return back()->with($notification);
    }
}
