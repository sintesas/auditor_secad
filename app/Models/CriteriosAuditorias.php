<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class CriteriosAuditorias extends Model
{
    protected $primaryKey = 'IdCriterio';

    protected $table = 'dbo.AU_Reg_CriteriosAuditorias';

    public $timestamps = false;
    
    public static function getProcesosGroupBy(){
        return CriteriosAuditorias::select('IdCriterio','Proceso')
        ->get()
        ->keyBy('Proceso');
    }

    public static function getSubProcesosGroupBy($texto){
        return CriteriosAuditorias::select('IdCriterio','SubProceso')
        ->where('Proceso','like',$texto)
        ->get();
        //->keyBy('SubProceso');
    }
}
