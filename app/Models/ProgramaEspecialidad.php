<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaEspecialidad extends Model
{
    protected $table = 'AU_Reg_ProgramasEspecialidades';

	protected $primaryKey = 'IdEspecialidadPrograma';

	public $timestamps = false;

	public function especialidadlistado(){
		return $this->hasOne(EspecialidadCertificacion::class, 'IdEspecialidadCertificacion', 'IdEspecialidadCertificacion');
	}

	public function personalListado(){
		return $this->hasOne(Personal::class, 'IdPersonal', 'IdPersonal');
	}

}
