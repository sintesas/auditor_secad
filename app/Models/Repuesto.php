<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'dbo.AU_Mst_Repuesto';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdRepuesto";
	}
}
