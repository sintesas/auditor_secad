<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaEmpresa extends Model
{
    protected $table = 'AU_Reg_CaracteristicaEmpresa';

    protected $primaryKey = 'IdCaracteristicaEmpresa';

    public $timestamps = false;

    protected $fillable = ['IdEmpresa',
        'CantidadFuncionarios',
        'Areaconstruida',
        'AreaTerreno',
        'ActividadEconomica',
        'CapitalMonedaNacional',
        'CapitalMonedaExtranjera',
        'IdTamanoEmpresa',
        'IdCriterioFinanciero',
        'EmpleadosPrimaria',
        'EmpleadosSecundaria',
        'EmpleadosTecnica',
        'EmpleadosSuperior',
        'EmpleadosPostgrado',
        'EmpleadosMagister',
        'EmpleadosDoctorado',
        'Activo'
    ];

	public function caracteristicaEmpresa(){
		return $this->belongsTo(Empresa::class);
	}



}
