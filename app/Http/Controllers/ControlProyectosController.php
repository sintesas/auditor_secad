<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ControlProyectos;
use App\Models\VWProyectos;
use App\Models\TiposFuentesRecursos;
use App\Models\TiposProyectos;
use App\Models\TiposEmpresas_proyectos;
use App\Models\TipoEstados_Proyectos;
use App\Models\Permiso;

class ControlProyectosController extends Controller
{
    public function index(){

        $controlProyectData = VWProyectos::Estado();
  
        $FuentesRecursos = TiposFuentesRecursos::Estado();
        $FuentesRecursos->prepend('None');
  
        $TiposProyectos = TiposProyectos::Estado();
        $TiposProyectos->prepend('none');
  
        $TiposEmpresas = TiposEmpresas_proyectos::Estado();
        $TiposEmpresas->prepend('none');
  
        $TipoEstadosProyectos = TipoEstados_Proyectos::Estado();
        $TipoEstadosProyectos->prepend('none');
  
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        return view('fomento.proyectos.index')
                ->with('controlProyectosData',$controlProyectData)
                ->with('FuentesRecursosData', $FuentesRecursos)
                ->with('TiposProyectosData', $TiposProyectos)
                ->with('TiposEmpresas', $TiposEmpresas)
                ->with('TipoEstadosProyectos', $TipoEstadosProyectos)->with('permiso', $permiso);
      }
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          //not used separately.
      }
  
      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          //Fecha Actual
          $hoy = getdate();
  
          // create object to holdd info
          $controlProyectData = new ControlProyectos;
  
          //Data Insert
          $controlProyectData->NombreProyecto = $request->input('NombreProyecto');
          $controlProyectData->IdFuenteRecurso = $request->input('IdFuenteRecurso');
          $controlProyectData->IdTipoProyecto = $request->input('IdTipoProyecto');
          $controlProyectData->IdTipoEmpresa = $request->input('IdTipoEmpresa');
          $controlProyectData->IdEstadoProyecto = $request->input('IdEstadoProyecto');
          $controlProyectData->Valor = $request->input('Valor');
          $controlProyectData->Dependencia = $request->input('Dependencia');
          $controlProyectData->Alianza = $request->input('Alianza');
          $controlProyectData->FechaCreado = $request->input('FechaCreado');
          $controlProyectData->FechaEjecucion = $request->input('FechaEjecucion');
          $controlProyectData->Responsable = $request->input('Responsable');
          $controlProyectData->EstadoFinanciacion = $request->input('EstadoFinanciacion');
          $controlProyectData->PendientesAdicionales = $request->input('PendientesAdicionales');
          $controlProyectData->Estado = '1';
          $controlProyectData->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
          $controlProyectData->save();
  
          return redirect()->route('controlProyectos.index');
  
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
      public function edit($IdControlProyecto)
      {
          //Data id Seleccionado
          $controlProyectData = ControlProyectos::find($IdControlProyecto);
  
          $FuentesRecursos = TiposFuentesRecursos::Estado();
          $FuentesRecursos->prepend('None');
  
          $TiposProyectos = TiposProyectos::Estado();
          $TiposProyectos->prepend('none');
  
          $TiposEmpresas = TiposEmpresas_proyectos::Estado();
          $TiposEmpresas->prepend('none');
  
          $TipoEstadosProyectos = TipoEstados_Proyectos::Estado();
          $TipoEstadosProyectos->prepend('none');
  
          return view('fomento.proyectos.edit')
                  ->with('controlProyectosData',$controlProyectData)
                  ->with('FuentesRecursosData', $FuentesRecursos)
                  ->with('TiposProyectosData', $TiposProyectos)
                  ->with('TiposEmpresas', $TiposEmpresas)
                  ->with('TipoEstadosProyectos', $TipoEstadosProyectos);
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $IdControlProyecto)
      {
          //Fecha Actual
          $hoy = getdate();
  
          $controlProyectData = ControlProyectos::find($IdControlProyecto);
  
          //Data Insert
          $controlProyectData->NombreProyecto = $request->input('NombreProyecto');
          $controlProyectData->IdFuenteRecurso = $request->input('IdFuenteRecurso');
          $controlProyectData->IdTipoProyecto = $request->input('IdTipoProyecto');
          $controlProyectData->IdTipoEmpresa = $request->input('IdTipoEmpresa');
          $controlProyectData->IdEstadoProyecto = $request->input('IdEstadoProyecto');
          $controlProyectData->Valor = $request->input('Valor');
          $controlProyectData->Dependencia = $request->input('Dependencia');
          $controlProyectData->Alianza = $request->input('Alianza');
          $controlProyectData->FechaCreado = $request->input('FechaCreado');
          $controlProyectData->FechaEjecucion = $request->input('FechaEjecucion');
          $controlProyectData->Responsable = $request->input('Responsable');
          $controlProyectData->EstadoFinanciacion = $request->input('EstadoFinanciacion');
          $controlProyectData->PendientesAdicionales = $request->input('PendientesAdicionales');
          $controlProyectData->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
          $controlProyectData->save();
  
          return redirect()->route('controlProyectos.index');
  
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($IdControlProyecto)
      {
  
          $existsObservacion = \DB::table('AU_Reg_ControlProyectos_Observaciones')->where('IdControlProyecto', $IdControlProyecto)->first();
          if(!$existsObservacion){
              // USING MODELS
              $controlProyectData = ControlProyectos::find($IdControlProyecto);
              $controlProyectData->delete();
              
              $notification = array(
                'message' => 'Proyecto eliminado correctamente',
                'alert-type' => 'success'
            );
          }
          else
          {
              $notification = array(
                  'message' => 'No se puede eliminar este proyecto ya que contiene datos de Observaciones.', 
                  'alert-type' => 'warning'
            );
          }
          return redirect()->route('controlProyectos.index')->with($notification);
      }
}
