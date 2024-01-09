@extends('partials.card')

@extends('layout')

@section('title')
Crear Evento
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('crear_evento') }}

@endsection()

@section('form-tag')
{!! Form::open(['route' => 'evento.store']) !!}
{{ csrf_field()}}
@endsection()

<div class="card">
	<div class="card-body floating-label">
		
		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control" id="" name="" readonly="" disabled>
					<label for="">Id</label>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="Evento" name="Evento" required>
					<label for="Evento">Evento</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group date" id="demo-date-format">
						<span class="input-group-addon fa fa-calendar"></span>
						<div class="input-group-content">
							<input type="text" class="form-control" id="Fecha" name="Fecha" required>
							<label for="Fecha">Fecha</label>
						</div>
					</div>	

				</div>		
			</div>



		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<input type="text" class="form-control" id="Lugar" name="Lugar" required>
					<label for="Lugar">Lugar</label>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
					<label for="Descripcion">Descripción</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="Responsable" name="Responsable" required>
					<label for="Responsable">Responsable</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control" id="HorasTotal" name="HorasTotal" required>
					<label for="HorasTotal">Horas Total</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="DirectivaNo" name="DirectivaNo" required>
					<label for="DirectivaNo">Directiva No</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="Horario" name="Horario" required>
					<label for="Horario">Horario</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
					<input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
					<label for="Ciudad">Ciudad</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					{{ Form::select('IdTipoEvento', $tiposevento->prepend('none')->pluck('TipoEvento', 'IdTipoEvento'), null, ['class' => 'form-control', 'id' => 'IdTipoEvento']) }}
					<label for="IdTipoEvento">Tipo</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					{{ Form::select('IdClaseEvento', $clasesevento->prepend('none')->pluck('ClaseEvento', 'IdClaseEvento'), null, ['class' => 'form-control', 'id' => 'IdClaseEvento']) }}
					<label for="IdClaseEvento">Organización</label>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="Duracion" name="Duracion" required>
					<label for="Duracion">Duración</label>
				</div>
			</div>
		</div>

	</div>

	{{-- submit button --}}

	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
			</div>
			<div class="col-sm-6">
				<button type="button" onclick="window.location='{{ route("evento.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
			</div>
		</div>
	</div>
</div>	
{!! Form::close() !!}

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
	$('select').select2();
</script>
<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()