<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDEvidenciasCaracteristicas extends Model
{
    protected $primaryKey = 'IdCMDEviCaracteristica';

    protected $table = 'AU_Reg_CMDEvidenciasCaracteristicas';

    public $timestamps = false;

    public static function getByEvidencia($IdCMDEvidencias){
    	return CMDEvidenciasCaracteristicas::where('IdCMDEvidencias', '=' , $IdCMDEvidencias)->get()->first();
    }
}
