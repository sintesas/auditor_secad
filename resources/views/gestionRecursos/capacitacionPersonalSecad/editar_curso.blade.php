@extends('partials.card')

@extends('layout')

@section('title')
	Editar Curso
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($cursos, ['route' => ['cursos.update', $cursos->IdCurso], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{ Breadcrumbs::render('editar_cursos')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreCurso" name="NombreCurso" required value="{{old('NombreCurso', $cursos->NombreCurso)}}">
						<label for="IdAuditoria">Curso</label>
					</div>
				</div>				
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="LugarEntidad" name="LugarEntidad" required value="{{old('LugarEntidad', $cursos->LugarEntidad)}}">
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
								<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required value="{{old('FechaTermino', $cursos->FechaTermino)}}">
								<label for="FechaTermino">Fecha Terminación</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
						
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="ModalidadEstudio" name="ModalidadEstudio" required value="{{old('ModalidadEstudio', $cursos->ModalidadEstudio)}}">
						<label for="ModalidadEstudio">Modalidad Estudio</label>
					</div>
				</div>
				
				
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						{{ Form::select('IdTipoCurso', $tipoCurso->pluck('NombreTipoCurso' , 'IdTipoCurso'), null, ['class' => 'form-control', 'id' => 'IdTipoCurso']) }}
						<label for="IdTipoCurso">Tipo Curso</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="number" class="form-control" id="Vigente" name="Vigente" required onKeyPress="return soloNumeros(event)" value="{{old('Vigente', $cursos->Vigente)}}">
						<label for="Vigente">Vigencia (Días)</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="EstadoFormacion" name="EstadoFormacion" required value="{{old('EstadoFormacion', $cursos->EstadoFormacion)}}">
						<label for="EstadoFormacion">Estado Formación</label>
					</div>
				</div>
				
				
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="FechaExpiracion" name="FechaExpiracion" required value="{{old('FechaExpiracion', $cursos->FechaExpiracion)}}">
								<label for="FechaExpiracion">Fecha Expiración</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="TiempoDuracion" name="TiempoDuracion" required value="{{old('TiempoDuracion', $cursos->TiempoDuracion)}}">
						<label for="TiempoDuracion">Duracion</label>
					</div>
				</div>

			</div>

			{{-- submit button --}}			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("cursos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()