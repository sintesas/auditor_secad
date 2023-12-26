<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    var $consultar;
    var $crear;
    var $actualizar;
    var $eliminar;

    public function getPermisos($cod_mod) {
        $db = \DB::select("exec pr_vw_permisos ?,?",
                        [
                            \Session::get('username'),
                            $cod_mod
                        ]);

        $p = new Permiso;
        $p->consultar = $db[0]->consultar;
        $p->crear = $db[0]->crear;
        $p->actualizar = $db[0]->actualizar;
        $p->eliminar = $db[0]->eliminar;

        return $p;
    }
}
