<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseCertificacion extends Model
{
    use HasFactory;

    protected $table = 'dbo.AU_Mst_BaseCertificacion';

	public $timestamps = false;

	public function getKeyName() {
    	return "IdBaseCertificacion";
	}

	// public function subpartes() {
    // 	return $this->hasMany(SubPartesBaseCertificacion::class, 'IdBaseCertificacion');
    // }
}
