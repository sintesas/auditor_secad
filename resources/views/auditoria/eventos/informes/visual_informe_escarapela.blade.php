@extends('partials.card')

@extends('layout')

@section('title')
	Informe Escarapelas
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($participantes) !!}
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
                	@if(count($participantes) != 0)
                    @foreach($participantes as $participantesR)  
                    <div class="section-body">                    	
                    	<div class="row">
                        <div class="col-xs-12 content-escarapela borderT borderB borderL borderR">                            
                                <div class="col-xs-6 escarapela borderR">
                                    @if(count($evento) != 0)
                                    @foreach($evento as $eventoR)  
                                	<p class="col-xs-12 gris text-center">
                                    	{{$eventoR->Evento}}
                                	</p> 
                                    @endforeach
                                    @endif
                                    <br/>
                                    <img src="../img/logo_jol.png" class="img-responsive">
                                    <br/>                            
                                    <p class="text-center gris borderB"><span> CD3: </span> <span id="nombreEscarapela">  {{$participantesR->Nombre}}  </span></p>
                                    <p class="text-center borderB"><span> CC: </span> <span id="cedulaEscarapela"> {{$participantesR->CC}} </span></p>
                                    <p class="text-center borderB"> EMA VI</p>
                                    
                                </div>                    
                                <div class="col-xs-6 escarapela">
                                	@if(count($evento) != 0)
                                    @foreach($evento as $eventoR)  
                                    <p class="col-xs-12 gris text-center">
                                        {{$eventoR->Evento}}
                                    </p> 
                                    @endforeach
                                    @endif
                                    <br/>                                     
                                    <img src="../img/logo_cam.png" class="img-responsive">                             
                                    <br/>
                                    <p class="text-center gris borderB"><span> CD3: </span> <span id="nombreEscarapela"> {{$participantesR->Nombre}} </span></p>
                                    <p class="text-center borderB"><span> CC: </span> <span id="cedulaEscarapela"> {{$participantesR->CC}} </span></p>
                                    <p class="text-center borderB"> EMA VI</p>
                                </div>                                     
                        </div>	
                        </div>	
					</div><!--end .section-body -->   
					 @endforeach
                    <br>
                     <a href="{{route('informeescarapelas.edit', $participantesR->IdEvento) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-right"><span class="fa fa-download">    Descargar PDF</span></a>
                          @else
                          <div class="section-body">
                            <div class="text-center">
                                <h3>No hay datos para mostrar informe</h3>
                            </div>
                          </div>
                      @endif            
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->
        </div>
    </div>



		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()