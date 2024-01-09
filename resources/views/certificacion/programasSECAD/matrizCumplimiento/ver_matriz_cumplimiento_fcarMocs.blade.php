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

MOCs - FCAR - Matriz

@endsection()

@section('card-content')
<h4><strong>Codigo Requisito:</strong> {{$requisito->CodigoRequisito}}</h4>
<h4><strong>Nombre Requisito:</strong> {{$requisito->NombreRequisito}}</h4>
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Numero</b></th>
					<th><b>Medio</b></th>
					<th><b>Código AC 23- 24</b></th>
					<th><b>Descripción AC 23- 24.</b></th>
					<th style="width: 120px;"><b>Estado</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($mocs as $moc)
				<tr>
					<td>{{$moc->Numero}}</td>
					<td>{{$moc->Medio}}</td>
					<td>{{$moc->CodigoAC2324}}</td>
					<td>{{$moc->DescripcionAC2324}}</td>					
					@if($moc->Estado == 'En Proceso')
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FFFF00; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$moc->Estado}} </div></div>
					</td>
					@else
						<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #00c01d; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$moc->Estado}} </div></div>
					</td>
					@endif
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('fcar.show', $moc->IdMocRequisito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
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