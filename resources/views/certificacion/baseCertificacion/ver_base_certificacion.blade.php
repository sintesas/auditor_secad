@extends('partials.card_big')

@extends('layout')

@section('title')
Tablas Base Certificación
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('basecertificacion') }}
<!-- The Modal -->
@if ($permiso->crear == 1)
<button type="button" onclick="window.location='{{ route("baseCertificacion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif

@endsection()

@section('card-content')


		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Origen</b></th>
							<th><b>Autoridad</b></th>
							<th><b>Clase</b></th>
							<th><b>Referencia</b></th>
							<th><b>Nombre</b></th>
							<th><b>Aplicación</b></th>
							<th><b>Fecha Enmienda</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($basesCertifica as $baseCertifica)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$baseCertifica->Origen}}</td>
							<td>{{$baseCertifica->Autoridad}}</td>
							<td>{{$baseCertifica->Clase}}</td>
							<td>{{$baseCertifica->Referencia}}</td>
							<td>{{$baseCertifica->Nombre}}</td>
							<td>{{$baseCertifica->Aplicacion}}</td>
							<td>{{$baseCertifica->FechaEnmienda}}</td>
							<td>

							@if ($permiso->eliminar == 1)
								<div class="col-sm-6">

									{!! Form::open(['route' => ['baseCertificacion.destroy', $baseCertifica->IdBaseCertificacion], 'method' => 'DELETE']) !!}									

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>
								@endif

								@if ($permiso->actualizar == 1)
								<div class="col-sm-6">

									<a href="{{route('baseCertificacion.edit', $baseCertifica->IdBaseCertificacion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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