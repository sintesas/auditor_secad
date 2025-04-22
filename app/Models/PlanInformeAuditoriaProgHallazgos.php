<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanInformeAuditoriaProgHallazgos extends Model
{
    protected $primaryKey = 'id_informeauditoriahallazgos';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanInformeAuditoriaHallazgos';

    public $timestamps = false;

    protected $fillable = [
        'tipohallazgo_id_listas',   
        'descripcion',               
        'id_informeauditoriahallazgos', 
        'id_planinformeauditoria',   
    ];
    


    public static function getHallazgos($id_planinformeauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoriaHallazgos')
                  ->where('id_planinformeauditoria', '=', $id_planinformeauditoria)
                  ->get();
    }
    
    public static function getHallazgosNoConformidad($id_planinformeauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanInformeAuditoriaHallazgos')
                  ->where('id_planinformeauditoria', '=', $id_planinformeauditoria)
                  ->where('TipoHallazgo', '!=', 'Conformidad') 
                  ->get(); 
    }
}
