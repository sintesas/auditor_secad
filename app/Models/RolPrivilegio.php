<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RolPrivilegio extends Model
{
    use HasFactory;

    protected $table = 'tb_ad_roles_privilegios';

    protected $primaryKey = 'rol_privilegio_id';

    public $timestamps = false;

    public function get_roles_privilegios_by_rol_id(Request $request) {
        $db = \DB::select('select * from tb_ad_roles_privilegios where rol_id = :id order by rol_privilegio_id', array('id' => $request->get('rol_id')));
        
        return $db;
    }

    public function get_roles_privilegios_activos() {
        $db = \DB::select('select * from vw_ad_roles_privilegios order by 1');

        return $db;
    }

    public function eliminar_roles_privilegios_by_id(Request $request) {
        $db = RolPrivilegio::find($request->get('rol_privilegio_id'));
        $db->delete();
        
        return $db;
    }

    public function get_modulos() {
        $db = \DB::select("exec pr_get_modulos");
        
        return $db;
    }
}
