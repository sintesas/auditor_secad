@extends('partials.card')

@extends('layout')

@section('title')
Informacion Produccion
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('informacion_produccion') }}

@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Email</b></th>
					<th><b>Ciudad</b></th>					
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($empresas as $empresa)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$empresa->NombreEmpresa}}</td>
					<td>{{$empresa->Email}}</td>
					<td>{{$empresa->Ciudad}}</td>					
					<td>	
						<div class="col-sm-6">
							<a href="{{route('informacionproduccion.edit', $empresa->IdEmpresa) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
						</div>

					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->
			<script type="text/javascript">
				$(document).ajaxStart(function () {
	                $('#status').show();
	            });
	            $(document).ajaxStop(function () {
	                $('#status').hide();
	            });
            </script>
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