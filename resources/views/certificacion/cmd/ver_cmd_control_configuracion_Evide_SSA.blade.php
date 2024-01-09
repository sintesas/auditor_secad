@extends('partials.card')

@extends('layout')

@section('title')
	Crear SSA
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdEvidenciasSSA.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_plan_inspeccion')}} --}}
			SSA
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="MTBF" name="MTBF" required value="{{isset($ssa->MTBF) ? old('MTBF', $ssa->MTBF) : null}}">
						<label for="MTBF">MTBF</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Criticidad" name="Criticidad" required value="{{isset($ssa->Criticidad) ? old('Criticidad', $ssa->Criticidad) : null}}">
						<label for="Criticidad">Criticidad</label>
					</div>
				</div>
			</div>
			
			<input type="hidden" id="IdCMDEvidencias" name="IdCMDEvidencias" value="{{$IdCMDEvidencias}}">
			<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">
			<input type="hidden" id="IdCMDEvidenciaSSA" name="IdCMDEvidenciaSSA" value="{{isset($ssa->IdCMDEvidenciaSSA) ? $ssa->IdCMDEvidenciaSSA : null}}"">
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