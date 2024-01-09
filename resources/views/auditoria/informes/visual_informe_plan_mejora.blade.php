@extends('partials.card')

@extends('layout')

@section('title')
	Informe Plan de Mejora (Hallazgos)
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{-- Informe Plan de Mejora (Hallazgos) --}}
            {{ Breadcrumbs::render('ver_planmejora') }}
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
                                <!-- Logo FARC -->
                                <div class="col-xs-2 logoFac letraGris">
                                    <img src="../img/logoFac.png"/>
                                </div>
                                <!-- titulo Formulario -->
                                <div class="col-xs-6 titulo letraGris">
                                    <ul class="tituloFormularioFuerzaArea none-space">
                                        <li><h4>FUERZA AÉREA COLOMBIANA</h4></li>
                                    </ul>
                                    <ul class="none-space">
                                        <li style="list-style: none;"><h3>FORMATO PLAN DE MEJORAMIENTO</h3></li>
                                    </ul>
                                </div>
                                <!-- Datos del formulario -->
                                <div class="col-xs-4 datosFormulario letraGris">  
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Código:</li>
                                        <li id="codigoEnc">IS-DIINS-FR-006</li>
                                    </ul>                          
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Versión N°:</li>
                                        <li id="versionEnc">02</li>
                                    </ul>
                                    <ul class="caracterisicasFormulario none-space">
                                        <li>Vigencia:</li>
                                        <li id="implementacionEnc">31-ENE-2019</li>
                                    </ul>
                                </div>                      
                            </div>
                        </div><!--end .row -->  
                         @if(count($informemejora) == 1)
                         @foreach($informemejora as $informemejoraR)
                        <!-- FECHA -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-offset-8 fecha">
                                <div class="col-xs-6 gris" > FECHA</div>
                                <div class="col-xs-6 negro"> </div>   
                            </div>                          
                        </div><!--end .row -->
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris">
                                        PROCESO/UNIDAD:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="col-xs-6 negro"> {{$informemejoraR->NombreProceso}}
                                    </div>
                                    <div class="col-xs-6 negro"> {{$informemejoraR->Codigo}}
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris">
                                        RESPONSABLE DEL PROCESO:
                                    </div>
                                </div>
                                <div class="col-xs-8 negro">
                                    <div class="col-xs-12 ">
                                        {{$informemejoraR->ResponsableProceso}}
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->                          
                        </div><!--end .row -->
                        
                        <!-- SEGUNDO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > TIPO DE ACCIÓN: (Marque con una X el tipo de acción y numerela para establecer un control)  </div>         
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4">
                                        <div class="col-xs-8">
                                            ACCIÓN CORRECTIVA
                                        </div>
                                        <div class="col-xs-4">
                                          @if (($informemejoraR->IdTipoAnotacion) == 2)
                                           X                                           
                                           @endif
                                        </div>                  
                                    </div>
                                    
                                    <div class="col-xs-4">
                                        <div class="col-xs-8">
                                            ACCIÓN PREVENTIVA
                                        </div>
                                        <div class="col-xs-4">
                                           @if (($informemejoraR->IdTipoAnotacion)== 3)
                                           X
                                           @endif
                                        </div>                  
                                    </div>
                                    
                                    <div class="col-xs-4">
                                        <div class="col-xs-4">
                                            NO:
                                        </div>
                                        <div class="col-xs-8">
                                            
                                        </div>
                                    </div>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!-- TERCER BLOQUE DE INFOMACION -->
                        <div class="row">                                 
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > FUENTE (Marque con una X el origen de la No Conformidad Real o Poténcial )  </div>         
                            </div>                            
                                
                                <div class="col-xs-12 filaFormulario">
                                    <!-- FILA 1 -->
                                    <ul class="menu-tipoAcc">
                                            <li class="br-solid">
                                                <div class="col-xs-2 br-solid">
                                                    <span></span><br><br>
                                                </div>
                                                <div class="col-xs-10 br-solid">
                                                    <div class="col-xs-4">
                                                        INSPECCIÓN:
                                                    </div>    
                                                    <div class="col-xs-8">
                                                        
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="br-solid">
                                                <div class="col-xs-2 br-solid">
                                                    <br><br>
                                                </div>
                                                <div class="col-xs-8">
                                                    QUEJAS, RECLAMACIONES, SUGERENCIAS
                                                </div>
                                            </li>
                                            
                                            <li class="br-solid">
                                                <div class="col-xs-2 br-solid">
                                                    <br><br>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div class="col-xs-4">
                                                        OTROS:
                                                    </div>    
                                                    <div class="col-xs-8">
                                                        
                                                    </div>
                                                </div>    
                                            </li>
                                    
                                        </ul>                        
                                    <!-- FILA 2 -->
                                    <ul class="menu-tipoAcc">
                                        <li class="br-solid">
                                            <div class="col-xs-2 br-solid">
                                                <br><br>
                                            </div>
                                            <div class="col-xs-8">
                                                REVISIÓN DEL PROCESO
                                            </div>
                                        </li>
                                        
                                        <li class="br-solid">
                                            <div class="col-xs-2 br-solid" >
                                                <br><br>
                                            </div>
                                            <div class="col-xs-8">
                                                ANALISIS DE DATOS INDICADOREES
                                            </div>     
                                        </li>
                                        
                                        <li class="br-solid">             
                                            <div class="col-xs-8">
                                                
                                            </div>                  
                                        </li>                             
                                    </ul>        
                                    <!-- FILA 3 -->
                                    <ul class="menu-tipoAcc">
                                        <li class="br-solid">
                                            <div class="col-xs-2 br-solid">
                                                <br><br>
                                            </div>
                                            <div class="col-xs-8">
                                                REVISION POR LA DIRECCIÓN
                                            </div>                  
                                        </li>
                                        
                                        <li class="br-solid">
                                            <div class="col-xs-2 br-solid">
                                                <br><br>
                                            </div>
                                            <div class="col-xs-8">
                                                PRODUCTOS SERVICIOS NO CONFORME
                                            </div>                  
                                        </li>
                                        
                                        
                                        <li class="">                                            
                                            <div class="col-xs-8">
                                                
                                            </div>                      
                                        </li>
                                    </ul>                                     
                            </div><!--end .row -->
                               
                        </div><!--end .row -->
                        
                        <!--  BLOQUE DE INFOMACION -->
                        <div class="row">                                                       
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table table-x" id="table1">                 
                                    <tr class="filaFormulario bold">
                                        <th class="borderL borderT borderB gris text-center"> No</th>

                                        <th class="gris text-center borderT borderB"> CODIGO DE HALLAZGO (Aplica solo para Inspecciones) </th>
                                      
                                        <th class="th-x gris text-center borderT borderB" >DESCRICION NO CONFORMIDAD<br> (Se debe anexar el formato de Correcion IC_FR_14) </th>  
                                    </tr>                                  
                                    <tr class="line-b">  
                                        <th>{{$informemejoraR->IdAuditoria}}</th>
                                        <th>{{$informemejoraR->NoAnota}}</th>
                                        <th>{{$informemejoraR->DescripcionEvidencia}}</th>                                        
                                  </tr>
                                </table>
                            </div>
                        </div><!--end .row -->
                        <!--  BLOQUE DE INFOMACION -->
                        <br>
                        <div class="row">                                                       
                            <div class="col-xs-12  table-fixed">
                                <table class="table  table-x" id="table1">
                                  
                                    <tr>
                                        <th colspan="7" class="gris text-center borderL borderT borderB"> ACCIONES A EJECUTAR </th>
                                    </tr>
                                    
                                    <tr>
                                        <th class="th-x  gris text-center borderL borderB"> No</th>
                                      
                                        <th class="th-x gris text-center borderB"> DEFINICION DE CAUSAS <br>(Adjunte formato de Analisis de Causas IC-FR-008) </th>
                                      
                                        <th class="th-x gris text-center borderB" >ACCIÓN / ACTIVIDAD / TAREA </th>
                                      
                                        <th class="th-x gris text-center borderB" >  ENTREGABLE </th>

                                        <th class="th-x gris text-center borderB" > CANTIDAD  ENTREGABLE </th>
                                      
                                        <th class="th-x gris text-center borderB" > FECHA INICIO Y TERMINO </th>
                                      
                                        <th class="th-x gris text-center borderB" > RESPONSABLE <br> (Cargo responsable de Ejecuar la tarea) </th>
                                                                              
                                    </tr>        

                                    @foreach($tareas as $key => $tarea)
                                        <tr class="line-b" >  
                                            <th>{{$key}}</th>
                                            <th>{{$tarea->CausaRaiz}}</th>
                                            <th>{{$tarea->AccionTarea}}</th>
                                            <th>{{$tarea->Entregable}}</th>
                                            <th>{{$tarea->CantidadEntregable}}</th>
                                            <th>{{$tarea->FechaInicio}} - {{$tarea->FechaFinal}}</th>
                                            <th>{{$tarea->Name}}</th>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div><!--end .row -->
                        
                       <!--  BLOQUE FIRMAS -->
                        <div class="row">                         
                                <div class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <div class="col-xs-12 espacioFirma">
                                            
                                        </div>
                                        <div class="col-xs-12 infoFirma">
                                            Grado y Nombre Responsable Proceso:
                                        </div>                                        

                                    </div>
                                    
                                </div>
                        </div><!--end .row -->
                        
                    </div><!--end .section-body -->                   
                </section>
                


                    <a href="{{route('informeplanmejora.edit', $idanotacion) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>


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