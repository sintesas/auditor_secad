<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListadoMateriasPrimas extends Model
{
    protected $table = 'AU_Mst_ListadoMateriasPrimas';

    protected $primaryKey = 'IdMateriaPrima';

    public $timestamps = false;


    public function materiaPrima(){
    	return $this->belongsTo(MateriaPrima::class);
    }

}
