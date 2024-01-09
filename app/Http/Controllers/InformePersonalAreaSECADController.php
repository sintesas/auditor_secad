<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cargos;
use App\Models\VWPersonal;
use App\Models\Permiso;

class InformePersonalAreaSECADController extends Controller
{
    public function index()
    {
        $cargos = Cargos::where('AreaCargo','=','SECAD')->get();
        $p = new Permiso;
        $permiso = $p->getPermisos('GR');
        return view ('gestionRecursos.recursoHumano.informes.ver_informe_personal_secad')
                ->with('cargos', $cargos)->with('permiso', $permiso);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdCargo)
    {
        $personal = VWPersonal::where('IdCargo','=', $IdCargo)->get();
        return view ('gestionRecursos.recursoHumano.informes.visual_informe_personal_secad')
                ->with('personal', $personal);
    }

    
    public function edit($IdCargo)
    {
        $personal = VWPersonal::where('IdCargo','=', $IdCargo)->get();

        return \PDF::loadView('gestionRecursos.recursoHumano.informes.pdf_informe_personal_secad', ['informeinspeccion' => $informeinspeccion])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');
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
