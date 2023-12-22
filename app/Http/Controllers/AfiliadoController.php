<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cluster;
use App\Models\Empresa;
use App\Models\ClusterAfiliado;

class AfiliadoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $afiliado = new ClusterAfiliado;

        $afiliado->IdCluster = $request->input('IdCluster');
        $afiliado->IdEmpresa = $request->input('IdEmpresa');
        $afiliado->Nit = $request->input('Nit');
        $afiliado->Telefono = $request->input('Telefono');
        $afiliado->activo = 1;
        
        $exists = \DB::table('AU_Reg_ClusterAfiliados')->where('IdEmpresa', $request->IdEmpresa)->first();
        

        if(!$exists){
            $afiliado->save();
            $notification = array(
                'message' => 'Afiliado Añadido',
                'alert-type' => 'success'
            );
            return back()->with($notification);

        }else{
            $notification = array(
                'message' => 'Esta Empresa ya existe',
                'alert-type' => 'warning'
            );
            return back()->with($notification);

        }
    }


    public function editAfiliado(Request $req){


        $afiliado = ClusterAfiliado::find($req->id);

        $afiliado->IdEmpresa = $req->idempresa;
        $afiliado->Nit = $req->nit;
        $afiliado->Telefono = $req->telefono;
        $afiliado->Activo = 1;

        $afiliado->save();

        return response()->json($afiliado);


    }

    public function deleteAfiliado($idafiliado){
    
        $afiliado = ClusterAfiliado::destroy($idafiliado);
        return response()->json($afiliado);
    
    }

    public function show($IdCluster)
    {
         $afiliados = Cluster::find($IdCluster)->afiliados;
         $empresas = Empresa::all();

         $cluster = Cluster::find($IdCluster);

        return view('fomento.agremiaciones.afiliados_cluster')->with('afiliados', $afiliados)->with('empresas', $empresas)->with('cluster', $cluster);
    }

    public function edit($id)
    {
        //
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
