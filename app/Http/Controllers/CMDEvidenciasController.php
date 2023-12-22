<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CMDEvidencias;
use App\Models\Ata;
use App\Models\Programa;
use App\Models\NivelProgBaseCerti;

class CMDEvidenciasController extends Controller
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
        $evidencias = new CMDEvidencias;

        $evidencias->IdCMDRequisitos = $request->input('IdCMDRequisitos');
        $evidencias->Nombre = $request->input('Nombre');
        $evidencias->ParteNumero = $request->input('ParteNumero');
        $evidencias->Cantidad = $request->input('Cantidad');
        $evidencias->ATA = $request->input('ATA');
        $evidencias->Version = $request->input('Version');
        $evidencias->Fecha = $request->input('Fecha');
        $evidencias->ObservacionesVersion = $request->input('ObservacionesVersion');
        $evidencias->Active = 1;

        $evidencias->save();

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('cmdEvidencias.show', $request->input('IdCMDRequisitos'))->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdCMDRequisitos)
    {
        $evidencias = CMDEvidencias::getByRequsitos($IdCMDRequisitos);

         //dropdown ATA
        $atas = Ata::getAta();
        $atas->prepend('None');

        return view ('certificacion.cmd.ver_cmd_control_configuracion_Evidencias')
                ->with('evidencias', $evidencias)
                ->with('atas', $atas)
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
        $evidencia = NivelProgBaseCerti::find($id);
        $evidencia->elemento = $request->input('elemento');
        $evidencia->Parte = $request->input('parte');
        $evidencia->Cantidad = $request->input('cantidad');
        $evidencia->IdATA = $request->input('idATA');
        $evidencia->Version = $request->input('Version');
        $evidencia->Fecha = $request->input('fecha');
        $evidencia->save();

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


        return redirect()->route('cmdcontrolconfiguracion.edit',$evidencia->IdPrograma)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdCMDEvidencias)
    {
         $evidencias = CMDEvidencias::find($IdCMDEvidencias);

         $evidencias->delete();

         $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
            );

        //  $exists = \DB::table('AU_Reg_MocsSubParteMatriz')->where('IdSubParteMatriz', $IdSubParteMatriz)->first();

        // if(!$exists){

        //     $subPartMatriz->delete();
        //     $notification = array(
        //       'message' => 'Datos eliminados correctamente',
        //       'alert-type' => 'success'
        //     );
        // }
        // else
        // {
        //     $notification = array(
        //         'message' => 'No se puede eliminar esta Base de Certificacion ya que esta asiganada a un Programa y pueden afectar su proceso de certificación',
        //         'alert-type' => 'warning'
        //     );
        // }

        return redirect()->route('cmdEvidencias.show', $evidencias->IdCMDRequisitos)->with($notification);
    }
}
