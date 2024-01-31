@extends('partials.card')

@extends('layout')

@section('title')
Unidades
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('unidades') }}
			<!-- Begin Modal -->
			@if ($permiso->crear == 1)
			<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
			@endif
			@endsection()

		@section('card-content')

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Nombre Unidad</b></th>
							<th><b>Denominacion</b></th>
							<th><b>Ciudad</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($unidades as $unidad)
						@if ($permiso->consultar == 1)
						<tr class="unidad{{$unidad->IdUnidad}}">
							<td>{{$unidad->NombreUnidad}}</td>
							<td>{{$unidad->Denominacion}}</td>
							<td>{{$unidad->Ciudad}}</td>

							<td>
							@if ($permiso->eliminar == 1)
								<div class="col-sm-6">
									<button class="btn btn-danger btn-delete delete-record" value="{{$unidad->IdUnidad}}"><span class="glyphicon glyphicon-trash"></span></button>
								</div>
								@endif
								<div class="col-sm-6">
								@if ($permiso->actualizar == 1)
									<button class="btn btn-primary btn-default edit-modal" data-idunidad="{{$unidad->IdUnidad}}" data-nombre="{{$unidad->NombreUnidad}}" data-denominacion="{{$unidad->Denominacion}}" data-ciudad="{{$unidad->Ciudad}}" data-direccion="{{$unidad->Direccion}}" data-grado="{{$unidad->IdGrado}}" data-nomcomandante="{{$unidad->NombreComandante}}">
										<span class="fa fa-edit"></span>
									</button>
									@endif
								</div>
							</td>							
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:135px;">

	<div class="modal-content">


		<div class="card-head style-primary">
			<header>Creación de unidades</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'unidad.store')) !!}
				{{ csrf_field()}}
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group floating-label">	
							{{ Form::text('NombreUnidad', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('NombreUnidad', 'Nombre Unidad')}}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group floating-label">	
							{{ Form::text('Denominacion', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('Denominacion', 'Denominacion')}}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group floating-label">	
							{{ Form::text('Ciudad', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('Ciudad', 'Ciudad')}}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group floating-label">	
							{{ Form::text('Direccion', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('Direccion', 'Dirección')}}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group floating-label">	
							{{ Form::select('IdGrado', $grado->pluck('NombreGrado', 'IdGrado'), null, ['class' => 'form-control', 'id' => 'IdGrado']) }}
							{{ Form::label('IdGrado', 'Grado Comandante')}}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group floating-label">	
							{{ Form::text('NombreComandante', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('NombreComandante', 'Nombre Comandante')}}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group floating-label">	
							<button type="submit" class="btn btn-info btn-block">Crear</button>
						</div>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
{{-- END CREATEMODAL --}}


{{-- BEGIN EDIT MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Unidad</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">
					{{ csrf_field()}}

					<div class="card">
						<div class="card-body">

							{{-- empresa id hidden --}}

							<input type="hidden" id="IdUnidad" name="id">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group floating-label">	
										{{ Form::text('NombreUnidad', null, array('class' => 'form-control', 'required' => '', 'id' => 'NombreUnidad' )) }}
										{{ Form::label('NombreUnidad', 'Nombre Unidad')}}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group floating-label">	
										{{ Form::text('Denominacion', null, array('class' => 'form-control', 'required' => '', 'id' => 'Denominacion' )) }}
										{{ Form::label('Denominacion', 'Denominacion')}}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group floating-label">	
										{{ Form::text('Ciudad', null, array('class' => 'form-control', 'required' => '', 'id' => 'Ciudad' )) }}
										{{ Form::label('Ciudad', 'Ciudad')}}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group floating-label">	
										{{ Form::text('Direccion', null, array('class' => 'form-control', 'required' => '', 'id' => 'Direccion' )) }}
										{{ Form::label('Direccion', 'Dirección')}}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group floating-label">	
										{{ Form::select('IdGrado', $grado->pluck('NombreGrado', 'IdGrado'), null, ['class' => 'form-control', 'id' => 'IdGrado']) }}
										{{ Form::label('IdGrado', 'Grado Comandante')}}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group floating-label">	
										{{ Form::text('NombreComandante', null, array('class' => 'form-control', 'required' => '', 'id' => 'NombreComandante' )) }}
										{{ Form::label('NombreComandante', 'Nombre Comandante')}}
									</div>
								</div>
							</div>



						</div>
					</div>

				</form>

				<div class="modalfooter">
					<div class="col-sm-6">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class="glyphicon"></span>
						</button>
					</div>
					<div class="col-sm-6">
						<button type="button" class="btn cancelBtn" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</div>
				</div>



			</div>
		</div>

	</div>
</div>

{{-- END EDITMODAL --}}


@endsection()

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();

	$(document).on('click', '.edit-modal', function(){
        $('#footer_action_button').text("Actualizar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-info');
        $('.actionBtn').addClass('btn-block');    
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.cancelBtn').addClass('btn-danger');
        $('.cancelBtn').addClass('btn-block');    
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();

        // modal --> data-*
        
        $('#IdUnidad').val($(this).data('idunidad'))
        $('#NombreUnidad').val($(this).data('nombre'))
        $('#Denominacion').val($(this).data('denominacion'));
        $('#Ciudad').val($(this).data('ciudad'));
        $('#Direccion').val($(this).data('direccion'));
        $('#IdGrado').val($(this).data('grado'));
        $('#NombreComandante').val($(this).data('nomcomandante'));
        $('#myModal').modal('show');

    });



    $('.modalfooter').on('click', '.edit', function(){

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

    	$.ajax({

    		type: 'post',
    		url: 'editunidad',
    		data: {
    			// '_token': $('input[name=_token]').val(),
    			'idunidad': $("#IdUnidad").val(),
    			'nombre': $("#NombreUnidad").val(),
    			'denominacion': $("#Denominacion").val(),
    			'ciudad': $("#Ciudad").val(),
    			'direccion': $("#Direccion").val(),
    			'grado': $("#IdGrado").val(),
    			'nomcomandante': $("#NombreComandante").val()

    		},

    		success: function(data){
    			$('.unidad' + data.IdUnidad).replaceWith("<tr class='unidad" + data.IdUnidad + "'> <td>" + data.NombreUnidad + "</td><td>" + data.Denominacion + "</td> <td> "+ data.Ciudad +" </td> <td> <div class='col-sm-6'><button class='delete-modal btn btn-danger' data-id='" + data.IdUnidad + "' ><span class='glyphicon glyphicon-trash'></span></button></div> <div class='col-sm-6'> <button class='btn btn-primary btn-default edit-modal' data-idunidad='" + data.IdUnidad + "' data-nombre='" + data.NombreUnidad + "' data-denominacion='" + data.Denominacion + "' data-ciudad='" + data.Ciudad + "' data-direccion= '" + data.Direccion + "' data-grado='" + data.IdGrado + "'><span class='glyphicon glyphicon-edit'></span></button> </div> </td> </tr>");
    		}
    	});
    });


// END EDIT

// START DELETE

$(document).on('click','.delete-record',function(){
        
        var idunidad = $(this).val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
         
        $.ajax({
            type: "DELETE",
            url: 'deleteunidad' + '/' + idunidad,
            success: function (data) {
                console.log(data);
                $(".unidad" + idunidad).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
});


</script>

@endsection()

@endsection()