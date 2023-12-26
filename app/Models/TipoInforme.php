<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoInforme extends Model
{
    protected $table = 'dbo.AU_Mst_TipoInforme';
 
	public $timestamps = false;

	public function getKeyName(){
    	return "IdTipoInforme";
	}
}
