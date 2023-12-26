<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDEvidenciasInspeccionConformidad extends Model
{
    protected $primaryKey = 'IdCMDEviInspeccion';

    protected $table = 'AU_Reg_CMDEvidenciasInspeccionConformidad';

    public $timestamps = false;

    public static function getByEvidencia($IdCMDEvidencias){
    	return CMDEvidenciasInspeccionConformidad::where('IdCMDEvidencias', '=' , $IdCMDEvidencias)->get()->first();
    }
}
