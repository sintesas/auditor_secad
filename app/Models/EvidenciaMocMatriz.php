<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvidenciaMocMatriz extends Model
{
    protected $table = 'dbo.AU_Reg_EvidenciasRequisitoMoc';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEvidenciaRequsitoMoc";
	}

	public static function getByMoc($IdMocRequisito)
	{
		return EvidenciaMocMatriz::where('IdMocRequisito', '=', $IdMocRequisito)->get();
	}
}
