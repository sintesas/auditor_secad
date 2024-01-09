@extends('partials.card')

@extends('layout')

@section('title')
MOC
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('moc') }}
<!-- Begin Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
{{-- End modal --}}

@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Numero</b></th>
					<th><b>Medio</b></th>
					<th><b>código AC 23- 24</b></th>
					<th><b>descripción AC 23- 24.</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($mocs as $moc)
				<tr class="moc{{$moc->IdMOC}}">
					<td>{{$moc->Numero}}</td>
					<td>{{$moc->Medio}}</td>
					<td>{{$moc->CodigoAC2324}}</td>
					<td>{{$moc->DescripcionAC2324}}</td>
					<td>
						<div class="col-sm-6">
							<button class="btn btn-danger btn-delete delete-record " value="{{$moc->IdMOC}}"><span class="glyphicon glyphicon-trash"></span></button>

						</div>

						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-idmoc="{{$moc->IdMOC}}" data-numero="{{$moc->Numero}}" data-medio="{{$moc->Medio}}" data-codigo="{{$moc->CodigoAC2324}}" data-descripcion="{{$moc->DescripcionAC2324}}">
								<span class="fa fa-edit"></span>
							</button>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div><!--end .table-responsive -->
</div><!--end .col -->


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo MOC</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'addmoc')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cnumero" name="numero"    required>
									<label for="numero">Numero</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cmedio" name="medio" required>
									<label for="medio">Medio</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="ccodigo" name="codigo" required>
									<label for="codigo">Código AC 23- 24</label>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="cdescripcion" name="descripcion" rows="3" required> </textarea>
									<label for="descripcion">Descripción</label>
								</div>
							</div>

						</div>
					</div>
				</div>
				

				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>

			{!! Form::close() !!}


			</div>
		</div>
	</div>

</div>

{{-- END CREATE MODAL --}}




{{-- BEGIN EDIT MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Moc</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">
  						
  						<div class="card">
  							<div class="card-body">

  								{{-- empresa id hidden --}}

  								<input type="hidden" id="idmoc" name="id">
  								

  								<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="numero" name="numero"    required disabled="">
									<label for="numero">Numero</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="medio" name="medio" required>
									<label for="medio">Medio</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="codigo" name="codigo" required>
									<label for="codigo">Código AC 23- 24</label>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required> </textarea>
									<label for="descripcion">Descripción</label>
								</div>
							</div>

						</div>

  							</div>
  						</div>

  				</form>

				<div class="modalfooter">
					<div class="col-sm-6">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class="glyphicon"></span>
						</button>
					</div>
					<div class="col-sm-6">
						<button type="button" class="btn cancelBtn" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</div>
				</div>



			</div>
		</div>

	</div>
</div>


{{-- END EDIT MODAL --}}

@endsection()

@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('js/edit.js')}}"></script>
 
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>




<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});


	



	
</script>



@endsection()


@endsection()