<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadesEconomicas extends Model
{
    protected $table = 'AU_Mst_ActividadesEconomicas';

    protected $primaryKey = 'IdActividadEconomica';

    public $timestamps = false;

    public function actividadEconomica(){
        return $this->belongsTo(ActividadesEconomicas::class);
    }

    public function actividadEconomicaListado(){
        return $this->hasOne(ListadoActividadesEconomicas::class, 'IdActividadEconomica', 'IdActividadEconomica');
    }

}