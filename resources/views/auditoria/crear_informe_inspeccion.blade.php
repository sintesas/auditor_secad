@extends('partials.card_big')

@extends('layout')

@section('title')
	Preparar un informe de inspección
@endsection()

@section('content')

	@section('card-content')
		@section('form-tag')

			{!! Form::open(array('route' => 'informeInspeccion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{ Breadcrumbs::render('crear_informe_inspeccion') }}		
		@endsection()

		@section('card-content')
			<div class="total-card">
				<div class="row">
					<div class="col-lg-4">	
						<div class="form-group floating-label">	
							{{ Form::select('IdAuditoria', $Auditorias->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'id' => 'IdAuditoria', 'required' => '']) }}
							{{ Form::label('IdAuditoria', 'Código Auditoria')}}
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">								
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required">
									<label for="FechaInicio">Fecha de Inicio</label>
								</div>
								<span class="input-group-addon"></span>
							</div>												
						</div>									
					</div>
					<div class="col-lg-4">	
						<div class="form-group floating-label">
							<div class="form-group floating-label">	
							{{ Form::select('IdTipoInforme', $TipoInformes->pluck('NombreTipo', 'IdTipoInforme'), null, ['class' => 'form-control', 'required' => '']) }}
							{{ Form::label('IdTipoInforme', 'Tipo Informe')}}
							</div>
						</div>									
					</div>									
				</div>	
				<div class="row">
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="ActividaDesarr" id="ActividaDesarr" class="form-control" rows="3" required=""></textarea>
							<label for="ActividaDesarr">Actividades Desarrolladas</label>
						</div>
					</div>	
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="AspectosRelev" id="AspectosRelev" class="form-control" rows="3" required=""></textarea>
							<label for="AspectosRelev">Aspectos Relevantes</label>
						</div>
					</div>			
				</div>	
				<div class="row">
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="OportuMejora" id="OportuMejora" class="form-control" rows="3" required=""></textarea>
							<label for="OportuMejora">Oportunidades de Mejora</label>
						</div>
					</div>	
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="Conclusiones" id="Conclusiones" class="form-control" rows="3" required=""></textarea>
							<label for="Conclusiones">Conclusiones</label>
						</div>
					</div>			
				</div>	
				<div class="row">
					<div class="col-lg-4">	
						<div class="form-group floating-label">	
							<input type="number" class="form-control" id="TotalNoConfNuevas" name="TotalNoConfNuevas" placeholder="" required="" onKeyPress="return soloNumeros(event)">
							<label for="TotalNoConfNuevas">Total No Conformidades Nuevas</label>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group floating-label">	
							<input type="number" class="form-control" id="TotalNoConfRepet" name="TotalNoConfRepet" placeholder="" required="" onKeyPress="return soloNumeros(event)">
							<label for="TotalNoConfRepet">Total No Conformidades Repetitivas</label>
						</div>							
					</div>
					<div class="col-lg-4">	
						<div class="form-group floating-label">	
							<input type="number" class="form-control" id="TotalOportuMejora" name="TotalOportuMejora" placeholder="" required="" onKeyPress="return soloNumeros(event)">
							<label for="TotalOportuMejora">Total Oportunidades Mejora</label>
						</div>							
					</div>									
				</div>

				<div class="row">
					<table class="table table-responsive col-lg-12" id="table_info_total">
						<thead>
							<tr>
								<th scope="col">Total No conformidades adicionadas</th>

								<th scope="col">Total Ordenes</th>
								<th scope="col">Total Recomendaciones</th>
								<th scope="col">Total Requerimientos</th>
								
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>																					
				<div class="row">
					<div class="col-sm-6">	
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>	
					<div class="col-sm-6">	
						<button type="button" onclick="window.location='{{ route("informeInspeccion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>										
				</div>
				{!! Form::close() !!}
			</div>	


			{{-- SCRIPTS --}}

			{{-- Solo Numeros --}}
			<script type="text/javascript">
				// Solo permite ingresar numeros.
				function soloNumeros(e){
					var key = window.Event ? e.which : e.keyCode
					return (key >= 48 && key <= 57)
				}

				$('#IdAuditoria').change(function(event) {
					
					//cargar cantidad
					$.get("totalAnotacionesAll/" + event.target.value + "", function(response, state){
						
						for(i=0; i<response.length; i++){

							//INPUT
							$('#TotalNoConfNuevas').val('' + response[i].totalNoConformidadNueva);
							$('#TotalNoConfRepet').val('' + response[i].totalNoConformidadRepetida);
							$('#TotalOportuMejora').val('' + response[i].totalOptMejora);

							//TABLE
							$('#table_info_total tbody tr').remove();
							
							var dtBody = ""

							dtBody += "<tr>";

							dtBody +="<td>"+response[i].totalNoConformidadAdicionada+"</td>";

							dtBody +="<td>"+response[i].totalOrdenes+"</td>";
							dtBody +="<td>"+response[i].totalRecomendaciones+"</td>";
							dtBody +="<td>"+response[i].totalRequerimientos+"</td>";

							dtBody += "</tr>";
							
							$('#table_info_total tbody').append(dtBody);
						}
					});

				});

			</script>

			<script type="text/javascript">
				$('select').select2();
			</script>

		@endsection()

	@endsection()

@endsection()