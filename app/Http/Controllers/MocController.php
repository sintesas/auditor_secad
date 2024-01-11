<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Moc;
use App\Models\Permiso;
class MocController extends Controller
{
    public function readMocs(){

		$mocs = Moc::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view('certificacion.variables.ver_tablas_moc')->with('mocs', $mocs )->with('permiso', $permiso);
	}

	public function deleteMoc($idmoc){
	
        $moc = Moc::destroy($idmoc);
        return response()->json($moc);
    
	}


	public function addMoc(Request $request)
    {
        
        $moc = new Moc;
        
        $moc->Numero = $request->input('numero');
        $moc->Medio = $request->input('medio');
        $moc->CodigoAC2324 = $request->input('codigo');
        $moc->DescripcionAC2324 = $request->input('descripcion');
        $moc->Activo = 1;

        $moc->save();

        return redirect()->route('readmocs');
 
    }

    public function editmoc(Request $request){

        $moc = Moc::find($request->idmoc);
        $moc->Numero = $request->numero;
        $moc->Medio = $request->medio;
        $moc->CodigoAC2324 = $request->codigo;
        $moc->DescripcionAC2324 = $request->descripcion;
        $moc->Activo = 1;

        $moc->save();
        return response()->json($moc);

    }
}
