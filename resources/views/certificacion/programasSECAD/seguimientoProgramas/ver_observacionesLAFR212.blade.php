@extends('partials.card')

@extends('layout')

@section('title')
	Ver Programas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')

		{{ Breadcrumbs::render('Observaciones212') }}

		@if ($permiso->crear == 1)

		<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif
		@endsection()

		@section('card-content')
			<h4><strong>Programa: </strong> {{$programa->Proyecto}}</h4>
			<h4><strong>Código: </strong> {{$programa->Consecutivo}}</h4>
			<br>

			<div class="col-lg-12">
			<div class="table-responsive">
			@if ($permiso->consultar == 1)
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
						    <th style="width: 1000px;"><b>Observación</b></th>
							<th style="width: 300px;"><b>Fecha</b></th>
							<th style="width: 120px;"><b>Acciones</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($observaciones as $observacion)
						<tr>
							<td style="text-align: justify;">{{$observacion->Observacion}}</td>
							<td>{{$observacion->Fecha}}</td>
							<td>
							@if ($permiso->eliminar == 1)

								<div class="col-sm-6">
									{!! Form::open(['route' => ['obsercavionesfr212.destroy', $observacion->IdLAFR212Obs], 'method' => 'DELETE']) !!}
										{!!Form::submit('x', ['class' => 'btn btn-danger btn-default', 'onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::close() !!}
								</div>
							@endif

							@if ($permiso->actualizar == 1)

							<div class="col-sm-6">
								<button class="btn btn-primary edit-modal" 
								data-idlafr212obs="{{ $observacion->IdLAFR212Obs }}" 
								data-fecha="{{ $observacion->Fecha }}" 
								data-observacion="{{ $observacion->Observacion }}" style="margin-left: -2px;">  
								<span class="fa fa-edit"></span> 
							</button>
						    </div>
							@endif


							</td>

							</td>						

							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->
		{{-- BEGIN CREATE MODAL --}}
		<div id="id1" class="modal" style="padding-top:135px;">

				<div class="modal-content">

					<div class="card-head style-primary">
						<header>Creación observaciones Informe LAFR212</header>
						 <span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
						class="close">x</span>
					</div>
					<div class="card">
						<div class="card-body floating-label">
							{!! Form::open(array('route' => 'obsercavionesfr212.store')) !!}
							{{ csrf_field()}}
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group control-width-normal">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												{{ Form::text('Fecha', \Carbon\Carbon::now()->toDateString(), ['class' => 'form-control', 'id' => 'Fecha', 'required' => 'required']) }}
												{{ Form::label('Fecha', 'Fecha Observación') }}
											</div>
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea name="Observacion" id="Observacion" rows="3" class="form-control"></textarea>
										{{ Form::label('Observacion', 'Observacion')}}
									</div>
								</div>

							</div>
							<input type="hidden" value="{{$programa->IdPrograma}}" id="IdPrograma" name="IdPrograma">
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

		{{-- BEGIN UPDATE MODAL --}}

		
		<div id="editModal" class="modal" style="padding-top:135px;">
    <div class="modal-content">
        <div class="card-head style-primary">
            <header>Edición Observaciones Informe LAFR212</header>
            <span style="margin-right: 20px;" onclick="document.getElementById('editModal').style.display='none'" class="close">x</span>
        </div>
        <div class="card">
            <div class="card-body floating-label">
                {!! Form::open(array('route' => ['obsercavionesfr212.update', ':IdLAFR212Obs'], 'method' => 'PUT', 'id' => 'editForm')) !!}
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group control-width-normal">
                            <div class="input-group date" id="demo-date-format">
                                <div class="input-group-content">
								{{ Form::text('Fecha', null, ['class' => 'form-control', 'id' => 'FechaEdit', 'required' => 'required']) }}
								{{ Form::label('Fecha', 'Fecha Observación') }}
                                </div>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea name="Observacion" id="ObservacionEdit" rows="3" class="form-control"></textarea>
                            {{ Form::label('Observacion', 'Observación') }}
                        </div>
                    </div>
                </div>

                <input type="hidden" id="IdLAFR212Obs" name="IdLAFR212Obs">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info btn-block">Actualizar</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="document.getElementById('editModal').style.display='none'" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


{{-- END UPDATEMODAL --}}

		@endsection()


	@endsection()

@section('addjs')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

<script>
    $(document).ready(function() {
        $('#Fecha').datepicker({
            format: 'yyyy-mm-dd',  
            todayHighlight: true,  
            autoclose: true,      
        });    
		    
    });

	$(document).on('click', '.edit-modal', function() {
    var IdLAFR212Obs = $(this).data('idlafr212obs');  
    var fecha = $(this).data('fecha');  
    var observacion = $(this).data('observacion');  



    $('#IdLAFR212Obs').val(IdLAFR212Obs); 

    $('#FechaEdit').val(fecha);  

	$('#FechaEdit').trigger('change');

    $('#FechaEdit').datepicker('destroy');  
    $('#FechaEdit').datepicker({
        format: 'yyyy-mm-dd',  
        todayHighlight: true,  
        autoclose: true,      
    });

    $('#ObservacionEdit').val(observacion);

    $('#editForm').attr('action', '{{ route("obsercavionesfr212.update", ":id") }}'.replace(':id', IdLAFR212Obs));

    $('#editModal').fadeIn();
});



$('#editModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
});



</script>



@endsection()


@endsection()
