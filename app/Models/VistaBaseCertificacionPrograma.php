<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaBaseCertificacionPrograma extends Model
{
    protected $table = 'dbo.AUFACVW_BaseCertificacion_Programa';
	public $timestamps = false;

	public function getKeyName(){
    	return "IdBaseCertificacion";
	}

	 public function subpartes(){
    	return $this->hasMany(SubPartesBaseCertificacion::class, 'IdBaseCertificacion');
    }

    public static function getByPrograma($IdPrograma){
        return VistaBaseCertificacionPrograma::where('IdPrograma', $IdPrograma)->orWhere('validate', '=', 'false')->orderBy('IdBaseCertificacion', 'asc')->get();
    }
}
