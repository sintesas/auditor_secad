<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CMDEvidenciasManteniAeronavegaComp;
use App\Models\CMDEvidencias;

class CMDEvidenciasManteniAeronavegaCompController extends Controller
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
        $exists = \DB::table('AU_Reg_CMDEvidenciasManteniAeronavegaComp')->where('IdCMDEvidencias', $IdCMDEvidencias)->first();

        if(!$exists){
            $mac = new CMDEvidenciasManteniAeronavegaComp;

            $mac->IdCMDEvidencias = $IdCMDEvidencias;
            $mac->NumeroCliclos = $request->input('NumeroCliclos');
            $mac->TipoInspeccion = $request->input('TipoInspeccion');
            $mac->ReferenciaInspeccion = $request->input('ReferenciaInspeccion');
            $mac->Version = $request->input('Version');
            $mac->DocumentoCalificacion = $request->input('DocumentoCalificacion');
            $mac->DocumentoProduccion = $request->input('DocumentoProduccion');
            $mac->DocumentoOperacion = $request->input('DocumentoOperacion');
            $mac->DocumentoMantenimiento = $request->input('DocumentoMantenimiento');
            $mac->Active =1;

            $mac->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }
        else{
            $IdCMDEvidenciaMAC = $request->input('IdCMDEvidenciaMAC');
            $mac = CMDEvidenciasManteniAeronavegaComp::find($IdCMDEvidenciaMAC);

            $mac->IdCMDEvidencias = $IdCMDEvidencias;
            $mac->NumeroCliclos = $request->input('NumeroCliclos');
            $mac->TipoInspeccion = $request->input('TipoInspeccion');
            $mac->ReferenciaInspeccion = $request->input('ReferenciaInspeccion');
            $mac->Version = $request->input('Version');
            $mac->DocumentoCalificacion = $request->input('DocumentoCalificacion');
            $mac->DocumentoProduccion = $request->input('DocumentoProduccion');
            $mac->DocumentoOperacion = $request->input('DocumentoOperacion');
            $mac->DocumentoMantenimiento = $request->input('DocumentoMantenimiento');
            $mac->Active =1;

            $mac->save();

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
        $mac = CMDEvidenciasManteniAeronavegaComp::getByEvidencia($IdCMDEvidencias);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evide_MAC')
                ->with('mac', $mac)
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
