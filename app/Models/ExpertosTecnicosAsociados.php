<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertosTecnicosAsociados extends Model
{
    protected $primaryKey = 'Id';

    protected $table = 'dbo.AU_Reg_EquipoInspectorAsociados';

	public $timestamps = false;
}
