<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursosCargo extends Model
{
    protected $table = 'AU_Reg_CursosCargo';
    protected $primaryKey = 'IdCursoCargo';

    public $timestamps = false;

    public static function getCursos($IdCargo){
		return CursosCargo::where('dbo.AU_Reg_CursosCargo.IdCargo','=',$IdCargo)
		->join('dbo.AU_Reg_Cursos', 'dbo.AU_Reg_Cursos.IdCurso', '=', 'dbo.AU_Reg_CursosCargo.IdCurso')
		->select('dbo.AU_Reg_Cursos.NombreCurso',
				'dbo.AU_Reg_Cursos.IdCurso',
				'dbo.AU_Reg_CursosCargo.IdCursoCargo')
		->get();
	}
}
