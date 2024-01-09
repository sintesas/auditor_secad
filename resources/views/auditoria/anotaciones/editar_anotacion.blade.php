@extends('partials.card')

@extends('layout')

@section('title')
Editar Anotación
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	.select2-container-disabled ul li div{
		color: black;
	}
</style>

@endsection()

	@section('content')

		@section('card-content')

			@section('form-tag')

				{!! Form::model($anotacion, ['route' => ['anotacion.update', $anotacion->IdAnotacion], 'method' => 'PUT', 'files' =>true ]) !!}

				{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_anotacion')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<p>Los campos marcados con * son obligatorios.</p>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<input type="text" class="form-control"  id="IdAuditoriaTxt"  value="{{old('Auditoria', $auditoria->Codigo)}}" readonly>
						{{Form::select('IdAuditoria', $auditorias->pluck('Codigo', 'IdAuditoria'), old('value'), ['class' => 'form-control', 'id' => 'IdAuditoria', 'required','style'=>'display:none']) }}
						<label for="Auditoria">Auditoria *</label>
					</div>
				</div>
				<div class="col-sm-6">
					
					<div class="form-group">
						
						<input type="text" class="form-control"  id="IdTipoAnotacionTxt"  value="{{old('Anotacion', $tipoAnotacion->Anotacion)}}" readonly>
						{{ Form::select('IdTipoAnotacion', $tiposAnotacion->pluck('Anotacion', 'IdTipoAnotacion'), null, ['class' => 'form-control', 'id' => 'IdTipoAnotacion', 'readonly','style'=>'display:none']) }}
						<label for="Anotacion">Tipo *</label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<input type="text" class="form-control" id="NoAnota" name="NoAnota" required readonly value="{{old('NoAnota', $anotacion->NoAnota)}}">
						<label id="lblNoAnota" for="NoAnota">No Anotación</label>
					</div>
				</div>
			</div>

			<div class="row" id="AnotacionRow">
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::select('IdEnUnaAnotacion', [
						'0'=>'',
						'1' => 'Nueva',
						'2' => 'Repetida',
						'3' => 'Adicionada',
						], old('value'), [ 'class' =>  'form-control', 'id' => 'IdEnUnaAnotacion']) !!}
						<label for="IdEnUnaAnotacion">Es una anotacion: *</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="Fecha" name="Fecha" required value="{{old('Fecha', $anotacion->Fecha)}}" >
								<label for="Fecha">Fecha *</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						{{ Form::select('IdFuentesAnotacion', $fuentesAnotacion->pluck('Fuente', 'IdFuentesAnotacion'), old('value'), ['class' => 'form-control', 'id' => 'IdFuentesAnotacion','required']) }}
						<label for="Fuente">Fuente *</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						{{-- Form::select('IdClaseAnotacion', [
						'1' => 'Real',
						'2' => 'Potencial'
						], old('value'), [ 'class' =>  'form-control']) --}}
						{{ Form::select('IdClaseAnotacion', $clasesAnotaciones->pluck('Nombre', 'IdClaseAnotacion'), null, ['class' => 'form-control', 'id' => 'IdClaseAnotacion']) }}
						<label for="IdClaseAnotacion">Clase connotación</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<select name="IdActividadPlanInspeccion" id="IdActividadPlanInspeccion" class="form-control"></select>
						<label for="IdActividadPlanInspeccion" style="font-size:13px">Actividad plan inspección *</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<!--<select name="IdCriterioInspección" id="IdCriterioInspección" class="form-control"></select>-->
						<input type="text" class="form-control"  id="IdCriterioInspección"  value="{{old('Norma', $criterio[0]->Norma)}}" readonly>
						<label for="IdCriterioInspección">Criterio plan de inspección *</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control"  id="IdProcesoInspección"  value="{{old('Norma', $criterio[0]->Proceso)}}" readonly>
						<label for="IdProcespInspección">Proceso plan de inspección </label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control"  id="IdSubProcesoInspección"  value="{{old('Norma', $criterio[0]->SubProceso)}}" readonly>
						<label for="IdSubProcesoInspección">Sub-Proceso plan de inspección </label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="DescripcionEvidencia" name="DescripcionEvidencia" rows="2" required >{{old('DescripcionEvidencia', $anotacion->DescripcionEvidencia)}}  </textarea>
						<label for="DescripcionEvidencia">Descripcion y evidencia *</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="Plazo" name="Plazo" value="{{old('Plazo', $anotacion->Plazo)}}">
								<label for="Plazo">Plazo</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						{{ Form::select('IdProgramaCalidad', $programasCalidad->pluck('ProgramaCalidad', 'IdProgramaCalidad'), old('value'), ['class' => 'form-control', 'id' => 'IdProgramaCalidad']) }}
						<label for="IdProgramaCalidad">Programa calidad afectado*</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<textarea class="form-control" id="Correccion" name="Correccion" rows="2">{{old('Correccion', $anotacion->Correccion)}}</textarea>
						<label for="Correccion">Correccion Inmediata</label>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm-2">
					<div class="form-group">
						{{ Form::select('IdCriticidadAnotacion', $criticidadesAnotacion->pluck('CriticidadAnotacion', 'IdCriticidadAnotacion'), old('value'), ['class' => 'form-control', 'id' => 'IdCriticidadAnotacion']) }}
						<label for="Fuente">Criticidad</label>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="form-group">
					<input type="text" class="form-control" id="AuditoriaAnterior" name="AuditoriaAnterior" value="{{old('AuditoriaAnterior', $anotacion->AuditoriaAnterior)}}">
						<label for="AuditoriaAnterior">Se reportó en una auditoria anterior? *</label>
					</div>	
				</div>
			</div>
			<br>
			<div class="row" style="border-style: solid;border-width: 1px;">
				<div class="col-sm-6">
					<label for="tipoDoc" >Documentos</label>
					<div class="form-group">
						{!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group" id="archivoVisual">
					@foreach($fileAnotaciones as $item)
						<a href="../../{{$item->PathDoc}}" target="_blank">{{$item->FileNameDoc}}</a><br>
					@endforeach
					</div>
				</div>
			</div>
			<br>
			<div class="row" id="responsableCorreccionRow">
				<div class="col-sm-12">
				<label for="IdDependenciaResponsableCorreccion" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable corrección *</label>
					<div class="form-group" >
						{{ Form::select('IdDependencia', $dependencias, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableCorreccion', 'name' => 'IdDependenciaResponsableCorreccion[]']) }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
				<label for="IdDependenciaResponsableMejoramiento" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable del plan de mejoramiento *</label>
					<div class="form-group" >
						{{ Form::select('IdDependencia', $dependencias, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableMejoramiento', 'name' => 'IdDependenciaResponsableMejoramiento[]', 'required']) }}
					</div>
				</div>
			</div>

			@if ($rol === 'limitador' || $rol === 'limitador-all' || Auth::user()->hasRole('administrador'))
				<div class="row">
					<div class="col-sm-12">
					<label for="IdDependenciaResponsableHallazgo" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsables del hallazgo </label>
						<div class="form-group" >
							{{ Form::select('IdUserLDAP', $personalLDAP, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableHallazgo', 'name' => 'IdDependenciaResponsableHallazgo[]']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
					<label for="IdResponsableSeguimiento" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsables del seguimiento </label>
						<div class="form-group" >
							{{ Form::select('IdResponsableSeguimiento', $personalLDAP, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdResponsableSeguimiento', 'name' => 'IdResponsableSeguimiento[]']) }}
						</div>
					</div>
				</div>
			@endif
			<br>
			<div class="row">
				<div class="col-sm-12">
					<label for="IdResponsableAprobacion" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable de la aprobación *</label>
					<div class="form-group" >
						{{ Form::select('IdResponsableAprobacion', $personalLDAP, null, ['onchange' => "", 'class' => 'form-control', 'id' => 'IdResponsableAprobacion', 'name' => 'IdResponsableAprobacion', 'required']) }}
					</div>
				</div>
			</div>

			<!--Responsable Aprobación-->
			<input type="hidden" name="IdResponsableAprobacionUpt" id="IdResponsableAprobacionUpt" value="{{$anotacion->IdResponsableAprobacion}}">

			<input type="hidden" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">

			<!--Actividad de Inspección-->
			<input type="hidden" name="IdActividadPlanInspeccionUpt" id="IdActividadPlanInspeccionUpt" value="{{$anotacion->IdActividadPlanInspeccion}}">

			<!--Criterio de Inspección-->
			<input type="hidden" name="IdCriterioInspecciónUpt" id="IdCriterioInspecciónUpt" value="{{$anotacion->IdCriterioInspeccion}}">

			<!--Id Auditoria-->
			<input type="hidden" name="IdAuditoriaUpt" id="IdAuditoriaUpt" value="{{$anotacion->IdAuditoria}}">

			<!--Id Proceo-->
			<input type="hidden" name="IdSubProcesoUpt" id="IdSubProcesoUpt" value="{{$anotacion->IdSubProceso}}">

			<!--Rol-->
			<input type="hidden" name="rolUser" id="rolUser" value="{{$rol}}">

			{{-- submit button --}}

			<div class="form-group">
				<div id="messages" style="color:darkred;">
			
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" id="save_info"  style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("anotacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>


		{!! Form::close() !!}

		<script type="text/javascript">
			$(document).ready(function(){
				$('select').select2();

				$('#IdResponsableAprobacion').select2({
					placeholder: "",
					minimumInputLength: 3,
					allowClear: true
				});

				if($("#IdTipoAnotacion").val()==='2'){
					$('#responsableCorreccionRow').hide();

				}
				
				if($("#IdTipoAnotacion").val()!=='1') {
					$("#AnotacionRow").hide();
				}
				

			});

			

			$('#inputFile').on("change", function(e)
			{ 
				$('#archivoVisual').empty();
				for(var i=0; i< this.files.length; i++){
					$('#archivoVisual').append(
						"<a>"+e.target.files[i].name+"</a><br>"
					);
				}
			});

			var rol = $('#rolUser').val();
			if(rol === 'limitador'){
				//Readonly
				$('#IdDependenciaResponsableCorreccion').prop("disabled", true);
				$('#IdCriticidadAnotacion').prop("disabled", true);
				$('#IdDependenciaResponsableMejoramiento').prop("disabled", true);
				$('#IdResponsableAprobacion').prop("disabled", true);
				$('#inputFile').prop("disabled", true);
				$('#AuditoriaAnterior').prop("disabled", true);
				$('#Correccion').prop("disabled", true);
				$('#IdProgramaCalidad').prop("disabled", true);
				$('#Plazo').prop("readonly", true);
				$('#Fecha').prop("readonly", true);
				$('#DescripcionEvidencia').prop("disabled", true);
				$('#IdSubProcesoInspección').prop("disabled", true);
				$('#IdProcesoInspección').prop("disabled", true);
				$('#IdCriterioInspección').prop("disabled", true);
				$('#IdActividadPlanInspeccion').prop("disabled", true);
				$('#IdClaseAnotacion').prop("disabled", true);
				$('#IdFuentesAnotacion').prop("disabled", true);
				$('#IdEnUnaAnotacion').prop("disabled", true);
				$('#NoAnota').prop("disabled", true);
				$('#IdTipoAnotacion').prop("disabled", true);
				$('#IdAuditoria').prop("disabled", true);

			}else if(rol === 'limitador-all'){
				$('select').prop("disabled", true);
				$('input').prop("readonly", true);
				$('#save_info').parent().hide();
			}

			$("form input").on("invalid", function() {
				$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
			});
			$("form input").on("valid", function() {
				$('#messages').html('');
			});

			$( document ).ready(function() {
				var textoSearch = $('option:selected', $('#IdCriterioProceso')).text();
				var idSubProceso = $('#IdSubProcesoUpt').val();

				$.get("../subProcesosAuditoria/" + textoSearch + "", function(response, state){
					
					$('#IdSubProceso').empty();
					$('#IdSubProceso').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						if(response[i].IdCriterio == idSubProceso.toString()){
							$('#IdSubProceso').append('<option value="'+response[i].IdCriterio+'" selected>'+response[i].SubProceso+'</option>');	
						}else{
							$('#IdSubProceso').append('<option value="'+response[i].IdCriterio+'">'+response[i].SubProceso+'</option>');	
						}
					}
					$('#IdSubProceso').trigger('change.select2');
				});
			});

			var idActividadInspección = $('#IdActividadPlanInspeccionUpt').val();
			var idCriterioInsp = $('#IdCriterioInspecciónUpt').val();
			var idAuditoria = $('#IdAuditoriaUpt').val();
			
			/**Obtener las actividades de Inpección según la auditoria seleccionada */
			$.get("../actividadesInspeccion/" + idAuditoria + "", function(response, state){
				for(i=0; i<response.length; i++){
					if(response[i].IdActividadPlanIns == idActividadInspección.toString()){
						$('#IdActividadPlanInspeccion').append('<option value="'+response[i].IdActividadPlanIns+'" selected>'+response[i].Actividades+'</option>');
					}else{
						$('#IdActividadPlanInspeccion').append('<option value="'+response[i].IdActividadPlanIns+'">'+response[i].Actividades+'</option>');
					}
				}

				$('#IdActividadPlanInspeccion').trigger('change.select2');
			});


			//Generar consecutivo Nota
			$('#IdAuditoria').change(function(event) {

				$('#IdActividadPlanInspeccion').val(null).trigger('change');
				$('#IdCriterioInspección').val(null).trigger('change');
				$('#IdProcesoInspección').val(null).trigger('change');
				$('#IdSubProcesoInspección').val(null).trigger('change');
				$('#IdResponsableAprobacion').val(null).trigger('change');
				$('#IdTipoAnotacion').val(null).trigger('change');

				/*Genera consecutivo de Anotacion por auditoria*/
				$.get("../consecutivo/" + event.target.value + "", function(response, state){
					var nexCode = '';
					var  codAuditoria = response[0].Codigo;
					var nextAnotacio =  parseInt(response[0].ContAnotaciones) + 1;

					switch(nextAnotacio.toString().length) {
						case 1:
							nexCode = codAuditoria + '-NA000' + nextAnotacio;
							break;
						case 2:
							nexCode = codAuditoria + '-NA00' + nextAnotacio;
							break;
						case 3:
							nexCode = codAuditoria + '-NA0' + nextAnotacio;
							break;
						case 4:
							nexCode = codAuditoria + '-NA' + nextAnotacio;
							break;
					}
					$('#NoAnota').val(nexCode);
					$('#lblNoAnota').css( "font-size", "12px" );
				});
				/**Obtener las actividades de Inpección según la auditoria seleccionada */
				$.get("../actividadesInspeccion/" + event.target.value + "", function(response, state){
					$('#IdActividadPlanInspeccion').val(null).trigger('change');
					$('#IdActividadPlanInspeccion').empty();
					$('#IdActividadPlanInspeccion').append('<option value="" selected="selected"></option>');
				
					for(i=0; i<response.length; i++){
						$('#IdActividadPlanInspeccion').append('<option value="'+response[i].IdActividadPlanIns+'">'+response[i].Actividades+'</option>');
					}
				});
			});

			//Buscar criterios asociado a la actividad
			$('#IdActividadPlanInspeccion').change(function(event){
				$.get("../CriterioActividad/"+event.target.value + "", function(response,state){
					if(response.length > 0){
						$('#IdCriterioInspección').val(response[0].Norma);
						$('#IdProcesoInspección').val(response[0].Proceso);
						$('#IdSubProcesoInspección').val(response[0].SubProceso);
					}else{
						$('#IdCriterioInspección').val('');
						$('#IdProcesoInspección').val('');
						$('#IdSubProcesoInspección').val('');
					}
				});
			});

			//Tipo 
			$('#IdTipoAnotacion').change(function(event) {
				var tipo = event.target.value;
				var noNota = $('#NoAnota').val();
				if (tipo != '')
				{
					switch(tipo) {
						case '1'://No Conformidad
								cambiarCodigo('NC', noNota);
								$('#responsableCorreccionRow').show();
								$("#AnotacionRow").show();
							break;
						case '2'://Oprtunidades de mejora
								cambiarCodigo('OM', noNota);
								$('#responsableCorreccionRow').hide();
								$("#AnotacionRow").hide();
							break;
						case '3'://Ordenes
								cambiarCodigo('OR', noNota);
								$('#responsableCorreccionRow').hide();
								$("#AnotacionRow").hide();
							break;
						case '5': //Recomendaciones
								cambiarCodigo('RE', noNota);
								$('#responsableCorreccionRow').hide();
								$("#AnotacionRow").hide();
							break;
						case '6': // Requerimiento = RQ
							cambiarCodigo('RQ', noNota);
							$('#responsableCorreccionRow').hide();
							$("#AnotacionRow").hide();
						break;
					}
				}
				else
				{
					$('#lblTipoAnotacion').hide();
				}
			});

			function cambiarCodigo(sigla, noNota) {
				posDash=noNota.lastIndexOf("-")

				if(posDash>=0){
					p1=noNota.substr(0,posDash);
					p2=noNota.substr(posDash+3,noNota.length)
					nuevo = p1 + "-" + sigla + p2

					$('#NoAnota').val(nuevo);
				}
			
				
			}

			//Buscar subprocesos asociados
			$('#IdCriterioProceso').change(function(event) {
				$('#IdSubProceso').val(null).trigger('change');
				var textoSearch = $('option:selected', $(this)).text();

				$.get("../subProcesosAuditoria/" + textoSearch + "", function(response, state){
					
					$('#IdSubProceso').empty();
					$('#IdSubProceso').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#IdSubProceso').append('<option value="'+response[i].IdCriterio+'">'+response[i].SubProceso+'</option>');	
					}
				});
			});

			setTimeout(function(){
				$('.select2-search-choice').remove();
				var resultResponsableCorreccion = eval('{!! $buildResponsableCorreccion !!}');
				$("#IdDependenciaResponsableCorreccion").select2("val", resultResponsableCorreccion);

				var resultResponsableMejoramiento = eval('{!! $buildResponsableMejoramiento !!}');
				$("#IdDependenciaResponsableMejoramiento").select2("val", resultResponsableMejoramiento);

				var resultResponsableHallazgo = eval('{!! $buildResponsableHallazgo !!}');
				$("#IdDependenciaResponsableHallazgo").select2("val", resultResponsableHallazgo);

				var resultResponsableSeguimiento = eval('{!! $buildResponsableSeguimiento !!}');
				$("#IdResponsableSeguimiento").select2("val", resultResponsableSeguimiento);
				
			}, 100);
		</script>

		@endsection()

	@endsection()

@endsection()
