<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;


class Aeronave extends Model
{
//    use LogsActivity;
   
   protected $table = 'dbo.AU_Mst_Aeronaves';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdAeronave";
	}

	public static function getAeronaves(){
		return Aeronave::select('dbo.AU_Mst_Aeronaves.IdAeronave',
								\DB::raw("CONCAT (dbo.AU_Mst_Aeronaves.Equipo, ' | ', dbo.AU_Mst_Aeronaves.Aeronave) as Equipo"))
					->get();
	}
}
