<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\UsersLDAP;
use App\Models\DependenciasLDAP;
use App\Models\CausasRaizTareas;

class ActividadesHallazgoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = UsersLDAP::perteneceIGEFA();

        if($rol){
            $actividades = CausasRaizTareas::getAllActividades();
        }else{
            $rol = UsersLDAP::perteneceCEOAF();
            if($rol){
                $actividades = CausasRaizTareas::getAllActividades();
            }else{
                $actividades = CausasRaizTareas::getActividadesByUser();
            }
        }

        
        $name = Auth::user()->name;
        $isAdmin = Auth::user()->hasRole('administrador');

        //dd($rol, $isAdmin);

        if($isAdmin == false){
          $isAdmin = $rol;
        }



        return view('auditoria.actividadesHallazgos.ver_tablas_actividades_hallazgos')
                ->with('actividades', $actividades)
                ->with('isAdmin', $isAdmin)
                ->with('userLogueado', $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idActividad)
    {
        $actividad = CausasRaizTareas::getActividad($idActividad);

        return view('auditoria.crear_seguimiento_actividad_by_user')
                ->with('actividad', $actividad);
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
        //
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
