@extends('partials.card')

@extends('layout')

@section('title')
	Editar Riesgo
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => ['riesgoprograma.update', $riesgo->idRiesgoPrograma], 'method' => 'PUT', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')

		@endsection()

		@section('card-content')
		<style media="screen">
			textarea{
				border: solid 1px #2a2a2a2a !important;
			}
		</style>
		<input type="hidden" name="programa" value="{{$programa->IdPrograma}}">



			 <div class="card-body floating-label">
				 <div class="card">

                     <div class="card-head card-head-sm style-primary">
                         <header style="font-size: 2rem">
													 Editar Información Riesgo
                         </header>
                     </div><!--end .card-head -->
                     <div class="card-body">
 											<div class="tab-content" id="myTabContent">
 											  <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
													<div class="col-lg-6">
														<table class="table table-striped table-hover">
															<thead>
																<tr>
																	<th><b>CODIGO</b></th>
																	<th><b>PRODUCTO AERONAUTICO</b></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>{{$programa->Consecutivo}}</td>
																	<td>{{$programa->NombreProducto}}</td>
																</tr>
															</tbody>
														</table>
													</div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input class="form-control" type="date" name="fecha" id="fecha" required value="{{$riesgo->fecha}}">
                              <label for="fecha">Fecha</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <select class="form-control" name="empresa" id="empresa" required>
                                <option value="">Seleccionar</option>
                                @foreach($empresas as $empresa)
                                <option value="{{$empresa->IdEmpresa}}" @if($riesgo->idEmpresa == $empresa->IdEmpresa) selected @endif>{{$empresa->NombreEmpresa}}</option>
                                @endforeach
                              </select>
                              <label for="empresa">Empresa</label>
                            </div>
                          </div>
													<div class="col-sm-6">
                            <div class="form-group">
                              <select class="form-control" name="Tipo_originador" id="Tipo_originador" required>
                                <option value="">Seleccionar</option>
                              	<option value="Organización de diseño" @if($riesgo->Tipo_originador == 'Organización de diseño') selected @endif>Organización de diseño</option>
																<option value="Organización de producción" @if($riesgo->Tipo_originador == 'Organización de producción') selected @endif>Organización de producción</option>
																<option value="Organización de operación" @if($riesgo->Tipo_originador == 'Organización de operación') selected @endif>Organización de operación</option>
																<option value="Organización de mantenimiento" @if($riesgo->Tipo_originador == 'Organización de mantenimiento') selected @endif>Organización de mantenimiento</option>
																<option value="Titular responsable" @if($riesgo->Tipo_originador == 'Titular responsable') selected @endif>Titular responsable</option>
                              </select>
                              <label for="Tipo_originador">Tipo originador</label>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div class="form-group">
                              <input class="form-control" type="text" name="NombreReg" id="NombreReg" required value="{{$riesgo->NombreReg}}">
                              <label for="NombreReg">Nombre de quien registra</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <input class="form-control" type="text" name="GradoReg" id="GradoReg" required value="{{$riesgo->GradoReg}}">
                              <label for="GradoReg">Grado</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <input class="form-control" type="text" name="Num_parte" id="Num_parte" required value="{{$riesgo->Num_parte}}">
                              <label for="Num_parte">Número de Parte (P/N)</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <input class="form-control" type="text" name="Num_serie" id="Num_serie" required value="{{$riesgo->Num_serie}}">
                              <label for="Num_serie">Número de Serie (S/N)</label>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <select class="form-control" name="Tipo_falla" id="Tipo_falla" required>
                                <option value="">Seleccionar</option>
                                <option value="FALLA" @if('FALLA' == $riesgo->Tipo_falla) selected @endif>FALLA</option>
                                <option value="MAL FUNCIONAMIENTO" @if('MAL FUNCIONAMIENTO' == $riesgo->Tipo_falla) selected @endif>MAL FUNCIONAMIENTO</option>
                                <option value="DEFECTO" @if('DEFECTO' == $riesgo->Tipo_falla) selected @endif>DEFECTO</option>
                              </select>
                              <label for="Tipo_falla">Tipo de Riesgo</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Descripcion_falla" name="Descripcion_falla" rows="4">{{$riesgo->Descripcion_falla}}</textarea>
                              <label for="Descripcion_falla">Descripcón general de la falla, mal funcionamiento o defecto del producto aeronaútico</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Descripcion_danos" name="Descripcion_danos" rows="4">{{$riesgo->Descripcion_danos}}</textarea>
                              <label for="Descripcion_danos">Descripción general de daños en la aeronave, motor, helice, sart (Producto Aeronaútico Clase I)</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Danos_tripulantes" name="Danos_tripulantes" rows="4">{{$riesgo->Danos_tripulantes}}</textarea>
                              <label for="Danos_tripulantes">Daños a Tripulantes y/o pasajeros</label>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Danos_terceros" name="Danos_terceros" rows="4">{{$riesgo->Danos_terceros}}</textarea>
                              <label for="Danos_terceros">Daños ocasionados a terceros</label>
                            </div>
                          </div>
													<div class="col-sm-12">
                            <div class="form-group">
                              <select class="form-control" name="Clase_averia" id="Clase_averia">
                              	<option value="">Seleccionar</option>
																<option value="Clase 1-A" @if('Clase 1-A' == $riesgo->Clase_averia) selected @endif>Clase 1-A</option>
																<option value="Clase 1-B" @if('Clase 1-B' == $riesgo->Clase_averia) selected @endif>Clase 1-B</option>
																<option value="Clase 1-C" @if('Clase 1-C' == $riesgo->Clase_averia) selected @endif>Clase 1-C</option>
																<option value="Clase 1-D" @if('Clase 1-D' == $riesgo->Clase_averia) selected @endif>Clase 1-D</option>
																<option value="Clase 2-A" @if('Clase 2-A' == $riesgo->Clase_averia) selected @endif>Clase 2-A</option>
                              </select>
                              <label for="Clase_averia">Clasificación de la avería, fallos de funcionamiento y defectos Aeronáuticos</label>
															<button type="button" class="btn btn-primary" onclick="$('.clases').toggle();">Ver descripcion de clasificaciones</button>
															<div class="clases" style="display: none;">
																<img src="/vistas/Clase.jpg" style="width:100%;">
															</div>
                            </div>
                          </div>
													<div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Accion" name="Accion" rows="4">{{$riesgo->Accion}}</textarea>
                              <label for="Accion">Acción inmediata propuesta</label>
                            </div>
                          </div>
													<div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Investigacion_llevada" name="Investigacion_llevada" rows="4">{{$riesgo->Investigacion_llevada}}</textarea>
                              <label for="Investigacion_llevada">Investigacion llevada a cabo</label>
                            </div>
                          </div>
													<div class="col-sm-12">
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Investigacion_propuesta" name="Investigacion_propuesta" rows="4">{{$riesgo->Investigacion_propuesta}}</textarea>
                              <label for="Investigacion_propuesta">Investigaciones propuesta</label>
                            </div>
                          </div>
													<div class="col-sm-12">
														<h2>Documentación Anexa</h2>
                            <div class="form-group">
                              <textarea type="text" class="form-control" id="Anexo_texto" name="Anexo_texto" rows="2">{{$riesgo->Anexo_texto}}</textarea>
                              <label for="Anexo_texto">Descripción anexo</label>
                            </div>
                          </div>
													<div class="col-sm-6">
														<div class="form-group">
															<input type="date" class="form-control" id="Anexo_fecha" name="Anexo_fecha" value="{{$riesgo->Anexo_fecha}}">
															<label for="Anexo_fecha">Fecha</label>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<h4>Archivos</h4>
															<input type="file" class="form-control" id="Anexo_archivos" name="Anexo_archivos[]" multiple>

														</div>
													</div>
													<div class="col-sm-12">
														<ul id="list_archivos">
															@if($riesgo->Anexo_archivos != '' && $riesgo->Anexo_archivos != null)
															@foreach(json_decode($riesgo->Anexo_archivos) as $anexo)
															<li><a target="_blank" href="/secad/Riesgos/Riesgo_{{$programa->Consecutivo}}-{{$riesgo->idRiesgoPrograma}}/{{$anexo}}">{{$anexo}}</a></li>
															@endforeach
															@else
															<li>Aún no hay anexos</li>
															@endif
														</ul>
													</div>
                        </div>
 											</div>
									</div>
               </div>
           </div>
      </div>

			{{-- submit button --}}

			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("riesgoprograma.edit", $programa->IdPrograma) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		{{-- SCRIPTS --}}

      <script type="text/javascript">

//PREVIEW ARCHIVOS ANEXOS
					function prvArchivos(input) {
              if (input.files) {
								$('#list_archivos li').remove();
									$.each(input.files, function(index, value) {
										var reader = new FileReader();

										reader.onload = function (e) {
											var html = '<li>'+input.files[index].name+'</li>';
											$('#list_archivos').append(html);
										}
										reader.readAsDataURL(input.files[index]);
									})

              }
          }

          $("#Anexo_archivos").change(function () {
              prvArchivos(this);
          });


            $('select').select2();
        </script>


		@endsection()

	@endsection()

@endsection()
