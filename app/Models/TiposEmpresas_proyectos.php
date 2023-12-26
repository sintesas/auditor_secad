<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposEmpresas_proyectos extends Model
{
    //Index
    protected $primaryKey = "IdTipoEmpresa";
    //Table
    protected $table = "AU_Mst_TipoEmpresa_CtrlProyecto";
    //No retorna Fecha
    public $timestamps = false;

    public static function Estado(){
      //Return Estado Activo
      return TiposEmpresas_proyectos::where('Estado','=','1')->get();
    }
}
