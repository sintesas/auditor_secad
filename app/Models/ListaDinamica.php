<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDinamica extends Model
{
    use HasFactory;

    protected $table = 'tb_pm_listas_dinamicas';

    protected $primaryKey = 'lista_dinamica_id';

    public $timestamps = false;
}
