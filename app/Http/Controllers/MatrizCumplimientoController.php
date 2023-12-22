<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\BaseCertificacion;
use App\Models\BasesCertificacionPrograma;
use App\Models\SubPartesBaseCertificacion;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\SubparteBaseCertificacion;
use App\Models\SubparteDetalleBasePrograma;
use App\Models\Moc;
use App\Models\Tools;

class MatrizCumplimientoController extends Controller
{
    public function index()
    {
        $programas = Programa::getProgramasTipo();

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_progamas')
                ->with('programas', $programas);
    }


    public function create()
    {
        //
    }


    public function store(Request $req)
    {

        //understand where to begin the loop



        // $currentIdSuparte = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $req->IdPrograma)->first();


        // $last_record = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $req->IdPrograma)->orderBy('IdSubparteMatriz', 'desc')->get();


        // $shit = $req->IdSubParteMatriz;

        // foreach ($req->IdPrograma as $key => $v) {

        //     SubParteMatrizCumpliProg::firstOrNew(

        //         ['IdSubParteMatriz', $req->IdSubParteMatriz [$key], ],

        //         ['IdSubParteMatriz' => $req->IdSubParteMatriz [$key],
        //         'CodigoRquisito' => $req->CodigoRquisito [$key],
        //         'NombreRequisito' => $req->NombreRequisito [$key],
        //         'DescripcioRequisito' => $req->DescripcioRequisito [$key],
        //         'GuiaAplicable' =>$req->GuiaAplicable [$key],
        //         ]);

        // }

        // key = arrayindex -> and value is equal to the value that comes along with the index to the right


            foreach ($req->IdSubParteMatriz as $key => $v) {

                SubParteMatrizCumpliProg::whereIn('IdSubParteMatriz', [$v])
                ->update([
                'CodigoRquisito' => $req->CodigoRquisito [$key],
                'NombreRequisito' => $req->NombreRequisito [$key],
                'DescripcioRequisito' => $req->DescripcioRequisito [$key],
                'GuiaAplicable' => $req->GuiaAplicable [$key]
                ]);



            }


        // foreach ($req->IdSubParteMatriz as $key => $v) {
        //     \DB::table('AU_Reg_SubParteMatrizCumpliProg')
        //     ->where('IdSubParteMatriz', $req->IdSubparteMatriz[$key])
        //     ->update(['CodigoRquisito' => $req->CodigoRquisito[$key],
        //               'NombreRequisito' => $req->NombreRequisito[$key],



        // ]);
        // }


         $notification = array(

                'message' => 'Informacion Añadida',
                'alert-type' => 'success'
            );



            return back()->with($notification);


        // foreach ($req->input('IdPrograma') as $key => $v) {
        //     $data = array(
        //         'IdSubParteMatriz' => $req->IdSubParteMatriz,
        //         'CodigoRquisito' => $req->CodigoRquisito [$key],
        //         'NombreRequisito' => $req->NombreRequisito [$key],
        //         'DescripcioRequisito' => $req->DescripcioRequisito [$key],
        //         'GuiaAplicable' => $req->GuiaAplicable [$key],
        //     );

        //     SubParteMatrizCumpliProg::insert($data);
        // }




    }

