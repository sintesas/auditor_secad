<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Familiares;
use App\Models\Personal;
use App\Models\Grado;

class FamiliaresController extends Controller
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
        $familiar = new Familiares;

        $familiar->IdPersonal = $request->input('IdPersonal');
        $familiar->Parentesco = $request->input('Parentesco');
        $familiar->Nombre = $request->input('Nombre');
        $familiar->FechaNacimiento = $request->input('FechaNacimiento');
        $familiar->Edad = $request->input('Edad');
        $familiar->Telefono = $request->input('Telefono');
        $familiar->EstadoCivil = $request->input('EstadoCivil');
        $familiar->Direccion = $request->input('Direccion');
        $familiar->Barrio = $request->input('Barrio');
        $familiar->Activo = 1;

        $familiar->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPersonal)
    {
        $familiares = Familiares::familiaresPersonal($IdPersonal);
        $persona = Personal::find($IdPersonal);
        $grado = Grado::find($persona->IdGrado);

        return view('gestionRecursos.recursoHumano.ver_personal_familiares')
            ->with('familiares', $familiares)
            ->with('persona', $persona)
            ->with('grado', $grado);
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
    public function destroy($IdFamiliar)
    {
        $familiar = Familiares::find($IdFamiliar);
        $familiar->delete();
        return back();
    }
}
