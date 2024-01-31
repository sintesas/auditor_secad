@extends('partials.card')

@extends('layout')

@section('title')
Ver Costos H/H
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('costoshh') }}

@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Abreviatura</b></th>
					<th><b>Grado</b></th>
					<th><b>Salario</b></th>
					<th><b>Costos H/H</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($costos as $costo)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$costo->Abreviatura}}</td>
					<td>{{$costo->NombreGrado}}</td>
					<td>$ {{$costo->Salario}}</td>
					<td>$ {{$costo->hh}}</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

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