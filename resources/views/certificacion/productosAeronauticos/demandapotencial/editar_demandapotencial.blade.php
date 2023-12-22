@extends('partials.card')

@extends('layout')

@section('title')
Editar Demanda Potencial
@endsection()

@section('addcss')

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">


@endsection()

@section('content')

@section('card-content')

@section('card-title')
{{ Breadcrumbs::render('demandapotencial') }}	
@endsection()

@section('card-content')

<div class="card-body floating-label">
        
     <div class="card">
        <div class="card-head card-head-sm style-primary">
            <header>
                Información Producto Aeronautico
            </header>
            <button data-toggle="collapse" data-target="#demo" class="btn-danger pull-right" style="width: 50px;" ><span style="font-size: 250%; padding-top: 50%; height: 70%; " class="md-keyboard-arrow-down"></span></button>
        </div><!--end .card-head -->
        <div class="card-body">
            <div class="row">
               
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Nombre">Nombre Producto: </label>
                                <br>
                                {{$demandapotencial->Nombre}}
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="ParteNumero">P/N</label> 
                                <br>
                                {{$demandapotencial->ParteNumero}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), old('IdUnidad',  isset($demandapotencial->IdUnidad) ? $demandapotencial->IdUnidad : null), ['class' => 'form-control', 'id' => 'IdUnidad', 'disabled' => true]) }}
                                <label for="IdUnidad">Unidad</label>
                            </div>
                        </div>
                    </div> 
                
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::select('IdAeronave', $aeronaves->pluck('Equipo', 'IdAeronave'), old('IdAeronave',  isset($demandapotencial->IdAeronave) ? $demandapotencial->IdAeronave : null), ['class' => 'form-control', 'id' => 'IdAeronave', 'disabled' => true]) }}
                                <label for="IdAeronave">Equipo </label>
                            </div>
                        </div>                         
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="CodigoSAP">SAP</label>
                                <br>
                                {{$demandapotencial->SAP}}
                            </div>
                        </div>
                    </div>

                    <div id="demo" class="collapse">
                       <div class="row">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {{ Form::select('Identificacion', [
                                                '' => '',
                                                'Parte Individual' => 'Parte Individual',
                                                'Conjunto / Ensamble' => 'Conjunto / Ensamble'
                                            ], old('IdAeronave',  isset($demandapotencial->Identificacion) ? $demandapotencial->Identificacion : null), ['class' => 'form-control', 'id' => 'Identificacion'])}}
                                            <label for="Identificacion"> Identificación </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control autoExpand" id="Funcionamiento" name="Funcionamiento" rows="4"> {{old('Funcionamiento',  isset($demandapotencial->Funcionamiento) ? $demandapotencial->Funcionamiento : null)}} </textarea>
                                            <label for="Funcionamiento"> Funcionamiento </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Fabricante" name="Fabricante" value="{{old('Fabricante',  isset($demandapotencial->Fabricante) ? $demandapotencial->Fabricante : null)}}" required>
                                            <label for="Fabricante"> Fabricante </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control dollar-mask" id="PrecioCompra" name="PrecioCompra" required onKeyPress="return soloNumeros(event)" value="{{old('PrecioCompra',  isset($demandapotencial->PrecioCompra) ? $demandapotencial->PrecioCompra : null)}}">
                                            <label for="PrecioCompra"> Precio de Compra</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
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
                                                ], old('Anio',  isset($demandapotencial->Anio) ? $demandapotencial->Anio : null), ['class' => 'form-control', 'id' => 'Anio', 'disabled' => true])}}
                                                <label for="Anio"> Año </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="foto-producto">
                                            <img id="image_upload_preview" src="{{URL::asset('secad/Productos/' . $demandapotencial->Nombre.'-'.$demandapotencial->ParteNumero.'/'.$demandapotencial->Imgen)}}" alt="profile Pic">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
            </div>
        </div> 
               
    </div>

