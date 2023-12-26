<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoSector extends Model
{
	protected $table = 'AU_Reg_ProductosSector';
    protected $primaryKey = 'IdProductosSector';

    public $timestamps = false;

    public function sectorMercado(){
        return $this->hasOne(SectorMercado::class, 'IdSector', 'IdSector');
    }
}
