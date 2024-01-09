
@extends('partials.card')

@extends('layout')

@section('title')
	Editar Contenidos Tematicos por EAC
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($contenidoTematico, ['route' => ['contenidoTematico.update', $contenidoTematico->IdContenidoTematico], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_ContenidoTematico')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreContenido" name="NombreContenido" required value="{{old('NombreContenido', $contenidoTematico->NombreContenido)}}">
						<label for="NombreContenido">Contenido Temático</label>
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
						<button type="button" onclick="window.location='{{ route("contenidoTematico.show", $contenidoTematico->IdEspecialidadCertificacion) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()