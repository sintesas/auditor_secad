<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\EstadosEmpresa;
use App\Models\DominioIndustrial;
use App\Models\AreasCooperacionIndustrial;
use App\Models\ActividadesEconomicas;
use App\Models\Permiso;

class InformeDinamicoEmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::
                    select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'siglasNombreClave')
                    ->distinct()
                    ->get();

        $estadoEmpresa = EstadosEmpresa::all();
        $estadoEmpresa->prepend('None');

        $dominioIndustrial = DominioIndustrial::all();
        $dominioIndustrial->prepend('None');

        $areasCooperacionIndustrial = AreasCooperacionIndustrial::all();
        $areasCooperacionIndustrial->prepend('None');

        $actividadesEconomicas = ActividadesEconomicas::all();
        $actividadesEconomicas->prepend('None');

        $actEco = new ActividadesEconomicasController();
        $sections = $actEco->ClassSections();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view ('fomento.empresas.informes.visual_informe_dinamico')
                    ->with('estadoEmpresa', $estadoEmpresa)
                    ->with('dominioIndustrial', $dominioIndustrial)
                    ->with('areasCooperacionIndustrial', $areasCooperacionIndustrial)
                    ->with('actividadesEconomicas', $actividadesEconomicas)
                    //->with('empresas', $empresas)
                    ->with('secciones', $sections)->with('permiso', $permiso);
    }

    public function filterDinamicCompanyReportCreator(Request $request){
        $data = json_decode($request->input('data'));

        $results = null;

        if($data->TipoOrganizacion == ''
            && $data->IdEstadoEmpresa == ''
            && $data->IdDominioIndustrial == ''
            && $data->IdAreasCooperacionIndustrial == ''
            && $data->IdActividadEconomica == '') {

            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'siglasNombreClave')
            ->distinct()
            ->get();
        }


        //////////////////////////////////////
        //TipoOrganizacion ALL
        if($data->TipoOrganizacion != ''
            && $data->IdEstadoEmpresa == '' 
            && $data->IdDominioIndustrial == '' 
            && $data->IdAreasCooperacionIndustrial == '' 
            && $data->IdActividadEconomica == '') {
                $results = Empresa::
                select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion')
                    ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                    ->get();
        }


        if($data->TipoOrganizacion != '' 
        && $data->IdEstadoEmpresa != ''
            && $data->IdDominioIndustrial == '' 
            && $data->IdAreasCooperacionIndustrial == '' 
            && $data->IdActividadEconomica == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS')
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->get();
        }


        if($data->TipoOrganizacion != '' 
            && $data->IdEstadoEmpresa != '' 
            && $data->IdDominioIndustrial != ''
            && $data->IdAreasCooperacionIndustrial == '' 
            && $data->IdActividadEconomica == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->get();
        }


        ///////////////////////////////////
        ///////////////////////////////////
        if($data->TipoOrganizacion != '' 
            && $data->IdEstadoEmpresa != ''
            && $data->IdDominioIndustrial == '' 
            && $data->IdAreasCooperacionIndustrial == ''
            && $data->IdActividadEconomica != '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }
        if($data->TipoOrganizacion != '' && $data->IdEstadoEmpresa != ''
            && $data->IdDominioIndustrial == ''
            && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->TipoOrganizacion == ''
            && $data->IdEstadoEmpresa != ''
            && $data->IdDominioIndustrial != ''
            && $data->IdAreasCooperacionIndustrial == ''
            && $data->IdActividadEconomica != '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }
        ////////////////////////////////
        ///////////////////////////////
        if($data->TipoOrganizacion != '' && $data->IdEstadoEmpresa != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->TipoOrganizacion != '' && $data->IdEstadoEmpresa != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }


        if($data->TipoOrganizacion != '' && $data->IdDominioIndustrial != ''
            && $data->IdAreasCooperacionIndustrial == '' && $data->IdActividadEconomica == ''
            && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'DI.Descripcion AS DIDescripcion')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->get();
        }
        if($data->TipoOrganizacion != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->TipoOrganizacion != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }


        if($data->TipoOrganizacion != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->IdEstadoEmpresa == ''  && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->TipoOrganizacion != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->IdEstadoEmpresa == ''  && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }


        if($data->TipoOrganizacion != '' && $data->IdActividadEconomica != ''
            && $data->IdAreasCooperacionIndustrial == '' && $data->IdEstadoEmpresa == ''  && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'AU_Reg_Empresas.TipoOrganizacion')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.TipoOrganizacion', $data->TipoOrganizacion)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }


        ////////////////////////////////////
        //IdEstadoEmpresa ALL
        if($data->IdEstadoEmpresa != ''
            && $data->IdDominioIndustrial == '' && $data->IdAreasCooperacionIndustrial == '' && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS')
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->get();
        }


        if($data->IdEstadoEmpresa != '' && $data->IdDominioIndustrial != ''
            && $data->IdAreasCooperacionIndustrial == '' && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->get();
        }
        if($data->IdEstadoEmpresa != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->IdEstadoEmpresa != '' && $data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }


        if($data->IdEstadoEmpresa != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '' && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->IdEstadoEmpresa != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }
        if($data->IdEstadoEmpresa != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdDominioIndustrial == '' && $data->IdAreasCooperacionIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'S.Descripcion AS STATUS')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_EstadosEmpresa AS S', 'S.IdEstadoEmpresa', '=', 'AU_Reg_Empresas.IdEstadoEmpresa')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdEstadoEmpresa', $data->IdEstadoEmpresa)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }


        ////////////////////////////////////
        //IdDominioIndustrial ALL
        if($data->IdDominioIndustrial != ''
            && $data->IdAreasCooperacionIndustrial == '' && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'DI.Descripcion AS DIDescripcion')
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->get();
        }
        if($data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->IdDominioIndustrial != '' && $data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }
        if($data->IdDominioIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '' && $data->IdAreasCooperacionIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'DI.Descripcion AS DIDescripcion')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Mst_DominioInsdustrial AS DI', 'DI.IdDominioIndustrial', '=', 'AU_Reg_Empresas.IdDominioIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdDominioIndustrial', $data->IdDominioIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }


        ////////////////////////////////////
        //IdAreasCooperacionIndustrial ALL
        if($data->IdAreasCooperacionIndustrial != ''
            && $data->IdActividadEconomica == ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '' && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->distinct()->get();
        }
        if($data->IdAreasCooperacionIndustrial != '' && $data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '' && $data->IdDominioIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono')
                ->selectRaw("(SELECT CASE WHEN ACI.Descripcion IS NULL THEN 'Sin asignar' WHEN ACI.Descripcion IS NOT NULL THEN ACI.Descripcion END) AS ACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN SACI.Descripcion IS NULL THEN 'Sin asignar' WHEN SACI.Descripcion IS NOT NULL THEN SACI.Descripcion END) AS SACIDescipcion")
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AU_Reg_Empresas.IdAreasCooperacionIndustrial', $data->IdAreasCooperacionIndustrial)
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->distinct()->get();
        }


        ////////////////////////////////////
        //IdActividadEconomica ALL
        if($data->IdActividadEconomica != ''
            && $data->TipoOrganizacion == '' && $data->IdEstadoEmpresa == '' && $data->IdDominioIndustrial == '' && $data->IdAreasCooperacionIndustrial == '') {
            $results = Empresa::
            select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono')
                ->selectRaw("(SELECT CASE WHEN AE.Descripcion IS NULL THEN 'Sin asignar' WHEN AE.Descripcion IS NOT NULL THEN AE.Descripcion END) AS AEDescripcion")
                ->join('AU_Reg_ActividadesEconomicas AS RAE', 'RAE.IdEmpresa', '=', 'AU_Reg_Empresas.IdEmpresa')
                ->join('AU_Mst_ActividadesEconomicas AS AE', 'AE.IdActividadEconomica', '=', 'RAE.IdActividadesEconomicas')
                ->where('AE.IdActividadEconomica', $data->IdActividadEconomica)
                ->get();
        }
        //////////////////////////////////////

        $response = '';
        switch($data->type){
            case 'filter':
                $response = \Response::json($results);
                break;
            case 'build':
                $response = \PDF::loadView('fomento.empresas.informes.pdf_informe_dinamico', ['empresas' => $results, 'data' => $data])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('margin-right', '5mm')->setOption('margin-left', '5mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-dinamico-x-empresas.pdf');
                break;
        }

        return $response;
    }
}
