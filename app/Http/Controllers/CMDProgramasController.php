<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\BaseCertificacion;
use App\Models\SubPartesBaseCertificacion;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\SubparteBaseCertificacion;
use App\Models\BasesCertificacionPrograma;
use App\Models\Moc;
use App\Models\Permiso;

class CMDProgramasController extends Controller
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

        return view ('certificacion.cmd.ver_cmd_programas')
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

        $subPartes = SubParteMatrizCumpliProg::getByPrograma($IdPrograma);

        $mocs = Moc::all();

        $counter = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', '=', $IdPrograma)->count();

        $list = BasesCertificacionPrograma::join('AU_Mst_BaseCertificacion', 'AU_Mst_BaseCertificacion.IdBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
        ->leftjoin('AU_Reg_SubpartesBaseCertificacion','AU_Reg_SubpartesBaseCertificacion.idBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
        ->where('AU_Reg_BasesCertificacionPrograma.IdPrograma',$IdPrograma)
        ->get();

          //dd($list);

        return view ('certificacion.cmd.ver_cmd_matriz_sub')
                ->with('programa', $programa)
                ->with('subPartes', $subPartes)
                ->with('mocs', $mocs)
                ->with('list', $list)
                ->with('counter', $counter);


        // $programa = Programa::find($IdPrograma);
        // $baseCerti = BaseCertificacion::find($programa->IdBaseCertificacion);
        // //$subPartes = SubPartesBaseCertificacion::getByBaseCertificacion($programa->IdBaseCertificacion);
        // $subPartes = SubParteMatrizCumpliProg::getByPrograma($IdPrograma);
        // $mocs = Moc::all();

        // return view ('certificacion.cmd.ver_cmd_matriz')
        //         ->with('programa', $programa)
        //         ->with('baseCerti', $baseCerti)
        //         ->with('subPartes', $subPartes)
        //         ->with('mocs', $mocs);
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
