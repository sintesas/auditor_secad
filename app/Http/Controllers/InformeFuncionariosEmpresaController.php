<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\FuncionariosEmpresa;
use App\Models\Permiso;

class InformeFuncionariosEmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view ('fomento.empresas.informes.ver_informe_funcionarios_empresa')
                ->with('empresas', $empresas)->with('permiso', $permiso);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdEmpresa)
    {   

        $participantesEvento2 = Empresa::find($IdEmpresa)->funcionarios;
        $empresa = Empresa::find($IdEmpresa);
        return view ('fomento.empresas.informes.visual_informe_funcionarios_empresa')
                    ->with('participantesEvento2', $participantesEvento2)->with('empresa', $empresa);
    }

    
    public function edit($IdEmpresa)
    {
        $participantesEvento2 = Empresa::find($IdEmpresa)->funcionarios;  
        $empresa = Empresa::find($IdEmpresa);
        $nomempresa = $empresa->NombreEmpresa;

        return \PDF::loadView('fomento.empresas.informes.pdf_informe_funcionarios_empresa', ['participantesEvento2' => $participantesEvento2])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe_funcionarios_'.$nomempresa.'.pdf');    
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
