<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{


    protected $primaryKey = 'IdEnsayo';

    protected $table = 'AU_Mst_Ensayos';

    public $timestamps = false;
}
