<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// goes first
class AspectoEstrategico extends Model
{
    
	protected $table = 'AU_Reg_AspectosEstrategicosYOrganizaion';

	protected $primaryKey = 'IdAspectoEstrategiaOrganizacion';

	public $timestamps = false;


	public function aspectoEstrategico(){
		return $this->belongsTo(Empresa::class);
	}

	protected $fillable = [
		'SistemasPlaneacion',
		'HorasTiempoTrabajo',
		'IdEmpresa',
		'Activo',
	];


}
