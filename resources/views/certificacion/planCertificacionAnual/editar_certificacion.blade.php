@extends('partials.card')

@extends('layout')

@section('title')
	Editar PCA
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($pca_info, ['route' => ['PlanCertificacion.update', $pca_info->id], 'method' => 'PUT', 'files' => true ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_pca')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">

				<div class="card">

              <div class="card-head card-head-sm style-primary">
                  <header>

										<ul class="nav nav-tabs style-primary" id="myTab" role="tablist">
										  <li class="nav-item active" role="presentation">
										    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
													información Básica
												</a>
										  </li>
										  <li class="nav-item" role="presentation">
										    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
													Prelimitanares
												</a>
										  </li>
											<li class="nav-item" role="presentation">
										    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#intro" role="tab" aria-controls="intro" aria-selected="false">
													Abreviaturas
												</a>
										  </li>
										</ul>

                  </header>
              </div><!--end .card-head -->
              <div class="card-body">
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<select class="form-control" id="Anio" name="Anio" required>
														<option value="">Seleccione año</option>
														@for ($i = 2012; $i <=$year+1; $i++)
															@if($i == $pca_info->anio)
															<option value="{{$i}}" selected>{{$i}}</option>
															@else
															<option value="{{$i}}">{{$i}}</option>
															@endif
														@endfor
													</select>
													<label for="Anio"> Año </label>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<select class="form-control" id="Edicion" name="Edicion" required>
														<option value="PRIMERA" @if('PRIMERA' == $pca_info->edicion) selected @endif>PRIMERA</option>
														<option value="SEGUNDA" @if('SEGUNDA' == $pca_info->edicion) selected @endif>SEGUNDA</option>
														<option value="TERCERA" @if('TERCERA' == $pca_info->edicion) selected @endif>TERCERA</option>
														<option value="CUARTA" @if('CUARTA' == $pca_info->edicion) selected @endif>CUARTA</option>
													</select>
													<label for="Edicion"> Edición </label>
												</div>
											</div>
											<div class="col-sm-12">
												<h1>Introducción</h1>
												<hr>
												<div class="form-group">
													<textarea class="form-control border" rows="10" id="introduccion" name="introduccion">{{old('introduccion', $pca_info->introduccion)}}</textarea>
												</div>
												<br>
											</div>
											<div class="col-sm-12">
												<h1>Objeto</h1>
												<hr>
												<div class="form-group">
													<textarea class="form-control border" rows="5" id="objeto" name="objeto">{{old('objeto', $pca_info->objeto)}}</textarea>
												</div>
												<br>
											</div>
											<div class="col-sm-12">
												<h1>Alcance</h1>
												<hr>
												<div class="form-group">
													<textarea class="form-control border" rows="5" id="alcance" name="alcance">{{old('alcance', $pca_info->alcance)}}</textarea>
												</div>
												<br>
											</div>
											<div class="col-sm-12">
												<h1>Contacto</h1>
												<hr>
												<div class="form-group">
													<textarea class="form-control border" rows="5" id="contacto" name="contacto">{{old('contacto', $pca_info->contacto)}}</textarea>
												</div>
												<br>
											</div>
										</div>
									</div>
								  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">
											<div class="col-sm-12">
												<h1>Resumen</h1>
												<hr>
												<div class="form-group">
													<textarea class="form-control border" rows="5" id="Preliminar" name="Preliminar">{{old('Preliminar', $pca_info->Preliminar)}}</textarea>
												</div>
												<br>
											</div>
											<div class="col-sm-12">
												<h1>Definiciones</h1>
												<hr>
												<div class="form-group">
													<input type="text" class="form-control border" id="ttl_definicion">
													<label for="ttl_definicion"> Titulo Definición</label>
												</div>
												<div class="form-group">
													<textarea class="form-control border" rows="3" id="txt_definicion"></textarea>
													<label for="txt_definicion"> Contenido Definición</label>
												</div>
												<input type="hidden" name="Definiciones" id="Definiciones" value="{{old('Definiciones', $pca_info->Definiciones)}}">
												<button type="button" class="btn btn-primary" style="margin-bottom:2rem;" id="add_definicion">Agregar</button>
												<hr>
												<br>
											</div>
											<div class="col-sm-12">
												<ul id="list_definicion">
													Aún no hay definiciones.
												</ul>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="intro" role="tabpanel" aria-labelledby="intro-tab">
										<div class="row">
											<div class="col-sm-12">
												<h1>Abreviaturas</h1>
												<hr>
												<div class="form-group">
													<input type="text" class="form-control mayuscula" id="ttl_abreviatura">
													<label for="ttl_abreviatura"> Titulo Abreviatura</label>
												</div>
												<div class="form-group">
													<textarea class="form-control border" rows="3" id="txt_abreviatura"></textarea>
													<label for="txt_abreviatura"> Contenido Definición</label>
												</div>
												<input type="hidden" name="Abreviaturas" id="Abreviaturas" value="{{old('Abreviaturas', $pca_info->Abreviaturas)}}">
												<button type="button" class="btn btn-primary" style="margin-bottom:2rem;" id="add_abreviatura">Agregar</button>
												<hr>
												<br>
											</div>
											<div class="col-sm-12">
												<ul id="list_abreviatura">
													Aún no hay abreviaturas.
												</ul>
											</div>
										</div>
									</div>
								</div>
              </div>
          </div>
			</div>

			{{-- submit button --}}

			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#basicModal">Actualizar</a>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("PlanCertificacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade mdl_notas" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Nota de Actualización</h4>
			      </div>
			      <div class="modal-body">
			        <div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea type="text" class="form-control border" id="Nota" name="Nota" rows="5" required></textarea>
									</div>
								</div>
			        </div>
							<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-info btn-block">Confirmar</button>
			      </div>
			    </div>
			  </div>
			</div>

		{!! Form::close() !!}

		{{-- SCRIPTS --}}

        {{-- Solo Numeros --}}
        <script src="{{URL::asset('js/soloNumeros.js')}}"></script>

        <script type="text/javascript">
            // Previw Img
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image_upload_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#inputFile").change(function () {
                readURL(this);
            });

            $('select').select2();

						//CONVERTIR A MAYUSCULAS

						$('.mayuscula').keyup(function(){
						    this.value = this.value.toUpperCase();
						});
						//AGREGAR DEFINICIÓN

						$('#add_definicion').on('click', function(){
							var titulo = $('#ttl_definicion');
							var texto = $('#txt_definicion');
							var cadena = $('#Definiciones').val();

							if (titulo.val() == '' || texto.val() == '') {
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

								var dato = {id: cadena.length+1 ,titulo:titulo.val(), texto:texto.val()};
								cadena.push(dato);
								$('#Definiciones').val(JSON.stringify(cadena));
								var html = '';
								$.each(cadena, function(index, value){
									var tt = value['titulo'];
									var tx = value['texto'];
									var id = value['id'];
										var item = '<li id="Definiciones_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
										html = html+item;
								})
								$('#list_definicion').html(html);
								titulo.val('');
								texto.val('');
								$('#alert_deficinicion').remove();
							}
						})
						function list_remove(valor) {
							var ini = valor.split('_');
							var item_remove = parseInt(ini[1]);
							var old_list = $('#Definiciones').val();
							var new_list = [];
							var cadena = JSON.parse(old_list);
							var i = 1;
							var html = '';
							$.each(cadena, function(index, value){

								if(parseInt(value['id']) == item_remove){
									console.log('Removido item: '+item_remove+' '+value['titulo']);
								}else{
									var tt = value['titulo'];
									var tx = value['texto'];
									var id = i;
									var item = '<li id="Definiciones_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
									html = html+item;
									i++;
									var dato = {id:id ,titulo:tt, texto:tx};
									new_list.push(dato);
								}
							})
							$('#Definiciones').val(JSON.stringify(new_list));
							$('#list_definicion').html(html);

							if ($('#list_definicion li').length == 0) {
								$('#list_definicion').html('Aún no hay definiciones.');
							}
						}



						//AGREGAR ABREVIATURA

						$('#add_abreviatura').on('click', function(){
							var titulo = $('#ttl_abreviatura');
							var texto = $('#txt_abreviatura');
							var cadena = $('#Abreviaturas').val();

							if (titulo.val() == '' || texto.val() == '') {
								var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_abreviatura"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$('#add_abreviatura').after(html);

							} else {
								if (cadena == '')
								{
										cadena = [];
								}
								else {
										cadena = JSON.parse(cadena);
								}

								var dato = {id: cadena.length+1 ,titulo:titulo.val(), texto:texto.val()};
								cadena.push(dato);
								$('#Abreviaturas').val(JSON.stringify(cadena));
								var html = '';
								$.each(cadena, function(index, value){
									var tt = value['titulo'];
									var tx = value['texto'];
									var id = value['id'];
										var item = '<li id="Abreviaturas_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove_abr(\'Abreviaturas_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
										html = html+item;
								})
								$('#list_abreviatura').html(html);
								titulo.val('');
								texto.val('');
								$('#alert_abreviatura').remove();
							}
						})
						function list_remove_abr(valor) {
							var ini = valor.split('_');
							var item_remove = parseInt(ini[1]);
							var old_list = $('#Abreviaturas').val();
							var new_list = [];
							var cadena = JSON.parse(old_list);
							var i = 1;
							var html = '';
							$.each(cadena, function(index, value){

								if(parseInt(value['id']) == item_remove){
									console.log('Removido Abreviatura: '+item_remove+' '+value['titulo']);
								}else{
									var tt = value['titulo'];
									var tx = value['texto'];
									var id = i;
									var item = '<li id="Abreviaturas_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove_abr(\'Abreviaturas_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
									html = html+item;
									i++;
									var dato = {id:id ,titulo:tt, texto:tx};
									new_list.push(dato);
								}
							})
							$('#Abreviaturas').val(JSON.stringify(new_list));
							$('#list_abreviatura').html(html);

							if ($('#list_abreviatura li').length == 0) {
								$('#list_abreviatura').html('Aún no hay abreviaturas.');
							}
						}

					$(document).ready(function() {

						//CARGAR ABREVIATURAS

						var cadena = $('#Abreviaturas').val();
						cadena = JSON.parse(cadena);
						var html = '';
						$.each(cadena, function(index, value){
							var tt = value['titulo'];
							var tx = value['texto'];
							var id = value['id'];
								var item = '<li id="Abreviaturas_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove_abr(\'Abreviaturas_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
								html = html+item;
						})
						$('#list_abreviatura').html(html);

						//CARGAR DEFINICIONES
						cadena = $('#Definiciones').val();
						cadena = JSON.parse(cadena);
						html = '';

						$.each(cadena, function(index, value){
							var tt = value['titulo'];
							var tx = value['texto'];
							var id = value['id'];
								var item = '<li id="Definiciones_'+id+'"><pre><b>'+tt+': </b>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
								html = html+item;
						})
						$('#list_definicion').html(html);
					})
        </script>
		@endsection()

	@endsection()

@endsection()
