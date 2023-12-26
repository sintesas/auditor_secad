<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = 'dbo.AU_Mst_Referencia';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdReferencia";
	}
}
