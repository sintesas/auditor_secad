<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWOfertasSectorAeronautico;
use App\Models\OfertasSectorAeronautico;
use App\Models\OfertaComercial;
use App\Models\Empresa;
use App\Models\InformeOfertaPorSector;

class InformeOfertasSectorAeronauticoController extends Controller
{
    public function index()
    {
        $ofertasSectorAeronautico = InformeOfertaPorSector::all();
        $total = OfertasSectorAeronautico::count();

        return view ('fomento.sectorAeronautico.informes.visual_informe_ofertas_sector_aeronautico')
        ->with('ofertasSectorAeronautico', $ofertasSectorAeronautico)->with('total', $total);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofertasSectorAeronautico = InformeOfertaPorSector::all();
        $total = OfertasSectorAeronautico::count();

        return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_ofertas_sector_aeronautico', ['ofertasSectorAeronautico' => $ofertasSectorAeronautico, 'total' => $total])
                ->setOption('disable-smart-shrinking', false)
                ->setOption('margin-top', '15mm')
                ->setOption('lowquality', false)
                ->setOption('page-size', 'A4')
                ->setOption('footer-center',utf8_decode(date('\ d/m/Y\ \ ').'     Página [page] de [topage] '))
                ->download('informe-ofertas_sector_aeronautico.pdf');   


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
