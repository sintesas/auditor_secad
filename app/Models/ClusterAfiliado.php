<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClusterAfiliado extends Model
{
    protected $table = 'AU_Reg_ClusterAfiliados';

    protected $primaryKey = 'IdClusterAfiliado';
    
	public $timestamps = false;

	// display nombreempresa in afiliados view
	public function empresa(){
		return $this->hasOne(Empresa::class, 'IdEmpresa', 'IdEmpresa');
	}

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'IdCluster');
    }

	public static function afiliados($id){
        return ClusterAfiliado::where('dbo.AU_Reg_ClusterAfiliados.IdCluster', '=', $id)
        	->join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_ClusterAfiliados.IdEmpresa')
        	->select('dbo.AU_Reg_Empresas.IdEmpresa', 'dbo.AU_Reg_Empresas.NombreEmpresa', 'dbo.AU_Reg_Empresas.PaginaWeb')
        	->get();
    }

}
