<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DependenciasLDAP extends Model
{
    //busqueda tabla 
    protected $primaryKey = 'IdDependencia';

    protected $table = 'AU_Reg_DependenciasLDAP';

    protected $fillable = ['Nombre', 'Created_at', 'Update_at'];

    public $timestamps = false;
    
}
