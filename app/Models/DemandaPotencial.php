<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;



class DemandaPotencial extends Model
{

protected $table = 'AU_Reg_DemandaPotencial';

protected $primaryKey = 'IdDemandaPotencial';

public $timestamps = false;

    public function demandaPotencial(){
    	return $this->hasMany(Empresa::class);
    }

    public function demandasPotencialesConsumoRotacion(){
    	return $this->hasMany(DemandaPotencialConsumoRotacion::class, 'IdDemandaPotencial', 'IdDemandaPotencial');
    }

    public function demandasPotencialesValoracionTecnica(){
    	return $this->hasOne(DemandaPotencialValoracionTecnica::class, 'IdDemandaPotencial');
    }

    public function demandasPotencialesPrioridadUma(){
    	return $this->hasOne(DemandaPotencialPrioridadUma::class, 'IdDemandaPotencial');
    }

    public function demandasPotencialesValoracionEconomica(){
    	return $this->hasOne(DemandaPotencialValoracionEconomica::class, 'IdDemandaPotencial');
    }

    public function demandasPotencialesFactibilidadTecnica(){
    	return $this->hasOne(DemandaPotencialFactibilidadTecnica::class, 'IdDemandaPotencial');
    }

    public function demandasPotencialesOfertaAeronautica(){
        return $this->hasOne(DemandaPotencialOfertaAeronautica::class, 'IdDemandaPotencial');
    }

    public static function demandaPotencialAll(){
        return DemandaPotencial::join('AU_Mst_Unidades','AU_Mst_Unidades.IdUnidad', '=', 'AU_Reg_DemandaPotencial.IdUnidad')
                                ->leftJoin('AU_Reg_DetalleProductoAeronauticoPCA', 'AU_Reg_DetalleProductoAeronauticoPCA.id_producto', '=', 'AU_Reg_DemandaPotencial.IdDemandaPotencial')
                                ->orderBy('Anio', 'DESC')
                                ->get();
    }

    public static function demandaPotencialJoin()
    {
        return DemandaPotencial::join('AU_Mst_Unidades','AU_Mst_Unidades.IdUnidad', '=', 'AU_Reg_DemandaPotencial.IdUnidad')
                                ->join('AU_Mst_Aeronaves','AU_Mst_Aeronaves.IdAeronave', '=', 'AU_Reg_DemandaPotencial.IdAeronave')
                                ->join('AU_Reg_ATA','AU_Reg_ATA.IdATA', '=', 'AU_Reg_DemandaPotencial.IdATA')
                                ->get();
    }

    public static function demandaPotencialWithParteNumero()
    {
        return DemandaPotencial::select("dbo.AU_Reg_DemandaPotencial.IdDemandaPotencial",
        \DB::raw("CONCAT ( dbo.AU_Reg_DemandaPotencial.Nombre, ' | ',dbo.AU_Reg_DemandaPotencial.ParteNumero) as Nombre"))->get();
    }

    public static function demandaPotencialWithParteNumeroActivo()
    {
        return DemandaPotencial::select("dbo.AU_Reg_DemandaPotencial.IdDemandaPotencial",
        \DB::raw("CONCAT ( dbo.AU_Reg_DemandaPotencial.Nombre, ' | ',dbo.AU_Reg_DemandaPotencial.ParteNumero) as Nombre"))->where('Activo',1)->get();
    }

    public function getNombreParteNumeroAttribute()
    {
        return $this->Nombre.'|'.$this->ParteNumero;
    }

    public function equipoRelation()
    {
        return $this->belongsTo(Aeronave::class,'IdAeronave','IdAeronave');
    }
}
