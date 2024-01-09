@extends('partials.card')

@extends('layout')

@section('title')
Crear Tipo Auditoria
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('tipoauditoria') }}


<!-- The Modal -->
@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true  || $gl_perfil[24] == true)
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif



@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Tipo Auditoria</b></th>
					@if ($rol)
						<th style="width: 120px;"><b>Acción</b></th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach ($tipoAuds as $tipoAud)
				<tr>
					<td>{{$tipoAud->TipoAuditoria}}</td>

						<td>
							@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true || $gl_perfil[24] == true)
							<div class="col-sm-6">

								{!! Form::open(['route' => ['tipoAuditoria.destroy', $tipoAud->IdTipoAuditoria], 'method' => 'DELETE']) !!}

								{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

								{!! Form::close() !!}
							</div>
						@endif



							<div class="col-sm-6">

								<a href="{{route('tipoAuditoria.edit', $tipoAud->IdTipoAuditoria) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

							</div>

						</td>

					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endforeach
			</tbody>
		</table>

	</div><!--end .table-responsive -->
</div><!--end .col -->

<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Crear Tipo Auditoria	</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'tipoAuditoria.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="TipoAuditoria" name="TipoAuditoria" required>
							<label for="Codigo">Tipo Auditoria</label>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("tipoAuditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	{!! Form::close() !!}

	<script>
		$(".delete").on("submit", function(){
			return confirm("Esta seguro que desea borrar este codigo?");
		});
	</script>

</div>
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
