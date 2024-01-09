@extends('partials.card')

@extends('layout')

@section('title')
	Informe Seguimiento Consolidado IC-FR-08
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{-- Informe Seguimiento Consolidado --}}
            {{ Breadcrumbs::render('ver_informeseguimientoconsolidado') }}
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
								<div class="col-xs-2 logoFac letraGris">
									<img src="../img/logoFac.png"/>
								</div>
								<!-- titulo Formulario -->
								<div class="col-xs-6 titulo letraGris">
									<ul class="tituloFormularioFuerzaArea none-space">
										<li><h4>FUERZA AÉREA COLOMBIANA</h4></li>
									</ul>
									<ul class=" none-space">
										<li style="list-style: none;"><h3>FORMATO ANALISIS DE CAUSAS</h3></li>
									</ul>
								</div>
								<!-- Datos del formulario -->
								<div class="col-xs-4 datosFormulario letraGris">  
									<ul class="caracterisicasFormulario none-space">
										<li>Código:</li>
										<li id="codigoEnc">IS-DIINS-FR-008</li>
									</ul>                          
									<ul class="caracterisicasFormulario none-space">
										<li>Versión N°:</li>
										<li id="versionEnc">1</li>
									</ul>
									<ul class="caracterisicasFormulario none-space">
										<li>Vigencia:</li>
										<li id="implementacionEnc">11-SEP-2018</li>
									</ul>
								</div>
							</div><!--end .row -->  
                        
                            <!-- Fecha-->
                            <div class="row" style="margin-top:10px;">
                                <div class="col-xs-offset-8 fecha">
                                    <div class="col-xs-6 gris" > FECHA</div>
                                    <div class="col-xs-6 negro"> {{$itemSeguimiento->FechaInicio}}</div>   
                                </div>          
                            </div>
                            <!--END Fecha-->

                            <!-- Primer BLOQUE DE INFOMACION -->
                            <div class="row">
                                <!-- Proceso-->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > UMA / PROCESO/ DEPENDENCIA/ ASPECTO INSPECCIONADO </div>
                                    <div class="col-xs-8 negro"> {{$itemSeguimiento->NombreEmpresa}}</div>   
                                </div>
                                <!--END Proceso-->
    
                                <!-- Div responsable -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > RESPONSABLE DE LA UMA/ PROCESO/ DEPENDENCIA / ASPECTO INSPECCIONADO: <br><br><br></div>
                                    <div class="col-xs-8"> 
                                        <div class="col-xs-12 negro"> 
                                            {{$itemSeguimiento->NombreAuditoria}}                                    
                                        </div> 									
                                    </div>   
                                </div>
                                <!--END Div responsable -->
                            </div>
                            <!-- end Primer BLOQUE DE INFOMACION -->

                            <br>

                            <!-- No conformidad Nueva-->
                            <div class="row">
                                <div class="col-xs-12 filaFormulario">
                                    <div>
                                        <div class="col-xs-1 gris firstColDivider firstColDivider-bottom text-center" style="padding-bottom:33px"> N° </div>
                                        <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center" style="padding-bottom:33px"> CÓDIGO DE HALLAZGO </div>
                                        <div class="col-xs-8 gris firstColDivider firstColDivider-bottom text-center" > DESCRIPCION NO CONFORMIDAD  <p>(En el caso de las Inspecciones de debe transcribir como aparece en el Informe de Inspección) </p></div>
                                    </div>
                                    <?php $cont=1; ?>
                                    @foreach ($hallazgo as $itemHallazgo)
                                        <div>
                                            <div class="col-xs-1  negro firstColDivider firstColDivider-bottom" > {{$cont}} <br><br><br></div>
                                            <div class="col-xs-3  negro firstColDivider firstColDivider-bottom" > {{$itemHallazgo->NoAnota}} <br><br><br> </div>
                                            <div class="col-xs-8  negro firstColDivider firstColDivider-bottom" style="padding: 12px;"> {{$itemHallazgo->DescripcionEvidencia}}
                                            <br>
                                            <br>  </div>
                                            <?php $cont++; ?>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- END No conformidad Nueva-->
                            <p>"Si realmente comprendemos el problema, la respuesta saldrá de él, porque la solución no está separada del problema". (Krishnamurti)</p>
                            
                            <!-- LLuvia de ideas-->
                            <div class="row">
                                    <div class="col-xs-12 filaFormulario">
                                        <div class="col-xs-2 firstColDivider gris ">
                                            <div class="col-xs-12">
                                                <span><img src="../secad/img/espina_pescado.png" alt="" width="60px" height="40px">y 5M</span><br>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 firstColDivider gris text-center">
                                            LLUVIA DE IDEAS <br>
                                            (posibles causas de la No Conformidad)
                                            
                                        </div>
                                        <div class="col-xs-2 firstColDivider gris text-center">
                                            PRIORIZACION <br><br>
                                        </div>
                                        <div class="col-xs-4 firstColDivider gris text-center">
                                            CAUSAS RAIZ <br><br>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 filaFormulario" >
                                        <div class="col-xs-2 firstColDivider gris " >
                                            <strong>METODO</strong>  
                                            (procedimientos, forma del trabajo, metodologías, instrucciones de trabajo, reglamentaciones, mediciones)
                                            
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 5)
                                                    {{$itemAcr->AccionTarea}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-2   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 5)
                                                    {{$itemAcr->Priorizacion}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 5)
                                                    {{$itemAcr->CausaRaiz}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 filaFormulario" >
                                        <div class="col-xs-2 firstColDivider gris " >
                                            MATERIAL/
                                            INFORMACIÓN (calidad, cantidad, desperdicios, inventario)
                                           
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 3)
                                                    {{$itemAcr->AccionTarea}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-2   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 3)
                                                    {{$itemAcr->Priorizacion}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 3)
                                                    {{$itemAcr->CausaRaiz}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 filaFormulario" >
                                        <div class="col-xs-2 firstColDivider gris " >
                                            MAQUINA/EQUIPO
                                            (obsolescencia, adecuada, mantenimiento, cantidad)

                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 2)
                                                    {{$itemAcr->AccionTarea}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-2   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 2)
                                                    {{$itemAcr->Priorizacion}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 2)
                                                    {{$itemAcr->CausaRaiz}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 filaFormulario" >
                                        <div class="col-xs-2 firstColDivider gris " >
                                            MANO DE OBRA/
                                            TALENTO HUMANO (capacitación, rotación, desempeño, experiencia, olvido, descuido, enfermedad, carácter, problemas personales, cultura, socialización)

                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 1)
                                                    {{$itemAcr->AccionTarea}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-2   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 1)
                                                    {{$itemAcr->Priorizacion}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-4   text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 1)
                                                    {{$itemAcr->CausaRaiz}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 filaFormulario" >
                                        <div class="col-xs-2 firstColDivider gris " >
                                            MEDIO AMBIENTE (nubosidad, visibilidad, ventilación, iluminación, limpieza, ruido)
                                        </div>
                                        <div class="col-xs-4  text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 4)
                                                    {{$itemAcr->AccionTarea}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-2  text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 4)
                                                    {{$itemAcr->Priorizacion}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-xs-4  text-center">
                                            @foreach ($acr as $itemAcr)
                                                @if ($itemAcr->Id5M == 4)
                                                    {{$itemAcr->CausaRaiz}} <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                            <!-- END LLuvia de ideas-->
                            <br>
                            <!-- SEXTO BLOQUE FIRMAS -->
                            <div class="row">                         
                                <div class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-7" >
                                        <h5> FIRMA </h5>
                                        <p style="padding:15px"></p>
                                        <p class="firstColDivider-top">Nombre Responsable Proceso que analiza la causa: </p>     
                                        <div class="col-xs-6" id="gradoNoCa">
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .row -->
                                 
                    </div><!--end .section-body -->                   
                </section>
                <a href="{{route('informeseguimientoconsolidado.edit', $itemSeguimiento->IdAuditoria) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
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