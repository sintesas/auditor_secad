<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\Permiso;

class ListaSeguimientoProgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $nombreCompleto = auth()->user()->nombre_completo;


    
    $idPersonal = \DB::table('AUFACVW_PersonalHH')->where('NombreCompleto', $nombreCompleto)->value('IdPersonal');
    $todosprogramas =  \DB::table('AUFACVW_PersonalHH')->where('IdPersonal', $idPersonal)->value('TodosProgramas');
    if ($todosprogramas == 1) {
        $programas = Programa::getProgramasTipo();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_lista_seguimiento_progamas')
        ->with('programas', $programas)->with('permiso', $permiso);
  } else{
      $p = new Permiso;
      $permiso = $p->getPermisos('CP');
      $programas = Programa::getByUser($idPersonal);        
      return view ('certificacion.programasSECAD.seguimientoProgramas.ver_lista_seguimiento_progamas')
      ->with('programas', $programas)->with('permiso', $permiso);
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
        
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_lista_seguimiento_actividades')
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
