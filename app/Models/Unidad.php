<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'dbo.AU_Mst_Unidades';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdUnidad";
	}
}
