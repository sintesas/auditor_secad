@extends('partials.card')

@extends('layout')

@section('title')
	Notas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('notas_pca')}}

		<!-- The Modal -->

		@endsection()

		@section('card-content')


			<div class="col-lg-12">
				<ul class="nav nav-tabs style-primary" id="myTab" role="tablist">
					<li class="nav-item active" role="presentation">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
							Pendientes por aprobar
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
							Aprobados
						</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="table-responsive">
							<table id="datatable1" class="table table-striped table-hover">
								<thead>
									<tr>
										<th><b>#</b></th>
										<th><b>FECHA</b></th>
										<th><b>USUARIO</b></th>
										<th><b>NOTA</b></th>
										<th style="width: 200px;"><b>ACCIÓN</b></th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@foreach ($notas as $nota)
									@if($nota->aprobo == null)
									<tr>
										<td>{{$i}}</td>
										<td>{{$nota->fecha}}</td>
										<td>{{$nota->usuario}}</td>
										<td>{{$nota->nota}}</td>
										<td>
											<div class="col-12">
												<a href="{{route('PlanCertificacion.aprobarnota', $nota->idNotasPCA) }}" class="btn btn-primary btn-block" ><i class="fa fa-check"></i> Aprobar</a>
											</div>
										</td>
									</tr>
									@endif
									@php($i =$i + 1)
									@endforeach
								</tbody>
							</table>
						</div><!--end .table-responsive -->

					</div>

					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="table-responsive">
							<table id="datatable2" class="table table-striped table-hover">
								<thead>
									<tr>
										<th><b>#</b></th>
										<th><b>FECHA</b></th>
										<th><b>USUARIO</b></th>
										<th><b>NOTA</b></th>
										<th><b>APROBÓ</b></th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@foreach ($notas as $nota)
									@if($nota->aprobo != null)
									<tr>
										<td>{{$i}}</td>
										<td>{{$nota->fecha}}</td>
										<td>{{$nota->usuario}}</td>
										<td>{{$nota->nota}}</td>
										<td>{{$nota->aprobo}}</td>
									</tr>
									@endif
									@php($i =$i + 1)
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div><!--end .col -->
		@endsection()

	@endsection()
	@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
		$('#datatable2').DataTable();
	});
</script>

@endsection()
@endsection()
