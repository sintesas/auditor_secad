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

<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endsection()

@section('card-content')
<h4><strong>Codigo Requisito:</strong> {{$requisito->CodigoRequisito}}</h4>
<h4><strong>Nombre Requisito:</strong> {{$requisito->NombreRequisito}}</h4>
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Fechas</b></th>
					<th><b>Seguimiento</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($fcars as $fcar)
				<tr>
					<td>{{$fcar->Fechas}}</td>
					<td>{{$fcar->Seguimiento}}</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('fcar.show', $fcar->IdMocRequisito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->

		<div id="id1" class="modal" style="padding-top:135px;">
			<div class="modal-content">
				<div class="card-head style-primary">
					<header>Crear Requisito	</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<div class="card">
					<div class="card-body floating-label">
						{!! Form::open(array('route' => 'fcar.store')) !!}

						{{ csrf_field()}}

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Fechas" name="Fechas" value="{{$dcr}}" readonly>
									<label for="Fechas">Fechas</label>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea name="Seguimiento" id="Seguimiento"  class="form-control"></textarea>
									<label for="Seguimiento">Seguimiento</label>
								</div>
							</div>	
							
						</div>		
						
						<input type="hidden" id="IdMocRequisito" name="IdMocRequisito" value="{{$requisito->IdMocRequisito}}">

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
								</div>
								<div class="col-sm-6">
									<button type="button" onclick="window.location='{{route('fcar.show', $requisito->IdMocRequisito) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			{!! Form::close() !!}

			<script>
				$(".delete").on("submit", function(){
					return confirm("Esta seguro que desea borrar este codigo?");
				});
			</script>

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



@endsection()


@endsection()