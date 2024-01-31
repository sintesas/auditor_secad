<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Anotacion;
use App\Models\VWInformePlanMejora;
use App\Models\Permiso;

class InformePlanMejoraController extends Controller
{
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;

     
        $anotaciones = Anotacion::all();   
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');

        return view ('auditoria.informes.ver_informe_plan_mejora')
                    ->with('anotaciones', $anotaciones)->with('permiso', $permiso);
    }
    

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($IdAnotacion)
    {
        $informemejora= VWInformePlanMejora::where('IdAnotacion','=',$IdAnotacion)->get();
        
        $sql = "SELECT 
                        causa.CausaRaiz,
                        tarea.AccionTarea ,
                        tarea.Entregable,
                        tarea.CantidadEntregable,
                        tarea.FechaInicio,
                        tarea.FechaFinal,
                        ldpa.Name
                    FROM AU_Reg_CausasRaizTareas tarea, AU_Reg_usersLDAP ldpa, AU_Reg_CausasRaiz causa
                    WHERE ldpa.IdUserLDAP = tarea.IdResponsable
                    AND causa.IdCausaRaiz = tarea.IdCausaRaiz
                    AND causa.IdAnotacion = '$IdAnotacion'";

        $tareas = \DB::select($sql);

        return view ('auditoria.informes.visual_informe_plan_mejora')
                    ->with('informemejora', $informemejora)
                    ->with('tareas', $tareas)
                    ->with('idanotacion', $IdAnotacion);
    }

   
    public function edit($IdAnotacion)
    {
        $informemejora= VWInformePlanMejora::where('IdAnotacion','=',$IdAnotacion)->get();

        $sql = "SELECT 
                        causa.CausaRaiz,
                        tarea.AccionTarea ,
                        tarea.Entregable,
                        tarea.CantidadEntregable,
                        tarea.FechaInicio,
                        tarea.FechaFinal,
                        ldpa.Name
                    FROM AU_Reg_CausasRaizTareas tarea, AU_Reg_usersLDAP ldpa, AU_Reg_CausasRaiz causa
                    WHERE ldpa.IdUserLDAP = tarea.IdResponsable
                    AND causa.IdCausaRaiz = tarea.IdCausaRaiz
                    AND causa.IdAnotacion = '$IdAnotacion'";

        $tareas = \DB::select($sql);

        return \PDF::loadView('auditoria.informes.pdf_informe_plan_mejora', ['informemejora' => $informemejora, 'tareas' => $tareas])
            ->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');
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
