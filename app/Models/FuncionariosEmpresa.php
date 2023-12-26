<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;

class FuncionariosEmpresa extends Model
{
	// use LogsActivity;

	protected $primaryKey = 'IdFuncionarioEmpresa';

    protected $table = 'AU_Reg_FuncionariosEmpresa';

	public $timestamps = false;

	//pending

	/*public function funcionariosEmpresa(){
		return $this->belongsTo('App\Empresa');
	}*/

	public static function funcionariosEmpresa($id)
	{
		return FuncionariosEmpresa::where('IdEmpresa','=',$id)->get();
	}

	public static function funcionario($id)
	{
		return FuncionariosEmpresa::where('IdFuncionarioEmpresa','=',$id)->get();
	}
}
