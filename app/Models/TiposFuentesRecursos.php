<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposFuentesRecursos extends Model
{
    //Primary Key DB
    protected $primaryKey = "IdFuenteRecurso";
    //Tabla seleccionada
    protected $table = "AU_Mst_TipoFuentesRecursos_CtrlProyecto";
    //No retorna Fecha
    public $timestamps = false;

    public static function Estado(){
      //Return Estado Activo
      return TiposFuentesRecursos::where('Estado','=','1')->get();
    }
}
