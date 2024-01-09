<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\Permiso;

class ActividadesTipoController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }


    public function editActividad(Request $req){

        $actividad = ActividadesTipoPrograma::find($req->id);
        $actividad->Actividad = $req->actividad;
        $actividad->Responsable = $req->responsable;
        $actividad->Orden = $req->orden;
        
        $actividad->save();

        return response()->json($actividad);

    }

    
    public function store(Request $request)
    {
        $actividad = new ActividadesTipoPrograma;

        $actividad->Actividad = $request->input('Actividad');
        $actividad->Responsable = $request->input('Responsable');
        $actividad->Orden = $request->input('Orden');
        $actividad->IdTipoPrograma = $request->input('IdTipoPrograma');
        $actividad->Activo = 1;

        $actividad->save();

        return back();
    }

    
    public function show($IdTipoPrograma)
    {
        $actividades = ActividadesTipoPrograma::getActividadesByTipoProg($IdTipoPrograma);
        $tipoPrograma = TipoPrograma::find($IdTipoPrograma);

        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.variables.ver_tipo_programa_actividades')
                ->with('actividades', $actividades)
                ->with('tipoPrograma', $tipoPrograma)->with('permiso', $permiso);
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($IdActividad)
    {
        $actividad = ActividadesTipoPrograma::find($IdActividad);
        $actividad->delete();
        return back();
    }
}
