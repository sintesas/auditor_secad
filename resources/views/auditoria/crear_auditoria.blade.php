
@extends('partials.card')

@extends('layout')

@section('title')
	Crear Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'auditoria.store', 'data-parsley-validate' => 'parsley', 'id' => 'form-auditoria')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_auditoria')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label ">

					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required>
								<label class="required" for="NombreAuditoria">Nombre Auditoria</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
										<label for="FechaInicio" class="required">Fecha de Inicio</label>
									</div>
									<span class="input-group-addon"></span>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Codigo" name="Codigo" readonly>
								<label class="required" id="lblCodigo" for="codigo">Código</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa', 'name' => 'IdEmpresa', 'required' ]) }}
								<label class="required" for="IdEmpresa">Organización auditada</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdEmpresaAudita', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresaAudita', 'name' => 'IdEmpresaAudita',]) }}
								<label for="IdEmpresaAudita">Organización que audita</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" >
								<select class="form-control" id="IdPersonalInspectorLider" name="IdPersonalInspectorLider">
								</select>
								<label for="IdPersonalInspectorLider" >Inspector Lider</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" >
								<select id="IdPersonalAuditorLider" name="IdPersonalAuditorLider" class="form-control" aria-required="true" required>
								</select>
								<label class="required" for="IdPersonalAuditorLider" >Auditor Lider</label>
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
								<input type="text" class="form-control" id="ExpertosTecnicos" name="ExpertosTecnicos"  >
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
						<label class="required" for="IdCriterios" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Criterios</label>
							<div class="form-group" >
								{{ Form::select('IdCriterios', $criterios, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdCriterios', 'required'=>'required', 'name' => 'IdCriterios[]']) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required aria-required="true">

								</select>
								<label class="required" for="IdFuncionarioEmpresa">Responsable</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" >
								<label id="lblCargoRespo" for="CargoRespo">Cargo responsable</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdTipoAuditoria', $tiposAuditoria->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['class' => 'form-control' , 'require' => 'require']) }}
								<label for="IdTipoAuditoria">Tipo Auditoria</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select id="Accion" name="Accion" class="form-control" aria-required="true">
									<option value="" selected="selected"></option>
									<option value="Realizada">Realizada</option>
									<option value="Recibida">Recibida</option>
								</select>
								<label for="Accion">Accion</label>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="Lugar" name="Lugar">
								<label for="Lugar">Lugar</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" id="Objeto" name="Objeto" rows="3" > </textarea>
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
												<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" require>
												<label for="FechaAperAudit">Fecha Apertura</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraInicio" name="HoraInicio" class="form-control" required aria-required="true" >
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="14:30">14:30</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
										<label class="required" for="HoraInicio">Hora Inicio</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" require>
												<label for="FechaTermino">Fecha Termino</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraTermi" name="HoraTermi" class="form-control" required aria-required="true" require>
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="14:30">14:30</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
										<label class="required" for="HoraTermi">Hora Cierre</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Alcance" name="Alcance" rows="2" > </textarea>
								<label for="Alcance">Alcance</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" > </textarea>
								<label for="Observaciones">Observaciones</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select id="Dependencia" name="Dependencia" class="form-control" required aria-required="true" >
									<option value="" selected="selected"></option>
									<option value="SECAD">SECAD</option>	
									<option value="CEOAF">CEOAF</option>
								</select>
								<label class="required" for="Dependencia">Dependencia</label>
							</div>
						</div>
					</div>

					<input type="hidden" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">
			</div>

			{{-- submit button --}}

			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("auditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
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
			});

			$('button[type=submit]').on('click', function(){

				console.log('cpcacpña');

				if($('input[required=""]').val()== '' || $('select[required=""]').val()== ''){
					alert('Debe llenar todos los campos obligatorios señalados con asterisco de color rojo *');
				}
			})

			$('#IdEmpresa').change(function(event) {

				$('#IdFuncionarioEmpresa').val(null).trigger('change');

				//Carga el consecutivo de Auditoria para la empresa
				$.get("consecutivo/" + event.target.value + "", function(response, state){

					//*** Falta traer el nuevo codigo
					var nexCode = '';
					var sigla = response[0].SiglasNombreClave;
					var actualcode = response[0].Codigo;
					var tipoOrganizacion = response[0].TipoOrganizacion;


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
				$.get("funcionariosLDAP/" + event.target.value + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
					}
				});
			});



			/*$('#IdFuncionarioEmpresa').change(function(event) {
				$('#CargoRespo').val('');
				if (event.target.value != "")
				{
					$.get('funcionario/'+ event.target.value + "", function(response, state){
						$('#CargoRespo').val(response[0].CargoFuncion);
						//$('#CargoRespo').focus();
						$('#lblCargoRespo').css( "font-size", "12px" );
					});
				}
			});*/


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


				//Validar si la empresa pertenece a FAC
				$.get("consecutivo/" + event.target.value + "", function(response, state){

					var tipoOrganizacion = response[0].TipoOrganizacion;

					if (tipoOrganizacion == 'FAC')
					{
						$('#IdPersonalAuditorLider, #IdPersonalInspectorLider').select2({
							placeholder: "",
							minimumInputLength: 3,
							allowClear: true
						});

						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioWS');

						$.get("funcionariosLDAP/" + event.target.value + "", function(response, state){
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

						$('#IdPersonalAuditorLider, #IdPersonalInspectorLider').select2({
							placeholder: "",
							minimumInputLength: 0,
							allowClear: true
						});

						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioEmpresa');

						//Carga el combo de funcionarios de la empresa
						$.get("funcionarios/" + event.target.value + "", function(response, state){
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

						/*$('#IdFuncionarioEmpresa').change(function(event) {
							$('#CargoRespo').val('');
							if (event.target.value != "")
							{
								$.get('funcionario/'+ event.target.value + "", function(response, state){
									$('#CargoRespo').val(response[0].CargoFuncion);
									//$('#CargoRespo').focus();
									$('#lblCargoRespo').css( "font-size", "12px" );
								});
							}
						});*/
					}
				});
			});


			setTimeout(function(){
				$("#IdEquipoInpectorOption, #IdExpertosTecnicosOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();
			}, 100);

			/*$('.categoryName').select2({
				placeholder: 'Selecciona una categoría',
				ajax: {
				url: 'ajax.php',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
					results: data
					};
				},
				cache: true
				}
			});*/

		</script>
		<style>
			.required:before{
		        content:'*';
		        color:red;
		        padding-left:5px;
		    }
		</style>
		@endsection()

	@endsection()

@endsection()
