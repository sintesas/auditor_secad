<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AprobarHorasEspecialistas extends Model
{
    protected $table = 'AU_Reg_AprobarHorasEspecialista';

    protected $primaryKey = 'id_aprobarhoras';

    public $timestamps = false;

    public static function getAllFromVista()
    {
        return \DB::table('AU_Reg_AprobarHorasEspecialista')->get(); 
    }

}