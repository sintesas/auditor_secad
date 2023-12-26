<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $primaryKey = 'IdCiudades';

    protected $table = 'AU_Reg_Ciudades';

    public $timestamps = false;
}
