<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\ListaSegProgEmp;

class ListaSegProgActEmpController extends Controller
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
        //
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
        $seguimientos = ListaSegProgEmp::getSeguimientoEmpByProgByActi($idPrograma,$idActividad);

        //return view ('certificacion.programasSECAD.seguimientoProgramas.crear_lista_seguimiento')
        return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.ver_lista_seguimiento_emp')
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
