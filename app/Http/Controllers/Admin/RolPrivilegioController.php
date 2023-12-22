<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\RolPrivilegio;

class RolPrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $privilegio = new RolPrivilegio;
        $privilegio->rol_id = $request->get('rol_id');
        $privilegio->num_pantalla = ($request->get('num_pantalla') == 0) ? null : $request->get('num_pantalla');
        $privilegio->modulo = $request->get('modulo');
        $privilegio->nombre_pantalla = $request->get('nombre_pantalla');
        $privilegio->consultar = ($request->get('consultar') == true) ? 1 : 0;
        $privilegio->crear = ($request->get('crear') == true) ? 1 : 0;
        $privilegio->actualizar = ($request->get('actualizar') == true) ? 1 : 0;
        $privilegio->eliminar = ($request->get('eliminar') == true) ? 1 : 0;
        $privilegio->activo = ($request->get('activo') == true) ? 1 : 0;
        $privilegio->usuario_creador = \Session::get('username');
        $privilegio->fecha_creacion = \DB::raw("GETDATE()");
        $privilegio->save();

        if ($privilegio->rol_privilegio_id != 0) {
            $notification = array(
                'message' => 'El rol privilegio se agregó correctamente', 
                'alert-type' => 'success'
            );
            return redirect()->route('rolprivilegio.indice', $privilegio->rol_id)->with($notification);
        }
        else {
            $notification = array(
                'message' => 'Error guardado.', 
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
    public function edit($rol_privilegio_id)
    {
        $rolprivilegio = RolPrivilegio::find($rol_privilegio_id);

        $num_pantalla = $rolprivilegio->num_pantalla == null ? 0 : $rolprivilegio->num_pantalla;

        $modulos = \DB::select('exec pr_get_modulos');

        return view('admin.editar_rol_privilegio')
            ->with('rolprivilegio', $rolprivilegio)
            ->with('num_pantalla', $num_pantalla)
            ->with('modulos', $modulos);
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

    public function getRolPrivilegiosById($rol_id)
    {
        $rol = Rol::find($rol_id);
        $privilegios = \DB::select('select * from vw_ad_roles_privilegios where rol_id = :id order by rol_privilegio_id', array('id' => $rol_id));

        return view('admin.rol_privilegios')->with('privilegios', $privilegios)
            ->with('rol_id', $rol_id)
            ->with('rol', $rol->rol);
    }

    public function createRolPrivilegio($rol_id)
    {
        $modulos = \DB::select('exec pr_get_modulos');

        return view('admin.crear_rol_privilegio')
            ->with('rol_id', $rol_id)
            ->with('modulos', $modulos);
    }
}
