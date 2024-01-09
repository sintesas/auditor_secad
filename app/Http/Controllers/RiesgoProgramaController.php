<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RiesgoPrograma;
use App\Models\ProgramaSeguimiento;
use App\Models\Empresa;
use App\Models\Tools;
use App\Models\Programa;
use App\Models\Permiso;
class RiesgoProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $programa = Programa::get();
      $p = new Permiso;
      $permiso = $p->getPermisos('CP');
      return view ('certificacion.programasSECAD.DificultadesServicio.riesgos_programas_ver')
              ->with('programas', $programa)->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programa = Programa::get();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.programasSECAD.DificultadesServicio.riesgos_programas_edit')
                ->with('programas', $programa)->with('permiso', $permiso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $IdPrograma)
    {
      $programa = Programa::select('AU_Reg_Programas.*','AU_Reg_DemandaPotencial.Nombre as NombreProducto')
      ->leftjoin('AU_Reg_DemandaPotencial', 'AU_Reg_DemandaPotencial.IdDemandaPotencial','=','AU_Reg_Programas.IdProductoServicio')
      ->where('AU_Reg_Programas.IdPrograma',$IdPrograma)
      ->first();

      $empresas = Empresa::get();
      return view ('certificacion.programasSECAD.DificultadesServicio.riesgos_programas_create')
              ->with('empresas', $empresas)
              ->with('programa', $programa);
    }

    public function crear(Request $request)
    {

      $programa = $request->input('programa');
      $programas = Programa::find($programa);
      // echo "<pre>";
      // dd($IdPrograma, $request);

      $riesgo = new RiesgoPrograma;
      $riesgo->idPrograma = $programa;
      $riesgo->fecha = $request->input('fecha');
      $riesgo->idEmpresa = $request->input('empresa');
      $riesgo->Tipo_originador = $request->input('Tipo_originador');
      $riesgo->NombreReg = $request->input('NombreReg');
      $riesgo->GradoReg = $request->input('GradoReg');
      $riesgo->Num_parte = $request->input('Num_parte');
      $riesgo->Num_serie = $request->input('Num_serie');
      $riesgo->Tipo_falla = $request->input('Tipo_falla');
      $riesgo->Descripcion_falla = $request->input('Descripcion_falla');
      $riesgo->Descripcion_danos = $request->input('Descripcion_danos');
      $riesgo->Danos_tripulantes = $request->input('Danos_tripulantes');
      $riesgo->Danos_terceros = $request->input('Danos_terceros');
      $riesgo->Clase_averia = $request->input('Clase_averia');
      $riesgo->Accion = $request->input('Accion');
      $riesgo->Investigacion_propuesta = $request->input('Investigacion_propuesta');
      $riesgo->Investigacion_llevada = $request->input('Investigacion_llevada');
      $riesgo->Anexo_texto = $request->input('Anexo_texto');
      $riesgo->Anexo_fecha = $request->input('Anexo_fecha');
      $riesgo->save();

      $Archivos = array();
      //$catalogImg =json_decode($pca->catalog_ilust_partes);
      if ($request->hasFile('Anexo_archivos'))
      {
          $personalPath = public_path('secad\\Riesgos\\Riesgo_' .$programas->Consecutivo.'-'.$riesgo->idRiesgoPrograma);
          if(!File::exists($personalPath)) {
              File::makeDirectory( $personalPath, 0755, true);
          }

          $files = $request->file('Anexo_archivos');
          foreach ($files as $file ) {
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $Archivos[]=$fileName;
          }

          $riesgo->Anexo_archivos = json_encode($Archivos);

      }
      else
      {
          $riesgo->Anexo_archivos = $riesgo->Anexo_archivos;

      }

      $riesgo->save();



      $notification = array(
        'message' => 'El riesgo fué creado correctamente',
        'alert-type' => 'success'
      );

      return redirect()->route('riesgoprograma.edit', $programa)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $IdPrograma)
    {

      $programa = Programa::select('AU_Reg_Programas.*','AU_Reg_DemandaPotencial.Nombre as NombreProducto')
      ->leftjoin('AU_Reg_DemandaPotencial', 'AU_Reg_DemandaPotencial.IdDemandaPotencial','=','AU_Reg_Programas.IdProductoServicio')
      ->where('AU_Reg_Programas.IdPrograma',$IdPrograma)
      ->first();

      $riesgos = RiesgoPrograma::select('AU_Reg_RiesgoPrograma.*','AU_Reg_RiesgoProgramaSeguimiento.*','AU_Reg_Empresas.NombreEmpresa')
      ->leftjoin('AU_Reg_RiesgoProgramaSeguimiento', 'AU_Reg_RiesgoProgramaSeguimiento.idRiesgo', '=','AU_Reg_RiesgoPrograma.idRiesgoPrograma' )
      ->join('AU_Reg_Empresas', 'AU_Reg_Empresas.IdEmpresa','=','AU_Reg_RiesgoPrograma.idEmpresa')
      ->where('AU_Reg_RiesgoPrograma.idPrograma',$IdPrograma )
      ->get();

      return view('certificacion.programasSECAD.DificultadesServicio.ver.riesgos_programas_ver')
                ->with('riesgos', $riesgos)
                ->with('programa', $programa);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$IdPrograma)
    {
      $programa = Programa::select('AU_Reg_Programas.*','AU_Reg_DemandaPotencial.Nombre as NombreProducto')
      ->leftjoin('AU_Reg_DemandaPotencial', 'AU_Reg_DemandaPotencial.IdDemandaPotencial','=','AU_Reg_Programas.IdProductoServicio')
      ->where('AU_Reg_Programas.IdPrograma',$IdPrograma)
      ->first();

      $riesgos = RiesgoPrograma::leftjoin('AU_Reg_RiesgoProgramaSeguimiento', 'AU_Reg_RiesgoProgramaSeguimiento.idRiesgo', '=','AU_Reg_RiesgoPrograma.idRiesgoPrograma' )
      ->where('AU_Reg_RiesgoPrograma.idPrograma',$IdPrograma )
      ->get();

      //dd($riesgos);

      return view('certificacion.programasSECAD.DificultadesServicio.edit.riesgos_programas_edit')
                ->with('riesgos', $riesgos)
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
      $programa = $request->input('programa');
      $programas = Programa::find($programa);
      // echo "<pre>";
      // dd($IdPrograma, $request);

      $riesgo = RiesgoPrograma::find($id);
      $riesgo->idPrograma = $programa;
      $riesgo->fecha = $request->input('fecha');
      $riesgo->idEmpresa = $request->input('empresa');
      $riesgo->Tipo_originador = $request->input('Tipo_originador');
      $riesgo->NombreReg = $request->input('NombreReg');
      $riesgo->GradoReg = $request->input('GradoReg');
      $riesgo->Num_parte = $request->input('Num_parte');
      $riesgo->Num_serie = $request->input('Num_serie');
      $riesgo->Tipo_falla = $request->input('Tipo_falla');
      $riesgo->Descripcion_falla = $request->input('Descripcion_falla');
      $riesgo->Descripcion_danos = $request->input('Descripcion_danos');
      $riesgo->Danos_tripulantes = $request->input('Danos_tripulantes');
      $riesgo->Danos_terceros = $request->input('Danos_terceros');
      $riesgo->Clase_averia = $request->input('Clase_averia');
      $riesgo->Accion = $request->input('Accion');
      $riesgo->Investigacion_propuesta = $request->input('Investigacion_propuesta');
      $riesgo->Investigacion_llevada = $request->input('Investigacion_llevada');
      $riesgo->Anexo_texto = $request->input('Anexo_texto');
      $riesgo->Anexo_fecha = $request->input('Anexo_fecha');

      $Archivos = array();
      //$catalogImg =json_decode($pca->catalog_ilust_partes);
      if ($request->hasFile('Anexo_archivos'))
      {
          $personalPath = public_path('secad\\Riesgos\\Riesgo_' .$programas->Consecutivo.'-'.$riesgo->idRiesgoPrograma);
          if(!File::exists($personalPath)) {
              File::makeDirectory( $personalPath, 0755, true);
          }

          $files = $request->file('Anexo_archivos');
          foreach ($files as $file ) {
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $Archivos[]=$fileName;
          }

          $riesgo->Anexo_archivos = json_encode($Archivos);

      }
      else
      {
          $riesgo->Anexo_archivos = $riesgo->Anexo_archivos;

      }

      $riesgo->save();



      $notification = array(
        'message' => 'El riesgo fué actualizado correctamente',
        'alert-type' => 'success'
      );

      return redirect()->route('riesgoprograma.edit', $programa)->with($notification);
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
