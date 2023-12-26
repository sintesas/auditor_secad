<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FalenciasCausaRaiz extends Model
{
    protected $primaryKey = 'IdFalencia';

    protected $table = 'AU_Mst_FalenciasCausasRaiz';

    public $timestamps = false;
}
