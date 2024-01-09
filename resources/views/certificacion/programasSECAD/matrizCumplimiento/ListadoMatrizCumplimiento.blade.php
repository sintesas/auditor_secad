@extends('partials.card_big')

@extends('layout')

@section('title')
	Listado Matriz de Cumplimiento
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Listado Matriz de cumplimiento
		@endsection()
		@section('addcss')
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
		@endsection()

		@section('card-content')
			<div class="total-card">
				<div class="row encabezadoPlanInspeccion">
				<!-- titulo Formulario -->
			<div class="card-body floating-label">
				<div class="total-card">
					<div class="row encabezadoPlanInspeccion">
						<!-- titulo Formulario -->
						<div class="col-xs-12 text-center">
							<h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
							<div>
								<h4>PROGRAMAS - MATRIZ DE CUMPLIMIENTO</h4>
							</div>
						</div>
					</div>
				</div>
			<div id="output"></div>

			<div class="col-lg-12 realTable" style="overflow-x: scroll; margin-top: 5%;">
				<div class="table-responsive">
					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th><b>Consecutivo</b></th>
								<th><b>Proyecto</b></th>
								<th><b>Norma</b></th>
								<th><b>Referencia</b></th>
								<th><b>Estructura</b></th>
								<th><b>Aplicacion</b></th>
								<th><b>MOC</b></th>
								<th><b>Evidencia</b></th>
								<th><b>Activo</b></th>
								<th><b>Observaciones</b></th>
								<th><b>Nombre y Apellidos</b></th>
								<th><b>Fecha</b></th>
								<th><b>Firma</b></th>

							</tr>
						</thead>
						<tbody>
							@foreach ($listado as $programa)
							<tr>
								<td>{{$programa->Consecutivo}}</td>
								<td>{{$programa->Proyecto}}</td>
								<td>{{$programa->Nombre}}</td>
								<td>{{$programa->Referencia}}</td>
								<td><?php echo $programa->EstructuraCapitulosSubPartes;?></td>
								<td>{{$programa->Aplicacion}}</td>
								<td>{{$programa->CodigoAC2324}}</td>
								<td>
									@if($programa->evidencia == null || $programa->evidencia == '')
									@else
									<ul>
										@php($cadena = json_decode($programa->evidencia))
										@foreach($cadena as $evi)
										<li>
											<a href="<?php echo $_SERVER['SERVER_NAME']; ?>/secad/Matriz de cumplimiento/Evidencias programa {{$programa->Consecutivo}}/Base {{$programa->Nombre}} - {{$programa->Referencia}}/{{$evi}}" target="_blank">{{$evi}}</a>
										</li>
										@endforeach
									</ul>
									@endif
								</td>
								<td>{{$programa->aprobado}}</td>
								<td>{{$programa->observaciones}}</td>
								<td>{{$programa->nombresyapellidos}}</td>
								<td>{{$programa->fecha}}</td>
								<td>{{$programa->firma}}</td>
							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			</div>
<!-- 			<div class="col-lg-12">
	<button onclick="exportTableToExcel('datatable1')">Enviar a Excel</button>
