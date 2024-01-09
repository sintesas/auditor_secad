@extends('partials.card')

@extends('layout')

@section('title')
	Crear Curso
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cursos.store')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_cursos')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreCurso" name="NombreCurso" required>
						<label for="IdAuditoria">Curso</label>
					</div>
				</div>				
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="LugarEntidad" name="LugarEntidad" required>
						<label for="LugarEntidad">Lugar</label>
					</div>
				</div>
				
			</div>

			<div class="row">
				<div class="col-sm-4">
						<div class="form-group">
						{{ Form::select('IdCiudades', $ciudades->pluck('NombreCiudad' , 'IdCiudades'), null, ['class' => 'form-control', 'id' => 'IdCiudades']) }}
						<label for="Ciudad">Ciudad</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required>
								<label for="FechaTermino">Fecha Terminación</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
						
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ModalidadEstudio" name="ModalidadEstudio" required>
						<label for="ModalidadEstudio">Modalidad Estudio</label>
					</div>
				</div>
				
				
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						{{ Form::select('IdTipoCurso', $tipoCurso->pluck('NombreTipoCurso' , 'IdTipoCurso'), null, ['class' => 'form-control', 'id' => 'IdTipoCurso']) }}
						<label for="IdTipoCurso">Tipo Formación</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="number" class="form-control" id="Vigente" name="Vigente" required onKeyPress="return soloNumeros(event)">
						<label for="Vigente">Vigencia (Días)</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="EstadoFormacion" name="EstadoFormacion" required>
						<label for="EstadoFormacion">Estado Formación</label>
					</div>
				</div>
				
				
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="FechaExpiracion" name="FechaExpiracion" required>
								<label for="FechaExpiracion">Fecha Expiración</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="TiempoDuracion" name="TiempoDuracion" required>
						<label for="TiempoDuracion">Duracion</label>
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
							<button type="button" onclick="window.location='{{ route("cursosformacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}


		{{-- SCRIPTS --}}

			{{-- Solo Numeros --}}
			<script type="text/javascript">
				// Solo permite ingresar numeros.
				function soloNumeros(e){
					var key = window.Event ? e.which : e.keyCode
					return (key >= 48 && key <= 57)
				}
			</script>

		@endsection()


	@endsection()


@endsection()