@extends('partials.pdf')

<body style="background-color: white;">

@extends('partials.card')

{{-- @extends('layout') --}}

@section('title')
  Informe Ofertas por Capacidad
@endsection()

@section('content')

  @section('card-content')

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
                                <h5> <span>Nombre Cluster</span><span> Asociacion Colombiana de Productores Aeronauticos</span> </h5>
                            </div>                            
                            
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                    
                                      <th class="th-x text-center"> ID</th>
                                      <th class="th-x text-center" > Ciudad</th>  
                                      <th class="th-x text-center" > Region</th>
                                      <th class="th-x text-center" > Repres Legal</th>    
                                      <th class="th-x text-center" > Dirección</th>       
                                      <th class="th-x text-center" > Telefono </th>    
                                      <th class="th-x text-center" > Email</th>       
                                      <th class="th-x text-center" > Sigla </th>                                                                                      
                                      
                                  </tr>                  
                                   @if(count($cluster) == 1)
                                   @foreach($cluster as $clusterR)                
                                    <tr class="line-b">                                                                    
                                        <th class="text-center">{{$cluster->IdCluster}}</th>
                                        <th class="text-center">{{$cluster->Ciudad}}</th>                             
                                        <th class="text-center">{{$cluster->Region}}</th>
                                        <th class="text-center">{{$cluster->RepresLegal}}</th>                             
                                        <th class="text-center">{{$cluster->Direccion}}</th>
                                        <th class="text-center">{{$cluster->Telefono}}</th>
                                        <th class="text-center">{{$cluster->Email}}</th>
                                        <th class="text-center">{{$cluster->Sigla}}</th>
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

            <input name="Imprimir"  type="submit" id="btnExportToPDF" value="Descargar PDF" onclick="pdfToHTML()"/>     
        </div>
    </div>

        <script>            
            function pdfToHTML (){
                $('html, body').animate({scrollTop:0}, 'fast');
                setTimeout("pdfToHTML2()",50);
                
            }
            function pdfToHTML2(){                                
                var pdf = new jsPDF('p', 'pt', 'letter');
                var options = {
                     pagesplit: true
                };
                 pdf.addHTML($('#contentReport')[0], options, function () {
                     pdf.save('INFORME DE INSPECCION.pdf');
                 });
            }       
        </script>

    {!! Form::close() !!}
    @endsection()

  @endsection()

@endsection()
</body>

