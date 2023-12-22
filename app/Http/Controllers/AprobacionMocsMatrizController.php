<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MocsRequsitoMatriz;
use App\Models\RequisitosSubParteMatrizCumpliProg;
use App\Models\Moc;

class AprobacionMocsMatrizController extends Controller
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
        $IdMocRequisito = $request->input('IdMocRequisito');
        $mocRequi =  MocsRequsitoMatriz::find($IdMocRequisito);

        $mocRequi->Aprobado =   $request->input('Aprobado');
        $mocRequi->Obervaciones = $request->input('Obervaciones');
        $mocRequi->NombresApellidos = $request->input('NombresApellidos');
        $mocRequi->Fecha = $request->input('Fecha');

        $mocRequi->save();


        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


        $mocs = Moc::getMocsByRequisito($mocRequi->IdRequsito);

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_aprobacionMocs')
                ->with('mocs', $mocs);
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
        $req = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);

       return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_aprobacionMocs')
                ->with('mocs', $mocs)
                ->with('req', $req);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdMocRequisito)
    {
         $mocRequi =  MocsRequsitoMatriz::find($IdMocRequisito);
         return view ('certificacion.programasSECAD.matrizCumplimiento.crear_matriz_cumplimiento_aprobacionMocs')
            ->with('IdMocRequisito', $IdMocRequisito)
            ->with('mocRequi', $mocRequi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdMocRequisito)
    {
        

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
