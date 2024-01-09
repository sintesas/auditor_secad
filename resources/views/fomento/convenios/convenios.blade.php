@extends('partials.card')

@extends('layout')

@section('title')
Convenios
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('convenios') }}
<!-- Begin Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
{{-- End modal --}}


@endsection()

@section('card-content')



<div class="col-lg-12">
	<div class="table-responsive">
		<!-- BEGIN STRUCTURE  -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion1">
					<div class="card panel">
						<div class="card-head expanded" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
							<header>Convenios</header>
							<div class="tools">
								<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
							</div>
						</div>
						{{-- PANEL 1 CREAR EMPRESA --}}
						<div id="accordion1-1" class="collapse in">


							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th><b>Nombre</b></th>
												<th><b>Entidad</b></th>
												<th><b>Fecha</b></th>
												<th><b>Vigencia</b></th>
												<th><b>Objeto</b></th>
												<th><b>Responsable</b></th>
												<th><b>Acción</b></th>

											</tr>
										</thead>
										<tbody>
											@foreach ($convenios as $convenio)
											<tr>
												<td>{{$convenio->NombreConv}}</td>
												<td>{{$convenio->Entidad}}</td>
												<td>{{ date('M j, Y ',strtotime($convenio->Fecha)) }}</td>
												<td>{{ date('M j, Y ', strtotime($convenio->Vigencia)) }}</td>
												<td>{{$convenio->Objeto}}</td>
												<td>{{$convenio->Responsable}}</td>


												<td>
													<div class="col-sm-6">

														{!! Form::open(['route' => ['convenio.destroy', $convenio->IdConvenios], 'method' => 'DELETE']) !!}

														{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

														{!! Form::close() !!}
													</div>


													<div class="col-sm-6">

														<a href="{{route('convenio.edit', $convenio->IdConvenios) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

													</div>

												</td>

											</tr>
											@endforeach
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div><!--end .col -->

						</div>

						{!! Form::close() !!}

					</div>
				</div><!--end .panel -->
			</div><!--end .panel-group -->
		</div><!--end .col -->
	</div><!--end .row -->
	<!-- END STRUCTURE -->
</div><!--end .table-responsive -->











{{-- ////////////////////////// --}}




{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Convenio</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'convenio.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Nombre" name="NombreConv" required>
									<label for="Nombre">Nombre Convenio</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Entidad" name="Entidad" required>
									<label for="Entidad">Entidad</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="Fecha" name="Fecha" required >
											<label for="Fecha">Fecha</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="Vigencia" name="Vigencia" required >
											<label for="Vigencia">Vigencia</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::select('IdCaracterConvenio', $caraterConvenios->pluck('NombreCaracterConvenio' , 'IdCaracterConvenio'), null, ['class' => 'form-control', 'id' => 'IdCaracterConvenio']) }}
									<label for="IdCaracterConvenio">Caracter Convenio</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::select('IdEstadoConvenio', $estadoConvenios->pluck('NombreEstadoConvenio' , 'IdEstadoConvenio'), null, ['class' => 'form-control', 'id' => 'IdEstadoConvenio']) }}
									<label for="Entidad">Estado Convenio</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Objeto" name="Objeto" rows="2" required> </textarea>
									<label for="Observaciones">Objeto</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Antecedente" name="Antecedente" rows="2" required> </textarea>
									<label for="Antecedente">Antecedente</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Responsable" name="Responsable" required>
									<label for="Responsable">Responsable</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Contacto" name="Contacto" required>
									<label for="Contacto">Contacto</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Celular" name="Celular" required>
									<label for="Celular">Celular</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Email" name="Email" required>
									<label for="Email">Email</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Pendiente" name="Pendiente" required>
									<label for="Pendiente">Pendientes</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="DSDS"  name="DSDS" required>
									<label for="DSDS">DSDS</label>
								</div>
							</div>
							<div class="col-sm-6" style ="visibility: hidden">
								<div class="form-group">
									{{ Form::select('IdTipoConvenio', $TipoConvenio->pluck('NombreTipoConvenio' , 'IdTipoConvenio'), null, ['class' => 'form-control', 'id' => 'IdTipoConvenio']) }}
									<label for="IdTipoConvenio">Tipo Convenio</label>
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


			</div>
		</div>

	</div>
</div>

{{-- END CREATE MODAL --}}




	</center>



	{!! Form::close() !!}

</div>
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

@endsection()


@endsection()
