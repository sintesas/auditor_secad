<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoSeguimiento extends Model
{
    protected $table = 'dbo.AU_Mst_EstadoSeguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEstadoSeguimiento";
	}
}
