@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Plan De Certificación Anual
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('pca')}}

		<!-- The Modal -->
		@if ($permiso->crear == 1)
		<button type="button" onclick="window.location='{{ route("PlanCertificacion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif

		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Año</b></th>
							<th><b>Edición</b></th>
							<th><b>PDF</b></th>
							
							<th style="width: 200px;"><b>Acción</b></th>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($pca as $pca_item)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$pca_item->anio}}</td>
							<td>{{$pca_item->edicion}}</td>
							<td>
								<a class="btn btn-primary" href="{{URL::asset('pdf/' . $pca_item->id)}}">Descargar</a>
							</td>
							
							<td>
							@if ($permiso->eliminar == 1)
								<div class="col-sm-4">
									@if($pca_item->Activo)
									{!! Form::open(['route' => ['PlanCertificacion.destroy', $pca_item->id], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton', 'title' =>'Eliminar']) !!}

									{!! Form::close() !!}
									@else
									{!! Form::open(['route' => ['PlanCertificacion.show', $pca_item->id], 'method' => 'GET']) !!}

									{!!Form::submit('✓', ['class' => 'btn btn-success','style'=>'height: 36px;width: 36px;', 'title' =>'Mostrar']) !!}

									{!! Form::close() !!}
									
								</div>
							@endif							


							@if ($permiso->actualizar == 1)
								<div class="col-sm-4">

									<a href="{{route('PlanCertificacion.edit', $pca_item->id) }}" class="btn btn-primary btn-block editbutton" title="Editar"><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							@endif
								<div class="col-sm-4">

									<a href="{{route('PlanCertificacion.notas', $pca_item->id) }}" class="btn btn-primary btn-block editbutton" title="Ver notas"><div class="gui-icon"><i class="fa fa-clipboard"></i></div></a>

								</div>

							</td>
							@endif

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
