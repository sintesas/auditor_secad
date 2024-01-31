@extends('partials.card')

@extends('layout')

@section('title')
Estados Programas
@endsection()

@section('addcss')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection()

@section('content')

@section('card-content')

@section('card-title')
{{Breadcrumbs::render('estadosprograma')}}

@if ($permiso->crear == 1)
@if(count($estadosprograma)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()
@endif
@endsection()
{{-- card title ends --}}


<div class="col-lg-12">

	@if(count($estadosprograma)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen estados, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else

	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Descripción</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach($estadosprograma as $estado)
				@if ($permiso->consultar == 1)
				<tr class="estadoprograma{{$estado->IdEstadoPrograma}}">
					<td>{{$estado->Descripcion}}</td>
					<td class="idestadoprograma{{$estado->IdEstadoPrograma}}">
						<div class="col-sm-10">
						@if ($permiso->eliminar == 1)
							<button class="btn btn-danger btn-delete delete-record pull-right" value="{{$estado->IdEstadoPrograma}}"><span class="glyphicon glyphicon-trash"></span></button>
						@endif
						</div>
						<div class="col-sm-2">
						@if ($permiso->actualizar == 1)
							<button class="btn btn-primary btn-default edit-modal pull-right" data-id="{{$estado->IdEstadoPrograma}}" data-descripcion="{{$estado->Descripcion}}">
                    			<span class="glyphicon glyphicon-edit"></span>
                			</button>
						@endif
						</div>
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
			<header>Crear Nuevo Estado Programa</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'estadosprograma.store')) !!}
				
				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cDescripcion" name="Descripcion" required>
									<label for="Descripcion">Descripción</label>
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
			<header>Editar Estado Programa</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">
							<input type="hidden" name="IdEstadoPrograma" id="IdEstadoPrograma">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
									<label for="Descripción">Descripción</label>
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



@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>

	$(document).ready(function(){

		function RefreshTable() {
				$( "#datatable1" ).load( "{{route('estadosprograma.index') }} #datatable1");
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


        $('#IdEstadoPrograma').val($(this).data('id'));
        $('#Descripcion').val($(this).data('descripcion'));
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
    		url: '/editestadoprograma',
    		data: {
    			
			'id': $("#IdEstadoPrograma").val(),
			'descripcion': $("#Descripcion").val(),
			
    		},
    		success: function(data){
                toastr.success("Informacion Actualizada");
                RefreshTable();
    		}
        
    	});

    });




    // END EDIT 



    // DELETE


    $(document).on('click','.delete-record',function(){
        
        var idestadoprograma = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/deleteestadoprograma' + '/' + idestadoprograma,
            success: function (data) {
                console.log(data);
                $(".estadoprograma" + idestadoprograma).remove();
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