<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanInspeccion extends Model
{
    protected $table = 'dbo.AU_Reg_PlanesInspeccion';
	
	public $timestamps = false;

	public function getKeyName(){
    	return "IdPlanInspeccion";
	}

	public function auditorias(){
		return $this->belongsTo(Auditoria::class, 'IdAuditoria');
	}


	public static function getPlanesInspeccion($idPersonal, $name=null){
		return PlanInspeccion::orderBy('IdPlanInspeccion', 'desc')
            ->join('dbo.AU_Reg_Auditorias as a', 'dbo.AU_Reg_PlanesInspeccion.IdAuditoria', '=', 'a.IdAuditoria')
            ->join('dbo.AU_Reg_usersLDAP as ul', 'ul.IdUserLDAP', '=', 'a.IdPersonalAudi')
            ->select('dbo.AU_Reg_PlanesInspeccion.IdPlanInspeccion', 'a.Codigo', 'dbo.AU_Reg_PlanesInspeccion.Fecha', 'dbo.AU_Reg_PlanesInspeccion.Observaciones')
            ->where('a.IdPersonalAudi ', '=', $idPersonal)
            ->orwhere('ul.name ', 'like', '%'.$name.'%')
            ->get();
	}
	// public function actividades(){
	// 	return $this->hasMany()
	// }


}
