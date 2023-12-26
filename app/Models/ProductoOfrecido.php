<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoOfrecido extends Model
{
    
    protected $table = 'AU_Reg_ProductosOfrecidos';

    protected $primaryKey = 'IdProductosOfrecidos';

    public $timestamps = false;

    public function productoOfrecido(){
    	return $this->belongsTo(Empresa::class);
    }

    public function demandasPotenciales(){
    	return $this->hasMany(DemandaPotencial::class, 'IdEmpresa');
    }
    public function demandaproducto()
    {
    	return $this->belongsTo(DemandaPotencial::class,'IdDemandaPotencial','IdDemandaPotencial');
    }

}
