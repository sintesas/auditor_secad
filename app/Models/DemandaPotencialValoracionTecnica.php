<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialValoracionTecnica extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialValoracionTecnica';

    protected $primaryKey = 'IdValoracionTecnica';

    public $timestamps = false;

    protected $fillable = [
    	'IdDemandaPotencial',
    	'TipoLista',
    	'AltaRotacion',
    	'BajoMTBF',
    	'AltosTiempos',
    	'DeficitExistencias',
    	'FabricanteOrinal',
    	'FlotaAntigua',
    	'Activo',
    ];
    
}
