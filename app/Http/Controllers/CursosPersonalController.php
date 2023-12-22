<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CursosPersonal;
use App\Models\Cursos;
use App\Models\Personal;
use App\Models\Grado;

class CursosPersonalController extends Controller
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
        $cursoPersonal = new CursosPersonal;

        $cursoPersonal->IdPersonal = $request->input('IdPersonal');
        $cedula = $request->input('cedula');
        $cursoPersonal->IdCurso = $request->input('IdCurso');

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('fotos\\' . $cedula);
            if(!\File::exists($personalPath)) {
                \File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->foto;
            $fileName = $file->getClientOriginalName();
            $file->move($personalPath, $fileName);
            $photo = $fileName;

            $cursoPersonal->Diploma = $photo;
        }

        $cursoPersonal->save();
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
        $cursos = CursosPersonal::CursosPersonal($IdPersonal);

        /*Set Dropdown Cursos*/
        $listCursos = Cursos::all();
        $listCursos->prepend('None');

        $persona = Personal::find($IdPersonal);
        $grado = Grado::find($persona->IdGrado);

        return view('gestionRecursos.recursoHumano.ver_personal_cursos')
            ->with('cursos', $cursos)
            ->with('persona', $persona)
            ->with('listCursos', $listCursos)
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
    public function destroy($IdCursoPersonal)
    {
        $cursos = CursosPersonal::find($IdCursoPersonal);
        $cursos->delete();

        return back();
    }
}
