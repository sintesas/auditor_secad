@extends('partials.card')

@extends('partials.pdf2')

<body style="background-color: white;">


    @section('content')

    @section('card-content')

    @section('form-tag')

    @endsection

    @section('card-title')
        Informe Inspección IC FR 03
    @endsection()

    @section('card-content')

        <div class="card-body floating-label">
            <!-- BEGIN BASE-->
            <div id="">

                <!-- BEGIN OFFCANVAS LEFT -->
                <div class="offcanvas">
                </div>
                <!--end .offcanvas-->
                <!-- END OFFCANVAS LEFT -->

                <!-- BEGIN CONTENT-->
                <div id="">
                    <section>
                        @if(count($informeinspeccionicfr03) == 1)
                            @foreach($informeinspeccionicfr03 as $informeinspeccionicfr03R)
                                <div class="section-body">

                                    <?php $image_path = '/img/logoFac.png'; ?>

                                    <div class="row encabezadoPlanInspeccion col-xs-12">
                                        <!-- Logo FARC -->
                                        <div class="col-xs-2 logoFac">
                                            <img src="{{ public_path() . $image_path }}" />
                                        </div>
                                        <!-- titulo Formulario -->
                                        <div class="col-xs-6 titulo letraGris">
                                            <ul class="tituloFormularioFuerzaArea none-space">
                                                <li>
                                                    <h4>FUERZA AÉREA COLOMBIANA</h4>
                                                </li>
                                            </ul>
                                            <ul class=" none-space">
                                                <li style="list-style: none;">
                                                    <h3>FORMATO INFORME DE INSPECCIÓN</h3>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Datos del formulario -->
                                        <div class="col-xs-2 datosFormulario letraGris">
                                            <ul class="caracterisicasFormulario none-space">
                                                <li>Código:</li>
                                            </ul>
                                            <ul class="caracterisicasFormulario none-space">
                                                <li>Versión N°:</li>
                                            </ul>
                                            <ul class="caracterisicasFormulario none-space">
                                                <li>Vigencia:</li>
                                            </ul>
                                        </div>
                                        <!-- Datos del formulario -->
                                        <div class="col-xs-2 datosFormulario letraGris">
                                            <ul class="caracterisicasFormulario none-space">
                                                <li id="codigoEnc">IS-DIINS-FR-003</li>
                                            </ul>
                                            <ul class="caracterisicasFormulario none-space">
                                                <li id="versionEnc">1</li>
                                            </ul>
                                            <ul class="caracterisicasFormulario none-space">
                                                <li id="implementacionEnc">11-SEP-2018</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--end .row -->
                                    <br>

                                    <!-- row -->
                                    <div class="row">
                                        <!-- Tipo de Reporte  -->
                                        <div class="col-xs-4 fecha">
                                            <table style="width:100%; height:10px"
                                                class="table table-bordered table-tipoReporte">
                                                <tr style="height:10px">
                                                    <th style="height:10px" class="gris"> INFORME </th>
                                                    <th style="height:10px" class="gris">PRELIMINAR</th>
                                                    <th style="height:10px" class="gris">FINAL</th>
                                                </tr>
                                                <tr>
                                                    <th class="gris">
                                                        <p style="fon-size:12px">(Marque con una x) </p>
                                                    </th>
                                                    <td>
                                                        @if($informeinspeccionicfr03R->NombreTipo == 'Preliminar')
                                                            <p class="text-center">X</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($informeinspeccionicfr03R->NombreTipo == 'Final')
                                                            <p class="text-center">X</p>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Div Fecha -->
                                        <div class="col-xs-offset-4 col-xs-4 fecha">
                                            <div class="col-xs-6 gris"> FECHA</div>
                                            <div class="col-xs-6"> {{ $informeinspeccionicfr03R->FechaAperAudit }}</div>
                                        </div>
                                    </div>
                                    <!--end .row -->

                                    <!-- PRIMER BLOQUE DE INFOMACION -->
                                    <div class="row">
                                        <!-- Proceso-->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider"> UMA / PROCESO/ DEPENDENCIA/ ASPECTO
                                                INSPECCIONADO </div>
                                            <div class="col-xs-8 negro"> {{ $informeinspeccionicfr03R->NombreEmpresa }}</div>
                                        </div>
                                        <!--END Proceso-->

                                        <!-- Div responsable -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider"> RESPONSABLE DE LA UMA/ PROCESO/
                                                DEPENDENCIA / ASPECTO INSPECCIONADO:</div>
                                            <div class="col-xs-8">
                                                <div class="col-xs-12 negro">
                                                    {{ $informeinspeccionicfr03R->Responsable_UM }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Div responsable -->

                                        <!-- Div Objetivo -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider"> OBJETIVO DE LA
                                                INSPECCION:<br><br><br><br>
                                            </div>
                                            <div class="col-xs-8 negro"> {{ $informeinspeccionicfr03R->Objeto }}</div>
                                        </div>
                                        <!-- Div Objetivo -->

                                        <!-- Div Alcance -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider"> ALCANCE DE LA
                                                INSPECCIÓN:<br><br><br><br><br>
                                            </div>
                                            <div class="col-xs-8 negro">{{ $informeinspeccionicfr03R->Alcance }}</div>
                                        </div>
                                        <!-- Div Alcance -->

                                        <!-- Div Criterio -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider"> CRITERIO DE LA INSPECCION: <br><br>
                                            </div>
                                            <div class="col-xs-8 negro">{{ $informeinspeccionicfr03R->Criterios }}</div>
                                        </div>
                                        <!-- Div Criterio -->

                                        <!-- Div Fecha -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-4 gris firstColDivider firstColDivider-bottom"> NOMBRE INSPECTOR
                                                LÍDER / RESPONSABLE DE INSPECCIÓN / INSPECTOR: <br><br>
                                            </div>
                                            <div class="col-xs-8 negro">{{ $informeinspeccionicfr03R->Name }}</div>
                                        </div>
                                        <!-- Div Fecha -->

                                    </div>
                                    <!--end .row -->
                                    <br>
                                    <!-- SEGUNDO BLOQUE DE INFOMACION -->
                                    <div class="row">
                                        <!-- Titulo -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-12 gris text-center firstColDivider"> ACTIVIDADES A DESARROLLAR
                                                <br>
                                                <p class="col-xs-12 gris text-center">(Se debe indicar de manera concreta las
                                                    actividades ejecutadas durante la Inspección. No incluir el detalle de las
                                                    actividades y los soportes de las mismas ya que estas constituyen papeles de
                                                    trabajo)</p>
                                            </div>
                                        </div>
                                        <!-- Primer cuadro de informacion -->
                                        <div class="col-xs-12 filaFormulario">
                                            <p style="padding:10px">{{ $informeinspeccionicfr03R->ActividaDesarr }}</p>
                                        </div>
                                    </div>
                                    <!--end .row -->
                                    <br>
                                    <!-- TERCER BLOQUE DE INFOMACION -->
                                    <div class="row">
                                        <!-- Titulo -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-12 gris text-center"> ASPECTOS RELEVANTES <br>
                                                <p class="col-xs-12 gris text-center">(Se debe incluir todo aquello susceptible
                                                    de ser resaltado por implicar utilidad, resultado, gestión, impacto y/o
                                                    estrategia para el logro de los objetivos propuestos)</p>
                                            </div>
                                        </div>
                                        <!-- Primer cuadro de informacion -->
                                        <div class="col-xs-12 filaFormulario">
                                            <p style="padding:10px">{{ $informeinspeccionicfr03R->AspectosRelev }}</p>
                                        </div>
                                    </div>
                                    <!--end .row -->

                                    <!-- No conformidad Nueva-->
                                    <div class="row">
                                        <p style="font-size:12px"> <strong style="font-size: 15px"> NO CONFORMIDAD NUEVA
                                            </strong>(Se debe elaborar plan de mejoramiento)</p>
                                        <div class="col-xs-12 filaFormulario">
                                            <div>
                                                <div class="col-xs-2 gris firstColDivider firstColDivider-bottom text-center">
                                                    N° </div>
                                                <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center">
                                                    CÓDIGO DE HALLAZGO </div>
                                                <div class="col-xs-7 gris firstColDivider firstColDivider-bottom text-center">
                                                    DESCRIPCION NO CONFORMIDAD </div>
                                            </div>
                                            <div>
                                                <?php $cont = 1; ?>
                                                @foreach($hallazgo as $itemHallazgo)
                                                    @if($itemHallazgo->IdTipoAnotacion == 1 && $itemHallazgo->IdEnUnaAnotacion == 1)
                                                        <div class="col-xs-2  negro firstColDivider firstColDivider-bottom">
                                                            {{ $cont }}</div>
                                                        <div class="col-xs-3  negro firstColDivider firstColDivider-bottom">
                                                            {{ $itemHallazgo->NoAnota }}</div>
                                                        <div class="col-xs-7  negro firstColDivider firstColDivider-bottom">
                                                            {{ $itemHallazgo->DescripcionEvidencia }} </div>
                                                        <?php $cont++; ?>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END No conformidad Nueva-->

                                    <!-- No conformidad Repetida-->
                                    <div class="row" style="margin-top: 20px">
                                        <p style="font-size:12px"> <strong style="font-size: 15px"> NO CONFORMIDAD REPETITIVA
                                            </strong>(Anteriormente evidenciado, con plan de mejoramiento cerrado. Por lo tanto,
                                            se debe elaborar plan de mejoramiento)</p>
                                        <div class="col-xs-12 filaFormulario">
                                            <div>
                                                <div class="col-xs-2 gris firstColDivider firstColDivider-bottom text-center">N° </div>
                                                <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center">CÓDIGO DE HALLAZGO </div>
                                                <div class="col-xs-7 gris firstColDivider firstColDivider-bottom text-center">DESCRIPCION NO CONFORMIDAD </div>
                                            </div>
                                            <div>
                                                <?php $cont = 1; ?>
                                                @foreach($hallazgo as $itemHallazgo)
                                                    @if($itemHallazgo->IdTipoAnotacion == 1 && $itemHallazgo->IdEnUnaAnotacion == 2)
                                                        <div class="col-xs-2  negro firstColDivider firstColDivider-bottom">{{ $cont }} </div>
                                                        <div class="col-xs-3  negro firstColDivider firstColDivider-bottom"> {{ $itemHallazgo->NoAnota }} </div>
                                                        <div class="col-xs-7  negro firstColDivider firstColDivider-bottom">
                                                            {{ $itemHallazgo->DescripcionEvidencia }} </div>
                                                        <?php $cont++; ?>
    
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END No conformidad Repetida-->


                                    <!-- Evidencia-->
                                    <div class="row">
                                        <p style="font-size:12px"> <strong style="font-size: 15px"> EVIDENCIA QUE SE ADICIONA A UNA NO CONFORMIDAD
                                            </strong>VIGENTE<strong></strong> (Anteriormente evidenciado con plan de mejoramiento en ejecución. Por lo
                                            tanto, no se debe elaborar plan de mejoramiento)</p>
                                        <div class="col-xs-12 filaFormulario">
                                            <div>
                                                <div class="col-xs-1 gris firstColDivider firstColDivider-bottom text-center header-table"> N°
                                                    <br><br><br><br></div>
                                                <div class="col-xs-2 gris firstColDivider firstColDivider-bottom text-center header-table"> CÓDIGO DE
                                                    HALLAZGO <br><br><br></div>
                                                <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center header-table"
                                                    style="font-size: 10px; overflow: hidden;"> Indicar la Inspección y la fecha en la que se encontró
                                                    anteriormente la No Conformidad <br><br><br></div>
                                                <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center header-table"> DESCRIPCIÓN NO
                                                    CONFORMIDAD VIGENTE <br><br><br></div>
                                                <div class="col-xs-3 gris firstColDivider firstColDivider-bottom text-center header-table"> EVIDENCIA QUE SE
                                                    ADICIONA A LA NO CONFORMIDAD<br><br><br></div>
                                            </div>
                                            <div>
                                                <?php $cont = 1; ?>
                                                @foreach($hallazgo as $itemHallazgo)
                                                    @if($itemHallazgo->IdEnUnaAnotacion == 3)
                                                        <div class="col-xs-1  negro firstColDivider firstColDivider-bottom row-table" style="padding: 10px;">
                                                            {{ $cont }}</div>
                                                        <div class="col-xs-2  negro firstColDivider firstColDivider-bottom row-table"
                                                            style="padding: 10px;font-size: 10px;text-align: center;">{{ $itemHallazgo->NoAnota }}</div>
                                                        <div class="col-xs-3  negro firstColDivider firstColDivider-bottom row-table" style="padding: 10px;">...
                                                        </div>
                                                        <div class="col-xs-3  negro firstColDivider firstColDivider-bottom row-table" style="padding: 10px;">...
                                                        </div>
                                                        <div class="col-xs-3  negro firstColDivider firstColDivider-bottom row-table" style="padding: 10px;">
                                                            {{ $itemHallazgo->DescripcionEvidencia }}</div>
                                                        <?php $cont++; ?>

                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Evidencia-->
                                

                                    <br>
                                    <!-- CUARTO BLOQUE DE INFOMACION -->
                                    <div class="row">

                                        <!-- Primer cuadro de informacion -->
                                        <!-- Titulo -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-12 gris text-center"> OPORTUNIDADES DE MEJORAS: </div>
                                        </div>
                                        <!-- Primer cuadro de informacion -->
                                        <div class="col-xs-12 filaFormulario">
                                            <p style="padding:10px">{{ $informeinspeccionicfr03R->OportuMejora }}</p>
                                        </div>
                                    </div>
                                    <!--end .row -->

                                    <br>
                                    <div class="row">
                                        <!-- total-->
                                        <div class="col-xs-10 filaFormulario" style="margin-left: 10%">
                                            <div class="col-xs-8 gris firstColDivider "> Total Aspectos Relevantes:</div>
                                            <div class="col-xs-1 negro "> 0 </div>
                                            <div class="col-xs-8 gris firstColDivider "> Total No Conformidades Nuevas:</div>
                                            <div class="col-xs-1 negro "> {{ $total[0]->totalNoConformidadNueva }} </div>
                                            <div class="col-xs-8 gris firstColDivider "> Total No Conformidades Repetitivas:</div>
                                            <div class="col-xs-1 negro "> {{ $total[0]->totalNoConformidadRepetida }} </div>
                                            <div class="col-xs-8 gris firstColDivider "> Total No Conformidades que se Adicionan a una No Conformidad:</div>
                                            <div class="col-xs-1 negro "> {{ $total[0]->totalNoConformidadAdicionada }} </div>
                                            <div class="col-xs-8 gris firstColDivider "> Total Oportunidades de Mejora:</div>
                                            <div class="col-xs-1 negro "> {{ $total[0]->totalOptMejora }} </div>
                                        </div>
                                        <!--END total-->
                                    </div>
                                    <br>

                                    <!-- QUINTO BLOQUE DE INFOMACION -->
                                    <div class="row">
                                        <!-- Titulo -->
                                        <div class="col-xs-12 filaFormulario">
                                            <div class="col-xs-12 gris text-center"> CONCLUSIONES: <br>
                                                <p>(Concepto final derivado del análisis de la correspondencia existente entre los objetivos de la
                                                    inspección, el alcance, los criterios y los hallazgos encontrados durante la Inspección)</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 filaFormulario">
                                            <p style="padding:10px">{{ $informeinspeccionicfr03R->Conclusiones }}</p>
                                        </div>
                                    </div>
                                    <!--end .row -->

                                    <br>


                                    <!-- SEXTO BLOQUE FIRMAS -->
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-xs-12 firmaFormulario">
                                            <div class="col-xs-6">
                                                <h5> Firma </h5>
                                                <p style="padding:15px"></p>
                                                <p>Grado y Nombre Inspector / Inspector Líder / Responsable Inspección </p>
                                                <div class="col-xs-12" id="gradoNoCa">{{$informeinspeccionicfr03R->Responsable_UM}}</div>
                                            </div>
                                            <div class="col-xs-5" style="margin-left:30px">
                                                <h5> Firma </h5>
                                                <p style="padding:15px"></p>
                                                <p>Grado y Nombre Inspector General FAC / Jefe ORICO </p>
                                                <div class="col-xs-12" id="gradoNoCa"><br></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end .row -->
                                </div>
                                <!--end .section-body -->
                        </section>
                        @endforeach
                    @else
                        <div class="section-body">
                            <div class="text-center">
                                <h3>No hay datos para mostrar informe</h3>
                            </div>
                        </div>
                    @endif
                </div>
                <!--end #content-->
                <!-- END CONTENT -->
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script>
                    window.onload = function() {
                        //document.getElementsByClassName('style-primary')[0].style.visibility = 'hidden';
                        $('.style-primary').remove();
                    };

                </script>
            </div>
        </div>


        {!! Form::close() !!}
    @endsection()

    @endsection()

    @endsection()

</body>
