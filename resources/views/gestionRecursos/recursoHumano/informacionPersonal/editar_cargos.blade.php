@extends('partials.card')

@extends('layout')

@section('title')
	Editar Cargos
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($cargos, ['route' => ['cargos.update', $cargos->IdCargo], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('editar_cargos')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="AreaCargo" name="AreaCargo" required value="{{old('AreaCargo', $cargos->AreaCargo)}}">
						<label for="AreaCargo">Area</label>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="form-group">
						<input type="text" class="form-control" id="Cargo" name="Cargo" required value="{{old('Cargo', $cargos->Cargo)}}">
						<label for="Cargo">Cargo</label>
					</div>
				</div>	
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Categoria" name="Categoria" required value="{{old('Categoria', $cargos->Categoria)}}">
						<label for="Categoria">Categoría</label>
					</div>
				</div>	
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Cuerpo" name="Cuerpo" required value="{{old('Cuerpo', $cargos->Cuerpo)}}">
						<label for="Cuerpo">Cuerpo</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Dotacion" name="Dotacion" required value="{{old('Dotacion', $cargos->Dotacion)}}">
						<label for="Dotacion">Dotación</label>
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
						<button type="button" onclick="window.location='{{ route("cargos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			// Solo permite ingresar numeros.
			function soloNumeros(e){
				var key = window.Event ? e.which : e.keyCode
				return (key >= 48 && key <= 57)
			}
		</script>

		{!! Form::close() !!}

		@endsection()


	@endsection()


@endsection()