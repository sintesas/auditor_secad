@extends('partials.card')

@extends('layout')

@section('title')
	Informe Por Cursos
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($cursos) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('ver_informecursosfuncionario') }}
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
                            <div class="row">
                                <div class="">
                                    <div class="card">
                                        <div class="card-head text-center fondoAzulOscuro blanco">
                                            <header class="">
                                                Informacion Curso <samp> .</samp>
                                            </header>
                                        </div><!--end .card-head -->
                                        @if(count($cursos) == 1)
                                        @foreach($cursos as $cursosR)
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="Cedula">Nombre Curso:</label>
                                                        <p id="Cedula">{{$cursosR->NombreCurso}}</p>                                    
                                                    </div>
                                                </div>                        
                                                <div class="col-sm-4">
                                                    <div class="form-group">                                    
                                                        <label for="Nombre">Lugar Entidad:</label>
                                                        <p id="Nombre">{{$cursosR->LugarEntidad}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">                                    
                                                        <label for="Apellidos">Ciudad:</label>
                                                        <p id="Apeliidos">{{$cursosR->Ciudad}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="CargoFuncion"> Fecha Termino:</label>
                                                        <p id="CargoFuncion">{{$cursosR->FechaTermino}}</p>                                    
                                                    </div>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <div class="form-group">                                    
                                                        <label for="Celular"> Modalidad Estudio:</label>
                                                        <p id="Celular">{{$cursosR->ModalidadEstudio}}</p>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">

                                                        <label for="Correo_Elect"> Vigente</label>
                                                        <p id="Correo_Elect">{{$cursosR->Vigente}}</p>
                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">

                                                        <label for="Telefono2"> Fecha Expiracion:</label>
                                                        <p id="Telefono2">{{$cursosR->FechaExpiracion}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">  
                                                       <label for="Grado"> Tiempo Duracion: </label>
                                                       <p id="Grado">{{$cursosR->TiempoDuracion}}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div><!--end .card-body -->

                                         @endforeach
                                            @else
                                              <div class="section-body">
                                                <div class="text-center">
                                                    <h3>No hay datos para mostrar informe</h3>
                                                </div>
                                              </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                    </div><!--end .section-body -->               
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->

            <input name="Imprimir"  type="submit" id="btnExportToPDF" value="Descargar PDF" onclick="pdfToHTML2()"/>			
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