<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// THIS GOES FIRST
class ObjetivoEstrategicoAspecto extends Model
{
    protected $table = 'AU_Reg_ObjetivosEstrategicosAspectos';

	protected $primarykey = 'IdObjetivoEstrategicoEmp';

	public $timestamps = false;

	public function aspectoEstrategico(){
		return $this->belongsTo(Empresa::class);
	}

	public function objetivosEstrategicos(){
		return $this->hasOne(ObjetivoEstrategico::class, 'IdObjetivoEstrategico', 'IdObjetivoEstrategico');
	}

}


