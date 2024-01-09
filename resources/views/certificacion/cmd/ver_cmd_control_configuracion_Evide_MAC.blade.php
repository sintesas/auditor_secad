@extends('partials.card')

@extends('layout')

@section('title')
	Crear Mantenimiento de la Aeronavegabilidad del Componente
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdEvidenciasMAC.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_plan_inspeccion')}} --}}
			Mantenimiento de la Aeronavegabilidad del Componente
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="NumeroCliclos" name="NumeroCliclos" required value="{{isset($mac->NumeroCliclos) ? old('NumeroCliclos', $mac->NumeroCliclos) : null}}">
						<label for="NumeroCliclos">Numero de Cliclos</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="TipoInspeccion" name="TipoInspeccion" required value="{{isset($mac->TipoInspeccion) ? old('TipoInspeccion', $mac->TipoInspeccion) : null}}">
						<label for="TipoInspeccion">Tipo de Inspección</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="ReferenciaInspeccion" name="ReferenciaInspeccion" required value="{{isset($mac->ReferenciaInspeccion) ? old('ReferenciaInspeccion', $mac->ReferenciaInspeccion) : null}}">
						<label for="ReferenciaInspeccion">Referencia para Inspección</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Version" name="Version" required value="{{isset($mac->Version) ? old('Version', $mac->Version) : null}}">
						<label for="Version">Versión</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="DocumentoCalificacion" name="DocumentoCalificacion" required value="{{isset($mac->DocumentoCalificacion) ? old('DocumentoCalificacion', $mac->DocumentoCalificacion) : null}}">
						<label for="DocumentoCalificacion">Documento de Calificación</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="DocumentoProduccion" name="DocumentoProduccion" required value="{{isset($mac->DocumentoProduccion) ? old('DocumentoProduccion', $mac->DocumentoProduccion) : null}}">
						<label for="DocumentoProduccion">Documento de Producción</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="DocumentoOperacion" name="DocumentoOperacion" required value="{{isset($mac->DocumentoOperacion) ? old('DocumentoOperacion', $mac->DocumentoOperacion) : null}}">
						<label for="DocumentoOperacion">Documento de Operación</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="DocumentoMantenimiento" name="DocumentoMantenimiento" required value="{{isset($mac->DocumentoMantenimiento) ? old('DocumentoMantenimiento', $mac->DocumentoMantenimiento) : null}}">
						<label for="DocumentoMantenimiento">Documento de Mantenimiento</label>
					</div>
				</div>
			</div>
			
			<input type="hidden" id="IdCMDEvidencias" name="IdCMDEvidencias" value="{{$IdCMDEvidencias}}">
			<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">
			<input type="hidden" id="IdCMDEvidenciaMAC" name="IdCMDEvidenciaMAC" value="{{isset($mac->IdCMDEvidenciaMAC) ? $mac->IdCMDEvidenciaMAC : null}}"">
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