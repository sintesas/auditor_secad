<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduccionEmpresa extends Model
{
    protected $table = 'AU_Reg_ProduccionEmpresa';

    protected $primaryKey = 'IdProduccionEmpresa';

    public $timestamps = false;

    public function produccionEmpresa(){
    	return $this->belongsto(Empresa::class);
    }

    public $fillable = [
    	'ProductosProcesosPatentados',
    	'ActividadesInvestigacion',
    	'TransferenciaTecnologiaKnowHow',
    	'ConveniosInteruniversidadesInvestigacion',
    	'DetalleConveniosParticipacion',
    	'ParticipacionDesarrolloTecnolgico',
    	'IdEmpresa',
    	'Activo',
    ];
}