<div class="card">
    <div class="card-head card-head-sm style-primary">
        <header style="width: 100%">
            <div class="row">
                <div class="col-sm-8">
                    Demanda Potencial
                </div>
                <div id="valoraciontotal" class="col-sm-4" style="text-align: right;">

                    Valoración Total:{{(isset($valoraciontecnica->TipoLista) ? $valoraciontecnica->TipoLista : null) + (isset($valoraciontecnica->AltaRotacion) ? $valoraciontecnica->AltaRotacion : null) + (isset($valoraciontecnica->BajoMTBF) ? $valoraciontecnica->BajoMTBF : null) + (isset($valoraciontecnica->AltosTiempos) ? $valoraciontecnica->AltosTiempos : null) + (isset($valoraciontecnica->DeficitExistencias) ? $valoraciontecnica->DeficitExistencias : null) + (isset($valoraciontecnica->FabricanteOrinal) ? $valoraciontecnica->FabricanteOrinal : null) + (isset($valoraciontecnica->FlotaAntigua) ? $valoraciontecnica->FlotaAntigua : null) + (isset($factibilidadtecnica->Severidad) ? $factibilidadtecnica->Severidad : null) + (isset($factibilidadtecnica->OcurrenciaFalla) ? $factibilidadtecnica->OcurrenciaFalla : null) + (isset($factibilidadtecnica->Complejidad) ? $factibilidadtecnica->Complejidad : null) + (isset($prioridaduma->Prioridad) ? $prioridaduma->Prioridad : null) }} 

                </div>
            </div>
        </header>
    </div><!--end .card-head -->
    <div class="card-body">
    {{-- TABS HEADERS --}}
    <ul class="nav nav-tabs" data-toggle="tabs">
    	<li><a  href="#menu1">Consumo <br> Rotación</a></li>				      
        <li><a  href="#menu5">Valoración <br> técnica</a></li> 
    	<li><a  href="#menu2">Factibilidad <br> Tecnica</a></li>
    	<li><a  href="#menu3">Prioridad <br> UMA</a></li>
    	<li><a  href="#menu4">Valoración <br> Económica</a></li>
        <li><a  href="#menu6">Oferta <br> Aeronautica</a></li>

    </ul>

    <br><br>
    {{-- END TABS HEADERS --}}
	
