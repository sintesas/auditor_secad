<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAccionHallazgos extends Model
{
    protected $table = 'AU_Reg_AuditoriaProgramasPlanAccionHallazgos';

    protected $primaryKey = 'id_planaccionhallazgos';

    public $timestamps = false;


    
	public static function getPlanAccion($id_planauditoria){
		return \DB::table('AU_Reg_AuditoriaProgramasPlanAccionHallazgos')
				->where('id_planauditoria','=',$id_planauditoria)
				->get();
	}

    

}