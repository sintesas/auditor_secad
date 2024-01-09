@extends('partials.card_big')

@extends('partials.pdf')

<body style="background-color: white;">

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($informeHistorialPrograma) !!}
{{ csrf_field()}}

@endsection


@section('card-content')

<div class="">
    <!-- BEGIN BASE-->
    <div id="">

        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT -->

        <!-- BEGIN CONTENT-->
        <div id="">
            <section style="padding: 10px !important;">
              <div class="">
                <div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div class="col-xs-5">
                            <h4>FICHA DE CONTROL DE SEGUIMIENTO HISTORICO</h4>
                        </div>
                   </div>
                    <div class="col-xs-12">
                        <div class="col-xs-5">
                            <h4><strong> Programa </strong> {{$informeHistorialPrograma[0]->Proyecto}}</h4>
                        </div>
                        <div class="col-xs-3">
                            <h5> <strong> No Control </strong> {{$informeHistorialPrograma[0]->Consecutivo}}</h5>
                       </div>
                       <div class="col-xs-4">
                            <h5> <strong> Tipo Programa </strong>{{$informeHistorialPrograma[0]->TipoPrograma}} </h5>
                       </div>
                   </div>
               </div>
               

            <!-- Segundo BLOQUE DE INFOMACION -->
            <div class="row">                            
                <!-- Proceso -->
                <div class="col-xs-12 filaFormulario table-fixed">
                    <table class="table  table-x">
                        <tr class="line-b">
                            {{-- <th class="th-x"> Id</th> --}}

                            <th class="th-x" > N. </th>

                            <th class="th-x" colspan="5"> Actividad </th>

                           

                            <th class="th-x" > Responsable</th>                        
                        </tr>
                        <tr class="line-b">
                            {{-- <th class="th-x"> Id</th> --}}

                            <th class="th-x" ></th>

                            <th class="th-x" > Situacion </th>

                            <th class="th-x" style="width: 75px;">Fecha</th>

                            <th class="th-x" > Observaciones </th>

                            <th class="th-x"> Evidencias</th>

                            <th class="th-x"> HH </th>

                            <th class="th-x" ></th>                        
                        </tr>
                        
                        @if(count($informeHistorialPrograma) != 0)
                            <?php $idactividad = 0; $cntactividad = 1?> 
                            @foreach($informeHistorialPrograma as $informeHistorialProgramaR) 

                               @if (($idactividad) == ($informeHistorialProgramaR->IdActividad) && ($idactividad) != 0)
                                <tr class="line-ct">  
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Situacion}}</td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Fecha}}</td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Evidencias}}</td>
                                    <td class="lighterFont"><a href="{{asset($informeHistorialProgramaR->Documentos)}}" target="_blank">Descargar</a></td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Horas}}</td>
                                    <td class="lighterFont"></td>
                                </tr>                        
                                @else
                                <tr class="line-bt">  
                                    <td class="lighterFont">{{$cntactividad}}</td>
                                    <td class="lighterFont" colspan="5">{{$informeHistorialProgramaR->Actividad}}</td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Responsable}}</td>
                                </tr>
                                @if($informeHistorialProgramaR->IdListaSeguimiento != null)
                                 <tr class="">  
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Situacion}}</td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Fecha}}</td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Evidencias}}</td>
                                    <td class="lighterFont"><a href="{{asset($informeHistorialProgramaR->Documentos)}}" target="_blank">Descargar</a></td>
                                    <td class="lighterFont">{{$informeHistorialProgramaR->Horas}}</td>
                                    <td class="lighterFont"></td>
                                </tr>
                                @endif
                                <?php $cntactividad = $cntactividad+1; ?> 
                                <?php $idactividad = $informeHistorialProgramaR->IdActividad; ?>
                                @endif
                            @endforeach
                                <tr class="">  
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont"></td>
                                    <td class="lighterFont">Suma Total H/H</td>
                                    <td class="lighterFont">{{$totalHoras->TotalHoras}}</td>
                                    <td class="lighterFont"></td>
                                </tr>
                        @else
                            <div class="section-body">
                                <div class="text-center">
                                    <h3>No hay datos para mostrar informe</h3>
                                </div>
                            </div>
                        @endif
                    </table>
                </div>
                <!-- FIN Div-->
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