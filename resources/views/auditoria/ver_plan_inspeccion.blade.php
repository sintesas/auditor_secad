@extends('partials.card')

@extends('layout')

@section('title')
	Tabla Plan Inspeccion
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('planinspeccion') }}
		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("planeInspeccion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Auditoria</b></th>
							<th><b>Fecha</b></th>
							<th><b>Observaciones</b></th>
							<th style="width: 100px;"><b>Actividades Inspección</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($planesIns as $planIns)
						<tr>
							<td>{{$planIns->Codigo}}</td>
							<td>{{$planIns->Fecha}}</td>
							<td>{{$planIns->Observaciones}}</td>
							<td>
								<div class="col-sm-1">
									<a href="{{route('actividadesInspeccion.show', $planIns->IdPlanInspeccion) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
								</div>
							</td>
							<td>
								<div class="col-sm-6">

									{!! Form::open(['route' => ['planeInspeccion.destroy', $planIns->IdPlanInspeccion], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>


								<div class="col-sm-6">

									<a href="{{route('planeInspeccion.edit', $planIns->IdPlanInspeccion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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
