@extends('partials.card')

@extends('layout')

@section('title')
	Crear Producto
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'productos.store', 'files' =>true, 'id' => 'productoForm')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_productos')}}
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
 																		<input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
 																		<label for="Nombre">Nombre Producto</label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		<input type="text" class="form-control" id="ParteNumero" name="ParteNumero" value="{{ old('ParteNumero') }}" required>
 																		<label for="ParteNumero">P/N</label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		{{ Form::select('IdAeronave', $aeronaves->pluck('Equipo', 'IdAeronave'), old('IdAeronave'), ['class' => 'form-control', 'id' => 'IdAeronave']) }}
 																		<label for="IdAeronave">Equipo </label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
																 <div class="form-group">
																{{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'id' => 'IdUnidad']) }}  
																<label for="IdUnidad">Unidad</label>
																 <span id="errorIdUnidad" class="text-danger"></span>
																</div>

 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		<input type="text" class="form-control" id="PublicacionTecnica" name="PublicacionTecnica" value="{{ old('PublicacionTecnica') }}" required>
 																		<label for="PublicacionTecnica"> Publicación Técnica</label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		{{ Form::select('IdATA', $atas->pluck('ATA', 'IdATA'), old('IdATA'), ['class' => 'form-control', 'id' => 'IdATA']) }}
 																		<label for="IdATA"> ATA </label>
 																	</div>
 																</div>
 															</div>
 														</div>
 														<div class="col-sm-5">
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="foto-producto">
 																		<img id="image_upload_preview" src="" alt="profile Pic">
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
 																		<input type="text" class="form-control" id="NSN" name="NSN" required>
 																		<label for="NSN">NSN </label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		<input type="text" class="form-control" id="CodigoSAP" name="CodigoSAP" required>
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
 																		<textarea class="form-control" id="Funcionamiento" name="Funcionamiento" rows="3"></textarea>
 																		<label for="Funcionamiento"> Funcionamiento </label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		<input type="text" class="form-control" id="Fabricante" name="Fabricante" required >
 																		<label for="Fabricante"> Fabricante </label>
 																	</div>
 																</div>
 															</div>
 															<div class="row">
 																<div class="col-sm-12">
 																	<div class="form-group">
 																		<input type="number" class="form-control" id="PrecioCompra" name="PrecioCompra">
 																		<label for="PrecioCompra"> Precio de Compra</label>
 																	</div>
 																</div>
 															</div>
 														</div>
 														<div class="col-sm-5">
 															<div class="row">
 																<div class="col-sm-12">

 																	<div class="foto-producto">
 																		<a href="" target="_blank"><img id="image_upload_preview" src="" alt="profile Pic" ></a>
 																	</div>

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
 																<textarea class="form-control" id="Observaciones" name="Observaciones"></textarea>
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
 																<input type="number" class="form-control" id="TiempoEntrega" name="TiempoEntrega" onKeyPress="return soloNumeros(event)">
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
 																<input type="text" class="form-control" id="CantidadRequerida" name="CantidadRequerida">
 																<label for="CantidadRequerida"> Cantidad Requerida </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="PrioridadUMA" name="PrioridadUMA">
 																<label for="PrioridadUMA"> Prioridad UMA </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="ValoracionTecnica" name="ValoracionTecnica">
 																<label for="ValoracionTecnica"> Valoración Técnica </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="FactibilidadTecnica" name="FactibilidadTecnica">
 																<label for="FactibilidadTecnica"> Factibilidad Técnica </label>
 															</div>
 														</div>
 														<div class="col-sm-12">
 															<div class="form-group">
 																<textarea type="text" class="form-control" id="PublicacionesTecnicasAplicables" name="PublicacionesTecnicasAplicables" rows="4"></textarea>
 																<label for="PublicacionesTecnicasAplicables"> Publicaciones Técnicas Aplicables </label>
 															</div>
 														</div>
 														<div class="col-sm-12">
 															<div class="form-group">
 																<textarea type="text" class="form-control" id="DescripcionFallaTipica" name="DescripcionFallaTipica" rows="4"></textarea>
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
 																<input type="text" class="form-control" id="Rotacion" name="Rotacion">
 																<label for="Rotacion"> Rotación </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="MTBF" name="MTBF">
 																<label for="MTBF"> MTBF </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="TiempoAprovisionamiento" name="TiempoAprovisionamiento">
 																<label for="TiempoAprovisionamiento"> Tiempo Aprovisionamiento </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="ExistenciasAlmacen" name="ExistenciasAlmacen">
 																<label for="ExistenciasAlmacen"> Existencias Almacen </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="ProvisionFabricanteOriginal" name="ProvisionFabricanteOriginal">
 																<label for="ProvisionFabricanteOriginal"> Provisión Fabricante Original </label>
 															</div>
 														</div>
 														<div class="col-sm-6">
 															<div class="form-group">
 																<input type="text" class="form-control" id="FlotaAntigua" name="FlotaAntigua" >
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
 																<textarea type="text" class="form-control border" id="CaracterizacionDimensionalFuncional" name="CaracterizacionDimensionalFuncional" rows="5"></textarea>
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
 																			<img class="img_prod_catalog" id="previewDiagramaElectrico" src="" alt="">
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
 																			<img class="img_prod_catalog" id="previewDiagramaElectronico" src="" alt="">
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
 																<textarea type="text" class="form-control border" id="Especificaciones" name="Especificaciones" rows="5"></textarea>
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
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("productos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		{{-- SCRIPTS --}}
        {{-- Solo Numeros --}}
        <script src="{{URL::asset('js/soloNumeros.js')}}"></script>

		<script>
    document.getElementById("productoForm").addEventListener("submit", function (event) {
        let unidad = document.getElementById("IdUnidad").value;
        let errorSpan = document.getElementById("errorIdUnidad");

        if (!unidad) {
            event.preventDefault(); // Detiene el envío del formulario
            errorSpan.textContent = "Este campo es obligatorio.";
        } else {
            errorSpan.textContent = ""; 
        }
    });
</script>


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
