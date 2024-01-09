@extends('partials.card')

@extends('layout')

@section('title')
	Editar Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		{!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

		{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_auditoria')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required value="{{old('NombreAuditoria', $auditoria->NombreAuditoria)}}">
							<label for="NombreAuditoria">Nombre Auditoria</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required value="{{old('FechaInicio', $auditoria->FechaInicio)}}">
									<label for="FechaInicio">Fecha de Inicio</label>
								</div>
								<span class="input-group-addon"></span>
							</div>	
						</div>	
					</div>
				</div>

				<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Codigo" name="Codigo"  readonly required value="{{old('Codigo', $auditoria->Codigo)}}">	
								<label id="lblCodigo" for="codigo">Código</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa', 'required']) }}
								<label for="IdEmpresa">Organización auditada</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdEmpresaAudita', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresaAudita', 'required']) }}
								<label for="IdEmpresaAudita">Organización que audita</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" >
								<select class="form-control" id="IdPersonalInspectorLider" name="IdPersonalInspectorLider" required>
								</select>
								<label for="IdPersonalInspectorLider" >Inspector Lider</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" >
								<select id="IdPersonalAuditorLider" name="IdPersonalAuditorLider" class="form-control" aria-required="true" required>
								</select>
								<label for="IdPersonalAuditorLider" >Auditor Lider</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
                        	<label for="IdEquipoInpectorOption" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Equipo Inspector</label>
							<div class="form-group">
								<select id="IdEquipoInpectorOption" name="IdEquipoInpectorOption[]" class="form-control"  multiple></select>
							</div>
						</div>

						<div class="col-sm-12">
							<label for="EquipoInspector" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Expertos Técnicos</label>
							<div class="form-group" >
								<input type="text" class="form-control" id="ExpertosTecnicos" name="ExpertosTecnicos" value="{{old('ExpertosTecnicos', $auditoria->ExpertosTecnicos)}}" >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
						<label for="IdCriterios" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Criterios</label>
							<div class="form-group" >
								{{ Form::select('IdCriterios', $criterios, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdCriterios', 'name' => 'IdCriterios[]']) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required aria-required="true">
									
								</select>
								<label for="IdFuncionarioEmpresa">Responsable</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" value="{{old('CargoRespo', $auditoria->CargoRespo)}}">
								<label id="lblCargoRespo" for="CargoRespo">Cargo responsable</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdTipoAuditoria', $tiposAuditoria->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['class' => 'form-control' , 'required']) }}
								<label for="IdTipoAuditoria">Tipo Auditoria</label>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select id="Accion" name="Accion" class="form-control">
									<option value="default"></option>
									<option value="Realizada" {{ old('Accion', $auditoria->Accion) == 'Realizada' ? 'selected' : '' }}>Realizada</option>
									<option value="Recibida" {{ old('Accion', $auditoria->Accion) == 'Recibida' ? 'selected' : '' }}>Recibida</option>
								</select>
								<label for="Accion">Accion</label>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">								
								<input type="text" class="form-control" id="Lugar" name="Lugar" value="{{old('Lugar', $auditoria->Lugar)}}">
								<label for="Lugar">Lugar</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" id="Objeto" name="Objeto" rows="3" >{{old('Objeto', $auditoria->Objeto)}}</textarea>
										<label for="Objeto">Objeto</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" required value="{{old('FechaAperAudit', $auditoria->FechaAperAudit)}}">
											<label for="FechaAperAudit">Fecha Apertura</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<select id="HoraIni" name="HoraIni" class="form-control" required aria-required="true" >
										<option value="" selected="selected"></option>
										<option value="0:00" {{ old('HoraIni', $auditoria->HoraIni) == '0:00' ? 'selected' : '' }}>0:00</option>
										<option value="0:30" {{ old('HoraIni', $auditoria->HoraIni) == '0:30' ? 'selected' : '' }}>0:30</option>
										<option value="1:00" {{ old('HoraIni', $auditoria->HoraIni) == '1:00' ? 'selected' : '' }}>1:00</option>
										<option value="1:30" {{ old('HoraIni', $auditoria->HoraIni) == '1:30' ? 'selected' : '' }}>1:30</option>
										<option value="2:00" {{ old('HoraIni', $auditoria->HoraIni) == '2:00' ? 'selected' : '' }}>2:00</option>
										<option value="2:30" {{ old('HoraIni', $auditoria->HoraIni) == '2:30' ? 'selected' : '' }}>2:30</option>
										<option value="3:00" {{ old('HoraIni', $auditoria->HoraIni) == '3:00' ? 'selected' : '' }}>3:00</option>
										<option value="3:30" {{ old('HoraIni', $auditoria->HoraIni) == '3:30' ? 'selected' : '' }}>3:30</option>
										<option value="4:00" {{ old('HoraIni', $auditoria->HoraIni) == '4:00' ? 'selected' : '' }}>4:00</option>
										<option value="4:30" {{ old('HoraIni', $auditoria->HoraIni) == '4:30' ? 'selected' : '' }}>4:30</option>
										<option value="5:00" {{ old('HoraIni', $auditoria->HoraIni) == '5:00' ? 'selected' : '' }}>5:00</option>
										<option value="5:30" {{ old('HoraIni', $auditoria->HoraIni) == '5:30' ? 'selected' : '' }}>5:30</option>
										<option value="6:00" {{ old('HoraIni', $auditoria->HoraIni) == '6:00' ? 'selected' : '' }}>6:00</option>
										<option value="6:30" {{ old('HoraIni', $auditoria->HoraIni) == '6:30' ? 'selected' : '' }}>6:30</option>
										<option value="7:00" {{ old('HoraIni', $auditoria->HoraIni) == '7:00' ? 'selected' : '' }}>7:00</option>
										<option value="7:30" {{ old('HoraIni', $auditoria->HoraIni) == '7:30' ? 'selected' : '' }}>7:30</option>
										<option value="8:00" {{ old('HoraIni', $auditoria->HoraIni) == '8:00' ? 'selected' : '' }}>8:00</option>
										<option value="8:30" {{ old('HoraIni', $auditoria->HoraIni) == '8:30' ? 'selected' : '' }}>8:30</option>
										<option value="9:00" {{ old('HoraIni', $auditoria->HoraIni) == '9:00' ? 'selected' : '' }}>9:00</option>
										<option value="9:30" {{ old('HoraIni', $auditoria->HoraIni) == '9:30' ? 'selected' : '' }}>9:30</option>
										<option value="10:00" {{ old('HoraIni', $auditoria->HoraIni) == '10:00' ? 'selected' : '' }}>10:00</option>
										<option value="10:30" {{ old('HoraIni', $auditoria->HoraIni) == '10:30' ? 'selected' : '' }}>10:30</option>
										<option value="11:00" {{ old('HoraIni', $auditoria->HoraIni) == '11:00' ? 'selected' : '' }}>11:00</option>
										<option value="11:30" {{ old('HoraIni', $auditoria->HoraIni) == '11:30' ? 'selected' : '' }}>11:30</option>
										<option value="12:00" {{ old('HoraIni', $auditoria->HoraIni) == '12:00' ? 'selected' : '' }}>12:00</option>
										<option value="12:30" {{ old('HoraIni', $auditoria->HoraIni) == '12:30' ? 'selected' : '' }}>12:30</option>
										<option value="13:00" {{ old('HoraIni', $auditoria->HoraIni) == '13:00' ? 'selected' : '' }}>13:00</option>
										<option value="13:30" {{ old('HoraIni', $auditoria->HoraIni) == '13:30' ? 'selected' : '' }}>13:30</option>
										<option value="14:00" {{ old('HoraIni', $auditoria->HoraIni) == '14:00' ? 'selected' : '' }}>14:00</option>
										<option value="14:30" {{ old('HoraIni', $auditoria->HoraIni) == '14:30' ? 'selected' : '' }}>14:30</option>
										<option value="15:00" {{ old('HoraIni', $auditoria->HoraIni) == '15:00' ? 'selected' : '' }}>15:00</option>
										<option value="15:30" {{ old('HoraIni', $auditoria->HoraIni) == '15:30' ? 'selected' : '' }}>15:30</option>
										<option value="16:00" {{ old('HoraIni', $auditoria->HoraIni) == '16:00' ? 'selected' : '' }}>16:00</option>
										<option value="16:30" {{ old('HoraIni', $auditoria->HoraIni) == '16:30' ? 'selected' : '' }}>16:30</option>
										<option value="17:00" {{ old('HoraIni', $auditoria->HoraIni) == '17:00' ? 'selected' : '' }}>17:00</option>
										<option value="17:30" {{ old('HoraIni', $auditoria->HoraIni) == '17:30' ? 'selected' : '' }}>17:30</option>
										<option value="18:00" {{ old('HoraIni', $auditoria->HoraIni) == '18:00' ? 'selected' : '' }}>18:00</option>
										<option value="18:30" {{ old('HoraIni', $auditoria->HoraIni) == '18:30' ? 'selected' : '' }}>18:30</option>
										<option value="19:00" {{ old('HoraIni', $auditoria->HoraIni) == '19:00' ? 'selected' : '' }}>19:00</option>
										<option value="19:30" {{ old('HoraIni', $auditoria->HoraIni) == '19:30' ? 'selected' : '' }}>19:30</option>
										<option value="20:00" {{ old('HoraIni', $auditoria->HoraIni) == '20:00' ? 'selected' : '' }}>20:00</option>
										<option value="20:30" {{ old('HoraIni', $auditoria->HoraIni) == '20:30' ? 'selected' : '' }}>20:30</option>
										<option value="21:00" {{ old('HoraIni', $auditoria->HoraIni) == '21:00' ? 'selected' : '' }}>21:00</option>
										<option value="21:30" {{ old('HoraIni', $auditoria->HoraIni) == '21:30' ? 'selected' : '' }}>21:30</option>
										<option value="22:00" {{ old('HoraIni', $auditoria->HoraIni) == '22:00' ? 'selected' : '' }}>22:00</option>
										<option value="22:30" {{ old('HoraIni', $auditoria->HoraIni) == '22:30' ? 'selected' : '' }}>22:30</option>
										<option value="23:00" {{ old('HoraIni', $auditoria->HoraIni) == '23:00' ? 'selected' : '' }}>23:00</option>
										<option value="23:30" {{ old('HoraIni', $auditoria->HoraIni) == '23:30' ? 'selected' : '' }}>23:30</option>
									</select>
									<label for="HoraIni">Hora Inicio</label>
									<p class="help-block">Time: 24h</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">										
											<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required value="{{old('FechaTermino', $auditoria->FechaTermino)}}">
											<label for="FechaTermino">Fecha Termino</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<select id="HoraTermi" name="HoraTermi" class="form-control" required aria-required="true" required>
										<option value="" selected="selected"></option>
										<option value="0:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '0:00' ? 'selected' : '' }}>0:00</option>
										<option value="0:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '0:30' ? 'selected' : '' }}>0:30</option>
										<option value="1:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '1:00' ? 'selected' : '' }}>1:00</option>
										<option value="1:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '1:30' ? 'selected' : '' }}>1:30</option>
										<option value="2:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '2:00' ? 'selected' : '' }}>2:00</option>
										<option value="2:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '2:30' ? 'selected' : '' }}>2:30</option>
										<option value="3:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '3:00' ? 'selected' : '' }}>3:00</option>
										<option value="3:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '3:30' ? 'selected' : '' }}>3:30</option>
										<option value="4:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '4:00' ? 'selected' : '' }}>4:00</option>
										<option value="4:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '4:30' ? 'selected' : '' }}>4:30</option>
										<option value="5:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '5:00' ? 'selected' : '' }}>5:00</option>
										<option value="5:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '5:30' ? 'selected' : '' }}>5:30</option>
										<option value="6:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '6:00' ? 'selected' : '' }}>6:00</option>
										<option value="6:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '6:30' ? 'selected' : '' }}>6:30</option>
										<option value="7:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '7:00' ? 'selected' : '' }}>7:00</option>
										<option value="7:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '7:30' ? 'selected' : '' }}>7:30</option>
										<option value="8:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '8:00' ? 'selected' : '' }}>8:00</option>
										<option value="8:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '8:30' ? 'selected' : '' }}>8:30</option>
										<option value="9:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '9:00' ? 'selected' : '' }}>9:00</option>
										<option value="9:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '9:30' ? 'selected' : '' }}>9:30</option>
										<option value="10:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '10:00' ? 'selected' : '' }}>10:00</option>
										<option value="10:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '10:30' ? 'selected' : '' }}>10:30</option>
										<option value="11:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '11:00' ? 'selected' : '' }}>11:00</option>
										<option value="11:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '11:30' ? 'selected' : '' }}>11:30</option>
										<option value="12:00" {{ old('HoraIni', $auditoria->HoraIni) == '12:00' ? 'selected' : '' }}>12:00</option>
										<option value="12:30" {{ old('HoraIni', $auditoria->HoraIni) == '12:30' ? 'selected' : '' }}>12:30</option>
										<option value="13:00" {{ old('HoraIni', $auditoria->HoraIni) == '13:00' ? 'selected' : '' }}>13:00</option>
										<option value="13:30" {{ old('HoraIni', $auditoria->HoraIni) == '13:30' ? 'selected' : '' }}>13:30</option>
										<option value="14:00" {{ old('HoraIni', $auditoria->HoraIni) == '14:00' ? 'selected' : '' }}>14:00</option>
										<option value="14:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '14:30' ? 'selected' : '' }}>14:30</option>
										<option value="15:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '15:00' ? 'selected' : '' }}>15:00</option>
										<option value="15:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '15:30' ? 'selected' : '' }}>15:30</option>
										<option value="16:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '16:00' ? 'selected' : '' }}>16:00</option>
										<option value="16:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '16:30' ? 'selected' : '' }}>16:30</option>
										<option value="17:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '17:00' ? 'selected' : '' }}>17:00</option>
										<option value="17:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '17:30' ? 'selected' : '' }}>17:30</option>
										<option value="18:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '18:00' ? 'selected' : '' }}>18:00</option>
										<option value="18:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '18:30' ? 'selected' : '' }}>18:30</option>
										<option value="19:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '19:00' ? 'selected' : '' }}>19:00</option>
										<option value="19:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '19:30' ? 'selected' : '' }}>19:30</option>
										<option value="20:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '20:00' ? 'selected' : '' }}>20:00</option>
										<option value="20:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '20:30' ? 'selected' : '' }}>20:30</option>
										<option value="21:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '21:00' ? 'selected' : '' }}>21:00</option>
										<option value="21:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '21:30' ? 'selected' : '' }}>21:30</option>
										<option value="22:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '22:00' ? 'selected' : '' }}>22:00</option>
										<option value="22:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '22:30' ? 'selected' : '' }}>22:30</option>
										<option value="23:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '23:00' ? 'selected' : '' }}>23:00</option>
										<option value="23:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '23:30' ? 'selected' : '' }}>23:30</option>
									</select>
									<label for="HoraTermi">Hora Cierre</label>
									<p class="help-block">Time: 24h</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="Alcance" name="Alcance" rows="2" required>{{old('Alcance', $auditoria->Alcance)}}</textarea>
							<label for="Alcance">Alcance</label>
						</div>
					</div>
				</div>	
					
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" >{{old('Observaciones', $auditoria->Observaciones)}}</textarea>
								<label for="Observaciones">Observaciones</label>
							</div>
						</div>
					</div>

				<input type="hidden" value="{{$auditoria->IdFuncionarioEmpresa}}" id="IdFuncionarioEmpresaUpta" name="IdFuncionarioEmpresaUpta">
				<!-- Inspector Lider-->
				<input type="hidden" value="{{$auditoria->IdPersonalInsp}}" id="IdInspectorLiderUpta" name="IdInspectorLiderUpta">
				<!-- Auditor Lider-->
				<input type="hidden" value="{{$auditoria->IdPersonalAudi}}" id="IdAuditorLiderUpta" name="IdAuditorLiderUpta">

				<input type="hidden" value="{{$auditoria->EstadoInsertOrganizacion}}" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">

			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("auditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		

		<script type="text/javascript">

			$(document).ready(function(){

				$('select').select2();

				$('#IdPersonalAuditorLider, #IdPersonalInspectorLider, #IdEquipoInpectorOption, #IdFuncionarioEmpresa').select2({
					placeholder: "",
					minimumInputLength: 3,
					allowClear: true
				});

				var idEmpresa = $('#IdEmpresa').val();
				var idEmpresaAudita = $('#IdEmpresaAudita').val();
				var idFuncionario = $('#IdFuncionarioEmpresaUpta').val();
				var idInspectorLider = $('#IdInspectorLiderUpta').val();
				var idAuditorLider = $('#IdAuditorLiderUpta').val();
				
				var estadoUsuario = $('#EstadoInsertOrganizacion').val();

				
				//Responsables
				$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#IdFuncionarioEmpresa').append('<option value=""></option>');
					for(i=0; i<response.length; i++){
						if (response[i].IdUserLDAP == idFuncionario.toString()){
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '" selected>' +  response[i].Name + '</option>');
						}
						else
						{
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
						}
					}

					$('#IdFuncionarioEmpresa').trigger('change.select2');
				});

				/**
				 * Inspector Lider
				 * Auditor Lider
				 * Equipo Inspector
				 */
				$('#IdPersonalInspectorLider').empty();
				$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');

				$('#IdPersonalAuditorLider').empty();
				$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');

				$('#IdEquipoInpectorOption').empty();
				$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');
				//WS
				if(estadoUsuario == 'usuarioWS'){
					//Inspector Lider
					$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){

						for(i=0; i<response.length; i++){
							if(response[i].IdUserLDAP == idInspectorLider.toString()){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdUserLDAP + '" selected>' +  response[i].Name + '</option>');
							}else{
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
							}
							if(response[i].IdUserLDAP == idAuditorLider.toString()){
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdUserLDAP + '" selected>' +  response[i].Name + '</option>');
							}else{
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
							}
							$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
						}
						var resultEquipoInspector = eval('{!! $regEquipoInspectorAsociadosWS !!}');
						$("#IdEquipoInpectorOption").select2("val", resultEquipoInspector);
						$('#IdPersonalInspectorLider, #IdPersonalAuditorLider').trigger('change.select2');
					});
				//Empresa
				}else{
					$.get("../funcionarios/" + idEmpresaAudita + "", function(response, state){

						for(i=0; i<response.length; i++){
							if(response[i].IdFuncionarioEmpresa == idInspectorLider.toString()){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '" selected>' +  response[i].Nombres + '</option>');
							}else{
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
							if(response[i].IdFuncionarioEmpresa == idAuditorLider.toString()){
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '" selected>' +  response[i].Nombres + '</option>');
							}else{
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
							$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							
						}
						var resultEquipoInspector = eval('{!! $regEquipoInspectorAsociadosEmpresa !!}');
						$("#IdEquipoInpectorOption").select2("val", resultEquipoInspector);

						$('#IdPersonalInspectorLider, #IdPersonalAuditorLider').trigger('change.select2');
					});
				}
			});

			$('#IdEmpresa').change(function(event) {

				$('#IdFuncionarioEmpresa').val(null).trigger('change');

				//Carga el consecutivo de Auditoria para la empresa
				$.get("../consecutivo/" + event.target.value + "", function(response, state){
					
					//*** Falta traer el nuevo codigo
					var nexCode = '';
					var sigla = response[0].SiglasNombreClave;
					var actualcode = response[0].Codigo;

					if (actualcode == null)
					{
						nexCode = sigla + '0001';
					}
					else
					{						
						var code = actualcode.split(response[0].SiglasNombreClave);
						if (code.length == 1)
						{
							nexCode = sigla + '0001';
						}
						else
						{
							var numCode = parseInt(code[1].replace(",","").replace("-","")) + 1;
							switch(numCode.toString().length) {
								case 1:
								    nexCode = sigla + '000' + numCode;
								    break;
								case 2:
								     nexCode = sigla + '00' + numCode;
								    break;
								 case 3:
								     nexCode = sigla + '0' + numCode;
								    break;
								 case 4:
								    nexCode = sigla + numCode;
								    break;
							}
						}
					}
					
					$('#Codigo').val(nexCode);
					$('#CodigoV').val(nexCode);
					$('#lblCodigo').css( "font-size", "12px" );
				});


				//Carga el combo de funcionarios de la empresa
				$.get("../funcionarios/" + event.target.value + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#CargoRespo').val('');
					$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
					}
				});
			});

			//Organización que audita 
			$('#IdEmpresaAudita').change(function(event) {

				$('#IdPersonalInspectorLider').val(null).trigger('change');
				$('#IdPersonalAuditorLider').val(null).trigger('change');
				$("#IdEquipoInpectorOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();

				var value = $(this).val();

				//Validar si la empresa pertenece a FAC

				$.get("../consecutivo/" + event.target.value + "", function(response, state){
					
					var tipoOrganizacion = response[0].TipoOrganizacion;
					
					if (tipoOrganizacion == 'FAC')
					{
						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioWS');

						$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){
							$('#IdPersonalInspectorLider').empty();
							$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');

							$('#IdPersonalAuditorLider').empty();
							$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');

							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
							}
						});

					}else{
						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioEmpresa');

						//Carga el combo de funcionarios de la empresa
						$.get("../funcionarios/" + event.target.value + "", function(response, state){
							//inspector Lider
							$('#IdPersonalInspectorLider').empty();
							$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');
							//Auditor Lider
							$('#IdPersonalAuditorLider').empty();
							$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');
							//Equipo inspector
							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
						});
					}
				});
			});

			setTimeout(function(){
				$(" #IdExpertosTecnicosOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();
				
				var resultCriterios = eval('{!! $regCriteriosAsociados !!}');
				$("#IdCriterios").select2("val", resultCriterios);
				
			}, 100);

			
			
		</script>
		@endsection()

	@endsection()

@endsection()