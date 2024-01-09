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

		@section('card-content')
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}} - {{$programa->Proyecto}}</h4>

<div id="output"></div>
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
							<td>
								@if($norma->NombreSubparte != null || $norma->NombreSubparte != '')
								{{$norma->NombreSubparte}}
								@else
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
								@endif
							</td>
							<td>
								@if($norma->NombreSubparte != null || $norma->NombreSubparte != '')
								<div class="row">
									<div class="col-lg-5">
										<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#mdl_anexo_{{$norma->idSubparteBaseCertificacion}}">Anexos/MOC</a>
									</div>
									<div class="col-lg-5">
										<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#mdl_aprobacion_{{$norma->idSubparteBaseCertificacion}}">Aprobación</a>
									</div>
								</div>
								<div class="modal fade mdl_notas" id="mdl_anexo_{{$norma->idSubparteBaseCertificacion}}" tabindex="-1" role="dialog" aria-labelledby="mdl_anexo_{{$norma->IdBaseCertificacion}}" aria-hidden="true">
									{!! Form::model($norma, ['route' => ['matrizCumplimiento.update_anexos', $norma->idSubparteBaseCertificacion], 'method' => 'PUT', 'files' => true, 'id' => 'frmAnexo_'.$norma->idSubparteBaseCertificacion ]) !!}
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">MOC / ANEXOS <br> {{$norma->Referencia}} - {{$norma->Nombre}} <br> {{$norma->NombreSubparte}}</h4>
											</div>
											<div class="modal-body">
												<div class="row">

													<div class="col-sm-12">
														<div class="form-group">
															<select class="form-control" id="slmoc_{{$norma->idSubparteBaseCertificacion}}" name="moc">
																<option value="">Seleccionar</option>
																@foreach($mocs as $moc)
																<option value="{{$moc->Medio}} - {{$moc->CodigoAC2324}} - {{$moc->DescripcionAC2324}}">{{$moc->Medio}} - {{$moc->CodigoAC2324}} - {{$moc->DescripcionAC2324}}</option>
																@endforeach
															</select>
															<label for="moc"> MOC </label>
														<input type="hidden" name="jsmocs" id="jsmocs_{{$norma->idSubparteBaseCertificacion}}" value="{{$norma->mocs}}">
														<button type="button" class="btn btn-primary" style="margin:1rem;" id="add_{{$norma->idSubparteBaseCertificacion}}" onclick="agregar({{$norma->idSubparteBaseCertificacion}})">Agregar</button>
														<hr>
													</div>
												</div>

												<div class="col-sm-12">
													<ul id="list_mocs_{{$norma->idSubparteBaseCertificacion}}">
														@if($norma->mocs == null || $norma->mocs == '')
 													 Aun no hay Mocs.
 													 @else
													 @php($i = 1)
 													 @php($mocs_list = json_decode($norma->mocs))
															@foreach($mocs_list as $moc)
																	<li id="item_{{$norma->idSubparteBaseCertificacion}}_{{$i}}"><pre>{{$moc->titulo}}</pre><button type="button" class="close remove_item" onclick="list_remove('item_{{$norma->idSubparteBaseCertificacion}}_{{$i}}',{{$norma->idSubparteBaseCertificacion}})" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
																	@php($i++)
															@endforeach
														@endif
													</ul>
												</div>

													<div class="col-sm-12">
														Por favor selecciones las imagenes y documentos de evidencia.
														<div class="form-group">
															<input type="file" class="form-control border" id="anexos" name="anexos[]" multiple>
															<label for="anexos"></label>
														</div>
													</div>
													<div class="col-sm-12">
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

								<div class="modal fade mdl_notas" id="mdl_aprobacion_{{$norma->idSubparteBaseCertificacion}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
									{!! Form::model($norma, ['route' => ['matrizCumplimiento.update_aprobacion', $norma->idSubparteBaseCertificacion], 'method' => 'PUT', 'files' => true]) !!}
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">APROBACIÓN<br>{{$norma->Referencia}} - {{$norma->Nombre}} <br> {{$norma->NombreSubparte}}</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<select class="form-control" name="aprobado" id="aprobado">
																<option value="">Seleccionar</option>
																<option value="SI" @if($norma->aprobado == 'SI') selected @endif>SI</option>
																<option value="NO" @if($norma->aprobado == 'NO') selected @endif>NO</option>
															</select>
															<label for="aprobado">Aprobado</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="date" class="form-control" id="fecha" name="fecha" required value="{{old('fecha', $norma->fecha)}}">
															<label for="fecha">Fecha </label>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<input type="text" class="form-control" id="nombresyapellidos" name="nombresyapellidos" required value="{{old('nombresyapellidos', $norma->nombresyapellidos)}}">
															<label for="nombresyapellidos">Nombres y apellidos</label>
														</div>
													</div>
													<div class="col-sm-12">
														<h4>Observaciones</h4>
														<div class="form-group">
															<textarea type="text" class="form-control border" id="observaciones" name="observaciones" rows="5" required>{{old('observaciones', $norma->observaciones)}}</textarea>
														</div>
													</div>
													<input type="hidden" name="programa" value="{{$programa->IdPrograma}}">
												</div>
												<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-info btn-block">Confirmar</button>
											</div>
										</div>
									</div>
									{!! Form::close() !!}
								</div>

								@else
								<p style="color:red; font-size: 1.2rem;">La norma no tiene capitulos ni subpartes asignadas</p>
								@endif
							</td>


						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->

			<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}">
		</div><!--end .col -->

		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});

	//AGREGAR ESTRUCTURA O SUBPARTE

	function agregar(lista){
		var titulo = $('select[id=slmoc_'+lista+']');

		var cadena = $('#jsmocs_'+lista).val();

		if (titulo.val() == '') {
			var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_'+lista+'"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			$('#add_'+lista).after(html);

		} else {
			var sw = 0;

			if (cadena == '')
			{
					cadena = [];
			}
			else {
					cadena = JSON.parse(cadena);
					$.each(cadena, function(index, value){
						if (value['titulo']==titulo.val()) {
							sw = 1;
						}
					})
			}

			if (sw == 1) {
				var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_'+lista+'"><strong>Cuidado!</strong> El Moc ya existe en la lista.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				$('#add_'+lista).after(html);
			}
			else {
				var dato = {nn: cadena.length+1 ,titulo:titulo.val()};
				cadena.push(dato);
				$('#jsmocs_'+lista).val(JSON.stringify(cadena));
				var html = '';
				$.each(cadena, function(index, value){

					var tx = value['titulo'];
					var id = value['nn'];
					var item = '<li id="item_'+lista+'_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'item_'+lista+'_'+id+'\', '+lista+')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
					html = html+item;
				})
				$('#list_mocs_'+lista).html(html);
				titulo.val('');
				$('#alert_'+lista).remove();
			}
		}
	}

	function list_remove(valor, lista) {
		var ini = valor.split('_');
		var item_remove = parseInt(ini[2]);
		var old_list = $('#jsmocs_'+lista).val();
		var new_list = [];
		var cadena = JSON.parse(old_list);
		var i = 1;
		var html = '';
		$.each(cadena, function(index, value){

			if(parseInt(value['nn']) == item_remove){
				console.log('Removido item: '+item_remove+' '+value['titulo']);
			}else{
				var tx = value['titulo'];
				var id = i;
				var item = '<li id="item_'+lista+'_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'item_'+lista+'_'+id+'\', '+lista+')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
				html = html+item;
				i++;
				var dato = {nn:id ,titulo:tx};
				new_list.push(dato);
			}
		})
		$('#jsmocs_'+lista).val(JSON.stringify(new_list));
		$('#list_mocs_'+lista).html(html);

		if ($('#list_mocs_'+lista+' li').length == 0) {
			$('#list_mocs_'+lista).html('Aún no hay Mocs.');
		}
	}
</script>

@endsection()


@endsection()
