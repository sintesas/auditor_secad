@extends('partials.card_big')

@extends('layout')

@section('title')
	Listado Demanda Potencia
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Listado Demanda Potencia
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
								<h4>PRODUCTOS AERONAUTICOS - DEMANDA POTENCIAL</h4>
							</div>                        
						</div>                              
					</div>
				</div>
				@if ($permiso->consultar == 1)
			<div id="output"></div>
			<div class="row">
				<div class="col-sm-12">
					<div class="col-sm-3">
						<button class="btn btn-info" type="button" id="valoraciontecnicabutton" onclick="ValoracionTec()">
							Valoración técnica (ocultar)
						</button>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-danger" type="button" id="factivilidadtecnicabutton" onclick="FactivilidadTec()">
							Factibilidad técnica (ocultar)
						</button>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-success" type="button" id="umabutton" onclick="UMA()">
							Prioridad UMA (ocultar)
						</button>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-primary" type="button" id="valoracioneconomicabutton" onclick="ValoracionEconomica()">
							Valoración económica (ocultar)
						</button>
					</div>
				</div>
			</div>
			<div class="col-lg-12 realTable" style="overflow-x: scroll; margin-top: 5%;">
				<div class="table-responsive">
					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th><b>Nombre</b></th>
								<th><b>Parte Numero</b></th>
								<th><b>Equipo</b></th>
								<th><b>NSN</b></th>
								<th><b>Codigo SAP</b></th>
								<th><b>Cod ATA</b></th>
								<th><b>Publicacion Tecnica</b></th>
								<th><b>Identificacion</b></th>
								<th><b>Observaciones</b></th>
								<th><b>Nombre Unidad</b></th>
								<th class="valoraciontecnica" id="valoraciontecnicamuestra"><b>Tipo Lista</b></th>
								<th class="valoraciontecnica"><b>Alta Rotacion</b></th>
								<th class="valoraciontecnica"><b>Bajo MTBF</b></th>
								<th class="valoraciontecnica"><b>Altos Tiempos</b></th>
								<th class="valoraciontecnica"><b>Deficit Existencias</b></th>
								<th class="valoraciontecnica"><b>Fabricante Original</b></th>
								<th class="valoraciontecnica"><b>Flota Antigua</b></th>
								<th class="valoraciontecnica"><b>VT</b></th>
								<th class="factivilidadtecnica" id="factivilidadtecnicamuestra"><b>Severidad</b></th>
								<th class="factivilidadtecnica"><b>Ocurrencia Falla</b></th>
								<th class="factivilidadtecnica"><b>Complejidad</b></th>
								<th class="uma" id="umamuestra"><b>Prioridad UMA</b></th>
								<th><b>TOTAL (VT + FT + PU)</b></th>
								<th class="valoracioneconomica" id="valoracioneconomicamuestra"><b>Ultimo Precio</b></th>
								<th class="valoracioneconomica"><b>Valor Historico</b></th>
								<th class="valoracioneconomica"><b>Año VH</b></th>
								<th class="valoracioneconomica"><b>Valor Unitario Comercial</b></th>
								<th class="valoracioneconomica"><b>Año VUC</b></th>
								<th class="valoracioneconomica"><b>Cantidad Prioridad</b></th>
								<th class="valoracioneconomica"><b>Valor Total</b></th>
								<th class="valoracioneconomica"><b>Año Proxima Entrega</b></th>
								<th class="valoracioneconomica"><b>Contratar Compra</b></th>
								<th><b>Nombre Cluster</b></th>
								<th><b>Nombre Empresa</b></th>
								<th><b>Valor Unitario Oferta</b></th>
								<th><b>Tiempo Entrega Oferta</b></th>
								<th><b>Cantidad</b></th>
								<th><b>Valor Total Oferta</b></th>
								<th><b>Observaciones Oferta</b></th>
								<th><b>Año Oferta</b></th>
							</tr>
						</thead>
						<tbody>
						@foreach ($listDemandaPotencias as $demanda)
							@if($demanda->Nombre!='' && $demanda->Nombre!= null)
							<tr>
								<th>{{$demanda->Nombre}}</th>
								<th>{{$demanda->ParteNumero}}</th>
								<th>{{$demanda->Equipo}}</th>
								<th>{{$demanda->NSN}}</th>
								<th>{{$demanda->CodigoSAP}}</th>
								<th>{{$demanda->CodATA}}</th>
								<th>{{$demanda->PublicacionTecnica}}</th>
								<th>{{$demanda->Identificacion}}</th>
								<th>{{$demanda->Observaciones}}</th>
								<th>{{$demanda->NombreUnidad}}</th>
								<th class="valoraciontecnica">{{$demanda->TipoLista}}</th>
								<th class="valoraciontecnica">{{$demanda->AltaRotacion}}</th>
								<th class="valoraciontecnica">{{$demanda->BajoMTBF}}</th>
								<th class="valoraciontecnica">{{$demanda->AltosTiempos}}</th>
								<th class="valoraciontecnica">{{$demanda->DeficitExistencias}}</th>
								<th class="valoraciontecnica">{{$demanda->FabricanteOriginal}}</th>
								<th class="valoraciontecnica">{{$demanda->FlotaAntigua}}</th>
								<th class="valoraciontecnica">{{$demanda->VT}}</th>
								<th class="factivilidadtecnica">{{$demanta->Severidad}}</th>
								<th class="factivilidadtecnica">{{$demanda->OcurrenciaFalla}}</th>
								<th class="factivilidadtecnica">{{$demanda->Complejidad}}</th>
								<th class="uma">{{$demanda->PrioridadUMA}}</th>
								<th>{{$demanda->TOTAL}}</th>
								<th class="valoracioneconomica">@if($demanda->UltimoPrecio) ${{number_format($demanda->UltimoPrecio, 0, '', '.')}}@endif</th>
								<th class="valoracioneconomica">@if($demanda->ValorHistorico) ${{number_format($demanda->ValorHistorico, 0, '', '.')}}@endif</th>
								<th class="valoracioneconomica">{{$demanda->AñoVH}}</th>
								<th class="valoracioneconomica">@if($demanda->ValorUnitario) ${{number_format($demanda->ValorUnitario, 0, '', '.')}}@endif</th>
								<th class="valoracioneconomica">{{$demanda->AñoVUC}}</th>
								<th class="valoracioneconomica">{{$demanda->CantidadPrioridad}}</th>
								<th class="valoracioneconomica">@if($demanda->ValorTotal) ${{number_format($demanda->ValorTotal, 0, '', '.')}}@endif</th>
								<th class="valoracioneconomica">{{$demanda->AñoProximaEntrega}}</th>
								<th class="valoracioneconomica">{{$demanda->ContratarCompra}}</th>
								<th>{{$demanda->NombreCluster}}</th>
								<th>{{$demanda->NombreEmpresa}}</th>
								<th>{{$demanda->ValorUnitarioOferta}}</th>
								<th>{{$demanda->TiempoEntregaOferta}}</th>
								<th>{{$demanda->Cantidad}}</th>
								<th>{{$demanda->ValorTotaloferta}}</th>
								<th>{{$demanda->ObservacionesOferta}}</th>
								<th>{{$demanda->AñoOferta}}</th>
							</tr>
							@endif
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			</div>
			@endif
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