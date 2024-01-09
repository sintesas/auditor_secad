@extends('partials.card')

@extends('layout')

@section('title')
Ofertas Comerciales
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')
@section('card-title')

{{ Breadcrumbs::render('ofertas_comerciales') }}
<!-- Begin Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
{{-- End modal --}}

@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Oferta Comercial</b></th>
					<th><b>Descripción</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($ofertas as $oferta)
				<tr class="oferta{{$oferta->IdOfertaComercial}}">
					<td>{{$oferta->OfertaComercial}}</td>
					<td>{{$oferta->Descripcion}}</td>

					<td>
							<div class="col-sm-6">
								<button class="btn btn-danger btn-delete delete-record" value="{{$oferta->IdOfertaComercial}}"><span class="glyphicon glyphicon-trash"></span></button>
							</div>
							<div class="col-sm-6">
								<button class="edit-modal btn btn-info" data-idoferta="{{$oferta->IdOfertaComercial}}" data-oferta="{{$oferta->OfertaComercial}}" data-descripcion="{{$oferta->Descripcion}}">
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


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Convenio</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'ofertacomercial.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cOfertaComercial" name="cOfertaComercial" required>
									<label for="cOfertaComercial">Oferta Comercial</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cDescripcion" name="cDescripcion" required>
									<label for="cDescripcion">Descripcion</label>
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




{{-- BEGIN EDIT MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Oferta Comercial</header>
		</div>

		<div class="card">

			<div class="card-body floating-label">

				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">

							{{-- empresa id hidden --}}

							<input type="hidden" id="IdOfertaComercial" name="id">


							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="OfertaComercial" name="OfertaComercial" required>
										<label for="OfertaComercial">Oferta Comercial</label>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
										<label for="Descripcion">Descripcion</label>
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

        // modal --> data-*
        // the id goes hidden becuase the controller requires it to filter as there is no request variable 
        $('#IdOfertaComercial').val($(this).data('idoferta'))
        $('#OfertaComercial').val($(this).data('oferta'));
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
    		url: 'editoferta',
    		data: {
    			// '_token': $('input[name=_token]').val(),
    			'idoferta': $("#IdOfertaComercial").val(),
    			'ofertacomercial': $("#OfertaComercial").val(),
    			'descripcion': $("#Descripcion").val(),
    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
               // incoming data such as ids and info come from database as a response 

 $('.oferta' + data.IdOfertaComercial).replaceWith("<tr class='oferta" + data.IdOfertaComercial + "'> <td>" + data.OfertaComercial + "</td> <td>" + data.Descripcion + "</td> <td><div class='col-sm-6'><button class='btn btn-danger btn-delete delete-record' value='" + data.IdOfertaComercial +"'><span class='glyphicon glyphicon-trash'></span></button></div><div class='col-sm-6'><button class='edit-modal btn btn-info' data-idoferta='" + data.IdOfertaComercial + "' data-oferta='"+ data.OfertaComercial +"' data-descripcion='" + data.Descripcion + "'><span class='glyphicon glyphicon-edit'></span></button></div></td>");
    		}

    		


           
    	});

    });


// END EDIT

// START DELETE

$(document).on('click','.delete-record',function(){
        
        var idoferta = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: 'deleteoferta' + '/' + idoferta,
            success: function (data) {
                console.log(data);
                $(".oferta" + idoferta).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
});




</script>
 
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>



@endsection()


@endsection()