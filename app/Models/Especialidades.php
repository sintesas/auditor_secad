<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table = 'dbo.AU_Mst_EspecialidadesPersonal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEspecialidad";
	}

	public static function GetEspecialidades(){
		return Especialidades::orderBy('dbo.AU_Mst_EspecialidadesPersonal.IdEspecialidad', 'desc')
    				->join(		'dbo.AU_Mst_Cuerpo', 'dbo.AU_Mst_Cuerpo.IdCuerpo', '=', 'dbo.AU_Mst_EspecialidadesPersonal.IdCuerpo')
    				->select(	'dbo.AU_Mst_EspecialidadesPersonal.IdEspecialidad', 
    							'dbo.AU_Mst_Cuerpo.NombreCuerpo',
    							'dbo.AU_Mst_EspecialidadesPersonal.NombreEspecialidad')
    				->get();
	}
}
