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

{!! Form::open(array('route' => 'asignarusuarioEmpresa.store')) !!}

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

			<div class="col-sm-6">
				<div class="form-group">
					<select id="Personal" name="Personal" class="form-control" aria-required="true">
						<option value="" selected="selected"></option>
					</select>
					<label for="Personal">Personal ?</label>
				</div>
			</div>
					
		</div>
		<div class="row">
			<div class="col-sm-6" id="libre">
				<div class="form-group">
					<input class="form-control" type="text" name="name" id="name" required minlength="15" maxlength="60">
					<label for="name">Nombres y Apellidos</label>
					<span></span>
				</div>
			</div>
			
			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="email" name="email" id="email" required>
					<label for="email">Email</label>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="password" name="password" required autocomplete="off">
					<label for="password">Contraseña</label>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<input class="form-control" type="password" name="passwordverify" required autocomplete="off">
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
			<button type="button" onclick="window.location='{{ route("asignarusuarioEmpresa.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>	
		</div>										
	</div>

</div>	

{!! Form::close() !!}

	<script type="text/javascript">
		$(document).ready(function(){
			$('select').select2();
			$('#libre').show();
		});

		$('#IdEmpresa').change(function(event) {
			$('#name').val('');
			$('#email').val('');
			if (event.target.value != "")
			{
				$.get("funcionariosEmpresa/" + event.target.value + "", function(response){
					
					$('#Personal').empty();
					$('#Personal').append('<option value="" selected="selected"></option>');
					for(i=0; i<response.length; i++){

						if(response[i].Email == ''){
							$('#Personal').append('<option value="' + i + '">' +  response[i].Nombres + '</option>');
						}else{
							$('#Personal').append('<option value="' + response[i].Email + '">' +  response[i].Nombres + '</option>');
						}
					}
				});
			}
		});

		$('#Personal').change(function(event) {
			$('#name').val('');
			$('#email').val('');
			if (event.target.value != "")
			{
				$('#email').attr('readonly', true); 
				$('#name').attr('readonly', true); 
				$('#name').val($( "#Personal option:selected" ).text());
				var email = $('#email').val(event.target.value);
				if(email.length < 4){
					$('#email').attr('readonly', false); 
				}
			}else{
				$('#name').val($( "#Personal option:selected" ).text());
				$('#email').attr('readonly', false); 
				$('#name').attr('readonly', false); 
			}
		});
	</script>

@endsection()

@endsection()

@section('addjs')





@endsection()


@endsection()