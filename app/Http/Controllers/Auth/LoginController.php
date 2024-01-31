<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Menu;
use App\Models\Usuario;
use App\Models\UsuarioMenu;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view("auth.login");
    }

    public function login(Request $request) {
        $opc = 0;

        $credentials = $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required'],
        ]);
 
        if (\Auth::attempt($credentials)) {
            $user = \Auth::user();

            if ($user->activo == 1) {
                $m_menu = new Menu;
                $m_usuariomenu = new UsuarioMenu;

                if (\DB::select('select * from vw_ad_usuarios_roles_privilegios where usuario_id = :id', array('id' => $user->usuario_id)) != null) {
                    $opc = 1;
                }
                else {
                    $opc = 2;
                }

                $data = array();
                $data['usuario_id'] = $user->usuario_id;
                $data['usuario'] = $user->usuario;
                $data['nombre_completo'] = $user->nombre_completo;
                $data['email'] = strtolower($user->email);
                $data['menus'] = $m_menu->get_menu_id($m_usuariomenu->getUsuarioMenu($user->usuario_id, $opc));

                $results = json_decode(json_encode($data['menus']));

                $menu = collect($results, true);

                session(['username' => $user->usuario]);
                \Session::put('menus', $menu);

                return redirect()->intended('dashboard');
            }
            else {
                alert()->error('Error', "El usuario '" . $user->usuario . "' no se encuentra activo.")->persistent(true,false)->showConfirmButton('Aceptar', '#3085d6');
                return view("auth.login");
            }
        }
        else {
            alert()->error('Error', 'Usuario y/o Contraseña no son correctos.')->persistent(true,false)->showConfirmButton('Aceptar', '#3085d6');
            return redirect('/');
        }        
    }

    public function logout(){
        \Auth::logout();

        session()->forget('username');
        session()->forget('menus');
        session()->flush();
        
        return redirect('/');
    }
}
