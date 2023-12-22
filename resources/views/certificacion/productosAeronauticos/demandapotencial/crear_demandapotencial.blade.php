@extends('partials.card')

@extends('layout')

@section('title')
Crear Demanda 
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'demandapotencial.store')) !!}

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
					
					<h2><b>Crear Demanda Potencial</b></h2>
					<hr>
					<br><br>

                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                <div class="tab-content">
                	<div id="home" class="tab-pane active">
                		<div class="row">
                			<div class="col-lg-6">	
                				<div class="form-group floating-label">
                					<input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="" required="">
                					<label for="Nombre">Nombre</label>
                				</div>
                			</div>

                			<div class="col-lg-3">	
                				<div class="form-group floating-label">
                					<input type="text" class="form-control" name="ParteNumero" id="ParteNumero" placeholder="" required="">
                					<label for="ParteNumero">Parte Numero</label>
                				</div>
                			</div>
                			
							
							<div class="col-lg-3">	
                				<div class="form-group floating-label">
                					{{ Form::select('IdAeronave', $aeronaves->pluck('Aeronave', 'IdAeronave'), null, ['class' => 'form-control', 'required' => '']) }}
                					{{ Form::label('IdAeronave', 'Aeronave')}}
                				</div>
                			</div>						
					</div> {{-- end row --}}
					<div class="row">

						<div class="col-lg-3">	
                				<div class="form-group floating-label">
                					{{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'required' => '']) }}
                					{{ Form::label('IdUnidad', 'Unidad')}}
                				</div>
                			</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="NSN" id="NSN" placeholder="" required="">
								<label for="NSN">NSN</label>
							</div>
						</div>

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="CodigoSAP" id="CodigoSAP" placeholder="" required="">
								<label for="CodigoSAP">Codigo SAP</label>
							</div>
						</div>
						
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="PublicacionTecnica" id="PublicacionTecnica" placeholder="" required="">
								<label for="PublicacionTecnica">Publicación Tecnica</label>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdATA', $atas->pluck('ATA', 'IdATA'), null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdATA', 'ATA')}}
							</div>
						</div>

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="Identificacion" id="Identificacion" placeholder="" required="">
								<label for="Identificacion">Identificación</label>
							</div>
						</div>

						<div class="col-lg-6">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="Funcionamiento" id="Funcionamiento" placeholder="" required="">
								<label for="Funcionamiento">Funcionamiento</label>
							</div>
						</div>
					</div>
	
					<div class="row">
						
						<div class="col-lg-6">	
							<div class="form-group floating-label">
								<textarea name="Observaciones" id="Observaciones" class="form-control" rows="3" required=""></textarea>
								<label for="Observaciones">Observaciones</label>
							</div>
						</div>	
						
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="Fabricante" id="Fabricante" placeholder="" required="">
								<label for="Fabricante">Fabricante</label>
							</div>
						</div>

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="decimal" class="form-control" name="precioCompra" id="precioCompra" placeholder="" required="">
								<label for="precioCompra">precioCompra</label>
							</div>
						</div>
					</div>
						
						
					<div class="row">

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="number" class="form-control" name="Anio" id="Anio" placeholder="" required="">
								<label for="Anio">Año</label>
							</div>
						</div>

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="number" class="form-control" name="TiempoEntrega" id="TiempoEntrega" placeholder="">
								<label for="TiempoEntrega">Tiempo Entrega</label>
							</div>
						</div>

						

						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="number" class="form-control" name="PeriodoTiempoEntrega" id="PeriodoTiempoEntrega" placeholder="">
								<label for="PeriodoTiempoEntrega">Periodo TiempoEntrega</label>
							</div>
						</div>
						
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="input" class="form-control" name="Clase" id="Clase" placeholder="" required="">
								<label for="Clase">Clase</label>
							</div>
						</div>

						{{-- Imgen --}}
						
					</div>		

					<div class="row">
						<label class="checkbox-inline checkbox-styled">
							{!! Form::checkbox('Imgen', '1') !!}<span>Imagen</span>
						</label>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="input" class="form-control" name="DocTecnica" id="DocTecnica" placeholder="" required="">
								<label for="DocTecnica">DocTecnica</label>
							</div>
						</div>
					</div>			
				</div>	{{-- tab-pane active --}}
							
					<div class="row">
						<div class="col-sm-6">	
							{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
						</div>	
						<div class="col-sm-6">	
							{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}	
						</div>										
					</div>
				</div> {{-- tab content --}}
			
			{!! Form::close() !!}

			@endsection()

			@endsection()

			@endsection()