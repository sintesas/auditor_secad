<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitosCargo extends Model
{
    protected $table = 'AU_Mst_RequisitosCargo';
    protected $primaryKey = 'IdRequisitosCargo';

    public $timestamps = false;

    public static function getRequisitos($IdCargo){
		return RequisitosCargo::where('dbo.AU_Mst_RequisitosCargo.IdCargo','=',$IdCargo)
		->get();
	}
}
