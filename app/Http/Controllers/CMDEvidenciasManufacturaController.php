<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CMDEvidenciasManufactura;
use App\CMDEvidencias;

class CMDEvidenciasManufacturaController extends Controller
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
        $exists = \DB::table('AU_Reg_CMDEvidenciasManufactura')->where('IdCMDEvidencias', $IdCMDEvidencias)->first();

        if(!$exists){
            $manu = new CMDEvidenciasManufactura;

            $manu->IdCMDEvidencias = $IdCMDEvidencias;
            $manu->NombreProcesosManufactura = $request->input('NombreProcesosManufactura');
            $manu->CodigoProceso = $request->input('CodigoProceso');
            $manu->Version = $request->input('Version');
            $manu->ObtencionMateriasPrimas = $request->input('ObtencionMateriasPrimas');
            $manu->Hoja = $request->input('Hoja');
            $manu->Active =1;

            $manu->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }
        else{
            $IdCMDEviManufactura = $request->input('IdCMDEviManufactura');
            $manu = CMDEvidenciasManufactura::find($IdCMDEviManufactura);

            $manu->IdCMDEvidencias = $IdCMDEvidencias;
            $manu->NombreProcesosManufactura = $request->input('NombreProcesosManufactura');
            $manu->CodigoProceso = $request->input('CodigoProceso');
            $manu->Version = $request->input('Version');
            $manu->ObtencionMateriasPrimas = $request->input('ObtencionMateriasPrimas');
            $manu->Hoja = $request->input('Hoja');
            $manu->Active =1;

            $manu->save();

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
        $manu = CMDEvidenciasManufactura::getByEvidencia($IdCMDEvidencias);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evide_Manufac')
                ->with('manu', $manu)
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
