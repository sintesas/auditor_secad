<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubParteMatrizCumpliProg;
use App\Models\RequisitosSubParteMatrizCumpliProg;
use App\Models\evidenciaMocMatriz;
use App\Models\MocsRequsitoMatriz;
use App\Models\Moc;

class EvidenciaRequisitoController extends Controller
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
        $evidencia = new evidenciaMocMatriz;

        $evidencia->IdMocRequisito = $request->input('IdMocRequisito');
        $evidencia->Descripcion = $request->input('Descripcion');
        $evidencia->Obervaciones = $request->input('Obervaciones');
        // $evidencia->Documentos = $request->input('Documentos');
        $evidencia->Estado = $request->input('Estado');

        $evidencia->save();

        if($evidencia->Estado == 'Aprobado'){
            
            $mocRq = MocsRequsitoMatriz::find($evidencia->IdMocRequisito);
            $mocRq->Estado = 'Aprobado';
            $mocRq->save();

            $count = count(MocsRequsitoMatriz::getMocsByRequisito($mocRq->IdRequsito));
            $countApro = count(MocsRequsitoMatriz::getMocsByRequisitoAprobados($mocRq->IdRequsito));

            if($count == $countApro){

                $req = RequisitosSubParteMatrizCumpliProg::find($mocRq->IdRequsito);
                $req ->Estado = 'Aprobado';

                $req->save();

                $countReq = count(RequisitosSubParteMatrizCumpliProg::getRequistosBySubParte($req->IdSubParteMatriz));
                $countReqApro = count(RequisitosSubParteMatrizCumpliProg::getRequistosBySubParteAprobados($req->IdSubParteMatriz));

                if($countReq == $countReqApro){
                    $sub = SubParteMatrizCumpliProg::find($req->IdSubParteMatriz);
                    $sub ->Estado = 'Aprobado';

                    $sub->save();
                }
            }
        }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


       
        $evidencias = evidenciaMocMatriz::getByMoc($evidencia->IdMocRequisito);        
        $mocReq = MocsRequsitoMatriz::find($evidencia->IdMocRequisito);
        $moc = Moc::find($mocReq->IdMOC);
        $requisito = RequisitosSubParteMatrizCumpliProg::find($mocReq->IdRequsito);
        
        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_evidencias')
                ->with('moc', $moc)
                ->with('requisito', $requisito)
                ->with('evidencias', $evidencias)
                ->with('mocReq', $mocReq)
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
        
        return view ('certificacion.programasSECAD.matrizCumplimiento.crear_matriz_cumplimiento_evidencias')
                ->with('IdMocRequisito',$IdMocRequisito);
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
