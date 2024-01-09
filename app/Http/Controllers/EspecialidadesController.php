<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Especialidades;
use App\Models\CuerposFAC;
use App\Models\Permiso;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DropDawn Cuerpos
        $cuerpos = CuerposFAC::all();
        $cuerpos->prepend('None');

        $especialidades = Especialidades::GetEspecialidades();
        $p = new Permiso;
        $permiso = $p->getPermisos('GR');
        return view ('gestionRecursos.recursoHumano.informacionPersonal.ver_especialidades')
            ->with('cuerpos', $cuerpos)
            ->with('especialidades', $especialidades)->with('permiso', $permiso);
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
        $especialidad = new Especialidades;
        // store info 
        $especialidad->IdCuerpo = $request->input('IdCuerpo');
        $especialidad->NombreEspecialidad = $request->input('NombreEspecialidad');
        $especialidad->Activo = 1; 
        $especialidad->save();
        return redirect()->route('especialidades.index');
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
    public function edit($IdEspecialidad)
    {
        //DropDawn Cuerpos
        $cuerpos = CuerposFAC::all();
        $cuerpos->prepend('None');

        $especialidad = Especialidades::find($IdEspecialidad);
        return view('gestionRecursos.recursoHumano.informacionPersonal.editar_especialidades')
            ->with('cuerpos', $cuerpos)
            ->withEspecialidades($especialidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdEspecialidad)
    {
        $especialidad = Especialidades::find($IdEspecialidad);
        // store info 
        $especialidad->IdCuerpo = $request->input('IdCuerpo');
        $especialidad->NombreEspecialidad = $request->input('NombreEspecialidad');
        $especialidad->save();

        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdEspecialidad)
    {
        // USING MODELS
        $especialidad = new Especialidades;
        $especialidad = Especialidades::find($IdEspecialidad);
        $especialidad->delete();
        
        return redirect()->route('especialidades.index');
    }
}
