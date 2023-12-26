<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAuditoria extends Model
{
	
    protected $table = 'dbo.AU_Mst_TiposAuditoria';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdTipoAuditoria";
	}
}
