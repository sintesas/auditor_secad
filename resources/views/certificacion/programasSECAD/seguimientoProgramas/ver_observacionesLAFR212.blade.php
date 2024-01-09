@extends('partials.card')

@extends('layout')

@section('title')
	Ver Programas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('Observaciones212') }}
		@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true || $gl_perfil[7] == true || $gl_perfil[8] == true)
		<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif
		@endsection()

		@section('card-content')
			<h4><strong>Programa: </strong> {{$programa->Proyecto}}</h4>
			<h4><strong>Código: </strong> {{$programa->Consecutivo}}</h4>
			<br>

			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Observación</b></th>
							<th><b>Fecha</b></th>
						@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true)
							<th style="width: 120px;"><b>Acciones</b></th>
						@endif
						</tr>
					</thead>
					<tbody>
						@foreach ($observaciones as $observacion)
						<tr>
							<td>{{$observacion->Observacion}}</td>
							<td>{{$observacion->Fecha}}</td>
						@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true)
							<td>

								<div class="col-sm-6">
									{!! Form::open(['route' => ['obsercavionesfr212.destroy', $observacion->IdLAFR212Obs], 'method' => 'DELETE']) !!}
										{!!Form::submit('x', ['class' => 'btn btn-danger btn-default', 'onsubmit' => 'return ConfirmDelete()']) !!}
									{!! Form::close() !!}
								</div>
							</td>
						@endif
							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endforeach
					</tbody>
				</table>

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
		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()


@endsection()
