<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
     //busqueda tabla 
     protected $primaryKey = 'Id_Municipio';

     protected $table = 'AU_Reg_Municipio';
 
     public $timestamps = false;
}
