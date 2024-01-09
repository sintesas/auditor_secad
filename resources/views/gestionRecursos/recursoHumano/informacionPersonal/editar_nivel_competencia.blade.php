@extends('partials.card')

@extends('layout')

@section('title')
	Editar Perfil Certificación
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($nivelCompetencias, ['route' => ['nivelCompetencia.update', $nivelCompetencias->IdNivelCompetencia], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_nivelComp')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="NivelCompetencia" name="NivelCompetencia" required value="{{old('NivelCompetencia', $nivelCompetencias->NivelCompetencia)}}">
						<label for="NombrePerfil">Nivel Competencia</label>
					</div>
				</div>	
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Denominacion" name="Denominacion" required value="{{old('Denominacion', $nivelCompetencias->Denominacion)}}">
						<label for="Denominacion">Denominación</label>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Sigla" name="Sigla" required value="{{old('Sigla', $nivelCompetencias->Sigla)}}">
						<label for="Sigla">Sigla</label>
					</div>
				</div>	
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="NivelPericia" name="NivelPericia" required value="{{old('DescripcionPeNivelPericiarfil', $nivelCompetencias->NivelPericia)}}">
						<label for="NivelPericia">Nivel Pericia</label>
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
						<button type="button" onclick="window.location='{{ route("nivelCompetencia.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()