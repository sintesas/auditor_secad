<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CREATEPDF AS PDF;


use App\Models\DemandaPotencial;
use App\Models\PlanCertificacionAnual;
use App\Models\NotasPCA;
use App\Models\NotasProductoAeronautico;

class PlanCertificacionController extends Controller
{
    public function index()
  {
      $pca = \DB::table('AU_Reg_PlanCertificacionAnual')->get();
      return view ('certificacion.planCertificacionAnual.ver_certificacion')->with('pca', $pca);
  }

  public function notas($id)
  {
    $notas = NotasPCA::where('id_PCA',$id)->get();
    return view ('certificacion.planCertificacionAnual.notas_certificacion')
    ->with('notas', $notas);
  }
  public function aprobarnota($id)
  {
    $usuario = Auth::user()->name;
    $nota = NotasPCA::find($id);
    $nota->aprobo = $usuario;
    $nota->save();

    $notas = NotasPCA::where('id_PCA',$nota->id_PCA)->get();

    $notification = array(
      'message' => 'La nota para el PCA se ha aprobado correctamente',
      'alert-type' => 'success'
    );

    //dd($producto);
    return redirect()->route('PlanCertificacion.notas', $nota->id_PCA)->with($notification);

    return view ('certificacion.planCertificacionAnual.notas_certificacion')
    ->with('notas', $notas);
  }

  public function edit($idPca)
  {

      $pca_info = \DB::table('AU_Reg_planCertificacionAnual')
      ->where('id',$idPca)
      ->get();

      $year = round(date('Y'));
      return view ('certificacion.planCertificacionAnual.editar_certificacion')
          ->with('pca_info', $pca_info[0])
          ->with('year', $year);
  }

  public function create()
  {
      $year = round(date('Y'));

      return view ('certificacion.planCertificacionAnual.crear_certificacion')
        ->with('year', $year);
  }

  public function store(Request $request)
  {

      //dd($request);
      $pca = new PlanCertificacionAnual;

      $pca->anio = $request->input('Anio');
      $pca->edicion = $request->input('Edicion');
      $pca->editores = '';
      $pca->Definiciones = $request->input('Definiciones');
      $pca->Abreviaturas = $request->input('Abreviaturas');
      $pca->introduccion = $request->input('introduccion');
      $pca->objeto = $request->input('objeto');
      $pca->alcance = $request->input('alcance');
      $pca->Preliminar = $request->input('Preliminar');
      $pca->contacto = $request->input('contacto');
      $pca->Activo = 1;
      $pca->save();
      //dd($producto);
      return redirect()->route('PlanCertificacion.index');
  }

  public function update(Request $request, $Id)
  {
      date_default_timezone_set("America/Bogota");
      $pca = PlanCertificacionAnual::find($Id);

      $pca->anio = $request->input('Anio');
      $pca->edicion = $request->input('Edicion');
      $pca->editores = '';
      $pca->Definiciones = $request->input('Definiciones');
      $pca->Abreviaturas = $request->input('Abreviaturas');
      $pca->introduccion = $request->input('introduccion');
      $pca->objeto = $request->input('objeto');
      $pca->alcance = $request->input('alcance');
      $pca->Preliminar = $request->input('Preliminar');
      $pca->contacto = $request->input('contacto');
      $pca->save();

      $usuario = Auth::user()->name;

      $notaPCA = new NotasPCA;
      $notaPCA->usuario = $usuario;
      $notaPCA->id_PCA = $pca->id;
      $notaPCA->nota = $request->input('Nota');
      $notaPCA->fecha = date('d/m/Y');
      $notaPCA->save();

      $notification = array(
        'message' => 'El PCA se ha actualizado correctamente',
        'alert-type' => 'success'
      );

      //dd($producto);
      return redirect()->route('PlanCertificacion.index')->with($notification);
  }

  public function destroy($Id)
  {
      // USING MODELS
      $pca = PlanCertificacionAnual::find($Id);
      $pca->activo = 0;
      $pca->save();

      $notification = array(
        'message' => 'El PCA se ha inactivado correctamente',
        'alert-type' => 'success'
      );

      return redirect()->route('PlanCertificacion.index')->with($notification);
    }

