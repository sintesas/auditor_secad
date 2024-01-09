@extends('partials.card')

@extends('layout')

@section('title')
    Informe Áreas x cooperación industrial
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($empresas) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('ver_informe_areas_x_cooperacion_industrial') }}
		@endsection()

		@section('card-content')       

		<div class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

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
                                                <th colspan="3" class="text-center"> <h3> INFORME DE ÁREAS CLAVES DE COOPERACIÓN INDUSTRIAL EN LA CADENA DE SUMINISTROS </h3></th>
                                            </tr>
                                            <tr>
                                                <th class="th-x" > Área </th>
                                                <th class="th-x" > SubÁreas </th>
                                                <th class="th-x" > Nombre Empresa </th>                          
                                            </tr>  
                                          @if(count($empresas) != 1)
                                          <?php $areaOld = 0;
                                                $subAreaOld = 0;
                                                $tmpCt = 1; ?> 
                                          @foreach($empresas as $item)     
                                             <?php $area = $item->areasEmpresa;
                                                   $subAreaTmp = $item->subAreasEmpresa;
                                             ?> 
                                             @if ((($area) != ($areaOld)) || (($areaOld) === 0))
                                              <tr class="line-bt"> 
                                                <th>{{$item->areasEmpresa}}</th> 
                                                @if ((($subAreaTmp) != ($subAreaOld)) || (($subAreaOld) === 0))
                                                    <th>{{$item->subAreasEmpresa}}</th> 
                                                @endif
                                                <th>{{$item->NombreEmpresa}}</th>                                                                         
                                              </tr>
                                              @else
                                              <tr>  
                                                  <th></th>               
                                                  @if ((($subAreaTmp) != ($subAreaOld)) || (($subAreaOld) === 0))
                                                    <th>{{$item->subAreasEmpresa}}</th> 
                                                  @else
                                                    <th></th>
                                                  @endif
                                                  <th>{{$item->NombreEmpresa}}</th>       
                                              </tr>
                                             @endif 
                                             <?php 
                                                $areaOld = $item->areasEmpresa;
                                                $subAreaOld = $item->subAreasEmpresa;
                                             ?> 
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
                                        <div class="col-xs-6">{{count($empresas)}}</div>   
                                    </div>      
                                        </div>
                                </div><!--end .row -->                                
                                           
                                               
                            </div><!--end .section-body -->                   
                        </section>
                    </div><!--end #content-->
                    <!-- END CONTENT -->
        
                    <a id="pdfAction" href="{{route('informeareasxcoopindustri.create') }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
                      
                </div>
            </div>
            <!-- END CONTENT -->



		{!! Form::close() !!}
        @endsection()

	@endsection()

@endsection()