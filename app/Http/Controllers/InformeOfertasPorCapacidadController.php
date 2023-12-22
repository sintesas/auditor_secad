<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OfertasSectorAeronautico;
use App\Models\VWOfertasPorCapacidad;

class InformeOfertasPorCapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertaSectorAeronautico = OfertasSectorAeronautico::all();
        return view ('fomento.sectorAeronautico.informes.ver_informe_ofertas_capacidad')
            ->with('ofertaSectorAeronautico', $ofertaSectorAeronautico);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdOfertaComercial)
    {
        // $ofertaCapacidad = VWOfertasPorCapacidad::find($IdOfertaComercial); 
        $ofertaCapacidad = VWOfertasPorCapacidad::where('dbo.AUFACVW_OfertaPorCapacidad.IdOfertaComercial','=',$IdOfertaComercial)->get();      
        $idofertacomercial = $IdOfertaComercial;
        return view('fomento.sectorAeronautico.informes.visual_informe_ofertas_capacidad')
            ->with('ofertaCapacidad', $ofertaCapacidad)->with('idofertacomercial', $idofertacomercial);
    }

    
    public function edit($IdOfertaComercial)
    {
        $ofertaCapacidad = VWOfertasPorCapacidad::find($IdOfertaComercial);

        $idofertacomercial = $IdOfertaComercial;
        // return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_ofertas_capacidad', ['informeinspeccion' => $informeinspeccion])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');

         return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_ofertas_capacidad', ['ofertaCapacidad' => $ofertaCapacidad])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-ofertasxcapacidad.pdf');   

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
