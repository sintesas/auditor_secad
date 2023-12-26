<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'dbo.AU_Reg_Personal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdPersonal";
	}

	public static function getPersonalWithRango(){
		 return Personal::orderBy('Nombres', 'asc')
        ->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
        ->select(  	"dbo.AU_Reg_Personal.IdPersonal",
                   	\DB::raw("CONCAT ( dbo.AU_Mst_Grado.Abreviatura, ' | ',dbo.AU_Reg_Personal.Nombres, ' ',dbo.AU_Reg_Personal.Apellidos) as Nombres"))->get();
	}

	public static function getlistPersonalWithRango(){
		 return Personal::orderBy('Nombres', 'asc')
        ->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
        ->select(  	"dbo.AU_Reg_Personal.IdPersonal",
        			"dbo.AU_Mst_Grado.Abreviatura",
                   	"dbo.AU_Reg_Personal.Nombres", 
                   	"dbo.AU_Reg_Personal.Apellidos",
                    "Cedula")->get();
	}

  public static function getlistPersonalWithRangoAndEmail(){
     return Personal::orderBy('Nombres', 'asc')
        ->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
        ->select("dbo.AU_Reg_Personal.IdPersonal",
              "dbo.AU_Mst_Grado.Abreviatura",
                    "dbo.AU_Reg_Personal.Nombres", 
                    "dbo.AU_Reg_Personal.Apellidos",
                    "dbo.AU_REG_Personal.Email",
                    "Cedula")->get();
  }

}
