<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
	protected $table = 'AU_Mst_Bancos';    

    protected $primaryKey = 'IdBanco';

    public $timestamps = false;
}
