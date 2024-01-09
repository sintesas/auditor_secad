@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
  
@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($convenio) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
        Informe Resumen Cluster
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
                       <!-- PRIMER BLOQUE DE INFOMACION -->
                      <div class="row encabezadoPlanInspeccion">
                            
                            <!-- titulo Formulario -->
              <div class="col-xs-12 text-center">                                
                                <h3> Sección de Certificación Aeronautica de la Defensa</h3>
                                <h4> Informe de convenios Realizados </h4>
                            </div>                                         
                            
            </div><!--end .row -->                                          
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                                                                                                                
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                    
                                      <th class="th-x text-center"> ID</th>
                                      <th class="th-x text-center" > Nombre Convenio</th>  
                                      <th class="th-x text-center" > Entidad</th>
                                      <th class="th-x text-center" > Fecha Firma</th>   
                                      <th class="th-x text-center" > Fecha Vigencia</th>    
                                      <th class="th-x text-center" > Objeto</th>       
                                      <th class="th-x text-center" > Responsable </th>                                                                                
                                  </tr> 
                                  @if(count($convenio) != 0)
                                   @foreach($convenio as $convenioR)                
                                    <tr class="line-b">                                                                    
                                        <th class="text-center">{{$convenioR->IdConvenios}}</th>
                                        <th class="text-center">{{$convenioR->NombreConv}}</th>                             
                                        <th class="text-center">{{$convenioR->Entidad}}</th>
                                        <th class="text-center">{{$convenioR->Fecha}}</th>                             
                                        <th class="text-center">{{$convenioR->Vigencia}}</th>      
                                        <th class="text-center">{{$convenioR->Objeto}}</th>
                                        <th class="text-center">{{$convenioR->Responsable}}</th>                                     
                                  </tr>
                                    @endforeach
                                    @else
                                      <div class="section-body">
                                        <div class="text-center">
                                            <h3>No hay datos para mostrar informe</h3>
                                        </div>
                                      </div>
                                    @endif
                                    <!--<tr class="line-b" id="filaFinal">  
                                        <th class="">TOTAL(Capacidades x Empresas)=</th>               <th class="">...</th>
                                                                          
                                  </tr>-->
                                </table>
                            </div>
                         </div><!--end .row -->
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