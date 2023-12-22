<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UsuarioMenu extends Model
{
    use HasFactory;

    protected $table = 'tb_ad_usuarios_menu';

    protected $primaryKey = 'usuario_menu_id';

    public $timestamps = false;

    public function getUsuarioMenu($user_id, $opc) {
        $db = \DB::select("exec pr_get_ad_usuarios_menu_id ?,?", array($user_id, $opc));

        return $db;
    }

    public function crud_usuarios_menu(Request $request) {
        $db = \DB::select("exec pr_crud_asignar_menus ?,?,?",
                        [
                            $request->get('usuario_id'),
                            $request->get('menu_id') == 0 ? null : $request->get('menu_id'),
                            \Session::get('username')
                        ]);
        
        return $db;
    }
}
