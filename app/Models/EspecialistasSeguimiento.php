<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class EspecialistasSeguimiento extends Model
{
    protected $table = 'dbo.AU_Reg_EspecialistasSeguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEspecialistaSeguimiento";
	}

	public static function getEspecialistasBySeguimiento($IdListaSeguimiento){
		return EspecialistasSeguimiento::where('IdListaSeguimiento','=', $IdListaSeguimiento)
				->join('dbo.AU_Reg_Personal', 'dbo.AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_EspecialistasSeguimiento.IdPersonal')
				->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
				->select(  	"dbo.AU_Reg_EspecialistasSeguimiento.IdEspecialistaSeguimiento",
        \DB::raw("CONCAT ( dbo.AU_Mst_Grado.Abreviatura, ' | ',dbo.AU_Reg_Personal.Nombres, ' ',dbo.AU_Reg_Personal.Apellidos) as Nombres"),
                   		'IdListaSeguimiento',
                   		'Horas',
                   		'Fecha')
				->get();

	}
  public static function getEspecialistasAll(){
        $especialistas = EspecialistasSeguimiento::select(//"dbo.AU_Reg_EspecialistasSeguimiento.IdEspecialistaSeguimiento",
          \DB::raw("CONCAT ( dbo.AU_Mst_Grado.Abreviatura, ' | ',dbo.AU_Reg_Personal.Nombres, ' ',dbo.AU_Reg_Personal.Apellidos) as Nombres"),
                      //'AU_Reg_EspecialistasSeguimiento.IdListaSeguimiento',
                      'AU_Reg_EspecialistasSeguimiento.Horas',
                      'AU_Reg_EspecialistasSeguimiento.Fecha',
                      'AU_Mst_Actividades_TipoPrograma.Actividad',
                      'AU_Reg_Programas.Consecutivo',
                      'AU_Reg_Programas.Proyecto',
                      'AU_Mst_TiposPrograma.Tipo',
                      'AU_Mst_EstadosPrograma.Descripcion as Estado_Programa'
                      )
                      ->join('AU_Reg_ListasSeguimiento', 'AU_Reg_ListasSeguimiento.IdListaSeguimiento', '=', 'AU_Reg_EspecialistasSeguimiento.IdListaSeguimiento')
                      ->join('AU_Mst_Actividades_TipoPrograma', 'AU_Mst_Actividades_TipoPrograma.IdActividad', '=','AU_Reg_ListasSeguimiento.IdActividad')
                      ->join('AU_Reg_Programas', 'AU_Reg_Programas.IdPrograma', '=','AU_Reg_ListasSeguimiento.IdPrograma')
                      ->join('AU_Mst_TiposPrograma', 'AU_Mst_TiposPrograma.IdTipoPrograma', '=','AU_Reg_ListasSeguimiento.IdTipoPrograma')
                      ->join('dbo.AU_Reg_Personal', 'dbo.AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_EspecialistasSeguimiento.IdPersonal')
                      ->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
                      ->leftjoin('AU_Mst_EstadosPrograma', 'AU_Mst_EstadosPrograma.idEstadoPrograma','=','AU_Reg_Programas.IdEstadoPrograma')
        ->get();

        return $especialistas;
  }
}
