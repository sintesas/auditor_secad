<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $usuarios = Usuario::all();
        
        return view('admin.usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.crear_usuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = $request->get('password');
        $password_match = $request->get('password_match');

        if ($password == $password_match) {
            $db = \DB::select('select * from tb_ad_usuarios where usuario = :usuario or email = :email', array('usuario' => $request->get('usuario'), 'email' => $request->get('email')));

            if ($db != null) {
                $notification = array(
                    'message' => 'Ya existe un usuario en la Base de Datos con el mismo email', 
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }

            $user = new Usuario;
            $user->usuario = strtolower($request->get('usuario'));
            $user->password = bcrypt($password);
            $user->nombre_completo = strtoupper($request->get('nombre_completo'));
            $user->email = strtolower($request->get('email'));
            $user->activo = ($request->get('activo') == true) ? 1 : 0;
            $user->usuario_creador = \Session::get('username');
            $user->fecha_creacion = \DB::raw("GETDATE()");
            $user->save();

            if ($user->usuario_id != 0) {
                $notification = array(
                    'message' => 'El usuario se agregó correctamente', 
                    'alert-type' => 'success'
                );
                return redirect()->route('usuario.index')->with($notification);
            }
            else {
                $notification = array(
                    'message' => 'Error guardado.', 
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }
        }
        else {     
            $notification = array(
                'message' => 'Las contraseñas no coinciden.', 
                'alert-type' => 'error'
            );
            return back()->with($notification);   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);

        return view('admin.editar_usuario')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $usuario_id)
    {
        $password = $request->get('password');
        $password_match = $request->get('password_match');

        if ($password != "") {
            if ($password == $password_match) {
                $user = Usuario::find($usuario_id);
                $user->usuario = strtolower($request->get('usuario'));
                $user->password = bcrypt($password);
                $user->nombre_completo = strtoupper($request->get('nombre_completo'));
                $user->email = strtolower($request->get('email'));
                $user->activo = ($request->get('activo') == true) ? 1 : 0;
                $user->usuario_modificador = \Session::get('username');
                $user->fecha_modificacion = \DB::raw("GETDATE()");
                $user->save();

                $notification = array(
                    'message' => 'El usuario se actualizó correctamente', 
                    'alert-type' => 'success'
                );
                return redirect()->route('usuario.index')->with($notification);
            }
            else {     
                $notification = array(
                    'message' => 'Las contraseñas no coinciden.', 
                    'alert-type' => 'error'
                );
                return back()->with($notification);   
            }
        }
        else {
            $user = Usuario::find($usuario_id);
            $user->usuario = strtolower($request->get('usuario'));
            $user->nombre_completo = strtoupper($request->get('nombre_completo'));
            $user->email = strtolower($request->get('email'));
            $user->activo = ($request->get('activo') == true) ? 1 : 0;
            $user->usuario_modificador = \Session::get('username');
            $user->fecha_modificacion = \DB::raw("GETDATE()");
            $user->save();

            $notification = array(
                'message' => 'El usuario se actualizó correctamente', 
                'alert-type' => 'success'
            );
            return redirect()->route('usuario.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
