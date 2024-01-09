@extends('partials.card')

@extends('layout')

@section('title')
	Informe Ofertas Sector Aeronautico
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($totalOfertasPais) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('informe_ofertas_sector_aeronautico') }}
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
                            <div class="col-xs-10">
                                <!-- titulo Formulario -->
                                <div class="col-xs-12 text-center gris57 LetraBold">
                                    <h2> FUERZA AÉREA COLOMBIANA </h2>
                                </div>
                                <!-- titulo Formulario -->
                                <div class="col-xs-12 text-center gris57 LetraBold">
                                    <h3> JEFATURA DE OPERACIONES LOGÍSTICAS AERONÁUTICAS</h3>
                                </div>
                                <!-- titulo Formulario -->
                                <div class="col-xs-12 text-center azul8080">
                                    <h4> SECCION DE CERTIFICACIÓN AERONAUTICO DE LA DEFENSA</h4>
                                </div>
                            </div>
                            <div class="col-xs-2 logoSecad">
                                <img src="../img/logo_secad.png"/>
                            </div>
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center gris57">
                                <h4> Informe Capacidades Aeronáuticas Empresas Colombianas</h4>
                            </div>                           
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x ">
                                  <tr class="azul8080">
                                        <th class="th-x"> Capacidad u Oferta Sector Aeronáutico</th>
                                      
                                        <th class="th-x" >  Cantidad Empresas</th>
                                      
                                        <th class="th-x" > Porcentaje % </th>
                                  </tr>
                                   @if(count($totalOfertasPais) != 1)
                                   @foreach($totalOfertasPais as $totalOfertasPaisR)                                 
                                    <tr class="line-a">  
                                        <th class="">{{$totalOfertasPaisR->OfertaComercial}}</th>                                       
                                        <th class=""></th>
                                        <th class=""></th>
                                    </tr>
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

             <a href="{{route('informetotalofertaspais.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

             		
        </div>
    </div>

       

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()