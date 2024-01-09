@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($personal) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{-- {{ Breadcrumbs::render('ver_informehojadevida') }} --}}
            Informe Hoja De vida
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
                    
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="circulo">
                            <img id="image_upload_preview" src="{{URL::asset('secad/Personal/Fotos/'.$personal->Cedula.'/'.$personal->Foto)}}" alt="profile Pic" class="circulo">
                        </div>    
                          
                    </div>
                </div> <br>   
                
                <div class="card">
                    <div class="card-head style-primary text-center">
                        <header>
                            Información Personal
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="Nombres">Nombres:</label>
                                    <p id="Nombres">{{$personal->Nombres}} </p>
                                </div>
                            </div>                        
                            <div class="col-xs-6">
                                <div class="form-group">                                    
                                    <label for="Apellidos">Apellidos</label>
                                    <p id="Apeliidos"> {{$personal->Apellidos}} </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="IdTipoDoc">Tipo Documento </label>
                                    <p id="IdTipoDoc">{{$personal->NombreTipoDoc}}  </p>                                    
                                </div>
                            </div> 
                            <div class="col-xs-4">
                                <div class="form-group">                                    
                                    <label for="Cedula"> Cedula</label>
                                    <p id="Cedula">{{$personal->Cedula}}</p>

                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    
                                    <label for="LugarExpedicion"> Lugar de Expedición</label>
                                    <p id="LugarExpedicion">{{$personal->Lugarexpedicion}}</p>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    
                                    <label for="LugarNacimiento"> Lugar de nacimiento </label>
                                    <p id="LugarNacimiento">{{$personal->LugarNacim}}</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <div class="input-group date" id="demo-date-format">
                                        <div class="input-group-content">
                                            
                                           <label for="fechaNacimiento"> Fecha de nacimiento: </label>
                                           <p id="fechaNacimiento"> {{$personal->FechaNacim}} </p>
                                        </div>
                                        
                                    </div>  
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    
                                    <label for="Email"> Email: </label>
                                    <p id="Email">{{$personal->Email}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end .card-body -->
                </div>
                            
                <div class="card">
                    <div class="card-head style-primary text-center">
                        <header>
                            Información Militar
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
              
                                    <label for="IdGrado">Grado</label>
                                    <p id="IdGrado">{{$personal->NombreGrado}}</p>
                                </div>
                            </div>                 
                            <div class="col-xs-4">
                                <div class="form-group">
                                   
                                    <label for="CodMilitar">Código Militar</label>
                                    <p id="CodMilitar"> {{$personal->CodMilitar}} </p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">                                   
                                    <label for="NoFolioVida">No Folio Vida </label>
                                    <p id="NoFolioVida">{{$personal->NoFolioVida}} </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                         
                                    <label for="Validadcion">Cuerpo </label>
                                    <p id="Validadcion"> {{$personal->NombreCuerpo}}</p>
                                </div>
                            </div>                        
                            <div class="col-xs-4">
                                <div class="form-group">
                                    
                                    <label for="EspecialidadPrimaria">Especialidad Primaria</label>
                                    <p id="EspecialidadPrimaria"> {{$personal->NombreEspecialidad1}}</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                     
                                    <label for="EspecialidadSecudaria">Especialidad Secundaria </label>
                                    <p id="EspecialidadSecudaria"> {{$personal->NombreEspecialidad2}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">                                   
                                    <label for="Unidad">Unidad</label>
                                    <p id="Unidad"> {{$personal->NombreUnidad}}</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">                                    
                                    <label for="GrupoJefatura">Grupo/Jefatura </label>
                                    <p id="GrupoJefatura">{{$personal->NombreGrupo}} </p>
                                </div>
                            </div> 
                            <div class="col-xs-4">
                                <div class="form-group">                                    
                                    <label for="DependenciaTaller">Dependencia/Taller </label>
                                    <p id="DependenciaTaller">{{$personal->NombreTaller}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="form-group">
                                    
                                    <label for="Escuadron">Área / Escuadron</label>
                                    <p id="Escuadron">{{$personal->NombreEscuadron}}</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">                                    
                                    {{-- <label for="Ciudad">Cargo</label>
                                    <p id="Cargo">{{$personal->NombreUnidad}}</p> --}}
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">                                    
                                    <label for="TallerDepe">Profesion:</label>
                                    <p id="TallerDepe">{{$personal->CarreraProfesion}}</p>
                                </div>
                            </div>                                  
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label for="Ciudad">Cargo</label>
                                    <p id="Cargo">{{$personal->Cargo}}</p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="Ciudad">Especialidad Certificación</label>
                                    <p id="Cargo">{{$personal->Especialidad}}</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">                        
                            <div class="col-xs-12">
                                <div class="form-group">
                                                                    
                                    <label for="Observaciones">Nivel de competencia</label>
                                    <p id="Observaciones">{{$personal->Denominacion}}</p>
                                </div>
                            </div>                                                
                        </div>                       
                    </div>
                    
                </div>


                <div class="card">
                    <div class="card-head style-primary text-center">
                            <header>
                                Cursos
                            </header>
                    </div><!--end .card-head -->
                
                    <div class="card-body">

                        @foreach($cursos as $curso)
                            <div class="row"> 
                                <div class="col-xs-12">
                                    <div class="form-group">                                        
                                        <label for="TipoHiculo"> Curso: </label>
                                        <p id="TipoHiculo"> {{$curso->NombreCurso}} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach                      
                    </div>

                </div>

                <div class="card">
                    <div class="card-head style-primary text-center">
                            <header>
                                Información Familiar
                            </header>
                    </div><!--end .card-head -->
                
                    <div class="card-body">

                        @foreach ($familiares as $familiar)
                            <div class="row"> 
                                <div class="col-xs-3">
                                    <div class="form-group">                                        
                                        <label for="TipoHiculo"> Parentesco: </label>
                                        <p id="TipoHiculo"> {{$familiar->Parentesco}} </p>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">                                        
                                        <label for="TipoHiculo"> Nombres y apellidos: </label>
                                        <p id="TipoHiculo"> {{$familiar->Nombre}} </p>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">                                        
                                        <label for="TipoHiculo"> Telefono: </label>
                                        <p id="TipoHiculo"> {{$familiar->Telefono}} </p>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">                                        
                                        <label for="TipoHiculo"> Dirección: </label>
                                        <p id="TipoHiculo"> {{$familiar->Direccion}} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach 
                    </div>

                </div>
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