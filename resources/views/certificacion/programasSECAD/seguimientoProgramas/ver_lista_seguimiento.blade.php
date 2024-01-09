@extends('partials.card')

@extends('layout')

@section('title')
	Seguimiento Actividades
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('verseguimiento', $programa->IdPrograma, $actividad->IdActividad.'&'.$programa->IdPrograma) }}
@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true || $gl_perfil[7] == true || $gl_perfil[8] == true)
<button type="button" onclick="window.location='{{ route("seguimiento.show", "$programa->IdPrograma" . "&" ."$actividad->IdActividad") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<h4><strong>Programa:</strong> {{$programa->Consecutivo}} / <strong>Tipo Programa:</strong> {{$tipoPrograma->Tipo}}</h4>
		<h4><strong>Actividad:</strong> {{$actividad->Actividad}}</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Fecha</b></th>
					<th><b>Situacion</b></th>
					<th><b>Evidencias</b></th>
					<th><b>Especialistas</b></th>
				@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true)
					<th style="width: 120px;"><b>Acciones</b></th>
				@endif
				</tr>
			</thead>
			<tbody>
				@foreach ($seguimientos as $seguimiento)
				<tr>
					<td>{{$seguimiento->Fecha}}</td>
					<td>{{$seguimiento->Situacion}}</td>
					<td>{{$seguimiento->Evidencias}}</td>
					<td>
						<div class="col-sm-6">

							<a href="{{route('especialistasSeg.show', $seguimiento->IdListaSeguimiento) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[1] == true)
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['seguimientoActividades.destroy', $seguimiento->IdListaSeguimiento], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>


						{{-- <div class="col-sm-6">

							<a href="{{route('seguimiento.edit', $seguimiento->IdListaSeguimiento) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div> --}}

					</td>
				@endif
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
