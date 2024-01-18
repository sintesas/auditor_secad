<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RolPrivilegio;
use App\Models\Usuario;
use App\Models\UsuarioMenu;
use App\Models\UsuarioRol;
use App\Models\Permiso;

class UsuarioRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios', compact('usuarios')); // Envia la variable 'permiso'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function asignarRol($usuario_id)
    {
        $u = Usuario::find($usuario_id);
        $usuario = $u->usuario;

        $m = new UsuarioRol;
        $uroles = $m->getUsuarioRolById($usuario_id);

        $p = new RolPrivilegio;
        $upriv = $p->get_roles_privilegios_activos();

        return view('admin.asignar_rol')
            ->with('usuario', $usuario)
            ->with('usuario_id', $usuario_id)
            ->with('uroles', $uroles)
            ->with('upriv', $upriv);
    }

    public function crearAsignar(Request $request) {
        $m = new UsuarioMenu;
        $umenu = $m->crud_usuarios_menu($request);
        $uroles = json_decode($request->get('uroles'));

        foreach ($uroles as $item) {
            $m = new UsuarioRol;
            $m->usuario_id = $item->usuario_id;
            $m->rol_id = $item->rol_id;
            $m->rol_privilegio_id = $item->rol_privilegio_id;
            $m->usuario_creador = \Session::get('username');
            $m->fecha_creacion = \DB::raw('GETDATE()');
            $m->save();
        }

        if ($umenu[0]->id != 0) {
            return response()->json(array('status' => true, 'mensaje' => 'Fue creado exitosamente.', 'id' => $umenu[0]->id));
        }
        else {
            return response()->json(array('status' => false, 'mensaje' => 'Error guardado.'));
        }
    }

    public function eliminarAsignar($usuario_rol_id) {
        $urol = UsuarioRol::find($usuario_rol_id);
        $usuario_id = $urol->usuario_id;
        
        try {
            $urol->delete();

            if ($urol) {
                \DB::select('exec pr_actualizar_usuario_menu ?,?', [ $usuario_id, \Session::get('username') ]);  
                $response = json_encode(array('mensaje' => 'Fue eliminado exitosamente.', 'id' => $usuario_id, 'tipo' => 0), JSON_NUMERIC_CHECK);
                $response = json_decode($response);

                return response()->json($response, 200);
            }
        }
        catch (\Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e));
        }
    }
}
