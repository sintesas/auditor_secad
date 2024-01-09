@extends('partials.card')

@extends('layout')

@section('title')
	Informe Total Personal
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($personal) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('informetotalpersonal') }}
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
                                <h4> Total Personal</h4>
                            </div>                            
                            <!-- FIN Div-->                       
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x ">
                                  <tr class="fondoAzulOscuro blanco">
                                        <th class="th-x"> Grado </th>
                                      
                                        <th class="th-x" > Apellido </th>
                                      
                                        <th class="th-x" > Nombre </th>
                                      
                                        <th class="th-x" > CC </th>
                                        
                                        <th class="th-x" > Cargo  </th>
                                  </tr>
                                   @if(count($personal) != 0)
                                   @foreach($personal as $personalR)                              
                                    <tr class="line-a">  
                                        <th class="">{{$personalR->Abreviatura}}</th>                                       
                                        <th class="">{{$personalR->Apellidos}}</th>
                                        <th class="">{{$personalR->Nombres}}</th>
                                        <th class="">{{$personalR->Cedula}}</th>                                        
                                        <th class="">{{$personalR->Cargo}}</th>
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

            <a href="{{route('informetotalpersonal.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-right"><span class="fa fa-download">    Descargar PDF</span></a>


        </div>
    </div>
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()