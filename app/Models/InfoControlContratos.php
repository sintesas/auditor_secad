<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoControlContratos extends Model
{
    //busqueda tabla 
    protected $primaryKey = 'IdPCA';

    protected $table = 'AUFACVW_ControlContratos';

    public $timestamps = false;
}
