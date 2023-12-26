<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'AU_Mst_TiposEvento';
    protected $primaryKey = 'IdTipoEvento';

    public $timestamps = false;
    
}
