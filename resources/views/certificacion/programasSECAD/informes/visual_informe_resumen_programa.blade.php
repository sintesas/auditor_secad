@extends('partials.card')

@extends('layout')

@section('title')
Informe Historial Programa
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($informeHistorialPrograma) !!}
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
                        <div class="col-xs-3">
                            <h5> <strong> No Control {{$informeHistorialPrograma[0]->Consecutivo}} </strong></h5>
                       </div>
                       <div class="col-xs-4">
                            <h5> <strong> Tipo Programa {{$informeHistorialPrograma[0]->TipoPrograma}} </strong></h5>
                       </div>
                   </div>                              
               </div>

               <!-- Primer BLOQUE DE INFOMACION -->
               <div class="row">
                <div class="col-xs-12 filaFormulario">
                    <div class="col-xs-4">
                        CODIGO:
                    </div>
                    <div class="col-xs-4" id="codInforSe">
                        ...
                    </div>
                </div>                                     
            </div>

            <!-- Segundo BLOQUE DE INFOMACION -->
            <div class="row">                            
                <!-- Proceso -->
                <div class="col-xs-12 filaFormulario table-fixed">
                    <table class="table  table-x">
                      <tr class="line-b">
                        <th class="th-x"> Id</th>

                        <th class="th-x" > Numeral </th>

                        <th class="th-x" > Situacion </th>

                        <th class="th-x" style="width: 75px;">Fecha</th>

                        <th class="th-x" > Control </th>

                        <th class="th-x" > Observaciones </th>

                        <th class="th-x"> Evidencias</th>

                        <th class="th-x"> HH </th>

                        <th class="th-x"> Responsable</th>                        

                        </tr>

                    @if(count($informeHistorialPrograma) != 0)

                    <?php $idactividad = 0; $cntactividad = 1> 

                    @foreach($informeHistorialPrograma as $informeHistorialProgramaR) 

                       @if (($idactividad) == ($informeHistorialProgramaR->IdActividad) && ($idactividad) != 0)

                        <tr class="line-ct">  
                            <th class="lighterFont"></th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Situacion}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Fecha}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->IdActividad}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Evidencias}}</th>
                            <th class="lighterFont"><a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf" target="_blank">Descargar</a></th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->IdListaSeguimiento}}</th>
                            <th class="lighterFont"></th>
                        </tr>                        
                        @else
                        <tr class="line-bt">  
                            <th class="lighterFont">{{$informeHistorialProgramaR->IdActividad}} </th>
                            <th class="lighterFont">{{$cntactividad}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Actividad}}</th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Responsable}}</th>
                        </tr>
                         <tr class="">  
                            <th class="lighterFont"> </th>
                            <th class="lighterFont"></th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Situacion}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Fecha}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->IdActividad}}</th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->Evidencias}}</th>
                            <th class="lighterFont"><a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf" target="_blank">Descargar</a></th>
                            <th class="lighterFont">{{$informeHistorialProgramaR->IdListaSeguimiento}}</th>
                            <th class="lighterFont"></th>
                        </tr>
                        <?php $cntactividad = $cntactividad+1; ?> 
                        <?php $idactividad = $informeHistorialProgramaR->IdActividad; ?> 
                         @endif
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