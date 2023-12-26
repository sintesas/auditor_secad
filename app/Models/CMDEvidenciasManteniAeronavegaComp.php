<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDEvidenciasManteniAeronavegaComp extends Model
{
    protected $primaryKey = 'IdCMDEvidenciaMAC';

    protected $table = 'AU_Reg_CMDEvidenciasManteniAeronavegaComp';

    public $timestamps = false;

    public static function getByEvidencia($IdCMDEvidencias){
    	return CMDEvidenciasManteniAeronavegaComp::where('IdCMDEvidencias', '=' , $IdCMDEvidencias)->get()->first();
    }
}
