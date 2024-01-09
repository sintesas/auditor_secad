@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">


@section('title')
	Informe Ofertas Sector Aeronautico
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($cantidadesTotalCiudad) !!}
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
                                     <!--  BLOQUE DE INFOMACION -->
                        <div class="row">                                                       
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x" id="table1">
                                  
                                    <tr class="fondoAzulClaro">
                                        <th colspan="3" class="text-center"> <h3> OFERTA DE CAPACIDADES POR CIUDAD </h3></th>
                                    </tr>
                                    
                                    <tr>
                                        
                                        <th class="th-x" >  Ciudad Campo </th>
                                      
                                        <th class="th-x" > Oferta Comercial Campo </th>
                                      
                                        <th class="th-x" > Número de Duplicados </th>
                                                                              
                                    </tr>                                  
                                        
                                @if(count($cantidadesTotalCiudad) != 1)
                                  <?php $ciudadOld = 0;?> 
                                  @foreach($cantidadesTotalCiudad as $cantidadesTotalCiudadR)     
                                     <?php $ciudad = $cantidadesTotalCiudadR->Ciudad;?> 
                                     @if ((($ciudad) != ($ciudadOld)) || (($ciudadOld) === 0))
                                      <tr class="line-bt">  
                                          <th>{{$cantidadesTotalCiudadR->Ciudad}}</th> 
                                          <th></th> 
                                          <th></th>                                                                       
                                      </tr>
                                       <tr>      
                                          <th></th>                                      
                                          <th>{{$cantidadesTotalCiudadR->OfertaComercial}}</th>
                                          <th>{{$cantidadesTotalCiudadR->cnt}}</th>                                        
                                      </tr>
                                      @else
                                      <tr>  
                                          <th></th>                                          
                                          <th>{{$cantidadesTotalCiudadR->OfertaComercial}}</th>
                                          <th>{{$cantidadesTotalCiudadR->cnt}}</th>                                        
                                      </tr>
                                     @endif 
                                     <?php $ciudadOld = $cantidadesTotalCiudadR->Ciudad;?> 
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
                        
                       <!--  BLOQUE FIRMAS -->
                        <div class="row">                         
                                <div class="col-xs-12 firmaFormulario">
                                     <div class="col-xs-offset-8 fecha">
                                <div class="col-xs-6 " > Suma Total</div>
                                <div class="col-xs-6">{{$cantidadesTotalCiudadR->Total}}</div>   
                            </div>      
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