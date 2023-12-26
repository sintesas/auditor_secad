<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaComercial extends Model
{
    protected $table = 'AU_Reg_OfertasSectorAeronautico';

    protected $primaryKey = 'IdOfertaComercial';

    public $timestamps = false;

    public function capacidad(){
    	return $this->belongsTo(CapacidadesEmpresa::class, 'IdOfertaComercial');
    }
}
