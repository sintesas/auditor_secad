@extends('partials.card_big_no_h')

@extends('partials.pdf')

<body style="background-color: white;">
	
@section('title')
Informe Empresas Por Sector
@endsection()

@section('content')

@section('card-content')
@section('card-title')
@endsection()

@section('card-content')
	@section('form-tag')

			{{-- {!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}
 --}}
		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('empresas_sector') }}
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
                  {{--   @if(count($informeempresasxsector) == 1)
                    @foreach($informeempresasxsector as $informeempresasxsectorR) --}}
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
                                        {{$sectoraeronautico->OfertaComercial}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                     <div class="col-xs-12">
                                        <div class="col-xs-4 azul175">
                                        Total:
                                        </div>
                                        <div class="col-xs-8">
                                        {{$count}}
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
                                      
                                        <th class="th-x" > Teléfono</th>
                                  </tr>
                                   @foreach($empresas as $empresa) 
                                    <tr class="line-b">  
                                        <th class="">{{$empresa->NombreEmpresa}}</th>                                        
                                        <th class="">{{$empresa->Nit}}</th>
                                        <th class="">{{$empresa->Ciudad}}</th>
                                        <th class="">{{$empresa->Telefono}}</th>
                                    </tr>
                                    @endforeach
                                  
                                </table>
                            </div>
                        </div><!--end .row -->
                        <div class="col-xs-12">
                            <div class="col-xs-4 azul175">
                                <p>Total Empresas: {{$count}}</p>
                            </div>
                            <div class="col-xs-4 azul175">
                                <p>% Porcentaje Total: 100%</p>
                            </div>
                            <div class="col-xs-4 azul175">
                                <p>Total Capacidades x Empresas: {{$count}}</p>
                            </div>


                        </div>                        
                    </div><!--end .section-body -->
                  {{--   @endforeach
                    @endif --}}
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