<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeInspeccion extends Model
{
    protected $table = 'dbo.AU_Reg_InformeInspeccion';

	

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCrearInforme";
	}

	public static function getInformes(){
		return InformeInspeccion::orderBy('dbo.AU_Reg_InformeInspeccion.IdCrearInforme', 'desc')
        ->join('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdAuditoria', '=', 'dbo.AU_Reg_InformeInspeccion.IdAuditoria')
        ->join('dbo.AU_Mst_TipoInforme', 'dbo.AU_Mst_TipoInforme.IdTipoInforme', '=', 'dbo.AU_Reg_InformeInspeccion.IdTipoInforme')
        ->select(  'dbo.AU_Reg_InformeInspeccion.IdCrearInforme',
                   'dbo.AU_Reg_Auditorias.Codigo',
                   'dbo.AU_Reg_Auditorias.FechaInicio',
               		'dbo.AU_Mst_TipoInforme.NombreTipo')
        ->get();
	}

  public static function getInformesByUser($IdPersonal){
    return InformeInspeccion::orderBy('dbo.AU_Reg_InformeInspeccion.IdCrearInforme', 'desc')
        ->join('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdAuditoria', '=', 'dbo.AU_Reg_InformeInspeccion.IdAuditoria')
        ->join('dbo.AU_Mst_TipoInforme', 'dbo.AU_Mst_TipoInforme.IdTipoInforme', '=', 'dbo.AU_Reg_InformeInspeccion.IdTipoInforme')
        ->select(  'dbo.AU_Reg_InformeInspeccion.IdCrearInforme',
                   'dbo.AU_Reg_Auditorias.Codigo',
                   'dbo.AU_Reg_Auditorias.FechaInicio',
                  'dbo.AU_Mst_TipoInforme.NombreTipo')
        ->where('IdPersonalAudi ', '=', $IdPersonal)
        ->get();
  }
}
