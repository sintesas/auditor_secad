<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TecnologiaSuCliente extends Model
{
	protected $table = 'AU_Reg_TecnologiaSuCliente';
    protected $primaryKey = 'IdSuCliente';

    public $timestamps = false;
}
