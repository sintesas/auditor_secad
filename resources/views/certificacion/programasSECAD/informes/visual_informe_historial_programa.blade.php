@extends('partials.card')

@extends('layout')

@section('title')
Informe Historial Programa
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($listaActividadesPrograma) !!}
{{ csrf_field()}}

@endsection

@section('card-title')
{{-- Informe Inspección IC FR 08 --}}
{{ Breadcrumbs::render('informe_empresa') }}
@endsection()

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
                            <h4><strong> Programa </strong> {{$programa->Proyecto}} </h4>
                        </div>
                        <div class="col-xs-3">
                            <h5> <strong> No Control </strong> {{$programa->Consecutivo}} </h5>
                       </div>
                       <div class="col-xs-4">
                            <h5> <strong> Tipo Programa </strong> {{$tipoPrograma->Tipo}} </h5>
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
                        
                        @if(count($listaActividadesPrograma) != 0)
                            <?php $idactividad = 0; $cntactividad = 1?> 
                            @foreach($listaActividadesPrograma as $actividadPrograma) 
                                <tr class="line-bt">  
                                    <td class="lighterFont">{{$cntactividad}}</td>
                                    <td class="lighterFont" colspan="5">{{$actividadPrograma->Actividad}}</td>
                                    <td class="lighterFont">{{$actividadPrograma->Responsable}}</td>
                                </tr>
                                @foreach($seguimientoPrograma as $seguimiento)
                                    @if($seguimiento->IdActividad == $actividadPrograma->IdActividad)
                                    <tr class="">  
                                        <td class="lighterFont"></td>
                                        <td class="lighterFont">{{$seguimiento->Situacion}}</td>
                                        <td class="lighterFont">{{$seguimiento->Fecha}}</td>
                                        <td class="lighterFont">{{$seguimiento->Evidencias}}</td>
                                        <td class="lighterFont"><a href="{{asset($seguimiento->Documentos)}}" target="_blank">Descargar</a></td>
                                        <td class="lighterFont">{{$seguimiento->Horas}}</td>
                                        <td class="lighterFont"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                <?php $cntactividad = $cntactividad+1; ?> 
                                <?php $idactividad = $actividadPrograma->IdActividad; ?>
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
            <a href="{{route('informehistorialprograma.edit', $programa->IdTipoPrograma) }}" style="width: 150px; font-style: Roboto; margin-top: 30px;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
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