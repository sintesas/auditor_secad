<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDEvidencias extends Model
{
    protected $primaryKey = 'IdCMDEvidencias';

    protected $table = 'AU_Reg_CMDEvidencias';

    public $timestamps = false;

    public static function getByRequsitos($IdCMDRequisitos){
    	return CMDEvidencias::where('IdCMDRequisitos', '=' , $IdCMDRequisitos)->get();
    }
}
