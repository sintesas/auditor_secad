<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContenidoTematico extends Model
{
     protected $table = 'dbo.AU_Mst_ContenidoTematico';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdContenidoTematico";
	}

	public static function getContenidoTematico($IdEspecialidadCertificacion){
		return ContenidoTematico::where('dbo.AU_Mst_ContenidoTematico.IdEspecialidadCertificacion','=',$IdEspecialidadCertificacion)
		->get();
	}
}
