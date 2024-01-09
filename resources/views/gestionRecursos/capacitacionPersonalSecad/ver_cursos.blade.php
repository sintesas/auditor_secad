@extends('partials.card')

@extends('layout')

@section('title')
	Cursos
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('cursos') }}
		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("cursos.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Nombre Curso</b></th>
							<th><b>Lugar</b></th>
							<th><b>Fecha Terminación</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cursos as $curso)
						<tr>
							<td>{{$curso->NombreCurso}}</td>
							<td>{{$curso->LugarEntidad}}</td>
							<td>{{$curso->FechaTermino}}</td>
							<td>
							
								<div class="col-sm-6">

									{!! Form::open(['route' => ['cursos.destroy', $curso->IdCurso], 'method' => 'DELETE']) !!}									

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>


								

								<div class="col-sm-6">

									<a href="{{route('cursos.edit', $curso->IdCurso) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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