    public function show($id)
    {
        // USING MODELS
        $pca = PlanCertificacionAnual::find($Id);
        $pca->activo = 1;
        $pca->save();

        $notification = array(
          'message' => 'El PCA se ha activado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('PlanCertificacion.index')->with($notification);
    }
    //

    public function pdf(Request $request){

      $productos = \DB::table('AU_Reg_DemandaPotencial')
      ->join('AU_Mst_Unidades','AU_Mst_Unidades.IdUnidad', '=', 'AU_Reg_DemandaPotencial.IdUnidad')
      ->join('AU_Mst_Aeronaves','AU_Mst_Aeronaves.IdAeronave','=','AU_Reg_DemandaPotencial.IdAeronave')
      ->leftJoin('AU_Reg_DetalleProductoAeronauticoPCA', 'AU_Reg_DetalleProductoAeronauticoPCA.id_producto', '=', 'AU_Reg_DemandaPotencial.IdDemandaPotencial')
      ->where('AU_Reg_DetalleProductoAeronauticoPCA.id_pca',$request->pca)
      ->get();

      $pca = PlanCertificacionAnual::find($request->pca);

      $definiciones = json_decode($pca->Definiciones);
      $abreviaturas = json_decode($pca->Abreviaturas);

      $notas = [];

      $notasPCA = NotasPCA::where('id_PCA',$request->pca)->get();

      foreach ($notasPCA as $note) {
        $info = [
          'fecha' => $note->fecha,
          'concepto' => 'ACTUALIZACIÓN EN PCA',
          'nota' => $note->nota,
          'usuario' => $note->usuario,
          'aprobo' => $note->aprobo
        ];
        array_push($notas, $info);
      }

      foreach ($productos as $item) {
        $notasPro = NotasProductoAeronautico::where('id_ProductoAeronautico',$item->IdDemandaPotencial)->get();
        foreach ($notasPro as $note) {
          $info = [
            'fecha' => $note->fecha,
            'concepto' => 'ACTUALIZACIÓN EN PRODUCTO',
            'nota' => $note->nota,
            'usuario' => $note->usuario,
            'aprobo' => $note->aprobo
          ];
          array_push($notas, $info);
        }
      }
      //dd($pca);
      $data ='PRUEBA MELA';
      $pdf = PDF::loadView('plantillaspdf.pca', ['productos' => $productos,'pca' => $pca, 'definiciones' => $definiciones, 'abreviaturas' => $abreviaturas, 'notas' => $notas, 'data' => $data]);
      $fecha = date('dmy');

      $pdf->setPaper('A4', 'portrait');
      return $pdf->download('PORTAFOLIO PCA FAC SECAD '.$pca->anio.'- EDICION'.$pca->edicion.'-'.$fecha.'.pdf');

    }
    public function pruebahtml(Request $request){
      //var_dump('que onda');
      $prueba = Auth::user()->id;
      //dd($prueba);
      $productos = \DB::table('AU_Reg_DemandaPotencial')
      ->join('AU_Mst_Unidades','AU_Mst_Unidades.IdUnidad', '=', 'AU_Reg_DemandaPotencial.IdUnidad')
      ->join('AU_Mst_Aeronaves','AU_Mst_Aeronaves.IdAeronave','=','AU_Reg_DemandaPotencial.IdAeronave')
      ->leftJoin('AU_Reg_DetalleProductoAeronauticoPCA', 'AU_Reg_DetalleProductoAeronauticoPCA.id_producto', '=', 'AU_Reg_DemandaPotencial.IdDemandaPotencial')
      ->where('AU_Reg_DetalleProductoAeronauticoPCA.id_pca',$request->pca)
      ->get();

      $pca = PlanCertificacionAnual::find($request->pca);

      $definiciones = json_decode($pca->Definiciones);
      $abreviaturas = json_decode($pca->Abreviaturas);
      $notas = [];

      $notasPCA = NotasPCA::where('id_PCA',$request->pca)->get();

      foreach ($notasPCA as $note) {
        $info = [
          'fecha' => $note->fecha,
          'concepto' => 'ACTUALIZACIÓN EN PCA',
          'nota' => $note->nota,
          'usuario' => $note->usuario,
          'aprobo' => $note->aprobo
        ];
        array_push($notas, $info);
      }

      foreach ($productos as $item) {
        $notasPro = NotasProductoAeronautico::where('id_ProductoAeronautico',$item->IdDemandaPotencial)->get();
        foreach ($notasPro as $note) {
          $info = [
            'fecha' => $note->fecha,
            'concepto' => 'ACTUALIZACIÓN EN PRODUCTO',
            'nota' => $note->nota,
            'usuario' => $note->usuario,
            'aprobo' => $note->aprobo
          ];
          array_push($notas, $info);
        }
      }


      // echo '<pre>';
      // dd($productos, $notas, $definiciones);

      $data ='PRUEBA MELA';
      return view ('plantillaspdf.pca')
      ->with('productos', $productos)
      ->with('pca', $pca)
      ->with('notas', $notas)
      ->with('definiciones', $definiciones)
      ->with('abreviaturas', $abreviaturas);
      //return $pdf->download('invoice.pdf');

      /*$pdf = App::make('dompdf.wrapper');
      $pdf->loadHTML('<h1>Test</h1>');
      return $pdf->stream();*/
    }
}
