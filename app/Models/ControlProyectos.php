<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlProyectos extends Model
{
    protected $primaryKey = 'IdControlProyecto';

    protected $table = 'AU_Reg_ControlProyectos';

    public $timestamps = false;
}
