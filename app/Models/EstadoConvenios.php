<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoConvenios extends Model
{
    protected $table = 'AU_Mst_EstadoConvenios';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEstadoConvenio";
	}
}
