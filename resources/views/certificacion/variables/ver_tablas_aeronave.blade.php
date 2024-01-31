@extends('partials.card')

@extends('layout')

@section('title')
	Aeronaves
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{-- Tablas Aeronaves  --}}
	
		{{ Breadcrumbs::render('aeronaves') }}

		<!-- Begin Modal -->

		

		{{-- @can('todo', 'crear') --}}
		@if ($permiso->crear == 1)
		<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif
		{{-- End modal --}}

		{{-- @endcan --}}

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Equipo</b></th>
							<th><b>Aeronave</b></th>
							<th><b>Grupo</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($aeronaves as $aeronave)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$aeronave->Equipo}}</td>
							<td>{{$aeronave->Aeronave}}</td>
							<td>{{$aeronave->Grupo}}</td>
							
							<td>
							
								<div class="col-sm-1" style="margin-right:20px;">
									{!! Form::open(['route' => ['aeronave.destroy', $aeronave->IdAeronave], 'method' => 'DELETE']) !!}
									{{-- @can('eliminar') --}}
									@if ($permiso->eliminar == 1)
										{!!Form::submit('x', ['class' => 'btn btn-danger btn-default', 'onsubmit' => 'return ConfirmDelete()']) !!}
										@endif
										{{-- @else
									@endcan --}}
									{!! Form::close() !!}									
								</div>	


								<div class="col-sm-1">
									{{-- <a href="{{route('aeronave.edit', $aeronave->IdAeronave) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a> --}}
									{{-- <a  class="btn btn-primary btn-default" onclick="document.getElementById('id1').style.display='block'" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></a> --}}

									{{-- @can('editar') --}}
									
									{{-- <a onclick="document.getElementById('myModal').style.display='block'"  class="btn btn-primary btn-default"><span class="fa fa-edit"></span></a> --}}
									{{-- @else

									@endcan --}}
									@if ($permiso->actualizar == 1)
									<button class="btn btn-primary btn-default edit-modal" data-idaeronave="{{$aeronave->IdAeronave}}" data-cod="{{$aeronave->COD}}" data-aplicacion="{{$aeronave->Aplicacion}}" data-equipo="{{$aeronave->Equipo}}" data-aeronave="{{$aeronave->Aeronave}}" data-grupo="{{$aeronave->Grupo}}" >
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
			

			</div>
		</div>


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:135px;">

		<div class="modal-content">


			<div class="card-head style-primary">
				<header>Creación de aeronave1</header>
				 <span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
				class="close">x</span> 
			</div>						
					<div class="card">
						<div class="card-body floating-label">
							{!! Form::open(array('route' => 'aeronave.store')) !!}
							{{ csrf_field()}}
							<div class="row">
								{{-- <div class="col-sm-6">
									<div class="form-group">											
										{{ Form::text('COD', null, array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('COD', 'Código')}}
									</div>
								</div> --}}
								<div class="col-sm-6">
									<div class="form-group">										
									{{ Form::text('Aplicacion', null, array('class' => 'form-control', 'required' => '' )) }}
									{{ Form::label('Aplicacion', 'Aplicación')}}
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">											
										{{ Form::text('Equipo', null, array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('Equipo', 'Equipo')}}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group floating-label">												
										{{ Form::text('Aeronave', null, array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('Aeronave', 'Aeronave')}}
									</div>	
								</div>	
							</div>												
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">									
										{{ Form::text('Grupo', null, array('class' => 'form-control', 'style' => 'width: 60%',  'required' => '' )) }}
										{{ Form::label('Grupo', 'Grupo')}}
									</div>
								</div>
								<div class="col-sm-6">

								</div>	
							</div>
							<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
								</div>
								<div class="col-sm-6">
									<button type="button" onclick="window.location='{{ route("aeronave.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
								</div>
							</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
			<script>
				function ConfirmDelete()
				{
					var x = confirm("Esta seguro de elminar el registro?");
					if (x)
						return true;
					else
						return false;
				}
			</script>
		</div>
	</div>
{{-- END CREATEMODAL --}}


{{-- BEGIN EDIT MODAL --}}
<div id="myModal" class="modal" style="padding-top:135px;">

		<div class="modal-content">

			<div class="card-head style-primary">
				<header>Edición de aeronaves</header>
				
			</div>	
					<div class="card">
						<div class="card-body floating-label">
							{!! Form::model($aeronave, ['route' => ['aeronave.update', $aeronave->IdAeronave], 'method' => 'PUT' ]) !!}
							{{ csrf_field()}}

							<input type="hidden" id="IdAeronave" name="IdAeronave">
							<div class="row">
								{{-- <div class="col-sm-6">
									<div class="form-group">										
										<input type="text" class="form-control" id="COD" name="COD" required>
										<label for="COD">COD</label>
									</div>
								</div> --}}
								<div class="col-sm-6">
									<div class="form-group">										
										<input type="text" class="form-control" id="Aplicacion" name="Aplicacion" required>
										<label for="Aplicacion">Aplicación</label>
									</div>	
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group floating-label">
										<input type="text" class="form-control" id="Equipo" name="Equipo" required>
										<label for="Aplicacion">Equipo</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">										
									<input type="text" class="form-control" id="Aeronave" name="Aeronave" required>
									<label for="Aeronave">Aeronave</label>
								</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group floating-label">	
										<input type="text" class="form-control" id="Grupo" name="Grupo" required>
										<label for="Grupo">Grupo</label>
									</div>
								</div>	
							</div>
							<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Editar</button>
								</div>
								<div class="col-sm-6">
									<button type="button" data-dismiss="modal" style="" class="btn btn-danger btn-block">Cancelar</button>
								</div>
							</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>		
			<script>
				
			</script>			
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
	});
</script>

<script type="text/javascript">
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
	        
	        // modal --> data-*
	        $('#IdAeronave').val($(this).data('idaeronave'));
	        $('#IdAeronave').focus();
	        // $('#COD').val($(this).data('cod'));
	        $('#Aplicacion').val($(this).data('aplicacion'));
	        $('#Equipo').val($(this).data('equipo'));
	        $('#Aeronave').val($(this).data('aeronave'));
	        $('#Grupo').val($(this).data('grupo'));
	        $('#myModal').modal('show');

	    });



	    // $('.modalfooter').on('click', '.edit', function(){

	    //     $.ajaxSetup({
	    //       headers: {
	    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    //       }
	    //     });

	    // 	$.ajax({

	    // 		type: 'post',
	    // 		url: 'editmoc',
	    // 		data: {
	    // 			// '_token': $('input[name=_token]').val(),
	    // 			'idmoc': $("#idmoc").val(),
	    // 			'numero': $("#numero").val(),
	    // 			'medio': $("#medio").val(),
	    // 			'codigo': $("#codigo").val(),
	    // 			'descripcion': $("#descripcion").val()

	    // 		},

	    // 		success: function(data){
	    //             // alert("value " + data.CodigoAC2324 + " updated");
	    // 			$('.moc' + data.IdMOC).replaceWith("<tr class='moc" + data.IdMOC + "'> <td>" + data.Numero + "</td><td>" + data.Medio + "</td><td>" + data.CodigoAC2324 + "</td><td>" + data.DescripcionAC2324 + "</td> <td> <div class='col-sm-6'><button class='delete-modal btn btn-danger' data-id='" + data.IdMOC + "' ><span class='glyphicon glyphicon-trash'></span></button></div> <div class='col-sm-6'> <button class='edit-modal btn btn-info' data-idmoc='" + data.IdMOC + "' data-numero='" + data.Numero + "' data-medio='" + data.Medio + "' data-codigo='" + data.CodigoAC2324 + "' data-descripcion= '" + data.DescripcionAC2324 + "'><span class='glyphicon glyphicon-edit'></span></button> </div> </td> </tr>");
	    // 		}
	            

	    // 	});

	    // });
	});

// END EDIT
</script>



@endsection()
	

@endsection()