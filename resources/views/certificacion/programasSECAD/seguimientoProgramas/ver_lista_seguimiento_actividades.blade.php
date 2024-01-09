@extends('partials.card')

@extends('layout')

@section('title')
Actividades Tipos Programa
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('actividadesSeguimiento', $programa->IdPrograma) }}

@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<h4><strong>Programa:</strong> {{$programa->Consecutivo}} / <strong>Tipo Programa:</strong> {{$tipoPrograma->Tipo}}</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="display: none;"><b>Id</b></th>							
					<th><b>Actividad</b></th>
					<th><b>Responsable</b></th>
					<th style="width: 120px;"><b>Evidencias</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($actividades as $actividad)
				<tr>
					<td style="display: none;">{{$actividad->IdActividad}}</td>
					<td>{{$actividad->Actividad}}</td>
					<td>{{$actividad->Responsable}}</td>
					
					<td>						
						<div class="col-sm-6">
							<a href="{{route('seguimientoActividades.show', $actividad->IdActividad . '&' . $programa->IdPrograma) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
						</div>

						

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div><!--end .table-responsive -->
</div><!--end .col -->

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