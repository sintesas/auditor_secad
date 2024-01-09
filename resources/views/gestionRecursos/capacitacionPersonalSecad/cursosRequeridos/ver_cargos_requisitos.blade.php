
@extends('partials.card')

@extends('layout')

@section('title')
	Editar Requisitos Cargos
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($cargo, ['route' => ['requisitosCargo.update', $cargo->IdCargo], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{-- {{Breadcrumbs::render('editar_cargosReq')}} --}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="Educacion" name="Educacion" required>{{old('Educacion', $cargo->Educacion)}}</textarea>
						<label for="Educacion">Educacion</label>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<textarea class="form-control" id="ExperienciaLaboral" name="ExperienciaLaboral" required>{{old('ExperienciaLaboral', $cargo->ExperienciaLaboral)}}</textarea>
						<label for="ExperienciaLaboral">Experiencia Laboral</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<textarea class="form-control" id="Conocimiento" name="Conocimiento" required>{{old('Conocimiento', $cargo->Conocimiento)}}</textarea>
						<label for="Conocimiento">Conocimiento</label>
					</div>
				</div>	
			</div>
		</div>
	
		{{-- submit button --}}
			
		<div class="form-group">
			<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("requisitosCargo.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()