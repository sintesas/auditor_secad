<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EstadoPrograma;

class EstadosProgramaController extends Controller
{
    public function index()
    {

        $estadosprograma = EstadoPrograma::all();

        return view('certificacion.informacionprevia.ver_tablas_estadosprogramas')->with('estadosprograma', $estadosprograma);
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $req)
    {
        $estadoprograma = new EstadoPrograma;
        $estadoprograma->Descripcion = $req->input('Descripcion');
        $estadoprograma->Activo = 1;

        $estadoprograma->save();

        $notification = array(
            'message' => 'Estado Programa Añadido', 
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }

    public function editEstadoPrograma(Request $req)
    {
        $estadoprograma = EstadoPrograma::find($req->id);

        $estadoprograma->Descripcion = $req->descripcion;
        $estadoprograma->Activo = 1;
        $estadoprograma->save();

        return response()->json(['success'=>'done']);
    }

    public function deleteEstadoPrograma($idestadoprograma)
    {
    	$estadoprograma = EstadoPrograma::destroy($idestadoprograma);

        return response()->json($estadoprograma);

    }

    public function edit(Request $req)
    {

    }
    
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
    }
    
    public function destroy($id)
    {
        //
    }
}
