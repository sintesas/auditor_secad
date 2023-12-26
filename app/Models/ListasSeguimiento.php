<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListasSeguimiento extends Model
{
    protected $table = 'dbo.AU_Reg_ListasSeguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdListaSeguimiento";
	}

	

	public static function getSeguimientoByProgByActi($idProgama, $idActividad){
		return ListasSeguimiento::where('IdPrograma','=', $idProgama)
				->where('IdActividad','=', $idActividad)
				->get();

	}
}
