@extends('partials.card')

@extends('layout')

@section('title')
	Informe Inspección IC FR 09
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{{-- {!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}} --}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('ver_informeinspeccionicfr09') }}
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
                    @if(count($seguimiento) == 1)
                    @foreach($seguimiento as $itemSeguimiento)
                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                                <!-- Logo FARC -->
                                <div class="col-xs-2 logoFac ">
                                    <img src="../img/logoFac.png"/>
                                </div>
                                <!-- titulo Formulario -->
                                <div class="col-xs-6 titulo ">
                                    <ul class="tituloFormularioFuerzaArea none-space">
                                        <li><h4>FUERZA AÉREA COLOMBIANA</h4></li>
                                    </ul>
                                    <ul class="none-space" >
                                        <li style="list-style: none;"><h4>FORMATO INFORME DE INSPECCIÓN Y SEGUIMIENTO DE ACCIONES CORRECTIVAS</h4></li>
                                    </ul>
                                </div>
                                <!-- Datos del formulario -->
                                <div class="col-xs-4 datosFormulario ">  
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Código:</li>
                                        <li id="codigoEnc">GH-JERLA-FR-009</li>
                                    </ul>                          
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Versión N°:</li>
                                        <li id="versionEnc">1</li>
                                    </ul>
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Vigencia:</li>
                                        <li id="implementacionEnc">28-08-2018</li>
                                    </ul>
                                </div>                      
                            </div><!--end .row -->
                        


                        <!-- FECHA -->
                        <div class="row">

                            <!-- Div fecha informe -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 firstColDivider" ><strong> FECHA DE INFORME </strong></div>
                                <div class="col-xs-8 negro">{{$itemSeguimiento->Fecha}} </div>   
                            </div>
                            <!-- Div fecha informe -->

                            <!-- Div Responsable informe -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 firstColDivider" ><strong> RESPONSABLE DEL INFORME </strong></div>
                                <div class="col-xs-8 negro">{{$itemSeguimiento->responsable}} </div>   
                            </div>
                            <!-- Div Responsable informe -->

                            <!-- Div Unidad Area Equipo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 firstColDivider" ><strong> UNIDAD: </strong> {{$itemSeguimiento->NombreEmpresa}}</div>
                                <div class="col-xs-6 negro firstColDivider"><strong> AREA O EQUIPO: </strong> {{$itemSeguimiento->NombreEmpresa}}</div>   
                            </div>
                            <!-- Div Unidad Area Equipo -->

                            <!-- Div  tabla -->
                            <div class="col-xs-12 filaFormulario text-center">
                                <div class="col-xs-1 firstColDivider" ><strong style="font-size:10px;"> N° <br><br><br><br> </strong></div>
                                <div class="col-xs-1 negro firstColDivider"><strong style="font-size:10px;"> CLASE <br> A,B,C <br><br><br></strong></div> 
                                <div class="col-xs-2 negro firstColDivider"><strong style="font-size:10px;"> DESCRIPCIÓN  DE LA CONDICIÓN REPORTADA <br> <br><br></strong></div>   
                                <div class="col-xs-2 negro firstColDivider"><strong style="font-size:10px;"> ACCIÓN CORRECTIVA RECOMENDADA <br><br><br></strong></div> 
                                <div class="col-xs-2 negro firstColDivider none-space text-center"><strong style="font-size:10px;"> COMPROMISO DE <br> EJECUCIÓN <br></strong>
                                    <div class="col-xs-6 firstColDivider firstColDivider-top none-space text-center"><strong style="font-size:10px;"> RESPONSABLE <br> EJECUCIÓN</strong></div>  
                                    <div class="col-xs-6 firstColDivider-top none-space text-center"><strong style="font-size:10px;"> FECHA EJECUCIÓN </strong></div>  
                                </div> 
                                <div class="col-xs-2 negro firstColDivider none-space text-center"><strong style="font-size:10px;"> SEGUIMIENTO <br> ACCIONES CORRECTIVAS </strong>
                                    <div class="col-xs-6 firstColDivider firstColDivider-top none-space text-center"><strong style="font-size:10px;"> SE <br> EJECUTÓ</strong></div>  
                                    <div class="col-xs-6 firstColDivider-top none-space text-center"><strong style="font-size:10px;"> NO SE <br> EJECUTÓ </strong></div>  
                                </div>  
                                <div class="col-xs-2 firstColDivider" ><strong style="font-size:10px;"> EFECTIVIDAD DE LAS <br> ACCIONES <br> CORRECTIVAS Y <br> OBSERVACIONES. <br> </strong></div> 
                            </div>
                            <?php $cont=1; ?>
                            @foreach ($hallazgo as $itemHallazgo)
                                <div class="col-xs-12 filaFormulario text-center">
                                    <div class="col-xs-1 firstColDivider" ><strong style="font-size:10px;">  {{$cont}} <br>
                                    <br><br><br><br><br><br><br><br><br><br><br>
                                    <br></strong></div>
                                    <div class="col-xs-1 negro firstColDivider"><strong style="font-size:10px;">{{$itemHallazgo->clase}} <br>
                                    <br><br><br><br><br><br><br><br><br><br><br>
                                    <br> </strong></div> 
                                    <div class="col-xs-2 negro firstColDivider"><strong style="font-size:10px;">{{$itemHallazgo->DescripcionEvidencia}} <br> <br>
                                    <br><br>
                                    <br>
                                    <br> </strong></div>   
                                    <div class="col-xs-2 negro firstColDivider"><strong style="font-size:10px;"> {{$itemHallazgo->Correccion}} <br> <br>
                                    <br><br><br><br><br><br><br><br>
                                    <br>
                                    <br> </strong></div> 
                                    <div class="col-xs-2 negro firstColDivider none-space text-center">
                                        <div class="col-xs-6 firstColDivider  none-space text-center"><strong style="font-size:10px;">{{$itemHallazgo->Nombres}} <br><br><br><br><br><br><br><br><br><br><br><br><br> </strong></div>  
                                        <div class="col-xs-6  none-space text-center"><strong style="font-size:10px;">{{$itemHallazgo->Plazo}} <br>
                                        <br><br><br><br><br><br><br><br><br><br>
                                        <br>
                                        <br></strong></div>  
                                    </div> 
                                    <div class="col-xs-2 negro firstColDivider none-space text-center">
                                        <div class="col-xs-6 firstColDivider  none-space text-center"><strong style="font-size:10px;">  <br><br><br><br><br><br><br><br><br><br><br><br><br></strong></div>  
                                        <div class="col-xs-6  none-space text-center"><strong style="font-size:10px;">X<br><br><br><br><br><br><br><br><br><br><br><br><br> </strong></div>  
                                    </div>  
                                    <div class="col-xs-2 firstColDivider" ><strong style="font-size:10px;">  <br><br><br><br> </strong></div> 
                                </div>
                                <?php $cont++; ?>
                            @endforeach
                            
                            <!-- Div  tabla -->
                            <!-- Div FIRMA EMISOR DEL INFORME -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 firstColDivider" ><strong> FIRMA EMISOR DEL INFORME: </strong></div>
                                <div class="col-xs-3 firstColDivider"><strong> CARGO: </strong></div>   
                                <div class="col-xs-3 firstColDivider"><strong> FECHA EMISIÓN: </strong></div>   
                            </div>
                            <!-- Div FIRMA EMISOR DEL INFORME -->

                            <!-- Div FIRMA DEL RESPONSABLE DE EJECUCIÓN: -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 firstColDivider" ><strong> FIRMA DEL RESPONSABLE DE EJECUCIÓN: </strong></div>
                                <div class="col-xs-3 firstColDivider"><strong> CARGO: </strong></div>   
                                <div class="col-xs-3 firstColDivider"><strong> FECHA EMISIÓN: </strong></div>   
                            </div>
                            <!-- Div FIRMA DEL RESPONSABLE DE EJECUCIÓN: -->

                            <!-- Div FIRMA DE CONFORMIDAD  -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 firstColDivider text-center" ><strong> FIRMA DE CONFORMIDAD UNA VEZ SE REALICEN LAS ACCIONES CORRECTIVAS</strong></div>
                            </div>
                            <!--end Div FIRMA DE CONFORMIDAD  -->

                            <!-- Div Emisor  -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 firstColDivider " ><strong> EMISOR DEL INFORME:</strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong> RESPONSABLE DE EJECUCIÓN:</strong></div>
                            </div>
                            <!--end Div Emisor  -->

                             <!-- Div Emisor  -->
                             <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 firstColDivider " ><strong> FECHA:</strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong> FECHA:</strong></div>
                            </div>
                            <!--end Div Emisor  -->

                            <!-- Div Clase  -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-2 firstColDivider " ><strong> Clase</strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong> Potencial de pérdidas de la condición o acto sub estándar identificado</strong></div>
                                <div class="col-xs-4 firstColDivider " ><strong> Grado de acción</strong></div>
                            </div>
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-2 firstColDivider " style="background:red;"><strong> A <br><br></strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong>Podría ocasionar la muerte, una incapacidad permanente o pérdida de alguna parte del cuerpo, o daños  de considerable valor.</strong></div>
                                <div class="col-xs-4 firstColDivider " ><strong> Inmediata</strong></div>
                            </div>
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-2 firstColDivider " style="background:yellow;"><strong> B <br><br></strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong>Podría ocasionar una lesión o enfermedad grave, con una incapacidad temporal, o daño a la propiedad menor al de la clase A.</strong></div>
                                <div class="col-xs-4 firstColDivider " ><strong> Pronta</strong></div>
                            </div>
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-2 firstColDivider " style="background:green;"><strong> C <br><br></strong></div>
                                <div class="col-xs-6 firstColDivider " ><strong>Podría ocasionar lesiones menores incapacitantes, enfermedad leve o daños menores.</strong></div>
                                <div class="col-xs-4 firstColDivider " ><strong> Posterior</strong></div>
                            </div>
                            <!--end Div Clase  -->
                          
                        </div><!--end .row -->   
                        
                    </div><!--end .section-body -->                   
                </section>
                    <a href="{{route('informeinspeccionicfr08.edit', $itemSeguimiento->IdAuditoria) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
                @endforeach
                @else
                  <div class="section-body">
                    <div class="text-center">
                        <h3>No hay datos para mostrar informe</h3>
                    </div>
                  </div>
                @endif
            </div><!--end #content-->
            <!-- END CONTENT -->		
        </div>
    </div>
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()