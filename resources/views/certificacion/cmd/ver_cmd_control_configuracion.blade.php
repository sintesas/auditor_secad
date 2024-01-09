@extends('partials.card')

@extends('layout')

@section('title')
	Crear Niveles
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdcontrolconfiguracion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{ Breadcrumbs::render('crearbasecertificacion') }} --}}
		@endsection()

		@section('card-content')

		@if ($gl_perfil[12] != true && $gl_perfil[13] != true && $gl_perfil[1] != true)
			<style media="screen">
				.remove_item	{
					display: none !important;
				}
			</style>

		@endif
			<div class="card-body floating-label">

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input class="form-control" type="text" name="titulo" id="titulo" value="">
							<label for="titulo">Titulo</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<select class="form-control nivel" name="nivel" id="nivel" onchange="parent_change()">
								<option value="">Seleccionar</option>

							</select>
							<label for="nivel">Nivel</label>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="form-group">
							<select class="form-control" name="padre" id="padre">
								<option value="">Seleccionar</option>
							</select>
							<label for="padre">Nivel padre</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<button class="btn btn-primary" type="button" name="add" id="add" style="margin-bottom: 1rem;">Agregar</button>
						</div>
					</div>
					<div class="col-sm-12">
						<h4>Lista de niveles</h4>
						<ul id="lista">

						</ul>
					</div>
					<input type="hidden" name="cadena" id="cadena" value="{{$cadena}}">
				</div>
				<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$IdPrograma}}">
			</div>



			{{-- submit button --}}

			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
						</div>
						<div class="col-sm-6">
							<a href="{{route('cmdProgramas.index') }}" class="btn btn-danger btn-block">Cancelar</a>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$(window).bind("load", function() {
				$('#cke_10').hide();
			});
		</script>

		<script type="text/javascript">
			$('select').select2();

			$('#ckeditor').ckeditor();


		</script>

		<script type="text/javascript">
		$(document).on('ready', function(){
			cargar_lista();
		})

		$('#add').on('click', function(){
			var titulo = $('#titulo');
			var nivel = $('select[id=nivel]');
			var padre = $('select[id=padre]');
			var cadena = $('#cadena');
			var boton = $('#add');
			if (titulo.val()=='' || nivel.val()=='' || padre.val()=='') {
				var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_deficinicion"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
				boton.after(html);
			}
			else {
				if (cadena.val() == '')
				{
						cadena = [];
				}
				else {
						cadena = JSON.parse(cadena.val());
				}
				var id = Math.floor((Math.random() * 999999) + 1);
				var dato = {nn: cadena.length+1,id:id,titulo:titulo.val(), nivel:nivel.val(), padre:padre.val()};
				cadena.push(dato);
				$('#cadena').val(JSON.stringify(cadena));
				cargar_lista();
			}
		})

		function list_remove(valor) {
			var ini = valor.split('_');
			var item_remove = parseInt(ini[1]);
			var old_list = $('#cadena').val();
			var new_list = [];
			var cadena = JSON.parse(old_list);
			var i = 1;
			$.each(cadena, function(index, value){

				if(parseInt(value['id']) == item_remove){
					console.log('Removido item: '+item_remove+' '+value['texto']);
				}else{
					var tx = value['titulo'];
					var tt = value['id'];
					var nv = value['nivel'];
					var pd = value['padre'];
					var id = value['id'];
					var nn = i;
					i++;
					var dato = {nn: nn ,id:id, titulo:tx, nivel:nv, padre:pd};
					new_list.push(dato);
				}
			})
			$('#cadena').val(JSON.stringify(new_list));
			cargar_lista();

			if ($('#lista li').length == 0) {
				$('#lista').html('Aún no hay niveles.');
			}
		}

		function cargar_lista(){
			var titulo = $('#titulo');
			var nivel = $('select[id=nivel]');
			var padre = $('select[id=padre]');
			var new_list = [];
			var cadena = $('#cadena');
			$('#lista li').remove();
			$('#lista').html('');
			if (cadena.val() == '')
			{
					cadena = [];
			}
			else {
					cadena = JSON.parse(cadena.val());
			}
			var html = '';
			var nivelmax = 0;
			for(var i = 1;i<=7;i++){
				$.each(cadena, function(index, value){
					var tx = value['titulo'];
					var nn = value['nn'];
					var nv = value['nivel'];
					var id = value['id'];
					var pd = value['padre'];
					if(parseInt(nv)==i){
						var item = '<li id="nivel_'+id+'" nivel="'+nv+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'nivel_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul id="list_'+id+'"></ul></li>';
						if(i==1){
							$('#lista').append(item);
							var dato = {nn: nn ,id:id, titulo:tx, nivel:nv, padre:pd};
 	 						new_list.push(dato);
						}
						else{
							if($('#list_'+pd).length > 0){
								$('#list_'+pd).append(item);
								var dato = {nn: nn ,id:id, titulo:tx, nivel:nv, padre:pd};
								new_list.push(dato);
							}
						}
					}
					if (parseInt(nv)>nivelmax) {
						nivelmax = parseInt(nv);
					}
				//	html = html+item;
				})
			}
			if (cadena.length == 0) {
				$('#lista').html('Aún no hay niveles asignados');
			}
			$('#cadena').val(JSON.stringify(new_list));

			//$('#lista').html(html);
			$('#nivel option').remove();

			if (nivelmax == 7) {
				nivelmax = 6;
			}
			nivelmax = nivelmax+1;

			for(var i=1;i<=nivelmax;i++){

				var option = '<option value="'+i+'">'+i+'</option>';
				$('#nivel').append(option);
			}
			$('#padre option').remove();
			titulo.val('');
			nivel.val('');
			padre.val('');
			$('.select2-chosen').html('Seleccionar');
			$('#alert_deficinicion').remove();

		}

		function parent_change(){
			$('#padre option').remove();
			var cadena = $('#cadena');
			var nivel = $('select[id=nivel]');
			var option = '<option value="">Seleccionar</option>';
			$('#padre').append(option);
			if (cadena.val() != '' && nivel.val() !=1)
			{
					cadena = JSON.parse(cadena.val());
					$.each(cadena, function(index, value){
						var tx = value['titulo'];
						var id = value['id'];
						var nv = value['nivel'];
						if (nv == nivel.val()-1) {
							var option = '<option value="'+id+'">'+tx+'</option>';
							$('#padre').append(option);
						}
					})

			}
			if(nivel.val() == 1){
				var option = '<option value="ninguno">Ninguno</option>';
				$('#padre').append(option);
			}

		}

		</script>
		@endsection()

	@endsection()

@endsection()
