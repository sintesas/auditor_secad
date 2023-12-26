<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ListaDinamica;

class ListaDinamicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listas = \DB::select('select * from vw_listas_dinamicas where activo = 1 order by 1');

        $nombre_lista_id = \Session::get('nombre_lista_id');

        return view('param.crear_listas_dinamicas')->with('listas', $listas)->with('nombre_lista_id', $nombre_lista_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valor = new ListaDinamica;
        $valor->lista_dinamica = $request->get('lista_dinamica');
        $valor->nombre_lista_id = \Session::get('nombre_lista_id');
        $valor->codigo = $request->get('codigo');
        $valor->descripcion = $request->get('descripcion');
        $valor->lista_dinamica_padre_id = $request->get('lista_dinamica_padre_id') == 0 ? null : $request->get('lista_dinamica_padre_id');
        $valor->activo = $request->get('activo') == true ? 1 : 0;
        $valor->usuario_creador = \Session::get('username');
        $valor->fecha_creacion = \DB::raw('GETDATE()');
        $valor->save();

        $notification = array(
            'message' => 'la lista dinámica se agregó correctamente', 
            'alert-type' => 'success'
        );
        return redirect()->route('listasvalores.indice', \Session::get('nombre_lista_id'))->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($lista_dinamica_id)
    {
        $valor = ListaDinamica::find($lista_dinamica_id);

        $listas = \DB::select('select * from vw_listas_dinamicas where activo = 1 order by 1');

        return view('param.editar_listas_dinamicas')->with('lista', $valor)->with('listas', $listas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $lista_dinamica_id)
    {
        $valor = ListaDinamica::find($lista_dinamica_id);
        $valor->lista_dinamica = $request->get('lista_dinamica');
        $valor->nombre_lista_id = \Session::get('nombre_lista_id');
        $valor->codigo = $request->get('codigo');
        $valor->descripcion = $request->get('descripcion');
        $valor->lista_dinamica_padre_id = $request->get('lista_dinamica_padre_id') == 0 ? null : $request->get('lista_dinamica_padre_id');
        $valor->activo = $request->get('activo') == true ? 1 : 0;
        $valor->usuario_modificador = \Session::get('username');
        $valor->fecha_modificacion = \DB::raw('GETDATE()');
        $valor->save();

        $notification = array(
            'message' => 'la lista dinámica se actualizó correctamente', 
            'alert-type' => 'success'
        );
        return redirect()->route('listasvalores.indice', \Session::get('nombre_lista_id'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getListasValoresById($nombre_lista_id) {
        $listas = \DB::select("select * from vw_listas_dinamicas where nombre_lista_id = :id order by lista_dinamica_id", array('id' => $nombre_lista_id));
        
        session(['nombre_lista_id' => $nombre_lista_id]);

        return view ('param.ver_listas_dinamicas')->with('listas', $listas);
    }
}
