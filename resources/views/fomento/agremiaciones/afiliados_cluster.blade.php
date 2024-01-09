@extends('partials.card')

@extends('layout')

@section('title')
	Afiliados Cluster
@endsection()

@section('addcss')
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()


@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('afiliados_cluster') }}
@if(count($afiliados)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($afiliados)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen Afiliados, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else


	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombre Empresa</b></th>
					<th><b>NIT</b></th>
					<th><b>Telefono</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach ($afiliados as $afiliado)
				<tr class="afiliado{{$afiliado->IdClusterAfiliado}}">
					<td>{{$afiliado->empresa->NombreEmpresa}}</td>
					<td>{{$afiliado->Nit}}</td>
					<td>{{$afiliado->Telefono}}</td>
					<td>
						<div class="col-sm-6">
							<button class="btn btn-danger btn-delete delete-record" value="{{$afiliado->IdClusterAfiliado}}"><span class="glyphicon glyphicon-trash"></span></button>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-id="{{$afiliado->IdClusterAfiliado}}" data-idempresa="{{$afiliado->IdEmpresa}}" data-nit="{{$afiliado->Nit}}" data-telefono="{{$afiliado->Telefono}}">
                    			<span class="glyphicon glyphicon-edit"></span>
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
			<header>Crear Nuevo Afiliado Cluster</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'afiliado.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								{{ Form::select('IdEmpresa', $empresas->prepend('none')->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'cIdEmpresa']) }}
								<label for="IdEmpresa">Organización</label>
							</div>
							</div>

							<div class="col-sm-6">
								
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="cNit" name="Nit" required>
									<label for="Nit">Nit</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="cTelefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>

						</div>
						
							<input type="hidden" value="{{$cluster->IdCluster}}" id="cIdCluster" name="IdCluster">
						
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
			<header>Editar Afiliado</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								{{ Form::select('IdEmpresa', $empresas->prepend('none')->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa']) }}
								<label for="IdEmpresa">Organización</label>
							</div>
							</div>

							<div class="col-sm-6">
								
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="Nit" name="Nit" required>
									<label for="Nit">Nit</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="Telefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>

						</div>
						
							<input type="hidden" id="IdClusterAfiliado" name="IdClusterAfiliado">

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

<script src="{{asset('js/soloNumeros.js')}}"></script>

<script>

	$(document).ready(function(){
		$('select').select2();
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

        $('#IdClusterAfiliado').val($(this).data('id'));
        $('#IdEmpresa').val($(this).data('idempresa'));
        $('#Nit').val($(this).data('nit'));
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
    		url: '/editafiliado',
    		data: {
    			
			'idempresa': $("#IdEmpresa").val(),
			'telefono': $("#Telefono").val(),
			'nit': $("#Nit").val(),
			'id': $("#IdClusterAfiliado").val(),

    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.afiliado' + data.IdClusterAfiliado).replaceWith("<tr class='afiliado" + data.IdClusterAfiliado + "'><td>"+data.IdEmpresa+"</td> <td>" + data.Nit + "</td> <td>" + data.Telefono +"</td> <td><div class='col-sm-6'><button class='delete-modal btn btn-danger' data-idafiliado='" + data.IdClusterAfiliado + "' ><span class='glyphicon glyphicon-trash'></span> </button></div><div class='col-sm-6'> <button class='edit-modal btn btn-info' data-id='"+ data.IdClusterAfiliado +"' data-idempresa='"+data.IdEmpresa+"' data-nit='"+data.Nit+"' data-telefono='"+data.Telefono+"'><span class='glyphicon glyphicon-edit'></span> Editar</button> </div> </td> </tr>");
    		}
        
    	});

    });




    // END EDIT 



    // DELETE


    $(document).on('click','.delete-record',function(){
        
        var idafiliado = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/deleteafiliado' + '/' + idafiliado,
            success: function (data) {
                console.log(data);
                $(".afiliado" + idafiliado).remove();
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