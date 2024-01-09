@extends('partials.card')

@extends('layout')

@section('title')
Crear nueva Anotacion
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'anotacion.store', 'files' =>true)) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{Breadcrumbs::render('crear_anotacion')}}
@endsection()

@section('card-content')

<div class="card-body floating-label">
	<p>Los campos marcados con * son obligatorios.</p>

	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				{{ Form::select('IdAuditoria', $auditorias->prepend('none')->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'id' => 'IdAuditoria','required'=>'required']) }}
				<label for="Auditoria">Auditoria *</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::select('IdTipoAnotacion', $tiposAnotacion->pluck('Anotacion', 'IdTipoAnotacion'), null, ['class' => 'form-control', 'id' => 'IdTipoAnotacion','required'=>'required']) }}
				<label for="Anotacion">Tipo*</label>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<input type="text" class="form-control" id="NoAnota" name="NoAnota" required readonly>
				<label id="lblNoAnota" for="NoAnota">No Anotación</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">

		</div>
		<div class="col-sm-3">

		</div>
		<div class="col-sm-6">

		<label id="lblTipoAnotacion" for="NoAnota" style="display: none;">Prueba</label>

		</div>
	</div>
	<div class="row" id="AnotacionRow">
		<div class="col-sm-4">
			<div class="form-group">
				<select id="IdEnUnaAnotacion" name="IdEnUnaAnotacion" class="form-control">
					<option value="0">&nbsp;</option>
					<option value="1">Nueva</option>
					<option value="2">Repetida</option>
					<option value="3">Adicionada</option>
				</select>
				<label for="IdEnUnaAnotacion">Es una anotacion: *</label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha" >
						<label for="Fecha">Fecha *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				{{ Form::select('IdFuentesAnotacion', $fuentesAnotacion->pluck('Fuente', 'IdFuentesAnotacion'), null, ['class' => 'form-control', 'id' => 'IdFuentesAnotacion']) }}
				<label for="Fuente">Fuente</label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				{{ Form::select('IdClaseAnotacion', $clasesAnotaciones->pluck('Nombre', 'IdClaseAnotacion'), null, ['class' => 'form-control', 'id' => 'IdClaseAnotacion']) }}
				<label for="Clase">Clase connotación</label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<select name="IdActividadPlanInspeccion" id="IdActividadPlanInspeccion" class="form-control"></select>
				<label for="IdActividadPlanInspeccion">Actividad plan inspección *</label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="IdCriterioInspección"  value="" readonly>
				<label for="IdCriterioInspección">Criterio plan de inspección </label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="IdProcesoInspección"  value="" readonly>
				<label for="IdProcespInspección">Proceso plan de inspección </label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="IdSubProcesoInspección"  value="" readonly>
				<label for="IdSubProcesoInspección">Sub-Proceso plan de inspección </label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<textarea class="form-control" id="DescripcionEvidencia" name="DescripcionEvidencia" rows="2" required> </textarea>
				<label for="DescripcionEvidencia">Descripcion y evidencia*</label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Plazo" name="Plazo">
						<label for="Plazo">Plazo</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::select('IdProgramaCalidad', $programasCalidad->pluck('ProgramaCalidad', 'IdProgramaCalidad'), null, ['class' => 'form-control', 'id' => 'IdProgramaCalidad']) }}
				<label for="IdProgramaCalidad">Programa calidad afectado</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<textarea class="form-control" id="Correccion" name="Correccion" rows="2"> </textarea>
				<label for="Correccion">Correccion Inmediata</label>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-sm-2">
			<div class="form-group">
				{{ Form::select('IdCriticidadAnotacion', $criticidadesAnotacion->pluck('CriticidadAnotacion', 'IdCriticidadAnotacion'), null, ['class' => 'form-control', 'id' => 'IdCriticidadAnotacion','required'=>'required']) }}
				<label for="Fuente">Criticidad *</label>
			</div>
		</div>

		<div class="col-sm-10">
			<div class="form-group">
				<input type="text" class="form-control" id="AuditoriaAnterior" name="AuditoriaAnterior" required>
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
				<a href="" ></a>
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

	{{--<div class="row">
		<div class="col-sm-12">
			<label for="IdDependenciaResponsableHallazgo" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsables del hallazgo *</label>
			<div class="form-group" >
				{{ Form::select('IdUserLDAP', $personalLDAP, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableHallazgo', 'name' => 'IdDependenciaResponsableHallazgo[]', 'required']) }}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<label for="IdUserLDAP" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsables del seguimineto *</label>
			<div class="form-group" >
				{{ Form::select('IdUserLDAP', $personalLDAP, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control',  'name' => 'IdResponsableSeguimiento[]', 'required']) }}
			</div>
		</div>
	</div>--}}

	<div class="row">
		<div class="col-sm-12">
			<label for="IdResponsableAprobacion" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable de la aprobación *</label>
			<div class="form-group" >
				{{ Form::select('IdUserLDAP', $personalLDAP, null, ['onchange' => "", 'class' => 'form-control',  'name' => 'IdResponsableAprobacion', 'id' => 'IdResponsableAprobacion', 'required']) }}
			</div>
		</div>
	</div>

	<input type="hidden" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">
	<br>
	<br>

	{{-- submit button --}}

	<div class="form-group">
		<div id="messages" style="color:darkred;">

		</div>
		<div class="row">
			<div class="col-sm-6">
				<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
			</div>
			<div class="col-sm-6">
				<button type="button" onclick="window.location='{{ route("anotacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}


<script src="{{URL::asset('js/soloNumeros.js')}}"></script>

<script>
	$(document).ready(function(){
		$('select').select2();

		$('#IdResponsableAprobacion').select2({
			placeholder: "",
			minimumInputLength: 3,
			allowClear: true
		});
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

	//Generar consecutivo Nota
	$('#IdAuditoria').change(function(event) {

		$('#IdActividadPlanInspeccion').val(null).trigger('change');
		$('#IdCriterioInspección').val(null).trigger('change');
		$('#IdProcesoInspección').val(null).trigger('change');
		$('#IdSubProcesoInspección').val(null).trigger('change');
		$('#IdTipoAnotacion').val(null).trigger('change');

		/*Genera consecutivo de Anotacion por auditoria*/
		$.get("consecutivo/" + event.target.value + "", function(response, state){
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
		$.get("actividadesInspeccion/" + event.target.value + "", function(response, state){
			$('#IdActividadPlanInspeccion').empty();
			$('#IdActividadPlanInspeccion').append('<option value="" selected="selected"></option>');

			for(i=0; i<response.length; i++){
				$('#IdActividadPlanInspeccion').append('<option value="'+response[i].IdActividadPlanIns+'">'+response[i].Actividades+'</option>');
			}
		});
	});

	//Buscar criterios asociado a la actividad
	$('#IdActividadPlanInspeccion').change(function(event){
		$.get("CriterioActividad/"+event.target.value + "", function(response,state){
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

	//Mensajes de errores
	$("form input").on("invalid", function() {
		$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
	});
	$("form input").on("valid", function() {
		$('#messages').html('');
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

		$.get("subProcesosAuditoria/" + textoSearch + "", function(response, state){

			$('#IdSubProceso').empty();
			$('#IdSubProceso').append('<option value="" selected="selected"></option>');

			for(i=0; i<response.length; i++){
				$('#IdSubProceso').append('<option value="'+response[i].IdCriterio+'">'+response[i].SubProceso+'</option>');
			}
		});
	});



</script>

@endsection()

@endsection()

@endsection()
