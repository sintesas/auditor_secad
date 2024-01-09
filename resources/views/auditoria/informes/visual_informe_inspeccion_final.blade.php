@extends('partials.card')
@extends('layout')

@section('title')
    Informe Plan Final de Inspección IC-FR-2
@endsection()

@section('content')

    @section('card-content')

        @section('form-tag')

        
        @endsection

        @section('card-title')
        
        <div>
        {{ Breadcrumbs::render('ver_planinspeccionfinal') }}    
        </div>

        @endsection()

        @section('card-content')

        {!! Form::model($dataAuditoria) !!}
        {{ csrf_field()}}

        <div class="card-body floating-label">
        <!-- BEGIN BASE-->
        <div id="">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
            <div id="contentReport">
                <section>
                    @foreach($dataAuditoria as $itemAuditoria)
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
                                <ul class=" none-space">
                                    <li style="list-style: none;"><h3>FORMATO PLAN DE INSPECCIÓN</h3></li>
                                </ul>
                            </div>
                            <!-- Datos del formulario -->
                            <div class="col-xs-4 datosFormulario letraGris">  
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Código:</li>
                                    <li id="codigoEnc">IS-DIINS-FR-002</li>
                                </ul>                          
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Versión N°:</li>
                                    <li id="versionEnc">01</li>
                                </ul>
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Vigencia:</li>
                                    <li id="implementacionEnc">11-SEP-2018</li>
                                </ul>
                            </div>                      
                        </div><!--end .row -->
                        <br>
                        <!-- FECHA -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-offset-8 fecha">
                                <div class="col-xs-6 gris" > FECHA</div>
                                <div class="col-xs-6 negro"> {{$itemAuditoria->FechaInicio}}</div>   
                            </div>                          
                        </div><!--end .row -->
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > UMA / PROCESO/ DEPENDENCIA/ ASPECTO A INSPECCIONAR </div>
                                <div class="col-xs-8 negro"> {{$itemAuditoria->NombreAuditoria}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > RESPONSABLE UMA/  DEPENDENCIA / ASPECTO A INSPECCIONAR: <br><br></div>
                                <div class="col-xs-8"> 
                                    <div class="col-xs-4 negro"> 
                                        {{$itemAuditoria->NombresResponsable}}                                    
                                    </div>   
                                    <div class="col-xs-8"> 
                                        <div class="col-xs-6 gris"> Cargo: </div>
                                        <div class="col-xs-6 negro"> {{$itemAuditoria->CargoRespo}}     </div>
                                    </div>   
                                
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > INSPECTOR GENERAL/ JEFE OFICINA/ REGIONAL INSPECCION Y CONTROL:</div>
                                <div class="col-xs-8 negro"> 
                                    @if($itemAuditoria->AuditorLiderEmpresa == '' || $itemAuditoria->AuditorLiderEmpresa == 'NULL')
                                        {{$itemAuditoria->AuditorLiderWS}}
                                    @else
                                        {{$itemAuditoria->AuditorLiderEmpresa}}
                                    @endif
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > OBJETIVO DE LA INSPECCION:<br><br><br></div>
                                <div class="col-xs-8 negro"> {{$itemAuditoria->Objeto}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > ALCANCE DE LA INSPECCIÓN:<br><br><br></div>
                                <div class="col-xs-8 negro">{{$itemAuditoria->Alcance}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > CRITERIO DE LA INSPECCION: <br>
                                <br><br><br>
                                <br></div>
                                <div class="col-xs-8 negro">
                                    <ul>
                                        @foreach($dataCriterios as $itemCriterios)
                                            <li>{{$itemCriterios->Norma}} </li>
                                        @endforeach
                                    </ul>
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > TIPO DE INSPECCIÓN: (Señale con una X el tipo de inspección) <br><br></div>
                                <div class="col-xs-8"> 
                                <div class="col-xs-6"> 
                                    <ul class="menuTipoInspeccion none-space">
                                        <li><input type="radio" name="opciones" value="alta" id="arDer" checked/> {{$itemAuditoria->TipoAuditoria}}  </li>
                                        <li><input type="radio" name="opciones" value="baja" id="arIzq" /> Por control UMA  </li>
                                    
                                    </ul>
                                </div>
                                <div class="col-xs-6"> 
                                    <ul class="menuTipoInspeccion none-space">
                                        <li><input type="radio" name="opciones" value="consulta" id="abDer" /> Por Aspectos Criticos</li>
                                        <li><input type="radio" name="opciones" value="alta" id="abIzq"/> Por Cumplimiento Normativo </li>
                                    
                                    </ul>
                                </div>                                                                       
                                
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > INSPECTOR LIDER/ RESPONSABLE DE INSPECCIÓN</div>
                                <div class="col-xs-8 negro"> 
                                    @if($itemAuditoria->InspectorLiderEmpresa == '' || $itemAuditoria->InspectorLiderEmpresa == 'NULL')
                                        {{$itemAuditoria->InspectorLiderWS}}, 
                                    @else
                                        {{$itemAuditoria->InspectorLiderEmpresa}}, 
                                    @endif
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > EQUIPO INSPECTOR: (se debe escribir la totalidad del equipo inspector y la dependencia o aspecto a inspeccionar )</div>
                                <div class="col-xs-8 negro">
                                    @foreach($dataEquipoInspector as $itemEquipoInspector)
                                        @if($itemEquipoInspector->EquipoInspEmpresa == '' || $itemEquipoInspector->EquipoInspEmpresa == 'NULL')
                                            {{$itemEquipoInspector->EquipoInspWS}}, 
                                        @else
                                            {{$itemEquipoInspector->EquipoInspEmpresa}}, 
                                        @endif
                                    @endforeach
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > EXPERTOS TECNICOS/ PROCESO:( se debe escribi la totalidad de los expertos técnicos y la dependencia o aspecto que verificara</div>
                                <div class="col-xs-8 negro">{{$itemAuditoria->ExpertosTecnicos}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > OBSERVADOR:(Se debe escribir la totalidad de los observadores que practicaran en la inspección)</div>
                                <div class="col-xs-8 negro">{{$itemAuditoria->Observaciones}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            

                        </div><!--end .row -->
                        
                        <!-- SEGUNDO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > ACTIVIDADES DE LA INSPECCION  </div>                                  
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 none-space r">
                                    <div class="col-xs-4 gris text-center">
                                        REUNION <br> APERTURA
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> FECHA</li>
                                            <li id="fechaReunionApertura" >{{$itemAuditoria->FechaInicio}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> HORA</li>
                                            <li id="horaReunionApertura" >{{$itemAuditoria->HoraIni}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6 none-space r">
                                    <div class="col-xs-4 gris text-center">
                                        REUNION <br>  DE CIERRE
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space text-center">
                                            <li class="gris text-center"> FECHA</li>
                                            <li id="fechaReunionCierre" >{{$itemAuditoria->FechaTermino}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> HORA</li>
                                            <li id="horaReunionCierre" >{{$itemAuditoria->HoraTermi}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div><!--end .row -->
                        
                        <!-- TERCER BLOQUE DE INFOMACION -->
                        <div class="row">                                                
                            <div class="col-xs-12 filaFormulario table-fixed gris">
                                <table class="table  table-x" id="table1" style="text-align:center">
                                  <tr class="borderL borderT borderB LetraBold" style="text-align:center">
                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> DEPENDENCIA / ASPECTO A INSPECCIONAR:</th>
                                      
                                        <th  class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> INSPECCIONADO ( Responsable de la Dependencia/ Aspecto a Inspeccionar) </th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> INSPECTOR / EXPERTO TECNICO</th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> FECHA INICIO</th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> HORA INICIO </th>

                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> FECHA CIERRE</th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> HORA FINAL </th>
                                                                              
                                  </tr>     
                                  @foreach($dataActividades as $itemActividades)                             
                                    <tr class="line-b" style="background:white;">  
                                        
                                            <th class=""> {{$itemActividades->Dependencia}}</th>
                                            <th class=""> {{$itemActividades->Inspeccionado}}</th>
                                            <th class=""> 
                                                @if($itemActividades->InspectorEmpresa == '' || $itemActividades->InspectorEmpresa == 'NULL')
                                                    {{$itemActividades->InspectorWs}}
                                                @else
                                                    {{$itemActividades->InspectorEmpresa}}
                                                @endif
                                            </th>
                                            <th class=""> {{$itemActividades->FechaInicio}}</th>
                                            <th class="">{{$itemActividades->HoraInicio}}</th>
                                            <th class="">{{$itemActividades->FechaCierre}}</th>
                                            <th class="">{{$itemActividades->HoraFinal}}</th>
                                        
                                  </tr>
                                  @endforeach
                                </table>
                            </div>
                               
                        </div><!--end .row -->
                         <!--  BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris " > OBSERVACIONES  </div>                                  
                            </div>  
                            <div class="col-xs-12 filaFormulario">
                                <textarea class="inputInforme" placeholder=" campo par observaciones" id="txtConclusiones">
                                    {{$itemAuditoria->Observaciones}}
                                </textarea>
                            </div>                            
                        </div><!--end .row -->
                        <br>
                        <!--  BLOQUE FIRMAS -->
                        <div class="row">                         
                            <div class="col-xs-12 firmaFormulario" >
                                <div class="col-xs-4" >
                                    <h5> Firma </h5>
                                    <div class="col-xs-12" id="" style="padding:21px">
                                        <br><br>
                                        @if($itemAuditoria->InspectorLiderEmpresa == '' || $itemAuditoria->InspectorLiderEmpresa == 'NULL')
                                            {{$itemAuditoria->InspectorLiderWS}}
                                        @else
                                            {{$itemAuditoria->InspectorLiderEmpresa}}
                                        @endif
                                    </div>
                                    <p>Nombre Insector Líder </p>
                                    <div class="col-xs-12">
                                        Responsable Inspección:
                                    </div>                                        

                                </div>
                                <div class="col-xs-4" >
                                    <h5> Firma </h5>
                                    <div class="col-xs-12" style="padding:21px">
                                    <br><br>
                                        @if($itemAuditoria->AuditorLiderEmpresa == '' || $itemAuditoria->AuditorLiderEmpresa == 'NULL')
                                            {{$itemAuditoria->AuditorLiderWS}}
                                        @else
                                            {{$itemAuditoria->AuditorLiderEmpresa}}
                                        @endif
                                    </div>
                                    <p class="col-xs-12">Nombre Inspector General FAC / Subdirector Delegado / Jefe ORICO: </p>                                                                         
                                </div>
                                <div class="col-xs-4" >
                                    <h5> Firma </h5>
                                    <div class="col-xs-12" style="padding:10px">
                                        <div class="col-xs-12" >
                                            <br><br>
                                            {{$itemAuditoria->NombresResponsable}}    
                                        </div>
                                        <p class="col-xs-12">Nombre Responsable UMA / Proceso / jefatura / Dependencia / Aspecto a Inspeccionar:</p>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .row -->
                        
                    </div><!--end .section-body -->
                </section>
                
                @endforeach
            </div><!--end #content-->
            <!-- END CONTENT -->                    
        </div>
    </div>
        
        <a href="{{route('informeplaninspeccionfinal.edit', $itemAuditoria->IdAuditoria) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
       

        {!! Form::close() !!}
        @endsection()

    @endsection()

@endsection()