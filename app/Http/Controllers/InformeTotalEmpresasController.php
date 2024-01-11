<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\Permiso;

class InformeTotalEmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view ('fomento.empresas.informes.visual_informe_empresas')
                ->with('empresas', $empresas)->with('permiso', $permiso);
    }

    
    public function create()
    {

        $empresas = Empresa::all();

        return \PDF::loadView('fomento.empresas.informes.pdf_informe_empresas', ['empresas' => $empresas])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('margin-right', '5mm')->setOption('margin-left', '5mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-total-empresas.pdf');  
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show()
    {
        
    }

   
    public function edit($id)
    {
        //
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
