@extends('partials.card')

@extends('layout')

@section('title')
	Informe de Inspección
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('informeinspeccion') }}
		<!-- Begin Modal -->
		<button type="button" onclick="window.location='{{ route("informeInspeccion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		{{-- End modal --}}


		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Codigo Auditoria</b></th>
							<th><b>Fecha de Inicio</b></th>
							<th><b>Tipo de Informe</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($informesInspeccion as $informeInspeccion)
						<tr>
							<td>{{$informeInspeccion->Codigo}}</td>
							<td>{{$informeInspeccion->FechaInicio}}</td>
							<td>{{$informeInspeccion->NombreTipo}}</td>
							<td>
								@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true)
								<div class="col-sm-6">

									{!! Form::open(['route' => ['informeInspeccion.destroy', $informeInspeccion->IdCrearInforme], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>
							@endif


								<div class="col-sm-6">

									<a href="{{route('informeInspeccion.edit', $informeInspeccion->IdCrearInforme) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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
