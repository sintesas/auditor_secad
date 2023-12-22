<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OfertaComercial;

class OfertasComercialesController extends Controller
{
    public function index()
    {
        $ofertas = OfertaComercial::all();
        return view('fomento.sectorAeronautico.ver_tablas_ofertascomerciales')->with('ofertas', $ofertas);
    }

    
    public function create()
    {
        // 
    }

    
    public function store(Request $request)
    {
        
        $oferta = new OfertaComercial;

        $oferta->OfertaComercial = $request->input('cOfertaComercial'); 
        $oferta->Descripcion = $request->input('cDescripcion'); 
        $oferta->Activo = 1;

        $oferta->save();

        return back();

    }

   
    public function show($id)
    {
        //
    }

    public function deleteOferta($idoferta){
    
        $oferta = OfertaComercial::destroy($idoferta);
        return response()->json($oferta);
    
    }


    public function editOferta(Request $request){
        
        $oferta = OfertaComercial::find($request->idoferta);

        $oferta->OfertaComercial = $request->ofertacomercial;
        $oferta->Descripcion = $request->descripcion;
        $oferta->Active = 1;

        $oferta->save();
        return response()->json($oferta);

    }
   
    public function edit($id)
    {
        // 
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
