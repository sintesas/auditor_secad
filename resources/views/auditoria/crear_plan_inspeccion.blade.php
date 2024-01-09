@extends('partials.card')

@extends('layout')

@section('title')
	Crear Plan Inspección
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'planeInspeccion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_plan_inspeccion')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						{{ Form::select('IdAuditoria', $auditoria->pluck('Codigo', 'IdAuditoria'), null, ['required','class' => 'form-control', 'id' => 'IdAuditoria']) }}
						<label for="IdAuditoria">Código Auditoria</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" required> </textarea>
						<label for="Observaciones">Observaciones</label>
					</div>
				</div>
			</div>

			{{-- submit button --}}
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("planeInspeccion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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
