<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\RolPrivilegio;
use App\Models\UsuarioRol;

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
    public function update(Request $request, $rol_privilegio_id)
    {
        $rolprivilegio = RolPrivilegio::find($rol_privilegio_id);
    
        // Actualiza los campos según los datos del formulario
        $rolprivilegio->modulo = $request->input('modulo');
        $rolprivilegio->nombre_pantalla = $request->input('nombre_pantalla');
        $rolprivilegio->consultar = ($request->get('consultar') == true) ? 1 : 0;
        $rolprivilegio->crear = ($request->get('crear') == true) ? 1 : 0;
        $rolprivilegio->actualizar = ($request->get('actualizar') == true) ? 1 : 0;
        $rolprivilegio->eliminar = ($request->get('eliminar') == true) ? 1 : 0;
        $rolprivilegio->activo = ($request->get('activo') == true) ? 1 : 0;
        // Actualiza otros campos según sea necesario
    
        // Guarda los cambios
        $rolprivilegio->save();
    
        // Redirige con un mensaje de éxito
        return redirect()->route('rolprivilegio.indice', $rolprivilegio->rol_id)->with('success', 'Rol Privilegio actualizado correctamente');
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

    

    public function eliminarPrivilegios(Request $request) {
        $rol_privilegio_id = $request->get('rol_privilegio_id');
    
        try {
            // Obtener el último rol_privilegio_id de la tabla tb_ad_roles_privilegios
            $ultimoRolPrivilegioId = \DB::table('tb_ad_roles_privilegios')->max('rol_privilegio_id');
    
            // Actualizar registros relacionados en UsuarioRol
            \DB::table('tb_ad_usuarios_roles')
                ->where('rol_privilegio_id', $rol_privilegio_id)
                ->update(['rol_privilegio_id' => $ultimoRolPrivilegioId]);
    
            // Eliminar el registro en RolPrivilegio
            \DB::table('tb_ad_roles_privilegios')->where('rol_privilegio_id', $rol_privilegio_id)->delete();
    
            $response = json_encode(array('mensaje' => 'Fue eliminado exitosamente.', 'id' => $rol_privilegio_id, 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);
    
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json(array('tipo' => -1, 'mensaje' => $e->getMessage()));
        }
    }
    
    
    
    

}
