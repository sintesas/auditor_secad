@extends('partials.card')

@extends('layout')

@section('title')
	Informe Ofertas Sector Aeronautico
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($cantidadesTotalPais) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('informe_capacidad_total_pais') }}
		@endsection()

		@section('card-content')       

		<div class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
            <div id="">
                <section>                   
                    <div class="section-body">
                      

			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>Listado de empresas Colombianas Capacidad Aeronáutica</h4>
                        </div>                        
                   </div>                              
               </div>
<!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 fondoAzulClaro">
                                <div class="col-xs-8 " >
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 azul175">
                                        Capacidad u Oferta:
                                        </div>
                                        <div class="col-xs-8">
                                        ...
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                     <div class="col-xs-12">
                                        <div class="col-xs-4 azul175">
                                        Total:
                                        </div>
                                        <div class="col-xs-8">
                                        ...
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->                       
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x ">
                                  <tr class="fondoAzulOscuro blanco">
                                        <th class="th-x"> Nombre Empresa</th>
                                      
                                        <th class="th-x" >  Nit</th>
                                      
                                        <th class="th-x" > Ciudad </th>

                                        <th class="th-x" > Teléfono </th>
                                  </tr>
                                   @if(count($cantidadesTotalPais) != 1)
                                   <?php $ofertaOld = 0;?>
                                   @foreach($cantidadesTotalPais as $cantidadesTotalPaisR)                                 
                                   <?php $oferta = $cantidadesTotalPaisR->IdOfertaComercial;?> 
                                   @if ((($oferta) != ($ofertaOld)) || (($ofertaOld) === 0))
                                   <tr class="line-bt">  
                                      <th>{{$cantidadesTotalPaisR->OfertaComercial}}</th> 
                                      <th></th> 
                                      <th></th>    
                                      <th></th>                                                                       
                                   </tr>
                                   <tr class="line-a">  
                                        <th class="">{{$cantidadesTotalPaisR->NombreEmpresa}}</th>                                       
                                        <th class="">{{$cantidadesTotalPaisR->Nit}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Ciudad}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Telefono}}</th>
                                    </tr>
                                   @else
                                    <tr class="line-a">  
                                        <th class="">{{$cantidadesTotalPaisR->NombreEmpresa}}</th>                                       
                                        <th class="">{{$cantidadesTotalPaisR->Nit}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Ciudad}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Telefono}}</th>
                                    </tr>
                                   @endif     
                                   <?php $ofertaOld = $cantidadesTotalPaisR->IdOfertaComercial;?> 
                                   @endforeach
                                   @endif
                                </table>
                            </div>
                        </div><!--end .row -->
                        <div class="col-xs-12">                            
                            <div class="col-xs-6 azul175">
                                <p>Total Capacidades x Empresas:</p>
                                <p>...</p>
                            </div>
                        
                        </div>                        
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

             <a href="{{route('informecapacidadtotalpais.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
		
        </div>
    </div>

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()