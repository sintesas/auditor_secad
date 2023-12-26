<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
    protected $table = 'dbo.AU_Mst_Origen';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdOrigen";
	}
}
