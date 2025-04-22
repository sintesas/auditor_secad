<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BaseCertificacion;
use App\Models\BasesCertificacionPrograma;
use App\Models\VistaBaseCertificacionPrograma;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\SubPartesBaseCertificacion;
use App\Models\PlanAuditoriaNormasCriterios;

use App\Models\SubparteBaseCertificacion;
use App\Models\SubparteDetalleBasePrograma;
use App\Models\Programa;
use App\Models\UsersLDAP;

class BasesCertificacionProgramaController extends Controller
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
        $IdPrograma = $request->input('IdPrograma');
        $bases = BasesCertificacionPrograma::where('IdPrograma', $IdPrograma)->get();
        $cadena = json_decode($request->input('basecerti'));
        // echo "<pre>";
        //   dd($request, $cadena, $bases);

        //eliminar base del programa

        foreach($bases as $item){
          $sw=0;
          foreach ($cadena as $item2) {
            if($item->IdBaseCertificacion == $item2->id){
              $sw=1;
            }
          }
          if($sw==0){
            BasesCertificacionPrograma::find($item->IdBaseCertPrograma)->delete();
          }
        }
        //agregar base del programa

        foreach($cadena as $item){
          $sw=0;
          foreach ($bases as $item2) {
            if($item->id == $item2->IdBaseCertificacion){
              $sw=1;
            }
          }
          if($sw==0){
            $new_item = new BasesCertificacionPrograma;
            $new_item->IdPrograma = $IdPrograma;
            $new_item->IdBaseCertificacion = $item->id;
            $new_item->save();

          }
        }

        $criterios = \DB::select("select * from AUFACVW_BaseCertificacion_Programa where IdPrograma = ?", [$IdPrograma]);
        $auditoriaprograma = \DB::table('vw_AU_Reg_AuditoriaProgramas')
        ->where('IdPrograma', $IdPrograma)
        ->first();
       
        if ($auditoriaprograma) {
          $id_auditoriaprog = $auditoriaprograma->id_auditoriaprog;
      
          $planauditoria = \DB::select(
              "select * from VWAU_Reg_AuditoriaProgramasPlanAuditoria where id_auditoriaprog = ?",
              [$id_auditoriaprog]
          );
      } else {
          $planauditoria = [];
      }

      
        if ($planauditoria) {
          
          foreach ($planauditoria as $planauditoriaItem) {
              $id_planauditoria = $planauditoriaItem->id_planauditoria;
      
              
              $criterios = \DB::select("select id_planauditoriocriterio from AU_Reg_AuditoriaProgramasPlanAuditoriaCriterios where id_planauditoria = ?", [$id_planauditoria]);
      
             
              if ($criterios) {
                 
                  PlanAuditoriaNormasCriterios::where('id_planauditoria', $id_planauditoria)
                      ->whereNotNull('IdBaseCertificacion')
                      ->delete();
      
                  
                  $baseCertificaciones = \DB::select("select IdBaseCertificacion from AUFACVW_BaseCertificacion_Programa where IdPrograma = ?", [$IdPrograma]);
                  
                  foreach ($criterios as $criterio) {
                      foreach ($baseCertificaciones as $baseCertificacion) {
                          
                          $existingRecord = PlanAuditoriaNormasCriterios::where('id_planauditoria', $id_planauditoria)
                              ->where('IdBaseCertificacion', $baseCertificacion->IdBaseCertificacion)
                              ->first();
                  
                          
                          if (!$existingRecord) {
                              $NormasCriterios = new PlanAuditoriaNormasCriterios;
                              $NormasCriterios->id_planauditoria = $id_planauditoria;
                              $NormasCriterios->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
                              $NormasCriterios->save();
                          }
                      }
                  }
              }else{
                $baseCertificaciones = \DB::select("select IdBaseCertificacion from AUFACVW_BaseCertificacion_Programa where IdPrograma = ?", [$IdPrograma]);

    
    if ($baseCertificaciones) {
        foreach ($baseCertificaciones as $baseCertificacion) {
           
            $existingRecord = PlanAuditoriaNormasCriterios::where('id_planauditoria', 0) 
                ->where('IdBaseCertificacion', $baseCertificacion->IdBaseCertificacion)
                ->first();

            
            if (!$existingRecord) {
                $NormasCriterios = new PlanAuditoriaNormasCriterios;
                $NormasCriterios->id_planauditoria = $id_planauditoria;  
                $NormasCriterios->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
                $NormasCriterios->save();
            }
        }
    }
              }
          }
      }



        // $exists = \DB::table('AU_Reg_BasesCertificacionPrograma')->where('IdPrograma', $IdPrograma)->first();
        // $basesCertificacion = BaseCertificacion::all();

        //Valida si exietn datos den la tabla
        // if($exists or !$exists){
        //     foreach($basesCertificacion as $baseCertificacion){
        //         $check = $request->input('bsp_'.$baseCertificacion->IdBaseCertificacion);
        //         $bcp = new BasesCertificacionPrograma;
        //         $bcp->IdPrograma = $IdPrograma;
        //         $bcp->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
        //         $IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
        //
        //         if ($check == 'on'){
        //
        //
        //
        //             $existsAnota = \DB::table('AUFACVW_BaseCertificacion_Programa')->where('IdPrograma', $IdPrograma)->where('IdBaseCertificacion', $IdBaseCertificacion)->first();
        //             if(!$existsAnota)
        //             {
        //
        //               $bcp->save();
        //
        //
        //             //Trae todas las subpartes de la norma
        //             $subPartesBaseCert = SubPartesBaseCertificacion::getByBaseCertificacion($baseCertificacion->IdBaseCertificacion);
        //
        //             //Guarda todas las subpartes de la norma
        //                 foreach($subPartesBaseCert as $subParteBaseCert){
        //                     $subParPro = new SubParteMatrizCumpliProg;
        //
        //                     $subParPro->IdPrograma = $IdPrograma;
        //                     $subParPro->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
        //                     $subParPro->NombreBaseCert = $baseCertificacion->Nombre;
        //                     $subParPro->Referencia = $baseCertificacion->Referencia;
        //                     $subParPro->SubParte = $subParteBaseCert->SubParte;
        //                     $subParPro->Estado = 'En Proceso';
        //                     $subParPro->Activo = 1;
        //
        //                     $subParPro->save();
        //                     return redirect()->back();
        //                 }
        //             }
        //
        //         }
        //         else {
        //
        //
        //
        //
        //
        //          $existsDat = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->get();
        //             if(count($existsDat)>0)
        //             {
        //                 $exists = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->where('Estado','En Proceso')->first();
        //                 $existsAnota = \DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->where('Estado','Null')->first();
        //                 if(!$existsAnota and !$existsAnota)
        //                 {
        //                     $IdBasProg = BasesCertificacionPrograma::getByProgramas($IdPrograma,$IdBaseCertificacion)->first();
        //
        //                     if($IdBasProg)
        //                     {
        //                         $basCertPro = BasesCertificacionPrograma::find($IdBasProg->IdBaseCertPrograma);
        //                         $basCertPro->delete();
        //                     }
        //                     //return redirect()->back();
        //                 }
        //                 //dd($existsDat);
        //                 else
        //                 {
        //                     $notification = array(
        //                         'message' => 'No es Posible Retirar Alguno de los chequeos porque tiene información asociada a la matriz de cumplimiento',
        //                         'alert-type' => 'Error'
        //                     );
        //
        //                 }
        //             }
        //         }
        //     }
        //
        //     $subParPro = new SubParteMatrizCumpliProg;
        //
        //     $subParPro->IdPrograma = $IdPrograma;
        //     $subParPro->SubParte = 'Control Configuración';
        //     $subParPro->Activo = 1;
        //
        //     $subParPro->save();
        //     //dd($exists);
        // }


        // else
        // {
        //     $mocsSaved = MocsSubParteMatriz::getMocsSubsBySubparte($idSubParteMatriz);

        //     foreach($mocsSaved as $mocsave)
        //     {
        //         $moc = MocsSubParteMatriz::find($mocsave->IdMocSubparte);
        //         $moc->delete();
        //     }

        //     foreach($mocs as $moc){
        //         $check = $request->input('moc_'.$moc->IdMOC);
        //         if ($check == 'on'){

        //             $mocsub = new MocsSubParteMatriz;

        //             $mocsub->IdMOC = $moc->IdMOC;
        //             $mocsub->IdSubParteMatriz = $idSubParteMatriz;

        //             $mocsub->save();
        //         }
        //     }
        // }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


      /*  $basesCertificacion = BaseCertificacion::all();
        $basesCertificacionProg = BasesCertificacionPrograma::getByPrograma($IdPrograma);
*/
        return redirect('/programa')->with($notification);

