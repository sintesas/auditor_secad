<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CursosCargo;
use App\Models\Cargos;
use App\Models\Cursos;

class CursosCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $cursosCargo = new CursosCargo;

        $cursosCargo->IdCargo = $request->input('IdCargo');
        $cursosCargo->IdCurso = $request->input('IdCurso');
        $cursosCargo->save();
        return back();
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
        $cursos = Cursos::all();
        $cursos->prepend('None');
        $cursosCargo = CursosCargo::getCursos($IdCargo);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_cargos_cursos')
            ->with('cursos',$cursos)
            ->with('cursosCargo',$cursosCargo)
            ->with('cargo',$cargo);
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
    public function destroy($IdCursoCargo)
    {
        $curso = CursosCargo::find($IdCursoCargo);
        $curso->delete();
        return back();
    }
}
