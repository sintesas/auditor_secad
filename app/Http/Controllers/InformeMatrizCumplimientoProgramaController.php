<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\InformeMatrizCumplimientoPrograma;
use App\Models\SubparteBaseCertificacion;
use App\Models\SubparteDetalleBasePrograma;
use App\Models\BasesCertificacionPrograma;
use App\Models\Permiso;

class InformeMatrizCumplimientoProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::getProgramasTipo();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');

        return view ('certificacion.programasSECAD.matrizCumplimiento.tabla_matriz_cumplimiento_progama')
                ->with('programas', $programas)->with('permiso', $permiso);
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

      $normas = BasesCertificacionPrograma::join('AU_Mst_BaseCertificacion', 'AU_Mst_BaseCertificacion.IdBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
      ->leftjoin('AU_Reg_SubpartesBaseCertificacion','AU_Reg_SubpartesBaseCertificacion.idBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
      ->leftjoin('AU_Reg_SubparteDetalleBasePrograma','AU_Reg_SubparteDetalleBasePrograma.IdSubparte','=','AU_Reg_SubpartesBaseCertificacion.idSubparteBaseCertificacion')
      ->where('AU_Reg_BasesCertificacionPrograma.IdPrograma',$IdPrograma)
      ->get();

        $requsitos = InformeMatrizCumplimientoPrograma::getByPrograma($IdPrograma);

        return view ('certificacion.programasSECAD.matrizCumplimiento.tabla_matriz_cumplimiento')
        ->with('programa', $programa)
        ->with('normas', $normas)
        ->with('requsitos', $requsitos);
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
