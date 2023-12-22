<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Programa;
use App\Models\InformeLAFR212;
use App\Models\ActividadesInformeLAFR212;
use App\Models\ObservacionesLAFR212;
use App\Models\Tools;
use App\Models\TipoPrograma;

class ObservacionesProgramaLAFR212Controller extends Controller
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

        if (Auth::user()->hasRole('administrador')) {
            $programas = Programa::all();
            return view ('certificacion.programasSECAD.seguimientoProgramas.ver_observacionesLAFR212Progamas')->with('programa', $programas);          
        }else{

            if (Auth::user()->hasRole('empresario')) {
                 $programas = Programa::getProgramasTipoByEmpresa($idEmpresa);
                 return view ('certificacion.programasSECAD.seguimientoProgramas.ver_observacionesLAFR212Progamas')->with('programa', $programas);
            }
            else
            {
                $programas= Programa::getByUser($idPersonal);

                return view ('certificacion.programasSECAD.seguimientoProgramas.ver_observacionesLAFR212Progamas')->with('programa', $programas);
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
        $observaciones = ObservacionesLAFR212::getByIdprograma($IdPrograma);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);
        
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_InformeObservacionesLAFR212Progamas')
                ->with('observaciones', $observaciones)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('programa', $programa);
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
        $observaciones = ObservacionesLAFR212::getByIdprograma($IdPrograma);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);

        // return view ('certificacion.programasSECAD.seguimientoProgramas.pdf_InformeObservacionesLAFR212Progamas')
        //         ->with('observaciones', $observaciones)
        //         ->with('programa', $programa);

        return \PDF::loadView('certificacion.programasSECAD.seguimientoProgramas.pdf_InformeObservacionesLAFR212Progamas', 
                             ['observaciones' => $observaciones, 
                             'programa' => $programa])
                    ->setOption('disable-smart-shrinking', false)
                    ->setOption('margin-top', '25mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '280')
                    ->setOption('page-height', '380')
                    ->download('informe_observaciones_'.$programa->IdPrograma.'.pdf');
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
