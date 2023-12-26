<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'AU_Reg_Cursos';
    protected $primaryKey = 'IdCurso';

    public $timestamps = false;
}
