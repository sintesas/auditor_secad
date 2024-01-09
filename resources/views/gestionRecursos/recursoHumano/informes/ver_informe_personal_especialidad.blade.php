@extends('partials.card')

@extends('layout')

@section('title')
Informe Personal por Area SECAD
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('informepersonalespecialidad') }}
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Especialidad</b></th>
					{{-- <th><b>Id</b></th> --}}
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($especialidades as $especialidadesR)
				<tr>
					<td>{{$especialidadesR->NombreEspecialidad}}</td>
					{{-- <td>{{$especialidadesR->Cedula}}</td> --}}

					<td>
						<div class="col-sm-6">
							<a href="{{route('informepersonalespecialidad.show', $especialidadesR->IdEspecialidad) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
						</div>
						
					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
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