<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContenidoTematico;
use App\Models\EspecialidadCertificacion;

class ContenidoTematicoController extends Controller
{
    /*FALATA ASOCIAR BIEN EL CONTENIDO*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $especialidades = EspecialidadCertificacion::all();
        //$especialidades= \DB::select("EXEC AUFACSP_Mst_Especialidades_Certificacion @ProcId = 5");

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_contenido_tematico_eac')
            ->with('especialidades', $especialidades);

        // $contenidosTematico = ContenidoTematico::all();
        // return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_contenido_tematico_eac')->with('contenidosTematico', $contenidosTematico);
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
        $contenidos = new ContenidoTematico;

        $contenidos->IdEspecialidadCertificacion = $request->input('IdEspecialidadCertificacion');
        $contenidos->NombreContenido = $request->input('NombreContenido');
        $contenidos->activo = 1;
        $contenidos->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdEspecialidadCertificacion)
    {
        $especialidades = EspecialidadCertificacion::find($IdEspecialidadCertificacion);
        $contenidos = ContenidoTematico::getContenidoTematico($IdEspecialidadCertificacion);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.ver_contenidos_tematicos')
            ->with('contenidos', $contenidos)
            ->with('especialidades', $especialidades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdContenidoTematico)
    {
        $contenido = ContenidoTematico::find($IdContenidoTematico);

        return view ('gestionRecursos.capacitacionPersonalSecad.cursosRequeridos.editar_contenidos_tematicos')
            ->withContenidoTematico($contenido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdContenidoTematico)
    {
        $contenido = ContenidoTematico::find($IdContenidoTematico);

        $contenido->NombreContenido = $request->input('NombreContenido');
        $contenido->save();

        return redirect()->route('contenidoTematico.show', $contenido->IdEspecialidadCertificacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdContenidoTematico)
    {
        $contenidos = ContenidoTematico::find($IdContenidoTematico);
        $contenidos->delete();
        return back();
    }
}
