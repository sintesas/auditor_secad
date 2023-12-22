<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;

class ListasSegProgEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;
        // dd($role->givePermissionTo('edit articles'));
        // $programas= Programa::all();

        if (Auth::user()->hasRole('administrador')) {           

            $programas = Programa::getProgramasTipo();

            return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.ver_lista_seguimiento_progamas_emp')
                ->with('programas', $programas);

        }else{

            if (Auth::user()->hasRole('empresario')) {
                 $programas = Programa::getProgramasTipoByEmpresa($idEmpresa);
                 return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.ver_lista_seguimiento_progamas_emp')
                    ->with('programas', $programas);
            }

            else
            {
                $programas = Programa::getProgramasTipo();

                return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.ver_lista_seguimiento_progamas_emp')
                    ->with('programas', $programas);
            }
                       
        }        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrograma)
    {
        $programa = Programa::find($IdPrograma);
        $actividades = ActividadesTipoPrograma::getActividadesByTipoProg($programa->IdTipoPrograma);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);
        
        return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.ver_lista_seguimiento_activi_emp')
                ->with('actividades', $actividades)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('programa', $programa);
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
