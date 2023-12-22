<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CursosFormacion;
use App\Models\Personal;
use App\Models\Ciudades;
use App\Models\TipoCurso;
use App\Models\ClaseEvento;

class CursosFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursosFormacion = CursosFormacion::all();
        return view ('gestionRecursos.capacitacionPersonalSecad.ver_cursos')
            ->with('cursosFormacion', $cursosFormacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');
        /*Set Dropdown Ciudades*/
        $ciudades = Ciudades::all();
        $ciudades->prepend('None'); 
        /*Set Dropdown TipoCurso*/
        $tipoCurso = TipoCurso::all();
        $tipoCurso->prepend('None'); 
        /*Set Dropdown ClaseEvento*/
        $claseEvento = ClaseEvento::all();
        $claseEvento->prepend('None'); 
        return view ('gestionRecursos.capacitacionPersonalSecad.crear_curso')
            ->with('personal', $personal)
            ->with('ciudades', $ciudades)
            ->with('tipoCurso', $tipoCurso)
            ->with('claseEvento', $claseEvento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursoFormacion = new CursosFormacion;
        $cursoFormacion->IdPersonal = $request->input('IdPersonal');
        $cursoFormacion->NombreCurso = $request->input('NombreCurso');
        $cursoFormacion->Lugar = $request->input('Lugar');
        $cursoFormacion->Fecha = $request->input('Fecha');
        $cursoFormacion->IdCiudades = $request->input('IdCiudades');
        $cursoFormacion->IdTipocurso = $request->input('IdTipocurso');
        $cursoFormacion->Descripcion = $request->input('Descripcion');
        $cursoFormacion->HorasTotal = $request->input('HorasTotal');
        $cursoFormacion->DirectivaNo = $request->input('DirectivaNo');
        $cursoFormacion->Horario = $request->input('Horario');
        $cursoFormacion->IdClase = $request->input('IdClaseEvento');
        $cursoFormacion->Duracion = $request->input('Duracion');
        $cursoFormacion->Activo = 1; 
        $cursoFormacion->save();
        return redirect()->route('cursosformacion.index');
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
