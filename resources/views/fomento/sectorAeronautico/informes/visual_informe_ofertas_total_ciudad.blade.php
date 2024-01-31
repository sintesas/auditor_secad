@extends('partials.card')

@extends('layout')

@section('title')
	Informe Ofertas Sector Aeronautico
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($ofertasPorCiudad) !!}
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
                       <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center">
                                <h3> INFORME DE EMPRESAS POR CIUDAD </h3>
                            </div>                            
                            
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed " style="overflow: scroll; overflow-y:hidden;  height:100%;
     width:1000px;">
                                <table class="col-xs-1 table-responsive" style="font-size: 8px; width:100%;">
                                  <tr>
                                      <th class="th-x text-center"> Ciudad</th>                                    
                                      <th class="th-x text-center"> Nombre Empresa</th>
                                      <th class="th-x text-center" > Correo Electronico</th>
                                      <th class="th-x text-center" > Nit</th>  
                                      <th class="th-x text-center" > Pagina Web</th>
                                      <th class="th-x text-center" > Telefono</th>                   
                                      <th class="th-x text-center" > Dirección</th>                   
                                      <th class="th-x text-center" > Razón Social</th>                   
                                      
                                      
                                  </tr>                                  
                                    {{-- <tr>
                                        <th colspan="7"> Ciudad: <p> </p></th>
                                    </tr> --}}
                                    @if ($permiso->consultar == 1)
                                     @if(count($ofertasPorCiudad) != 1)
                                     @foreach($ofertasPorCiudad as $ofertasPorCiudadR)
                                    <tr class="line-b">  
                                        <th class="text-center">{{$ofertasPorCiudadR->Ciudad}}</th>
                                        <th class="text-center">{{$ofertasPorCiudadR->NombreEmpresa}}</th>                             
                                        <th class="text-center">{{$ofertasPorCiudadR->Email}}</th>
                                        <th class="text-center">{{$ofertasPorCiudadR->Nit}}</th>                             
                                        <th class="text-center">{{$ofertasPorCiudadR->PaginaWeb}}</th>
                                        <th class="text-center">{{$ofertasPorCiudadR->Telefono}}</th>                             
                                        <th class="text-center">{{$ofertasPorCiudadR->Direccion}}</th>
                                        <th class="text-center">{{$ofertasPorCiudadR->RazonSocial}}</th>                                                                    
                                  </tr>                                  
                                    @endforeach
                                    @else
                                      <div class="section-body">
                                        <div class="text-center">
                                            <h3>No hay datos para mostrar informe</h3>
                                        </div>
                                      </div>
                                    @endif
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
            @if ($permiso->consultar == 1)
            <a href="{{route('informeofertasporciudad.create') }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>	
            @endif
        </div>
    </div>

        

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()