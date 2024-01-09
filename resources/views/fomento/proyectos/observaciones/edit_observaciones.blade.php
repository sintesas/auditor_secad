@extends('partials.card')

@extends('layout')

@section('title')
Editar Observación
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('observacionesControlProyectosEdit') }}
@endsection()

@section('card-content')

@section('form-tag')


{!! Form::model($ObservacionData, ['route' => ['observacionProyecto.update', $ObservacionData->IdObservacion], 'method' => 'PUT' ]) !!}

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
              <header>Editar Observación</header>
              <div class="tools">
                <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
            {{-- PANEL  UPDATE OBSERVACION --}}
            <div id="accordion1-1" class="collapse in">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" required value="{{old('Descripcion', $ObservacionData->Descripcion)}}">
                        <label for="Descripcion">Descripción</label>
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
                    <button type="button" onclick="window.location='{{ route('observacionProyecto.show', $ObservacionData->IdControlProyecto) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>

            {!! Form::close() !!}

          </div>
        </div>
        <!--end .panel -->

        {{-- END PANEL EDITAR OBSERVACION --}}

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
