@extends('partials.card')

@extends('layout')

@section('title')
Asignar Usuarios
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('asignar_usuario') }}

@endsection()

@section('card-content')

<h2>
	<div class="form-group">
		<b>{{$user->name}}</b>
	</div>
</h2>

{!! Form::model($user, ['route' => ['perfil.update', $user->id], 'method' => 'PUT' ]) !!}

		{{ csrf_field()}}


<div class="row">

	<div style="margin-top: 60px; margin-bottom: 60px;" class="card-body floating-label">

		<div class="row">


			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="text" name="name" required value="{{old('name', $user->name)}}">
					<label for="name">Nombre</label>
				</div>
			</div>
			<div class="col-lg-12">
				<h3>Roles asignados</h3>
				<ul>
					@foreach($roles as $rol)
						<li>{{$rol->name}}</li>
					@endforeach
				</ul>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12">
				<h3>Actualizar contraseña</h3>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="password" name="password" >
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
			{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}
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




</script>



@endsection()


@endsection()
