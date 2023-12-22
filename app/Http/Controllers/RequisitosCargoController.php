<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargos;
use App\Models\RequisitosCargo;

class RequisitosCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargos::all();
        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_cargos')->with('cargos', $cargos);
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
    public function show($IdCargo)
    {
        $cargo = Cargos::find($IdCargo);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_cargos_requisitos')
            ->with('cargo', $cargo);
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
    public function update(Request $request, $IdCargo)
    {
        $cargo = Cargos::find($IdCargo);

        $cargo->Educacion = $request->input('Educacion');
        $cargo->ExperienciaLaboral = $request->input('ExperienciaLaboral');
        $cargo->Conocimiento = $request->input('Conocimiento');
        $cargo->save();

        return redirect()->route('requisitosCargo.index');
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
