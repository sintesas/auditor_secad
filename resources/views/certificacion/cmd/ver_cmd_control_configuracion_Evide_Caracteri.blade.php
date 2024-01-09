@extends('partials.card')

@extends('layout')

@section('title')
	Crear Caracteristicas del Componente
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdEvidenciasCaracteristicas.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_plan_inspeccion')}} --}}
			Caracteristicas del Componente
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="QTY" name="QTY" required value="{{isset($carac->QTY) ? old('QTY', $carac->QTY) : null}}">
						<label for="QTY">QTY</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Nivel" name="Nivel" required value="{{isset($carac->Nivel) ? old('Nivel', $carac->Nivel) : null}}">
						<label for="Nivel">Nivel</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Material" name="Material" required value="{{isset($carac->Material) ? old('Material', $carac->Material) : null}}">
						<label for="Material">Material</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreArchivo" name="NombreArchivo" required value="{{isset($carac->NombreArchivo) ? old('NombreArchivo', $carac->NombreArchivo) : null}}">
						<label for="NombreArchivo">Nombre Archivo</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Version" name="Version" required value="{{isset($carac->Version) ? old('Version', $carac->Version) : null}}">
						<label for="Version">Versión</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Hoja" name="Hoja" required value="{{isset($carac->Hoja) ? old('Hoja', $carac->Hoja) : null}}">
						<label for="Hoja">Hoja</label>
					</div>
				</div>
			</div>		
			
			<input type="hidden" id="IdCMDEvidencias" name="IdCMDEvidencias" value="{{$IdCMDEvidencias}}">
			<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">
			<input type="hidden" id="IdCMDEviCaracteristica" name="IdCMDEviCaracteristica" value="{{isset($carac->IdCMDEviCaracteristica) ? $carac->IdCMDEviCaracteristica : null}}"">
			{{-- submit button --}}			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("cmdEvidencias.show", $IdCMDRequisitos) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
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