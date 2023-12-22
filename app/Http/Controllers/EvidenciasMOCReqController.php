<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\evidenciaMocMatriz;
use App\Models\MocsRequsitoMatriz;
use App\Models\RequisitosSubParteMatrizCumpliProg;
use App\Models\Moc;

class EvidenciasMOCReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show($IdMocRequisito)
    {
        $evidencias = evidenciaMocMatriz::getByMoc($IdMocRequisito);
        $mocReq = MocsRequsitoMatriz::find($IdMocRequisito);
        $moc = Moc::find($mocReq->IdMOC);
        $requisito = RequisitosSubParteMatrizCumpliProg::find($mocReq->IdRequsito);
        

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_evidencias')
                ->with('moc', $moc)
                ->with('requisito', $requisito)
                ->with('evidencias', $evidencias)
                ->with('mocReq', $mocReq);
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
