<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitosSubParteMatrizCumpliProg extends Model
{
    protected $table = 'dbo.AU_Reg_RequisitosSubParteMatrizCumpliProg';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdRequsito";
	}

	public static function getRequistosBySubParte($IdSubParteMatriz){
		return RequisitosSubParteMatrizCumpliProg::where('IdSubParteMatriz','=', $IdSubParteMatriz)->get();
	}

	public static function getRequistosBySubParteAprobados($IdSubParteMatriz){
		return RequisitosSubParteMatrizCumpliProg::where('IdSubParteMatriz','=', $IdSubParteMatriz)->where('Estado','=', 'Aprobado')->get();
	}
}
