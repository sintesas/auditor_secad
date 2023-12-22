<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;

class InformeInspeccionIcfr03Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiorias = Auditoria::getAllTableInpeccionICFR03();     

        return view ('auditoria.informes.ver_informe_inspeccion_icfr03')
            ->with('audiorias', $audiorias);
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

        //Informe Plan Inspeccion IFCR 03
        $informeinspeccionicfr03= \DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=3, @IdAuditoria = ?', array($IdAuditoria));

        //Hallazgo
        $hallazgo = \DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @Busqueda=2');

        //Auditoria
        $auditoria = Auditoria::find($IdAuditoria)->first();

        //TOTALES
        $sql = "SELECT  top 1
	
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalNoConformidadNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalNoConformidadRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalNoConformidadAdicionada,
                                    
                    SUM(CASE WHEN IdTipoAnotacion = '2' THEN 1 ELSE '' END ) AS totalOptMejora,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalOptMejoraNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END  ) AS totalOptMejoraRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalOptMejoraAdicionada,
                            
                    SUM(CASE WHEN IdTipoAnotacion = '3' THEN 1 ELSE '' END ) AS totalOrdenes,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalOrdenesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalOrdenesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalOrdenesAdicionada,
                        
                    SUM(CASE WHEN IdTipoAnotacion = '5' THEN 1 ELSE '' END ) AS totalRecomendaciones,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalRecomendacionesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalRecomendacionesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalRecomendacionesAdicionada,
                    
                    SUM(CASE WHEN IdTipoAnotacion = '6' THEN 1 ELSE '' END ) AS totalRequerimientos
                                    
                FROM AU_Reg_Anotaciones 
                                                
                WHERE IdAuditoria = '$IdAuditoria'";

        $total = \DB::select($sql);

        return view ('auditoria.informes.visual_informe_inspeccion_icfr03')
                    ->with('informeinspeccionicfr03', $informeinspeccionicfr03)
                    ->with('auditoria', $auditoria)
                    ->with('id_auditoria', $IdAuditoria)
                    ->with('hallazgo', $hallazgo)
                    ->with('total', $total);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdAuditoria)
    {
        //Informe Plan Inspeccion IFCR 03
        $informeinspeccionicfr03= \DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=3, @IdAuditoria = ?', array($IdAuditoria));

        //Hallazgo
        $hallazgo = \DB::select('EXEC AUFACSP_InformeSeguiminetoConsolidado @IdAuditoria='.$IdAuditoria.', @Busqueda=2');

        //Auditoria
        $auditoria = Auditoria::find($IdAuditoria)->first();

        //TOTALES
        $sql = "SELECT  top 1
	
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalNoConformidadNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalNoConformidadRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalNoConformidadAdicionada,
                                    
                    SUM(CASE WHEN IdTipoAnotacion = '2' THEN 1 ELSE '' END ) AS totalOptMejora,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalOptMejoraNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END  ) AS totalOptMejoraRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalOptMejoraAdicionada,
                            
                    SUM(CASE WHEN IdTipoAnotacion = '3' THEN 1 ELSE '' END ) AS totalOrdenes,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalOrdenesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalOrdenesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalOrdenesAdicionada,
                        
                    SUM(CASE WHEN IdTipoAnotacion = '5' THEN 1 ELSE '' END ) AS totalRecomendaciones,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '0' END ) AS totalRecomendacionesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '0' END ) AS totalRecomendacionesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '0' END ) AS totalRecomendacionesAdicionada,
                    
                    SUM(CASE WHEN IdTipoAnotacion = '6' THEN 1 ELSE '' END ) AS totalRequerimientos
                                    
                FROM AU_Reg_Anotaciones 
                                                
                WHERE IdAuditoria = '$IdAuditoria'";

        $total = \DB::select($sql);

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_icfr03', 
            ['informeinspeccionicfr03' => $informeinspeccionicfr03, 'auditoria' => $auditoria, 'hallazgo' => $hallazgo, 'total' => $total])
        ->setOption('disable-smart-shrinking', false)
        ->setOption('margin-top', '0mm')
        ->setOption('lowquality', false)
        ->setOption('page-size', 'A4')
        ->download('informe-inspeccion-empresas.pdf');
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
