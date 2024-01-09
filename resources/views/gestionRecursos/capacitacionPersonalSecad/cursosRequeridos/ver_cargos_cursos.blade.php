@extends('partials.card')

@extends('layout')

@section('title')
Ver Requisitos Niveles Competencia
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('ver_cursoscargos') }}
<!-- The Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Curso</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cursosCargo as $curso)
				<tr>
					<td>{{$curso->NombreCurso}}</td>
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['cursosCargo.destroy', $curso->IdCursoCargo], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>

						{{-- <div class="col-sm-6">
							<a href="{{route('cursosCargo.edit', $curso->IdCursoCargo) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div> --}}

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
			<header>Agregar Curso Cargo</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'cursosCargo.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdCurso', $cursos->pluck('NombreCurso', 'IdCurso'), null, ['class' => 'form-control', 'id' => 'IdCurso']) }}
							<label for="IdCurso">Requisito</label>
						</div>
					</div>	
				</div>

				<input type="hidden" value="{{$cargo->IdCargo}}" name="IdCargo">

				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("cursosCargo.show", "$cargo->IdCargo") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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