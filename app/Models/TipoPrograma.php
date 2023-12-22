<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model
{
    use HasFactory;

    protected $table = 'dbo.AU_Mst_TiposPrograma';

	public $timestamps = false;

	public function getKeyName() {
    	return "IdTipoPrograma";
	}
}
