<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
	protected $table = 'AU_Reg_Clusters';
	
	protected $primaryKey = 'IdCluster';

    public $timestamps = false;

    public function afiliados(){
        return $this->hasMany(ClusterAfiliado::class, 'IdCluster', 'IdCluster');
    }

    public function cluster(){
        return $this->belongsTo(Cluster::class, 'IdCluster', 'IdCluster');
    }


}
