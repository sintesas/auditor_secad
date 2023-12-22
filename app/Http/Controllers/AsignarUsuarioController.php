<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Personal;
use App\Models\Rol;
use App\Models\Roluser;
use App\Models\User;

class AsignarUsuarioController extends Controller
{
    public function index()
    {

        $personal = Personal::getlistPersonalWithRangoAndEmail();
        $roles = Role::all();

        $perfil = Rol::rolUser();
        //$perfil=Rol::rolesUser();

        //dd($perfil);
        return view ('gestionRecursos/recursoHumano/ver_personal_asignar')
        ->with('personal', $personal)
        ->with('perfil', $perfil)
        ->with('roles', $roles);
    }

    public function create()
    {


    }


    public function store(Request $req)
    {
      //dd($req);
        //define name and put it together
        $roles = json_decode($req->input('roles'));

        //dd($roles);

        $nombres = $req->input('nombres');
        $apellidos = $req->input('apellidos');
        $fullname = (string) $nombres . ' ' . $apellidos;


        //check password

        $pass1 = $req->input('password');
        $pass2 = $req->input('passwordverify');

        //salting set to automatic and cost up to 15 after evaluating server requirements, recommended lowering to 10 if
        //ms > 50

        $options = [
            'cost' => 15,
        ];

        $securePass = password_hash($pass1, PASSWORD_BCRYPT, $options);

        $val_roles = Roluser::where('IdUser',$req->input('IdPersonal'))->get();
        //AGREGAR ROLES
        foreach ($roles as $item_new) {
          $sw = 0;
          foreach ($val_roles as $iten_old) {
            if ($iten_old->IdRol==$item_new->id) {
              $sw=1;
            }
          }
          if($sw==0){
            $rolnuevo = new Roluser;
            $rolnuevo->IdUser=$req->input('IdPersonal');
            $rolnuevo->IdRol=$item_new->id;
            $rolnuevo->Estado=1;
            $rolnuevo->save();
          }
        }

        //ELIMINAR ROLES
        foreach ($val_roles as $iten_old) {
          $sw = 0;

          foreach ($roles as $item_new) {
            if ($iten_old->IdRol==$item_new->id) {
              $sw=1;
            }
          }

          if($sw==0){
            Roluser::where('idRol_User',$iten_old->idRol_User)->delete();
          }
        }

        if ($pass1!='' && $pass1!=null && $pass2!='' && $pass2!=null) {
          if($pass1 == $pass2){
            $val_user = User::where('IdPersonal',$req->input('IdPersonal'))->first();
            if($val_user){
              $user = User::find($val_user->id);
            }
            else {
              $user = new User;
            }

            $user->name = $fullname;
            $user->password = $securePass;
            $user->email = $req->input('email');
            $user->IdPersonal = $req->input('IdPersonal');
            $user->activated = 1;
            // $role = $req['idrole']; //Retrieving the roles field
            //$role_r = Role::where('id', '=', $role)->firstOrFail();

            $user->save();
            // $user->assignRole($role_r);//nose que hace
            //dd($user->id);


            $notification = array(
              'message' => 'Roles y Contraseña actualizada correctamente',
              'alert-type' => 'success'
            );

            return redirect()->route('asignarusuario.index')->with($notification);

          }else{
            //dd('contraseñas diferentes');


            $notification = array(
              'message' => 'Roles actualizados correctamente pero Las contraseñas no coinciden, por favor verifica nuevamente.',
              'alert-type' => 'warning'
            );

            return redirect()->route('asignarusuario.show',$req->input('IdPersonal'))->with($notification);
          }

        }
        else {

          $notification = array(
            'message' => 'Roles actualizados correctamente',
            'alert-type' => 'success'
          );

          return redirect()->route('asignarusuario.index')->with($notification);

        }
    }


    public function show($IdPersonal)
    {
        $persona = Personal::find($IdPersonal);

        $nomApellidos = Personal::getlistPersonalWithRangoAndEmail();

        $roles = Role::all();

        $permissions = Permission::all();

        $cadena=[];

        $val_user = User::where('IdPersonal',$IdPersonal)->first();


        $val_roles = \DB::table('Rol_User')
        ->select('Rol_User.*','roles.name')
        ->join('roles', 'roles.id','=','Rol_User.IdRol')
        ->where('Rol_User.IdUser',$IdPersonal)
        ->get();
        $i=1;
        foreach ($val_roles as $val) {
          $datos = [
            "nn" => $i,
            "id" => $val->IdRol,
            "texto" => $val->name
          ];
          array_push($cadena,$datos);
          $i++;
        }


        //dd($cadena);

        return view ('gestionRecursos/recursoHumano/asignar_usuarios')
        ->with('nomApellidos', $nomApellidos)
        ->with('roles', $roles)
        ->with('persona', $persona)
        ->with('cadena', $cadena)
        ->with('permissions', $permissions);
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
