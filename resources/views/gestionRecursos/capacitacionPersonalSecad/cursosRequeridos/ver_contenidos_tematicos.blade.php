@extends('partials.card')

@extends('layout')

@section('title')
Ver Contenidos Tematicos por EAC
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('ver_ContenidoTematico') }}
<!-- The Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Contenido Temático</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($contenidos as $contenido)
				<tr>
					<td>{{$contenido->NombreContenido}}</td>
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['contenidoTematico.destroy', $contenido->IdContenidoTematico], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>

						<div class="col-sm-6">
							<a href="{{route('contenidoTematico.edit', $contenido->IdContenidoTematico) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>

					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->


<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Crear Contenido Temático</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'contenidoTematico.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="NombreContenido" name="NombreContenido" required>
							<label for="NombreContenido">Contenido Temático</label>
						</div>
					</div>	
				</div>

				<input type="hidden" value="{{$especialidades->IdEspecialidadCertificacion}}" name="IdEspecialidadCertificacion">

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