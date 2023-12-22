<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;
use App\Models\CapacidadesEmpresa;
use App\Models\OfertaComercial;

use Toastr;

class CapacidadesEmpresaController extends Controller
{
    public function index()
    {
        
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function store(Request $request)
    {
        $capacidad = new CapacidadesEmpresa;
        $ip = $this->get_client_ip();

        $capacidad->IdEmpresa = $request->input('IdEmpresa');
        $capacidad->IdOfertaComercial = $request->input('IdOfertaComercial');
        $capacidad->activo = 1;

        $exists = \DB::table('AU_Reg_OfertaComercialEmpresa')->where('IdOfertaComercial', $request->IdOfertaComercial)
        ->where('IdEmpresa', $request->IdEmpresa)->first();

        if(!$exists){

            $capacidad->save(); 

            activity()
            ->performedOn($capacidad)
            ->withProperties($ip)
            ->log('Capacidad Creada');

            $notification = array(

                'message' => 'Capacidad Añadida',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }else{

            $notification = array(
                'message' => 'Este codigo ya existe', 
                'alert-type' => 'warning'
            );
            return back()->with($notification);    
        }
        
    }

    public function deleteCapacidad($idofertacomercial){

        $idOferta = explode('&', $idofertacomercial)[0];
        $idempresa = explode('&', $idofertacomercial)[1];

        $capacidad = CapacidadesEmpresa::where('IdOfertaComercial', $idOferta)->where('IdEmpresa', $idempresa)->delete();

        // $capacidad = CapacidadesEmpresa::destroy($idofertacomercial);
        $notification = array(

                'message' => 'Capacidad eliminada',
                'alert-type' => 'success'
            );
        // return response()->json($capacidad)->with($notification);
        return back()->with($notification);
    
    }

    public function editCapacidad(Request $req){
        // request id
        $capacidad = CapacidadesEmpresa::find($req->idempresa);

        // insert it
        $capacidad->OfertaComercial = $req->idofertacomercial;
        $capacidad->save();

        return response()->json($capacidad);
    }
  
    public function show($IdEmpresa){     
        
        $capacidades = Empresa::find($IdEmpresa)->capacidades;
        

        $empresa = Empresa::find($IdEmpresa);
        $ofertas = OfertaComercial::all(['IdOfertaComercial', 'OfertaComercial']);

        return view('fomento.empresas.capacidades_empresa')
                ->with('capacidades', $capacidades)
                ->with('empresa', $empresa)
                ->with('ofertas', $ofertas);
    }
   

    public function edit($id)
    {
        
    }
    
    public function update(Request $request, $id)
    {
        //
    }
   
    public function destroy($id)
    {
        $idOferta = explode('&', $id)[0];
        $idempresa = explode('&', $id)[1];

        $capacidad = CapacidadesEmpresa::where('IdOfertaComercial', $idOferta)->where('IdEmpresa', $idempresa)->delete();

        // $capacidad = CapacidadesEmpresa::destroy($idofertacomercial);
        $notification = array(
                'message' => 'Capacidad eliminada',
                'alert-type' => 'success'
            );
        // return response()->json($capacidad)->with($notification);
        return back()->with($notification);
    }

    public function create()
    {
        // in modal
    }
}
