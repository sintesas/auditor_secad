<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Programa;
use App\Models\VWInformeHistorialPrograma;
use App\Models\Permiso;

class InformeHistorialProgramaController extends Controller
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
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::all();
        return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programas)->with('permiso', $permiso); 
    } else{
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::getByUser($idPersonal);        
        return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programas)->with('permiso', $permiso); 
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
        $seguimientoPrograma = \DB::table('AU_Reg_ListasSeguimiento')
            ->where('dbo.AU_Reg_ListasSeguimiento.IdPrograma','=',$IdPrograma)
            ->orderBy('dbo.AU_Reg_ListasSeguimiento.IdListaSeguimiento', 'ASC')
            ->get();

        $programa = Programa::find($IdPrograma);

        $tipoPrograma = \DB::table('AU_Mst_TiposPrograma')
            ->where('dbo.AU_Mst_TiposPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
            ->select('Tipo')
            ->first();

        //dd($tipoPrograma);

        $listaActividadesPrograma = \DB::table('AU_Mst_Actividades_TipoPrograma')
                    ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                    ->orderBy('dbo.AU_Mst_Actividades_TipoPrograma.Orden','ASC')
                    ->get();

        //dd($informeHistorialPrograma);

        $totalHoras = \DB::table('AU_Reg_ListasSeguimiento')
            ->where('dbo.AU_Reg_ListasSeguimiento.IdPrograma','=',$IdPrograma)
            ->select(\DB::raw("SUM(Horas) as TotalHoras"))
            ->first();

        return view ('certificacion.programasSECAD.informes.visual_informe_historial_programa')
                    ->with('totalHoras', $totalHoras)
                    ->with('listaActividadesPrograma',$listaActividadesPrograma)
                    ->with('programa',$programa)
                    ->with('seguimientoPrograma', $seguimientoPrograma)
                    ->with('tipoPrograma',$tipoPrograma);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPrograma)
    {

        $programa = Programa::find($IdPrograma);

        $informeHistorialPrograma = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->orderBy('Orden', 'ASC')
            ->get();

        // dd($informeHistorialPrograma);

        $totalHoras = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->select(\DB::raw("SUM(Horas) as TotalHoras"))
            ->first();

        return \PDF::loadView('certificacion.programasSECAD.informes.pdf_informe_historial_programa', 
                             ['informeHistorialPrograma' => $informeHistorialPrograma, 
                             'totalHoras' => $totalHoras])
                    ->setOption('disable-smart-shrinking', false)
                    ->setOption('margin-top', '25mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '280')
                    ->setOption('page-height', '380')
                    ->download('informe_historial_programa_'.$programa->NombrePrograma.'.pdf');
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