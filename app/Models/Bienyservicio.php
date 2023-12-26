<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bienyservicio extends Model
{
    //tabla
    protected $table = 'AU_Reg_SYB';

	protected $primaryKey = 'Id_SB';

	public $timestamps = false;
}
