<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VWSeguimiento extends Model
{
    protected $table = 'dbo.AUFACVW_Seguimiento';

	public $timestamps = false;

	public static function noVisitasAuditoria($id)
	{
		return VWSeguimiento::where('IdAuditoria','=',$id)->get();
	}
}
