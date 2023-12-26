<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    //busqueda tabla 
    protected $primaryKey = 'IdTipoConvenio';

    protected $table = 'AU_Mst_TipoConvenio';

    public $timestamps = false;
}
