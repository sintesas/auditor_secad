<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstados_Proyectos extends Model
{
  //Index
  protected $primaryKey = "IdEstadoProyecto";
  //Table
  protected $table = "AU_Mst_TipoEstadoProyecto_CtrlProyecto";
  //No retorna Fecha
  public $timestamps = false;

  public static function Estado(){
    //Return Estado Activo
    return TipoEstados_Proyectos::where('Estado','=','1')->get();
  }
}
