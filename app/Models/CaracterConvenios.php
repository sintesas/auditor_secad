<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracterConvenios extends Model
{
    protected $table = 'Au_Mst_CaracterConvenios';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCaracteConvenios";
	}

}
