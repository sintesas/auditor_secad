@extends('partials.card')

@extends('layout')

@section('title')
Control Proyectos
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('controlProyectos') }}
<!-- Begin Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'"
      style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn">
  <span class="fa fa-plus"></span></button>
{{-- End modal --}}

<!-- Section Dowload-->

<!-- END  Section Dowload-->

@endsection()

@section('card-content')

<div class="col-lg-12">
  <div class="table-responsive">
    <!-- BEGIN STRUCTURE  -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel-group" id="accordion1">
          <div class="card panel">
            <div class="card-head expanded" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
              <header>Control Proyectos</header>
              <div class="tools">
                <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
            {{-- PANEL 1 CREAR CONTROL --}}
            <div id="accordion1-1" class="collapse in">


              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="datatable1" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th><b>Nombre</b></th>
                        <th><b>Tipo Proyecto</b></th>
                        <th><b>Empresa</b></th>
                        <th><b>Estado Actual</b></th>
                        <th><b>Valor</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Acción</b></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($controlProyectosData as $item)
                      <tr>
                        <td>{{$item->NombreProyecto}}</td>
                        <td>{{$item->TipoProyecto}}</td>
                        <td>{{$item->TipoEmpresa}}</td>
                        <td>{{$item->EstadoProyecto}}</td>
                        <td>{{$item->Valor}}</td>
                        <td>
                          <a href="{{route('observacionProyecto.show', $item->IdControlProyecto) }}" class="btn btn-default btn-group-xs">
                            <span class="fa fa-plus-square"></span>
                          </a>
                        </td>
                        <td>
                          <div class="col-sm-6">

                            {!! Form::open(['route' => ['controlProyectos.destroy', $item->IdControlProyecto], 'method' => 'DELETE']) !!}

                            {!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

                            {!! Form::close() !!}
                          </div>
                          <div class="col-sm-6">
                            <a href="{{route('controlProyectos.edit', $item->IdControlProyecto) }}" class="btn btn-primary btn-block editbutton">
                              <div class="gui-icon"><i class="fa fa-pencil"></i></div>
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!--end .table-responsive -->
              </div>
              <!--end .col -->
            </div>
            {!! Form::close() !!}
          </div>
        </div>
        <!--end .panel -->
      </div>
      <!--end .panel-group -->
    </div>
    <!--end .col -->
  </div>
  <!--end .row -->
  <!-- END STRUCTURE -->
</div>
<!--end .table-responsive -->

{{-- ////////////////////////// --}}

{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

  <div class="modal-content" style="width:60%;">

    <div class="card-head style-primary">
      <header>Crear Nuevo Proyecto</header>
      <span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'" class="close">x</span>
    </div>

    <div class="card">
      <div class="card-body floating-label">

        {!! Form::open(array('route' => 'controlProyectos.store')) !!}

        {{ csrf_field()}}

        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-sm-9">
                <div class="form-group">
                  <input type="text" class="form-control" id="NombreProyecto" name="NombreProyecto" required>
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
                  <input type="text" class="form-control" id="Dependencia" name="Dependencia" required>
                  <label for="Dependencia">Dependecia</label>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <input type="number" class="form-control" id="Valor" name="Valor" required min="0">
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
                  <input type="text" class="form-control" id="Alianza" name="Alianza" required>
                  <label for="Dependecia">Alianza</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="input-group date">
                    <div class="input-group-content">
                      <input type="text" class="form-control" id="FechaCreado" name="FechaCreado" required>
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
                      <input type="text" class="form-control" id="FechaEjecucion" name="FechaEjecucion" required>
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
                  <input class="form-control" id="Responsable" name="Responsable" required> </input>
                  <label for="Responsable">Responsable</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" type="text" name="EstadoFinanciacion" id="EstadoFinanciacion" required>
                  <label for="EstadoFinanciacion">Estado Financiación</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" type="text" name="PendientesAdicionales" id="PendientesAdicionales" required>
                  <label for="PendientesAdicionales">Pendientes Adicionales</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--Acciones--}}
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" style="" class="btn btn-info btn-block">Crear</button>
          </div>
          <div class="col-sm-6">
            <button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

{{-- END CREATE MODAL --}}

</center>

{!! Form::close() !!}

@endsection()

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#datatable1').DataTable();
  });
</script>

@endsection()

@endsection()
