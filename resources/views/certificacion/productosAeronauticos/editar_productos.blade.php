@extends('partials.card')

@extends('layout')

@section('title')
	Editar Producto
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($producto, ['route' => ['productos.update', $producto->IdDemandaPotencial], 'method' => 'PUT', 'files' => true ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_productos')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">

				<div class="card">

                    <div class="card-head card-head-sm style-primary">
                        <header>

													<ul class="nav nav-tabs style-primary" id="myTab" role="tablist">
													  <li class="nav-item active" role="presentation">
													    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
																Información Producto Aeronautico
															</a>
													  </li>
													  <li class="nav-item" role="presentation">
													    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
																Detalles del Producto Aeronautico PCA
															</a>
													  </li>
													</ul>

                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
											<div class="tab-content" id="myTabContent">
											  <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

													<div class="row">
														<div class="col-sm-7">
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{old('Nombre', $producto->Nombre)}}">
																		<label for="Nombre">Nombre Producto</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="ParteNumero" name="ParteNumero" required value="{{old('ParteNumero', $producto->ParteNumero)}}">
																		<label for="ParteNumero">P/N</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		{{ Form::select('IdAeronave', $aeronaves->pluck('Equipo', 'IdAeronave'), null, ['class' => 'form-control', 'id' => 'IdAeronave']) }}
																		<label for="IdAeronave">Equipo </label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		{{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'id' => 'IdUnidad']) }}
																		<label for="IdUnidad">Unidad</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="PublicacionTecnica" name="PublicacionTecnica" required value="{{old('PublicacionTecnica', $producto->PublicacionTecnica)}}">
																		<label for="PublicacionTecnica"> Publicación Técnica</label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		{{ Form::select('IdATA', $atas->pluck('ATA', 'IdATA'), null, ['class' => 'form-control', 'id' => 'IdATA']) }}
																		<label for="IdATA"> ATA </label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-5">
															<div class="row">
																<div class="col-sm-12">
																	<div class="foto-producto">
																		<img id="image_upload_preview" src="{{URL::asset('secad/Productos/' . $producto->Nombre.'-'.$producto->ParteNumero.'/'.$producto->Imgen)}}" alt="profile Pic">
																	</div>
																</div>
																<div class="col-sm-12">
																	<div class="form-group">
																		<label for="foto">Imagen</label>
																		{!! Form::file('foto', array('class' => 'form-control', 'id' => 'inputFile', '')) !!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="NSN" name="NSN" required value="{{old('NSN', $producto->NSN)}}">
																		<label for="NSN">NSN </label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="CodigoSAP" name="CodigoSAP" required value="{{old('CodigoSAP', $producto->CodigoSAP)}}">
																		<label for="CodigoSAP">SAP</label>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-sm-7">
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		{{ Form::select('Identificacion', [
																		'' => '',
																		'Parte Individual' => 'Parte Individual',
																		'Conjunto / Ensamble' => 'Conjunto / Ensamble'
																		], null, ['class' => 'form-control', 'id' => 'Identificacion'])}}
																		<label for="Identificacion"> Identificación </label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<textarea class="form-control" id="Funcionamiento" name="Funcionamiento" rows="3">{{old('Funcionamiento', $producto->Funcionamiento)}}</textarea>
																		<label for="Funcionamiento"> Funcionamiento </label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="text" class="form-control" id="Fabricante" name="Fabricante" required value="{{old('Fabricante', $producto->Fabricante)}}">
																		<label for="Fabricante"> Fabricante </label>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<input type="number" class="form-control" id="PrecioCompra" name="PrecioCompra" value="{{old('PrecioCompra', $producto->PrecioCompra)}}">
																		<label for="PrecioCompra"> Precio de Compra</label>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-5">
															<div class="row">
																<div class="col-sm-12">
																	@if($producto->DocTecnica != null)
																	<div class="foto-producto">
																		<a href="{{URL::asset('secad/Productos/' . $producto->Nombre.'-'.$producto->ParteNumero.'/'.$producto->DocTecnica)}}" target="_blank"><img id="image_upload_preview" src="{{URL::asset('/img/doc.png')}}" alt="profile Pic" ></a>
																	</div>
																	@endif
																	<p><strong>Archivo Actual:</strong> {{ $producto->DocTecnica }}</p>

																</div>
															</div>
															<div class="row">
																<div class="col-sm-12">
																	<div class="form-group">
																		<label for="foto">Documentación Tecnica</label>
																		{!! Form::file('doc', array('class' => 'form-control', 'id' => 'inputFile', '')) !!}
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group">
																<textarea class="form-control" id="Observaciones" name="Observaciones">{{old('Observaciones', $producto->Observaciones)}}</textarea>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-sm-7">
															<div class="form-group">
																{{ Form::select('Anio', [
																'' => '',
																'2012' => '2012',
																'2013' => '2013',
																'2014' => '2014',
																'2015' => '2015',
																'2016' => '2016',
																'2017' => '2017',
																'2018' => '2018',
																'2019' => '2019',
																'2020' => '2020',
																'2021' => '2021'
																], null, ['class' => 'form-control', 'id' => 'Anio'])}}
																<label for="Anio"> Año </label>
															</div>
														</div>
														<div class="col-sm-3">
															<div class="form-group">
																<input type="number" class="form-control" id="TiempoEntrega" name="TiempoEntrega" onKeyPress="return soloNumeros(event)" value="{{old('TiempoEntrega', $producto->TiempoEntrega)}}">
																<label for="TiempoEntrega"> Tiempo de Entrega </label>
															</div>
														</div>
														<div class="col-sm-2">
															<div class="form-group">
																{{ Form::select('PeriodoTiempoEntrega', [
																'' => '',
																'Hora(s)' => 'Hora(s)',
																'Dia(s)' => 'Dia(s)',
																'Semana(s)' => 'Semana(s)',
																'Mese(s)' => 'Mese(s)'
																], null, ['class' => 'form-control', 'id' => 'PeriodoTiempoEntrega'])}}
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-sm-7">
															<div class="form-group">
																{{ Form::select('Clase', [
																'' => '',
																'Clase I' => 'Clase I',
																'Clase II' => 'Clase II',
																'Clase III' => 'Clase III'
																], null, ['class' => 'form-control', 'id' => 'Clase'])}}
																<label for="Clase">Clase</label>
															</div>
														</div>
													</div>

												</div>
											  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
													<div class="row">
														<div class="col-sm-12">
															<h2>DESCRIPCIÓN GENERAL</h2>
															<hr>
															<br>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="CantidadRequerida" name="CantidadRequerida" value="{{old('CantidadRequerida', $detalPCA->cant_requeridad)}}">
																<label for="CantidadRequerida"> Cantidad Requerida </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="PrioridadUMA" name="PrioridadUMA" value="{{old('PrioridadUMA', $detalPCA->prio_UMA)}}">
																<label for="PrioridadUMA"> Prioridad UMA </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="ValoracionTecnica" name="ValoracionTecnica" value="{{old('ValoracionTecnica', $detalPCA->val_tecnica)}}">
																<label for="ValoracionTecnica"> Valoración Técnica </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="FactibilidadTecnica" name="FactibilidadTecnica" value="{{old('FactibilidadTecnica', $detalPCA->fact_tecnica)}}">
																<label for="FactibilidadTecnica"> Factibilidad Técnica </label>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<textarea type="text" class="form-control" id="PublicacionesTecnicasAplicables" name="PublicacionesTecnicasAplicables" value="" rows="4">{{old('PublicacionesTecnicasAplicables', $detalPCA->publi_tec_apl)}}</textarea>
																<label for="PublicacionesTecnicasAplicables"> Publicaciones Técnicas Aplicables </label>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<textarea type="text" class="form-control" id="DescripcionFallaTipica" name="DescripcionFallaTipica" value="" rows="4">{{old('DescripcionFallaTipica', $detalPCA->Desc_fail_tec)}}</textarea>
																<label for="DescripcionFallaTipica"> Descripción de la Falla Típica </label>
															</div>
														</div>


														<div class="col-sm-12">
															<br>
															<h2>VIABILIDAD PARA DESARROLLO</h2>
															<hr>
															<br>
														</div>

														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="Rotacion" name="Rotacion" value="{{old('Rotacion', $detalPCA->rotacion)}}">
																<label for="Rotacion"> Rotación </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="MTBF" name="MTBF" value="{{old('MTBF', $detalPCA->mtbf)}}">
																<label for="MTBF"> MTBF </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="TiempoAprovisionamiento" name="TiempoAprovisionamiento" value="{{old('TiempoAprovisionamiento', $detalPCA->Tp_aprovmto)}}">
																<label for="TiempoAprovisionamiento"> Tiempo Aprovisionamiento </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="ExistenciasAlmacen" name="ExistenciasAlmacen" value="{{old('ExistenciasAlmacen', $detalPCA->Exist_alm)}}">
																<label for="ExistenciasAlmacen"> Existencias Almacen </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="ProvisionFabricanteOriginal" name="ProvisionFabricanteOriginal" value="{{old('ProvisionFabricanteOriginal', $detalPCA->prov_fab_orig)}}">
																<label for="ProvisionFabricanteOriginal"> Provisión Fabricante Original </label>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input type="text" class="form-control" id="FlotaAntigua" name="FlotaAntigua" value="{{old('FlotaAntigua', $detalPCA->Flot_ant)}}">
																<label for="FlotaAntigua"> Flota Antigua </label>
															</div>
														</div>

														<div class="col-sm-12">
															<br>
															<h2>CARACTERIZACIÓN DIMENSIONAL Y FUNCIONAL</h2>
															<hr>
															<br>
														</div>

														<div class="col-sm-12">
															<div class="form-group">
																<textarea type="text" class="form-control border" id="CaracterizacionDimensionalFuncional" name="CaracterizacionDimensionalFuncional" rows="5">{{old('CaracterizacionDimensionalFuncional', $detalPCA->caract_dim_fun)}}</textarea>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-6">
																	<div class="row">
																		<div class="col-sm-12">
																			<br>
																			<h2>DIAGRAMA ELÉCTRICO </h2>
																			<hr>
																			<br>
																		</div>
																		<div class="col-sm-12">
																			<img class="img_prod_catalog" id="previewDiagramaElectrico" src="{{URL::asset('secad/Productos/Diagrama_Electrico_' . $producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$detalPCA->diag_elect)}}" alt="">
																			<div class="form-group">
																				<label for="foto">Imagen</label>
																				{!! Form::file('foto', array('class' => 'form-control', 'name' => 'DiagramaElectrico',  'id' => 'DiagramaElectrico')) !!}
																			</div>
																		</div>

																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="row">
																		<div class="col-sm-12">
																			<br>
																			<h2>DIAGRAMA ELECTRÓNICO </h2>
																			<hr>
																			<br>
																		</div>
																		<div class="col-sm-12">
																			<img class="img_prod_catalog" id="previewDiagramaElectronico" src="{{URL::asset('secad/Productos/Diagrama_Electronico_' . $producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$detalPCA->diag_electronico)}}" alt="">
																			<div class="form-group">
																				<label for="foto">Imagen</label>
																				{!! Form::file('foto', array('class' => 'form-control', 'name' => 'DiagramaElectronico',  'id' => 'DiagramaElectronico')) !!}
																			</div>
																		</div>

																	</div>
																</div>

															</div>
														</div>


														<div class="col-sm-12">
															<br>
															<h2>ESPECIFICACIONES</h2>
															<hr>
															<br>
														</div>

														<div class="col-sm-12">
															<div class="form-group">
																<textarea type="text" class="form-control border" id="Especificaciones" name="Especificaciones" rows="5">{{old('Especificaciones', $detalPCA->especificaciones)}}</textarea>
															</div>
														</div>

														<div class="col-sm-12">
															<br>
															<h2>CATALOGO ILUSTRADO DE PARTES</h2>
															<hr>
															<br>
														</div>

														<div class="col-sm-12">

														<div class="form-group">
															<label for="foto">Imagen</label>
															<div class="form-group">
																<input type="file" id="CatalogoImagenes" name="CatalogoImagenes[]"  class="form-control" multiple>
															</div>

														</div>
													</div>
														<div class="col-sm-12">
															<h2>Imagenes catálogo</h2>
															<div class="row" id="previewCatalogo">
																@if($catalogoilustrado != '')
																	@foreach ($catalogoilustrado as $imagen)
																	<div class="col-sm-4">
																		<img class="img_prod_catalog" src="{{URL::asset('secad/Productos/Catalogo_ilustrado_' . $producto->Nombre.'-'.$producto->ParteNumero.'-'.$producto->IdDemandaPotencial.'/'.$imagen)}}" alt="">
																	</div>
																	@endforeach
																@endif
															</div>

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
							<a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#basicModal">Actualizar</a>
							<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("productos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade mdl_notas" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Nota de Actualización</h4>
			      </div>
			      <div class="modal-body">
			        <div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea type="text" class="form-control border" id="Nota" name="Nota" rows="5" required></textarea>
									</div>
								</div>
			        </div>
							<!-- <button type="submit" style="" class="btn btn-info btn-block">Actualizar</button> -->
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn btn-info btn-block">Confirmar</button>
			      </div>
			    </div>
			  </div>
			</div>

		{!! Form::close() !!}

		{{-- SCRIPTS --}}

        {{-- Solo Numeros --}}
        <script src="{{URL::asset('js/soloNumeros.js')}}"></script>

        <script type="text/javascript">
            // Previw Img
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image_upload_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#inputFile").change(function () {
                readURL(this);
            });

//PREVIEW DIAGRAMA ELECTRICO
						function prvElectrico(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#previewDiagramaElectrico').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#DiagramaElectrico").change(function () {
                prvElectrico(this);
            });
//PREVIEW DIAGRAMA ELECTRONICO
						function prvElectronico(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#previewDiagramaElectronico').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#DiagramaElectronico").change(function () {
                prvElectronico(this);
            });

//PREVIEW DIAGRAMA CATALOGO
					function prvCatalogo(input) {
              if (input.files) {
								$('#previewCatalogo .col-sm-4').remove();
									$.each(input.files, function(index, value) {
										var reader = new FileReader();
										reader.onload = function (e) {
											var html = '<div class="col-sm-4"><img class="img_prod_catalog" src="'+e.target.result+'" alt=""></div>';
											$('#previewCatalogo').append(html);
										}
										reader.readAsDataURL(input.files[index]);
									})
              }
          }

          $("#CatalogoImagenes").change(function () {
              prvCatalogo(this);
          });

            $('select').select2();
        </script>
		@endsection()

	@endsection()

@endsection()
