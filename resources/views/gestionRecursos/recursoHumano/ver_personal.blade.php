@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Personal
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('personal') }}

		<!-- The Modal -->
		@foreach ($gbPerfil as $itemPerfil)
			@if ($itemPerfil->IdRol == 12 || $itemPerfil->IdRol == 21)
			<button type="button" onclick="window.location='{{ route("personal.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
			@endif
		@endforeach
		@endsection()

		@section('card-content')

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Grado</b></th>
							<th><b>Nombres</b></th>
							<th><b>Apellidos</b></th>
							<th><b>Cedula</b></th>
							@foreach ($perfil as $itemPerfil)
								@if ($itemPerfil->IdRol == 12 || $itemPerfil->IdRol == 21)
									<th style="width: 100px;"><b>Familiares</b></th>
									<th style="width: 100px;"><b>Cursos</b></th>
									<th style="width: 120px;"><b>Acción</b></th>
								@endif
							@endforeach
						</tr>
					</thead>
					<tbody>
						@foreach ($personales as $personal)
						<tr>
							<td>{{$personal->Abreviatura}}</td>
							<td>{{$personal->Nombres}}</td>
							<td>{{$personal->Apellidos}}</td>
							<td>{{$personal->Cedula}}</td>

							@foreach ($perfil as $itemPerfil)
								@if ($itemPerfil->IdRol == 12 || $itemPerfil->IdRol == 21)
									<td>

										<div class="col-sm-1">
											<a href="{{route('familiares.show', $personal->IdPersonal) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
										</div>

									</td>
									<td>

										<div class="col-sm-1">
											<a href="{{route('cursosPersonal.show', $personal->IdPersonal) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
										</div>

									</td>
									<td>
										<div class="col-sm-6">

											{!! Form::open(['route' => ['personal.destroy', $personal->IdPersonal], 'method' => 'DELETE']) !!}

											{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

											{!! Form::close() !!}
										</div>


										<div class="col-sm-6">

											<a href="{{route('personal.edit', $personal->IdPersonal) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

										</div>

									</td>
								@endif
							@endforeach
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->
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

@endsection()
