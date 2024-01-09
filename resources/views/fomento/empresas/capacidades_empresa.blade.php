@extends('partials.card')

@extends('layout')

@section('title')
Capacidades Empresa
@endsection()

@section('addcss')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')

@section('card-content')

@section('card-title')
{{Breadcrumbs::render('capacidades_empresa')}}

@if(count($capacidades)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">



	@if(count($capacidades)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen capacidades, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else

	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Oferta comercial</b></th>
					<th><b>Acción</b></th>

				</tr>
			</thead>

			<tbody>

				@foreach($capacidades as $capacidad)
				
				<tr class="capacidad{{$capacidad->IdOfertaComercial}}">
					<td>{{$capacidad->OfertasComerciales->OfertaComercial}}</td>
					
					<td>
						<div class="col-sm-6">
								{{-- <button class="btn btn-danger btn-delete delete-record" value="{{$capacidad->IdOfertaComercial}}"><span class="glyphicon glyphicon-trash"></span></button> --}}

								{!! Form::open(['route' => ['capacidadesEmpresa.destroy', $capacidad->IdOfertaComercial.'&'.$capacidad->IdEmpresa], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger btn-delete delete-record']) !!}

									{!! Form::close() !!}

							</div>
					</td>
				</tr>
				
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
			<header>Crear Nueva Capacidad</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'capacidadesEmpresa.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
								
							<input type="hidden" class="form-control" id="cIdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}" required>
								
							<div class="col-sm-12">
								<div class="form-group">
                                	{{ Form::select('IdOfertaComercial', $ofertas->pluck('OfertaComercial', 'IdOfertaComercial'), null, ['class' => 'form-control', 'id' => 'cIdOfertaComercial']) }}
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
			<header>Editar Capacidad</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('myModal').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">
  						
  						<div class="card">
  							<div class="card-body">

  								{{-- empresa id hidden --}}
  								
								<input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}" disabled>
  								
  								<div class="form-group">
  									<label class="control-label col-sm-2" for="IdOfertaComercial">Oferta Comercial:</label>
  									<div class="col-sm-10">
  										{{ Form::select('IdOfertaComercial', $ofertas->pluck('OfertaComercial', 'IdOfertaComercial'), null, ['class' => 'form-control', 'id' => 'IdOfertaComercial']) }}
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

{{-- <script>
	
	// DELETE
    $(document).on('click','.delete-record',function(){
        
        var idofertacomercial = $(this).val();
        var idEmpresa = $('#idEmpresa').val();

        $.ajax({
            type: "DELETE",
            url: '/deletecapacidad' + '/' + idofertacomercial + '&' + idEmpresa,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                console.log(data);
                $(".capacidad" + idofertacomercial).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    // END DELETE

</script> --}}



<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

<script type="text/javascript">
				$('select').select2();
			</script>


@endsection()


@endsection()