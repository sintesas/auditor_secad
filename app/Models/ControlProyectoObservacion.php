<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlProyectoObservacion extends Model
{
  protected $primaryKey = 'IdObservacion';

  protected $table = 'AU_Reg_ControlProyectos_Observaciones';

  public $timestamps = false;

  public static function DataWhereProyectoId($idControlProyecto){
    return ControlProyectoObservacion::where('IdControlProyecto','=',$idControlProyecto)->get();
  }
}