<div class="tab-content">

    {{-- TAB 1 --}}
	<div id="menu1" class="tab-pane fade">
		<div class="card-body floating-label">
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table style="width: 100%" id="datatable1" class="table table-striped table-hover">
							<thead>
								<tr>
									<th><b>Año</b></th>
									<th><b>Cantidad</b></th>
									<th><b>Acción</b></th>
								</tr>
							</thead>
							<tbody style="width: 100%" id="" name="">
    							@foreach ($consumorotacion as $rotacion)
    							<tr class="consumorotacion{{$rotacion->IdConsumoRotacion}}">
    								<td>{{$rotacion->Anio}}</td>
    								<td>{{$rotacion->Cantidad}}</td>
    								<td><button class="btn btn-danger btn-delete delete-record-consumorotacion pull-left" value="{{$rotacion->IdConsumoRotacion}}"><span class="glyphicon glyphicon-trash"></span></button></td>
    							</tr>
    							@endforeach
    						</tbody>
    					</table>
						
						<form name="consumorotacion" id="consumorotacion">
		                  {{ csrf_field()}}
				                <table class="table table-striped table-hover" id="dynamic_field_consumorotacion">
				                	<input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >
				                </table>
				                <br>  
				                <button type="button" name="addconsumorotacion" id="addconsumorotacion" class="btn btn-success">Nuevo Campo</button>
				                <br>
				                <br>
				              
				              <input type="button" name="submitconsumorotacion" id="submitconsumorotacion" class="btn btn-info btn-block" value="Guardar" />

				              {{-- alerts --}}
				                <div class="alert alert-danger print-error-msg-" style="display:none">
				                  <ul></ul>
				                </div>

				                <div class="alert alert-success print-success-msg-" style="display:none">
				                  <ul></ul>
				                </div> 

		              	</form>

    				</div><!--end .table-responsive -->
    			</div><!--end .col -->
    		</div>
    	</div>
    </div>   
    {{-- END TAB 1 --}}  

    {{-- TAB 2 --}}
	<div id="menu2" class="tab-pane fade">
		<div class="card-body floating-label">
			<div class="row">
				
								
						<form name="factibilidadtecnica" id="factibilidadtecnica">
		                  {{ csrf_field()}}
   
		                	<input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >

		                	<ul style="width: 50%; margin-left: auto; margin-right: auto;" class="list">
		                		<li class="tile">
		                			<a class="tile-content ink-reaction">
		                				{!! Form::select('Severidad', [
		                					1 => 'Catastrofico',
		                					2 => 'Critico',
		                					3 => 'Marginal',
		                					], old('value', isset($factibilidadtecnica->Severidad) ? $factibilidadtecnica->Severidad : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 50%', 'required']) !!}

		                					<div class="tile-text">
		                						<small>
		                							<b>1.</b> Severidad: 
		                						</small>
		                					</div>

		                				</a>
		                			</li>

		                			<li class="tile">
		                			<a class="tile-content ink-reaction">
		                				{!! Form::select('OcurrenciaFalla', [
		                					1 => 'Frecuente',
		                					2 => 'Probable',
		                					3 => 'Ocasional',
		                					4 => 'Remoto',
		                					5 => 'Improbable',
		                					], old('value', isset($factibilidadtecnica->OcurrenciaFalla) ? $factibilidadtecnica->OcurrenciaFalla : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 50%', 'required']) !!}

		                					<div class="tile-text">
		                						<small>
		                							<b>2.</b> Ocurrencia Falla
		                						</small>
		                					</div>

		                				</a>
		                			</li>

		                			<li class="tile">
		                			<a class="tile-content ink-reaction">
		                				{!! Form::select('Complejidad', [
		                					1 => 'Alta',
		                					2 => 'Media',
		                					3 => 'Baja',
		                					], old('value', isset($factibilidadtecnica->Complejidad) ? $factibilidadtecnica->Complejidad : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 50%', 'required']) !!}

		                					<div class="tile-text">
		                						<small>
		                							<b>3.</b> Complejidad: 
		                						</small>
		                					</div>

		                				</a>
		                			</li>
		                		</ul>

		                		<br><br>
				                
				              
				              <input type="button" name="submitfactibilidadtecnica" id="submitfactibilidadtecnica" class="btn btn-info btn-block" value="Guardar" />

				              {{-- alerts --}}
				                <div class="alert alert-danger print-error-msg-" style="display:none">
				                  <ul></ul>
				                </div>

				                <div class="alert alert-success print-success-msg-" style="display:none">
				                  <ul></ul>
				                </div> 

		              	</form>

    				</div><!--end .table-responsive -->
    			</div><!--end .col -->
    		</div>
    	   
    {{-- END TAB 2 --}} 


    {{-- TAB 3 --}}
    <div id="menu3" class="tab-pane fade">
    	<div class="card-body floating-label">
    		<div class="row">

    			<form name="prioridaduma" id="prioridaduma">
    				{{ csrf_field()}}


    					<input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >
					
    					<ul style="width: 50%; margin-left: auto; margin-right: auto;" class="list">
    						<li class="tile">
    							<a class="tile-content ink-reaction">
    									<div class="tile-text">
    										<small>
    											<b>1.</b> Alta (Ocasiona AOG?): 
    										</small>
    									</div>
                                        <div class="radio radio-styled">
                                                        <label>
                                                            <input type="radio" name="Prioridad" value="3"  @if(old('Prioridad')) checked @endif>
                                                        </label>
                                                    </div>
    								</a>
    							</li>

    						<li class="tile">
    							<a class="tile-content ink-reaction">
    									<div class="tile-text">
    										<small>
    											<b>2.</b> Media (Ocasiona PPA?): 
    										</small>
    									</div>
                                        <div class="radio radio-styled">
                                                        <label>
                                                            <input type="radio" name="Prioridad" value="2" @if(old('Prioridad')) checked @endif>
                                                        </label>
                                                    </div>
    								</a>
    							</li>



    						<li class="tile">
    							<a class="tile-content ink-reaction">
    									<div class="tile-text">
    										<small>
    											<b>3.</b> Baja (No afecta la operación): 
    										</small>
    									</div>
                                        <div class="radio radio-styled">
                                                        <label>
                                                            <input type="radio" name="Prioridad" value="1"  @if(old('Prioridad')) checked @endif>
                                                        </label>
                                                    </div>
    								</a>
    							</li>



    					</ul>

					


    				<br>
    				<br>

    				<input type="button" name="submitprioridaduma" id="submitprioridaduma" class="btn btn-info btn-block" value="Guardar" />

    				{{-- alerts --}}
    				<div class="alert alert-danger print-error-msg-" style="display:none">
    					<ul></ul>
    				</div>

    				<div class="alert alert-success print-success-msg-" style="display:none">
    					<ul></ul>
    				</div> 

    			</form>

    		</div><!--end .table-responsive -->
    	</div><!--end .col -->
    </div>
    {{-- END TAB  3--}} 

    {{-- TAB 4 --}}
    <div id="menu4" class="tab-pane fade">
    	<div class="card-body floating-label">
    		<div class="row">

    			<form name="valoracioneconomica" id="valoracioneconomica">
    				{{ csrf_field()}}
    				<input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >

    				<div class="row">
                        
    					<div class="col-sm-4 col-sm-offset-2">
    						<div class="form-group">
    							<input type="text" value="{{old('ValorUnitario', isset($valoracioneconomica->ValorUnitario) ? $valoracioneconomica->ValorUnitario : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="ValorUnitario" name="ValorUnitario" required maxlength="12">
                                <label for="ValorUnitario">Valor Unitario Comercial ($)</label>
    						</div>
    					</div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ Form::select('TipoMonedaUltimoPrecio', [
                                            '' => '',
                                            'USD' => 'USD',
                                            'COP' => 'COP'
                                        ], old('value', isset($valoracioneconomica->TipoMonedaUltimoPrecio) ? $valoracioneconomica->TipoMonedaUltimoPrecio : null ), ['class' => 'form-control', 'id' => 'PeriodoTiempoEntrega'])}}
                                <label for="TipoMonedaUltimoPrecio">Moneda</label>

                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="text" value="{{old('AnioVUC', isset($valoracioneconomica->AnioVUC) ? $valoracioneconomica->AnioVUC : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="AnioVUC" name="AnioVUC" required maxlength="4">
                                <label for="AnioVUC">Año VUC</label>
                            </div>
                        </div>
    					
    				</div> {{-- row --}}

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <div class="form-group">
                                <input type="text" value="{{old('ValorHistorico', isset($valoracioneconomica->ValorHistorico) ? $valoracioneconomica->ValorHistorico : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="ValorHistorico" name="ValorHistorico" required maxlength="12">
                                <label for="ValorHistorico">Valor Historico ($)</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ Form::select('TipoMonedaValorHistorico', [
                                            '' => '',
                                            '1' => 'USD',
                                            '2' => 'COP'
                                            ], old('value', isset($valoracioneconomica->TipoMonedaValorHistorico) ? $valoracioneconomica->TipoMonedaValorHistorico : null ), ['class' => 'form-control', 'id' => 'PeriodoTiempoEntrega'])}}
                                <label for="TipoMonedaValorHistorico">Moneda</label>

                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="text" value="{{old('AnioVH', isset($valoracioneconomica->AnioVH) ? $valoracioneconomica->AnioVH : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="AnioVH" name="AnioVH" required maxlength="4">
                                <label for="AnioVH">Año VH</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="{{old('ValorUnitario', isset($valoracioneconomica->ValorUnitario) ? $valoracioneconomica->ValorUnitario : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="ValorUnitario" name="ValorUnitario" required>
                                <label for="ValorUnitario">Valor Unitario ($)</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ Form::select('TipoMonedaValorUnitario', [
                                            '' => '',
                                            'USD' => 'USD',
                                            'COP' => 'COP'
                                        ], old('value', isset($valoracioneconomica->TipoMonedaValorUnitario) ? $valoracioneconomica->TipoMonedaValorUnitario : null ), ['class' => 'form-control', 'id' => 'TipoMonedaValorUnitario'])}}
                                <label for="TipoMonedaValorUnitario">Moneda</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" value="{{old('ValorTotal', isset($valoracioneconomica->ValorTotal) ? $valoracioneconomica->ValorTotal : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="ValorTotal" name="ValorTotal" required>
                                <label for="ValorTotal">Valor Total ($)</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                {{ Form::select('TipoMonedaValorTotal', [
                                            '' => '',
                                            'USD' => 'USD',
                                            'COP' => 'COP'
                                        ], old('value', isset($valoracioneconomica->TipoMonedaValorTotal) ? $valoracioneconomica->TipoMonedaValorTotal : null ), ['class' => 'form-control', 'id' => 'TipoMonedaValorTotal'])}}
                                <label for="TipoMonedaValorTotal">Moneda</label>
                            </div>
                        </div>
                    </div> -->

    				<div class="row">
                        <div class="col-sm-3">
                        </div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" value="{{old('CantidadPrioridad', isset($valoracioneconomica->CantidadPrioridad) ? $valoracioneconomica->CantidadPrioridad : null) }}" onKeyPress="return soloNumeros(event)" class="form-control" id="CantidadPrioridad" name="CantidadPrioridad" required>
								<label for="CantidadPrioridad">Cantidad Prioridad FAC</label>
							</div>
						</div>
					</div> {{-- row --}}
                    
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::select('AnioProximaEntrega', [
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
                                ], old('value', isset($valoracioneconomica->AnioProximaEntrega) ? $valoracioneconomica->AnioProximaEntrega : null), ['class' => 'form-control', 'id' => 'AnioProximaEntrega'])}}<label for="AnioProximaEntrega"> Año proxima Compra </label>
                            </div>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-sm-3">
                        </div>
						<div class="col-sm-4">
                            <div class="form-group">
    							{!! Form::select('ContratarCompra', [
                                    '' => '',
    								1 => 'si',
    								0 => 'no',
    								], old('value', isset($valoracioneconomica->ContratarCompra) ? $valoracioneconomica->ContratarCompra : null ), [ 'class' =>  'form-control', 'required']) !!}
                                <label for="ContratarCompra"> Contratar Compra </label>
                            </div>
						</div>
					</div>

					<br><br><br>

					 <input type="button" name="submitvaloracioneconomica" id="submitvaloracioneconomica" class="btn btn-info btn-block" value="Guardar" />

                    {{-- alerts --}}
                    <div class="alert alert-danger print-error-msg-valoracioneconomica" style="display:none">
                        <ul></ul>
                    </div>

	                <div class="alert alert-success print-success-msg-valoracioneconomica" style="display:none">
	                   <ul></ul>
	                </div> 

    			</form>


    		</div>
    	</div> 
    </div>
    {{-- END TAB 4 --}} 


    {{-- TAB 5 --}}
	<div id="menu5" class="tab-pane fade">
		<div class="card-body floating-label">
			<div class="row">
						<form name="valoraciontecnica" id="valoraciontecnica">						
		                  {{ csrf_field()}}

				                	<input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >
								
							

								<ul style="width: 50%; margin-left: auto; margin-right: auto;" class="list">
				                	<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('TipoLista', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->TipoLista) ? $valoraciontecnica->TipoLista : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>1.</b> ¿El componente hace parte de una Lista Maestra?
				                					</small>

				                				</div>
				                			</a>
				                		</li>

				                	<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('AltaRotacion', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->AltaRotacion) ? $valoraciontecnica->AltaRotacion : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>2.</b> ¿Presenta una Alta Rotación en la Aeronave?
				                					</small>
				                				</div>
				                			</a>
				                		</li>


				                	<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('BajoMTBF', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->BajoMTBF) ? $valoraciontecnica->BajoMTBF : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>3.</b> ¿Registra un Bajo MTBF (Tiempo Medio entre fallas)?
				                					</small>

				                				</div>
				                			</a>
				                		</li>


				                		<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('AltosTiempos', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->AltosTiempos) ? $valoraciontecnica->AltosTiempos : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>4.</b>¿Se Adquiere con Altos Tiempos de Aprovisionamiento?
				                					</small>

				                				</div>
				                			</a>
				                		</li>

				                		<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('DeficitExistencias', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->DeficitExistencias) ? $valoraciontecnica->DeficitExistencias : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>5.</b>¿Presenta Déficit de Existencias en Almacén con Frecuencia?
				                					</small>

				                				</div>
				                			</a>
				                		</li>


				                		<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('FabricanteOrinal', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->FabricanteOrinal) ? $valoraciontecnica->FabricanteOrinal : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>6.</b>¿Actualmente es de Difícil Consecución en el Mercado aeronáutico?
				                					</small>

				                				</div>
				                			</a>
				                		</li>
				                		

				                		<li class="tile">
				                		<a class="tile-content ink-reaction">
				                			{!! Form::select('FlotaAntigua', [
				                				1 => 'si',
				                				0 => 'no',
				                				], old('value', isset($valoraciontecnica->FlotaAntigua) ? $valoraciontecnica->FlotaAntigua : null ), [ 'class' =>  'pull-right form-control lists', 'style' => 'width: 20%', 'required']) !!}
				                				<div class="tile-text">
				                					<small>
				                						<b>7.</b>¿Hace parte de algún Listado de Elementos Recotizados por la FAC?
				                					</small>

				                				</div>
				                			</a>
				                		</li>
									</ul>

				                <br>  
				                
				              
				              <input type="button" name="submitvaloraciontecnica" id="submitvaloraciontecnica" class="btn btn-info btn-block" value="Guardar" />

				              {{-- alerts --}}
                                <div class="alert alert-danger print-error-msg-valoraciontecnica" style="display:none">
                                  <ul></ul>
                                </div>

                                <div class="alert alert-success print-success-msg-valoraciontecnica" style="display:none">
                                  <ul></ul>
                                </div> 

		              	</form>

				</div><!--end .table-responsive -->
			</div><!--end .col -->
    	</div>   
    {{-- END TAB 5 --}} 


    {{-- TAB 6 --}}
    <div id="menu6" class="tab-pane fade">
        <div class="card-body floating-label">
            <div class="row">
                
               <form name="ofertaaeronautica" id="ofertaaeronautica">
                          {{ csrf_field()}}

                                
                          <input type="hidden" class="form-control" id="IdDemandaPotencial" name="IdDemandaPotencial" value="{{$demandapotencial->IdDemandaPotencial}}" >
					
					<div class="row">
                          <div class="col-sm-4">
                          	<div class="form-group">{{ Form::select('IdCluster', $clusters->pluck('NombreCluster', 'IdCluster'), old('value', isset($ofertaaeronautica->IdCluster) ? $ofertaaeronautica->FabricanteOrinal : null ), ['class' => 'form-control', 'id' => 'IdCluster']) }}<label for="IdCluster">Cluster</label></div>
                          </div>
							
						  <div class="col-sm-4">
						  	<div class="form-group">
                                @if(isset($ofertaaeronautica->IdEmpresa) ? $ofertaaeronautica->IdEmpresa:null)
                                {{-- @if(!$ofertaaeronautica->IdEmpresa) --}}
						  		<select class="form-control" name="IdEmpresa" id="IdEmpresa"></select>
						  		<label for="IdEmpresa">Empresa</label>
                                @else
                                <div class="form-group">{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), old('value', isset($ofertaaeronautica->IdEmpresa) ? $ofertaaeronautica->IdEmpresa : null ), ['class' => 'form-control', 'id' => 'IdEmpresa']) }}<label for="IdCluster">Empresas</label></div>
                                @endif
                          </div>
                      </div>

                          <div class="col-sm-4">
                          	<div class="form-group">
                          		<input type="text" onKeyPress="return soloNumeros(event)" value="{{old('ValorUnitario', isset($ofertaaeronautica->ValorUnitario) ? $ofertaaeronautica->ValorUnitario : null) }}" class="form-control" id="ValorUnitario" name="ValorUnitario" required>
                          		<label for="ValorUnitario">Valor Unitario (Estimado) ($)</label>
                          	</div>
                          </div>

                     </div>

                     <div class="row">
                     	
						<div class="col-sm-4">
                          	<div class="form-group">
                          		<input type="text" onKeyPress="return soloNumeros(event)" value="{{old('TiempoEntrega', isset($ofertaaeronautica->TiempoEntrega) ? $ofertaaeronautica->TiempoEntrega : null) }}" class="form-control" id="TiempoEntrega" name="TiempoEntrega" required>
                          		<label for="TiempoEntrega">Tiempo Entrega (Estimado)</label>
                          	</div>
                          </div>

                          <div class="col-sm-3">
                          	<div class="form-group">
                          		<input type="text" onKeyPress="return soloNumeros(event)" value="{{old('Cantidad', isset($ofertaaeronautica->Cantidad) ? $ofertaaeronautica->Cantidad : null) }}" class="form-control" id="Cantidad" name="Cantidad" required>
                          		<label for="Cantidad">Cantidad</label>
                          	</div>
                          </div>
						
						 <div class="col-sm-3">
                          	<div class="form-group">
                          		<input type="text" onKeyPress="return soloNumeros(event)" value="{{old('ValorTotal', isset($ofertaaeronautica->ValorTotal) ? $ofertaaeronautica->ValorTotal : null) }}" class="form-control" id="ValorTotal" name="ValorTotal" required>
                          		<label for="ValorTotal">Valor Total ($)</label>
                          	</div>
                          </div>

                          <div class="col-sm-2">
										<div class="form-group">{{ Form::select('Anio', [
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
                                            ], null, ['class' => 'form-control', 'id' => 'Anio'])}}<label for="Anio"> Año </label></div>
							</div>
							<br><br>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" required> {{old('Observaciones', isset($ofertaaeronautica->Observaciones) ? $ofertaaeronautica->Observaciones : null) }} </textarea>
                                <label for="Observaciones">Observaciones</label>
                            </div>
                        </div>
                    </div>


                          	<br>
                          	<br>
                              
                              <input type="button" name="submitofertaaeronautica" id="submitofertaaeronautica" class="btn btn-info btn-block" value="Guardar" />

                              {{-- alerts --}}
                                <div class="alert alert-danger print-error-msg-ofertaaeronautica" style="display:none">
                                  <ul></ul>
                                </div>

                                <div class="alert alert-success print-success-msg-ofertaaeronautica" style="display:none">
                                  <ul></ul>
                                </div> 

                        </form>
       		</div>
        </div>
    </div>   
    {{-- END TAB 6 --}} 

	</div><!--end .tabcontent -->
</div>
</div>
</div>

	<script src="{{asset('js/soloNumeros.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	

	
	<script>

        $('label').css( "font-size", "12px" );
		
		$(document).ready(function(){


            // Applied globally on all textareas with the "autoExpand" class
            $(document)
            .one('focus.autoExpand', 'textarea.autoExpand', function(){
                var savedValue = this.value;
                this.value = '';
                this.baseScrollHeight = this.scrollHeight;
                this.value = savedValue;
            })
            .on('input.autoExpand', 'textarea.autoExpand', function(){
                var minRows = this.getAttribute('data-min-rows')|0, rows;
                this.rows = minRows;
                rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
                this.rows = minRows + rows;
            });

			$('#datatable1').DataTable();
			


			var postURL = "<?php echo url('/storedemandapotencial'); ?>";
			var postURLCONSUMOROTACION = "<?php echo url('/storeconsumorotacion'); ?>";
			var postURLFACTIBILIDADTECNICA = "<?php echo url('/storefactibilidadtecnica'); ?>";
			var postURLPRIORIDADUMA = "<?php echo url('/storeprioridaduma'); ?>";
			var postURLVALORACIONECONOMICA = "<?php echo url('/storevaloracioneconomica'); ?>";
			var postURLVALORACIONTECNICA = "<?php echo url('/storevaloraciontecnica'); ?>";
            var postURLOFERTAAERONAUTICA = "<?php echo url('/storeofertaaeronautica'); ?>";

			var i=1;
			var j=1;
			var k=1;
			var l=1;
			var m=1;	
            var n=1;			

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('#IdCluster').change(function(event) {

                

                // load up afiliados to cluster
                $.get("../afiliados/" + event.target.value + "", function(response, state){

                    // console.log(response); 

                    $('#IdEmpresa').empty();
                    $('#IdEmpresa').append('<option value="" selected="selected"></option>');

                    for(i=0; i<response.length; i++){
                        $('#IdEmpresa').append('<option value="' + response[i].IdEmpresa + '">' +  response[i].NombreEmpresa + '</option>');
                    }
                });
            });


			$('#addconsumorotacion').click(function(){
				i++;
				$('#dynamic_field_consumorotacion').append('<tr id="row'+i+'" class="dynamic_field_consumorotacion-added">'+

                    '<td> <div style="style="width:80%;" class="form-group">' +
                        '<select class="form-control" name="Anio[]" id="Anio">' +
                            '<option value =""></option>' + 
                            '<option value ="2012">2012</option>' + 
                            '<option value ="2013">2013</option>' + 
                            '<option value ="2014">2014</option>' + 
                            '<option value ="2015">2015</option>' + 
                            '<option value ="2016">2016</option>' + 
                            '<option value ="2017">2017</option>' + 
                            '<option value ="2018">2018</option>' + 
                            '<option value ="2019">2019</option>' + 
                            '<option value ="2020">2020</option>' + 
                            '<option value ="2021">2021</option>' + 
                        '</select><label for="Anio"> Año </label></div></td>'+
					'<td><input type="text" onKeyPress="return soloNumeros(event)" id="Cantidad" class="pull-left" name="Cantidad[]"></td>'+
					'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-consumorotacion">X</button></td></tr>');  

                var yr = ( new Date() ).getFullYear();
                var sel = document.getElementById('Anio');
                sel.options[1] = new Option(yr-2,yr-2);
                sel.options[2] = new Option(yr-1,yr-1);
                sel.options[3] = new Option(yr,yr);

			});








            

            $('#submitofertaaeronautica').click(function(){            
                $.ajax({  
                    url:postURLOFERTAAERONAUTICA,  
                    method:"POST",  
                    data:$('#ofertaaeronautica').serialize(),
                    type:'json',
                    success:function(data){
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;

                            toastr.success("Informacion Actualizada");
                        }
                    }  
                });  

            }); 

            
		

			function RefreshTable1() {
				$( "#datatable1" ).load( "{{route('demandapotencial.edit', $demandapotencial->IdDemandaPotencial) }} #datatable1");
			}

			$('#submitconsumorotacion').click(function(){            
				$.ajax({  
					url:postURLCONSUMOROTACION,  
					method:"POST",  
					data:$('#consumorotacion').serialize(),
					type:'json',
					success:function(data){
						if(data.error){
							// printErrorMsg(data.error);
                            toastr.error(data.error);
						}else{
							i=1;

							toastr.success("Información Actualizada");
							RefreshTable1();

							$('.dynamic_field_consumorotacion-added').remove();
						}
					}  
				});  

			}); 

			function Refresh() {
				$( "#valoraciontotal" ).load( "{{route('demandapotencial.edit', $demandapotencial->IdDemandaPotencial) }} #valoraciontotal");
			}


			$('#submitfactibilidadtecnica').click(function(){            
				$.ajax({  
					url:postURLFACTIBILIDADTECNICA,  
					method:"POST",  
					data:$('#factibilidadtecnica').serialize(),
					type:'json',
					success:function(data){
						if(data.error){
							printErrorMsg(data.error);
						}else{
							
							toastr.success("Información Actualizada");
							Refresh();
							
						}
					}  
				});  

			}); 


			

			$('#submitprioridaduma').click(function(){            
				$.ajax({  
					url:postURLPRIORIDADUMA,  
					method:"POST",  
					data:$('#prioridaduma').serialize(),
					type:'json',
					success:function(data){
						if(data.error){
							printErrorMsg(data.error);
						}else{
							i=1;

							toastr.success("Información Actualizada");
							Refresh();

							
						}
					}  
				});  

			}); 

			$('#submitvaloracioneconomica').click(function(){            
				$.ajax({  
					url:postURLVALORACIONECONOMICA,  
					method:"POST",  
					data:$('#valoracioneconomica').serialize(),
					type:'json',
					success:function(data){
						if(data.error){
							printErrorMsg(data.error);
						}else{
							
							toastr.success("Información Actualizada");
						}
					}  
				});  

			}); 


			

			$('#submitvaloraciontecnica').click(function(){            
				$.ajax({  
					url:postURLVALORACIONTECNICA,  
					method:"POST",  
					data:$('#valoraciontecnica').serialize(),
					type:'json',
					success:function(data){
						if(data.error){
							printErrorMsg(data.error);
						}else{
							toastr.success("Información Actualizada");
							Refresh();
						}
					}  
				});  

			}); 

			$(document).on('click', '.btn_remove-consumorotacion', function(){  
				var button_id = $(this).attr("id");   
				$('#row'+button_id+'').remove();  
			});


            // record deletion

           

           
            $(document).on('click','.delete-record-consumorotacion',function(){

                var idconsumorotacion = $(this).val();

                $.ajax({
                    type: "DELETE",
                    url: '/deleteconsumorotacion' + '/' + idconsumorotacion,
                    success: function (data) {
                        console.log(data);
                        $(".consumorotacion" + idconsumorotacion).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });



             



		});



	</script>


			@endsection()

			@endsection()

			@endsection()