
@extends('partials.card')

@extends('layout')

@section('title')
Editar Contrato
@endsection()

@section('content')

@section('card-content')
@section('card-title')
	{{ Breadcrumbs::render('editar_contrato') }}
@endsection()

@section('card-content')

@section('form-tag')


{!! Form::model($contratos, ['route' => ['FormularioContrato.update', $contratos->IdPCA], 'method' => 'PUT' ]) !!} 

{{ csrf_field()}}

@endsection


<div class="col-lg-12">
	<div class="table-responsive">					
		<!-- BEGIN STRUCTURE  -->						
		<div class="row">							
			<div class="col-md-12">
				<div class="panel-group" id="accordion1">
					<div class="card panel">
						<div class="card-head expanded" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
							<header>Editar Contrato</header>
							<div class="tools">
								<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
							</div>
						</div>
						{{-- PANEL 1 CREAR EMPRESA --}}
						<div id="accordion1-1" class="collapse in">


							<div class="card">
								<div class="card-body floating-label"> 
 
									<div class="card">
										<div class="card-body">

											<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Ordenador" value="{{old('Ordenador', $contratos->Ordenador)}}" name="Ordenador"  required>
									<label for="Ordenador">Ordenador</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group floating-label">
															{{ Form::select('SB', $Bienyservicio->pluck('NombreSB' , 'SB'), null, ['class' => 'form-control', 'id' => 'SB']) }}
															{{ Form::label('NombreSB', 'SB')}}
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Rubro" value="{{old('Rubro', $contratos->Rubro)}}" name="Rubro" required>
									<label for="Rubro">Rubro</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Subordinal" value="{{old('Subordinal', $contratos->Subordinal)}}" name="Subordinal" required>
									<label for="Subordinal">Subordinal</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="DescripcionRubro" value="{{old('DescripcionRubro', $contratos->DescripcionRubro)}}" name="DescripcionRubro" required>
									<label for="DescripcionRubro">Descripción Rubro</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Descripcion"  name="Descripcion" rows="4" required>{{old('Descripcion', $contratos->Descripcion)}} </textarea>
									<label for="Descripcion">Descripción</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="CodigoClasificacionUNSPSC" value="{{old('CodigoClasificacionUNSPSC', $contratos->CodigoClasificacionUNSPSC)}}" name="CodigoClasificacionUNSPSC" required>
									<label for="CodigoClasificacionUNSPSC">Codigo Clasificacion UNSPSC</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" value="{{old('Recurso', $contratos->Recurso)}}" id="Recurso" name="Recurso" required>
									<label for="Recurso">Recurso</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group floating-label">
							   		{{ Form::select('IdUnidadMedida', $UnidadMedidaCPA->pluck('NombreUnidadMedida' , 'IdUnidadMedida'), null, ['class' => 'form-control', 'id' => 'IdUnidadMedida']) }}
									<label for="IdUnidadMedida">Unidad de Medida</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" step="0.01" class="form-control" id="TotalRecursosCorriente" value="{{old('TotalRecursosCorriente', $contratos->TotalRecursosCorriente)}}" name="TotalRecursosCorriente" required>
									<label for="TotalRecursosCorriente">Total Recursos Corriente</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Cantidad" value="{{old('Cantidad', $contratos->Cantidad)}}" name="Cantidad" required>
									<label for="Cantidad">Cantidad</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" step="0.01" class="form-control" id="Valor" value="{{old('Valor', $contratos->Valor)}}" name="Valor" required>
									<label for="Valor">Valor</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NombreContrato" value="{{old('NombreContrato', $contratos->NombreContrato)}}" name="NombreContrato" required>
									<label for="NombreContrato">Nombre Contrato</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NumeroContrato" value="{{old('NumeroContrato', $contratos->NumeroContrato)}}" name="NumeroContrato" required>
									<label for="NumeroContrato">Numero de Contrato</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Responsable" value="{{old('Responsable', $contratos->Responsable)}}" name="Responsable" required>
									<label for="Responsable">Responsable</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Grupo" value="{{old('Grupo', $contratos->Grupo)}}" name="Grupo" required>
									<label for="Grupo">Grupo</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Situacion" name="Situacion" rows="4" required>{{old('Situacion', $contratos->Situacion)}} </textarea>
									<label for="Situacion">Situacion</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="FuncionarioDECOMEMACO" value="{{old('FuncionarioDECOMEMACO', $contratos->FuncionarioDECOMEMACO)}}" name="FuncionarioDECOMEMACO" required>
									<label for="FuncionarioDECOMEMACO">Funcionario DECOM-EMACO</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="MesCRP" value="{{old('MesCRP', $contratos->MesCRP)}}" name="MesCRP" required>
									<label for="MesCRP">MesCRP</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="MesObligacion" value="{{old('MesObligacion', $contratos->MesObligacion)}}" name="MesObligacion" required>
									<label for="MesObligacion"> Mes Obligacion</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="number" min="0.00" max="10000000000.00" step="0.01" class="form-control" id="ValorObligacion" value="{{old('ValorObligacion', $contratos->ValorObligacion)}}" name="ValorObligacion" required>
									<label for="ValorObligacion">Valor Obligacion</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Proveedor" value="{{old('Proveedor', $contratos->Proveedor)}}" name="Proveedor" required>
									<label for="Proveedor">Proveedor</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Pagos" name="Pagos" rows="4" required>{{old('Pagos', $contratos->Pagos)}}  </textarea>
									<label for="Pagos">Pagos</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NoCPA" value="{{old('NoCPA', $contratos->NoCPA)}}" name="NoCPA" required>
									<label for="NoCPA">Número CPA</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCPA" value="{{old('FechaCPA', $contratos->FechaCPA)}}" name="FechaCPA" required >
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
									<input type="text" class="form-control" id="NoCPD" value="{{old('NoCPD', $contratos->NoCPD)}}" name="NoCPD" required>
									<label for="NoCPD">Número CPD</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCPD" value="{{old('FechaCPD', $contratos->FechaCPD)}}" name="FechaCPD" required >
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
									<input type="text" class="form-control" id="NoCRP" value="{{old('NoCRP', $contratos->NoCRP)}}" name="NoCRP" required>
									<label for="NoCRP">Número CRP</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaCRP" value="{{old('FechaCRP', $contratos->FechaCRP)}}" name="FechaCRP" required >
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
											<input type="text" class="form-control" id="FechaEntregaMaterial" value="{{old('FechaEntregaMaterial', $contratos->FechaEntregaMaterial)}}" name="FechaEntregaMaterial" required >
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
									<textarea class="form-control" id="Observaciones" name="Observaciones" rows="4" required>{{old('Observaciones', $contratos->Observaciones)}} </textarea>
									<label for="Observaciones">Observaciones</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="PostVenta" value="{{old('PostVenta', $contratos->PostVenta)}}" name="PostVenta" required >
									<label for="PostVenta">PostVenta</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="InformesSupervisionAlDia" value="{{old('InformesSupervisionAlDia', $contratos->InformesSupervisionAlDia)}}" name="InformesSupervisionAlDia" rows="1" required> </textarea>
									<label for="InformesSupervisionAlDia">Informes de Supervisión al Día</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Supervisor" value="{{old('Supervisor', $contratos->Supervisor)}}" name="Supervisor" required>
									<label for="Supervisor">Supervisor</label>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="numeric" step="Any" class="form-control" id="PorcentajeEjecucion" value="{{old('PorcentajeEjecucion', $contratos->PorcentajeEjecucion)}}" name="PorcentajeEjecucion" required >
									<label for="PorcentajeEjecucion">Porcentaje de Ejecucion  = <? echo ={{old('PorcentajeEjecucion', $contratos->PorcentajeEjecucion)}} ?></label>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="PlazoEjecucion" value="{{old('PlazoEjecucion', $contratos->PlazoEjecucion)}}" name="PlazoEjecucion" required >
											<label for="PlazoEjecucion">Plazo de Ejecucion</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group floating-label">
									{{ Form::select('IdEstadoPCA', $EstadoCPA->pluck('NombreEstadoPCA' , 'IdEstadoPCA'), null, ['class' => 'form-control', 'id' => 'EstadoPCA']) }}
									<label for="IdEstadoPCA">Estado</label>
								</div>
							</div>							
						</div>
					</div>
				</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
											</div>
											<div class="col-sm-6">
												<button type="button" onclick="window.location='{{ route("FormularioContrato.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
											</div>
										</div>
									</div>

								


								</div>	

								{!! Form::close() !!}

							</div>
						</div><!--end .panel -->

						{{-- END PANEL EDITAR CONVENIO --}}



					</div><!--end .panel-group -->								
				</div><!--end .col -->
			</div><!--end .row -->
			<!-- END STRUCTURE -->
		</div><!--end .table-responsive -->











		{{-- ////////////////////////// --}}





		{{-- BEGIN CREATE MODAL --}}
		<div id="id1" class="modal" style="padding-top:135px;">

			<div class="modal-content">


				<div class="card-head style-primary">
					<header>Creación de codigos ATA	</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<center>

					{!! Form::open(array('route' => 'ata.store', 'data-parsley-validate' => 'parsley')) !!}

					{{ csrf_field()}}

					<br>
					Convenio{{ Form::label('ATA', 'ATA')}}
					{{ Form::text('ATA', null, array('class' => 'form-control', 'style' => 'width: 60%', 'required' => '' )) }}

					<br>
					{{ Form::label('codigo_ata', 'Codigo Ata')}}
					{{ Form::text('codigo_ata', null, array('class' => 'form-control', 'style' => 'width: 60%', 'required' => '' )) }}


					<br>
					{{ Form::label('general', 'General')}}
					{{ Form::text('general', null, array('class' => 'form-control', 'style' => 'width: 60%',  'required' => '' )) }}

					<br>

					<div class="form-group">
						<center><button type="submit" class="btn btn-info">Crear Codigo</button></center>
					</div>	


				</center>



				{!! Form::close() !!}

				<script>
					function ConfirmDelete()
					{
						var x = confirm("Are you sure you want to delete?");
						if (x)
							return true;
						else
							return false;
					}
				</script>




			</div>
		</div>


		{{-- END CREATEMODAL --}}


		@endsection()




		@endsection()




		@endsection()