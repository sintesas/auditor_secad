<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaHHAuditoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auditoria.informes.visual_informe_funcionarios');
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
        //return view ('auditoria.informes.visual_informe_funcionarios')->with('idFuncionario', $id);
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

    public function vAuditoria(Request $request){


       /* $dataFuncionarios =
        DB::table('AU_Reg_usersLDAP AS p')
        ->select(
            DB::raw("p.Name as Funcionario, a.NombreAuditoria, a.codigo, ta.TipoAuditoria"),
            DB::raw("sum(cast(DATEDIFF (HOUR, a.FechaInicio, a.FechaTermino) as int) + cast(DATEDIFF (HOUR, a.HoraIni, a.HoraTermi)% 24 as int)) as totalHoras")
            )
        ->join('AU_Reg_Auditorias as a', 'p.IdUserLDAP', '=', 'a.IdPersonalInsp')
        ->join('AU_Mst_TiposAuditoria as ta', 'a.IdTipoAuditoria', '=', 'ta.IdTipoAuditoria')
        ->groupBy('p.Name' ,'a.NombreAuditoria', 'a.codigo ' , 'ta.TipoAuditoria')
        ->get();
        
        return response()->json($dataFuncionarios);*/

   /* $dataFuncionarios =
        DB::table('AU_Reg_Personal AS p')
        ->select(
            DB::raw("concat(p.Nombres, ' ' , p.Apellidos) as Funcionario, a.NombreAuditoria, a.codigo, ta.TipoAuditoria"),
            DB::raw("sum(cast(DATEDIFF (HOUR, a.FechaInicio, a.FechaTermino) as int) + cast(DATEDIFF (HOUR, a.HoraIni, a.HoraTermi)% 24 as int)) as totalHoras")
            )
        ->join('AU_Reg_Auditorias as a', 'p.IdPersonal', '=', 'a.IdPersonalInsp')
        ->join('AU_Mst_TiposAuditoria as ta', 'a.IdTipoAuditoria', '=', 'ta.IdTipoAuditoria')
        ->groupBy('p.Nombres' , 'p.Apellidos', 'p.Cedula', 'a.NombreAuditoria', 'a.codigo ' , 'ta.TipoAuditoria')
        ->get();
        
        return response()->json($dataFuncionarios);*/

        $dataFuncionarios =
        DB::table('AU_Reg_FuncionariosEmpresa AS p')
        ->select(
            DB::raw("p.Nombres as Funcionario, a.NombreAuditoria, a.codigo, ta.TipoAuditoria"),
            DB::raw("sum(cast(DATEDIFF (HOUR, a.FechaInicio, a.FechaTermino) as int) + cast(DATEDIFF (HOUR, a.HoraIni, a.HoraTermi)% 24 as int)) as totalHoras")
            )
        ->join('AU_Reg_Auditorias as a', 'p.IdFuncionarioEmpresa', '=', 'a.IdPersonalInsp')
        ->join('AU_Mst_TiposAuditoria as ta', 'a.IdTipoAuditoria', '=', 'ta.IdTipoAuditoria')
        ->groupBy('p.Nombres' , 'a.NombreAuditoria', 'a.codigo ' , 'ta.TipoAuditoria')
        ->get();
        
        return response()->json($dataFuncionarios);

        /*$dataFuncionarios =
        DB::table('AU_Reg_FuncionariosEmpresa AS p')
        ->select(
            DB::raw("p.Nombres as FuncionarioEmpresa, au.Name as FuncionarioDirectorio, a.NombreAuditoria, a.codigo, ta.TipoAuditoria"),
            DB::raw("sum(cast(DATEDIFF (HOUR, a.FechaInicio, a.FechaTermino) as int) + cast(DATEDIFF (HOUR, a.HoraIni, a.HoraTermi)% 24 as int)) as totalHoras")
            )
        ->leftjoin('AU_Reg_Auditorias as a', 'p.IdFuncionarioEmpresa', '=', 'a.IdPersonalInsp')
        ->leftjoin('AU_Reg_usersLDAP AS au', 'au.IdUserLDAP', '=', 'a.IdPersonalInsp')
        ->join('AU_Mst_TiposAuditoria as ta', 'a.IdTipoAuditoria', '=', 'ta.IdTipoAuditoria')
        ->groupBy('p.Nombres' , 'au.Name', 'a.NombreAuditoria', 'a.codigo ' , 'ta.TipoAuditoria')
        ->get();*/
        
        return response()->json($dataFuncionarios);
        
    }
}
