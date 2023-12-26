<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListadoDemandaPotencial extends Model
{
    protected $table = 'dbo.AUFACVW_DemandaPotencial';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdDemandaPotencial";
	}

	public static function getDemandaPotencialAnio($anio){
		return ListadoDemandaPotencial::where('Anio', '=', $anio)->get();
	}
}
