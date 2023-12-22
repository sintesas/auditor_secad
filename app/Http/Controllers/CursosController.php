<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cursos;
use App\Models\Ciudades;
use App\Models\TipoCurso;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::all();
        return view ('gestionRecursos.capacitacionPersonalSecad.ver_cursos')
                    ->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         /*Set Dropdown Ciudades*/
        $ciudades = Ciudades::all();
        $ciudades->prepend('None'); 

        /*Set Dropdown TipoCurso*/
        $tipoCurso = TipoCurso::all();
        $tipoCurso->prepend('None'); 

         return view ('gestionRecursos.capacitacionPersonalSecad.crear_curso')
            ->with('tipoCurso', $tipoCurso)
            ->with('ciudades',$ciudades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Cursos;

        $curso->NombreCurso = $request->input('NombreCurso');
        $curso->LugarEntidad = $request->input('LugarEntidad');
        $curso->IdCiudades = $request->input('IdCiudades');
        $curso->FechaTermino = $request->input('FechaTermino');
        $curso->ModalidadEstudio = $request->input('ModalidadEstudio');
        $curso->IdTipoCurso = $request->input('IdTipoCurso');
        $curso->Vigente = $request->input('Vigente');
        $curso->EstadoFormacion = $request->input('EstadoFormacion');
        $curso->FechaExpiracion = $request->input('FechaExpiracion');
        $curso->TiempoDuracion = $request->input('TiempoDuracion');
        $curso->Activo = 1; 
        $curso->save();
        return redirect()->route('cursos.index');
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
    public function edit($IdCurso)
    {
         /*Set Dropdown Ciudades*/
        $ciudades = Ciudades::all();
        $ciudades->prepend('None'); 

        /*Set Dropdown TipoCurso*/
        $tipoCurso = TipoCurso::all();
        $tipoCurso->prepend('None'); 

        $curso = Cursos::find($IdCurso);

        return view ('gestionRecursos.capacitacionPersonalSecad.editar_curso')
            ->with('tipoCurso', $tipoCurso)
            ->with('ciudades',$ciudades)
            ->withCursos( $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdCurso)
    {
        $curso = Cursos::find($IdCurso);

        $curso->NombreCurso = $request->input('NombreCurso');
        $curso->LugarEntidad = $request->input('LugarEntidad');
        $curso->IdCiudades = $request->input('IdCiudades');
        $curso->FechaTermino = $request->input('FechaTermino');
        $curso->ModalidadEstudio = $request->input('ModalidadEstudio');
        $curso->IdTipoCurso = $request->input('IdTipoCurso');
        $curso->Vigente = $request->input('Vigente');
        $curso->EstadoFormacion = $request->input('EstadoFormacion');
        $curso->FechaExpiracion = $request->input('FechaExpiracion');
        $curso->TiempoDuracion = $request->input('TiempoDuracion');
        
        $curso->save();
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdCurso)
    {
        $exists = \DB::table('AU_Reg_CursosPersonal')->where('IdCurso', $IdCurso)->first();

        // dd($exists);
        if(!$exists){
            $curso = Cursos::find($IdCurso);
            $curso->delete();
            
            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar esta Curso ya que esta asiganada al Personal.', 
            'alert-type' => 'warning'
          );
        }
        
        return redirect()->route('cursos.index')->with($notification);
    }
}
