<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Auditoria;
use App\Models\VWInformeInspeccionFinal;
use App\Models\UsersLDAP;
use App\Models\Permiso;
class InformePlanInspeccionFinalController extends Controller
{
    public function index()
    {
      $audiorias = Auditoria::all();
        /*$rol = UsersLDAP::perteneceIGEFA();

        if($rol){
            $audiorias = Auditoria::all();
        }else{
            $rol = UsersLDAP::perteneceCEOAF();
            if($rol){
                $audiorias = Auditoria::all();
            }
        }*/
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');
        return view ('auditoria.informes.ver_informe_inspeccion_final')
            ->with('audiorias', $audiorias)->with('permiso', $permiso);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show($IdAuditoria)
    {
      //dd(VWInformeInspeccionFinal::all() );
        $dataAuditoria = VWInformeInspeccionFinal::getDataAuditoria($IdAuditoria);


        $dataCriterios = VWInformeInspeccionFinal::getDataCriterios($IdAuditoria);

        $dataEquipoInspector = VWInformeInspeccionFinal::getDataEquipoInspector($IdAuditoria);

        $dataActividades = VWInformeInspeccionFinal::getDataActividades($IdAuditoria);

        return view ('auditoria.informes.visual_informe_inspeccion_final')
                    ->with('dataAuditoria', $dataAuditoria)
                    ->with('dataCriterios', $dataCriterios)
                    ->with('dataEquipoInspector', $dataEquipoInspector)
                    ->with('dataActividades', $dataActividades);
    }


    public function edit($IdAuditoria)
    {

        $dataAuditoria = VWInformeInspeccionFinal::getDataAuditoria($IdAuditoria);

        $dataCriterios = VWInformeInspeccionFinal::getDataCriterios($IdAuditoria);

        $dataEquipoInspector = VWInformeInspeccionFinal::getDataEquipoInspector($IdAuditoria);

        $dataActividades = VWInformeInspeccionFinal::getDataActividades($IdAuditoria);

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_final',
                    ['dataAuditoria' => $dataAuditoria, 'dataCriterios' => $dataCriterios, 'dataEquipoInspector' => $dataEquipoInspector, 'dataActividades' => $dataActividades]
                )->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');
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
