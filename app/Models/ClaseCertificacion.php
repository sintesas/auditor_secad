<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaseCertificacion extends Model
{
    protected $table = 'dbo.AU_Mst_ClaseCertificacion';

	

	public $timestamps = false;

	public function getKeyName(){
    	return "IdClaseCertificacion";
	}
}
