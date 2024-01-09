@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
    
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
		@endsection()

		@section('card-content')       

		<div class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->
            
            <?php $image_path2 = '/img/logo_cam.png'; ?>
            <?php $image_path1 = '/img/logo_secad.png'; ?>
			<!-- BEGIN CONTENT-->
            <div id="">
                <section>                   
                	@if(count($participantes) != 0)
                    @foreach($participantes as $participantesR)  
                    <div class="section-body">                    	
                    	<div class="row">
                        <div class="col-xs-12 content-escarapela borderT borderB borderL borderR">                            
                                <div class="col-xs-6 escarapela borderR">
                                	<div class="col-xs-12 gris text-center">
                                    	...
                                	</div>

                                    <img src="{{ public_path() . $image_path1 }}"/>                            
                                    <p class="text-center gris borderB"><span> CD3: </span> <span id="nombreEscarapela">  {{$participantesR->Nombre}}  </span></p>
                                    <p class="text-center borderB"><span> CC: </span> <span id="cedulaEscarapela"> {{$participantesR->CC}} </span></p>
                                    <p class="text-center borderB"> EMA VI</p>
                                    
                                </div>                    
                                <div class="col-xs-6 escarapela">
                                	<div class="col-xs-12 gris text-center">
                                    	...
                                	</div> 
                                    
                                    <img src="{{ public_path() . $image_path2 }}"/>                             
                                    <p class="text-center gris borderB"><span> CD3: </span> <span id="nombreEscarapela"> {{$participantesR->Nombre}} </span></p>
                                    <p class="text-center borderB"><span> CC: </span> <span id="cedulaEscarapela"> {{$participantesR->CC}} </span></p>
                                    <p class="text-center borderB"> EMA VI</p>
                                </div>                                     
                        </div>	
                        </div>					
					</div><!--end .section-body --> 
					 @endforeach
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

</body>