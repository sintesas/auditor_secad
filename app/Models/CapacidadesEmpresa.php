<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;

class CapacidadesEmpresa extends Model
{

	// use LogsActivity;

	protected $table = 'AU_Reg_OfertaComercialEmpresa';

    protected $primaryKey = 'IdOfertaComercial';

    public $timestamps = false;

    public function capacidadesEmpresa(){
    	return $this->belongsTo(Empresa::class);
    }

    public function ofertasComerciales(){
    	return $this->hasOne(OfertaComercial::class, 'IdOfertaComercial');
    }
}
