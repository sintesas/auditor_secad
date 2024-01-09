@extends('partials.card')

@extends('layout')

@section('title')
	Informe Plan de Mejora (Hallazgos)
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')

			{{-- Informe Plan de Mejora (Hallazgos)			 --}}
		{{ Breadcrumbs::render('informeplanmejora') }}
		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>NoAnota</b></th>
							<th><b>Antecedente</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($anotaciones as $anotacion)
						<tr>
							<td>{{$anotacion->NoAnota}}</td>
							<td>{{$anotacion->Antecedente}}</td>
							<td>
								<div class="col-sm-6">
									<a href="{{route('informeplanmejora.show', $anotacion->IdAnotacion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
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