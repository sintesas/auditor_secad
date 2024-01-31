@extends('partials.card')

@extends('layout')

@section('title')
Control de Contratos
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('formcontrolcontratos') }}
<!-- Begin Modal -->
@if ($permiso->crear == 1)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif
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
							<header>Contratos</header>
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
												<th><b>Número</b></th>
												<th><b>Nombre</b></th>
												<th><b>Ordenador</b></th>
												<th><b>BS</b></th>
												<th><b>Rubro</b></th>
												<th><b>Descripción</b></th>
												<th><b>Total de Recursos Corrientes</b></th>
												<th><b>N° CPA</b></th>
												<th width="90px"><b>Fecha CPA</b></th>
												<th width="75px"><b>Acción</b></th>
												
											</tr>
										</thead>
										<tbody>
											@foreach ($contratos as $contrato)
											@if ($permiso->consultar == 1)
											<tr>
												<td>{{$contrato->NumeroContrato}}</td>
												<td>{{$contrato->NombreContrato}}</td>
												<td>{{$contrato->Ordenador}}</td>
												<td>{{$contrato->BS}}</td>
												<td>{{$contrato->Rubro}}</td>
												<td>{{$contrato->Descripcion}}</td>
												<td>{{$contrato->TotalRecursosCorriente}}</td>
												<td>{{$contrato->NoCPA}}</td>
												<td>{{ date('M j, Y ',strtotime($contrato->FechaCPA)) }}</td>
												
												

												<td>
												@if ($permiso->eliminar == 1)
													<div class="col-sm-6">

														{!! Form::open(['route' => ['FormularioContrato.destroy', $contrato->IdPCA], 'method' => 'DELETE']) !!}

														{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

														{!! Form::close() !!}
													</div>
												@endif
												@if ($permiso->actualizar == 1)
													<div class="col-sm-6">

														<a href="{{route('FormularioContrato.edit', $contrato->IdPCA) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

													</div>
												@endif
												</td>
												
											</tr>
											@endif
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
			<header>Crear Nuevo contrato</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'FormularioContrato.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Ordenador" name="Ordenador" required maxlength="50">
									<label for="Ordenador">Ordenador</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::select('SB',  $Bienyservicio->pluck('NombreSB' , 'SB'), null, ['class' => 'form-control', 'id' => 'SB']) }}
									<label for="BS">B/S</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Rubro" name="Rubro" required maxlength="50">
									<label for="Rubro">Rubro</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Subordinal" name="Subordinal" required maxlength="50">
									<label for="Subordinal">Subordinal</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="DescripcionRubro" name="DescripcionRubro" required maxlength="250">
									<label for="DescripcionRubro">Descripción Rubro</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Descripcion" name="Descripcion" rows="4" required maxlength="250"> </textarea>
									<label for="Descripcion">Descripción</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="CodigoClasificacionUNSPSC" name="CodigoClasificacionUNSPSC" required maxlength="50">
									<label for="CodigoClasificacionUNSPSC">Codigo Clasificacion UNSPSC</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Recurso" name="Recurso" required maxlength="50">
									<label for="Recurso">Recurso</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								
									{{ Form::select('IdUnidadMedida', $UnidadMedidaCPA->pluck('NombreUnidadMedida' , 'IdUnidadMedida'), null, ['class' => 'form-control', 'id' => 'IdUnidadMedida']) }}
									<label for="IdUnidadMedida">Unidad de Medida</label>	
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" maxlength="12" step="0.01" class="form-control" id="TotalRecursosCorriente" name="TotalRecursosCorriente" required>
									<label for="TotalRecursosCorriente">Total Recursos Corriente</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" class="form-control" id="Cantidad" name="Cantidad" required maxlength="8">
									<label for="Cantidad">Cantidad</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" step="0.01" class="form-control" maxlength="12" id="Valor" name="Valor" required>
									<label for="Valor">Valor</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NombreContrato" name="NombreContrato" required maxlength="250">
									<label for="NombreContrato">Nombre Contrato</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Responsable" name="Responsable" required maxlength="50">
									<label for="Responsable">Responsable</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Grupo" name="Grupo" maxlength="50" required>
									<label for="Grupo">Grupo</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Situacion" name="Situacion" rows="4" required maxlength="250"> </textarea>
									<label for="Situacion">Situacion</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="FuncionarioDECOMEMACO" name="FuncionarioDECOMEMACO" required maxlength="50">
									<label for="FuncionarioDECOMEMACO">Funcionario DECOM-EMACO</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="MesCRP" name="MesCRP" required maxlength="50">
									<label for="MesCRP" >MesCRP</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="MesObligacion" name="MesObligacion" required maxlength="50">
									<label for="MesObligacion"> Mes Obligacion</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" step="0.01" class="form-control" id="ValorObligacion" name="ValorObligacion" maxlength="12" required>
									<label for="ValorObligacion">Valor Obligacion</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Proveedor" name="Proveedor" required maxlength="50">
									<label for="Proveedor">Proveedor</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Pagos" name="Pagos" rows="4" required> </textarea maxlength="250">
									<label for="Pagos">Pagos</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NoCPA" name="NoCPA" required maxlength="50">
									<label for="NoCPA">Número CPA</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCPA" name="FechaCPA" required maxlength="50">
											<label for="FechaCPA">Fecha CPA</label>
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NoCPD" name="NoCPD" required maxlength="50">
									<label for="NoCPD">Número CPD</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCPD" name="FechaCPD" required maxlength="15">
											<label for="FechaCPD">Fecha CPD</label>
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NoCRP" name="NoCRP" required>
									<label for="NoCRP">Número CRP</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCRP" name="FechaCRP" required maxlength="50">
											<label for="FechaCRP">Fecha CRP</label>
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>
							</div>
							
						</div>
 						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaEntregaMaterial" name="FechaEntregaMaterial" required maxlength="15">
											<label for="FechaEntregaMaterial">Fecha Entrega de Material</label>
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Observaciones" name="Observaciones" rows="4" required maxlength="250"> </textarea>
									<label for="Observaciones">Observaciones</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="PostVenta" name="PostVenta" required maxlength="250">
									<label for="PostVenta">PostVenta</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="InformesSupervisionAlDia" name="InformesSupervisionAlDia" rows="1" required maxlength="250"> </textarea>
									<label for="InformesSupervisionAlDia">Informes de Supervisión al Día</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Supervisor" name="Supervisor" required maxlength="50">
									<label for="Supervisor">Supervisor</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="PorcentajeEjecucion" name="PorcentajeEjecucion" required>
									<label for="PorcentajeEjecucion">Porcentaje de Ejecucion</label>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="PlazoEjecucion" name="PlazoEjecucion" required maxlength="50">
											<label for="PlazoEjecucion">Plazo de Ejecucion</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
							   <div class="form-group">
							   
							   		 {{ Form::select('IdEstadoPCA', $EstadoCPA->pluck('NombreEstadoPCA' , 'IdEstadoPCA'), null, ['class' => 'form-control', 'id' => 'IdEstadoPCA']) }}
									<label for="IdEstadoPCA">Estado</label>		
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

	<script type="text/javascript">
		$("#PorcentajeEjecucion").keydown(function(e) {
			if(!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) 
				|| e.keyCode == 8 || e.keyCode == 9)) {
					return false;
			}
		});
		
		$("#PorcentajeEjecucion").keyup(function() {
			if($('#PorcentajeEjecucion').val()<0 || $('#PorcentajeEjecucion').val()>100){
				var percentaje = document.getElementById('PorcentajeEjecucion');
				percentaje.value = percentaje.value.substring(0, percentaje.value.length - 1);
			}
		});
	</script>

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