<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargos;
use App\Models\Permiso;


class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargos::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('GR');
        return view ('gestionRecursos.recursoHumano.informacionPersonal.ver_cargos')->with('cargos', $cargos)->with('permiso', $permiso);
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
        $cargo = new Cargos;

        $cargo->AreaCargo = $request->input('AreaCargo');
        $cargo->Cargo = $request->input('Cargo');
        $cargo->Categoria = $request->input('Categoria');
        $cargo->Cuerpo = $request->input('Cuerpo');
        $cargo->Dotacion = $request->input('Dotacion');
        $cargo->CupoAsignado = 0;
        $cargo->Activo = 1;

        $cargo->save();

        return redirect()->route('cargos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdCargo)
    {
        $cargo = Cargos::find($IdCargo);
        return view('gestionRecursos.recursoHumano.informacionPersonal.editar_cargos')->withCargos($cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdCargo)
    {
        $cargo = Cargos::find($IdCargo);

        $cargo->AreaCargo = $request->input('AreaCargo');
        $cargo->Cargo = $request->input('Cargo');
        $cargo->Categoria = $request->input('Categoria');
        $cargo->Cuerpo = $request->input('Cuerpo');
        $cargo->Dotacion = $request->input('Dotacion');

        $cargo->save();

        return redirect()->route('cargos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdCargo)
    {
         // USING MODELS
        $cargos = new Cargos;
        $cargos = Cargos::find($IdCargo);
        $cargos->delete();
        
        return redirect()->route('cargos.index');
    }
}
