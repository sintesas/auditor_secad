<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoPrograma extends Model
{
    protected $table = 'AU_Mst_EstadosPrograma';

    protected $primaryKey = 'IdEstadoPrograma';

    public $timestamps = false;
}
