@extends('partials.card')

@extends('layout')

@section('title')
	Informe Inspección IC FR 03
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{{-- {!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}} --}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{-- {{ Breadcrumbs::render('ver_informeinspeccionicfr08') }} --}}
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
                    @if(count($cantidadesTotalPais) == 1)
                    @foreach($cantidadesTotalPais as $cantidadesTotalPaisR)
                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                            
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h2> FUERZA AÉREA COLOMBIANA </h2>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h3> JEFATURA DE OPERACIONES LOGÍSTICAS AERONÁUTICAS</h3>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h4> SECCION DE CERTIFICACIÓN AERONAUTICO DE LA DEFENSA</h4>
                            </div>
                            
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center">
                                <h4> Listado de empresas Colombianas Capacidad Aeronáutica</h4>
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-12">
                                <div class="col-xs-8 " >
                                    <div class="col-xs-12">
                                        <span> Capacidad u Oferta:</span> <p> Aircraf, Helicopter, UAV, Spaceraft & related equipment </p>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                     <span>total:</span> <p>....</p>
                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                        <th class="th-x"> Nombre Empresa</th>
                                      
                                        <th class="th-x" >  Nit</th>
                                      
                                        <th class="th-x" > Ciudad </th>
                                      
                                        <th class="th-x" > Teléfono</th>                                                                              
                                      
                                      
                                      
                                  </tr>                                  
                                    <tr class="line-b">  
                                        <th class=""></th>                                        
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                  </tr>
                                </table>
                            </div>
                        </div><!--end .row -->
                        <div class="col-xs-12">
                            <div class="col-xs-4">
                                <p>total empresas:</p>
                                <p>...</p>
                            </div>
                            <div class="col-xs-4">
                                <p>% porcentaje total:</p>
                                <p>...</p>
                            </div>
                            <div class="col-xs-4">
                                <p>Total Capacidades x Empresas:</p>
                                <p>...</p>
                            </div>
                        
                        </div>
                        
                        
                    </div><!--end .section-body -->
                    @endforeach
                    @endif
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