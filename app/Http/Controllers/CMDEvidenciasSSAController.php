<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CMDEvidenciasSSA;
use App\Models\CMDEvidencias;

class CMDEvidenciasSSAController extends Controller
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
        $IdCMDEvidencias = $request->input('IdCMDEvidencias');
        $exists = \DB::table('AU_Reg_CMDEvidenciasSSA')->where('IdCMDEvidencias', $IdCMDEvidencias)->first();

        if(!$exists){
            $carac = new CMDEvidenciasSSA;

            $carac->IdCMDEvidencias = $IdCMDEvidencias;
            $carac->MTBF = $request->input('MTBF');
            $carac->Criticidad = $request->input('Criticidad');
            $carac->Active =1;

            $carac->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }
        else{
            $IdCMDEvidenciaSSA = $request->input('IdCMDEvidenciaSSA');
            $carac = CMDEvidenciasSSA::find($IdCMDEvidenciaSSA);

            $carac->IdCMDEvidencias = $IdCMDEvidencias;
             $carac->MTBF = $request->input('MTBF');
            $carac->Criticidad = $request->input('Criticidad');         
            $carac->Active =1;

            $carac->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }

        return redirect()->route('cmdEvidencias.show', $request->input('IdCMDRequisitos'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdCMDEvidencias)
    {
        $evidencia = CMDEvidencias::find($IdCMDEvidencias);
        $IdCMDRequisitos = $evidencia->IdCMDRequisitos;
        $ssa = CMDEvidenciasSSA::getByEvidencia($IdCMDEvidencias);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evide_SSA')
                ->with('ssa', $ssa)
                ->with('IdCMDEvidencias', $IdCMDEvidencias)
                ->with('IdCMDRequisitos', $IdCMDRequisitos);
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
