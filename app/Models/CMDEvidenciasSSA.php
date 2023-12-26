<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDEvidenciasSSA extends Model
{
    protected $primaryKey = 'IdCMDEvidenciaSSA';

    protected $table = 'AU_Reg_CMDEvidenciasSSA';

    public $timestamps = false;

    public static function getByEvidencia($IdCMDEvidencias){
    	return CMDEvidenciasSSA::where('IdCMDEvidencias', '=' , $IdCMDEvidencias)->get()->first();
    }
}
