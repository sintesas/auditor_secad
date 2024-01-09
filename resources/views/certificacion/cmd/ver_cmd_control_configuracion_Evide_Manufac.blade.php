@extends('partials.card')

@extends('layout')

@section('title')
	Crear Manufactura del Componente
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdEvidenciasManufactura.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_plan_inspeccion')}} --}}
			Manufactura del Componente
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="NombreProcesosManufactura" name="NombreProcesosManufactura" required value="{{isset($manu->NombreProcesosManufactura) ? old('NombreProcesosManufactura', $manu->NombreProcesosManufactura) : null}}">
						<label for="NombreProcesosManufactura">Nombre Procesos Manufactura</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="CodigoProceso" name="CodigoProceso" required value="{{isset($manu->CodigoProceso) ? old('CodigoProceso', $manu->CodigoProceso) : null}}">
						<label for="CodigoProceso">Código De Procedimiento</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Version" name="Version" required value="{{isset($manu->Version) ? old('Version', $manu->Version) : null}}">
						<label for="Version">Versión</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="ObtencionMateriasPrimas" name="ObtencionMateriasPrimas" required value="{{isset($manu->ObtencionMateriasPrimas) ? old('ObtencionMateriasPrimas', $manu->ObtencionMateriasPrimas) : null}}">
						<label for="ObtencionMateriasPrimas">Obtencion de Materias Primas</label>
					</div>
				</div>
			</div>	

			<div class="row">
				
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Hoja" name="Hoja" required value="{{isset($manu->Hoja) ? old('Hoja', $manu->Hoja) : null}}">
						<label for="Hoja">Hoja de Datos de Material (Datasheet)</label>
					</div>
				</div>
			</div>

				
			
			<input type="hidden" id="IdCMDEvidencias" name="IdCMDEvidencias" value="{{$IdCMDEvidencias}}">
			<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">
			<input type="hidden" id="IdCMDEviManufactura" name="IdCMDEviManufactura" value="{{isset($manu->IdCMDEviManufactura) ? $manu->IdCMDEviManufactura : null}}"">
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