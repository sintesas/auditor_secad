@extends('partials.card')

@extends('layout')

@section('title')
Ver Cargos
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('cargosReq') }}

@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Área</b></th>
					<th><b>Cargo</b></th>
					<th><b>Categoría</b></th>
					<th><b>Cuerpo</b></th>
					<th><b>Dotacion</b></th>
					<th style="width: 120px;"><b>Requisitos</b></th>
					<th style="width: 120px;"><b>Cursos</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cargos as $cargo)
				<tr>
					<td>{{$cargo->AreaCargo}}</td>
					<td>{{$cargo->Cargo}}</td>
					<td>{{$cargo->Categoria}}</td>
					<td>{{$cargo->Cuerpo}}</td>
					<td>{{$cargo->Dotacion}}</td>

					<td>
						
						<div class="col-sm-1">
							<a href="{{route('requisitosCargo.show', $cargo->IdCargo) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						</div>

					</td>
					<td>
						
						<div class="col-sm-1">
							<a href="{{route('cursosCargo.show', $cargo->IdCargo) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						</div>

					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

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