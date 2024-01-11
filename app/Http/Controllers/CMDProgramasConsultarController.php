<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\BaseCertificacion;
use App\Models\SubPartesBaseCertificacion;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\SubparteBaseCertificacion;
use App\Models\BasesCertificacionPrograma;
use App\Models\NivelProgBaseCerti;
use App\Models\Ata;
use App\Models\Moc;
use App\Models\Permiso;

class CMDProgramasConsultarController extends Controller
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

        return view ('certificacion.cmd.ver_cmd_programas_consultar')
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
      $niveles = NivelProgBaseCerti::leftjoin('AU_Reg_ATA', 'AU_Reg_ATA.IdATA', '=', 'AU_Reg_NivelProgBaseCerti.IdATA')
      ->where('AU_Reg_NivelProgBaseCerti.IdPrograma',$IdPrograma)
      ->get();
      //dd($niveles);

      $cadena = [];
      $i=1;
      foreach ($niveles as $item) {
        $padre = $item->Padre;
        if($padre != 'ninguno' && $padre != '' && $padre != null){
          $padre = NivelProgBaseCerti::where('id_list', $padre)->first();
          $padre = $padre->TituloNivel;
        }

        $datos = [
          'nn' => $i,
          'id' => $item->id_list,
          'titulo' => $item->TituloNivel,
          'nivel' => $item->Nivel,
          'padre' => $item->Padre,
          'elemento' => $item->elemento,
          'parte' => $item->Parte,
          'cantidad' => $item->Cantidad,
          'ata' => $item->General,
          'version' => $item->Version,
          'fecha' => $item->Fecha,
          'nombre_padre' => $padre
        ];
        array_push($cadena,$datos);
        $i++;
      }
      $cadena = json_encode($cadena);

      $atas = Ata::getAta();

      return view ('certificacion.cmd.ver_cmd_control_configuracion_matriz_consulta')
              ->with('IdPrograma', $IdPrograma)
              ->with('programa', $programa)
              ->with('Niveles', $niveles)
              ->with('atas', $atas)
              ->with('cadena', $cadena);
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
