<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcesoInterno extends Model
{
    protected $primaryKey = 'IdProcesoInterno';

    protected $table = 'AU_Mst_ProcesosInternos';

    public $timestamps = false;
}
