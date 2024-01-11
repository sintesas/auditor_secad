<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;
use App\Models\VWAuditoriaYSeguimiento;

class InformeAnotacionesSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $idPersonal = Auth::user()->IdPersonal;

        $audiorias = Auditoria::all();
            return view ('auditoria.informes.ver_informe_anotaciones_seguimiento')
                    ->with('audiorias', $audiorias);

        // if (Auth::user()->hasRole('administrador')) {
        //     $audiorias = Auditoria::all();
        //     return view ('auditoria.informes.ver_informe_anotaciones_seguimiento')
        //             ->with('audiorias', $audiorias);
        // }else{
        //     $audiorias = Auditoria::getByUser($idPersonal);
        //     return view ('auditoria.informes.ver_informe_anotaciones_seguimiento')
        //             ->with('audiorias', $audiorias);
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
        $informeanotacionesseguimiento= Auditoria::where('IdAuditoria','=',$IdAuditoria)->get();
        $informeauditoriaseguimiento = VWAuditoriaYSeguimiento::where('Expr1','=',$IdAuditoria)->get();

        return view ('auditoria.informes.visual_informe_anotaciones_seguimiento')
                    ->with('informeanotacionesseguimiento', $informeanotacionesseguimiento)
                    ->with('informeauditoriaseguimiento', $informeauditoriaseguimiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdAuditoria)
    {
        $informeanotacionesseguimiento= Auditoria::where('IdAuditoria','=',$IdAuditoria)->get();
        $informeauditoriaseguimiento = VWAuditoriaYSeguimiento::where('IdAuditoria','=',$IdAuditoria)->get();   

        return \PDF::loadView('auditoria.informes.pdf_informe_anotaciones_seguimiento', ['informeanotacionesseguimiento' => $informeanotacionesseguimiento, 'informeauditoriaseguimiento' => $informeauditoriaseguimiento])->setOption('disable-smart-shrinking', true)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->setOption('orientation', 'Landscape')->download('informe-inspeccion-empresas.pdf'); 
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