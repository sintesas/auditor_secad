<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NombreLista extends Model
{
    use HasFactory;

    protected $table = 'tb_pm_nombres_listas';

    protected $primaryKey = 'nombre_lista_id';

    public $timestamps = false;
}
