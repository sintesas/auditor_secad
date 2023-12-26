<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramasBancos extends Model
{
    protected $primaryKey = 'IdProgramasBancos';

    protected $table = 'AU_Reg_ProgramasBancos';

    public $timestamps = false;
}
