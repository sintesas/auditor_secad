<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

use App\Models\Aeronave;
use App\Models\Permiso;

class AeronaveController extends Controller
{
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
    
    
    public function index()
    {        
        $aeronaves = Aeronave::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.variables.ver_tablas_aeronave')->with('aeronaves', $aeronaves)->with('permiso', $permiso);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        // make an object to catch the input
        $aeronave = new Aeronave;
        // aeronave info
        $ip = $this->get_client_ip(); 
        $aeronave->COD = $request->input('COD');
        $aeronave->Aplicacion = $request->input('Aplicacion');
        $aeronave->Equipo = $request->input('Equipo');
        $aeronave->Aeronave = $request->input('Aeronave');
        $aeronave->Grupo = $request->input('Grupo');
        $aeronave->Activo = 1; 
        $aeronave->save();

    //    activity()
    //         ->performedOn($aeronave)
    //         ->withProperties($ip)
    //         ->log('Aeronave Creada');

        return redirect()->route('aeronave.index');

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($IdAeronave)
    {
        $aeronave = Aeronave::find($IdAeronave);
            //return view ('certificacion.variables.ver_tablas_aeronave')->withAeronave('aeronave', $aeronave);
    }

    
    public function update(Request $request, $IdAeronave)
    {
        // bring one record using id or something
        $aeronave = Aeronave::find($request->input('IdAeronave'));

        // aeronave info
        $ip = $this->get_client_ip();
        $aeronave->COD = $request->input('COD');
        $aeronave->Aplicacion = $request->input('Aplicacion');
        $aeronave->Equipo = $request->input('Equipo');
        $aeronave->Aeronave = $request->input('Aeronave');
        $aeronave->Grupo = $request->input('Grupo');
        $aeronave->Activo = 1; 
        $aeronave->save();
        
    //    activity()
    //         ->performedOn($aeronave)
    //         ->withProperties($ip)
    //         ->log('Aeronave Editada');

        return redirect()->route('aeronave.index');
    }

    
    public function destroy($IdAeronave)
    {
            // find instance
        $aeronave = Aeronave::find($IdAeronave);
        $ip = $this->get_client_ip();
        // delete
        $aeronave->delete();

        // activity()
        //     ->performedOn($aeronave)
        //     ->withProperties($ip)
        //     ->log('Aeronave Borrada');
        
        return redirect()->route('aeronave.index');
    }
}
