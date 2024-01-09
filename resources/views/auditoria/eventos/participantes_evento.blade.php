@extends('partials.card')

@extends('layout')

@section('title')
	Participantes Evento
@endsection()

@section('addcss')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')


@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('participantes_evento') }}
@if(count($participantes)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($participantes)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen participantes, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else


	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Cedula</b></th>
					<th><b>Fecha</b></th>
					<th><b>Grado</b></th>
					<th><b>Telefono</b></th>
					<th><b>Email</b></th>
					<th><b>Accion</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach ($participantes as $participante)
				<tr class="participante{{$participante->IdParticipante}}">

					<td>{{$participante->Nombre}}</td>
					<td>{{$participante->CC}}</td>
					<td>{{$participante->Fecha}}</td>
					<td>{{$participante->Grado}}</td>
					<td>{{$participante->Telefono}}</td>
					<td>{{$participante->Email}}</td>

					<td>
						<div class="col-sm-6">
							<button class="btn btn-danger btn-delete delete-record" value="{{$participante->IdParticipante}}"><span class="glyphicon glyphicon-trash"></span></button>

						</div>
						<div class="col-sm-6">
							<button class="edit-modal btn btn-info" data-idparticipante="{{$participante->IdParticipante}}" data-idevento="{{$evento->IdEvento}}" data-nombre="{{$participante->Nombre}}" data-cc="{{$participante->CC}}" data-fecha="{{$participante->Fecha}}" data-grado="{{$participante->Grado}}" data-telefono="{{$participante->Telefono}}" data-email="{{$participante->Email}}" data-idorigen="{{$participante->IdOrigen}}">
                    			<span class="glyphicon glyphicon-edit"></span> Editar
                			</button>
						</div>
					</td>


				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
@endif
</div>


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Participante</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'participantesevento.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cNombre" name="Nombre" required>
									<label for="Nombre">Nombre</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cCC" name="CC" required>
									<label for="CC">Cedula</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group date" id="demo-date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<div class="input-group-content">
										<input style="width: 80%;" id="cFecha" name="Fecha" type="text" class="form-control">
									</div>
								</div>
							</div>


							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cIdOrigen" name="IdOrigen" required>
									<label for="cIdOrigen">Id Origen</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cGrado" name="Grado" required>
									<label for="Grado">Grado</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cTelefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>

							<input type="hidden" value="{{$evento->IdEvento}}" name="IdEvento">


						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="email" class="form-control" id="cEmail" name="Email" required>
									<label for="Email">Email</label>
								</div>
							</div>
						</div>


					</div> {{-- card body --}}

				</div> {{-- card --}}


				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
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

{{-- END CREATE MODAL --}}


{{-- BEGIN EDIT MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Participante</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">

  						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Nombre" name="Nombre" required>
									<label for="Nombre">Nombre</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="CC" name="CC" required>
									<label for="CC">Cedula</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group date" id="demo-date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<div class="input-group-content">
										<input style="width: 80%;" id="Fecha" name="Fecha" type="text" class="form-control">
									</div>
								</div>
							</div>


							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="IdOrigen" name="IdOrigen" required>
									<label for="IdOrigen">Id Origen</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Grado" name="Grado" required>
									<label for="Grado">Grado</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Telefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>

							<input type="hidden" id="IdParticipante" name="IdParticipante">


						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="email" class="form-control" id="Email" name="Email" required>
									<label for="Email">Email</label>
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


{{-- END EDIT MODAL --}}



@endsection()

@section('addjs')

<script>

	$(document).ready(function(){

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


        $('#IdParticipante').val($(this).data('idparticipante'));
        $('#Nombre').val($(this).data('nombre'));
        $('#CC').val($(this).data('cc'));
        $('#Fecha').val($(this).data('fecha'));
        $('#Grado').val($(this).data('grado'));
        $('#Telefono').val($(this).data('telefono'));
        $('#Email').val($(this).data('email'));
        $('#IdOrigen').val($(this).data('idorigen'));
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
    		url: '/editparticipante',
    		data: {

			'id': $("#IdParticipante").val(),
			'nombre': $("#Nombre").val(),
			'cc': $("#CC").val(),
			'fecha': $("#Fecha").val(),
			'idorigen': $("IdOrigen").val(),
			'grado': $("#Grado").val(),
			'telefono': $("#Telefono").val(),
			'email': $("#Email").val(),

    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.participante' + data.IdParticipante).replaceWith("<tr class='participante" + data.IdParticipante + "'><td>"+data.Nombre+"</td> <td>" + data.CC + "</td> <td>" + data.Fecha +"</td> <td> "+ data.Grado +" </td> <td> "+data.Telefono+"</td> <td> "+data.Email+"</td> <td><div class='col-sm-6'><button class='delete-modal btn btn-danger' data-idparticipante='" + data.IdParticipante + "' ><span class='glyphicon glyphicon-trash'></span> </button></div><div class='col-sm-6'> <button class='edit-modal btn btn-info' data-idparticipante='"+ data.IdParticipante +"' data-idevento='"+data.IdEvento+"' data-nombre='"+data.IdEvento+"' data-cc='"+data.CC+"' data-fecha='"+data.fecha+"' data-grado='"+data.Grado+"' data-telefono='"+data.Telefono+"' data-email='"+data.email+"' data-idorigen='"+data.IdOrigen+"'><span class='glyphicon glyphicon-edit'></span> Editar</button> </div> </td> </tr>");
    		}

    	});

    });


    // END EDIT



    // DELETE


    $(document).on('click','.delete-record',function(){

        var idparticipante = $(this).val();

         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/deleteparticipante' + '/' + idparticipante,
            success: function (data) {
                console.log(data);
                $(".participante" + idparticipante).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    // END DELETE


	});

</script>



<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>


@endsection()


@endsection()
