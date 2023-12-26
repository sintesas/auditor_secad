<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CMDRequisitos extends Model
{
    protected $primaryKey = 'IdCMDRequisitos';

    protected $table = 'AU_Reg_CMDRequisitos';

    public $timestamps = false;

    public static function getByIdIdSubParteMatriz($IdSubParteMatriz){
    	return CMDRequisitos::where('IdSubParteMatriz', '=', $IdSubParteMatriz)->get();
    }
}
