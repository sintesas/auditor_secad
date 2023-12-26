<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class SeguimientoCausaRaiz extends Model
{
    protected $table = 'dbo.AU_Reg_Seguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdSeguimiento";
	}

	public static function getAll(){
		return \DB::select('EXEC AUFACSP_Inf_Seguimientos');
	}

	public static function getByUser($name = null){

        return \DB::select('EXEC AUFACSP_Inf_Seguimientos @NombreUser = \''.$name.'\'');
    }

    public static function getSeguimientosByActividad($idActividad){
        return \DB::select('EXEC AUFACSP_Inf_Seguimientos @IdTarea = \''.$idActividad.'\'');
    }

    public static function getByUserAll( $idAuditoria){
		return SeguimientoCausaRaiz::orderBy('IdSeguimiento', 'desc')
            ->leftJoin('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Seguimiento.IdAnotacion', '=', 'dbo.AU_Reg_Anotaciones.IdAnotacion')
            ->leftJoin('dbo.AU_Reg_CausasRaiz', 'dbo.AU_Reg_Seguimiento.IdCausaRaiz', '=', 'dbo.AU_Reg_CausasRaiz.IdCausaRaiz')
            ->leftJoin('dbo.AU_Mst_EstadoSeguimiento', 'dbo.AU_Reg_Seguimiento.IdEstadoSeguimiento', '=', 'dbo.AU_Mst_EstadoSeguimiento.IdEstadoSeguimiento')
            ->leftJoin('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdAuditoria', '=', 'dbo.AU_Reg_Anotaciones.IdAuditoria')
            ->select('dbo.AU_Reg_Seguimiento.IdSeguimiento',
                'dbo.AU_Reg_Anotaciones.NoAnota',
                'dbo.AU_Reg_CausasRaiz.CausaRaiz',
                'dbo.AU_Reg_Seguimiento.AccionSeguimiento',
                'dbo.AU_Reg_CausasRaiz.IdCausaRaiz',
                'dbo.AU_Reg_Seguimiento.Mensaje',
                'dbo.AU_Reg_Seguimiento.Porcentaje',
                'dbo.AU_Mst_EstadoSeguimiento.NombreEstado',
                'dbo.AU_Reg_Seguimiento.FechaSeguimiento',
                'dbo.AU_Reg_Seguimiento.Codigo')
            ->where('dbo.AU_Reg_Seguimiento.IdAuditoria', '=', $idAuditoria)
            ->get();
    }

    public static function getInfoSeguimiento($IdSeguimiento){
        return \DB::table('AU_Reg_Seguimiento as seguimiento ')
                    ->leftJoin('AU_Reg_Auditorias as auditoria', 'auditoria.IdAuditoria', '=', 'seguimiento.IdAuditoria')
                    ->leftJoin('AU_Reg_Anotaciones as anotacion', 'anotacion.IdAnotacion','=' ,'seguimiento.IdAnotacion')
                    ->leftJoin('AU_Reg_CausasRaiz as causa', 'causa.IdAnotacion', '=', 'anotacion.IdAnotacion')
                    ->leftJoin('AU_Reg_CausasRaizTareas as tareas', 'tareas.IdCausaRaiz', '=' ,'causa.IdCausaRaiz')
                    ->leftJoin('AU_Reg_CausasRaizTareas as tareasCantidad', 'tareas.IdCausaRaiz', '=', 'tareasCantidad.IdCausaRaiz')
                    ->where('seguimiento.IdSeguimiento', '=' ,DB::raw('\''.$IdSeguimiento.'\' and tareas.AccionTarea IS NOT NULL and tareasCantidad.CantidadEntregable IS NOT NULL'))
                    ->select('seguimiento.IdSeguimiento', 'auditoria.IdAuditoria' , 'seguimiento.Porcentaje','seguimiento.IdCausaRaiz',
                            'IdTareaCausa',
                            'auditoria.Codigo', 'seguimiento.AccionSeguimiento', 'seguimiento.FechaSeguimiento',
                            'anotacion.NoAnota', 'anotacion.DescripcionEvidencia as Hallazgo', 'causa.CausaRaiz', 'tareas.AccionTarea',
                            'tareasCantidad.CantidadEntregable',  'seguimiento.EstadoSeguimiento', 'seguimiento.Mensaje' ,'seguimiento.IdEstadoSeguimiento'
                            )
                    ->take(1)
                    ->get();
    }

    public static function aprobarSeguimiento($IdSeguimiento){
        return \DB::table('AU_Reg_Seguimiento')
                ->where('IdSeguimiento', $IdSeguimiento)
                ->update(['EstadoSeguimiento' => "Aprobado"]);
    }
}
