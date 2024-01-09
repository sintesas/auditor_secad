@extends('partials.card_big')

@extends('layout')

@section('title')
	Editar un informe de inspección
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($informeInspeccion, ['route' => ['informeInspeccion.update', $informeInspeccion->IdCrearInforme], 'method' => 'PUT' ]) !!}
			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{ Breadcrumbs::render('editar_informe_inspeccion') }}	
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
									<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required value="{{old('FechaInicio', $informeInspeccion->FechaInicio)}}">
									<label for="FechaInicio">Fecha de Inicio</label>
								</div>
								<span class="input-group-addon"></span>
							</div>												
						</div>									
					</div>
					<div class="col-lg-4">	
						<div class="form-group floating-label">
							<div class="form-group floating-label">	
							{{ Form::select('IdTipoInforme', $TipoInformes->pluck('NombreTipo', 'IdTipoInforme'), null, ['class' => 'form-control', 'id' => 'IdTipoInforme', 'required' => '']) }}
							{{ Form::label('IdTipoInforme', 'Tipo Informe')}}
							</div>
						</div>									
					</div>									
				</div>	
				<div class="row">
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="ActividaDesarr" id="ActividaDesarr" class="form-control" rows="3" required="">{{old('ActividaDesarr', $informeInspeccion->ActividaDesarr)}}</textarea>
							<label for="ActividaDesarr">Actividades Desarrolladas</label>
						</div>
					</div>	
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="AspectosRelev" id="AspectosRelev" class="form-control" rows="3" required="">{{old('AspectosRelev', $informeInspeccion->AspectosRelev)}}</textarea>
							<label for="AspectosRelev">Aspectos Relevantes</label>
						</div>
					</div>			
				</div>	
				<div class="row">
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="OportuMejora" id="OportuMejora" class="form-control" rows="3" required="">{{old('OportuMejora', $informeInspeccion->OportuMejora)}}</textarea>
							<label for="OportuMejora">Oportunidades de Mejora</label>
						</div>
					</div>	
					<div class="col-lg-6">	
						<div class="form-group floating-label">
							<textarea name="Conclusiones" id="Conclusiones" class="form-control" rows="3" required="">{{old('Conclusiones', $informeInspeccion->Conclusiones)}}</textarea>
							<label for="Conclusiones">Conclusiones</label>
						</div>
					</div>			
				</div>	
					
				<div class="row">
					<table class="table table-responsive col-lg-12" id="table_info_total">
						<thead>
							<tr>
								<th>Total NC Nuevas</th>
								<th>Total NC Repetitivas</th>
								<th scope="col">Total NC Adicionadas</th>
								<th scope="col">Total OM</th>

								<th scope="col">Total OR</th>
								<th scope="col">Total RE</th>
								<th scope="col">Total RQ</th>

							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>																				
				<div class="row">
					<div class="col-sm-6">	
						<button type="submit" style="" class="btn btn-info btn-block">Editar</button>
					</div>	
					<div class="col-sm-6">	
						<button type="button" onclick="window.location='{{ route("informeInspeccion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>										
				</div>
				{!! Form::close() !!}
			</div>

			{{-- SCRIPTS --}}
			<script type="text/javascript">
				$('select').select2();
			</script>
			{{-- Solo Numeros --}}
			<script type="text/javascript">
				// Solo permite ingresar numeros.
				function soloNumeros(e){
					var key = window.Event ? e.which : e.keyCode
					return (key >= 48 && key <= 57)
				}



				function cargarCantidades(idAuditoria) {
					//cargar cantidad
					$.get("../totalAnotacionesAll/" + idAuditoria + "", function(response, state){

						for(i=0; i<response.length; i++){

							//TABLE
							$('#table_info_total tbody tr').remove();

							var dtBody = ""

							dtBody += "<tr>";

							dtBody += "<td>"+response[i].totalNoConformidadNueva+"</td>";
							dtBody += "<td>"+response[i].totalNoConformidadRepetida+"</td>";
							dtBody += "<td>"+response[i].totalNoConformidadRepetida+"</td>";
							dtBody +="<td>"+response[i].totalOptMejora+"</td>";

							dtBody +="<td>"+response[i].totalOrdenes+"</td>";
							dtBody +="<td>"+response[i].totalRecomendaciones+"</td>";
							dtBody +="<td>"+response[i].totalRequerimientos+"</td>";

							dtBody += "</tr>";
							
							$('#table_info_total tbody').append(dtBody);
						}
					});
				}

				$('#IdAuditoria').change(function(event) {
					cargarCantidades(event.target.value);
				});

				$( document ).ready(function(){
					cargarCantidades({{ $informeInspeccion->IdAuditoria }})
				})



			</script>

		@endsection()

	@endsection()

@endsection()