<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\Cluster;
use App\Models\ClusterAfiliado;
use App\Models\Permiso;

class InformeAfiliadosClusterController extends Controller
{
    public function index()
    {
        $cluster = Cluster::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view ('fomento.agremiaciones.informes.ver_informe_afiliados_cluster')
            ->with('cluster', $cluster)->with('permiso', $permiso);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($IdCluster)
    {

        $cluster = Cluster::find($IdCluster)->afiliados;
        $clusterGroup = Cluster::where('IdCluster','=',$IdCluster)->get();
        $idCluster = $IdCluster;

        return view('fomento.agremiaciones.informes.visual_informe_afiliados_cluster')
            ->with('cluster', $cluster)
            ->with('clusterGroup', $clusterGroup)
            ->with('idCluster', $idCluster);

    }


    public function edit($IdCluster)
    {
        $clusterafiliados = Cluster::find($IdCluster)->afiliados;

        return \PDF::loadView('fomento.agremiaciones.informes.pdf_informe_afiliados', ['clusterafiliados' => $clusterafiliados])->download('informe-afiliados-cluster.pdf');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
