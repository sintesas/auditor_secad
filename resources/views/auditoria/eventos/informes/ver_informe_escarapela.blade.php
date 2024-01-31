@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Eventos
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('eventos') }}
		<!-- Begin Modal -->
		@if ($permiso->crear == 1)
		<button type="button" onclick="window.location='{{ route("evento.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif
		{{-- End modal --}}


		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Evento</b></th>
							<th><b>Fecha</b></th>
							<th><b>Lugar</b></th>
							<th><b>Horario</b></th>
							<th><b>Duración</b></th>							
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($eventos as $evento)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$evento->Evento}}</td>
							<td>{{$evento->Fecha}}</td>
							<td>{{$evento->Lugar}}</td>
							<td>{{$evento->Horario}}</td>
							<td>{{$evento->Duración}}</td>							
							<td>
								<div class="col-sm-6">
									<a   href="{{route('informeescarapelas.show', $evento->IdEvento) }}" class="btn btn-primary btn-default"><span class="fa fa-search"></span></a>

								</div>
	
							</td>
							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endif
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