<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubPartesBaseCertificacion extends Model
{
    protected $table = 'dbo.AU_Mst_SubPartesBaseCertificacion';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdSubParte";
	}

	public static function getByBaseCertificacion($IdBaseCertificacion){
		return SubPartesBaseCertificacion::where('IdBaseCertificacion','=', $IdBaseCertificacion)->get();
	}
}
