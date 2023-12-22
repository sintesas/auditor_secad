<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unidad;
use App\Models\Grado;

class UnidadController extends Controller
{
    public function deleteUnidad($idunidad){
  
        $unidad = Unidad::destroy($idunidad);
        return response()->json($unidad);
    
    }


    public function editUnidad(Request $request){

        $unidad = Unidad::find($request->idunidad);

        $unidad->NombreUnidad = $request->nombre;
        $unidad->Denominacion = $request->denominacion;
        $unidad->Ciudad = $request->ciudad;
        $unidad->Direccion = $request->direccion;
        $unidad->IdGrado = $request->grado;
        $unidad->NombreComandante = $request->nomcomandante;
        $unidad->Active = 1;

        $unidad->save();

        return response()->json($unidad);

    }


    public function index()
    {
        $unidades = Unidad::all();

        //Set Dropdown 
        $grado = Grado::all();
        $grado->prepend('None');

        return view ('certificacion.variables.ver_tablas_unidad')
                ->with('unidades', $unidades)
                ->with('grado', $grado);
    }

    public function store(Request $request)
    {
        // make an object to catch the input
       $unidad = new Unidad;
       // store info 
       $unidad->NombreUnidad = $request->input('NombreUnidad');
       $unidad->Denominacion = $request->input('Denominacion');
       $unidad->Ciudad = $request->input('Ciudad');
       $unidad->Direccion = $request->input('Direccion');
       $unidad->IdGrado = $request->input('IdGrado');
       $unidad->NombreComandante = $request->input('NombreComandante');
       $unidad->Active = 1; 
       $unidad->save();

       return redirect()->route('unidad.index');
    }


    
    public function edit($IdUnidad)
    {
        $unidad = Unidad::find($IdUnidad);

        //Set Dropdown 
        $grado = Grado::all();
        $grado->prepend('None');

        return view('certificacion.variables.ver_tablas_unidad')
                ->withUnidad($unidad)
                ->with('grado', $grado);
    }

    
    public function update(Request $request, $IdUnidad)
    {        
        // bring one record using id or something
       $unidad = Unidad::find($IdUnidad);
       // store info 
       $unidad->NombreUnidad = $request->input('NombreUnidad');
       $unidad->Denominacion = $request->input('Denominacion');
       $unidad->Ciudad = $request->input('Ciudad');
       $unidad->Direccion = $request->input('Direccion');
       $unidad->IdGrado = $request->input('IdGrado');
       $unidad->NombreComandante = $request->input('NombreComandante');
       $unidad->Active = 1; 
       $unidad->save();
       return redirect()->route('unidad.index');
    }

    
    public function destroy($IdUnidad)
    {
         // find instance
        $unidad = Unidad::find($IdUnidad);
        // delete
        $unidad->delete();
        
        return redirect()->route('unidad.index');
    }

    public function create()
    {
        //
    }

        public function show($id)
    {
        //
    }
}
