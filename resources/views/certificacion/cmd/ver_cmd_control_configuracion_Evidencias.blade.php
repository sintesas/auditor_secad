@extends('partials.card_big')

@extends('layout')

@section('title')
Evidencias Matriz - MoCs
@endsection()

@section('addcss')


@endsection()

@section('content')

@section('card-content')

@section('card-title')

Evidencias Nivel - CMD
	<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endsection()

@section('card-content')
{{-- <h4><strong>Codigo Requisito:</strong> {{$requisito->CodigoRequisito}}</h4>
<h4><strong>Nombre Requisito:</strong> {{$requisito->NombreRequisito}}</h4>
<h4><strong>Moc: </strong> {{$moc->Numero}}  -  {{$moc->Medio}}</h4> --}}
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover" style="width: 1800px;">
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>ParteNumero</b></th>
					<th><b>Cantidad</b></th>
					<th><b>IdATA</b></th>
					<th><b>Versión</b></th>
					<th><b>Fecha</b></th>
					<th><b>Observaciones Version</b></th>
					<th style="width: 120px;"><b>Caracteristicas del Componente</b></th>
					<th style="width: 120px;"><b>Manufactura del Componente</b></th>
					<th style="width: 120px;"><b>Inspección De Conformidad</b></th>
					<th style="width: 120px;"><b>SSA</b></th>
					<th style="width: 120px;"><b>Mantenimiento de la Aeronavegabilidad del Componente</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($evidencias as $evidencia)
				<tr>
					<td>{{$evidencia->Nombre}}</td>
					<td>{{$evidencia->ParteNumero}}</td>
					<td>{{$evidencia->Cantidad}}</td>
					<td>{{$evidencia->IdATA}}</td>
					<td>{{$evidencia->Version}}</td>
					<td>{{$evidencia->Fecha}}</td>
					<td>{{$evidencia->ObservacionesVersion}}</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('cmdEvidenciasCaracteristicas.show', $evidencia->IdCMDEvidencias) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('cmdEvidenciasManufactura.show', $evidencia->IdCMDEvidencias) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('cmdEvidenciasInspeccion.show', $evidencia->IdCMDEvidencias) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('cmdEvidenciasSSA.show', $evidencia->IdCMDEvidencias) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					<td>
						<div class="col-sm-6">
							
							<a href="{{route('cmdEvidenciasMAC.show', $evidencia->IdCMDEvidencias) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>
					</td>
					<td>
						
						<div class="col-sm-6">

							{!! Form::open(['route' => ['cmdEvidencias.destroy',  $evidencia->IdCMDEvidencias], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
						{{-- <div class="col-sm-6">
							
							<a href="{{route('evidenciasMocReq.edit', $evidencia->IdEvidenciaRequsitoMoc) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div> --}}
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
					<header>Crear Evidencia - Nivel	</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<div class="card">
					<div class="card-body floating-label">
						{!! Form::open(array('route' => 'cmdEvidencias.store')) !!}

						{{ csrf_field()}}

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Nombre" name="Nombre" required>
									<label for="Nombre">Nombre</label>
								</div>
							</div>	
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="ParteNumero" name="ParteNumero" required>
									<label for="ParteNumero">Parte Número</label>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" class="form-control" id="Cantidad" name="Cantidad" required>
									<label for="Cantidad">Cantidad</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
										{{ Form::select('ATA', $atas->pluck('ATA', 'ATA'), null, ['class' => 'form-control', 'id' => 'ATA']) }}
                                        <label for="IdATA"> ATA </label>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Version" name="Version" required>
									<label for="Version">Versión</label>
								</div>
							</div>	
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="Fecha" name="Fecha" required>
												<label for="Fecha">Fecha</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea  class="form-control" name="ObservacionesVersion" id="ObservacionesVersion"></textarea>
									<label for="ObservacionesVersion">Observaciones Versión</label>
								</div>
							</div>	
						</div>
						<input type="hidden" id="IdCMDRequisitos" name="IdCMDRequisitos" value="{{$IdCMDRequisitos}}">

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
								</div>
								<div class="col-sm-6">
									<button type="button" onclick="window.location='{{route('cmdEvidencias.show', $IdCMDRequisitos) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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