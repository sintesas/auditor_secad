<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadMedidaCPA extends Model
{
       //busqueda tabla 
       protected $primaryKey = 'IdUnidadMedida';

       protected $table = 'AU_Mst_UnidadMedidaPCA';
   
       public $timestamps = false;
}
