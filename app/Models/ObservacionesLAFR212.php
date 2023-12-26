<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservacionesLAFR212 extends Model
{
    protected $table = 'dbo.AU_Reg_LAFR212_Observaciones';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdLAFR212Obs";
	}

	public static function getByIdprograma($IdPrograma)
	{
		return ObservacionesLAFR212::where('IdPrograma','=', $IdPrograma)->get();
	}

	public static function getLastByIdprograma($IdPrograma)
	{
		return ObservacionesLAFR212::where('IdPrograma','=', $IdPrograma)
									->orderBy('IdLAFR212Obs', 'desc')->get()->first();
	}
}
