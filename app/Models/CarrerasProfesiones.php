<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarrerasProfesiones extends Model
{
     protected $table = 'dbo.AU_Mst_CarrerasProfesiones';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCarreraProfesion";
	}

	public static function getProfecionesMilitares(){
		return CarrerasProfesiones::orderBy('CarreraProfesion')
			->select('IdCarreraProfesion as IdCarreraProfesionMil',
					 'CarreraProfesion')->get();
	}
}
