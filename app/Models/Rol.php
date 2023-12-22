<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'tb_ad_roles';

    protected $primaryKey = 'rol_id';

    public $timestamps = false;

    public function get_roles_by_usuario(Request $request) {
        $db = \DB::select('select r.rol from vw_ad_usuarios_roles ur inner join tb_ad_roles r on ur.rol_id = r.rol_id where ur.usuario_id = :id', array('id' => $request->get('usuario_id')));

        return $db;
    }
}
