<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditoriaProgPlanAuditoria extends Model
{
    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoria';

    protected $primaryKey = 'id_planauditoria';

    public $timestamps = false;

    public static function getAuditoriaProgramas()
    {
        return \DB::table('vw_AU_Reg_AuditoriaProgramas')->get(); 
    }

    public static function getPlanAuditoriaAuditoriaProg($id_auditoriaprog){
		return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
				->where('id_auditoriaprog','=',$id_auditoriaprog)
				->get();
	}
    
	public static function getPlanAuditoria($id_planauditoria){
		return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoria')
				->where('id_planauditoria','=',$id_planauditoria)
				->get();
	}

    

}