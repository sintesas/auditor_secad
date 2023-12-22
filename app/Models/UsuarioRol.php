<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UsuarioRol extends Model
{
    use HasFactory;

    protected $table = 'tb_ad_usuarios_roles';

    protected $primaryKey = 'usuario_rol_id';

    public $timestamps = false;

    public function getUsuarioRolById($usuario_id) {
        $db = \DB::select('select * from vw_ad_usuarios_roles_privilegios where usuario_id = :id order by 1', array('id' => $usuario_id));

        return $db;
    }

    public function get_usuarios_roles_by_usuario_id(Request $request) {
        $db = \DB::select("exec pr_get_ad_usuarios_roles_by_usuario_id ?", array($request->input('usuario_id')));

        return $db;
    }

    public function get_rol_privilegios_pantalla() {
        $db = \DB::select("exec pr_get_rol_privilegios_pantalla");

        return $db;
    }

    public function eliminar_usuarios_roles_by_id(Request $request) {
        $db = UsuarioRol::find($request->get('usuario_rol_id'));
        $db->delete();

        return $db;
    }
}
