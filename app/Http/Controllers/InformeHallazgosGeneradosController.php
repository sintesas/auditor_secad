<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Auditoria;

class InformeHallazgosGeneradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //informehallazgosgenerados
        $informehallazgosgenerados= \DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=8');
        return view ('auditoria.informes.visual_informe_hallazgos_generados')
                    ->with('informehallazgosgenerados', $informehallazgosgenerados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informehallazgosgenerados= \DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=8');
        return \PDF::loadView('auditoria.informes.pdf_informe_hallazgos_generados', ['informehallazgosgenerados' => $informehallazgosgenerados])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');

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
