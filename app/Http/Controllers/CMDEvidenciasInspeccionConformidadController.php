<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CMDEvidenciasInspeccionConformidad;
use App\Models\CMDEvidencias;

class CMDEvidenciasInspeccionConformidadController extends Controller
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
        $exists = \DB::table('AU_Reg_CMDEvidenciasInspeccionConformidad')->where('IdCMDEvidencias', $IdCMDEvidencias)->first();

        if(!$exists){
            $inspeConf = new CMDEvidenciasInspeccionConformidad;

            $inspeConf->IdCMDEvidencias = $IdCMDEvidencias;
            //Ensayos
            $inspeConf->Tipo = $request->input('Tipo');
            $inspeConf->CodigoProcediEnsayo = $request->input('CodigoProcediEnsayo');
            $inspeConf->VersionEnsayo = $request->input('VersionEnsayo');
            $inspeConf->ReporteEnsayo = $request->input('ReporteEnsayo');
            //Metodo Inspeccion
            $inspeConf->Metodo = $request->input('Metodo');
            $inspeConf->CodigoProcediMetodo = $request->input('CodigoProcediMetodo');
            $inspeConf->VersionMetodo = $request->input('VersionMetodo');
            $inspeConf->ReporteMetodo = $request->input('ReporteMetodo');
            //Control
            $inspeConf->DoocumentoControl = $request->input('DoocumentoControl');
            $inspeConf->VersionControl = $request->input('VersionControl');
            $inspeConf->ReporteControl = $request->input('ReporteControl');

            $inspeConf->Active =1;

            $inspeConf->save();

            $notification = array(
                'message' => 'Datos guardados correctamente',
                'alert-type' => 'success'
            );
        }
        else{
            $IdCMDEviInspeccion = $request->input('IdCMDEviInspeccion');
            $inspeConf = CMDEvidenciasInspeccionConformidad::find($IdCMDEviInspeccion);

            $inspeConf->IdCMDEvidencias = $IdCMDEvidencias;
            //Ensayos
            $inspeConf->Tipo = $request->input('Tipo');
            $inspeConf->CodigoProcediEnsayo = $request->input('CodigoProcediEnsayo');
            $inspeConf->VersionEnsayo = $request->input('VersionEnsayo');
            $inspeConf->ReporteEnsayo = $request->input('ReporteEnsayo');
            //Metodo
            $inspeConf->Metodo = $request->input('Metodo');
            $inspeConf->CodigoProcediMetodo = $request->input('CodigoProcediMetodo');
            $inspeConf->VersionMetodo = $request->input('VersionMetodo');
            $inspeConf->ReporteMetodo = $request->input('ReporteMetodo');
            //Control
            $inspeConf->DoocumentoControl = $request->input('DoocumentoControl');
            $inspeConf->VersionControl = $request->input('VersionControl');
            $inspeConf->ReporteControl = $request->input('ReporteControl');
            
            $inspeConf->Active =1;

            $inspeConf->save();

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
        $inspeConf = CMDEvidenciasInspeccionConformidad::getByEvidencia($IdCMDEvidencias);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evide_Inspeccion')
                ->with('inspeConf', $inspeConf)
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
