<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

use App\VWFuncionariosAuditorias;
use App\Personal;

class InformeFuncionariosAuditoriasController extends Controller
{
    /**
     * Index data funcionarios
     * Return data 
     */
    function index(){
        $dataFuncionarios = \DB::table('AU_Reg_Personal')
            ->join('AU_Reg_Auditorias', 'AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_Auditorias.IdPersonalInsp')
            ->select('AU_Reg_Personal.Nombres', 'AU_Reg_Personal.Apellidos', 'AU_Reg_Personal.IdPersonal')
            ->groupby('AU_Reg_Personal.Nombres', 'AU_Reg_Personal.Apellidos', 'AU_Reg_Personal.IdPersonal')
            ->get();


        return view('auditoria.informes.ver_informe_funcionario_tiempo')
                ->with('dataFuncionarios', $dataFuncionarios);
    }

    /**
     * Ver informes funcionarios
     *Return Data 
     */
    function show($idPersonal){

        $dataFuncionarios = \DB::table('AU_Reg_Personal')
            ->leftJoin('AU_Reg_Auditorias', 'AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_Auditorias.IdPersonalInsp')
            ->where('AU_Reg_Personal.IdPersonal', '=', $idPersonal)
            ->get();

        return view('auditoria.informes.visual_informe_funcionarios')->with('dataFuncionarios',$dataFuncionarios);
    }

    public function edit($IdFuncionarioAuditoria)
    {

        $informefuncionarioauditoria=\DB::table('AU_Reg_Personal')
            ->leftJoin('AU_Reg_Auditorias', 'AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_Auditorias.IdPersonalInsp')
            ->where('AU_Reg_Auditorias.IdAuditoria', '=', $IdFuncionarioAuditoria)
            ->get();

        // return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_final', ['informeinspeccion' => $informeinspeccion])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');

        return \PDF::loadView('auditoria.informes.pdf_informe_funcionario_auditoria', ['dataFuncionarios' => $informefuncionarioauditoria])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');
    }
}
