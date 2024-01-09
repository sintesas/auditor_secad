@extends('partials.card')

@extends('layout')

@section('title')
  Informe Ofertas por Capacidad
@endsection()

@section('content')

  @section('card-content')

    @section('card-title')
      {{ Breadcrumbs::render('afiliados_cluster') }}
    @endsection()

    @section('form-tag')

      {!! Form::model($cluster) !!}
        {{ csrf_field()}}

    @endsection

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

                            <!-- titulo Formulario -->
              <div class="col-xs-12 text-center">
                                <h2> FUERZA AÉREA COLOMBIANA </h2>
                                <h3> Sección de Certificación Aeronautica de la Defensa SECAD</h3>
                                <h4> Informe de Afiliados por Cluster</h4>
                            </div>

            </div><!--end .row -->
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <div class="col-xs-12 text-center">
                               @foreach($clusterGroup as $clusterGroupR)
                                @if(count($clusterGroup) > 0)
                                <h5> <span><b>Nombre Cluster: </b></span><span>{{$clusterGroupR->NombreCluster}}</span> </h5>
                                @endif
                               @endforeach
                            </div>

                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>

                                      <th class="th-x text-center"> ID</th>
                                      <th class="th-x text-center" > IdCluster</th>
                                      <th class="th-x text-center" > Empresa</th>
                                      <th class="th-x text-center" > NIT</th>
                                      <th class="th-x text-center" > Telefono</th>
                                      <th class="th-x text-center" > Página Web</th>
                                  </tr>
                                   @if(count($cluster) > 0)
                                   @foreach($cluster as $clusterR)
                                    <tr class="line-b">

                                        <th class="text-center">{{$clusterR->IdClusterAfiliado}}</th>
                                        <th class="text-center">{{$clusterR->cluster->NombreCluster}}</th>
                                        <th class="text-center">{{$clusterR->empresa->NombreEmpresa}}</th>
                                        <th class="text-center">{{$clusterR->Nit}}</th>
                                        <th class="text-center">{{$clusterR->Telefono}}</th>
                                        <th class="text-center">{{$clusterR->empresa->PaginaWeb}}</th>
                                  </tr>
                                   @endforeach
                                    @else
                                      <div class="section-body">
                                        <div class="text-center">
                                            <h3>No hay datos para mostrar informe</h3>
                                        </div>
                                      </div>
                                    @endif
                                    <!--<tr class="line-b" id="filaFinal">
                                        <th class="">TOTAL(Capacidades x Empresas)=</th>               <th class="">...</th>

                                  </tr>-->
                                </table>
                            </div>
                        </div><!--end .row -->
                        <!--  BLOQUE FIRMAS -->
                        <div class="row">
                                <div class="col-xs-12 firmaFormulario">
                                     <div class="col-xs-5">
                                        <div class="col-xs-6 " > Empresa Afiliada:</div>
                                        <div class="col-xs-6"> ....</div>
                                    </div>
                                </div>
            </div><!--end .row -->
                    </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

            <a href="{{route('informeafiliadoscluster.edit', $idCluster) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

        </div>
    </div>


    {!! Form::close() !!}
    @endsection()

  @endsection()

@endsection()
