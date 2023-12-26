<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiares extends Model
{
    protected $table = 'dbo.AU_Mst_FamiliaresPersonal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdFamiliar";
	}

	public static function familiaresPersonal($IdPersonal)
	{
		return Familiares::where('IdPersonal','=',$IdPersonal)->get();
	}
}