    public function show($IdPrograma)
    {
       $programa = Programa::find($IdPrograma);

       //$subPartes = SubParteMatrizCumpliProg::getByPrograma($IdPrograma);
//dd($programa);
       $mocs = Moc::all();

       $counter = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', '=', $IdPrograma)->count();

       $normas = BasesCertificacionPrograma::join('AU_Mst_BaseCertificacion', 'AU_Mst_BaseCertificacion.IdBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
       ->leftjoin('AU_Reg_SubpartesBaseCertificacion','AU_Reg_SubpartesBaseCertificacion.idBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
       ->leftjoin('AU_Reg_SubparteDetalleBasePrograma','AU_Reg_SubparteDetalleBasePrograma.IdSubparte','=','AU_Reg_SubpartesBaseCertificacion.idSubparteBaseCertificacion')
       ->where('AU_Reg_BasesCertificacionPrograma.IdPrograma',$IdPrograma)
       ->get();

       //dd($normas, $capitulos);
       // echo "<pre>";
       // dd($normas);
       return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento')
                ->with('normas', $normas)
                ->with('programa', $programa)
                //->with('subPartes', $subPartes)
                ->with('mocs', $mocs)
                ->with('counter', $counter);

    }


    public function edit($id)
    {
        //
    }

    public function update_anexos(Request $request, $id)
    {
        //dd($request, $id);
        $partecertiprogram = SubparteBaseCertificacion::find($id);
        $detalle = SubparteDetalleBasePrograma::where('IdPrograma', $request->input('programa'))
        ->where('IdSubparte', $id)
        ->first();

        if ($detalle) {
          $info_parte = SubparteDetalleBasePrograma::find($detalle->idSubparteDetalleBasePrograma);
        }
        else{
          $info_parte = new SubparteDetalleBasePrograma;
        }
        $info_parte->IdPrograma = $request->input('programa');
        $info_parte->IdSubparte = $id;

        $programa = Programa::find($request->input('programa'));
        $base = BaseCertificacion::find($partecertiprogram->idBaseCertificacion);

        $info_parte->mocs = $request->input('jsmocs');

        $catalogImg = array();
        //$catalogImg =json_decode($pca->catalog_ilust_partes);
        if ($request->hasFile('anexos'))
        {
            $personalPath = public_path('secad\\Matriz de cumplimiento\\Evidencias programa '.$programa->Consecutivo.'\\Base '.$partecertiprogram->idBaseCertificacion.' - '.$base->Referencia.' - '.$id);
            //dd($personalPath);
            if(!\File::exists($personalPath)) {
                \File::makeDirectory( $personalPath, 0755, true);
            }

            $files = $request->file('anexos');
            foreach ($files as $file ) {
              $fileName = Tools::normalizeChars($file->getClientOriginalName());
              $file->move($personalPath, $fileName);
              $catalogImg[]=$fileName;
            }

            $info_parte->evidencia = json_encode($catalogImg);
        }
        else
        {
            $info_parte->evidencia = $info_parte->evidencia;

        }
        $info_parte->save();

        $notification = array(
          'message' => 'La norma se ha actualizado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('matrizCumplimiento.show', $request->input('programa'))->with($notification);
    }

    public function update_aprobacion(Request $request, $id)
    {
      $partecertiprogram = SubparteBaseCertificacion::find($id);
      $detalle = SubparteDetalleBasePrograma::where('IdPrograma', $request->input('programa'))
      ->where('IdSubparte', $id)
      ->first();

      if ($detalle) {
        $info_parte = SubparteDetalleBasePrograma::find($detalle->idSubparteDetalleBasePrograma);
      }
      else{
        $info_parte = new SubparteDetalleBasePrograma;
      }

      $info_parte->IdPrograma = $request->input('programa');
      $info_parte->IdSubparte = $id;

      $info_parte->aprobado = $request->input('aprobado');
      $info_parte->observaciones = $request->input('observaciones');
      $info_parte->nombresyapellidos = $request->input('nombresyapellidos');
      $info_parte->fecha = $request->input('fecha');
      if($request->input('aprobado') == 'SI'){
        $usuario = \Auth::user()->name;
        $info_parte->firma = $usuario;
      }
      else {
        $info_parte->firma = '';
      }

      $info_parte->save();

      $notification = array(
        'message' => 'La norma se ha actualizado correctamente',
        'alert-type' => 'success'
      );

      return redirect()->route('matrizCumplimiento.show', $request->input('programa'))->with($notification);
    }


    public function update(Request $request, $IdSubParteMatriz)
    {
        //
    }


    public function destroy($IdSubParteMatriz)
    {
        $subPartMatriz = SubParteMatrizCumpliProg::find($IdSubParteMatriz);


        $exists = \DB::table('AU_Reg_MocsSubParteMatriz')->where('IdSubParteMatriz', $IdSubParteMatriz)->first();

        if(!$exists){

            $subPartMatriz->delete();
            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
            );
        }
        else
        {
            $notification = array(
                'message' => 'No se puede eliminar esta Base de Certificacion ya que esta asiganada a un Programa y pueden afectar su proceso de certificación',
                'alert-type' => 'warning'
            );
        }

        return redirect()->route('matrizCumplimiento.show', $subPartMatriz->IdPrograma)->with($notification);

    }
}
