<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class ActividadesInspeccion extends Model
{
    protected $table = 'dbo.AU_Reg_ActividadesPlanInspeccion';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdActividadPlanIns";
	}

	public static function getActividadesPlan($IdPlanInspeccion){
		return \DB::table('dbo.AU_Reg_ActividadesPlanInspeccion as ac')
				->where('ac.IdPlanInspeccion','=',$IdPlanInspeccion)
				->leftjoin('AU_Reg_CriteriosAuditorias as cr','cr.IdCriterio', 'ac.IdCriterio')
				->leftjoin('AU_Reg_usersLDAP as ul','ac.IdPersonalInsp', 'ul.IdUserLDAP')
				->select('ac.IdActividadPlanIns','ac.Actividades','cr.Norma', 'ul.Name' ,'ac.FechaInicio', 'ac.HoraInicio', 'ac.FechaCierre', 'ac.HoraFinal')
				->orderby('ac.Actividades')
				->get();
	}

	public static function getExpertosTecnicosWS($IdPlanInspeccion){
		return \DB::table('dbo.AU_Reg_PlanesInspeccion as p')
				->where('p.IdPlanInspeccion','=',$IdPlanInspeccion)
				->leftjoin('AU_Reg_Auditorias as a','a.IdAuditoria', 'p.IdAuditoria')
				->leftjoin('AU_Reg_EquipoInspectorAsociados as ei','ei.IdAuditoria', 'a.IdAuditoria')
				->leftjoin('AU_Reg_usersLDAP as ul','ul.IdUserLDAP', 'ei.IdEquipoInspectorWS')
				->orderby('ul.Name')
				->get();
	}
	public static function getExpertosTecnicosEmpresa($IdPlanInspeccion){
		return \DB::table('dbo.AU_Reg_PlanesInspeccion as p')
				->where('p.IdPlanInspeccion','=',$IdPlanInspeccion)
				->leftjoin('AU_Reg_Auditorias as a','a.IdAuditoria', 'p.IdAuditoria')
				->leftjoin('AU_Reg_EquipoInspectorAsociados as ei','ei.IdAuditoria', 'a.IdAuditoria')
				->leftjoin('AU_Reg_FuncionariosEmpresa as ul','ul.IdFuncionarioEmpresa', 'ei.IdEquipoInspectorEmpresa')
				->select('ul.IdFuncionarioEmpresa', 'ul.Nombres')
				->orderby('ul.Nombres')
				->get();
	}

	public static function getEstadoUsuarioAuditoria($IdPlanInspeccion){
		return \DB::table('dbo.AU_Reg_PlanesInspeccion as p')
				->where('p.IdPlanInspeccion','=',$IdPlanInspeccion)
				->leftjoin('AU_Reg_Auditorias as a','a.IdAuditoria', 'p.IdAuditoria')
				->select('a.EstadoInsertOrganizacion', 'p.Observaciones')
				->get();
	}

	public static function getIdPlanInspeccion($IdActividadPlanIns){
		return ActividadesInspeccion::where('IdActividadPlanIns', '=', $IdActividadPlanIns)
				->select('IdPlanInspeccion')
				->get();
	}

	public static function getCriterioActividad($IdActividadPlanIns){
		return ActividadesInspeccion::select('criterio.Norma', 'criterio.Proceso','criterio.SubProceso')
				->join('AU_Reg_CriteriosAuditorias as criterio','criterio.IdCriterio', 'AU_Reg_ActividadesPlanInspeccion.IdCriterio')
				->where('AU_Reg_ActividadesPlanInspeccion.IdActividadPlanIns','=', $IdActividadPlanIns)
				->get();
	}
}
