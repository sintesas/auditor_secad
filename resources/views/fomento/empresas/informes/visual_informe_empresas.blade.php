@extends('partials.card')

@extends('layout')

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
            {{ Breadcrumbs::render('ver_informe_total_empresas') }}
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
                                                <h4>Listado total de empresas </h4>
                                            </div>                        
                                    </div>                              
                            </div>
                            
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center gris57">
                              
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
                                    @if ($permiso->consultar == 1)                            
                                        <tr class="line-a">  
                                            <th class="">{{$empresasR->NombreEmpresa}}</th>                                       
                                            <th class="">{{$empresasR->Nit}}</th>
                                            <th class="">{{$empresasR->Ciudad}}</th>
                                            <th class="">{{$empresasR->Telefono}}</th>
                                        </tr>
                                    @endif
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
                            <br><br>
                        @if ($permiso->consultar == 1)
                        <a href="{{route('informetotalempresas.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>    
                        @endif
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->



		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()