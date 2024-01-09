@extends('partials.card')

@extends('layout')

@section('title')
  Informe Observaciones
@endsection()

@section('content')

@section('card-content')
@section('card-title')
  {{ Breadcrumbs::render('informeObservacionesProyectosVisual') }}
@endsection()

@section('card-content')

<div class="total-card">
  <div class="row encabezadoPlanInspeccion">
    <!-- titulo Formulario -->
    <div class="col-xs-12 text-center">
      <h2><strong>Historial Proyecto</strong></h2>
      <div>
          <h4><strong>"{{$dataProyecto[0]->NombreProyecto}}"</strong></h4>
      </div>
    </div>
  </div>

  <div class="col-lg-12 text-left">
    <div class="table-responsive">
      <table id="datatable1" class="table table-striped table-hover">
        <thead>
          <tr>
            <th style="width: 120px;"><b>Fecha</b></th>
            <th><b>Observación</b></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($observacionesData as $item)
          <tr>
            <td>{{$item->Created_at}}</td>
            <td>{{$item->Descripcion}}</td>
          </tr>
          @empty
          <tr>
            <td colspan="2" class="text-center"><span>No hay datos para mostrar</span></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <!--end .table-responsive -->
    @if($observacionesData != null && $observacionesData != "[]")
        <a href="{{route('informeObservaciones.edit', $dataProyecto[0]->IdControlProyecto) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
    @endif
  </div>
  <!--end .col -->
</div>
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
