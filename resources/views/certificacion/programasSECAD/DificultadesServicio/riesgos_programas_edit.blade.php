@extends('partials.card')

@extends('layout')

@section('title')
	Crear Riesgos - Programas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('riesgo_crear') }}
		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Código</b></th>
							<th><b>Programa</b></th>
							<th style="width: 120px;"><b>Editar</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($programas as $programa)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$programa->Consecutivo}}</td>
							<td>{{$programa->Proyecto}}</td>
							<td>
							@if ($permiso->actualizar == 1)
								<div class="col-sm-6">
									<a href="{{route('riesgoprograma.edit', $programa->IdPrograma) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							@endif
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->

		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable({
			"order": [[ 0, "desc" ]]
		});
	});
</script>

@endsection()


@endsection()
