@extends('partials.card')

@extends('layout')

@section('title')
Ver Nivel Competencia
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('nivelesComp') }}

@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nivel Competencia</b></th>
					<th><b>Denominación</b></th>
					<th><b>Sigla</b></th>
					<th><b>Nivel Pericia</b></th>
					<th style="width: 120px;"><b>Requisitos</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($nivelesComp as $nivelComp)
				<tr>
					<td>{{$nivelComp->NivelCompetencia}}</td>
					<td>{{$nivelComp->Denominacion}}</td>
					<td>{{$nivelComp->Sigla}}</td>
					<td>{{$nivelComp->NivelPericia}}</td>

					<td>
						
						<div class="col-sm-1">
							<a href="{{route('requisitosNivelCompe.show', $nivelComp->IdNivelCompetencia) }}" class="btn btn-default btn-group-xs"><span class="fa fa-plus-square"></span></a>
						</div>

					</td>
					{{-- <td>{{$ata->Activo}}</td> --}}
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

	<script>
		$(".delete").on("submit", function(){
			return confirm("Esta seguro que desea borrar este codigo?");
		});
	</script>

</div>
@endsection()

@endsection()

@section('addjs')
{{-- SCRIPTS --}}

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()