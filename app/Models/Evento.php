<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{	

	protected $table = 'AU_Reg_Eventos';

	protected $primaryKey = 'IdEvento';

	public $timestamps = false;

	public function participantesEvento(){
		return $this->hasMany(ParticipantesEvento::class, 'IdEvento');
	}

	
	
}
