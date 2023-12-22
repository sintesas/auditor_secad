<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NivelCompetencias;
use App\Models\RequisitosNivelCompetencia;

class RequisitosNivelCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelesComp = NivelCompetencias::all();
        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_niveles_competencia')
            ->with('nivelesComp', $nivelesComp);
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
        $requisito = new RequisitosNivelCompetencia;

        $requisito->IdNivelCompetencia = $request->input('IdNivelCompetencia');
        $requisito->NombreRequisitosCompetencia = $request->input('NombreRequisitosCompetencia');
        $requisito->activo = 1;
        $requisito->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdNivelCompetencia)
    {
        $nivelesComp = NivelCompetencias::find($IdNivelCompetencia);
        $requisitos = RequisitosNivelCompetencia::getRequisitos($IdNivelCompetencia);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_niveles_requisitos')
            ->with('nivelesComp', $nivelesComp)
            ->with('requisitos', $requisitos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdRequisitosCompetencia)
    {
        $requisitos = RequisitosNivelCompetencia::find($IdRequisitosCompetencia);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.editar_niveles_requisitos')
            ->withRequisitosNivelCompetencia($requisitos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdRequisitosCompetencia)
    {
        $requisito = RequisitosNivelCompetencia::find($IdRequisitosCompetencia);
        
        $requisito->NombreRequisitosCompetencia = $request->input('NombreRequisitosCompetencia');
        $requisito->save();
        
        return redirect()->route('requisitosNivelCompe.show', $requisito->IdNivelCompetencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdRequisitosCompetencia)
    {
        $requisito = RequisitosNivelCompetencia::find($IdRequisitosCompetencia);
        $requisito->delete();
        return back();
    }
}
