<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Personal;
use App\Models\User;
use App\Models\Rol;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $persona = Personal::find($user->IdPersonal);

        $nomApellidos = Personal::getlistPersonalWithRangoAndEmail();

        $roles = Rol::rolUserName();

        

        $permissions = Permission::all();

        return view ('gestionRecursos/recursoHumano/perfil_usuario')
            ->with('nomApellidos', $nomApellidos)
            ->with('roles', $roles)
            ->with('user', $user)
            ->with('permissions', $permissions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

                    $usuario->name = $request->input('name');
                    $usuario->password = $securePass;

                    $usuario->save();

                    $notification = array(
                        'message' => 'Usuario Actualizado',
                        'alert-type' => 'success'
                    );
                    return back()->with($notification);
                }
                else
                {
                    $error = array(
                    'message' => 'Las contraseñas no coinciden',
                    'alert-type' => 'warning'
                    );
                    return back()->with($error);
                }

            }
            else
            {
                $usuario = User::find($id);

                $usuario->name = $request->input('name');

                $usuario->save();

                $notification = array(
                    'message' => 'Usuario Actualizado',
                    'alert-type' => 'success'
                );
                // return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
                return back()->with($notification);
            }


        } catch (Exception $e) {
             $notification = array(
              'message' => 'Error'.$e,
              'alert-type' => 'error'
            );

            // return redirect()->route('asignarusuarioEmpresa.index')->with($notification);
            return back()->with($notification);
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
        //
    }
}
