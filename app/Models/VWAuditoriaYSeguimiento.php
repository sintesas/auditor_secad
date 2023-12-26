<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VWAuditoriaYSeguimiento extends Model
{
    protected $table = 'dbo.AUFACVW_AuditoriaYSeguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdAuditoria";
	}
}
