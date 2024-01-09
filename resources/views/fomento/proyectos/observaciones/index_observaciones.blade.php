@extends('partials.card')

@extends('layout')

@section('title')
Observaciones Proyecto
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('observacionesControlProyectos') }}

@if(count($observacionesData)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($observacionesData)==0)
	<div style="text-align: center;" id="lunch">
		<center>
			<h2> No existen observaciones Registradas, Haga click en el boton
				<button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn">
					<span class="fa fa-plus"></span></button> </h2>
		</center>
	</div>
	@else
	<div class="table-responsive">
		<h4>
			<strong>Proyecto:</strong>
			@foreach($proyectoData as $item)
			{{$item->NombreProyecto}}
			@endforeach
		</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="width: 120px;"><b>Fecha Creado</b></th>
					<th><b>Observación</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>
				@foreach ($observacionesData as $item)
				<tr>
					<td>{{$item->Created_at}}</td>
					<td>{{$item->Descripcion}}</td>
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['observacionProyecto.destroy', $item->IdObservacion], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
</div>


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nueva Observación</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'" class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'observacionProyecto.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="hidden" value="{{$idControlProyecto}}" name="hiddenId">
									<textarea class="form-control" name="Descripcion" rows="4" id="Descripcion"></textarea>
									<label for="Descripcion">Observación</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{--Acciones--}}
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- END CREATE MODAL --}}

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function() {
		$('#datatable1').DataTable();
	});
</script>

@endsection()


@endsection()
