@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
  

@section('title')
	Informe Resumen Cluster
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($cluster) !!}
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
                               <div class="total-card">
			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>INFORME AFILIADOS POR CLUSTER</h4>
                        </div>                        
                   </div>                              
               </div>
                            </div>                                         
                            
            </div><!--end .row -->                                          
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center">
                                <h5> <span>Nombre Cluster</span><span> Asociacion Colombiana de Productores Aeronauticos</span> </h5>
                            </div>                            
                            
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                    
                                      <th class="th-x text-center"> ID</th>
                                      <th class="th-x text-center" > Ciudad</th>  
                                      <th class="th-x text-center" > Region</th>
                                      <th class="th-x text-center" > Repres Legal</th>    
                                      <th class="th-x text-center" > Dirección</th>       
                                      <th class="th-x text-center" > Telefono </th>    
                                      <th class="th-x text-center" > Email</th>       
                                      <th class="th-x text-center" > Sigla </th>                                                                                      
                                      
                                  </tr>                                  
                                   @if(count($cluster) == 1)
                                   @foreach($cluster as $clusterR)                
                                    <tr class="line-b">                                                                    
                                        <th class="text-center">{{$clusterR->IdCluster}}</th>
                                        <th class="text-center">{{$clusterR->Ciudad}}</th>                             
                                        <th class="text-center">{{$clusterR->Region}}</th>
                                        <th class="text-center">{{$clusterR->RepresLegal}}</th>                             
                                        <th class="text-center">{{$clusterR->Direccion}}</th>
                                        <th class="text-center">{{$clusterR->Telefono}}</th>
                                        <th class="text-center">{{$clusterR->Email}}</th>
                                        <th class="text-center">{{$clusterR->Sigla}}</th>
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