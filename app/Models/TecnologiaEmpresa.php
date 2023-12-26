<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TecnologiaEmpresa extends Model
{
    protected $table = 'AU_Reg_TecnologiaEmpresa';
    protected $primaryKey = 'IdTecnologiaEmpresa';

    public $timestamps = false;

    protected $fillable = [

    	'ProductosProcesosPatentados',
    	'ActividadesInvestigacion',
    	'TransferenciaTecnologiaKnowHow',
    	'ConveniosInteruniversidadesInvestigacion',
    	'DetalleConveniosParticipacion',
    	'ParticipacionDesarrolloTecnolgico',
    	'IdEmpresa',
    	'Activo',
    ];

    public function tecnologiaEmpresa(){
    	return $this->belongsTo(Empresa::class);
    }

    


}
