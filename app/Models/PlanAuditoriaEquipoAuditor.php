<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAuditoriaEquipoAuditor extends Model
{
    protected $primaryKey = 'id_equipoauditor';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA';

    public $timestamps = false;

    protected $fillable = [
        'id_planauditoria', 'id_integrante', 'id_rol'
    ];


    public static function getEquipoAuditor($id_planauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaEquipoA')
                  ->where('id_planauditoria', '=', $id_planauditoria)
                  ->get(); 
    }
    
}
