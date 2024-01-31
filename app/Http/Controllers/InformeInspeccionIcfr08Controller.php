<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;
use App\Models\Permiso;


class InformeInspeccionIcfr08Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;

       // if (Auth::user()->hasRole('administrador')) {
            
       // }else{
            
       // }

        $idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;

        $audiorias = Auditoria::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');
        return view ('auditoria.informes.ver_informe_inspeccion_icfr08')
                    ->with('audiorias', $audiorias)->with('permiso', $permiso);

        // if (Auth::user()->hasRole('administrador')) {
        //     $audiorias = Auditoria::all();
        //     return view ('auditoria.informes.ver_informe_inspeccion_icfr08')
        //             ->with('audiorias', $audiorias);
        // }else{

        //     if (Auth::user()->hasRole('empresario')) {
        //         $audiorias = Auditoria::getByEmpresa($idEmpresa);
        //         return view ('auditoria.informes.ver_informe_inspeccion_icfr08')
        //             ->with('audiorias', $audiorias);
        //     }
        //     else
        //     {
        //         $audiorias = Auditoria::getByUser($idPersonal);
        //     return view ('auditoria.informes.ver_informe_inspeccion_icfr08')
        //             ->with('audiorias', $audiorias);
        //     }
        // }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdAuditoria)
    {

        //Seguimiento
        $seguimiento = \DB::select('EXEC AUFACSP_InformeAccionesCorrectivas @IdAuditoria='.$IdAuditoria.', @Busqueda=1');
        //Hallazgo
        $hallazgo = \DB::select('EXEC AUFACSP_InformeAccionesCorrectivas @IdAuditoria='.$IdAuditoria.', @Busqueda=2');

        $informeinspeccionicfr08= \DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=4, @IdAuditoria = ?', array($IdAuditoria));
        return view ('auditoria.informes.visual_informe_inspeccion_icfr08')
                    ->with('seguimiento', $seguimiento)
                    ->with('hallazgo', $hallazgo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdAuditoria)
    {
        //Seguimiento
        $seguimiento = \DB::select('EXEC AUFACSP_InformeAccionesCorrectivas @IdAuditoria='.$IdAuditoria.', @Busqueda=1');
        //Hallazgo
        $hallazgo = \DB::select('EXEC AUFACSP_InformeAccionesCorrectivas @IdAuditoria='.$IdAuditoria.', @Busqueda=2');

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_icfr08', ['seguimiento' => $seguimiento, 'hallazgo' => $hallazgo])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-empresas.pdf');    
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