@extends('partials.card')

@extends('layout')

@section('title')
Crear Programa
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'detalleprograma.store')) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{ Breadcrumbs::render('detalleprograma') }}	
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
                {{-- <ul class="nav nav-tabs" data-toggle="tabs">
                	<li><a  href="#home">Crear<br>Programa</a></li>
                </ul> --}}
					
					<h2><b>Crear Programa</b></h2>
					<hr>
					<br><br>

                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                <div class="tab-content">
                	<div id="home" class="tab-pane active">
                		<div class="row">
                			<div class="col-lg-4">	
                				<div class="form-group floating-label">	
                					<input type="text" class="form-control" id="NoPrograma" name="NoPrograma" value="{{old('NoPrograma', $consecutivo)}}" required>
                					<label for="NoPrograma">No Programa</label>
                				</div>
                			</div>

						<div class="col-lg-4">	
							<div class="form-group floating-label">
								{{ Form::select('IdTipoPrograma', $TipoProgramas->pluck('Tipo', 'IdTipoPrograma'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdTipoPrograma', 'Tipo')}}
							</div>									
						</div>
						<div class="col-lg-4">	
							<div class="form-group floating-label">
								{{ Form::select('IdAeronave', $Aeronaves->pluck('Aeronave', 'IdAeronave'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdAeronave', 'Equipo')}}
							</div>															
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdUnidad', $Unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdUnidad', 'Unidad')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdEmpresa', $Empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdEmpresa', 'Empresa')}}
							</div>
						</div>															
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdEstadoPrograma', $Estados->pluck('Descripcion', 'IdEstadoPrograma'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdEstadoPrograma', 'Estado')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('AccionSECAD', $areas, null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('Area', 'Area')}}
							</div>
						</div>							
					</div>	
					<div class="row">
						<div class="col-lg-6">	
							<div class="form-group floating-label">
								<textarea name="Proyecto" id="Proyecto" class="form-control" rows="3" required=""></textarea>
								<label for="Proyecto">Descripción proyecto</label>
							</div>
						</div>	
						<div class="col-lg-6">	
							<div class="form-group floating-label">
								{{ Form::select('Alcance', $alcances, null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('Alcance', 'Alcance')}}
							</div>		
						</div>			
					</div>
					<div class="row">
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdProductoServicio', $Productos->pluck('Nombre', 'IdDemandaPotencial'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdProductoServicio', 'Producto Aeronautico')}}
							</div>
						</div>	
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="IdHorasTipoPrograma" id="IdHorasTipoPrograma" placeholder="" required="">
								<label for="IdHorasTipoPrograma">Horas Tipo Programa</label>
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdPersonalJefePrograma', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control', 'required' => '', 'id' => 'IdPersonalJefePrograma']) }}
								{{ Form::label('IdPersonalJefePrograma', 'Jefe Programa')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdPersonalJefeSuplente', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control', 'required' => '', 'id' => 'IdPersonalJefeSuplente']) }}
								{{ Form::label('IdPersonalJefeSuplente', 'Suplente')}}
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-3">	
							<div class="form-group control-width-normal">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										{{ Form::text('FechaInicio', null, array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('FechaInicio', 'Fecha Inicio')}}	
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>	
							</div>	
						</div>
						<div class="col-lg-3">	
							<div class="form-group control-width-normal">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										{{ Form::text('FechaTermino', null, array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('FechaTermino', 'Fecha Termino')}}	
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>	
							</div>	
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdRespuestoModificacion', $Repuesto->pluck('Descripcion', 'IdRepuesto'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdRespuestoModificacion', 'Repuesto/Modif')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdAReferenciaPrograma', $Referencia->pluck('Descripcion', 'IdReferencia'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdAReferenciaPrograma', 'Referencia')}}
							</div>
						</div>	
					</div>												
					<div class="row">													
						{{-- <div class="col-lg-6">	
							<div class="form-group floating-label">
								{{ Form::select('IdBaseCertificacion', $BaseCertificacion->pluck('Nombre', 'IdBaseCertificacion'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdBaseCertificacion', 'Base de Certificación')}}
							</div>
						</div>		 --}}											
						<div class="col-lg-3">	
							<div class="checkbox checkbox-styled">
								<label>
									<input type="checkbox" id="Finalizado" value="">
									<span>Finalizado</span>
								</label>
							</div>
						</div>

					</div>															
					<div class="row">
						<div class="col-sm-6">	
							{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
						</div>	
						<div class="col-sm-6">	
							{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}	
						</div>										
					</div>
				</div>
			
			{!! Form::close() !!}
			<script type="text/javascript">
				$('select').select2();
			</script>
			<script type="text/javascript">
				$('#IdPersonalJefeSuplente').change(function(event) {
	                var espP = $('#IdPersonalJefePrograma').val();
	                var espS = event.target.value;
	                if(espP == espS)
	                {
	                    toastr.warning('Seleccione otro(a) Suplente');
	                    $('#select2-chosen-14').text('');
	                    $('#IdPersonalJefeSuplente').val($("#IdPersonalJefeSuplente option:first").val());
	                }
	            });

	            $('#IdPersonalJefePrograma').change(function(event) {
	                var espS = $('#IdPersonalJefeSuplente').val();
	                var espP = event.target.value;
	                if(espP == espS)
	                {
	                    toastr.warning('Seleccione otro(a) Jefe de Programa');
	                    $('#select2-chosen-13').text('');
	                    $('#IdPersonalJefePrograma').val($("#IdPersonalJefePrograma option:first").val());
	                }
	            });
            </script>
			@endsection()

			@endsection()

			@endsection()