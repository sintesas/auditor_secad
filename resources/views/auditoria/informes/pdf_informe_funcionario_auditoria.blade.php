@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Informe Auditorias por func.
		@endsection()

		@section('card-content')
        <div style="margin-bottom: 100px;" class="card-body floating-label">
        <!-- BEGIN BASE-->
        <div id="">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->
        <!-- BEGIN CONTENT-->
            <div id="">
                <section>

                 <?php $image_path = '/img/logoFac.png'; ?>

                    <div class="section-body">
                        <!--<div class="row encabezadoPlanInspeccion">
                            !-- Logo FARC --
                            <div class="col-xs-2 logoFac letraGris">
                               <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            !-- titulo Formulario --
                            <div class="col-xs-6 titulo letraGris">
                                <h3>PLAN DE MEJORAMIENTO</h3>
                            </div>
                            !-- Datos del formulario --
                            <div class="col-xs-4 datosFormulario letraGris">                            
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Version</li>
                                    <li id="versionEnc">6</li>
                                </ul>
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Implementación</li>
                                    <li id="implementacionEnc">12-JUN/2015</li>
                                </ul>
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Codigo</li>
                                    <li id="codigoEnc">IC-FR-7</li>
                                </ul>
                                <ul class="caracterisicasFormulario none-space">
                                    <li>Tipo de Documento</li>
                                    <li id="documentoEnc">Formato</li>
                                </ul>
                            </div>                      
                        </div>--><!--end .row -->

                        <div class="row encabezadoPlanInspeccion">
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac letraGris">
                                <?php $image_path = '/img/logoFac.png'; ?>
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-6 titulo letraGris">
                                <div class="col-xs-12 text-center" style="border-bottom:solid 1px;">
                                    <h4>FUERZA AÉREA COLOMBIANA</h4>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <h4>FORMATO INFORME DE INSPECCIÓN</h4>
                                </div>
                            </div>
                            <!-- Datos del formulario -->
                            <div class="col-xs-2 datosFormulario letraGris">
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>Código</li>
                                </ul>
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>Versión</li>
                                </ul>
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>Vigencia</li>
                                </ul>
                            </div>
                            <div class="col-xs-2 datosFormulario letraGris">
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>IS-DIINS-FR-006</li>
                                </ul>
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>02</li>
                                </ul>
                                <ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
                                    <li>31-ENE-2019</li>
                                </ul>
                            </div>
                        </div><!--end .row -->

                        <div class="col-xs-12">
                            <span>&nbsp;</span>
                        </div>

                        @if(count($dataFuncionarios) == 1)
						@foreach($dataFuncionarios as $item)
                        <!-- FECHA -->
								<div class="row">
									<!-- Div Fecha -->
									<div class="col-xs-offset-8 fecha">
										<div class="col-xs-6 gris" > FECHA</div>
										<div class="col-xs-6 negro"> {{$item->FechaAperAudit}}</div>
									</div>
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- SEGUNDO BLOQUE DE INFOMACION -->
								<!--<div class="row">
									!-- Primer cuadro de informacion --
									<div class="col-xs-6 filaFormulario">
										<div class="col-xs-12">
											<div class="col-xs-4 gris text-center">
												INFORME<br> (Marque con una X)
											</div>
											<div class="col-xs-4">
												<ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
													<li class="gris text-center"> PRELIMINAR R</li>
													<li id="fechaReunionApertura" > &nbsp; </li>
												</ul>
											</div>
											<div class="col-xs-4">
												<ul style="width: 320px; height: 26px;" class="caracterisicasFormulario none-space">
													<li class="gris text-center"> FINAL</li>
													<li id="horaReunionApertura" > &nbsp; </li>
												</ul>
											</div>
										</div>
									</div>
									<!--  -->
								<!--</div>--><!--end .row -->
								<div class="row">
									<div class="col-xs-6 filaFormulario">
										<div class="col-xs-4 text-center gris" style="padding: 15px 0px 0px 0px; height:80px;">
											<h5> INFORME<br> (Marque con una X) </h5>
										</div>
										<div class="col-xs-4 text-center gris" style="padding: 0px; border-left:solid 1px; border-right:solid 1px;">
											<div style="border-bottom:solid 1px;">
											<h5> PRELIMINAR R </h5>
											</div>
											<div style="height:40px;" style="background-color: #000000;">
											&nbsp;
											</div>
										</div>
										<div class="col-xs-4 text-center gris" style="padding: 0px; height:40px;">
											<div style="border-bottom:solid 1px">
											<h5> FINAL </h5>
											</div>
											<div style="height:40px;">
											&nbsp;
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- PRIMER BLOQUE DE INFOMACION -->
								<div class="row">
									<!-- Div Fecha -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" style="border-top:solid 1px"> UMA / PROCESO/ JEFATURA/ DEPENDENCIA/ ASPECTO INSPECCIONADO </div>
										<div class="col-xs-8 negro"> {{--$informeinspeccionR->NombreEmpresa--}}</div>
									</div>
									<!-- Div Fecha -->


									<!-- Div Fecha -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" > RESPONSABLE DE LA UMA/ PROCESO/<!-- JEFATURA/--> DEPENDENCIA / ASPECTO INSPECCIONADO:</div>
										<div class="col-xs-8">
											<div class="col-xs-4 negro">
												{{$item->NombreAuditoria}}
											</div>
											<!--<div class="col-xs-8">
												<div class="col-xs-6 gris"> Cargo: </div>
												<div class="col-xs-6 negro"> ..... </div>
											</div>-->

										</div>
									</div>
									<!-- Div Fecha -->

									<!-- Div Fecha -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" > OBJETIVO DE LA INSPECCIÓN:<br><br><br></div>
										<div class="col-xs-8 negro"> {{--$informeinspeccionR->Objeto--}}</div>
									</div>
									<!-- Div Fecha -->


									<!-- Div Fecha -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" > ALCANCE DE LA INSPECCIÓN:<br><br><br></div>
										<div class="col-xs-8 negro">{{--$informeinspeccionR->Alcance--}}</div>
									</div>
									<!-- Div Fecha -->


									<!-- Div Fecha -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" style="border-top:solid 1px"> CRITERIO DE LA INSPECCIÓN:</div>
										<div class="col-xs-8 negro">{{--$informeinspeccionR->MarcoLegal--}}</div>
									</div>
									<!-- Div Fecha -->

									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-4 gris firstColDivider" style="border-bottom:solid 1px"> NOMBRE INSPECTOR LÍDER/ RESPONSABLE DE INSPECCIÓN / INSPECTOR:</div>
										<div class="col-xs-8 negro"> {{--$informeinspeccionR->EquipoInspector--}}</div>
									</div>
									<!-- Div Fecha -->

									<div class="col-xs-12">
										<span>&nbsp;</span>
									</div>
									
								</div>	

								<!-- SEGUNDO BLOQUE DE INFOMACION -->
								<div class="row">
									<!-- Titulo -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-12 gris text-center" style="border-top:solid 1px">
											ACTIVIDADES DESARROLLADAS <br>
											<span style="font-weight: normal">
												(
												Se debe indicar de manera concreta las actividades ejecutadas durante la inspección.
												No incluir el detalle de las actividades y los soportes de las mismas ya que estas constituyen papeles de trabajo
												)
											</span>
										</div>
									</div>
									<!-- Primer cuadro de informacion -->
									<div class="col-xs-12 filaFormulario">
										&nbsp;
									</div>
									<!--  -->
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- SEGUNDO BLOQUE DE INFOMACION -->
								<div class="row">
									<!-- Titulo -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-12 gris text-center" style="border-top:solid 1px">
											ASPECTOS RELEVANTES <br>
											<span style="font-weight: normal">
												(
												Se debe incluir todo aquello susceptible de ser resaltado por implicar, utilidad, resultado, gestión,
												impacto y/o estrategia para el logro de los objtivos propuestos
												)
											</span>
										</div>
									</div>
									<!-- Primer cuadro de informacion -->
									<div class="col-xs-12 filaFormulario">
										&nbsp;
									</div>
										<!--  -->
								</div><!--end .row -->

								<div class="col-xs-12">
										<span>&nbsp;</span>
								</div>

								<!-- TERCER BLOQUE DE INFOMACION -->
									<div class="row">
										<div class="col-xs-12 text-left" >
											<span style="font-weight: bold">
											NO CONFORMIDAD NUEVA
											</span>
											<span style="font-weight: normal">
												(Se debe elaborar plan de mejoramiento)
											</span>
										</div>
										<div class="col-xs-12 filaFormulario table-fixed">
											<!--class="table-->
											<table class="table-x" id="table1" border="1" width="100%">
												<tr class="filaFormulario bold">
													<th class="borderL borderT borderB gris text-center"> No.</th>

													<th class="gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">&nbsp;&nbsp;CÓDIGO DE HALLAZGO&nbsp;&nbsp;</th>

													<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">DESCRIPCIÓN NO CONFORMIDAD </th>
												</tr>
												<tr class="line-b">
													<th>...</th>
													<th>&nbsp;&nbsp;...</th>
													<th>&nbsp;&nbsp;...</th>
												</tr>
											</table>
										</div>
									</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- TERCER BLOQUE DE INFOMACION -->
								<div class="row">
									<div class="col-xs-12 text-left" >
										<span style="font-weight: bold">
										EVIDENCIA QUE SE ADICIONA A UNA NO CONFORMIDAD VIGENTE
										</span>
										<span style="font-weight: normal">
											(
											Anteriormente evidenciado, con plan de mejoramiento en ejecución.
											Por lo tanto, no se debe elaborar plan de mejoramiento)
										</span>
									</div>
									<div class="col-xs-12 filaFormulario table-fixed">
										<!--class="table-->
										<table class="table-x" id="table1" border="1" width="100%">
											<tr class="filaFormulario bold">
												<th class="borderL borderT borderB gris text-center"> No.</th>

												<th class="gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">&nbsp;&nbsp;CÓDIGO DE HALLAZGO&nbsp;&nbsp;</th>

												<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">Indicar la inspección y la fecha en que se encontró anteriormente la no conformidad </th>

												<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">DESCRIPCIÓN NO CONFORMIDAD VIGENTE </th>

												<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">EVIDENCIA QUE SE ADICIONA A LA NO CONFORMIDAD </th>

											</tr>
											<tr class="line-b">
												<th>...</th>
												<th>&nbsp;&nbsp;...</th>
												<th>&nbsp;&nbsp;...</th>
												<th>&nbsp;&nbsp;...</th>
											</tr>
										</table>
									</div>
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- TERCER BLOQUE DE INFOMACION -->
								<div class="row">
									<div class="col-xs-12 text-left" >
									<span style="font-weight: bold">
									NO CONFORMIDAD REPETITIVA
									</span>
									<span style="font-weight: normal">
										(
										Anteriormente evidenciado, con plan de mejoramiento cerrado.
										Por lo tanto, se debe elaborar plan de mejoramiento)
									</span>
									</div>
									<div class="col-xs-12 filaFormulario table-fixed">
										<!--class="table-->
										<table class="table-x" id="table1" border="1" width="100%">
											<tr class="filaFormulario bold">
												<th class="borderL borderT borderB gris text-center"> No.</th>

												<th class="gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">&nbsp;&nbsp;CÓDIGO DE HALLAZGO&nbsp;&nbsp;</th>

												<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">DESCRIPCIÓN NO CONFORMIDAD </th>

												<th class="th-x gris text-center borderT borderB" style="padding: 15px 0px 15px 0px;">Indicar en que inspección, el número de hallazgo, la fecha del seguimiento y el cierre de la No Conformidad </th>

											</tr>
											<tr class="line-b">
												<th>...</th>
												<th>&nbsp;&nbsp;...</th>
												<th>&nbsp;&nbsp;...</th>
												<th>&nbsp;&nbsp;...</th>
											</tr>
										</table>
									</div>
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- SEGUNDO BLOQUE DE INFOMACION -->
								<div class="row">
									<!-- Titulo -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-12 gris text-center" style="border-top:solid 1px">
											OPORTUNIDADES DE MEJORA
										</div>
									</div>
									<!-- Primer cuadro de informacion -->
									<div class="col-xs-12 filaFormulario">
										&nbsp;
									</div>
									<!--  -->
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!-- SEGUNDO BLOQUE DE INFOMACION -->
								<div class="row">
									<!-- Titulo -->
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-12 gris text-center" style="border-top:solid 1px">
											CONCLUSIONES <br>
										<span style="font-weight: normal">
											(
											Concepto final derivado del análisis de la correspondencia existente entre los objetivos de la inspección,
											el alcance, los criterio y los hallazgos encontrados durante la inspección
											)
										</span>
										</div>
									</div>
									<!-- Primer cuadro de informacion -->
									<div class="col-xs-12 filaFormulario">
										&nbsp;
									</div>
									<!--  -->
								</div><!--end .row -->

								<div class="col-xs-12">
									<span>&nbsp;</span>
								</div>

								<!--  BLOQUE FIRMAS -->
								<!--<div class="row">
                                        <div class="col-xs-12 firmaFormulario" >
                                            <div class="col-xs-4" >
                                                <h5> <strong>Firma</strong> </h5>
                                                <p>Nombre Inspector Líder </p>
                                                <div class="col-xs-12" id="">
                                                    ...
                                                </div>
                                                <div class="col-xs-12">
                                                    Responsable Inspección:
                                                </div>

                                            </div>
                                            <div class="col-xs-4" >
                                                <h5> <strong>Firma</strong> </h5>
                                                <div class="col-xs-12" >
                                                    .....
                                                </div>
                                                <p class="col-xs-12">Nombre Inspector General FAC / Subdirector Delegado / Jefe ORICO: </p>
                                            </div>
                                            <div class="col-xs-4" >
                                                <h5> <strong>Firma</strong> </h5>
                                                <div class="col-xs-12" >
                                                    .....
                                                </div>
                                                <p class="col-xs-12">Nombre Responsable UMA / Proceso <!--/ jefatura--><!-- / Dependencia / Aspecto a Inspeccionar:</p>
                                    </div>
                                </div>
                        </div>--><!--end .row -->
								<div class="row">
									<div class="col-xs-12 filaFormulario">
										<div class="col-xs-6" style="border-right:solid 1px;">
											<h5> Firma </h5>
											<p>&nbsp;</p>
											<div class="col-xs-12" id="">
												&nbsp;
											</div>
											<p class="col-xs-12">
												Grado y Nombre Inspector / Inspector Líder / Responsable Inspección:
											</p>
										</div>
										<div class="col-xs-6">
											<h5> Firma </h5>
											<p>&nbsp;</p>
											<div class="col-xs-12" id="">
												&nbsp;
											</div>
											<p class="col-xs-12">
												Grado y Nombre Inspector General FAC / Jefe ORICO:
											</p>
										</div>
									</div>
								</div>
                        <!--<div class="row">
                                <div class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <p>Nombre Insector Líder </p>
                                        <div class="col-xs-12" id="">
                                            ...
                                        </div>-->
                                        <!--<div class="col-xs-12">
                                            Grado y Nombre Responsable Proceso:
                                        </div>                                        

                                    </div>
                                    
                                </div>
                        </div>--><!--end .row -->
                        
                    </div><!--end .section-body -->                   
                </section>
                
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

</body>