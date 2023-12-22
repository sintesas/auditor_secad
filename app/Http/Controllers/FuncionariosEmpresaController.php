<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

use App\Models\Rol;
use App\Models\Empresa;
use App\Models\FuncionariosEmpresa;
use App\Models\UsersLDAP;

class FuncionariosEmpresaController extends Controller
{
    // $ip = $this->get_client_ip();

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
        $perfil = Rol::rolUser();

        $empresas = Empresa::all();
        return view ('fomento.empresas.informes.visual_informe_empresas')
                ->with('perfil', $perfil)
                ->with('empresas', $empresas);
    }


    public function store(Request $request)
    {
        
        $funcionario = new FuncionariosEmpresa;


        $funcionario->IdEmpresa = $request->input('IdEmpresa');
        $funcionario->NumIdentificacion = $request->input('NumIdentificacion');
        $funcionario->Nombres = $request->input('Nombres');
        $funcionario->Celular = $request->input('Celular');
        $funcionario->Telefono = $request->input('Telefono');
        $funcionario->Email = $request->input('Email');
        $funcionario->CargoFuncion = $request->input('CargoFuncion');
        $funcionario->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
        $funcionario->activo = 1;
        $funcionario->save();

        $ip = $this->get_client_ip();
       
        activity()
            ->performedOn($funcionario)
            ->withProperties($ip)
            ->log('Funcionario Empresa creado');

        $notification = array(
            'message' => 'Funcionario Añadido',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function deleteFuncionario($idfuncionario){
    
        $funcionario = FuncionariosEmpresa::destroy($idfuncionario);
        
        return response()->json($funcionario);

        activity()
            ->performedOn($funcionario)
            ->withProperties($ip)
            ->log('Funcionario Empresa borrado');
    
    }

    public function editFuncionario(Request $request){
       
        $funcionario = FuncionariosEmpresa::find($request->id);

        $funcionario->Nombres = $request->nombres;
        $funcionario->Celular = $request->celular;
        $funcionario->Telefono = $request->telefono;
        $funcionario->Email = $request->email;
        $funcionario->CargoFuncion = $request->cargofuncion;
        $funcionario->NumIdentificacion = $request->numidentificacion;
        $funcionario->EstadoInsertOrganizacion = $request->EstadoInsertOrganizacion;
        $funcionario->Activo = 1;

        $funcionario->save();

        $ip = $this->get_client_ip();
        activity()
            ->performedOn($funcionario)
            ->withProperties($ip)
            ->log('Funcionario Empresa editado');
    

        return response()->json($funcionario);

    }
   
    public function show($IdEmpresa)
    {
         $funcionarios = Empresa::find($IdEmpresa)->funcionarios;
         
         $empresa = Empresa::find($IdEmpresa);
         $perfil = Rol::rolUser();

        $ResultUsersLDAP = UsersLDAP::select('IdUserLDAP', 'Name', \DB::raw('case Email when \'\' then CONVERT(varchar, RAND() * 1000000) else Email end as Email'))
                            ->get();
        $ResultUsersLDAP->prepend('None');

        
         return view('fomento.empresas.funcionarios_empresa')
         ->with('funcionarios', $funcionarios)
         ->with('perfil', $perfil)
         ->with('ResultUsersLDAP', $ResultUsersLDAP)
         ->with('empresa', $empresa);
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($IdFuncionarioEmpresa)
    {
       // 
    }
}
