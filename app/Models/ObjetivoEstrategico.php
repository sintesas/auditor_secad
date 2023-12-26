<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoEstrategico extends Model
{
    
	protected $table = 'AU_Mst_ObjetivosEstrategicos';

	protected $primarykey = 'IdObjetivoEstrategico';

	public $timestamps = false;

	public function objetivoEstrategico(){
		return $this->belongsTo(ObjetivoEstrategicoAspecto::class);
	}


}
