<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $primaryKey = 'IdConvenios';

    protected $table = 'AU_Reg_Convenios';

    public $timestamps = false;
}
