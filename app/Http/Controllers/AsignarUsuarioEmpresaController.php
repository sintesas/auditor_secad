<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Rol;
use App\Models\User;
use App\Models\Empresa;
use App\Models\UsersLDAP;
use App\Models\FuncionariosEmpresa;

class AsignarUsuarioEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userComamies = User::getCompanyUsers();

        $perfil = Rol::rolUser();

        return view ('gestionRecursos/recursoHumano/ver_empresa_asignar')
            ->with('perfil', $perfil)
            ->with('userComamies', $userComamies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $perfil = Rol::rolUser();

        $idPersonal = Auth::user()->IdPersonal;

        $ResultUsersLDAP = UsersLDAP::all();
        $ResultUsersLDAP->prepend('None');

        return view ('gestionRecursos/recursoHumano/crear_empresa_asignar')
                ->with('empresas', $empresas)
                ->with('perfil', $perfil)
                ->with('ResultUsersLDAP', $ResultUsersLDAP);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $userExc = User::getTopUserEmail($request->input('email'),  $request->input('name'));

            if(count($userExc) == 0){

                //check password

                $pass1 = $request->input('password');
                $pass2 = $request->input('passwordverify');

                //salting set to automatic and cost up to 15 after evaluating server requirements, recommended lowering to 10 if
                //ms > 50

                $options = [
                    'cost' => 15,
                ];
                
                $securePass = password_hash($pass1, PASSWORD_BCRYPT, $options);
                
                if($pass1 == $pass2){

                    $usuario = new User;

                    $usuario->IdEmpresa = $request->input('IdEmpresa');
                    $usuario->name = $request->input('name');
                    $usuario->email = $request->input('email');
                    $usuario->password = $securePass;
                    $usuario->activated =1;

                    $role = 11;
                    $role_r = Role::where('id', '=', $role)->firstOrFail();

                    $usuario->save();
                
                    $usuario->assignRole($role_r);

                    $notification = array(
                        'message' => 'Usuario Creado',
                        'alert-type' => 'success' 
                    );
                    return redirect()->route('asignarusuarioEmpresa.index')->with($notification);                

                }
                else{

                    $error = array(
                        'message' => 'Las contraseñas no coinciden',
                        'alert-type' => 'warning'
                    );
                    return redirect()->route('asignarusuarioEmpresa.index')->with($error);
                }
            }else{
                $error = array(
                    'message' => 'ya existe un usuario con el mismo nombre y email',
                    'alert-type' => 'warning'
                );
                return redirect()->route('asignarusuarioEmpresa.index')->with($error);
            }

        } catch (Exception $e) {
             $notification = array(
              'message' => 'Error'.$e,
              'alert-type' => 'error'
            );

            return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $user = User::find($id);

        $perfil = Rol::rolUser();
        

        return view ('gestionRecursos/recursoHumano/editar_empresa_asignar')
                ->with('empresas', $empresas)
                ->with('perfil', $perfil)
                ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            //check password

            $pass1 = $request->input('password');
            $pass2 = $request->input('passwordverify');            

            if ($pass1 != null){
                $options = [
                'cost' => 15,
                ];
                
                $securePass = password_hash($pass1, PASSWORD_BCRYPT, $options);
                if($pass1 == $pass2){
                    $usuario = User::find($id);

                    $usuario->IdEmpresa = $request->input('IdEmpresa');
                    $usuario->name = $request->input('name');
                    $usuario->email = $request->input('email');
                    $usuario->password = $securePass;

                    $role = 11;
                    $role_r = Role::where('id', '=', $role)->firstOrFail();

                    $usuario->save();
                   
                    $usuario->assignRole($role_r);

                    $notification = array(
                        'message' => 'Usuario Actualizado',
                        'alert-type' => 'success' 
                    );
                    return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
                }
                else
                {
                    $error = array(
                    'message' => 'Las contraseñas no coinciden',
                    'alert-type' => 'warning'
                    );
                    return redirect()->route('asignarusuarioEmpresa.index')->with($error);
                }

            }
            else
            {
                $usuario = User::find($id);

                $usuario->IdEmpresa = $request->input('IdEmpresa');
                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');

                $usuario->save();

                $notification = array(
                    'message' => 'Usuario Actualizado',
                    'alert-type' => 'success' 
                );
                return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
            }


        } catch (Exception $e) {
             $notification = array(
              'message' => 'Error'.$e,
              'alert-type' => 'error'
            );

            return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usuario = User::find($id);
            $usuario->delete();

            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
            );

            return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
        } catch (Exception $e) {
             $notification = array(
              'message' => 'Error'.$e,
              'alert-type' => 'error'
            );

            return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
        }
    }

    public function getFuncionariosEmpresas(Request $request, $IdEmpresa){
        if($request->ajax()){
            $funcionarios = FuncionariosEmpresa::funcionariosEmpresa($IdEmpresa);
            return response()->json($funcionarios);
        }
    }
}
