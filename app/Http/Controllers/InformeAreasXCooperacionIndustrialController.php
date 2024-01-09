<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\VWcantidadTotalEmpresas;
use App\Models\Permiso;

class InformeAreasXCooperacionIndustrialController extends Controller
{
    public function index()
    {
        //$empresas = VWcantidadTotalEmpresas::get();
        $empresas = Empresa::getEmpresasAreasSubareas(1);
        /*die($empresas);
        \DB::table(' as e')
            ->select(\DB::raw('count(NombreEmpresa) as totalEmpresa'))
            ->where('status', '<>', 1)
            ->groupBy('status')
            ->get();*/
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');

        return view ('fomento.empresas.informes.visual_informe_areas_x_cooperacion_industrial')
                ->with('empresas', $empresas)->with('permiso', $permiso);
    }

    
    public function create()
    {
        /*$empresas = Empresa::
                 select('NombreEmpresa', 'Nit', 'Ciudad', 'Telefono', 'ACI.Descripcion AS ACIDescipcion', 'SACI.Descripcion AS SACIDescipcion')
                ->leftjoin('AU_Mst_AreasCooperacionIndustrial AS ACI', 'ACI.IdAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdAreasCooperacionIndustrial')
                ->leftjoin('AU_Mst_SubAreasCooperacionIndustrial AS SACI', 'SACI.IdSubAreasCooperacionIndustrial', '=', 'AU_Reg_Empresas.IdSubAreasCooperacionIndustrial')
                ->distinct()->get();*/

        $empresas = Empresa::getEmpresasAreasSubareas(2);

        return \PDF::loadView('fomento.empresas.informes.pdf_informe_areas_x_cooperacion_industrial', ['empresas' => $empresas])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('margin-right', '5mm')->setOption('margin-left', '5mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-areas-x-cooperacion-industrial.pdf');
    }
}
