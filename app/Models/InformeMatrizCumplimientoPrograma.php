<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeMatrizCumplimientoPrograma extends Model
{
    protected $table = 'dbo.AUFACVW_MatrizCumplimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdSubParteMatriz";
	}

	public static function getByPrograma($IdPrograma){
		return InformeMatrizCumplimientoPrograma::where('IdPrograma', '=', $IdPrograma)->get();
	}
}
