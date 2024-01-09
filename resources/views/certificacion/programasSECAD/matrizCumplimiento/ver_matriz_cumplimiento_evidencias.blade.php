@extends('partials.card')

@extends('layout')

@section('title')
Evidencias Matriz - MoCs
@endsection()

@section('addcss')


@endsection()

@section('content')

@section('card-content')

@section('card-title')

Evidencias Matriz - MoCs
@if($mocReq->Estado == 'En Proceso')
	<button type="button" onclick="window.location='{{ route("evidenciasReq.show", $mocReq->IdMocRequisito) }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
@endsection()

@section('card-content')
<h4><strong>Codigo Requisito:</strong> {{$requisito->CodigoRequisito}}</h4>
<h4><strong>Nombre Requisito:</strong> {{$requisito->NombreRequisito}}</h4>
<h4><strong>MOC: </strong> {{$moc->Numero}}  -  {{$moc->Medio}}</h4>
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Descripcion</b></th>
					<th><b>Obervaciones</b></th>
					<th><b>Estado</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($evidencias as $evidencia)
				<tr>
					<td>{{$evidencia->Descripcion}}</td>
					<td>{{$evidencia->Obervaciones}}</td>
					@if($evidencia->Estado == 'En Proceso')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FFFF00; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$evidencia->Estado}} </div></div>
					</td>
					@elseif ($evidencia->Estado == 'Aprobado')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #00c01d; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$evidencia->Estado}} </div></div>
					</td>
					@elseif ($evidencia->Estado == 'No Aprobado')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FF8000; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$evidencia->Estado}} </div></div>
					@elseif ($evidencia->Estado == 'Cancelado')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FF0000; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$evidencia->Estado}} </div></div>
					@elseif ($evidencia->Estado == 'Pendiente')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FFFFFF; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$evidencia->Estado}} </div></div>
					@endif
					<td>
						@if($evidencia->Estado == 'En Proceso')
						<div class="col-sm-6">

							{!! Form::open(['route' => ['evidenciasMocReq.destroy',  $evidencia->IdEvidenciaRequsitoMoc], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
						<div class="col-sm-6">
							
							<a href="{{route('evidenciasMocReq.edit', $evidencia->IdEvidenciaRequsitoMoc) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
						@endif
					</td>
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