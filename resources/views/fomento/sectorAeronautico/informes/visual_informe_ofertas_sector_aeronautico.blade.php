@extends('partials.card')

@extends('layout')

@section('title')
	Informe Ofertas Sector Aeronautico
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($ofertasSectorAeronautico) !!}
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
                                    <h3> JEFATURA LOGÍSTICA</h3>
                                </div>
                                <!-- titulo Formulario -->
                                <div class="col-xs-12 text-center azul8080">
                                    <h4> OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA</h4>
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
                                        <th class="th-x" style="text-align: center;"> Capacidad u Oferta Sector Aeronáutico</th>
                                      
                                        <th class="th-x" style="text-align: center;">  Cantidad Empresas</th>
                                      
                                        <th class="th-x" style="text-align: center;"> Porcentaje % </th>
                                  </tr>
                                   @if(count($ofertasSectorAeronautico) != 1)
                                   @foreach($ofertasSectorAeronautico as $ofertasSectorAeronauticoR)
                                    <tr class="line-a">
                                        <td class="th-x">{{$ofertasSectorAeronauticoR->OfertaComercial}}</td>
                                        <td class="th-x" style="text-align: center;">{{$ofertasSectorAeronauticoR->Cantidad}}</td>
                                        <td class="th-x" style="text-align: center;">{{$ofertasSectorAeronauticoR->Porcentaje}} %</td>
                                    </tr>

                                    @endforeach
                                   @endif
                                   <tr class="azul8080">
                                        <th class="th-x" style="text-align: center;"> TOTAL (Capacidades x Empresas) = </th>
                                      
                                        <th class="th-x" style="text-align: center;"> {{$total}} </th>
                                      
                                        <th class="th-x" style="text-align: center;"> 100% </th>
                                  </tr>
                                </table>
                            </div>
                        </div><!--end .row -->
                        <br>
                        
                        {{-- <div  class="col-xs-12">                            
                            <div style="border-style:solid; margin-bottom: 30px;" class="col-xs-6 azul175 pull-left">
                                <p>Total Capacidades x Empresas: <b>{{$total}}</b></p>
                            </div>
                        </div> --}}

                        <br><br>

                        <a href="{{route('informeofertassectoraeronautico.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

                        
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

            	
        </div>
    </div>

        

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()