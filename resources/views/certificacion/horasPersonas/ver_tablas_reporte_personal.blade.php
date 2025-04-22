@extends('partials.card')

@extends('layout')

@section('title')
	Reporte Horas Personal
@endsection()

@section('content')

	@section('card-content')

		@section('card-title')

			{{ Breadcrumbs::render('reportehoraspersonal') }}
			<!-- Begin Modal -->
			
			{{-- End modal --}}

		@endsection()

		@section('card-content')

			<div class="col-lg-12">
				<div class="table-responsive">

					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>No. Identificación</th>
								<th>Nombre Especialista</th>
								<th style="width: 120px;text-align:center;"><b>Reporte</b></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($personal as $personal)
							@if ($permiso->consultar == 1)
							<tr>
								<td>{{ $personal->Cedula }}</td>
								<td>{{ $personal->NombreCompleto }}</td>
								<td>
								<div class="col-sm-6">
                            <button type="button" class="btn btn-primary btn-block editbutton" onclick="informe({{$personal->IdPersonal}})">
                                <i class="fa fa-search" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
                            </button>
							</div>
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

			<style>
				#iframe {
    		height: calc(100% - 2px);
		}
			</style>
			<div id="lafr212Modal" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Informe</h3>
						<span class="close-modal" onclick="document.getElementById('lafr212Modal').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframe" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('lafr212Modal').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="larfr212Descargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>

		@endsection()

	@endsection()

	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('#datatable1').DataTable();
			});
		</script>

<script>
			function informe(id) {
		var url = '{{ route("informehorashombreporpersonal.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframe').src = url;

		var url_descargar = '{{ route("informehorashombreporpersonal.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('larfr212Descargar').href = url_descargar;

		document.getElementById('lafr212Modal').style.display = 'block';
	};

		</script>
	@endsection()

@endsection()