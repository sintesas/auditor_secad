@extends('partials.card')

@extends('layout')

@section('title')
    Criterios
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('criterios') }}
<!-- Begin Modal -->
@if ($rol)
  <button type="button" onclick="document.getElementById('id1').style.display='block'"
        style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn">

@endif
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
          <div class="">
            {{-- PANEL 1 CREAR CONTROL --}}
            <div id="accordion1-1" class="collapse in">
              <div class="col-lg-12">
                <div class="table-responsive">
                  <table id="datatable1" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width: 150px;"><b>Nombre Criterio</b></th>
                        <th style="width: 150px;"><b>Proceso</b></th>
                        <th style="width: 150px;"><b>Sub-Proceso</b></th>
                        <th style="width: 120px;"><b>Acción</b></th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($criterios as $item)
                      <tr>
                        <td>{{$item->Norma}}</td>
                        <td>{{$item->Proceso}}</td>
                        <td>{{$item->SubProceso}}</td>
                        <td>
                          @if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true || $gl_perfil[24] == true)
                          <div class="col-sm-6">

                            {!! Form::open(['route' => ['criteriosAuditoria.destroy', $item->IdCriterio], 'method' => 'DELETE']) !!}

                            {!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

                            {!! Form::close() !!}
                          </div>
                        @endif
                          <div class="col-sm-6">
                            <a href="{{route('criteriosAuditoria.edit', $item->IdCriterio) }}" class="btn btn-primary btn-block editbutton">
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

        {!! Form::open(array('route' => 'criteriosAuditoria.store')) !!}

        {{ csrf_field()}}

        <div class="card">
          <div class="card-body">

            <div class="row">
               <div class="col-sm-12">
                    <div class="form-group">
                    <input type="text" class="form-control" id="Norma" name="Norma" required>
                    <label for="Norma">Norma *</label>
                    </div>
               </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="Proceso" name="Proceso" required>
                        <label for="Proceso">Proceso *</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="SubProceso" name="SubProceso" required>
                        <label for="SubProceso">Sub-Proceso *</label>
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
