<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mercado extends Model
{
    protected $table = 'AU_Reg_Mercado';

    protected $primarykey = 'IdMercado';

    public $timestamps = false;

    public function mercado(){
    	return $this->belongsTo(Empresa::class);
    }

    public function sectorMercado(){
    	return $this->hasOne(SectorMercado::class, 'IdSector', 'IdSector');
    }

    public function categoria(){
    	return $this->hasOne(CategoriaTipo::class, 'IdCategorias', 'IdCategorias');
    }

    public function subcategoria(){
    	return $this->hasOne(SubcategoriaTipo::class, 'IdSubcategoria', 'IdSubcategoria');
    }
}
