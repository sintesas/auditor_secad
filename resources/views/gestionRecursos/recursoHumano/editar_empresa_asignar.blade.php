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

{{-- {{ Breadcrumbs::render('asignar_usuario') }} --}}
Crear Usuario

@endsection()

@section('card-content')

{!! Form::model($user, ['route' => ['asignarusuarioEmpresa.update', $user->id], 'method' => 'PUT' ]) !!}

		{{ csrf_field()}}


<div class="row">

	<div style="margin-top: 60px; margin-bottom: 60px;" class="card-body floating-label">

		<div class="row">
			
			<div class="col-sm-6">
				<div class="form-group">
					{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa', 'required']) }}
					<label for="roles">Entidad</label>
				</div>
			</div>
					
		</div>
		<div class="row">

			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="text" name="name" required value="{{old('name', $user->name)}}" readonly>
					<label for="name">Nombres y Apellidos</label>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="email" name="email" required value="{{old('email', $user->email)}}" readonly>
					<label for="email">Email</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="password" name="password" >
					<label for="password">Contraseña</label>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="password" name="passwordverify" >
					<label for="password">Verificar Contraseña</label>
				</div>
			</div>	
		</div>

	</div>



	<div  class="row">
		@foreach ($perfil as $itemPerfil)
			@if ($itemPerfil->IdRol == 12)
			<div class="col-sm-6">	
				{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
			</div>	
			@endif
		@endforeach
		<div class="col-sm-6">	
			<button type="button" onclick="window.location='{{ route("asignarusuarioEmpresa.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>	
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
		$('select').select2();
		$('#datatable1').DataTable();
	});


	
	
</script>



@endsection()


@endsection()