<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moc extends Model
{
	
	protected $primaryKey = 'IdMOC';

    protected $table = 'AU_Mst_MOC';

    public $timestamps = false;
    
    public static function getMocsSubpartes(){
    	return Moc::orderBy('AU_Mst_MOC.IdMOC')
    			->leftJoin('AU_Reg_MocsSubParteMatriz', 'AU_Reg_MocsSubParteMatriz.IdMOC', '=', 'AU_Mst_MOC.IdMOC')
    			->select('')
    			->get();
    }

    public static function getMocsByRequisito($IdRequsito){
        return Moc::where('AU_Reg_MocsRequisito.IdRequsito', '=', $IdRequsito)
                ->join('AU_Reg_MocsRequisito', 'AU_Reg_MocsRequisito.IdMOC', '=', 'AU_Mst_MOC.IdMOC')
                ->select('IdMocRequisito', 'AU_Mst_MOC.IdMOC', 'Numero', 'Medio', 'CodigoAC2324', 'DescripcionAC2324', 'Estado')
                ->get();
    }
}
