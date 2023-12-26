<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubParteMatrizCumpliProg extends Model
{
    protected $table = 'dbo.AU_Reg_SubParteMatrizCumpliProg';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdSubParteMatriz";
	}

	public static function getByPrograma($IdPrograma){
		return SubParteMatrizCumpliProg::where('IdPrograma','=', $IdPrograma)->get();
	}

	

	protected $fillable = ['IdSubParteMatriz',
		'IdPrograma',
		'SubParte',
		'CodigoRquisito',
		'NombreRequisito',
		'DescripcioRequisito',
		'GuiaAplicable',
		'Activo',];

}
