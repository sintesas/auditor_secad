@extends('partials.card')

@extends('layout')

@section('title')
  informe de proyectos
@endsection()

@section('content')

@section('card-content')
@section('card-title')
    {{ Breadcrumbs::render('informeObservacionesProyectos') }}
@endsection()

@section('card-content')

<div class="total-card">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="datatable1" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><b>Nombre</b></th>
                        <th><b>Fuente</b></th>
                        <th><b>Tipo</b></th>
                        <th><b>Valor</b></th>
                        <th style="width: 120px;"><b>Acción</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectosData as $item)
                    @if ($permiso->consultar == 1)
                    <tr>
                        <td>{{$item->NombreProyecto}}</td>
                        <td>{{$item->FuenteRecurso}}</td>
                        <td>{{$item->TipoEmpresa}}</td>
                        <td>{{$item->Valor}}</td>
                        <td>
                            <div class="col-sm-6">
                                <a href="{{route('informeObservaciones.show', $item->IdControlProyecto) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div><!--end .table-responsive -->
    </div><!--end .col -->
</div>
@endsection()

@endsection()
@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
    $(document).ready(function(){
        $('#datatable1').DataTable();
    });
</script>

@endsection()
@endsection()
