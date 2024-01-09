@extends('partials.card')

@extends('layout')

@section('title')
	Ver Riesgos - Programas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('riesgo_crear') }}
		@endsection()

		@section('addcss')
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
		@endsection()

		@section('card-content')
		<style>
			.table-responsive {
				overflow-x: scroll !important;
			}
		</style>

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
							<th><b>#</b></th>
							<th><b>FECHA</b></th>
							<th><b>ORIGINADOR</b></th>
							<th><b>TIPO</b></th>
							<th><b>CLASIFICACIÓN DE LA AVERÍAS</b></th>
							<th style="min-width:150px"><b>ACCIÓN INMEDIATA PROPUESTA</b></th>
							<th style="min-width:150px"><b>INVESTIGACIÓN LLEVADA A CABO</b></th>
							<th><b>DESCARGAR DOCUMENTACIÓN ANEXA</b></th>
							<th><b>CONDICIÓN INSEGURA</b></th>
							<th style="min-width:200px"><b>Se emite una Directiva de Aeronavegabilidad (DA)</b></th>
							<th style="min-width:80px"><b>Anexo Directiva de Aeronavegabilidad</b></th>
							<th style="min-width:150px"><b>Se emiten Boletines de Servicio</b></th>
							<th><b>Tipo de Boletines</b></th>
							<th style="min-width:500px"><b> Otras acciones correctivas propuestos o cualquier otra Instrucción Regulatoria y de Servicio (IRS) requeridas</b></th>
							<th><b>Anexo Boletines</b></th>
						</tr>
					</thead>
					<tbody>
						@if(count($riesgos)==0)
						<tr>
							<td colspan="15">Aún no hay riesgos creados.</td>
						</tr>
						@else
						@php($i=1)
						@foreach ($riesgos as $riesgo)
						<tr>
							<td>{{$i}}</td>
							<td>{{$riesgo->fecha}}</td>
							<td>{{$riesgo->NombreEmpresa}}</td>
							<td>{{$riesgo->Tipo_originador}}</td>
							<td>{{$riesgo->Clase_averia}}</td>
							<td>{{$riesgo->Accion}}</td>
							<td>{{$riesgo->Investigacion_llevada}}</td>
							<td>
								<b>FECHA: </b>{{$riesgo->Anexo_fecha}}<br>
								<b>DESCRIPCIÓN ANEXO: </b>{{$riesgo->Anexo_texto}}<br>
								@if($riesgo->Anexo_archivos != '' && $riesgo->Anexo_archivos != null)
								<ul>
									@foreach(json_decode($riesgo->Anexo_archivos) as $anexo)
									<li><a target="_blank" href="/secad/Riesgos/Riesgo_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$anexo}}">http://{{$_SERVER["HTTP_HOST"]}}/secad/Riesgos/Riesgo_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$anexo}}</a></li>
									@endforeach
								</ul>
								@endif
							</td>
							<td>{{$riesgo->Condicion_segura}}</td>
							<td>{{$riesgo->Directiva_aeronavegabilidad}}</td>
							<td>
								<b>Código Directiva: </b>{{$riesgo->Directiva_codigo}}<br>
								@if($riesgo->Directiva_anexos != '' && $riesgo->Directiva_anexos != null)
								<a target="_blank" href="/secad/Riesgos/Riesgo_seguimiento_directivas_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Directiva_anexos}}">http://{{$_SERVER["HTTP_HOST"]}}/secad/Riesgos/Riesgo_seguimiento_directivas_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Directiva_anexos}}</a>
								@endif
							</td>
							<td>{{$riesgo->Boletines}}</td>
							<td>{{$riesgo->Boletines_tipo}}</td>
							<td>{{$riesgo->Boletines_otros_irs}}</td>
							<td>
								@if($riesgo->Boletines_anexos != '' && $riesgo->Boletines_anexos != null)
								<a target="_blank" href="/secad/Riesgos/Riesgo_seguimiento_boletines_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Boletines_anexos}}">http://{{$_SERVER["HTTP_HOST"]}}/secad/Riesgos/Riesgo_seguimiento_boletines_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$riesgo->Boletines_anexos}}</a>
								@endif
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
</script>

@endsection()


@endsection()
