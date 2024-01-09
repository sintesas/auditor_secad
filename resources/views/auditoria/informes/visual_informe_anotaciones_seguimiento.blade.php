@extends('partials.card')

@extends('layout')

@section('title')
	Informe Anotaciones de Seguimiento
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{-- Informe Anotaciones de Seguimiento --}}
            {{ Breadcrumbs::render('ver_informeanotacionesseguimiento') }}
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
                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                            
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center gris">
                                <h5>JEFATURA DE OPERACIONES LOGISTICAS AERONAUTICAS </h5>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h5 class="line-b">OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA </h5>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h5 class="line-b">HALLAZGOS GENERADOS INSPECCIONES CON HISTORIAL </h5>
                            </div>
                        </div>
                        @if(count($informeanotacionesseguimiento) == 1)
                        @foreach($informeanotacionesseguimiento as $informeanotacionesseguimientoR)
                        <!-- Primer BLOQUE DE INFOMACION -->
                        <div class="row">
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4">
                                    CODIGO:
                                </div>
                                <div class="col-xs-4" id="codInforSe">
                                    {{$informeanotacionesseguimientoR->Codigo}} 
                                </div>
                            </div>                                     
                        </div>
                        
                        <!-- Segundo BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                        <th class="th-x aqua"> No Anot</th>
                                      
                                        <th class="th-x aqua" > Dependencia </th>
                                      
                                        <th class="th-x aqua" > Proceso </th>
                                      
                                        <th class="th-x aqua" >Tipo Auditoria</th>
                                      
                                        <th class="th-x aqua" > Fecha Auditor </th>
                                      
                                        <th class="th-x aqua" > Descripcion </th>
                                      
                                        <th class="th-x aqua"> Tipo</th>
                                      
                                        <th class="th-x aqua"> Estado </th>
                                      
                                        <th class="th-x aqua" > Fecha Avance</th>
                                        
                                        <th class="th-x aqua" > Visita Control No</th>
                                      
                                        <th class="th-x aqua" > No Causa Raiz</th>
                                      
                                        <th class="th-x aqua" > Accion Seguimiento</th>
                                      
                                        <th class="th-x aqua" > Porcentaje </th>                                      
                                  </tr> 
                                   @if(count($informeauditoriaseguimiento) != 0)
                                   @foreach($informeauditoriaseguimiento as $informeauditoriaseguimientoR)                                 
                                    <tr class="line-b">  
                                        <th class="">{{$informeauditoriaseguimientoR->NoAnota}}</th>
                                        <th class=""></th>
                                        <th class="">{{$informeauditoriaseguimientoR->NombreProceso}}</th>
                                        <th class="">{{$informeauditoriaseguimientoR->TipoAuditoria}}</th>
                                        <th class="">{{date('d-m-Y', strtotime($informeauditoriaseguimientoR->Fecha))}}</th>
                                        <th class="">{{$informeauditoriaseguimientoR->DescripcionEvidencia}}</th>
                                        <th class=""></th>
                                        <th class="">{{$informeauditoriaseguimientoR->NombreEstado}}</th>
                                        <th class="">{{date('d-m-Y', strtotime($informeauditoriaseguimientoR->FechaTermino))}}</th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class="">{{$informeauditoriaseguimientoR->AccionSeguimiento}}</th>
                                        <th class="">{{$informeauditoriaseguimientoR->Porcentaje}}</th>            
                                  </tr>
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
                
                    <a href="{{route('informeanotacionesseguimiento.edit', $informeanotacionesseguimientoR->IdAuditoria ) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

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