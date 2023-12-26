<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaSegProgEmp extends Model
{
    protected $table = 'dbo.AU_Reg_ListasSeguimientoEmp';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdListaSeguimientoEmp";
	}

	public static function getSeguimientoEmpByProgByActi($idProgama, $idActividad){
		return ListaSegProgEmp::where('IdPrograma','=', $idProgama)
				->where('IdActividad','=', $idActividad)
				->get();

	}
}
