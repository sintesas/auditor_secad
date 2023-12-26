<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class VWInformeInspeccionFinal extends Model
{
    protected $table = 'dbo.AUFACVW_InformeFinalInspeccion';

    public $timestamps = false;


    public static function getDataAuditoria($idAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
            ->select('au.IdAuditoria','au.FechaInicio ', 'au.NombreAuditoria',  'pr.Name as NombresResponsable', 'au.CargoRespo',
            'fe.Nombres as AuditorLiderEmpresa', 'ul.Name as AuditorLiderWS', 'au.Objeto','au.Alcance', 'ta.TipoAuditoria',
            'ula.Name as InspectorLiderWS', 'fl.Nombres as InspectorLiderEmpresa','au.ExpertosTecnicos', 'au.Observaciones', 'au.FechaInicio', 'au.HoraIni',
            'au.FechaTermino', 'au.HoraTermi')
            ->leftJoin('AU_Reg_usersLDAP as pr',  'au.IdFuncionarioEmpresa', '=' , 'pr.IdUserLDAP')
            ->leftjoin('AU_Reg_FuncionariosEmpresa as fe' , 'au.IdPersonalAudi' ,'=', DB::raw('fe.IdFuncionarioEmpresa AND au.EstadoInsertOrganizacion = \'usuarioEmpresa\' ' ))
            ->leftjoin('AU_Reg_usersLDAP as ul', 'au.IdPersonalAudi' ,'=', DB::raw('ul.IdUserLDAP AND au.EstadoInsertOrganizacion = \'usuarioWS\' ' ))
            ->leftjoin('AU_Reg_usersLDAP as ula' ,'ula.IdUserLDAP', '=', DB::raw('au.IdPersonalInsp AND au.EstadoInsertOrganizacion = \'usuarioWS\' ' ))
            ->leftjoin('AU_Reg_FuncionariosEmpresa as fl' ,'au.IdPersonalInsp', '=', DB::raw('fl.IdFuncionarioEmpresa AND au.EstadoInsertOrganizacion = \'usuarioEmpresa\' ' ))
            ->leftjoin('AU_Mst_TiposAuditoria as ta', 'ta.IdTipoAuditoria' ,'=', 'au.IdTipoAuditoria')
            ->where('au.IdAuditoria' ,'=', $idAuditoria)
            ->get();
    }

    public static function getDataCriterios($idAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
            ->select('ca.Norma')
            ->leftJoin('AU_Reg_CriteriosAsociados as cs', 'cs.IdAuditoria', '=', 'au.IdAuditoria')
            ->leftjoin('AU_Reg_CriteriosAuditorias as ca', 'ca.IdCriterio', '=', 'cs.IdCriterio')
            ->where('au.IdAuditoria' ,'=', $idAuditoria)
            ->get();
    }

    public static function getDataEquipoInspector($idAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
            ->select('ul.Name as EquipoInspWS', 'ef.Nombres as EquipoInspEmpresa')
            ->leftJoin('AU_Reg_EquipoInspectorAsociados as ei',  'ei.IdAuditoria', '=','au.IdAuditoria')
            ->leftjoin('AU_Reg_usersLDAP as ul' , 'ul.IdUserLDAP' ,'=', DB::raw('ei.IdEquipoInspectorWS and au.EstadoInsertOrganizacion =  \'usuarioWS\' ' ))
            ->leftjoin('AU_Reg_Empresas as em', 'em.IdEmpresa' ,'=', DB::raw('au.IdEmpresa and au.EstadoInsertOrganizacion = \'usuarioEmpresa\' ' ))
            ->leftjoin('AU_Reg_FuncionariosEmpresa as ef' ,'ef.IdFuncionarioEmpresa', '=', 'ei.IdEquipoInspectorEmpresa')
            ->where('au.IdAuditoria' ,'=', $idAuditoria)
            ->get();
    }

    public static function getDataActividades($idAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
            ->select('ap.Actividades as Dependencia', 'ul.Name as Inspeccionado', 'uli.Name as InspectorWs', 'fe.Nombres as InspectorEmpresa',
                    'ap.FechaInicio', 'ap.HoraInicio', 'ap.FechaCierre','ap.HoraFinal')
            ->leftJoin('AU_Reg_PlanesInspeccion as p',  'p.IdAuditoria', '=' , 'au.IdAuditoria')
            ->leftjoin('AU_Reg_ActividadesPlanInspeccion as ap' , 'ap.IdPlanInspeccion' ,'=','p.IdPlanInspeccion')
            ->leftjoin('AU_Reg_usersLDAP as ul' , 'ul.IdUserLDAP' ,'=', 'ap.IdPersonalInsp')
            ->leftjoin('AU_Reg_usersLDAP as uli', 'uli.IdUserLDAP' ,'=',DB::raw('ap.IdPersonalInspector AND au.EstadoInsertOrganizacion = \'usuarioWS\' ' ))
            ->leftjoin('AU_Reg_FuncionariosEmpresa as fe' ,'fe.IdFuncionarioEmpresa', '=',DB::raw('ap.IdPersonalInspector and au.EstadoInsertOrganizacion  = \'usuarioEmpresa\' ' ))
            ->where('au.IdAuditoria' ,'=', $idAuditoria)
            ->get();
    }
}
