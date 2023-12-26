<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnotacionesResponsables extends Model
{
    protected $primaryKey = 'IdResponsable';

    protected $table = 'AU_Reg_AnotacionesResponsables';

    public $timestamps = false;
}
