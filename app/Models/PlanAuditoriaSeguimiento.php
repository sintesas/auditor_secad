<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAuditoriaSeguimiento extends Model
{
    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimiento';

    protected $primaryKey = 'id_planauditoriaseguimiento';

    public $timestamps = false;


    
	public static function getSeguimiento($id_planauditoria){
		return \DB::table('AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimiento')
				->where('id_planauditoria','=',$id_planauditoria)
				->get();
	}

    

}