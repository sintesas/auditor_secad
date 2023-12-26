<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;

class Empresa extends Model
{
    // use LogsActivity;

    protected $table = 'AU_Reg_Empresas';

    protected $primaryKey = 'IdEmpresa';

    public $timestamps = false;
    


    public function funcionarios(){
       return $this->hasMany(FuncionariosEmpresa::class, 'IdEmpresa');
    }

    public function capacidades(){
        return $this->hasMany(CapacidadesEmpresa::class, 'IdEmpresa');
    }

    public function auditorias(){
        return $this->belongsTo(Auditoria::class, 'IdEmpresa');
    }

    public static function empresasBySector($IdSector){
        return Empresa::where('AU_Reg_OfertaComercialEmpresa.IdOfertaComercial', '=', $IdSector)
                ->join('AU_Reg_OfertaComercialEmpresa', 'AU_Reg_OfertaComercialEmpresa.IdEmpresa', '=', 'dbo.AU_Reg_Empresas.IdEmpresa')
                ->orderBy('NombreEmpresa', 'desc')->get();
    }

    public static function sigla($id){
        // return Empresa::where('IdEmpresa','=',$id)->get();

        return Empresa::where('dbo.AU_Reg_Empresas.IdEmpresa','=',$id)
        ->leftJoin('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdEmpresa', '=', 'dbo.AU_Reg_Empresas.IdEmpresa')
        ->select(  'dbo.AU_Reg_Empresas.SiglasNombreClave',
                   'dbo.AU_Reg_Auditorias.Codigo',
                   'dbo.AU_Reg_Empresas.TipoOrganizacion')
        ->orderBy('IdAuditoria', 'desc')->get();
    }

    public static function getById($idEmpresa){
        return Empresa::where('IdEmpresa', '=', $idEmpresa)->get();
    }


    public static function getEmpresasAreasSubareas($status){
        // return Empresa::where('IdEmpresa','=',$id)->get();
        if($status == 1){
            return \DB::table('AU_Reg_Empresas as e')
            ->join('AU_Mst_SubAreasCooperacionIndustrial as s', 'e.IdSubAreasCooperacionIndustrial', '=', 's.IdSubAreasCooperacionIndustrial')
            ->join('AU_Mst_AreasCooperacionIndustrial as a', 'e.IdAreasCooperacionIndustrial', '=', 'a.IdAreasCooperacionIndustrial')
            ->distinct()
            ->select('e.NombreEmpresa','Nit', 'Ciudad', 'Telefono','e.IdEmpresa','s.Descripcion as subAreasEmpresa', 'a.Descripcion as areasEmpresa')
            ->orderBy('areasEmpresa', 'asc')
            ->get();
        }else if($status == 2){
            return \DB::table('AU_Reg_Empresas as e')
            ->join('AU_Mst_SubAreasCooperacionIndustrial as s', 'e.IdSubAreasCooperacionIndustrial', '=', 's.IdSubAreasCooperacionIndustrial')
            ->join('AU_Mst_AreasCooperacionIndustrial as a', 'e.IdAreasCooperacionIndustrial', '=', 'a.IdAreasCooperacionIndustrial')
            ->distinct()
            ->select('e.NombreEmpresa','Nit', 'Ciudad', 'Telefono','e.IdEmpresa','s.Descripcion as subAreasEmpresa', 'a.Descripcion as areasEmpresa')
            ->orderBy('e.NombreEmpresa', 'asc')
            ->get();
        }
        
    }
    
    public function gestionCalidad(){
        return $this->hasOne(GestionCalidad::class, 'IdEmpresa');
    }

    public function sistemascertificacioncalidad(){
        return $this->hasMany(sistemaCertificacionCalidad::class, 'IdEmpresa');
    }

    public function aspectoEstrategico(){
        return $this->hasOne(AspectoEstrategico::class, 'IdEmpresa');
    }

    public function objetivossEstratecigosAspectos(){
        return $this->hasMany(ObjetivoEstrategicoAspecto::class, 'IdEmpresa');
    }


    public function caracteristicaEmpresa(){
        return $this->hasOne(CaracteristicaEmpresa::class, 'IdEmpresa');
    }

    public function produccionEmpresa(){
        return $this->hasOne(ProduccionEmpresa::class, 'IdEmpresa');
    }

    public function productosFfmm(){
        return $this->hasMany(ProductoFfmm::class, 'IdEmpresa');
    }

    public function materiasPrimas(){
        return $this->hasMany(MateriaPrima::class, 'IdEmpresa');
    }

    public function actividadesEconomicas(){
        return $this->hasMany(ActividadEconomica::class, 'IdEmpresa');
    }

    public function produccionesTercerizacion(){
        return $this->hasMany(ProduccionTercerizacion::class, 'IdEmpresa');
    }

    public function maquinarias(){
        return $this->hasMany(MaquinariaEquipoProduccion::class, 'IdEmpresa');
    }

    public function mercados(){
        return $this->hasMany(Mercado::class, 'IdEmpresa');
    }

    public function tecnologiaEmpresa(){
        return $this->hasOne(TecnologiaEmpresa::class, 'IdEmpresa');
    }

    public function productosOfrecidos(){
        return $this->hasMany(ProductoOfrecido::class, 'IdEmpresa')->with('demandaproducto');
    }

    public function serviciosOfrecidos(){
        return $this->hasMany(ServicioOfrecido::class, 'IdEmpresa');
    }


    // tecnologias
    public function productosSector(){
        return $this->hasMany(ProductoSector::class, 'IdEmpresa');
    }

    public function antecedentesAutor(){
        return $this->hasMany(AntecedenteAutor::class, 'IdEmpresa');
    }

    public function desarrollados(){
        return $this->hasMany(Desarrollado::class, 'IdEmpresa');
    }

    public function tecnologiasSucliente(){
        return $this->hasMany(TecnologiaSuCliente::class, 'IdEmpresa');
    }

}
