<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFfmm extends Model
{
    protected $table = 'AU_Reg_ProductosFFMM';

    protected $primaryKey = 'IdProductosFM';

    public $timestamps = false;

    public $fillable = ['ProductoItem', 'IdVentas', 'IdClienteFM' , 'Activo', 'IdEmpresa'];


    public function productoFfmm(){
    	return $this->belongsTo(Empresa::class);
    }

    public function clienteFfmmListado(){
    	return $this->hasOne(ClienteFfmm::class, 'IdClienteFM', 'IdClienteFM');
    }

}
