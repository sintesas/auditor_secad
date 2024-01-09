@extends('partials.card')

@extends('layout')

@section('title')
Informe Asistencia
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('ver_empresas_sector') }}
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Evento</b></th>
					<th><b>Lugar</b></th>
					<th><b>Fecha</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($evento as $eventos)
				<tr>
					<td>{{$eventos->Evento}}</td>
					<td>{{$eventos->Lugar}}</td>
					<td>{{$eventos->Fecha}}</td>

					<td>
						<div class="col-sm-6">
							<a href="{{route('informeasistencia.show', $eventos->IdEvento) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
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