@extends('partials.card')

@extends('layout')

@section('title')
	Informe Funcionarios Empresa
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($participantesEvento2) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('funcionarios_empresas') }}
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
                      <div class="total-card">
                        <div class="row encabezadoPlanInspeccion">
                        <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                                            <div>
                                                <h4>Listado total de empresas </h4>
                                            </div>                        
                                    </div>                              
                            </div>
                            
                        </div><!--end .row -->
                                                
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <div class="col-xs-12 text-center gris57">
                                <h4> Listado de funcionarios de empresas Colombianas</h4>
                            </div>                            
                            <!-- FIN Div-->                       
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x ">
                                  <tr class="fondoAzulOscuro blanco">
                                        <th class="th-x"> Id/No Id</th>
                                      
                                        <th class="th-x" >  Nombres</th>
                                      
                                        <th class="th-x" > Cargo </th>

                                        <th class="th-x" > Teléfono </th>

                                        <th class="th-x" > Email </th>
                                  </tr>
                                   @if(count($participantesEvento2) != 0)
                                   @foreach($participantesEvento2 as $participantesEventoR)
                                                                 
                                    <tr class="line-a">  
                                        <th class="">{{$participantesEventoR->NumIdentificacion}}</th>                               
                                        <th class="">{{$participantesEventoR->Nombres}}</th>
                                        <th class="">{{$participantesEventoR->CargoFuncion}}</th>
                                        <th class="">{{$participantesEventoR->Celular}}</th>
                                        <th class="">{{$participantesEventoR->Email}}</th>
                                    </tr>
                                   @endforeach
                                   @endif
                                </table>
                            </div>
                        </div><!--end .row -->   
                        <br><br>
                        <a href="{{route('informefuncionariosempresa.edit', $empresa->IdEmpresa) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>                                       
                    </div><!--end .section-body -->                   
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

            
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()