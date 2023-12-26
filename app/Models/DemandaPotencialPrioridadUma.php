<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialPrioridadUma extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialPrioridadUMA';

    protected $primaryKey = 'IdPrioridadUMA';

    public $timestamps = false;

    protected $fillable = [
    	'IdDemandaPotencial',
    	'Prioridad',
    	'Activo',
    ];
}
