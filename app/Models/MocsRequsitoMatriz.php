<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MocsRequsitoMatriz extends Model
{
    protected $table = 'dbo.AU_Reg_MocsRequisito';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdMocRequisito";
	}

	public static function getMocsByRequisito($IdRequsito){
		return MocsRequsitoMatriz::where('IdRequsito','=', $IdRequsito)->get();
	}

	public static function getMocsByRequisitoAprobados($IdRequsito){
		return MocsRequsitoMatriz::where('IdRequsito','=', $IdRequsito)->where('Estado','=', 'Aprobado')->get();
	}
}
