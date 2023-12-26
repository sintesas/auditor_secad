<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduccionTercerizacion extends Model
{
    protected $table = 'AU_Reg_ProduccionTercerizacion';

    protected $primaryKey = 'IdTercerizacion';

    public $timestamps = false;

    public function produccionTercerizacion(){
    	return $this->belongsTo(Empresa::class);
    }
}
