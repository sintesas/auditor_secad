<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubParteMatrizCumpliProg;
use App\Models\CMDRequisitos;
use App\Models\SubparteBaseCertificacion;
use App\Models\BasesCertificacionPrograma;
use App\Models\NivelProgBaseCerti;
use App\Models\Ata;
use App\Models\Programa;

class CMDControlConfiguracionController extends Controller
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
      //dd($request);
      $subparte = SubparteBaseCertificacion::find($request->input('IdSubParteMatriz'));
      $programaid = $request->input('IdPrograma');
      $cadena = json_decode($request->input('cadena'));

      $val_nivel = NivelProgBaseCerti::where('IdPrograma',$programaid)
      //->where('IdSubParte', $subparte->idSubparteBaseCertificacion)
      ->get();

      //agregar nivel

      foreach ($cadena as $item_new) {
        $sw=0;
        $idold='';
        foreach ($val_nivel as $item_old) {
          if($item_new->id==$item_old->id_list){
            $sw = 1;
            $idold = $item_old->IdNivelProgBaseCerti;
          }
        }
        if($sw==1){
          $new_element = NivelProgBaseCerti::find($idold);
        }
        else{
          $new_element = new NivelProgBaseCerti;
        }
        $new_element->IdPrograma = $programaid;
        //$new_element->IdSubParte = $request->input('IdSubParteMatriz');
        $new_element->TituloNivel = $item_new->titulo;
        $new_element->Nivel = $item_new->nivel;
        $new_element->Padre = $item_new->padre;
        $new_element->id_list = $item_new->id;
        $new_element->Active = 1;
        $new_element->save();
      }

      //eliminar nivel

      foreach ($val_nivel as $item_old) {
        $sw=0;
        foreach ($cadena as $item_new) {
          if($item_new->id==$item_old->id_list){
            $sw=1;
          }
        }
        if($sw==0){
          NivelProgBaseCerti::where('IdNivelProgBaseCerti',$item_old->IdNivelProgBaseCerti)->delete();
        }
      }
//
        // $arbol = $request->input('ckeditor');
        //
        // $arbol = str_replace('<ul>','', $arbol);
        // $arbol = str_replace('</ul>','', $arbol);
        // $arbol = str_replace('<div>','', $arbol);
        // $arbol = str_replace('</div>','', $arbol);
        // $arbol = str_replace('</li>','', $arbol);
        // $arbol = str_replace(' ','', $arbol);
        // $arbol = str_replace("\t", '', $arbol); // remove tabs
        // $arbol = str_replace("\n", '', $arbol); // remove new lines
        // $arbol = str_replace("\r", '', $arbol); // remove carriage returns
        // $arbol = trim($arbol);
        //
        // $nvieles = explode("<li>", $arbol);
        //
        // foreach($nvieles as $nivel){
        //     if($nivel != ''){
        //
        //         $requsitosCMD = new CMDRequisitos;
        //
        //         $requsitosCMD->IdSubParteMatriz = $request->input('IdSubParteMatriz');
        //         $requsitosCMD->IdPrograma = $request->input('IdPrograma');
        //         $requsitosCMD->CMDNivel = $nivel;
        //         $requsitosCMD->Arbol = $arbol;
        //         $requsitosCMD->Active = 1;
        //
        //         $requsitosCMD->save();
        //     }
        // }

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

      $val_nivel = NivelProgBaseCerti::where('IdPrograma',$IdPrograma)
      ->get();

      $cadena = [];
      $i=1;
      foreach ($val_nivel as $item) {
        $datos = [
          'nn' => $i,
          'id' => $item->id_list,
          'titulo' => $item->TituloNivel,
          'nivel' => $item->Nivel,
          'padre' => $item->Padre
        ];
        array_push($cadena,$datos);
        $i++;
      }
      $cadena = json_encode($cadena);


        return view ('certificacion.cmd.ver_cmd_control_configuracion')
                ->with('IdPrograma', $IdPrograma)
                ->with('programa', $programa)
                ->with('cadena', $cadena);
              
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$IdPrograma)
    {
        $programa = Programa::find($IdPrograma);
        $niveles = NivelProgBaseCerti::where('IdPrograma',$IdPrograma)
        ->get();

        $cadena = [];
        $i=1;
        foreach ($niveles as $item) {
          $datos = [
            'nn' => $i,
            'id' => $item->id_list,
            'titulo' => $item->TituloNivel,
            'nivel' => $item->Nivel,
            'padre' => $item->Padre
          ];
          array_push($cadena,$datos);
          $i++;
        }
        $cadena = json_encode($cadena);

        $atas = Ata::getAta();

        return view ('certificacion.cmd.ver_cmd_control_configuracion_matriz')
                ->with('IdPrograma', $IdPrograma)
                ->with('programa', $programa)
                ->with('Niveles', $niveles)
                ->with('atas', $atas)
                ->with('cadena', $cadena);
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
        dd($request, $id);
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
