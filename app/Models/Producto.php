<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'dbo.AU_Mst_EstadosPrograma';

	public $timestamps = false;

	public function getKeyName(){
    	return "AU_Mst_EstadosPrograma";
	}
}
