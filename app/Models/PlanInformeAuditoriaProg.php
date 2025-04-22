<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanInformeAuditoriaProg extends Model
{
    protected $table = 'AU_Reg_AuditoriaProgramasPlanInformeAuditoria';

    protected $primaryKey = 'id_planinformeauditoria';

    public $timestamps = false;


    
	public static function getInformeAuditoria($id_planauditoria){
		return \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoria')
				->where('id_planauditoria','=',$id_planauditoria)
				->get();
	}

    

}