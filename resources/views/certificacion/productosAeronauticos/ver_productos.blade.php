@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Producto
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('productos')}}

		<!-- The Modal -->
		@if ($permiso->crear == 1)
		<button type="button" onclick="window.location='{{ route("productos.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif

		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Año</b></th>
							<th><b>Nombre</b></th>
							<th><b>ParteNumero</b></th>
							<th><b>NSN</b></th>
							<th><b>CodigoSAP</b></th>
							<th><b>Unidad</b></th>
							{{-- <th style="width: 120px;"><b>Matriz de Impacto</b></th> --}}
							<th style="width: 120px;"><b>Acción</b></th>
							<th style="width: 120px;"><b>PCA</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($productos as $producto)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$producto->Anio}}</td>
							<td>{{$producto->Nombre}}</td>
							<td>{{$producto->ParteNumero}}</td>
							<td>{{$producto->NSN}}</td>
							<td>{{$producto->CodigoSAP}}</td>
							<td>{{$producto->NombreUnidad}}</td>
							{{-- <td>
								<div class="col-sm-6">
									<a href="{{route('productos.show', $producto->IdDemandaPotencial) }}" class="btn btn-default btn-group-xs"><i class="fa fa-gear"></i></a>
								</div>
							</td> --}}
							<td>
							@if ($permiso->eliminar == 1)
								<div class="col-sm-4">
									@if($producto->Activo)
									{!! Form::open(['route' => ['productos.destroy', $producto->IdDemandaPotencial], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton','style'=>'height: 36px;width: 36px;', 'title' =>'Eliminar']) !!}

									{!! Form::close() !!}
									@else
									{!! Form::open(['route' => ['productos.show', $producto->IdDemandaPotencial], 'method' => 'GET']) !!}

									{!!Form::submit('✓', ['class' => 'btn btn-success','style'=>'height: 36px;width: 36px;', 'title' =>'Mostrar']) !!}

									{!! Form::close() !!}
									@endif
								</div>
								@endif

								@if ($permiso->actualizar == 1)
								<div class="col-sm-4">

									<a href="{{route('productos.edit', $producto->IdDemandaPotencial) }}" class="btn btn-primary btn-block editbutton" title="Editar"><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
								@endif
								<div class="col-sm-4">

									<a href="{{route('productos.notas', $producto->IdDemandaPotencial) }}" class="btn btn-primary btn-block editbutton" title="Ver notas"><div class="gui-icon"><i class="fa fa-clipboard"></i></div></a>

								</div>


							</td>
							{{-- <td>{{$ata->Activo}}</td> --}}
							<td>
									<div class="form-group">
										{!! Form::model($producto, ['route' => ['productos.pca'], 'method' => 'POST', 'id' => 'form_pca_'.$producto->IdDemandaPotencial]) !!}
										<input type="hidden" name="producto" value="{{$producto->IdDemandaPotencial}}">
										<select class="form-control" name="pca" id="pca_{{$producto->IdDemandaPotencial}}" onchange="cambiar_pca('{{$producto->IdDemandaPotencial}}')">
											<option value="">Seleccionar PCA</option>
											@foreach ($pca as $pca_item)
											<option value="{{$pca_item->id}}" @if($pca_item->id == $producto->id_pca) selected @endif>{{$pca_item->anio}} {{$pca_item->edicion}}</option>
											@endforeach
										</select>
										{!! Form::close() !!}
									</div>
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
		$('#datatable1').DataTable().column( '0:visible' ).order( 'desc' ).draw();
	});
</script>
<script type="text/javascript">
	function cambiar_pca(valor) {
		$('#form_pca_'+valor).submit();
	}
</script>

@endsection()
@endsection()
