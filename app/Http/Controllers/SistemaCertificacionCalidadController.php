<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Empresa;
Use App\SistemaCertificacionCalidad;

class SistemaCertificacionCalidadController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request, $IdEmpresa)
    {

        $empresa = Empresa::find($IdEmpresa);

        

        $empresa->sistemascertificacioncalidad()->saveMany([]);

        $sistemacertificacioncalidad = new SistemaCertificacionCalidad;

    }

    
    public function show($id)
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
