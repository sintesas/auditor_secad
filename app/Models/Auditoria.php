<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Auditoria extends Model
{
    protected $table = 'AU_Reg_Auditorias';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdAuditoria";
	}

	public function planesInspeccion(){
		return $this->hasmany(PlanInspeccion::class, 'IdPlanInspeccion');
	}

	public static function validateCode($code)
	{
		return Auditoria::where('Codigo','=',$code)->get();
	}

	public function NoVisitas(){
       return $this->hasMany(NoVisitas::class, 'IdAuditoria');
    }

    public function anotaciones(){
    	return $this->hasMany(Anotacion::class, 'IdAuditoria');
    }

    public function empresas(){
    	return $this->hasMany(Empresa::class);
    }

    public static function getAuditor($IdAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
                ->select(\DB::raw('top 1 au.EstadoInsertOrganizacion, us.Name, CONCAT(gr.Abreviatura,\' | \' , pe.Nombres, pe.Apellidos) as Nombres'))
                ->leftjoin('AU_Reg_usersLDAP as us' , 'us.IdUserLDAP', '=', 'au.IdPersonalAudi')
                ->leftjoin('AU_Reg_Personal as pe' , 'pe.IdPersonal', '=', 'au.IdPersonalAudi')
                ->leftjoin('AU_Mst_Grado as gr' , 'gr.IdGrado', '=', 'pe.IdGrado')
                ->where('au.IdAuditoria', '=', $IdAuditoria)
                ->get();
    }

    public static function getByInspectorAndAuditor($IdPersonal){
        return Auditoria::where('IdPersonalInsp', '=', $IdPersonal)
                        ->orWhere('IdPersonalAudi', $IdPersonal)
                        ->orderby('Codigo', 'DESC')
                        ->get();
    }

    public static function getByUser(){

        $name = Auth::user()->name;
        $IdPersonal = Auth::user()->IdPersonal;

        return Auditoria::where('IdPersonalAudi ', '=', $IdPersonal)
            ->orwhere('u.name ', 'like', '%'.$name.'%')
            ->leftjoin('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
            ->leftjoin('dbo.AU_Reg_UsersLDAP as u', 'u.IdUserLDAP', '=', 'dbo.AU_Reg_Auditorias.IdPersonalAudi')
            ->select('IdAuditoria', 'dbo.AU_Reg_Empresas.NombreEmpresa', 'Codigo', 'SiglasNombreClave', 'NombreAuditoria')
            ->get();
    }

    public static function getByUserAuditorias($IdPersonal = null, $name = null){
        return \DB::table('AU_Reg_Auditorias as au')
        ->leftjoin('dbo.users as us', 'au.IdPersonalAudi', '=', 'us.IdPersonal')
        ->leftjoin('dbo.AU_Reg_UsersLDAP as u', 'u.IdUserLDAP', '=', DB::raw('au.IdPersonalAudi WHERE NOT EXISTS (SELECT NULL
                                    FROM AU_Reg_Anotaciones as an
                                    WHERE au.IdAuditoria = an.IdAuditoria)
                                    and [au].[IdPersonalAudi] = \''.$IdPersonal.'\'
                                    or [u].[name] like \'%'.$name.'%\''))
        ->select('au.IdAuditoria', 'au.NombreAuditoria', 'au.Codigo', 'au.EstadoInsertOrganizacion')
        ->get();
    }

    public static function getByUserPlanInspeccionFinal($IdPersonal, $name = null){
        return \DB::table('AU_Reg_Auditorias as a')
        ->select('a.IdAuditoria', 'a.NombreAuditoria', 'a.Codigo', 'em.NombreEmpresa')
        ->leftjoin('dbo.users as us', 'a.IdPersonalAudi', '=', 'us.IdPersonal')
        ->leftjoin('dbo.AU_Reg_UsersLDAP as u', 'u.IdUserLDAP', '=', 'a.IdPersonalAudi')
        ->leftjoin('dbo.AU_Reg_Empresas as em', 'a.IdEmpresa', '=', 'em.IdEmpresa')
        ->leftjoin('dbo.AU_Reg_PlanesInspeccion as pl', 'pl.IdAuditoria', '=', 'pl.IdAuditoria')
        ->where('u.name', 'like', '%'.$name.'%')
        ->orWhere('a.IdPersonalAudi', '=', $IdPersonal)
        ->groupby('a.IdAuditoria','a.NombreAuditoria', 'a.Codigo', 'em.NombreEmpresa')
        ->get();
    }

    /**
     * Informe Inspección ICFR03
     */
    public static function getAllTableInpeccionICFR03()
    {
        return \DB::table('AU_Reg_Auditorias as a')
        ->leftjoin('dbo.AU_Reg_Empresas as em', 'a.IdEmpresa', '=', 'em.IdEmpresa')
        ->get();
    }

    /**
     * Informe Seguimiento consolidado
     */
    public static function getAllTableSeguimientoConsolidado()
    {
        return \DB::table('AU_Reg_Auditorias as a')
        ->leftjoin('dbo.AU_Reg_Empresas as em', 'a.IdEmpresa', '=', 'em.IdEmpresa')
        ->get();
    }

    public static function getByEmpresa($idEmpresa)
    {
        return Auditoria::where('IdEmpresa ', '=', $idEmpresa)
                        ->get();
    }

    public static function getAuditoriasTabla(){
      /*  return Auditoria::join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
                        ->select('IdAuditoria', 'Codigo', 'SiglasNombreClave', 'NombreAuditoria')
                        ->get();*/
          return Auditoria::join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
                          ->leftjoin('dbo.AU_Reg_Empresas as emp2', 'emp2.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresaAudita')
                          ->select('IdAuditoria', 'Codigo', 'AU_Reg_Empresas.SiglasNombreClave as SiglasNombreClave', 'NombreAuditoria', 'emp2.NombreEmpresa as EmpresaAudita')
                          ->orderBy('NombreAuditoria', 'DESC')
                          ->orderBy('Codigo', 'DESC')
                          ->get();
    }

    public static function getEstadoAuditoriaUser($IdAuditoria){
        return Auditoria::select(\DB::raw('TOP 1 EstadoInsertOrganizacion'))
                        ->where('IdAuditoria', '=', $IdAuditoria)
                        ->get();
    }

    public static function getEquipoInspectorEmpresa($IdAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
                    ->select('eu.IdFuncionarioEmpresa', 'eu.Nombres')
                    ->leftjoin('AU_Reg_EquipoInspectorAsociados as eq', 'eq.IdAuditoria', '=', 'au.IdAuditoria')
                    ->leftjoin('AU_Reg_Empresas as em', 'em.IdEmpresa', '=', 'au.IdEmpresa')
                    ->leftjoin('AU_Reg_FuncionariosEmpresa as eu', 'eu.IdFuncionarioEmpresa', '=', 'eq.IdEquipoInspectorEmpresa')
                    ->where('au.IdAuditoria', '=', $IdAuditoria)
                    ->get();
    }

    public static function getEquipoInspectorLDAP($IdAuditoria){
        return \DB::table('AU_Reg_Auditorias as au')
                    ->select('ul.IdUserLDAP', 'ul.Name')
                    ->leftjoin('AU_Reg_EquipoInspectorAsociados as eq', 'eq.IdAuditoria', '=', 'au.IdAuditoria')
                    ->leftjoin('AU_Reg_usersLDAP as ul', 'ul.IdUserLDAP', '=', 'eq.IdEquipoInspectorWS')
                    ->leftjoin('AU_Reg_FuncionariosEmpresa as eu', 'eu.IdFuncionarioEmpresa', '=', 'eq.IdEquipoInspectorEmpresa')
                    ->where('au.IdAuditoria', '=', $IdAuditoria)
                    ->get();
    }
}
