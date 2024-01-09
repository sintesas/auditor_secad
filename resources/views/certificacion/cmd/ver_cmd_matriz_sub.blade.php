@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Matriz Cumplimiento
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Matriz de Cumplimiento
		@endsection()

		@section('card-content')
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}} - {{$programa->Proyecto}}</h4>

		{!! Form::open(array('route' => 'matrizCumplimiento.store')) !!}

			{{ csrf_field()}}


		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover" >
					<thead>
						<tr>
							<th><b>Norma</b><p>Documento Normativo</p></th>
							<th><b>Nombre</b><br><p>Especifique Documento Normativo</p></th>
							<th><b>Sub-Parte</b><p>Identific. Nombre</p></th>
							<th style="width: 180px;"><b>Control Configuración</b><p>Subniveles Contro Configuración</p></th>
							<th style="width: 180px;"><b>Evidencias Niveles</b><p></p></th>

						</tr>
					</thead>
					<tbody>
						@foreach ($list as $subParte)

						<tr>
							{{-- plug id to add updates --}}
							<td>{{$subParte->Referencia}}</td>
							<td>{{$subParte->Nombre}}</td>

							@if( $subParte->NombreSubparte != '' || $subParte->NombreSubparte != null)
							<td>{{$subParte->NombreSubparte}}</td>
							<td>

								<div class="col-sm-6">
									<a href="{{route('cmdcontrolconfiguracion.show', array($subParte->idSubparteBaseCertificacion, 'programa_id' => $programa->IdPrograma)) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>

								<div class="col-sm-6">
									<a href="{{route('cmdcontrolconfiguracion.edit', array($subParte->idSubparteBaseCertificacion, 'programa_id' => $programa->IdPrograma)) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							@else
								<td style="color: red;">Aún no hay Capitulos ni subpartes asignadas.</td>								
							@endif

						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->
		</div><!--end .col -->


		{!! Form::close() !!}

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
