<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Grado;

class CuerposFAC extends Model
{
    protected $table = 'dbo.AU_Mst_Cuerpo';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCuerpo";
	}

	public static function getCuerpos(){
		return CuerposFAC::orderBy('CuerpoFAC', 'asc')
			->orderBy('NombreCuerpo', 'asc')
			->select('IdCuerpo', \DB::raw("CONCAT ( CuerpoFAC, ' | ', NombreCuerpo) as NombreCuerpo"))
			->get();
	}
	

	public static function getCuerposByGrado($Idgrado){

		$grado = Grado::find($Idgrado);

		return CuerposFAC::where('dbo.AU_Mst_Cuerpo.CuerpoFAC','=', $grado->Categoria)
		->select('IdCuerpo', 
	    		 'NombreCuerpo')
		->get();
	}
}
