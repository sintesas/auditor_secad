<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAnotacion extends Model
{
    protected $primaryKey = 'IdTipoAnotacion';

    protected $table = 'AU_Mst_TiposAnotacion';

    public $timestamps = false;
}

