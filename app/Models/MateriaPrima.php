<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'AU_Reg_MateriasPrimas';

    protected $primaryKey = 'IdMateriaPrimaComponentes';

    public $timestamps = false;

    public function materiaPrima(){
    	return $this->belongsTo(Empresa::class);
    }

    public function materiaPrimaListado(){
    	return $this->hasOne(ListadoMateriasPrimas::class, 'IdMateriaPrima', 'IdMateriaPrima');
    }

    public function actividadEconomicaListado(){
        return $this->hasOne(ActividadesEconomicas::class, 'IdActividadEconomica', 'IdMateriaPrima');
    }

    public function clienteFfMmListado(){
    	return $this->hasOne(ClienteFfmm::class, 'IdMateriaPrimaComponentes');
    }
}
