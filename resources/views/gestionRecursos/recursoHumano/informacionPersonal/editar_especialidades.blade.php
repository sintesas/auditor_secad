@extends('partials.card')

@extends('layout')

@section('title')
	Editar Tipo Auditotia
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($especialidades, ['route' => ['especialidades.update', $especialidades->IdEspecialidad], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_especialidades')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						{{ Form::select('IdCuerpo', $cuerpos->pluck('NombreCuerpo', 'IdCuerpo'), null, ['class' => 'form-control', 'id' => 'IdCuerpo']) }}
							<label for="IdCuerpo">Cuerpo</label>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreEspecialidad" name="NombreEspecialidad" required value="{{old('NombreEspecialidad', $especialidades->NombreEspecialidad)}}">
						<label for="NombreEspecialidad">Nombre Especialidad</label>
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
						<button type="button" onclick="window.location='{{ route("especialidades.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}
		<script type="text/javascript">
			$('select').select2();
		</script>
		@endsection()


	@endsection()


@endsection()