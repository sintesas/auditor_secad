<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramaEnsayo extends Model
{
    protected $table = 'AU_Reg_ProgramasEnsayos';

	protected $primaryKey = 'IdProgramasEnsayos';

	public $timestamps = false;

	public function ensayoListado(){
		return $this->hasOne(Ensayo::class, 'IdEnsayo', 'IdEnsayo');
	}

	public function tipoEnsayoListado(){
		return $this->hasOne(TipoEnsayo::class, 'IdTipoEnsayo', 'IdTipoEnsayo');
	}

}
