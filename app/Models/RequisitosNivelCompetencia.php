<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitosNivelCompetencia extends Model
{
     protected $table = 'dbo.AU_Mst_RequisitosCompetencia';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdRequisitosCompetencia";
	}

	public static function getRequisitos($IdNivelCompetencia){
		return RequisitosNivelCompetencia::where('dbo.AU_Mst_RequisitosCompetencia.IdNivelCompetencia','=',$IdNivelCompetencia)
		->get();
	}
}
