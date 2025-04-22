<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditoriaProgramas extends Model
{
    protected $table = 'AU_Reg_AuditoriaProgramas';

    protected $primaryKey = 'id_auditoriaprog';

    public $timestamps = false;

    public static function getAllFromVista()
    {
        return \DB::table('vw_AU_Reg_AuditoriaProgramas')->get(); 
    }

}