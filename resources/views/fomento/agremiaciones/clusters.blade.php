@extends('partials.card')

@extends('layout')

@section('title')
Clusters
@endsection()

@section('addcss')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')

@section('card-content')

@section('card-title')
{{Breadcrumbs::render('clusters')}}

@if(count($clusters)>0)
@if ($permiso->crear == 1)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
@endif()
@endsection()
{{-- card title ends --}}


<div class="col-lg-12">

	@if(count($clusters)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen clusters, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else

	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Ciudad</b></th>
					<th><b>Telefono</b></th>
					<th><b>Email</b></th>
					<th><b>Afiliados</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach($clusters as $cluster)
				@if ($permiso->consultar == 1)
				
				<tr class="cluster{{$cluster->IdCluster}}">
					<td>{{$cluster->NombreCluster}}</td>
					<td>{{$cluster->Ciudad}}</td>
					<td>{{$cluster->Telefono}}</td>
					<td>{{$cluster->Email}}</td>
					<td>

						<div class="col-sm-1">
							<a href="{{route('afiliado.show', $cluster->IdCluster) }}" class="btn btn-default btn-group-xs"><span class="fa fa-users"></span></a>
						</div>
					</td>
					<td>
					@if ($permiso->eliminar == 1)
						<div class="col-sm-6">
							<button class="btn btn-danger btn-delete delete-record" value="{{$cluster->IdCluster}}"><span class="glyphicon glyphicon-trash"></span></button>

						</div>
						@endif
						@if ($permiso->actualizar == 1)
						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-id="{{$cluster->IdCluster}}" data-nombrecluster="{{$cluster->NombreCluster}}" data-sigla="{{$cluster->Sigla}}" data-ciudad="{{$cluster->Ciudad}}" data-region="{{$cluster->Region}}" data-rep="{{$cluster->RepresLegal}}" data-direccion="{{$cluster->Direccion}}" data-email="{{$cluster->Email}}" data-telefono="{{$cluster->Telefono}}">
                    			<span class="glyphicon glyphicon-edit"></span>
                			</button>
						</div>
						@endif
					</td>
				</tr>
				@endif
				@endforeach()

			</tbody>
		</table>
	</div>
	@endif


	
</div>



{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Cluster</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'cluster.store')) !!}
				
				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cNombreCluster" name="NombreCluster" required>
									<label for="NombreCluster">Nombre Cluster</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cSigla" name="Sigla" required>
									<label for="Sigla">Sigla</label>
								</div>
							</div>
							
						</div>

					<div class="row">
							
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cCiudad" name="Ciudad" required>
									<label for="Ciudad">Ciudad</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cRegion" name="Region" required>
									<label for="Region">Region</label>
								</div>
							</div>
							
					</div>

					<div class="row">
							
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cRepresLegal" name="RepresLegal" required>
									<label for="RepresLegal">Representante Legal</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cDireccion" name="Direccion" required>
									<label for="Direccion">Direccion</label>
								</div>
							</div>
							
					</div>

					<div class="row">
							
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cEmail" name="Email" required>
									<label for="Email">Email</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cTelefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>
							
					</div>

					</div>

				</div>


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


<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Cluster</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NombreCluster" name="NombreCluster" required>
									<label for="NombreCluster">Nombre Cluster</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Sigla" name="Sigla" required>
									<label for="Sigla">Sigla</label>
								</div>
							</div>
						</div>

						<div class="row">
							
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
									<label for="Ciudad">Ciudad</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Region" name="Region" required>
									<label for="Region">Region</label>
								</div>
							</div>
							
						</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="RepresLegal" name="RepresLegal" required>
								<label for="RepresLegal">Representante Legal</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Direccion" name="Direccion" required>
								<label for="Direccion">Dirección</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Email" name="Email" required>
								<label for="Email">Email</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Telefono" name="Telefono" required>
								<label for="Telefono">Telefono</label>
							</div>
						</div>	
					</div>

					<input type="hidden" id="IdCluster" name="IdCluster">			
						
						

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



@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

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


        $('#IdCluster').val($(this).data('id'));
        $('#NombreCluster').val($(this).data('nombrecluster'));
        $('#Sigla').val($(this).data('sigla'));
        $('#Ciudad').val($(this).data('ciudad'));
        $('#Region').val($(this).data('region'));
        $('#RepresLegal').val($(this).data('rep'));
        $('#Direccion').val($(this).data('direccion'));
        $('#Email').val($(this).data('email'));
        $('#Telefono').val($(this).data('telefono'));
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
    		url: '/editcluster',
    		data: {
    			
			'id': $("#IdCluster").val(),
			'nombrecluster': $("#NombreCluster").val(),
			'sigla': $("#Sigla").val(),
			'ciudad': $("#Ciudad").val(),
			'region': $("#Region").val(),
			'replegal': $("#RepresLegal").val(),
			'direccion': $("#Direccion").val(),
			'email': $('#Email').val(),
			'telefono': $('#Telefono').val(),
			

    		},


    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.cluster' + data.IdCluster).replaceWith("<tr class='cluster" + data.IdFuncionarioEmpresa + "'><td>"+data.NombreCluster+"</td> <td>" + data.Ciudad + "</td> <td>" + data.Telefono +"</td> <td> "+ data.Email +" </td>' <td><div class='col-sm-1'><a href='{{route('afiliado.show', $cluster->IdCluster)}}' class='btn btn-default btn-group-xs'><span class='fa fa-users'></span></a></div></td> <td><div class='col-sm-6'><button class='delete-modal btn btn-danger' data-idfuncionario='" + data.IdCluster + "' ><span class='glyphicon glyphicon-trash'></span> </button></div><div class='col-sm-6'> <button class='edit-modal btn btn-info' data-id='"+data.IdCluster+"' data-nombrecluster='"+data.NombreCluster+"' data-sigla='"+data.Sigla+"' data-ciudad='"+data.Ciudad+"' data-region='"+data.Region+"' data-rep='"+data.RepresLegal+"' data-direccion='"+data.Direccion+"' data-email='"+data.Email+"' data-telefono='"+data.Telefono+"'><span class='glyphicon glyphicon-edit'></span> Editar</button> </div> </td> </tr>");
    		}
        
    	});

    });




    // END EDIT 



    // DELETE


    $(document).on('click','.delete-record',function(){
        
        var idcluster = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/deletecluster' + '/' + idcluster,
            success: function (data) {
                console.log(data);
                $(".cluster" + idcluster).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    // END DELETE


	});

</script>



<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()