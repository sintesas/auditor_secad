<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tb_ad_menu';

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'nombre_menu,tipo_menu,menu_padre_id,icono,link,activo'
    ];

    public $timestamps = false;

    public function get_menu_id($menus) {
        $data = array();
        foreach($menus as $row) {
            $tmp = array();
            $tmp['menu_id'] = $row->menu_id;
            $tmp['titulo'] = $row->nombre_menu;
            $tmp['tipo_menu'] = $row->tipo_menu;
            $tmp['menu_padre_id'] = $row->menu_padre_id;
            $tmp['icono'] = $row->icono;
            $tmp['link'] = $row->link;
            $tmp['submenus'] = array();

            array_push($data, $tmp);
        }

        $result = $this->menu_recursivo($data);

        return $result;
    }

    public function menu_recursivo($data, $padre_id = 0) {
        $tree = array();
        foreach ($data as $d) {
            if ($d['menu_padre_id'] == $padre_id) {
                $submenus = $this->menu_recursivo($data, $d['menu_id']);
                if (!empty($submenus)) {
                    $d['submenus'] = $submenus;
                }
                $tree[] = $d;
            }
        }
        return $tree;
    }
}
