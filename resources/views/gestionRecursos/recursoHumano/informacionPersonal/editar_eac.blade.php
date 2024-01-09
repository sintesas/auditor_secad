
@extends('partials.card')

@extends('layout')

@section('title')
	Editar Escialidades Aeronautica de Certificacion EAC
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($especialidades, ['route' => ['eac.update', $especialidades->IdEspecialidadCertificacion], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_eac')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" class="form-control" id="Especialidad" name="Especialidad" required value="{{old('Especialidad', $especialidades->Especialidad)}}">
						<label for="Especialidad">Especialidad EAC</label>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" class="form-control" id="Codigo" name="Codigo" required value="{{old('Codigo', $especialidades->Codigo)}}">
						<label for="Codigo">Codigo EAC</label>
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
						<button type="button" onclick="window.location='{{ route("eac.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()