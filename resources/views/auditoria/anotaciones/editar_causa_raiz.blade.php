@extends('partials.card_big')

@extends('layout')

@section('title')
	Editar Causa Raiz
@endsection()

	@section('content')

		@section('card-content')

			@section('form-tag')
				{!! Form::model($causaRaiz, ['route' => ['causaRaiz.update', $causaRaiz->IdCausaRaiz], 'method' => 'PUT']) !!}

				{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_causa_raiz', $causaRaiz->IdAnotacion)}}
		@endsection()

		@section('card-content')

		    <div class="total-card ">

                        <div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="CausaRaiz" name="CausaRaiz" required value="{{$causaRaiz->CausaRaiz}}">
									<label for="CausaRaiz">Causa raiz *</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<input type="text" class="form-control" id="Efecto" name="Efecto" value="{{$causaRaiz->Efecto}}">
									<label for="Efecto">Efecto</label>
								</div>
							</div>
						</div>
						<div class="row">

							<input type="hidden" id="IdAnotacion" name="IdAnotacion" value="{{$causaRaiz->IdAnotacion}}">

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('Id5M', $record5m->prepend('none')->pluck('Metodo', 'Id5M'), null, ['class' => 'form-control', 'id' => 'cId5M']) }}
									<label for="Id5M">Causa 5M</label>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('IdAspecto5M', $aspectos5m->prepend('none')->pluck('Aspecto', 'IdAspecto5M'), null, ['class' => 'form-control', 'id' => 'cIdAspecto5M']) }}
									<label for="IdAspecto5M">Aspecto 5M</label>
								</div>	
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<input type="number" class="form-control" id="Priorizacion" name="Priorizacion" required value="{{$causaRaiz->Priorizacion}}">
									<label for="Priorizacion">Priorizacion</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{ Form::select('IdFalencia', $falaneciasCausaRaiz->pluck('NombreFalencia', 'IdFalencia'), null, ['class' => 'form-control', 'id' => 'IdFalencia', 'required']) }}
									<label for="IdFalencia">Falencia en *</label>
								</div>
							</div>

							<div class="col-sm-4 invisible">
								<div class="form-group">
									{{ Form::select('IdPrograma', $programasCausaRaiz->pluck('NombrePrograma', 'IdPrograma'), null, ['class' => 'form-control', 'id' => 'IdPrograma']) }}
									<label for="IdPrograma">Programa *</label>
								</div>
							</div>


							<div class="col-sm-4 invisible">
								<div class="form-group">
									{{ Form::select('IdProceso', $procesosCriterios->pluck('Proceso', 'IdCriterio'), null, ['class' => 'form-control', 'id' => 'IdProceso']) }}
									<label for="IdProceso">Proceso *</label>
								</div>
							</div>
						<div>
						<div class="row">
							<div class="col-sm-12">
								<!--<button type="button" style="margin:10px" class="btn btn-primary" id="addFields">Adicionar Actividad</button>-->
							</div>
						</div>

						<div class="row">
							<div class="table-responsive" style="margin:20px">
								<table id="datatable1" class="table table-striped table-hover table-responsive">
									<thead>
										<tr>
											<th style="width: 300px;"><b>Acción Tarea</b></th>
											<th><b>Entregable</b></th>
											<th style="width: 80px;"><b>Cantidad Entregable</b></th>
											<th style="width: 110px;"><b>Fecha Inicio</b></th>
											<th style="width: 110px;"><b>Fecha Final</b></th>
											<th style="width: 300px;"><b>Responsable</b></th>
										</tr>
									</thead>

									<tbody class="input_fields_wrap">
										
									</tbody>
								</table>
							</div>
						</div>

					</div> 
				</div>
			{{-- submit button --}}

            <div class="form-group">
				<div id="messages" style="color:darkred;">
			
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" data-href="{{URL::to('causaRaiz')}}" class="link-button btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>


		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();

            $(".link-button").click(function () {
                window.location.href = $(this).data('href')+'/'+$("#IdAnotacion").val();
            });

            var wrapper = $(".input_fields_wrap"); //Fields wrapper

            var resultCausas = eval('{!! $resultCausas !!}');
            var resultFechaInicio = eval('{!! $resultFechaInicio !!}');
            var resultFechaFinal = eval('{!! $resultFechaFinal !!}');
            var resultIdResponsable = eval('{!! $resultIdResponsable !!}');
            var resultEntregable = eval('{!! $resultEntregable !!}');
            var resultCantidadEntregable = eval('{!! $resultCantidadEntregable !!}');

            var cont = 0;

            for ( var i = 0, l = resultCausas.length; i < l; i++ ) {
                //console.log(resultCausas[ i ].AccionTarea);
                $(wrapper).append(
                    '<tr>'
                        +'<td><input type="text" class="form-control" name="AccionTarea[]" value="'+resultCausas[ i ].AccionTarea+'" required></td>'
						+'<td><input type="text" class="form-control" name="Entregable[]" required value="'+resultEntregable[ i ].Entregable+'"></td>'
						+'<td><input type="number" class="form-control" name="CantidadEntregable[]" required value="'+resultCantidadEntregable[ i ].CantidadEntregable+'"></td>'
                        +'<td>'
                        +	'<div class="input-group date" id="demo-date-format">'
                        +		'<div class="input-group-content">'
                        +			'<input type="text" class="form-control"  name="FechaInicio[]" value="'+resultFechaInicio[ i ].FechaInicio+'" required>'
                        +		'</div>'
                        +		'<span class="input-group-addon"></span>'
                        +	'</div>'
                        +'</td>'
                        +'<td>'
                        +	'<div class="input-group date" id="demo-date-format">'
                        +		'<div class="input-group-content">'
                        +			'<input type="text" class="form-control" name="FechaFinal[]" value="'+resultFechaFinal[ i ].FechaFinal+'" required>'
                        +		'</div>'
                        +		'<span class="input-group-addon"></span>'
                        +	'</div>'
                        +'</td>'
                        +'<td><select class="form-control" id="IdUserResponsable'+i+'" name="IdUserResponsable[]" required></select></td>'
                    +'</tr>'
                );

                $('#IdUserResponsable'+i).empty();
				$('#IdUserResponsable'+i).append('<option value="" selected="selected"></option>');
                cont++;
            }

            $.get("/auditoria/funcionariosLDAP/" + i+ "", function(response, state){
                for(var d=0; d<cont; d++){
                    console.log(response);
                    for(var im=0; im<response.length; im++){
                        if(response[im].IdUserLDAP == resultIdResponsable[d].IdResponsable.toString()){
                            $('#IdUserResponsable'+d).append('<option value="' + response[im].IdUserLDAP + '" selected>' +  response[im].Name + '</option>');
                        }else{
                            $('#IdUserResponsable'+d).append('<option value="' + response[im].IdUserLDAP + '">' +  response[im].Name + '</option>');
                        }
                    }
                    $('#IdUserResponsable'+d).trigger('change.select2');
                } 
            });
            
			$('select').select2();
		</script>

		@endsection()

	@endsection()

@endsection()
