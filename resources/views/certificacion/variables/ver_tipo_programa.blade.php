@extends('partials.card')

@extends('layout')

@section('title')
Tipos Programa
@endsection()


@section('addcss')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()


@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('tiposprograma') }}
<!-- The Modal -->
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
					<th><b>Tipo</b></th>
					<th><b>H/H</b></th>
					<th style="width: 100px;"><b>Actividades</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tipoprogramas as $tipoprograma)
				@if ($permiso->consultar == 1)
				<tr class="tipoprograma{{$tipoprograma->IdTipoPrograma}}">
					<td>{{$tipoprograma->Tipo}}</td>
					<td>{{$tipoprograma->HH}}</td>
					<td>
						<div class="col-sm-1">
							<a href="{{route('actividadesTipoProg.show', $tipoprograma->IdTipoPrograma) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						</div>
					</td>
					<td>
					{{--@if ($permiso->eliminar == 1)
						<div class="col-sm-6">
							{!! Form::open(['route' => ['tipoprograma.destroy', $tipoprograma->IdTipoPrograma], 'method' => 'DELETE']) !!}
							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}
							{!! Form::close() !!}
						</div>
						@endif--}}
						@if ($permiso->actualizar == 1)
						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-id="{{$tipoprograma->IdTipoPrograma}}" data-tipo="{{$tipoprograma->Tipo}}" data-hh="{{$tipoprograma->HH}}" data-activo="{{$tipoprograma->Activo}}">
                    			<span class="glyphicon glyphicon-edit"></span>
                			</button>
						</div>
						@endif
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div><!--end .table-responsive -->
</div><!--end .col -->

{{-- Begin Create Modal --}}
<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Crear Tipo Programa</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>	
		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'tipoprograma.store')) !!}
				{{ csrf_field()}}
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
							{{ Form::text('Tipo', null, array('class' => 'form-control', 'required' => '' )) }}
							{{ Form::label('Tipo', 'Tipo')}}
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">										
							{{ Form::text('HH', null, array('class' => 'form-control','required' => '' )) }}
							{{ Form::label('H/H', 'HH')}}
						</div>
					</div>	
					<div class="col-sm-2">
                                <div class="form-group">
                                    <input type="checkbox" id="activo" name="activo" checked>
                                    <label for="activo">Activo</label>                            
                                </div>
                    </div>	
				</div>
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
							
								
							<input type="hidden" id="IdTipoPrograma" name="IdTipoPrograma">	

							<div class="row">
								<div class="col-sm-5">
									<div class="form-group">
										<input type="text" class="form-control" id="Tipo" name="Tipo" required>
										<label for="Tipo">Tipo</label>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group">
										<input type="text" class="form-control" id="HH" name="HH" required>
										<label for="HH">HH</label>
									</div>
								</div>	
								<div class="col-sm-2">
                                <div class="form-group">
    <input type="checkbox" id="Activo" name="Activo">
    <label for="Activo">Activo</label>                            
</div>

                            </div>
							</div>	

						</div>  
					</div>

				</form>

				<div class="modalfooter">
				<div class="col-sm-6">
        <button type="button" class="btn actionBtn edit" data-dismiss="modal">
            <span id="footer_action_button" class="glyphicon glyphicon-check"></span> Actualizar
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
				$("#datatable1").load("{{route('tipoprograma.index')}} #datatable1");
		}

		$(document).on('click', '.edit-modal', function() {
    $('#footer_action_button').text("Actualizar");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-info');
    $('.actionBtn').addClass('btn-block');    
    $('.actionBtn').removeClass('btn-danger');
    $('.cancelBtn').addClass('btn-danger');
    $('.cancelBtn').addClass('btn-block');    
    $('.modal-title').text('Edit');
    $('.deleteContent').hide();
    $('.form-horizontal').show();

    // Establecer los valores del modal
    $('#IdTipoPrograma').val($(this).data('id'));
    $('#Tipo').val($(this).data('tipo'));
    $('#HH').val($(this).data('hh'));

    // Establecer el estado del checkbox 'Activo'
    $('#Activo').prop('checked', $(this).data('activo') == 1); // Si es 1, marcarlo

    // Mostrar el modal
    $('#myModal').modal('show');
});



$('.modalfooter').on('click', '.edit', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '/edittipoprograma',
        data: {
            'id': $("#IdTipoPrograma").val(),
            'tipo': $("#Tipo").val(),
            'hh': $("#HH").val(),
            'activo': $("#Activo").is(":checked") ? 1 : 0,
        },
        success: function(data) {
            if (data.success) {
                toastr.success(data.message);
                // Redirige a la ruta deseada
                window.location.href = "{{ route('tipoprograma.index') }}";
            }
        },
        error: function(xhr) {
            toastr.error("Error al actualizar la información");
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