<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\RequisitosSubParteMatrizCumpliProg;
use App\Models\BaseCertificacion;

class MatrizComplimientoRequisitosProgController extends Controller
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
        $requisitos = new RequisitosSubParteMatrizCumpliProg;

        $requisitos->IdSubParteMatriz = $request->input('IdSubParteMatriz');
        $requisitos->CodigoRequisito = $request->input('CodigoRequisito');
        $requisitos->NombreRequisito = $request->input('NombreRequisito');
        $requisitos->DescripcioRequisito = $request->input('DescripcioRequisito');
        $requisitos->GuiaAplicable = $request->input('GuiaAplicable');
        $requisitos->Estado = 'En Proceso';
        $requisitos->Activo = 1;

        $requisitos->save();

        $notification = array(
            'message' => 'Datos guardados correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('requisitosMatrizCumpli.show', $requisitos->IdSubParteMatriz)
                         ->with($notification) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdSubParteMatriz)
    {        
        $subParte = SubParteMatrizCumpliProg::find($IdSubParteMatriz);
        $baseCertificacion = BaseCertificacion::find($subParte->IdBaseCertificacion);
        $requsitos = RequisitosSubParteMatrizCumpliProg::getRequistosBySubParte($IdSubParteMatriz);

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_requisitos')
                ->with('subParte', $subParte)
                ->with('requsitos', $requsitos)
                ->with('baseCertificacion', $baseCertificacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdRequsito)
    {
        $requesito = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);
        return view ('certificacion.programasSECAD.matrizCumplimiento.editar_matriz_cumplimiento_requisitos')
                ->with('requesito', $requesito);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdRequsito)
    {
        $requesito = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);

        $requesito->IdSubParteMatriz = $request->input('IdSubParteMatriz');
        $requesito->CodigoRequisito = $request->input('CodigoRequisito');
        $requesito->NombreRequisito = $request->input('NombreRequisito');
        $requesito->DescripcioRequisito = $request->input('DescripcioRequisito');
        $requesito->GuiaAplicable = $request->input('GuiaAplicable');
        $requesito->Activo = 1;

        $requesito->save();

        $notification = array(
            'message' => 'Datos guardados correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('requisitosMatrizCumpli.show', $requesito->IdSubParteMatriz)
                         ->with($notification) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdRequsito)
    {
        $requisito = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);

        //VALIDAR sei ya tiene mocs asosciados para dejar borrar
        $exists = \DB::table('AU_Reg_MocsRequisito')->where('IdRequsito', $IdRequsito)->first();

        if (!$exists){
            $requisito->delete();

            $notification = array(
                'message' => 'Datos elimiandos correctamente', 
                'alert-type' => 'success'
            );

        }
        else
        {
            $notification = array(
                'message' => 'Existen datos asociados a este requisito, por esta razon no se puede eliminar.', 
                'alert-type' => 'warning'
            );
        }

        return redirect()->route('requisitosMatrizCumpli.show', $requisito->IdSubParteMatriz)
                         ->with($notification) ;
    }
}
