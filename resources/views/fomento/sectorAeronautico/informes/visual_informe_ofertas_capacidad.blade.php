@extends('partials.card')

@extends('layout')

@section('title')
  Informe Ofertas x Capacidad
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($ofertaCapacidad) !!}
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
                                <h3> INFORME DE EMPRESAS X CAPACIDAD </h3>
                            </div>                            
                            
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr class="line-b">
                                                                          
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
                                     @if(count($ofertaCapacidad) >= 1)
                                     @foreach($ofertaCapacidad as $ofertaCapacidadR)
                                    <tr class="line-b">  
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->NombreEmpresa}}</th>                             
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->Email}}</th>
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->Nit}}</th>                             
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->PaginaWeb}}</th>
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->Telefono}}</th>                             
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->Direccion}}</th>
                                        <th class="text-center lighterFont">{{$ofertaCapacidadR->RazonSocial}}</th>                                                                    
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

                          <br><br>
                          <a href="{{route('informeofertasporcapacidad.edit', $idofertacomercial) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

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