@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Matriz Cumplimiento
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Matriz de Cumplimiento
		@endsection()

		@section('addcss')
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
		@endsection()

		@section('card-content')

		<h4><strong>Programa:</strong> {{$programa->Consecutivo}} - {{$programa->Proyecto}}</h4>
		<br>
		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover" >
					<thead>
						<tr>
							<th style="width: 120px;"><b>Norma</b></th>
							<th style="width: 300px;"><b>Nombre</b></th>
							<th><b>Sub-Parte</b></th>
							<th style="width:320px;"><b>Acciones</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach($normas as $norma)
						<tr>
							<td>{{$norma->Referencia}}</td>
							<td>{{$norma->Nombre}}</td>
							@if($norma->NombreSubparte != null || $norma->NombreSubparte != '')
							<td>
								{{$norma->NombreSubparte}}
							</td>
							<td>
								<button type="button" class="btn btn-warning" onclick="$('#detalle_{{$norma->idSubparteBaseCertificacion}}').toggle();">Ver detalles</button>
							</td>
								@else
								<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
								@endif
						</tr>
						@if($norma->NombreSubparte != null || $norma->NombreSubparte != '')
						<tr id="detalle_{{$norma->idSubparteBaseCertificacion}}" style="border: solid 2px black; display: none;">
							<td colspan="4" style="padding: 3rem;">
								<div class="row">

									<div class="col-sm-12">
										<h4>Mocs</h4>
										<ul id="list_mocs_{{$norma->idSubparteBaseCertificacion}}">
											@if($norma->mocs == null || $norma->mocs == '')
											Aun no hay Mocs.
											@else
											@php($i = 1)
											@php($mocs_list = json_decode($norma->mocs))
											@foreach($mocs_list as $moc)
											<li>{{$moc->titulo}}</li>
											@php($i++)
											@endforeach
											@endif
										</ul>
									</div>

									<div class="col-sm-12">
										<h4>Evidencia</h4>
										<ul>
											@if($norma->evidencia == null || $norma->evidencia == '')
											Aun no hay evidencias.
											@else
											@php($cadena = json_decode($norma->evidencia))
											@foreach($cadena as $evi)
											<li>
												<a href="/secad/Matriz de cumplimiento/Evidencias programa {{$programa->Consecutivo}}/Base {{$norma->IdBaseCertificacion}} - {{$norma->Referencia}} - {{$norma->idSubparteBaseCertificacion}}/{{$evi}}" target="_blank">{{$evi}}</a>
											</li>
											@endforeach
											@endif
										</ul>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="aprobado" name="aprobado" value="{{$norma->aprobado}}" readonly>
											<label for="aprobado">Aprobado</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="date" class="form-control" id="fecha" name="fecha" value="{{old('fecha', $norma->fecha)}}" readOnly>
											<label for="fecha">Fecha </label>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="nombresyapellidos" name="nombresyapellidos" value="{{old('nombresyapellidos', $norma->nombresyapellidos)}}" readOnly>
											<label for="nombresyapellidos">Nombres y apellidos</label>
										</div>
									</div>
									<div class="col-sm-12">
										<h4>Observaciones</h4>
										<div class="form-group">
											<textarea type="text" class="form-control border" id="observaciones" name="observaciones" rows="5" readonly style="padding: 1rem;">{{old('observaciones', $norma->observaciones)}}</textarea>
										</div>
									</div>

								</div>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->


		</div>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable2" class="table table-striped table-hover" style="display: none" >
					<thead>
						<tr>
							<th><b>Norma</b></th>
							<th><b>Nombre</b></th>
							<th><b>Sub-Parte</b></th>
							<th><b>Mocs</b></th>
							<th><b>Evidencia</b></th>
							<th><b>Aprobado</b></th>
							<th><b>Fecha</b></th>
							<th><b>Nombres y Apellidos</b></th>
							<th><b>Observación</b></th>
							<th><b>Firma</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach($normas as $norma)
						<tr>
							<td>{{$norma->Referencia}}</td>
							<td>{{$norma->Nombre}}</td>
							@if($norma->NombreSubparte != null || $norma->NombreSubparte != '')
							<td>
								{{$norma->NombreSubparte}}
							</td>
							<td>
								<ul>
									@if($norma->mocs == null || $norma->mocs == '')
									Aun no hay Mocs.
									@else
									@php($i = 1)
									@php($mocs_list = json_decode($norma->mocs))
									@foreach($mocs_list as $moc)
									<li>{{$moc->titulo}}</li>
									@php($i++)
									@endforeach
									@endif
								</ul>
							</td>
							<td>
								<ul>
									@if($norma->evidencia == null || $norma->evidencia == '')
									Aun no hay evidencias.
									@else
									@php($cadena = json_decode($norma->evidencia))
									@foreach($cadena as $evi)
									<li>
										<?php echo $_SERVER['SERVER_NAME']; ?>/secad/Matriz de cumplimiento/Evidencias programa {{$programa->Consecutivo}}/Base {{$norma->IdBaseCertificacion}} - {{$norma->Referencia}} - {{$norma->idSubparteBaseCertificacion}}/{{$evi}}
									</li>
									@endforeach
									@endif
								</ul>
							</td>
							<td>{{$norma->aprobado}}</td>
							<td>{{$norma->fecha}}</td>
							<td>{{$norma->nombresyapellidos}}</td>
							<td>{{$norma->observaciones}}</td>
							<td>{{$norma->firma}}</td>
							@else
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>
							<td>
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
							</td>

								@endif
						</tr>
						@endforeach
					</tbody>
				</table>
				<style media="screen">
				#datatable2_info, #datatable2_paginate, #datatable2_filter {
					display: none;
				}
				</style>

			</div><!--end .table-responsive -->

		</div>



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

	// $(document).ready(function(){
	// 	$('#datatable1').DataTable({
	// 		 "scrollX": true,
	// 		 "scrollY":        "400px",
  //      "scrollCollapse": true,
	// 	});
	// });

	$(document).ready(function() {
    $('#datatable2').DataTable( {
			dom: 'Bfxrtip',
			sPaginationType: "full_numbers",
				bProcessing: true,
			bAutoWidth: false,
			buttons: [
						 'excel',
						 ]
    } );
} );
</script>

@endsection()


@endsection()
