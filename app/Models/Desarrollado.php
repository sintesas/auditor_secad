<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desarrollado extends Model
{
	protected $table = 'AU_Reg_Desarrollado';
    protected $primaryKey = 'IdDesarrollado';

    public $timestamps = false;

    public function agente(){
    	return $this->hasOne(AgenteDesarrollador::class, 'IdAgente', 'IdAgente');
    }

    public function sector(){
    	return $this->hasOne(SectorMercado::class, 'IdSector', 'IdSector');
    }


}
