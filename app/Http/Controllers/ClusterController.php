<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cluster;

class ClusterController extends Controller
{
    public function index()
    {
        $clusters = Cluster::orderBy('IdCluster', 'asc')->paginate(10);
        return view ('fomento.agremiaciones.clusters')->with('clusters', $clusters);
    }
    
    public function create()
    {
        return view('fomento.agremiaciones.crear_cluster');
    }
   
    public function store(Request $request)
    {
         // make an object to catch the input
        $cluster = new Cluster;
        // store info
        $cluster->NombreCluster = $request->input('NombreCluster');
        $cluster->Sigla = $request->input('Sigla');
        $cluster->Ciudad = $request->input('Ciudad');
        $cluster->Region = $request->input('Region');
        $cluster->RepresLegal = $request->input('RepresLegal');
        $cluster->Direccion = $request->input('Direccion');
        $cluster->Telefono = $request->input('Telefono');
        $cluster->Email = $request->input('Email');
        $cluster->Activo = 1;

        $cluster->save();

        return redirect()->route('cluster.index');

    }

    public function editCluster(Request $req){

        $cluster = Cluster::find($req->id);

        $cluster->NombreCluster = $req->nombrecluster;
        $cluster->Sigla = $req->sigla;
        $cluster->Ciudad = $req->ciudad;
        $cluster->Region = $req->region;
        $cluster->RepresLegal = $req->replegal;
        $cluster->Direccion = $req->direccion;
        $cluster->Telefono = $req->email;
        $cluster->Email = $req->telefono;
        $cluster->Activo = 1;
        
        $cluster->save();

        return response()->json($cluster);

    }

    public function deleteCluster($idcluster){
    
        $cluster = Cluster::destroy($idcluster);
        return response()->json($cluster);
    
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($IdCluster)
    {
        $clusters = Cluster::find($IdCluster);
        return view('fomento.agremiaciones.editar_cluster')->withCluster($clusters);
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function destroy($IdCluster)
    {
        $cluster = Cluster::find($IdCluster);
        $cluster->delete();
        return redirect()->route('cluster.index');
    }
}
