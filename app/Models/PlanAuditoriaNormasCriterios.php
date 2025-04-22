<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAuditoriaNormasCriterios extends Model
{
    protected $primaryKey = 'id_planauditoriocriterio';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoriaCriterios';

    public $timestamps = false;

    
    public static function getCriterios($id_planauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaCriterios')
                  ->where('id_planauditoria', '=', $id_planauditoria)
                  ->pluck('IdBaseCertificacion') 
                  ->toArray(); 
    }

    public static function getCriteriosBaseCertificacion($IdPrograma) {
        return \DB::table('AUFACVW_BaseCertificacion_Programa')
                  ->where('IdPrograma', '=', $IdPrograma)
                  ->pluck('IdBaseCertificacion') 
                  ->toArray(); 
    }
    

}
