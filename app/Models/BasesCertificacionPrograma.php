<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasesCertificacionPrograma extends Model
{
    protected $table = 'dbo.AU_Reg_BasesCertificacionPrograma';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdBaseCertPrograma";
	}

	public static function getByPrograma($IdPrograma){
		return BasesCertificacionPrograma::where('IdPrograma', '=', $IdPrograma)->get();
	}
	public static function getByProgramas($IdPrograma,$IdBaseCertificacion){
		return BasesCertificacionPrograma::where('IdPrograma', '=', $IdPrograma)->Where('IdBaseCertificacion', '=', $IdBaseCertificacion)->get();
	}
}
