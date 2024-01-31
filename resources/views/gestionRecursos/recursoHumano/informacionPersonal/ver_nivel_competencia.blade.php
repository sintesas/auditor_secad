@extends('partials.card')

@extends('layout')

@section('title')
Ver Nivel Competencia
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('nivelComp') }}

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
					<th><b>Nivel Competencia</b></th>
					<th><b>Denominación</b></th>
					<th><b>Sigla</b></th>
					<th><b>Nivel Pericia</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($nivelesComp as $nivelComp)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$nivelComp->NivelCompetencia}}</td>
					<td>{{$nivelComp->Denominacion}}</td>
					<td>{{$nivelComp->Sigla}}</td>
					<td>{{$nivelComp->NivelPericia}}</td>

					<td>
					@if ($permiso->eliminar == 1)
						<div class="col-sm-6">

							{!! Form::open(['route' => ['nivelCompetencia.destroy', $nivelComp->IdNivelCompetencia], 'method' => 'DELETE']) !!}									

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
					@endif

					@if ($permiso->actualizar == 1)
						<div class="col-sm-6">

							<a href="{{route('nivelCompetencia.edit', $nivelComp->IdNivelCompetencia) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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
			<header>Crear Nivel Competencia</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'nivelCompetencia.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="NivelCompetencia" name="NivelCompetencia" required>
							<label for="NivelCompetencia">Nivel Competencia</label>
						</div>
					</div>	
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Denominacion" name="Denominacion" required>
							<label for="Denominacion">Denominación</label>
						</div>
					</div>	
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Sigla" name="Sigla" required>
							<label for="Sigla">Sigla</label>
						</div>
					</div>	
					<div class="col-sm-6">
						<div class="form-group">
							<input type="number" class="form-control" id="NivelPericia" name="NivelPericia" required onKeyPress="return soloNumeros(event)">
							<label for="NivelPericia">Nivel Pericia</label>
						</div>
					</div>	
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("nivelCompetencia.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	{!! Form::close() !!}

	<script>
		$(".delete").on("submit", function(){
			return confirm("Esta seguro que desea borrar este codigo?");
		});
	</script>

</div>
@endsection()

@endsection()

@section('addjs')
{{-- SCRIPTS --}}

<script type="text/javascript">
	// Solo permite ingresar numeros.
	function soloNumeros(e){
		var key = window.Event ? e.which : e.keyCode
		return (key >= 48 && key <= 57)
	}
</script>

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()