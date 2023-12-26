<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NombreLista;
use App\Models\Permiso;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listas = NombreLista::all();
        
        $p = new Permiso;
        $permiso = $p->getPermisos('PM');
        
        return view ('param.ver_nombre_lista')->with('listas', $listas)->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('param.crear_nombre_lista');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $m = new NombreLista;
        $m->nombre_lista = strtoupper($request->get('nombre_lista'));
        $m->descripcion = $request->get('descripcion');
        $m->activo = ($request->get('activo') == true) ? 1 : 0;
        $m->usuario_creador = \Session::get('username');
        $m->fecha_creacion = \DB::raw("GETDATE()");
        $m->save();

        if ($m->nombre_lista_id != 0) {
            $notification = array(
                'message' => 'el nombre lista se agregó correctamente', 
                'alert-type' => 'success'
            );
            return redirect()->route('nombrelista.index')->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error guardado.', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
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
    public function edit($nombre_lista_id)
    {
        $m = NombreLista::find($nombre_lista_id);

        return view('param.editar_nombre_lista')->with('nombrelista', $m);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nombre_lista_id)
    {
        $m = NombreLista::find($nombre_lista_id);
        $m->nombre_lista = strtoupper($request->get('nombre_lista'));
        $m->descripcion = $request->get('descripcion');
        $m->activo = ($request->get('activo') == true) ? 1 : 0;
        $m->usuario_modificador = \Session::get('username');
        $m->fecha_modificacion = \DB::raw("GETDATE()");
        $m->save();

        $notification = array(
            'message' => 'El nombre lista actualizó correctamente', 
            'alert-type' => 'success'
        );
        return redirect()->route('nombrelista.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
