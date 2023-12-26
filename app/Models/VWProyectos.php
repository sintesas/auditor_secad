<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VWProyectos extends Model
{
  protected $table = 'AUFACVW_ControlProyectos';

  //public $timestamps = false;

  /*Return Estados Activos
  **/
  public static function Estado(){
    //1 Activo
    return VWProyectos::where('Estado','=', '1')->get();
  }
  public static function Cantidad(){
    //1 Activo
    return VWProyectos::count();
  }
}
