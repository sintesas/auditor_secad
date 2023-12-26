<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursosPersonal extends Model
{
    protected $table = 'dbo.AU_Reg_CursosPersonal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCursoPersonal";
	}

	public static function CursosPersonal($IdPersonal)
	{
		return CursosPersonal::where('IdPersonal','=',$IdPersonal)
			->join('dbo.AU_Reg_Cursos', 'dbo.AU_Reg_Cursos.IdCurso', '=', 'dbo.AU_Reg_CursosPersonal.IdCurso')
			->select("dbo.AU_Reg_CursosPersonal.IdCursoPersonal",
					 "dbo.AU_Reg_Cursos.NombreCurso",
					 "dbo.AU_Reg_CursosPersonal.IdPersonal")
			->get();
	}
}
