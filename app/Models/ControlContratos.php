<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlContratos extends Model
{
    //busqueda tabla 
    protected $primaryKey = 'IdPCA';

    protected $table = 'AU_Reg_ControlContratos';

    public $timestamps = false;
}
