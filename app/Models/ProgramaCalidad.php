<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaCalidad extends Model
{
    protected $primaryKey = 'IdProgramaCalidad';

    protected $table = 'AU_Mst_ProgramasCalidad';

    public $timestamps = false;
}