//
        /*return view ('programasSecad.controlProgramas.ver_BaseCertPrograma')
                ->with('basesCertificacion', $basesCertificacion)
                ->with('basesCertificacionProg', $basesCertificacionProg)
                ->with('IdPrograma', $IdPrograma);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrograma)
    {
        //$basesCertificacion = VistaBaseCertificacionPrograma::getByPrograma($IdPrograma);
        //$basesCertificacion =VistaBaseCertificacionPrograma::orderBy('IdBaseCertificacion', 'asc')->distinct()->get();
        $basesCertificacion = BaseCertificacion::orderBy('Nombre', 'ASC')->get();
        $programa = Programa::find($IdPrograma);
        $normas = BasesCertificacionPrograma::join('AU_Mst_BaseCertificacion', 'AU_Mst_BaseCertificacion.IdBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
        ->where('AU_Reg_BasesCertificacionPrograma.IdPrograma',$IdPrograma)
        ->get();
        // echo "<pre>";
        // dd($normas);

        $cadena = [];
        $i=1;
        foreach ($normas as $norma) {
          $datos = [
            'nn'  => $i,
            'id' => $norma->IdBaseCertificacion,
            'texto' => $norma->Nombre.' | '.$norma->Referencia
          ];
          array_push($cadena, $datos);
          $i++;
        }

        $cadena = json_encode($cadena);

        return view('programasSecad.controlProgramas.ver_BaseCertPrograma')
                ->with('basesCertificacion', $basesCertificacion)
                ->with('IdPrograma', $IdPrograma)
                ->with('normas', $normas)
                ->with('cadena', $cadena)
                ->with('programa', $programa);
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
