<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Permiso extends Model
{
    use HasFactory;

    var $consultar;
    var $crear;
    var $actualizar;
    var $eliminar;

    public function getPermisos($codigo) {
        $db = \DB::select("exec pr_vw_permisos ?,?",
                        [
                            \Session::get('username'),
                            $request->get('cod_modulo')
                        ]);

        $p = new Permiso;
        $p->consultar = $db[0]->consultar;
        $p->crear = $db[0]->crear;
        $p->actualizar = $db[0]->actualizar;
        $p->eliminar = $db[0]->eliminar;

        return $p;
    }
}
