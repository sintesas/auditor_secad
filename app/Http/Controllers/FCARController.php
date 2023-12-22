<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FCARMoc;
use App\Models\MocsRequsitoMatriz;

class FCARController extends Controller
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
        $fcar = new FCARMoc;

        $fcar->IdMocRequisito = $request->input('IdMocRequisito');
        $fcar->Seguimiento = $request->input('Seguimiento');
        $fcar->Fechas = $request->input('Fechas');

        $fcar->save();

        $notification = array(
                'message' => 'Datos guardados correctamente', 
                'alert-type' => 'success'
            );       

        $fcars = FCARMoc::getByMocRequisito($fcar->IdMocRequisito);
        $requisito = MocsRequsitoMatriz::find($fcar->IdMocRequisito);
        $dcr = date('Y/m/d');

         return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_fcar')
                ->with('fcars',$fcars)
                ->with('requisito',$requisito)
                ->with('IdMocRequisito',$fcar->IdMocRequisito)
                ->with('dcr', $dcr)
                ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdMocRequisito)
    {
        $fcars = FCARMoc::getByMocRequisito($IdMocRequisito);
        $requisito = MocsRequsitoMatriz::find($IdMocRequisito);
        $dcr = date('Y/m/d');

         return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_fcar')
                ->with('fcars',$fcars)
                ->with('requisito',$requisito)
                ->with('IdMocRequisito',$IdMocRequisito)
                ->with('dcr', $dcr);
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
