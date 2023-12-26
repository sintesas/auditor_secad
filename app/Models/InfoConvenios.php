<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoConvenios extends Model
{
       //busqueda tabla 
       protected $primaryKey = 'IdConvenios';

       protected $table = 'AUCFACVW_Convenios';
   
       public $timestamps = false;
}
