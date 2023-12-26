<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CausasRaizTareas extends Model
{
    protected $table = 'AU_Reg_CausasRaizTareas';

	protected $primaryKey = 'IdTarea';

	protected $fillable = ['IdCausaRaiz','AccionTarea','FechaInicio','FechaFinal', 'IdResponsable','Entregable','CantidadEntregable'];

	public $timestamps = false;

	public static function getTareasCausasRaiz($IdCausaRaiz){
		return \DB::table('AU_Reg_CausasRaizTareas as ta')
					->select('ta.IdTarea', 'ta.AccionTarea')
					->leftjoin('AU_Reg_CausasRaiz as ca', 'ca.IdCausaRaiz', '=' , 'ta.IdCausaRaiz')
					->where('ta.IdCausaRaiz', '=', DB::raw($IdCausaRaiz . 'and ta.AccionTarea is not null'))
					->get();
	}

	/**
	 * Todas las actividades
	 */
	public static function getAllActividades(){
		return \DB::select('EXEC AUFACSP_Actividades_CausasRaiz @user = \''.''.'\'');
	}
	/**
	 * Listar actividades del usuario
	 */
	public static function getActividadesByUser(){
		$name = Auth::user()->name;
    

		return \DB::select('EXEC AUFACSP_Actividades_CausasRaiz @user = \''.$name.'\'');
	}
	/**
	 * Listar actividad
	 */
	public static function getActividad($idActividad){

		return \DB::select('EXEC AUFACSP_Actividades_CausasRaiz @user = \''.''.'\' , @tarea = '.$idActividad.'');
	}
}
