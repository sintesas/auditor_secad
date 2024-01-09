@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
    
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
            Informe Capacidad Total País
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
                            
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center gris57">
                                <h4> Listado de empresas Colombianas Capacidad Aeronáutica</h4>
                            </div>
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
                                   @foreach($cantidadesTotalPais as $cantidadesTotalPaisR)                                 
                                    <tr class="line-a">  
                                        <th class="">{{$cantidadesTotalPaisR->NombreEmpresa}}</th>                                       
                                        <th class="">{{$cantidadesTotalPaisR->Nit}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Ciudad}}</th>
                                        <th class="">{{$cantidadesTotalPaisR->Telefono}}</th>
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
        </div>
    </div>

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()

</body>