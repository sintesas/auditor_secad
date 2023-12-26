<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TamanoEmpresa extends Model
{
    protected $table = 'AU_Mst_TamañoEmpresa';

    protected $primaryKey = 'IdTamanoEmpresa';

    public $timestamps = false;
}
