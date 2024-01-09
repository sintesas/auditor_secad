@extends('partials.card')

@extends('partials.pdf')


<body style="background-color: white;">
    
@section('content')

	@section('card-content')

		@section('form-tag')

			{{-- {!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}} --}}

		@endsection

		@section('card-title')
			Informe Visita y Acompañamiento
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
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac">
                                <?php $image_path = '/img/logoFac.png'; ?>
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-10 titulo">
                                <ul class="menuInformeVisAcom">
                                    <li> FUERZA AEREA COLOMBIANA</li>
                                    <li> JEFATURA DE OPERACIONES LOGISTICAS AERONAUTICAS</li>
                                    <li> VISITA DE ACOMPAÑAMIENTO PLAN CALIDAD AERONAUTICO</li>
                                </ul>
                            </div>
                        </div><!--end .row -->                                                                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-3" >
                                    <div class="col-xs-6">Auditoria No:</div>
                                    <div class="col-xs-6">...</div>
                                </div>
                                <div class="col-xs-3" >
                                    <div class="col-xs-6">Visita No:</div>
                                    <div class="col-xs-6">...</div>
                                </div>
                                <div class="col-xs-3" >
                                    <div class="col-xs-6">Fecha</div>
                                    <div class="col-xs-6">...</div>
                                
                                </div>
                                <div class="col-xs-3" >
                                    <div class="col-xs-6">Responsable</div>
                                    <div class="col-xs-6">...</div>
                                </div>
                                
                            </div>                                                                                    
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6" >
                                    <div class="col-xs-6">PRIORIDAD</div>
                                    <div class="col-xs-6">...</div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6"> TIEMPO DE CUMPLIMIENTO
                                    </div>
                                    <div class="col-xs-6">...</div>
                                </div>   
                            </div>
                            <!-- Div Fecha -->                          

                        </div><!--end .row -->
                        
                        <!-- SEGUNDO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                        <th class="th-x gris"> Reporte Encontrado</th>
                                      
                                        <th class="th-x gris" > # </th>
                                      
                                        <th class="th-x gris" > Accion Correctiva / Preventa / Mejora </th>
                                      
                                        <th class="th-x gris" > Responsable de la Accion</th>
                                      
                                        <th class="th-x gris" > Fecha Finalizacion </th>
                                      
                                                                  
                                        <th class="th-x gris" > Seguimiento a la Accion </th>                                                                            
                                      
                                      
                                  </tr>                                  
                                    <tr class="line-b">  
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>                                 
                                  </tr>
                                </table>
                                </div>
                            </div>                                                        
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