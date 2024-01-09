@extends('partials.card')

@extends('layout')

@section('title')
Ver Escialidades Aeronautica de Certificacion EAC
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('eac') }}
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Especialidad</b></th>
					<th><b>Código</b></th>
					<th style="width: 120px;"><b>Contenido Tematico</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($especialidades as $especialidad)
				<tr>
					<td>{{$especialidad->Especialidad}}</td>
					<td>{{$especialidad->Codigo}}</td>

					<td>
						
						<div class="col-sm-1">
							<a href="{{route('contenidoTematico.show', $especialidad->IdEspecialidadCertificacion) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						</div>

					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
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