<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\APACxAuditoria;
use App\Models\Permiso;

class ConsolidadoProgramaXTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');
        return view ('auditoria.tablasDinamicas.TDINConsolidadoProgramaXTipo')->with('permiso', $permiso);
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
    public function show($id)
    {
        //
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

    public function vAuditorias(Request $request){
        if($request->ajax())
        {
            $auditorias = APACxAuditoria::all('Codigo','Empresa','ProgramaCalidad','TipoAnotacion', "NoAnota");
            //$auditorias = Empresa::all();
            return response()->json($auditorias);
        }
    }
}
