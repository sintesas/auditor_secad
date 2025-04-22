<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAuditoriaSeguimientoHallazgos extends Model
{
    protected $primaryKey = 'id_planaudseguimientohallazgo';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoriaSeguimientoHallazgo';

    public $timestamps = false;

    public static function getHallazgos($id_planauditoriaseguimiento) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaSeguimientoHallazgo')
                  ->where('id_planauditoriaseguimiento', '=', $id_planauditoriaseguimiento)
                  ->get();
    }

    public static function getHallazgosNoConformidad($id_planinformeauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAccionHallazgosLista')
                  ->where('id_planaccionhallazgos', '=', $id_planinformeauditoria)
                  ->get(); 
    }
    
    
}
