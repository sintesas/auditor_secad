<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialOfertaAeronautica extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialOfertaAeronautica';

    protected $primaryKey = 'IdOfertaAeronautica';

    public $timestamps = false;

    protected $fillable = [

    	'IdDemandaPotencial',
    	'IdCluster',
    	'IdEmpresa',
    	'ValorUnitario',
    	'TiempoEntrega',
    	'Cantidad',
    	'ValorTotal',
    	'Anio',
    	'Observaciones',
    	'Activo',

    ];


    public function empresa(){
        return $this->hasOne('App\Empresa', 'IdOfertaAeronautica');
    }

}
