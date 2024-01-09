@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
  
@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($participantesEvento) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			Informe Asistencia
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
                            <div class="col-xs-12 text-center">
                                <h2> OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD </h2>
                                <h2> LISTADO DE ASISTENCIA A EVENTO DE CAPACITACION </h2>
                            </div>                            
                            
                     </div><!--end .row --> 
                    
                        <!-- PRIMER BLOQUE DE INFOMACION EVENTO-->
                         @if(count($eventoById) == 1)
                         @foreach($eventoById as $eventoByIdR)                       
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Id:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->IdEvento}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Evento:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->Evento}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Fecha:
                                </div>                                
                                
                                <div class="col-xs-6">{{date('d-m-Y', strtotime($eventoByIdR->Fecha))}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Lugar:
                                </div>                                                                
                                <div class="col-xs-6">{{$eventoByIdR->Lugar}}
                                </div>                                    
                            </div>                                                        
                        </div>
                        <!-- BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Descripción:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->Descripcion}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Hora Total:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->HorasTotal}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Responsable:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->Responsable}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Directivo No:
                                </div>                                                                
                                <div class="col-xs-6">{{$eventoByIdR->DirectivaNo}}
                                </div>                                    
                            </div>                                                        
                        </div>
                        <!-- BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Horario:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->Horario}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Ciudad:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->Ciudad}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Tipo:
                                </div>                                
                                
                                <div class="col-xs-6">{{$eventoByIdR->IdTipoEvento}}
                                </div>                                    
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-3">                                
                                <div class="col-xs-6 gris text-center">
                                    Duración:
                                </div>                                                                
                                <div class="col-xs-6">{{$eventoByIdR->Duracion}}
                                </div>                                    
                            </div>                                                        
                        </div>
                        @endforeach                         
                        @endif
                        <hr/>
                        <!-- BLOQUE DE INFOMACION PARTICIPANTES -->                        
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="gris text-center">
                                    Fecha:
                                </div>  
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="gris text-center">
                                    Gr:
                                </div>                   
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="gris text-center">
                                    Nombre:
                                </div>                       
                            </div>                            
                                           
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="gris text-center">
                                  CC:
                              </div>                    
                          </div>
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="gris text-center">
                                  Telefono:
                              </div>                 
                          </div>
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="gris text-center">
                                  Email:
                              </div>                      
                          </div>                            
                        </div>                        
                         {{-- PARTICIPANTES --}}
                         @if(count($participantesEvento) == 1)
                         @foreach($participantesEvento as $participantesEventoR) 
                          <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="">
                                    {{$participantesEventoR->Fecha}}
                                </div>  
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="">
                                    {{$participantesEventoR->Grado}}
                                </div>                   
                            </div>
                            <!-- Proceso -->
                            <div class="col-xs-2">                                
                                <div class="">
                                    {{$participantesEventoR->Nombre}}
                                </div>                       
                            </div>                            
                                           
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="">
                                  {{$participantesEventoR->CC}}
                              </div>                    
                          </div>
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="">
                                  {{$participantesEventoR->Telefono}}
                              </div>                 
                          </div>
                          <!-- Proceso -->
                          <div class="col-xs-2">                                
                              <div class="">
                                  {{$participantesEventoR->Email}}
                              </div>                      
                          </div>                            
                        </div>
                         @endforeach
                          @else
                          <div class="section-body">
                            <div class="text-center">
                                <h3>No hay datos para mostrar informe</h3>
                            </div>
                          </div>
                          @endif
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