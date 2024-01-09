@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
    


@section('title')
	Informe Empresas
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($empresas) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            Informe total Empresas
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
                       <div class="total-card">
                        <div class="row encabezadoPlanInspeccion">
                        <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                                            <div>
                                                <h4>Listado de empresas Colombianas Capacidad Aeronáutica</h4>
                                            </div>                        
                                    </div>                              
                            </div>
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center gris57">
                                <h4> Listado de empresas Colombianas</h4>
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
                                   @if(count($empresas) != 1)
                                   @foreach($empresas as $empresasR)                                 
                                    <tr class="line-a">  
                                        <th class="">{{$empresasR->NombreEmpresa}}</th>                                       
                                        <th class="">{{$empresasR->Nit}}</th>
                                        <th class="">{{$empresasR->Ciudad}}</th>
                                        <th class="">{{$empresasR->Telefono}}</th>
                                    </tr>
                                   @endforeach
                                   @else
                                  <div class="section-body">
                                    <div class="text-center">
                                        <h3>No hay datos para mostrar informe</h3>
                                    </div>
                                  </div>
                                  @endif
                                </table>
                            </div>
                        </div><!--end .row -->                                            
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->



		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()

</body>