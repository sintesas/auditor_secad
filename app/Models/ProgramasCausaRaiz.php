<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramasCausaRaiz extends Model
{
    protected $primaryKey = 'IdPrograma';

    protected $table = 'AU_Mst_ProgramasCausasRaiz';

    public $timestamps = false;
}
