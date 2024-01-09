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
			Informe Hallazgos Generados
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
                    @if(count($informehallazgosgenerados) == 1)
                    @foreach($informehallazgosgenerados as $informehallazgosgeneradosR)
                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">                                                   
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                <h3 class="line-b">HALLAZGOS GENERADOS INSPECCION INTERNA </h3>
                            </div>
                        </div>
                        
                        <!-- Primer BLOQUE DE INFOMACION -->                       
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x" id="table1">
                                  <tr>
                                        <th class="th-x"> No Anota</th>
                                      
                                        <th  > Organización </th>
                                      
                                        <th class="th-x" > Proceso </th>
                                      
                                        <th class="th-x" > Codigo</th>
                                      
                                        <th class="th-x" > Fecha Inicio </th>
                                      
                                        <th class="th-x" > Descripcion </th>
                                      
                                        <th class="th-x"> Tipo</th>
                                      
                                        <th class="th-x"> Estado </th>
                                      
                                        <th class="th-x" > Fecha Avance</th>
                                        
                                        <th class="th-x" > Avance </th>
                                      
                                        <th class="th-x" > Anexo </th>                              
                                  </tr>                                  
                                    <tr class="line-b">  
                                        <th class=""> Hola manonla me dijeron por ahi que nadie te para bolas...</th>
                                        <th class=""> Hola manonla me dijeron por ahi que nadie te para bolas...</th>
                                        <th class=""> Hola manonla me dijeron por ahi que nadie te para bolas...</th>
                                        <th class=""> Hola manonla me dijeron por ahi que nadie te para bolas...</th>
                                        <th class="">. Hola manonla me dijeron por ahi que nadie te para bolas..</th>
                                        <th class="">.Hola manonla me dijeron por ahi que nadie te para bolas..</th>
                                        <th class="">.Hola manonla me dijeron por ahi que nadie te para bolas..</th>
                                        <th class="">..Hola manonla me dijeron por ahi que nadie te para bolas.</th>
                                        <th class="">..Hola manonla me dijeron por ahi que nadie te para bolas.</th>
                                        <th class="">.Hola manonla me dijeron por ahi que nadie te para bolas..</th>
                                        <th class="">.Hola manonla me dijeron por ahi que nadie te para bolas..</th>                                        
                                  </tr>
                                </table>
                            </div>
                            <!-- FIN Div-->
                        </div><!--end .row -->                                                  
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