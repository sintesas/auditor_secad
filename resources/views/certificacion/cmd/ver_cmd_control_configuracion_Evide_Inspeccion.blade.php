@extends('partials.card')

@extends('layout')

@section('title')
	Crear Inspección de Conformidad
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdEvidenciasInspeccion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_plan_inspeccion')}} --}}
			Inspección de Conformidad
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">

			<div class="card">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Ensayo de Laboratorio
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Tipo" name="Tipo" required value="{{isset($inspeConf->Tipo) ? old('Tipo', $inspeConf->Tipo) : null}}">
								<label for="Tipo">Tipo</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="CodigoProcediEnsayo" name="CodigoProcediEnsayo" required value="{{isset($inspeConf->CodigoProcediEnsayo) ? old('CodigoProcediEnsayo', $inspeConf->CodigoProcediEnsayo) : null}}">
								<label for="CodigoProcediEnsayo">Código De Procedimiento</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="VersionEnsayo" name="VersionEnsayo" required value="{{isset($inspeConf->VersionEnsayo) ? old('VersionEnsayo', $inspeConf->VersionEnsayo) : null}}">
								<label for="VersionEnsayo">Versión</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="ReporteEnsayo" name="ReporteEnsayo" required value="{{isset($inspeConf->ReporteEnsayo) ? old('ReporteEnsayo', $inspeConf->ReporteEnsayo) : null}}">
								<label for="ReporteEnsayo">Reporte / Informe</label>
							</div>
						</div>
					</div>	
                </div><!--end .card-body -->
			</div><!--end .card -->


			<div class="card">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Metodo de Inspección No Destructiva (NDT)
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">
                 	<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Metodo" name="Metodo" required value="{{isset($inspeConf->Metodo) ? old('Metodo', $inspeConf->Metodo) : null}}">
								<label for="Metodo">Metodo</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="CodigoProcediMetodo" name="CodigoProcediMetodo" required value="{{isset($inspeConf->CodigoProcediMetodo) ? old('CodigoProcediMetodo', $inspeConf->CodigoProcediMetodo) : null}}">
								<label for="CodigoProcediMetodo">Código De Procedimiento</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="VersionMetodo" name="VersionMetodo" required value="{{isset($inspeConf->VersionMetodo) ? old('VersionMetodo', $inspeConf->VersionMetodo) : null}}">
								<label for="VersionMetodo">Versión</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="ReporteMetodo" name="ReporteMetodo" required value="{{isset($inspeConf->ReporteMetodo) ? old('ReporteMetodo', $inspeConf->ReporteMetodo) : null}}">
								<label for="ReporteMetodo">Reporte / Informe</label>
							</div>
						</div>
					</div>	
                </div><!--end .card-body -->
 			</div><!--end .card -->
			
			<div class="card">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Control Dimensional
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">
                 	<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="DoocumentoControl" name="DoocumentoControl" required value="{{isset($inspeConf->DoocumentoControl) ? old('DoocumentoControl', $inspeConf->DoocumentoControl) : null}}">
								<label for="DoocumentoControl">Documento de Referencias</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="VersionControl" name="VersionControl" required value="{{isset($inspeConf->VersionControl) ? old('VersionControl', $inspeConf->VersionControl) : null}}">
								<label for="VersionControl">Versión</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="ReporteControl" name="ReporteControl" required value="{{isset($inspeConf->ReporteControl) ? old('ReporteControl', $inspeConf->ReporteControl) : null}}">
								<label for="ReporteControl">Reporte / Informe</label>
							</div>
						</div>
					</div>	
                </div><!--end .card-body -->
 			</div><!--end .card -->
			
			<input type="hidden" id="IdCMDEvidencias" name="IdCMDEvidencias" value="{{$IdCMDEvidencias}}">
			<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">
			<input type="hidden" id="IdCMDEviInspeccion" name="IdCMDEviInspeccion" value="{{isset($inspeConf->IdCMDEviInspeccion) ? $inspeConf->IdCMDEviInspeccion : null}}"">
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