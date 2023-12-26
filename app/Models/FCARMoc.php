<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FCARMoc extends Model
{
     protected $table = 'dbo.AU_Reg_FCARMoc';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdFCARMoc";
	}

	public static function getByMocRequisito($IdMocRequisito){
		return FCARMoc::where('IdMocRequisito', '=', $IdMocRequisito)->get();
	}
}
