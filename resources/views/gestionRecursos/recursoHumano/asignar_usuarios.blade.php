@extends('partials.card')

@extends('layout')

@section('title')
Asignar Usuarios
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
<style media="screen">
.floating-label h2 {
	border-bottom: solid 1px #2a2a2a2a;
	padding-bottom: 1rem;
	text-transform: uppercase;
	font-weight: 500;
	color: #295484;
}
</style>
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('asignar_usuario') }}

@endsection()

@section('card-content')

<h2>
	<div class="form-group">
		<b>{{$persona->Nombres}}  {{$persona->Apellidos}} </b>
	</div>
</h2>

{!! Form::open(array('route' => 'asignarusuario.store')) !!}

		{{ csrf_field()}}

		<input type="hidden" name="nombres" value="{{$persona->Nombres}}" >
		<input type="hidden" name="apellidos" value="{{$persona->Apellidos}}">
		<input type="hidden" name="email" value="{{$persona->Email}}">
		<input type="hidden" name="IdPersonal" value="{{$persona->IdPersonal}}">


<div class="row">

	<div style="margin-top: 60px; margin-bottom: 60px;" class="card-body floating-label">

		<div class="row">
			<div class="col-lg-12" style="font-size: 1.5rem;padding-bottom: 2rem;">
				<h2>Asignar Roles</h2>
					Selecciona o elimina los roles a asignar para el usuario:
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					{{ Form::select('idrole', $roles->prepend('none')->pluck('name', 'id'), null, ['class' => 'form-control', 'id' => 'rol']) }}
					<label for="roles">Roles</label>
				</div>
			</div>

		<div class="col-sm-8">
			<div class="form-group">
				@php($json_cadena = json_encode($cadena))
				<input type="hidden" name="roles" id="roles" value="{{$json_cadena}}">
				<button type="button" class="btn btn-primary" style="margin-bottom:2rem;" id="add_rol" onclick="addrol()">Agregar</button>
			</div>
		</div>

		<div class="col-sm-12">
			<ul id="list_roles">
			 @php($cant = count($cadena))
				 @if($cant>0)
				 @for($i=0; $i < $cant; $i++)
				 <li id="rol_{{$cadena[$i]['nn']}}"><pre>{{$cadena[$i]['texto']}}</pre><button type="button" class="close remove_item" onclick="list_remove('rol_{{$cadena[$i]['nn']}}')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
				 @endfor
				@else
					Aún no hay roles.
				@endif
			</ul>
		</div>

		<div class="col-lg-12">
			<h2>Cambiar Contraseña</h2>
		</div>

			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="password" name="password">
					<label for="password">Contraseña</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="password" name="passwordverify">
					<label for="password">Verificar Contraseña</label>
				</div>
			</div>
		</div>

	</div>

	<div  class="row">
		<div class="col-sm-6">
			{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}
		</div>
		<div class="col-sm-6">
			<button type="button" onclick="window.location='{{ route("asignarusuario.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
		</div>
	</div>

</div>

{!! Form::close() !!}

@endsection()

@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('js/edit.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});

	//AGREGAR BASE DE CERTIFICACIÓ

	function addrol(){
		console.log('si coge');
		var titulo = $('select[id=rol]');

		var cadena = $('#roles').val();

		if (titulo.val() == '') {
			var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_rol"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			$('#add_rol').after(html);

		} else {
			var texto = $('#rol option[value='+titulo.val()+']').html();
			if (cadena == '')
			{
					cadena = [];
			}
			else {
					cadena = JSON.parse(cadena);
			}
			var sw=0;
			$.each(cadena, function(index, value){
				if(value['id']==titulo.val()){
					sw=1;
				}
			})
			if(sw==1){
				alert('El rol '+texto+' ya se encuentra asignado.')
			}
			else{
				var dato = {nn: cadena.length+1 ,id:titulo.val(), texto:texto};
				cadena.push(dato);
			}

			$('#roles').val(JSON.stringify(cadena));
			var html = '';
			$.each(cadena, function(index, value){

				var tx = value['texto'];
				var id = value['nn'];
					var item = '<li id="rol_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'rol_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
					html = html+item;
			})
			$('#list_roles').html(html);
			titulo.val('');
			$('#alert_rol').remove();
		}
	}
	function list_remove(valor) {
		var ini = valor.split('_');
		var item_remove = parseInt(ini[1]);
		var old_list = $('#roles').val();
		var new_list = [];
		var cadena = JSON.parse(old_list);
		var i = 1;
		var html = '';
		$.each(cadena, function(index, value){

			if(parseInt(value['nn']) == item_remove){
				console.log('Removido item: '+item_remove+' '+value['texto']);
			}else{
				var tx = value['texto'];
				var tt = value['id'];
				var id = i;
				var item = '<li id="rol_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'rol_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
				html = html+item;
				i++;
				var dato = {nn:id ,id:tt, texto:tx};
				new_list.push(dato);
			}
		})
		$('#roles').val(JSON.stringify(new_list));
		$('#list_roles').html(html);

		if ($('#list_roles li').length == 0) {
			$('#list_roles').html('Aún no hay roles.');
		}
	}




</script>



@endsection()


@endsection()
