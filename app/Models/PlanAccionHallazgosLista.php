<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAccionHallazgosLista extends Model
{
    protected $primaryKey = 'id_planaccionhallazgoslista';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanAccionHallazgosLista';

    public $timestamps = false;

    public static function getHallazgos($id_planaccionhallazgos) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAccionHallazgosLista')
                  ->where('id_planaccionhallazgos', '=', $id_planaccionhallazgos)
                  ->get();
    }
    
    
}
