<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequisitosSubParteMatrizCumpliProg;
use App\Models\Moc;

class EvidenciasMocsMatrizController extends Controller
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
    public function show($IdRequsito)
    {

       $mocs = Moc::getMocsByRequisito($IdRequsito);
       $requisito = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);

       return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_evidenciasMocs')
                ->with('mocs', $mocs)
                ->with('requisito', $requisito);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view ('certificacion.programasSECAD.matrizCumplimiento.crear_matriz_cumplimiento_aprobacionMocs');
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
