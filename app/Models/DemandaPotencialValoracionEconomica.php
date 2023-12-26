<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialValoracionEconomica extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialValoracionEconomica';

    protected $primaryKey = 'IdValoracionEconomica';

    public $timestamps = false;

	protected $fillable = [
		'IdDemandaPotencial',
		'UltimoPrecio',
		'ValorHistorico',
		'ValorUnitario',
		'CantidadPrioridad',
		'ValorTotal',
		'AnioProximaEntrega',
		'ContratarCompra',
		'TipoMonedaUltimoPrecio',
		'TipoMonedaValorHistorico',
		'TipoMonedaValorUnitario',
		'TipoMonedaValorTotal',
		'Activo',
		'AnioVUC',
		'AnioVH',
	];


	


}



