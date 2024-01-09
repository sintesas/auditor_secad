@extends('partials.card')

@extends('layout')

@section('title')
Ver Especialidades Aeronautica de Certificacion EAC
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('eac') }}

<!-- The Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Especialidad</b></th>
					<th><b>Código</b></th>
					<th style="width: 120px;"><b>Contenido Tematico</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($especialidades as $especialidad)
				<tr>
					<td>{{$especialidad->Especialidad}}</td>
					<td>{{$especialidad->Codigo}}</td>

					<td>
						
						<div class="col-sm-6">

							{!! Form::open(['route' => ['eac.destroy', $especialidad->IdEspecialidadCertificacion], 'method' => 'DELETE']) !!}									

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
						

						<div class="col-sm-6">

							<a href="{{route('eac.edit', $especialidad->IdEspecialidadCertificacion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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
			<header>Crear Especialidad	EAC</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'eac.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="Especialidad" name="Especialidad" required>
							<label for="Especialidad">Especialidad EAC</label>
						</div>
					</div>	
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="Codigo" name="Codigo" required>
							<label for="Codigo">Codigo EAC</label>
						</div>
					</div>	
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("eac.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
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