<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposProyectos extends Model
{
    //Index
    protected $primaryKey = "IdTipoProyecto";
    //Table
    protected $table = "AU_Mst_TipoProyecto_CtrlProyecto";
    //No retorna Fecha
    public $timestamps = false;
    
    public static function Estado(){
      //Return Estado Activo
      return TiposProyectos::where('Estado','=','1')->get();
    }
}
