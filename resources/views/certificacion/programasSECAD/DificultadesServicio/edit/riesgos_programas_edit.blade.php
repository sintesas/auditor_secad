@extends('partials.card')

@extends('layout')

@section('title')
	Crear Riesgos - Programas
@endsection()

@section('content')

<style media="screen">
	textarea{
		border: solid 1px #2a2a2a2a !important;
	}
	.table.info tr td:first-child{
		border-right: 1px solid #2a2a2a2a;
	}
</style>

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('riesgo_crear') }}
		<a type="button" href="{{route('riesgoprograma.crear', $programa->IdPrograma) }}" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></a>
		@endsection()

		@section('card-content')
		<div class="col-lg-6">
			<table class="table info">
				<tbody>
					<tr>
						<td><b>CODIGO:</b></td>
						<td>{{$programa->Consecutivo}}</td>
					</tr>
					<tr>
						<td><b>PROGRAMA:</b></td>
						<td>{{$programa->Proyecto}}</td>
					</tr>
					<tr>
						<td><b>PRODUCTO<br>AERONAUTICO:</b></td>
						<td>{{$programa->NombreProducto}}</td>
					</tr>
				</tbody>
			</table>
		</div>

			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Riesgo</b></th>
							<th><b>Fecha</b></th>
							<th style="width: 120px;"><b>Editar</b></th>
							<th style="width: 120px;"><b>Seguimiento</b></th>
						</tr>
					</thead>
					<tbody>

						@if(count($riesgos)==0)
						<tr>
							<td colspan="4">Aún no hay riesgos creados.</td>
						</tr>
						@else
						@php($i=1)
						@foreach ($riesgos as $riesgo)
						<tr>
							<td>{{$i}}</td>
							<td>{{$riesgo->fecha}}</td>
							<td>								
								<div class="col-sm-6">
									<a href="{{route('riesgoprogramaseguimiento.edit', $riesgo->idRiesgoPrograma) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>

								<div class="col-sm-6">
									<a href="#" class="btn btn-primary btn-block editbutton" data-toggle="modal" data-target="#mdl_{{$riesgo->idRiesgoPrograma}}"><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>

								<div class="modal fade mdl_notas" id="mdl_{{$riesgo->idRiesgoPrograma}}" tabindex="-1" role="dialog" aria-labelledby="mdl_{{$riesgo->idRiesgoPrograma}}" aria-hidden="true">
									{!! Form::model($riesgo, ['route' => ['riesgoprogramaseguimiento.update', $riesgo->idRiesgoPrograma], 'method' => 'PUT', 'files' => true ]) !!}
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">SEGUIMIENTO</h4>
											</div>
											<div class="modal-body">
												<div class="row">

													<div class="col-sm-12">
														<div class="form-group">
															<select class="form-control" id="Condicion_segura" name="Condicion_segura">
																<option value="">Seleccionar</option>
																<option value="SI" @if($riesgo->Condicion_segura == 'SI') selected @endif>SI</option>
																<option value="NO" @if($riesgo->Condicion_segura == 'NO') selected @endif>NO</option>
															</select>
															<label for="Condicion_segura">Existe condición insegura</label>
														<hr>
													</div>
												</div>

												<div class="col-sm-12">
													<div class="form-group">
														<select class="form-control" id="Extension_productos" name="Extension_productos">
															<option value="">Seleccionar</option>
															<option value="SI" @if($riesgo->Condicion_segura == 'SI') selected @endif>SI</option>
															<option value="NO" @if($riesgo->Condicion_segura == 'NO') selected @endif>NO</option>
														</select>
														<label for="Extension_productos">Puede hacerse extensiva a otros productos del mismo diseño de tipo o diseño aprobado</label>
													<hr>
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group">
													<select class="form-control" id="Directiva_aeronavegabilidad" name="Directiva_aeronavegabilidad" select-id="directiva_{{$riesgo->idRiesgoPrograma}}" onchange="directiva({{$riesgo->idRiesgoPrograma}})">
														<option value="">Seleccionar</option>
														<option value="SI" @if($riesgo->Condicion_segura == 'SI') selected @endif>SI</option>
														<option value="NO" @if($riesgo->Condicion_segura == 'NO') selected @endif>NO</option>
													</select>
													<label for="Directiva_aeronavegabilidad">Se emite una Directiva de Aeronavegabilidad (DA)</label>
												<hr>
											</div>
										</div>

										<div class="col-sm-12" id="form_directiva_{{$riesgo->idRiesgoPrograma}}" @if($riesgo->Condicion_segura != 'SI') style="display: none" @endif >
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input class="form-control" type="text" name="Directiva_codigo" id="Directiva_codigo" value="{{$riesgo->Directiva_codigo}}">
														<label for="Directiva_codigo">Codificación y control DA</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<h5>Anexos</h5>
														<input class="form-control" type="file" name="Directiva_anexos" id="Directiva_anexos" value="">
													</div>
												</div>
												<div class="col-sm-12">
													<ul>
														@if($riesgo->Directiva_anexos == '' || $riesgo->Directiva_anexos == null)
														<li>No hay anexos.</li>
														@else
														<li><a target="_blank" href="/secad/Riesgos/Riesgo_seguimiento_directivas_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Directiva_anexos}}">{{$riesgo->Directiva_anexos}}</a></li>
														@endif
													</ul>
												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-group">
												<select class="form-control" id="Boletines" name="Boletines" select-id="boletines_{{$riesgo->idRiesgoPrograma}}" onchange="boletines({{$riesgo->idRiesgoPrograma}})">
													<option value="">Seleccionar</option>
													<option value="SI" @if($riesgo->Boletines == 'SI') selected @endif>SI</option>
													<option value="NO" @if($riesgo->Boletines == 'NO') selected @endif>NO</option>
												</select>
												<label for="Boletines">Se emiten Boletines de Servicio</label>
											<hr>
										</div>
									</div>

									<div class="col-sm-12" id="form_Boletines_{{$riesgo->idRiesgoPrograma}}" @if($riesgo->Boletines != 'SI') style="display: none" @endif >
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<select class="form-control" name="Boletines_tipo" id="Boletines_tipo">
														<option value="MANDATARIOS" @if($riesgo->Boletines_tipo == 'MANDATARIOS') selected @endif>MANDATARIOS</option>
														<option value="RECOMENDADOS" @if($riesgo->Boletines_tipo == 'RECOMENDADOS') selected @endif>RECOMENDADOS</option>
														<option value="OPCIONALES" @if($riesgo->Boletines_tipo == 'OPCIONALES') selected @endif>OPCIONALES</option>
													</select>
													<label for="Boletines_tipo">Tipo</label>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<h5>Anexos</h5>
													<input class="form-control" type="file" name="Boletines_anexos" id="Boletines_anexos" value="">
												</div>
											</div>
											<div class="col-sm-12">
												<ul>
													@if($riesgo->Boletines_anexos == '' || $riesgo->Boletines_anexos == null)
													<li>No hay anexos.</li>
													@else
													<li><a target="_blank" href="/secad/Riesgos/Riesgo_seguimiento_boletines_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Boletines_anexos}}">{{$riesgo->Boletines_anexos}}</a></li>
													@endif
												</ul>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<textarea class="form-control" type="text" name="Boletines_otros_irs" id="Boletines_otros_irs">{{$riesgo->Boletines_otros_irs}}</textarea>
													<label for="Boletines_otros_irs">Otras acciones correctivas propuestos o cualquier otra Instrucción Regulatoria y de Servicio (IRS) requerida</label>
												</div>
											</div>

										</div>
									</div>

												</div>
												<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
												<input type="hidden" name="programa" value="{{$programa->IdPrograma}}">
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-info btn-block">Confirmar</button>
											</div>
										</div>
									</div>
									{!! Form::close() !!}
								</div>


							</td>
						</tr>
						@php($i++)
						@endforeach
						@endif
					</tbody>
				</table>

			</div><!--end .table-responsive -->
		</div><!--end .col -->

		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});

	function boletines(id){
		var valor = $('select[select-id=boletines_'+id+']').val();
		if(valor == 'SI'){
			$('#form_Boletines_'+id).show();
		}
		else {
			$('#form_Boletines_'+id).hide();
		}
	}
	function directiva(id){
		var valor = $('select[select-id=directiva_'+id+']').val();
		if(valor == 'SI'){
			$('#form_directiva_'+id).show();
		}
		else {
			$('#form_directiva_'+id).hide();
		}
	}
</script>

@endsection()


@endsection()
