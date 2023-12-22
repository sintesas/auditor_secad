<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NivelCompetencias;

class NivelCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nivelesComp = NivelCompetencias::all();
        return view ('gestionRecursos.recursoHumano.informacionPersonal.ver_nivel_competencia')
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
        $nivelesComp = new  NivelCompetencias;

        $nivelesComp->NivelCompetencia = $request->input('NivelCompetencia');
        $nivelesComp->Denominacion = $request->input('Denominacion');
        $nivelesComp->Sigla = $request->input('Sigla');
        $nivelesComp->NivelPericia = $request->input('NivelPericia');
        $nivelesComp->Activo = 1; 
        $nivelesComp->save();
        return redirect()->route('nivelCompetencia.index');
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
    public function edit($IdNivelCompetencia)
    {
        $nivelesComp = NivelCompetencias::find($IdNivelCompetencia);
        return view ('gestionRecursos.recursoHumano.informacionPersonal.editar_nivel_competencia')
            ->withNivelCompetencias($nivelesComp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdNivelCompetencia)
    {
        $nivelesComp = NivelCompetencias::find($IdNivelCompetencia);

        $nivelesComp->NivelCompetencia = $request->input('NivelCompetencia');
        $nivelesComp->Denominacion = $request->input('Denominacion');
        $nivelesComp->Sigla = $request->input('Sigla');
        $nivelesComp->NivelPericia = $request->input('NivelPericia');
        $nivelesComp->save();
        return redirect()->route('nivelCompetencia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdNivelCompetencia)
    {
        //
    }
}
