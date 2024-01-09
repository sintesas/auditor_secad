@extends('partials.card')

@extends('layout')

@section('title')
Editar Proyecto
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('edit') }}
@endsection()

@section('card-content')

@section('form-tag')


{!! Form::model($controlProyectosData, ['route' => ['controlProyectos.update', $controlProyectosData->IdControlProyecto], 'method' => 'PUT' ]) !!}

{{ csrf_field()}}

@endsection


<div class="col-lg-12">
  <div class="table-responsive">
    <!-- BEGIN STRUCTURE  -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel-group" id="accordion1">
          <div class="card panel">
            <div class="card-head expanded" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
              <header>Editar Proyecto</header>
              <div class="tools">
                <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
            {{-- PANEL  UPDATE PROYECTO --}}
            <div id="accordion1-1" class="collapse in">
              <div class="card">
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-9">
                      <div class="form-group">
                        <input type="text" class="form-control" id="NombreProyecto" name="NombreProyecto" required value="{{old('NombreProyecto', $controlProyectosData->NombreProyecto)}}">
                        <label for="NombreProyecto">Nombre del Proyecto</label>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        {{ Form::select('IdFuenteRecurso', $FuentesRecursosData->pluck('FuenteRecurso' , 'IdFuenteRecurso'), null, ['required' ,'class' => 'form-control', 'id' => 'IdFuenteRecurso']) }}
                        <label for="IdFuenteRecurso">Fuente Recurso</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        {{Form::select('IdTipoProyecto', $TiposProyectosData->pluck('TipoProyecto', 'IdTipoProyecto'), null, ['required' ,'class' => 'form-control', 'id' => 'IdTipoProyecto']) }}
                        <label for="IdTipoConvenio">Tipo Proyecto</label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        {{Form::select('IdTipoEmpresa', $TiposEmpresas->pluck('TipoEmpresa', 'IdTipoEmpresa'), null, ['required' ,'class' => 'form-control', 'id' => 'IdTipoEmpresa'])}}
                        <label for="IdTipoEmpresa">Empresa</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <div class="form-group">
                        <input type="text" class="form-control" id="Dependencia" name="Dependencia" required value="{{old('Dependencia', $controlProyectosData->Dependencia)}}">
                        <label for="Dependencia">Dependecia</label>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <input type="number" class="form-control" id="Valor" name="Valor" required min="0" value="{{old('Valor', $controlProyectosData->Valor)}}">
                        <label for="Valor">Valor</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        {{Form::select('IdEstadoProyecto', $TipoEstadosProyectos->pluck('EstadoProyecto', 'IdEstadoProyecto'), null, ['required' ,'class' => 'form-control' , 'id' => 'IdEstadoProyecto' ])}}
                        <label for="IdEstadoProyecto">Estado Actual</label>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="text" class="form-control" id="Alianza" name="Alianza" required value="{{old('Alianza', $controlProyectosData->Alianza)}}">
                        <label for="Dependecia">Alianza</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-content">
                            <input type="text" class="form-control" id="FechaCreado" name="FechaCreado" required value="{{old('FechaCreado', $controlProyectosData->FechaCreado)}}">
                            <label for="FechaCreado">Fecha Creado</label>
                          </div>
                          <span class="input-group-addon"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-content">
                            <input type="text" class="form-control" id="FechaEjecucion" name="FechaEjecucion" required value="{{old('FechaEjecucion', $controlProyectosData->FechaEjecucion)}}">
                            <label for="FechaEjecucion">Fecha Ejecución Planeada</label>
                          </div>
                          <span class="input-group-addon"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" id="Responsable" name="Responsable" required value="{{old('Responsable', $controlProyectosData->Responsable)}}"> </input>
                        <label for="Responsable">Responsable</label>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="text" name="EstadoFinanciacion" id="EstadoFinanciacion" required value="{{old('EstadoFinanciacion', $controlProyectosData->EstadoFinanciacion)}}">
                        <label for="EstadoFinanciacion">Estado Financiación</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input class="form-control" type="text" name="PendientesAdicionales" id="PendientesAdicionales" required value="{{old('PendientesAdicionales', $controlProyectosData->PendientesAdicionales)}}">
                        <label for="PendientesAdicionales">Pendientes Adicionales</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Acciones-->
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
                  </div>
                  <div class="col-sm-6">
                    <button type="button" onclick="window.location='{{ route("controlProyectos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>

            {!! Form::close() !!}

          </div>
        </div>
        <!--end .panel -->

        {{-- END PANEL EDITAR PROYECTO --}}

      </div>
      <!--end .panel-group -->
    </div>
    <!--end .col -->
  </div>
  <!--end .row -->
  <!-- END STRUCTURE -->
</div>
<!--end .table-responsive -->
@endsection()
