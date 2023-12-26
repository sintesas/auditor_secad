<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadesTipoPrograma extends Model
{
     protected $table = 'dbo.AU_Mst_Actividades_TipoPrograma';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdActividad";
	}

	public static function getActividadesByTipoProg($IdTipoPrograma){
		return ActividadesTipoPrograma::where('IdTipoPrograma','=',$IdTipoPrograma)
										->orderBy('Orden')
										->get();
	}
}
