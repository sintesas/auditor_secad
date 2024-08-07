<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\Permiso;

class RolController extends Controller
{
    public function __construct() {
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $roles = Rol::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('AD');

        return view('admin.roles', compact('roles'))->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crear_rol');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $db = \DB::select('select * from tb_ad_roles where rol = :rol', array('rol' => $request->get('rol')));

        if ($db != null) {
            $notification = array(
                'message' => 'Ya existe un rol en la Base de Datos', 
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $rol = new Rol;
        $rol->rol = strtoupper($request->get('rol'));
        $rol->activo = ($request->get('activo') == true) ? 1 : 0;
        $rol->usuario_creador = \Session::get('username');
        $rol->fecha_creacion = \DB::raw("GETDATE()");
        $rol->save();

        if ($rol->rol_id != 0) {
            $notification = array(
                'message' => 'El rol se agregó correctamente', 
                'alert-type' => 'success'
            );
            return redirect()->route('rol.index')->with($notification);
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
    public function edit($rol_id)
    {
        $rol = Rol::find($rol_id);

        return view('admin.editar_rol')->with('rol', $rol);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $rol_id)
    {
        $rol = Rol::find($rol_id);
        $rol->rol = strtoupper($request->get('rol'));
        $rol->activo = ($request->get('activo') == true) ? 1 : 0;
        $rol->usuario_modificador = \Session::get('username');
        $rol->fecha_modificacion = \DB::raw("GETDATE()");
        $rol->save();

        $notification = array(
            'message' => 'El rol actualizó correctamente', 
            'alert-type' => 'success'
        );
        return redirect()->route('rol.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
