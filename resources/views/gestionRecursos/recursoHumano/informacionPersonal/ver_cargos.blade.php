@extends('partials.card')

@extends('layout')

@section('title')
Ver Cargos
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('cargos') }}

<!-- The Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Área</b></th>
					<th><b>Cargo</b></th>
					<th><b>Categoría</b></th>
					<th><b>Cuerpo</b></th>
					<th><b>Dotacion</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cargos as $cargo)
				<tr>
					<td>{{$cargo->AreaCargo}}</td>
					<td>{{$cargo->Cargo}}</td>
					<td>{{$cargo->Categoria}}</td>
					<td>{{$cargo->Cuerpo}}</td>
					<td>{{$cargo->Dotacion}}</td>

					<td>
						
						<div class="col-sm-6">

							{!! Form::open(['route' => ['cargos.destroy', $cargo->IdCargo], 'method' => 'DELETE']) !!}									

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>


						

						<div class="col-sm-6">

							<a href="{{route('cargos.edit', $cargo->IdCargo) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
						
					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Crear Cargo	</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'cargos.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="AreaCargo" name="AreaCargo" required>
							<label for="NombreCargo">Area Cargo</label>
						</div>
					</div>	
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="Cargo" name="Cargo" required>
							<label for="Cargo">Cargo</label>
						</div>
					</div>							
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Categoria" name="Categoria" required>
							<label for="Categoria">Categoría</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Cuerpo" name="Cuerpo" required>
							<label for="Cuerpo">Cuerpo</label>
						</div>
					</div>	
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Dotacion" name="Dotacion" required>
							<label for="Dotacion">Dotacion</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("cargos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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
	<script type="text/javascript">
		// Solo permite ingresar numeros.
		function soloNumeros(e){
			var key = window.Event ? e.which : e.keyCode
			return (key >= 48 && key <= 57)
		}
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