</div>
 -->
			<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

			<script>
				$(document).ready(function(){
					$('#datatable1').DataTable({
						dom: 'Bfxrtip',
						sPaginationType: "full_numbers",
			    		bProcessing: true,
						bAutoWidth: false,
						buttons: [
			             'excel',
			             ]
						});
				});

				function ValoracionTec()
				{
					$('.valoraciontecnica').toggleClass('hidden');
					if($('#valoraciontecnicamuestra').hasClass('hidden'))
					{
						$('#valoraciontecnicabutton').html('Valoración técnica (mostrar)')
					}
					else
					{
						$('#valoraciontecnicabutton').html('Valoración técnica (ocultar)')
					}
				}

				function FactivilidadTec()
				{
					$('.factivilidadtecnica').toggleClass('hidden');
					if($('#factivilidadtecnicamuestra').hasClass('hidden'))
					{
						$('#factivilidadtecnicabutton').html('Factibilidad técnica (mostrar)')
					}
					else
					{
						$('#factivilidadtecnicabutton').html('Factibilidad técnica (ocultar)')
					}
				}

				function UMA()
				{
					$('.uma').toggleClass('hidden');
					if($('#umamuestra').hasClass('hidden'))
					{
						$('#umabutton').html('Prioridad UMA (mostrar)')
					}
					else
					{
						$('#umabutton').html('Prioridad UMA (ocultar)')
					}
				}
				function ValoracionEconomica()
				{
					$('.valoracioneconomica').toggleClass('hidden');
					if($('#valoracioneconomicamuestra').hasClass('hidden'))
					{
						$('#valoracioneconomicabutton').html('Valoración económica (mostrar)')
					}
					else
					{
						$('#valoracioneconomicabutton').html('Valoración económica (ocultar)')
					}
				}

			</script>

			 <script type="text/javascript">
			 	/*var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers, $.pivotUtilities.export_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('listademandapotencial/matriz/', function(response, state){
					console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
										download: true,
            				skipEmptyLines: true,
			            	renderers: renderers,
			                rows: ["Nombre", "ParteNumero", "Equipo", "NSN", "CodigoSAP", "CodATA", "PublicacionTecnica", /*"Funcionamiento", "Identificacion", "Observaciones", "NombreUnidad", "TipoLista", "AltaRotacion", "BajoMTBF", "AltosTiempos", "DeficitExistencias", "FabricanteOrinal", "FlotaAntigua", "VT", "Severidad", "OcurrenciaFalla", "Complejidad", "PrioridadUMA", "TOTAL", "UltimoPrecio", "ValorHistorico", "ValorUnitario", "CantidadPrioridad", "ValorTotal", "AnioProximaEntrega", "ContratarCompra", "NombreCluster", "NombreEmpresa", "ValorUnitarioOferta", "TiempoEntregaOferta", "Cantidad", "ValorTotaloferta", "ObservacionesOferta", "AñoOferta"],
			                cols: ["Nombre", "ParteNumero", "Equipo", "NSN", "CodigoSAP", "CodATA", "PublicacionTecnica", /*"Funcionamiento", "Identificacion", "Observaciones", "NombreUnidad", "TipoLista", "AltaRotacion", "BajoMTBF", "AltosTiempos", "DeficitExistencias", "FabricanteOrinal", "FlotaAntigua", "VT", "Severidad", "OcurrenciaFalla", "Complejidad", "PrioridadUMA", "TOTAL", "UltimoPrecio", "ValorHistorico", "ValorUnitario", "CantidadPrioridad", "ValorTotal", "AnioProximaEntrega", "ContratarCompra", "NombreCluster", "NombreEmpresa", "ValorUnitarioOferta", "TiempoEntregaOferta", "Cantidad", "ValorTotaloferta", "ObservacionesOferta", "AñoOferta"],
											vals: ["TOTAL","UltimoPrecio","ValorHistorico","ValorUnitario","CantidadPrioridad","ValorTota","ValorUnitarioOferta","Cantidad","ValorTotaloferta"],
			                aggregatorName: "List Unique Values",
											rendererName: "TSV Export",
                			hideTotals: 'true',
			            }
			        );

			        $('.pvtRowTotalLabel:first').html('Total');
				});*/

				// $(document).ready(function()
				// {
				//   $('#realTable').doubleScroll({resetOnWindowResize: true});
				// });



			function exportTableToExcel(tableID, filename = 'Demanda Potencial'){
					var downloadLink;
					var dataType = 'application/vnd.ms-excel';
					var tableSelect = document.getElementById(tableID);
					var html = tableSelect.outerHTML;
					//add more symbols if needed...

				      while (html.indexOf('Á') != -1) html = html.replace('Á', '&Aacute;');
				      while (html.indexOf('é') != -1) html = html.replace('é', '&eacute;');
				      while (html.indexOf('É') != -1) html = html.replace('É', '&Eacute;');
				      while (html.indexOf('í') != -1) html = html.replace('í', '&iacute;');
				      while (html.indexOf('Í') != -1) html = html.replace('Í', '&Iacute;');
				      while (html.indexOf('ó') != -1) html = html.replace('ó', '&oacute;');
				      while (html.indexOf('Ó') != -1) html = html.replace('Ó', '&Oacute;');
				      while (html.indexOf('ú') != -1) html = html.replace('ú', '&uacute;');
				      while (html.indexOf('Ú') != -1) html = html.replace('Ú', '&Uacute;');
				      while (html.indexOf('º') != -1) html = html.replace('º', '&ordm;');
				      while (html.indexOf('ñ') != -1) html = html.replace('ñ', '&ntilde;');
				      while (html.indexOf('Ñ') != -1) html = html.replace('Ñ', '&Ntilde;');

					var tableHTML = html.replace(/ /g, '%20');

					// Specify file name
					filename = filename?filename+'.xls':'excel_data.xls';

					// Create download link element
					downloadLink = document.createElement("a");

					document.body.appendChild(downloadLink);

					if(navigator.msSaveOrOpenBlob){
							var blob = new Blob(['ufeff', tableHTML], {
									type: dataType
							});
							navigator.msSaveOrOpenBlob( blob, filename);
					}else{
							// Create a link to the file
							downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

							// Setting the file name
							downloadLink.download = filename;

							//triggering the function
							downloadLink.click();
					}
			}
			</script>

		@endsection()

	@endsection()

@endsection()
