<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Anotacion extends Model
{
    protected $primaryKey = 'IdAnotacion';

    protected $table = 'AU_Reg_Anotaciones';

    public $timestamps = false;


    public function auditorias(){
    	return $this->belongsTo(Auditoria::class,'IdAuditoria','IdAuditoria');
    }

    public function causasraiz(){
    	return $this->hasMany(CausaRaiz::class, 'IdAnotacion');
    }

    public function tiposanotacion(){
    	return $this->hasMany(TipoAnotacion::class);
    }

    public static function getAnotacionesAuditoria($IdAuditoria){
        return Anotacion::where('dbo.AU_Reg_Anotaciones.IdAuditoria','=', $IdAuditoria)
            ->select('dbo.AU_Reg_Anotaciones.IdAnotacion',
                     'dbo.AU_Reg_Anotaciones.NoAnota')
            ->get();
    }

    public static function getNextNotaAuditoria($IdAuditoria){
        return Auditoria::where('dbo.AU_Reg_Auditorias.IdAuditoria','=', $IdAuditoria)
                    ->leftJoin('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Anotaciones.IdAuditoria', '=', 'dbo.AU_Reg_Auditorias.IdAuditoria')
                    ->select('dbo.AU_Reg_Auditorias.Codigo',
                             DB::raw('count(IdAnotacion) as ContAnotaciones'))
                    ->groupBy('Codigo')
                    ->get();
    }

    public static function getActividadesInspeccion($IdAuditoria){
                return DB::table('AU_Reg_ActividadesPlanInspeccion as aci')
                ->leftJoin('AU_Reg_PlanesInspeccion as pl', 'pl.IdPlanInspeccion', '=', 'aci.IdPlanInspeccion')
                ->leftJoin('AU_Reg_Auditorias as au', 'au.IdAuditoria', '=', 'pl.IdAuditoria')
                ->leftJoin('AU_Reg_CriteriosAuditorias as cr', 'cr.IdCriterio', '=', 'aci.IdCriterio')
                ->select('aci.IdActividadPlanIns', 'aci.Actividades', 'cr.IdCriterio', 'cr.Norma')
                ->where('au.IdAuditoria ','=', $IdAuditoria)
                ->get();
    }

    public static function getAnotacionesByUser($IdPersonal, $name = null){

        /*return \DB::table('AU_Reg_Anotaciones as an')
            ->leftJoin('dbo.AU_Reg_Auditorias as au', 'au.IdAuditoria', '=', 'an.IdAuditoria')
            ->leftJoin('dbo.AU_Reg_usersLDAP as ul', 'ul.IdUserLDAP', '=', 'au.IdPersonalAudi')
            ->leftJoin('dbo.AU_Mst_TiposAnotacion as ta', 'an.IdTipoAnotacion', '=', 'ta.IdTipoAnotacion')
            ->leftjoin('AU_Mst_TiposAnotacion as tipo','tipo.IdTipoAnotacion','=', 'an.IdTipoAnotacion')
            ->leftjoin('AU_Reg_Auditorias as auditoria' , 'auditoria.IdAuditoria', '=' ,'an.IdAuditoria')
            ->where('au.IdPersonalAudi', '=', $IdPersonal)
            ->orwhere('ul.Name', 'like', '%'.$name.'%')
            ->get();*/

        $sql = "select anotacion.*, auditoria.*, userldp.*, tipoAnotacion.*
                from AU_Reg_AnotacionesResponsables as responsable
                left join AU_Reg_usersLDAP as userldp
                on userldp.IdUserLDAP = responsable.IdResponsableSeguimiento
                left join AU_Reg_usersLDAP as userldp_hallzago
                on userldp_hallzago.IdUserLDAP = responsable.IdResponsableHallazgo
                inner join AU_Reg_Anotaciones as anotacion
                on anotacion.IdAnotacion = responsable.IdAnotacion
                inner join AU_Reg_Auditorias as auditoria 
                on auditoria.IdAuditoria = anotacion.IdAuditoria
                left join AU_Reg_usersLDAP as userAuditoria
                on userAuditoria.IdUserLDAP = auditoria.IdPersonalAudi
                inner join AU_Mst_TiposAnotacion as tipoAnotacion
                on tipoAnotacion.IdTipoAnotacion = anotacion.IdTipoAnotacion
                where userldp.IdUserLDAP = '$IdPersonal'
                or userldp.Name like '$name'
                or userldp_hallzago.Name like '$name'";

        return \DB::select($sql);
    }
    public static function findCriterio($IdAnotacion){
        return \DB::table('AU_Reg_Anotaciones as anotacion')
            ->select(\DB::raw('criterio.Norma , criterio.Proceso, criterio.SubProceso'))
            ->where('IdAnotacion', '=', $IdAnotacion)
            ->leftjoin('AU_Reg_ActividadesPlanInspeccion as planInsp', 'planInsp.IdActividadPlanIns', '=', 'anotacion.IdActividadPlanInspeccion')
            ->leftjoin('AU_Reg_CriteriosAuditorias as criterio', 'criterio.IdCriterio', '=', 'planInsp.IdCriterio')
            ->get();
    }
    public static function getAllAnotaciones(){
        return Anotacion::leftjoin('AU_Mst_TiposAnotacion as tipo','tipo.IdTipoAnotacion','=', 'AU_Reg_Anotaciones.IdTipoAnotacion')
                            ->leftjoin('AU_Reg_Auditorias as auditoria' , 'auditoria.IdAuditoria', '=' ,'AU_Reg_Anotaciones.IdAuditoria')
                            ->get();
    }
}
