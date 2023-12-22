<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ata extends Model
{	
	
	protected $table = 'dbo.AU_Reg_ATA';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdATA";
	}

	public static function getAta(){
		return Ata::select("dbo.AU_Reg_ATA.IdATA", 
				    \DB::raw("CONCAT ( dbo.AU_Reg_ATA.CodATA, ' | ',dbo.AU_Reg_ATA.ATA) as ATA"))->get();
	}

}
