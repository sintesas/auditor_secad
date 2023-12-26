<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEnsayo extends Model
{
    

    protected $primaryKey = 'IdTipoEnsayo';

    protected $table = 'AU_Mst_TipoEnsayo';

    public $timestamps = false;
}
