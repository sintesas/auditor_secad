
@extends('partials.card')

@extends('layout')

@section('title')
	Editar Requisitos Niveles Competencia
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($requisitosNivelCompetencia, ['route' => ['requisitosNivelCompe.update', $requisitosNivelCompetencia->IdRequisitosCompetencia], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_requisitosnilves')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="NombreRequisitosCompetencia" name="NombreRequisitosCompetencia" required>{{old('NombreRequisitosCompetencia', $requisitosNivelCompetencia->NombreRequisitosCompetencia)}}</textarea>
						<label for="NombreRequisitosCompetencia">Requisito</label>
					</div>
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
						<button type="button" onclick="window.location='{{ route("requisitosNivelCompe.show", $requisitosNivelCompetencia->IdNivelCompetencia) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()