<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;



class PlanCertificacionAnual extends Model
{

protected $table = 'AU_Reg_PlanCertificacionAnual';

protected $primaryKey = 'id';

public $timestamps = false;

/*    public function demandaPotencial(){
    	return $this->hasMany('App\Empresa');
    }

    public function demandasPotencialesConsumoRotacion(){
    	return $this->hasMany('App\DemandaPotencialConsumoRotacion', 'IdDemandaPotencial', 'IdDemandaPotencial');
    }

    public function demandasPotencialesValoracionTecnica(){
    	return $this->hasOne('App\DemandaPotencialValoracionTecnica', 'IdDemandaPotencial');
    }

    public function demandasPotencialesPrioridadUma(){
    	return $this->hasOne('App\DemandaPotencialPrioridadUma', 'IdDemandaPotencial');
    }

    public function demandasPotencialesValoracionEconomica(){
    	return $this->hasOne('App\DemandaPotencialValoracionEconomica', 'IdDemandaPotencial');
    }

    public function demandasPotencialesFactibilidadTecnica(){
    	return $this->hasOne('App\DemandaPotencialFactibilidadTecnica', 'IdDemandaPotencial');
    }

    public function demandasPotencialesOfertaAeronautica(){
        return $this->hasOne('App\DemandaPotencialOfertaAeronautica', 'IdDemandaPotencial');
    }*/

  /*  public static function all(){
        return DB::table($this->table)->get();
    }*/

  /*  public static function demandaPotencialJoin()
    {
        return DemandaPotencial::join('AU_Mst_Unidades','AU_Mst_Unidades.IdUnidad', '=', 'AU_Reg_DemandaPotencial.IdUnidad')
                                ->join('AU_Mst_Aeronaves','AU_Mst_Aeronaves.IdAeronave', '=', 'AU_Reg_DemandaPotencial.IdAeronave')
                                ->join('AU_Reg_ATA','AU_Reg_ATA.IdATA', '=', 'AU_Reg_DemandaPotencial.IdATA')
                                ->get();
    }

    public static function demandaPotencialWithParteNumero()
    {
        return DemandaPotencial::select("dbo.AU_Reg_DemandaPotencial.IdDemandaPotencial",
                    DB::raw("CONCAT ( dbo.AU_Reg_DemandaPotencial.Nombre, ' | ',dbo.AU_Reg_DemandaPotencial.ParteNumero) as Nombre"))->get();
    }

    public static function demandaPotencialWithParteNumeroActivo()
    {
        return DemandaPotencial::select("dbo.AU_Reg_DemandaPotencial.IdDemandaPotencial",
                    DB::raw("CONCAT ( dbo.AU_Reg_DemandaPotencial.Nombre, ' | ',dbo.AU_Reg_DemandaPotencial.ParteNumero) as Nombre"))->where('Activo',1)->get();
    }

    public function getNombreParteNumeroAttribute()
    {
        return $this->Nombre.'|'.$this->ParteNumero;
    }

    public function equipoRelation()
    {
        return $this->belongsTo(Aeronave::class,'IdAeronave','IdAeronave');
    }*/
}
