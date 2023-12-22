<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RiesgoPrograma;
use App\RiesgoProgramaSeguimiento;
use App\ProgramaSeguimiento;
use App\Empresa;
use App\Tools;
use App\Programa;

class RiesgoProgramaSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


        return redirect()->route('cmdProgramas.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $IdPrograma)
    {

      $programa = Programa::find($IdPrograma);


        return view ('certificacion.cmd.ver_cmd_control_configuracion')
                ->with('programa', $programa);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
      $riesgo = RiesgoPrograma::find($id);
      $programa = Programa::select('AU_Reg_Programas.*','AU_Reg_DemandaPotencial.Nombre as NombreProducto')
      ->leftjoin('AU_Reg_DemandaPotencial', 'AU_Reg_DemandaPotencial.IdDemandaPotencial','=','AU_Reg_Programas.IdProductoServicio')
      ->where('AU_Reg_Programas.IdPrograma',$riesgo->idPrograma)
      ->first();
      
      $empresas = Empresa::get();
      return view ('certificacion.programasSECAD.DificultadesServicio.riesgos_programas_update')
              ->with('empresas', $empresas)
              ->with('riesgo', $riesgo)
              ->with('programa', $programa);

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
      $riesgo = RiesgoPrograma::find($id);
      $programas = Programa::find($riesgo->idPrograma);
      $val_seguimiento = RiesgoProgramaSeguimiento::where('idRiesgo',$id)->first();

      if($val_seguimiento){
        $seguimiento = RiesgoProgramaSeguimiento::find($val_seguimiento->idRiesgoProgramaSeguimiento);
      }
      else{
        $seguimiento = new RiesgoProgramaSeguimiento;
      }

      $seguimiento->idRiesgo = $id;
      $seguimiento->Condicion_segura = $request->input('Condicion_segura');
      $seguimiento->Extension_productos = $request->input('Extension_productos');
      $seguimiento->Directiva_aeronavegabilidad = $request->input('Directiva_aeronavegabilidad');
      $seguimiento->Directiva_codigo = $request->input('Directiva_codigo');
      $seguimiento->Boletines = $request->input('Boletines');
      $seguimiento->Boletines_tipo = $request->input('Boletines_tipo');
      $seguimiento->Boletines_otros_irs = $request->input('Boletines_otros_irs');

      $archivos = '';
      if ($request->hasFile('Directiva_anexos'))
      {
        $personalPath = public_path('secad\\Riesgos\\Riesgo_seguimiento_directivas_' .$programas->Consecutivo.'-'.$riesgo->idRiesgoPrograma);
        if(!File::exists($personalPath)) {
            File::makeDirectory( $personalPath, 0755, true);
        }

          $file = $request->file('Directiva_anexos');
          $fileName = tools::normalizeChars($file->getClientOriginalName());
          $file->move($personalPath, $fileName);
          $archivos = $fileName;
          $seguimiento->Directiva_anexos = $archivos;

      }
      else
      {
          $seguimiento->Directiva_anexos = $seguimiento->Directiva_anexos;

      }


      $archivosboletin = "";
      //$catalogImg =json_decode($pca->catalog_ilust_partes);
      if ($request->hasFile('Boletines_anexos'))
      {
          $personalPath = public_path('secad\\Riesgos\\Riesgo_seguimiento_boletines_' .$programas->Consecutivo.'-'.$riesgo->idRiesgoPrograma);
          if(!File::exists($personalPath)) {
              File::makeDirectory( $personalPath, 0755, true);
          }

          $file = $request->file('Boletines_anexos');
          $fileName = tools::normalizeChars($file->getClientOriginalName());
          $file->move($personalPath, $fileName);
          $archivosboletin = $fileName;
          $seguimiento->Boletines_anexos = $archivosboletin;
      }
      else
      {
          $seguimiento->Boletines_anexos = $seguimiento->Boletines_anexos;

      }

      $seguimiento->save();


      $notification = array(
          'message' => 'Seguimiento guardado correctamente',
          'alert-type' => 'success'
      );


      return redirect()->route('riesgoprograma.edit', $riesgo->idPrograma)->with($notification);
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
