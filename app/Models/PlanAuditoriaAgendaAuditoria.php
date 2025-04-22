<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanAuditoriaAgendaAuditoria extends Model
{
    protected $primaryKey = 'id_agendaauditoria';

    protected $table = 'AU_Reg_AuditoriaProgramasPlanAuditoriaAgenda';

    public $timestamps = false;

    protected $fillable = [
        'id_planauditoria',  
        'proceso',
        'Fecha',
        'hora_inicio',
        'hora_fin',
        'id_responsable',
        'auditado',
    ];

    public static function getAgendaAuditoria($id_planauditoria) {
        return \DB::table('VWAU_Reg_AuditoriaProgramasPlanAuditoriaAgenda')
                  ->where('id_planauditoria', '=', $id_planauditoria)
                  ->get();
    }
}
