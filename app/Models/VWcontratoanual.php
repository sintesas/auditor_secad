<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VWcontratoanual extends Model
{
    //AUFACVW_ContratoAnual
    //busqueda tabla 
    protected $primaryKey = 'IdPCA';

    protected $table = 'AUFACVW_ContratoAnual';

    public $timestamps = false;
}
