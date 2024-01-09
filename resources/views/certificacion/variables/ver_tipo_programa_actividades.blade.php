@extends('partials.card')

@extends('layout')

@section('title')
Actividades Tipos Programa
@endsection()

@section('addcss')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('activ_tiposprograma') }}
<!-- The Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>

@endsection()

@section('card-content')
<div class="col-lg-12">
	<h4><strong>Tipo Programa:</strong> {{$tipoPrograma->Tipo}}</h4>
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Orden</b></th>
					<th><b>Actividad</b></th>
					<th><b>Responsable</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($actividades as $actividad)
				<tr>
					<td>{{$actividad->Orden}}</td>
					<td>{{$actividad->Actividad}}</td>
					<td>{{$actividad->Responsable}}</td>
					
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['actividadesTipoProg.destroy', $actividad->IdActividad], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>

						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-id="{{$actividad->IdActividad}}" data-actividad="{{$actividad->Actividad}}" data-responsable="{{$actividad->Responsable}}" data-orden="{{$actividad->Orden}}">
                    			<span class="glyphicon glyphicon-edit"></span>
                			</button>
						</div>

						

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div><!--end .table-responsive -->
</div><!--end .col -->

{{-- Begin Create Modal --}}
<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Creación Actividad Tipo Programa</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>	
		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'actividadesTipoProg.store')) !!}
				{{ csrf_field()}}
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">											
							{{ Form::text('Actividad', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('Actividad', 'Actividad')}}
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">										
							{{ Form::text('Responsable', null, array('class' => 'form-control','required' => '' )) }}
							{{ Form::label('Responsable', 'Responsable')}}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">										
							{{ Form::number('Orden', null, array('class' => 'form-control','required' => '' )) }}
							{{ Form::label('Orden', 'Orden')}}
						</div>
					</div>
				</div>
				<input type="hidden" value="{{$tipoPrograma->IdTipoPrograma}}" name="IdTipoPrograma">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>	
				{!! Form::close() !!}			
			</div>
		</div>	
		<script>
			$(".delete").on("submit", function(){
				return confirm("Esta seguro que desea borrar este codigo?");
			});
		</script>			
	</div>
</div>
{{-- End Create Modal --}}


{{-- begin edit modal --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Tipo Programa</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">
							
								
							<input type="hidden" id="IdActividad" name="IdActividad">	

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input type="text" class="form-control" id="Actividad" name="Actividad" required>
										<label for="Actividad">Actividad</label>
									</div>
								</div>
									
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="Responsable" name="Responsable" required>
										<label for="Responsable">Responsable</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="number" class="form-control" id="Orden" name="Orden" required>
										<label for="Orden">Orden</label>
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


{{-- End edit modal --}}



@endsection()

@section('button')
Imprimir Tabla
@endsection()

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>


<script>

	$(document).ready(function(){

		function RefreshTable() {
				$("#datatable1").load("{{route('actividadesTipoProg.show', $tipoPrograma->IdTipoPrograma)}} #datatable1");
		}

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

	        $('#IdActividad').val($(this).data('id'));
	        $('#Actividad').val($(this).data('actividad'));
	        $('#Responsable').val($(this).data('responsable'));
	        $('#Orden').val($(this).data('orden'));
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
    		url: '/editactividad',
    		data: {
    			
			'id': $("#IdActividad").val(),
			'actividad': $("#Actividad").val(),
			'responsable': $("#Responsable").val(),
			'orden': $("#Orden").val(),
    		},
    		success: function(data){
                toastr.success("Información Actualizada");
				RefreshTable();
    	}

    });

	});

	});

</script>


<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()