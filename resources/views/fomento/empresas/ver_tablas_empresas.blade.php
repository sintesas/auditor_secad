@extends('partials.card_big')

@extends('layout')

@section('title')
Tablas Crear Empresa
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('empresa') }}

@foreach ($perfil as $itemPerfil)
	@if ($itemPerfil->IdRol == 12)
	<!-- The Modal -->
	<button type="button" onclick="window.location='{{ route("empresa.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
	@endif
@endforeach



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
					@foreach ($perfil as $itemPerfil)
						@if ($itemPerfil->IdRol == 12)
						<th><b>Capacidades</b></th>
						@endif
					@endforeach
					<th><b>Funcionarios</b></th>
					@foreach ($perfil as $itemPerfil)
						@if ($itemPerfil->IdRol == 12)
						<th style="width: 120px;"><b>Acción</b></th>
						@endif
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach ($vwempresa as $empresa)
				<tr>
					<td>{{$empresa->NombreEmpresa}}</td>
					<td>{{$empresa->Email}}</td>
					<td>{{$empresa->Ciudad}}</td>
					@foreach ($perfil as $itemPerfil)
						<td>
							@if ($itemPerfil->IdRol == 12)
							<div class="col-sm-1">
								<a href="{{route('capacidadesEmpresa.show', $empresa->IdEmpresa) }}" class="btn btn-default btn-group-xs"><span class="fa fa-gear"></span></a>
							</div>	
							@endif
						</td>
					@endforeach
					<td>

						<div class="col-sm-1">
							<a href="{{route('funcionariosEmpresa.show', $empresa->IdEmpresa) }}" class="btn btn-default btn-group-xs"><span class="fa fa-users"></span></a>
						</div>
					</td>
					@foreach ($perfil as $itemPerfil)
						@if ($itemPerfil->IdRol == 12)
						<td>
							<div class="col-sm-6">
	
								{!! Form::open(['route' => ['empresa.destroy', $empresa->IdEmpresa], 'method' => 'DELETE']) !!}
	
								{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}
	
								{!! Form::close() !!}
							</div>
							<div class="col-sm-6">
	
								<a href="{{route('empresa.edit', $empresa->IdEmpresa) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
	
							</div>
						</td>
						@endif
					@endforeach
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