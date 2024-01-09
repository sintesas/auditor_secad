@extends('partials.card')

@extends('layout')

@section('title')
	Crear Seguimiento Cauza Raiz
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'seguimientoCausaRaiz.store', 'files'=>'true')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('crear_seguimientocausaraiz') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
					<div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- Resumen -->
                                <div>
                                    <strong style="font-weight: bold;">Actividad:</strong>&nbsp;&nbsp;&nbsp;{{$actividad[0]->AccionTarea}}
                                </div>
                                <div>
                                    <strong style="font-weight: bold;">Entregable:</strong>&nbsp;&nbsp;&nbsp;{{$actividad[0]->Entregable}}
                                </div>
                                <div>
                                    <strong style="font-weight: bold;">Fecha Inicio:</strong>&nbsp;&nbsp;&nbsp;{{$actividad[0]->FechaInicio}}&nbsp;&nbsp;&nbsp;
                                    <strong style="font-weight: bold;">Fecha Final:</strong>&nbsp;&nbsp;&nbsp;{{$actividad[0]->FechaFinal}}
                                </div>
                                <div>
                                    <strong style="font-weight: bold;">Responsable:</strong>&nbsp;&nbsp;&nbsp;{{$actividad[0]->Name}}
                                </div>
                                <div>
                                    <strong style="font-weight: bold;">Hallazgo:</strong>&nbsp;&nbsp;{{$actividad[0]->DescripcionEvidencia}}
                                </div>
                                <div>
                                    <strong style="font-weight: bold;">Auditoría código:</strong>&nbsp;&nbsp;{{$actividad[0]->codigoAuditoria}}&nbsp;&nbsp;
                                    <strong style="font-weight: bold;">Número de anotación:</strong>&nbsp;&nbsp; {{$actividad[0]->NoAnota}}
                                </div>

                                <!-- Datos a Guardar -->
                                <input type="hidden" name="IdAuditoria" value="{{$actividad[0]->IdAuditoria}}">
                                <input type="hidden" name="Codigo" value="{{$actividad[0]->codigoAuditoria}}">
                                <input type="hidden" name="IdAnotacion" value="{{$actividad[0]->IdAnotacion}}">
                                <input type="hidden" name="IdCausaRaiz" value="{{$actividad[0]->IdCausaRaiz}}">
                                <input type="hidden" name="IdTareaCausa" value="{{$actividad[0]->IdTarea}}">
                                <input type="hidden" name="Auditor" value="{{$actividad[0]->Name}}">
                            </div>
                        </div>
					</div>

                    <!-- Form-->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="AccionSeguimiento" name="AccionSeguimiento" rows="1" required> </textarea>
								<label for="AccionSeguimiento">Acción Seguimiento</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Fortalezas" name="Fortalezas" rows="2" required> </textarea>
								<label for="Fortalezas">Fortalezas *</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Limitaciones" name="Limitaciones" rows="2" required> </textarea>
								<label for="Limitaciones">Limitaciones *</label>
							</div>
						</div>
					</div>

					<br>
					<div class="row" style="border-style: solid;border-width: 1px;">
						<div class="col-sm-6">
							<label for="tipoDoc" >Anexos</label>
							<div class="form-group">
								{!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="archivoVisual">
								<a href=""></a>
							</div>
						</div>
					</div>
					<br>
			</div>

			{{-- submit button --}}
			<br>
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear Seguimiento</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
		</script>
			
		<script type="text/javascript">
            //ARCHIVOS CARGADOS
			$('#inputFile').on("change", function(e)
			{ 
				$('#archivoVisual').empty();
				for(var i=0; i< this.files.length; i++){
					$('#archivoVisual').append(
						"<a>"+e.target.files[i].name+"</a><br>"
					);
				}
			});
		</script>

		<script>
	        Dropzone.options.myDropzone = {
	            autoProcessQueue: false,
	            uploadMultiple: true,
	            maxFilezise: 10,
	            maxFiles: 2,
	            
	            init: function() {
	                var submitBtn = document.querySelector("#submit");
	                myDropzone = this;
	                
	                submitBtn.addEventListener("click", function(e){
	                    e.preventDefault();
	                    e.stopPropagation();
	                    myDropzone.processQueue();
	                });
	                this.on("addedfile", function(file) {
	                    alert("file uploaded");
	                });
	                
	                this.on("complete", function(file) {
	                    myDropzone.removeFile(file);
	                });
	 
	                this.on("success", 
	                    myDropzone.processQueue.bind(myDropzone)
	                );
	            }
	        };
	    </script>
		@endsection()

	@endsection()

@endsection()