<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controlcontratostotal extends Model
{
     //busqueda tabla 
     protected $table = 'AUFACVW_ControlContratos_TOTAL';

    public $timestamps = false;

    public static function obtenerContratosAniototal($Vigencia){
        return VWcontratoanualsearch::where('AñoVigencia', '=', $Vigencia)->get();
    }
}
