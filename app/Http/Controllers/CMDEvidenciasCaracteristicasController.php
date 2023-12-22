<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CMDEvidenciasCaracteristicas;
use App\Models\CMDEvidencias;

class CMDEvidenciasCaracteristicasController extends Controller
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
        $exists = \DB::table('AU_Reg_CMDEvidenciasCaracteristicas')->where('IdCMDEvidencias', $IdCMDEvidencias)->first();

        if(!$exists){
            $carac = new CMDEvidenciasCaracteristicas;

            $carac->IdCMDEvidencias = $IdCMDEvidencias;
            $carac->QTY = $request->input('QTY');
            $carac->Nivel = $request->input('Nivel');
            $carac->Material = $request->input('Material');
            $carac->NombreArchivo = $request->input('NombreArchivo');
            $carac->Version = $request->input('Version');
            $carac->Hoja = $request->input('Hoja');
            $carac->Active =1;

            $carac->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }
        else{
            $IdCMDEviCaracteristica = $request->input('IdCMDEviCaracteristica');
            $carac = CMDEvidenciasCaracteristicas::find($IdCMDEviCaracteristica);

            $carac->IdCMDEvidencias = $IdCMDEvidencias;
            $carac->QTY = $request->input('QTY');
            $carac->Nivel = $request->input('Nivel');
            $carac->Material = $request->input('Material');
            $carac->NombreArchivo = $request->input('NombreArchivo');
            $carac->Version = $request->input('Version');
            $carac->Hoja = $request->input('Hoja');
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
        $carac = CMDEvidenciasCaracteristicas::getByEvidencia($IdCMDEvidencias);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evide_Caracteri')
                ->with('carac', $carac)
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
