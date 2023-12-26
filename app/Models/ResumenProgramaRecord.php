<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumenProgramaRecord extends Model
{
    protected $table = 'AU_Mst_Informe_Control';

    protected $primaryKey = 'Id';

	public $timestamps = false;


	public static function getLastrow(){
		return ResumenProgramaRecord::orderby('Id', 'DESC')->get();
	}
}