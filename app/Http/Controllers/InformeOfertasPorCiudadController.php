<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWOfertasPorCiudad;

class InformeOfertasPorCiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertasPorCiudad = VWOfertasPorCiudad::orderBy('Ciudad', 'asc')->get();
        return view ('fomento.sectorAeronautico.informes.visual_informe_ofertas_total_ciudad')
            ->with('ofertasPorCiudad', $ofertasPorCiudad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofertasPorCiudad = VWOfertasPorCiudad::orderBy('Ciudad', 'asc')->get();

        // return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_ofertas_total_ciudad', ['ofertasPorCiudad' => $ofertasPorCiudad])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-ofertasxciudad.pdf');

        return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_ofertas_total_ciudad', ['ofertasPorCiudad' => $ofertasPorCiudad])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-ofertasxciudad.pdf');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
