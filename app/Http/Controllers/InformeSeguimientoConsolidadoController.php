<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;
use App\VWAuditoriaYSeguimiento;
use App\Models\Permiso;

class InformeSeguimientoConsolidadoController extends Controller
{
    public function index()
    {
        $audiorias = Auditoria::getAllTableSeguimientoConsolidado();
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');
        
        return view ('auditoria.informes.ver_informe_seguimiento_consolidado')
                ->with('audiorias', $audiorias)->with('permiso', $permiso);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdAuditoria)
    {
        //Seguimiento
        $seguimiento =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=1');
        //Hallazgo
        $hallazgo =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=2');
        //ACR
        $acr =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=3');

        return view ('auditoria.informes.visual_informe_seguimiento_consolidado')
                    ->with('seguimiento', $seguimiento)
                    ->with('hallazgo', $hallazgo)
                    ->with('acr', $acr);
    }

    
    public function edit($IdAuditoria)
    {
        //Seguimiento
        $seguimiento =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=1');
        //Hallazgo
        $hallazgo =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=2');
        //ACR
        $acr =\DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @busqueda=3');

        return \PDF::loadView('auditoria.informes.pdf_informe_seguimiento_consolidado', ['seguimiento' => $seguimiento, 'hallazgo' => $hallazgo, 'acr' => $acr])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-seguimiento-consolidado.pdf');    
		
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
