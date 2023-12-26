<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnotacionesFiles extends Model
{
    protected $primaryKey = 'IdFile';

    protected $table = 'AU_Reg_AnotacionesFiles';

    public $timestamps = false;
}
