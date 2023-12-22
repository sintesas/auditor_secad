<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;
use App\Models\VWSeguimiento;

class InformeVisitaAcompanamientoController extends Controller
{
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
            $audiorias = Auditoria::all();
            $auditoria->prepend('None');

            return view ('auditoria.informes.ver_informe_visita_acompanamiento')
                    ->with('auditoria', $audiorias);
        }else{
            $audiorias = Auditoria::getByUser($idPersonal);
            $audiorias->prepend('None');

            return view ('auditoria.informes.ver_informe_visita_acompanamiento')
                    ->with('auditoria', $audiorias);
        }
        
    }

    
    public function create()
    {

        // return \PDF::loadView('auditoria.informes.pdf_informe_visita_acompanamiento')->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');


        return \PDF::loadView('auditoria.informes.pdf_informe_visita_acompanamiento')->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->setOption('orientation', 'Landscape')->download('informe-inspeccion-empresas.pdf');

          
    }

    
    public function store(Request $request)
    {
        $visitaControlNoId = $request->get('VisitaControlNo');
        return view('auditoria.informes.visual_informe_visita_acompanamiento');
    }

    
    public function show($id)
    {
       return view('auditoria.informes.visual_informe_visita_acompanamiento');
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

     //GET No VISITAS BY AUDITORIA
    public function getNoVisita(Request $request, $id)
    {
        if($request->ajax())
        {
            $visitas = VWSeguimiento::noVisitasAuditoria($id);
            return response()->json($visitas);
        }
    }
}
