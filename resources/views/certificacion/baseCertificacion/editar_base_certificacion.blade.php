@extends('partials.card')

@extends('layout')

@section('title')
	Editar Base Certificación
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($baseCertificacion, ['route' => ['baseCertificacion.update', $baseCertificacion->IdBaseCertificacion], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('editarbasecertificacion') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{old('Nombre', $baseCertificacion->Nombre)}}">
							<label for="Nombre">Nombre Norma</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Referencia" name="Referencia" required value="{{old('Referencia', $baseCertificacion->Referencia)}}">
							<label for="Referencia">Referencia</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaEnmienda" name="FechaEnmienda" required value="{{old('FechaEnmienda', $baseCertificacion->FechaEnmienda)}}">
									<label for="Fecha">Fecha Enmienda</label>
								</div>
								<span class="input-group-addon"></span>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">

							<input type="text" class="form-control" id="ClaseCertificacion" name="ClaseCertificacion" required value="{{old('ClaseCertificacion', $baseCertificacion->ClaseCertificacion)}}">
							<label for="Referencia">Clase</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							{{ Form::select('IdOrigen', $origen->pluck('Descripcion', 'IdOrigen'), null, ['class' => 'form-control', 'id' => 'IdOrigen']) }}
							<label for="IdOrigen">Origen</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Autoridad" name="Autoridad" required value="{{old('Autoridad', $baseCertificacion->Autoridad)}}">
							<label for="Autoridad">Autoridad</label>
						</div>
					</div>

				</div>


				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Aplicacion" name="Aplicacion" required value="{{old('Aplicacion', $baseCertificacion->Aplicacion)}}">
							<label for="Aplicacion">Aplicación</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="1">{{old('Observaciones', $baseCertificacion->Observaciones)}}</textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<!--AGREGAR CAPITULOS Y SUBPARTES-->

				<div class="row">
					<h4>Opción para agregar la Estructura de Capítulos o subpartes de la Norma</h4>
					<div class="col-sm-12" style="padding-top: 3rem;">
						<div class="form-group">
							<input type="text" class="form-control" name="titulo" id="titulo" style="width:80%;">
						<input type="hidden" name="capitulos" id="capitulos" value="{{$cadena}}">
						<label for="titulo">Ingresa el nombre del capitulo o subparte</label>
						<button type="button" class="btn btn-primary" style="margin:1rem;" id="add_definicion">Agregar</button>
						<hr>
						<br>
					</div>
				</div>

				<div class="col-sm-12">
					<ul id="list_basecerti">
					 @php($cant = count($capitulos))
						 @if($cant>0)
						 @php($i = 1)
							@foreach($capitulos as $capitulo)
									<li id="Definiciones_{{$i}}"><pre>{{$capitulo->NombreSubparte}}</pre><button type="button" class="close remove_item" onclick="list_remove('Definiciones_{{$i}}')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
									@php($i++)
							@endforeach
						@else
							Aún no hay capitulos ni subpartes.
						@endif
					</ul>
				</div>
			</div>

			</div>

			{{-- submit button --}}

			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Editar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("baseCertificacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
			$('#ckeditor').ckeditor();

			// By default, CKEditor add a WYSIWEG editor to all content with the contenteditable set to true
			// To be able to demo Summernote on this page, this function is disabled.
			CKEDITOR.disableAutoInline = true;
			if ($('#inlineContent1').length > 0)
				CKEDITOR.inline('inlineContent1');
			if ($('#inlineContent2').length > 0)
				CKEDITOR.inline('inlineContent2');



				//AGREGAR ESTRUCTURA O SUBPARTE

				$('#add_definicion').on('click', function(){
					var titulo = $('#titulo');

					var cadena = $('#capitulos').val();

					if (titulo.val() == '') {
						var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_deficinicion"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						$('#add_definicion').after(html);

					} else {
						if (cadena == '')
						{
								cadena = [];
						}
						else {
								cadena = JSON.parse(cadena);
						}

						var dato = {nn: cadena.length+1 ,titulo:titulo.val()};
						cadena.push(dato);
						$('#capitulos').val(JSON.stringify(cadena));
						var html = '';
						$.each(cadena, function(index, value){

							var tx = value['titulo'];
							var id = value['nn'];
								var item = '<li id="Definiciones_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
								html = html+item;
						})
						$('#list_basecerti').html(html);
						titulo.val('');
						$('#alert_deficinicion').remove();
					}
				})
				function list_remove(valor) {
					var ini = valor.split('_');
					var item_remove = parseInt(ini[1]);
					var old_list = $('#capitulos').val();
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
							var item = '<li id="Definiciones_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
							html = html+item;
							i++;
							var dato = {nn:id ,titulo:tx};
							new_list.push(dato);
						}
					})
					$('#capitulos').val(JSON.stringify(new_list));
					$('#list_basecerti').html(html);

					if ($('#list_basecerti li').length == 0) {
						$('#list_basecerti').html('Aún no hay capitulos ni subpartes.');
					}
				}

		</script>
		@endsection()

	@endsection()

@endsection()
