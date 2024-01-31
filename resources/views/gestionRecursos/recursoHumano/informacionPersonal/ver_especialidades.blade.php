@extends('partials.card')

@extends('layout')

@section('title')
Ver Especialidades
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('especialidades') }}

<!-- The Modal -->
@if ($permiso->crear == 1)
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Cuerpo</b></th>
					<th><b>Nombre Especialidad</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($especialidades as $especialidad)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$especialidad->NombreCuerpo}}</td>
					<td>{{$especialidad->NombreEspecialidad}}</td>

					<td>
					@if ($permiso->eliminar == 1)
						<div class="col-sm-6">

							{!! Form::open(['route' => ['especialidades.destroy', $especialidad->IdEspecialidad], 'method' => 'DELETE']) !!}									

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
					@endif
					@if ($permiso->actualizar == 1)
						<div class="col-sm-6">

							<a href="{{route('especialidades.edit', $especialidad->IdEspecialidad) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					@endif
					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Crear Especialidad	</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'especialidades.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdCuerpo', $cuerpos->pluck('NombreCuerpo', 'IdCuerpo'), null, ['class' => 'form-control', 'id' => 'IdCuerpo']) }}
							<label for="IdCuerpo">Cuerpo</label>
						</div>
					</div>	
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="NombreEspecialidad" name="NombreEspecialidad" required>
							<label for="NombreEspecialidad">Nombre Especialidad</label>
						</div>
					</div>	
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("especialidades.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	{!! Form::close() !!}
	<script type="text/javascript">
		$('select').select2();
	</script>
	<script>
		$(".delete").on("submit", function(){
			return confirm("Esta seguro que desea borrar este codigo?");
		});
	</script>

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