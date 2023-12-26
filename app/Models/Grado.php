<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'dbo.AU_Mst_Grado';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdGrado";
	}

	public static function getCostoshh(){
		return Grado::orderBy('IdGrado','desc')
			->select('IdGrado',
					 'Abreviatura',
					 'NombreGrado',
					 'Salario',
					 \DB::raw('(Salario / 160) as hh'))
			->get();
	}
}
