@extends('partials.card_big')

@extends('layout')

@section('title')
Tablas Crear Empresa
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('empresa') }}


	<!-- The Modal -->
	@if ($permiso->crear == 1)
	<button type="button" onclick="window.location='{{ route("empresa.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
	@endif



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
				
						<th><b>Capacidades</b></th>
					
					<th><b>Funcionarios</b></th>
					
						<th style="width: 120px;"><b>Acción</b></th>
						
				</tr>
			</thead>
			<tbody>
				@foreach ($vwempresa as $empresa)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$empresa->NombreEmpresa}}</td>
					<td>{{$empresa->Email}}</td>
					<td>{{$empresa->Ciudad}}</td>
					
						<td>
						
							<div class="col-sm-1">
								<a href="{{route('capacidadesEmpresa.show', $empresa->IdEmpresa) }}" class="btn btn-default btn-group-xs"><span class="fa fa-gear"></span></a>
							</div>	
							
						</td>
					
					<td>

						<div class="col-sm-1">
							<a href="{{route('funcionariosEmpresa.show', $empresa->IdEmpresa) }}" class="btn btn-default btn-group-xs"><span class="fa fa-users"></span></a>
						</div>
					</td>
					
						<td>
						@if ($permiso->eliminar == 1)
							<div class="col-sm-6">
	
								{!! Form::open(['route' => ['empresa.destroy', $empresa->IdEmpresa], 'method' => 'DELETE']) !!}
	
								{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}
	
								{!! Form::close() !!}
							</div>
						@endif
						@if ($permiso->actualizar == 1)
							<div class="col-sm-6">
	
								<a href="{{route('empresa.edit', $empresa->IdEmpresa) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
	
							</div>
						@endif
						</td>
						
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