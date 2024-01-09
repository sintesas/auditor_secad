@extends('partials.card')

@extends('layout')

@section('title')
	Informe Plan Inspeccion Final
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('informeplaninspeccionfinal')}}	
		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width: 120px;"><b>Codigo</b></th>
							<th style="width: 150px;"><b>Empresa</b></th>
							<th><b>Nombre Auditoria</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($audiorias as $audioria)
						<tr>
							<td>{{$audioria->Codigo}}</td>
							<td>{{$audioria->NombreEmpresa}}</td>
							<td>{{$audioria->NombreAuditoria}}</td>
							<td>
								<div class="col-sm-6">
									<a href="{{route('informeplaninspeccionfinal.show', $audioria->IdAuditoria) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
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