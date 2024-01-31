@extends('partials.card')

@extends('layout')

@section('title')
Tablas ATA
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('ata') }}
<!-- Begin Modal -->

{{-- @can('crear') --}}
@if ($permiso->crear == 1)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
{{-- End modal --}}
{{-- @else
@endcan --}}

@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>ATA</b></th>
					<th  style="width: 100px"><b>Codigo ATA </b></th>
					<th><b>General</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($atas as $ata)
				@if ($permiso->consultar == 1)
				<tr class="ata{{$ata->IdATA}}">
					<td>{{$ata->ATA}}</td>
					<td>{{$ata->CodATA}}</td>
					<td>{{$ata->General}}</td>

					<td>
						<div class="col-sm-6">
							{{-- @can('eliminar') --}}
							@if ($permiso->eliminar == 1)
							<button class="btn btn-danger btn-delete delete-record" value="{{$ata->IdATA}}"><span class="glyphicon glyphicon-trash"></span></button>
							@endif
							{{-- @else
							@endcan --}}
						</div>
						<div class="col-sm-6">
							{{-- @can('editar') --}}
							@if ($permiso->actualizar == 1)
							<button class="btn btn-primary btn-default edit-modal" data-idata="{{$ata->IdATA}}" data-ata="{{$ata->ATA}}" data-codata="{{$ata->CodATA}}" data-general="{{$ata->General}}" ">
								<span class="fa fa-edit"></span>
							</button>
							@endif
							{{-- @else
						    @endcan --}}
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

<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear ATA</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'ata.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="cATA" name="ATA" required>
									<label for="ATA">ATA</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="cCodATA" name="CodATA" required>
									<label for="CodATA">CodATA</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="cGeneral" name="General" required>
									<label for="General">General</label>
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


{{-- END CREATEMODAL --}}

{{-- BEGIN EDIT MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar ATA</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">
					{{ csrf_field()}}

					<div class="card">
						<div class="card-body">

							<input type="hidden" id="IdATA" name="id">

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input type="text" class="form-control" id="ATA" name="ATA" required>
										<label for="ATA">ATA</label>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="text" class="form-control" id="CodATA" name="CodATA" required>
										<label for="CodATA">CodATA</label>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="text" class="form-control" id="General" name="General" required>
										<label for="General">General</label>
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

	{!! Form::close() !!}
		
	</div>
</div>

{{-- END EDITMODAL --}}


@endsection()


@endsection()


@section('addjs')

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
        

        $('#IdATA').val($(this).data('idata'));
        $('#ATA').val($(this).data('ata'));
        $('#CodATA').val($(this).data('codata'));
        $('#General').val($(this).data('general'));
        
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
    		url: 'editata',
    		data: {
    			// '_token': $('input[name=_token]').val(),
    			'idata': $("#IdATA").val(),
    			'ata': $("#ATA").val(),
    			'codata': $("#CodATA").val(),
    			'general': $("#General").val()
    		},

    		

    		success: function(data){
    			$('.ata' + data.IdATA).replaceWith("<tr class='ata" + data.IdATA + "'> <td>" + data.ATA + "</td><td>" + data.CodATA + "</td> <td> "+ data.General +" </td> <td> <div class='col-sm-6'><button class='delete-modal btn btn-danger' data-id='" + data.IdATA + "' ><span class='glyphicon glyphicon-trash'></span></button></div> <div class='col-sm-6'> <button class='btn btn-primary btn-default edit-modal' data-idata='" + data.IdATA + "' data-ata='" + data.ATA + "' data-codata='" + data.CodATA + "' data-general='" + data.General + "'><span class='glyphicon glyphicon-edit'></span></button> </div> </td> </tr>");
    		}
    	});


    });

		$(document).on('click','.delete-record',function(){
        
        var idata = $(this).val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
         
        $.ajax({
            type: "DELETE",
            url: 'deleteata' + '/' + idata,
            success: function (data) {
                console.log(data);
                $(".ata" + idata).remove();
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