<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EspecialidadCertificacion;

class EACController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = EspecialidadCertificacion::all();
        //$especialidades= \DB::select("EXEC AUFACSP_Mst_Especialidades_Certificacion @ProcId = 5");

        return view ('gestionRecursos.recursoHumano.informacionPersonal.ver_eac')
            ->with('especialidades', $especialidades);
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
         // make an object to catch the input
        $especialidadCer = new EspecialidadCertificacion;
        // store info 
        $especialidadCer->Especialidad = $request->input('Especialidad');
        $especialidadCer->Codigo = $request->input('Codigo');
        $especialidadCer->Activo = 1; 
        $especialidadCer->save();
        return redirect()->route('eac.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdEspecialidadCertificacion)
    {
        $especialidades = EspecialidadCertificacion::find($IdEspecialidadCertificacion);
        //$especialidades= \DB::select("EXEC AUFACSP_Mst_Especialidades_Certificacion @ProcId = 5");

        return view ('gestionRecursos.recursoHumano.informacionPersonal.editar_eac')
            ->with('especialidades', $especialidades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdEspecialidadCertificacion)
    {
        $especialidadCer = EspecialidadCertificacion::find($IdEspecialidadCertificacion);

        $especialidadCer->Especialidad = $request->input('Especialidad');
        $especialidadCer->Codigo = $request->input('Codigo');
        $especialidadCer->save();
        return redirect()->route('eac.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdEspecialidadCertificacion)
    {
        // USING MODELS
        $especialidadCer = new EspecialidadCertificacion;
        $especialidadCer = EspecialidadCertificacion::find($IdEspecialidadCertificacion);
        $especialidadCer->delete();
        
        return redirect()->route('eac.index');
    }
}
