<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\InformeInspeccion;
use App\Models\Auditoria;
use App\Models\TipoInforme;

class InformeInspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //29/04/2020
      /*$idPersonal = Auth::user()->IdPersonal;
      // dd($role->givePermissionTo('edit articles'));
      // $programas= Programa::all();

      if (Auth::user()->hasRole('administrador')) {
          $informesInspeccion = InformeInspeccion::getInformes();
          return view ('auditoria.ver_informe_inspeccion')->with('informesInspeccion', $informesInspeccion);
      }else{
          $informesInspeccion = InformeInspeccion::getInformesByUser($idPersonal);
          return view ('auditoria.ver_informe_inspeccion')->with('informesInspeccion', $informesInspeccion);
      }*/

      $informesInspeccion = InformeInspeccion::getInformes();
          return view ('auditoria.ver_informe_inspeccion')->with('informesInspeccion', $informesInspeccion);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //   $idPersonal = Auth::user()->IdPersonal;

          $Auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
          $Auditorias->prepend('None');

        //   if (Auth::user()->hasRole('administrador')) {
        //       //Set Dropdown Auditoria
        //       $Auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
        //       $Auditorias->prepend('None');  
             
        //   }else{
        //       //Set Dropdown Auditoria
        //       $Auditorias = Auditoria::getByUser($idPersonal);
        //       $Auditorias->prepend('None'); 
        //   }

          //Set Dropdown TipoInforme
          $TipoInformes = TipoInforme::all(['IdTipoInforme', 'NombreTipo']);
          $TipoInformes->prepend('None');         
          return view ('auditoria.crear_informe_inspeccion')
                 ->with('Auditorias', $Auditorias) 
                 ->with('TipoInformes', $TipoInformes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $informeInspeccion = new InformeInspeccion;
       // store info        
       $informeInspeccion->IdAuditoria = $request->input('IdAuditoria');       
       $informeInspeccion->FechaInicio = $request->input('FechaInicio');       
       $informeInspeccion->IdTipoInforme = $request->input('IdTipoInforme');
       $informeInspeccion->ActividaDesarr = $request->input('ActividaDesarr');       
       $informeInspeccion->AspectosRelev = $request->input('AspectosRelev');
       $informeInspeccion->OportuMejora = $request->input('OportuMejora');
       $informeInspeccion->Conclusiones = $request->input('Conclusiones');
       $informeInspeccion->TotalNoConfNuevas = $request->input('TotalNoConfNuevas');
       $informeInspeccion->TotalNoConfRepet = $request->input('TotalNoConfRepet');
       $informeInspeccion->TotalOportuMejora = $request->input('TotalOportuMejora');
       $informeInspeccion->Activo = 1; 
       $informeInspeccion->save();
       
       return redirect()->route('informeInspeccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdCrearInforme)
    {
        // $idPersonal = Auth::user()->IdPersonal;
        // $informeInspeccion = InformeInspeccion::find($IdCrearInforme);

        $Auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
        $Auditorias->prepend('None');

        // if (Auth::user()->hasRole('administrador')) {
        //     //Set Dropdown Auditoria
        //     $Auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
        //     $Auditorias->prepend('None');  
           
        // }else{
        //     //Set Dropdown Auditoria
        //     $Auditorias = Auditoria::getByUser($idPersonal);
        //     $Auditorias->prepend('None'); 
        // }

         //Set Dropdown TipoInforme
        $TipoInformes = TipoInforme::all(['IdTipoInforme', 'NombreTipo']);
        $TipoInformes->prepend('None');         
        return view ('auditoria.editar_informe_inspeccion')
               ->withinformeInspeccion($informeInspeccion)
               ->with('Auditorias', $Auditorias) 
               ->with('TipoInformes', $TipoInformes);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdCrearInforme)
    {        
       // info 
       $informeInspeccion = InformeInspeccion::find($IdCrearInforme);      
       
       $informeInspeccion->IdAuditoria = $request->input('IdAuditoria');       
       $informeInspeccion->FechaInicio = $request->input('FechaInicio');       
       $informeInspeccion->IdTipoInforme = $request->input('IdTipoInforme');
       $informeInspeccion->ActividaDesarr = $request->input('ActividaDesarr');       
       $informeInspeccion->AspectosRelev = $request->input('AspectosRelev');
       $informeInspeccion->OportuMejora = $request->input('OportuMejora');
       $informeInspeccion->Conclusiones = $request->input('Conclusiones');
       $informeInspeccion->TotalNoConfNuevas = $request->input('TotalNoConfNuevas');
       $informeInspeccion->TotalNoConfRepet = $request->input('TotalNoConfRepet');
       $informeInspeccion->TotalOportuMejora = $request->input('TotalOportuMejora');
       $informeInspeccion->Activo = 1; 
       $informeInspeccion->save();
       
       return redirect()->route('informeInspeccion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdCrearInforme)
    {
        $informeInspeccion = InformeInspeccion::find($IdCrearInforme);
        $informeInspeccion->delete();
        
        return redirect()->route('informeInspeccion.index');
    }

    //Obtener total conformidades
    public function getTotalAnotacionesAll(Request $request, $IdAuditoria){
        if($request->ajax())
        {

            $sql = "SELECT  top 1
	
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '' END ) AS totalNoConformidadNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '' END ) AS totalNoConformidadRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '1' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '' END ) AS totalNoConformidadAdicionada,
                                    
                    SUM(CASE WHEN IdTipoAnotacion = '2' THEN 1 ELSE '' END ) AS totalOptMejora,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '' END ) AS totalOptMejoraNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '' END  ) AS totalOptMejoraRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '2' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '' END ) AS totalOptMejoraAdicionada,
                            
                    SUM(CASE WHEN IdTipoAnotacion = '3' THEN 1 ELSE '' END ) AS totalOrdenes,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '' END ) AS totalOrdenesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '' END ) AS totalOrdenesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '3' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '' END ) AS totalOrdenesAdicionada,
                        
                    SUM(CASE WHEN IdTipoAnotacion = '5' THEN 1 ELSE '' END ) AS totalRecomendaciones,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '1' THEN 1 ELSE '' END ) AS totalRecomendacionesNueva,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '2' THEN 1 ELSE '' END ) AS totalRecomendacionesRepetida,
                    SUM(CASE WHEN IdTipoAnotacion = '5' AND IdEnUnaAnotacion = '3' THEN 1 ELSE '' END ) AS totalRecomendacionesAdicionada,
                    
                    SUM(CASE WHEN IdTipoAnotacion = '6' THEN 1 ELSE '' END ) AS totalRequerimientos
                                        
                    FROM AU_Reg_Anotaciones
                                                    
                    WHERE IdAuditoria = '$IdAuditoria'";

            $total = \DB::select($sql);

            return response()->json($total);
        }
    }
}