@extends('partials.card')

@extends('layout')

@section('title')
	Crear Personal
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'personal.store', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_personal')}}
		@endsection()

		@section('card-content')

		 <div class="card-body floating-label">

            <div class="card">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Información Personal
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">
                   <div class="row">
                        <div class="col-sm-4">
                            <div class="foto-personal">
                                {{-- <img id="image_upload_preview" src="" style=""> --}}
                                <img id="image_upload_preview" src="{{URL::asset('/img/user.png')}}" alt="profile Pic">
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                               {!! Form::file('foto', array('class' => 'form-control', 'id' => 'inputFile', 'required', 'accept' => 'image/*')) !!}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Nombres" name="Nombres" required>
                                <label for="Nombres">Nombres</label>
                            </div>
                        </div>                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                                <label for="Apellidos">Apellidos</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::select('IdTipoDoc', $tipodoc->pluck('NombreTipoDoc', 'IdTipoDoc'), null, ['class' => 'form-control', 'id' => 'IdTipoDoc']) }}
                                <label for="IdTipoDoc">Tipo Documento </label>
                            </div>
                        </div> 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Cedula" name="Cedula" required>
                                <label for="Cedula">Número de Documento</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="LugarExpedicion" name="LugarExpedicion" required>
                                <label for="LugarExpedicion"> Lugar de Expedición</label>
                            </div>
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="LugarNacim" name="LugarNacim" required>
                                <label for="LugarNacim"> Lugar de nacimiento </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="input-group date" id="demo-date-format">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" id="FechaNacim" name="FechaNacim" required>
                                        <label for="FechaNacim"> Fecha de nacimiento </label>
                                    </div>
                                    <span class="input-group-addon"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Edad" name="Edad" required readonly>
                                <label for="Edad"> Edad </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="Email" class="form-control" id="Email" name="Email" required>
                                <label for="Email"> Email Institucional</label>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="Email" class="form-control" id="EmailPersonal" name="EmailPersonal" required>
                                <label for="EmailPersonal"> Email Personal</label>
                            </div>
                        </div>               
                        <div class="col-sm-3">
                            <div class="form-group">
                                {{ Form::select('Categoria', [
                                                        '' => '',
                                                        'Civil' => 'Civil',
                                                        'Militar' => 'Militar'
                                                    ], null, ['class' => 'form-control', 'id' => 'Categoria'])}}
                                <label for="Categoria">Tipo Personal</label>
                            </div>
                        </div>  
                        <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="checkbox" id="todosprogramas" name="todosprogramas" checked>
                                    <label for="todosprogramas">Ve todos los programas</label>                            
                                </div>
                        </div>
                    </div> 
                </div><!--end .card-body -->
            </div>

            <div class="card" id="infoCivil">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Información Civil
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">                                                                                
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdEmpresa', $empresa->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa']) }}
                                <label for="IdEmpresa">Organización </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="DependeciaFacultad" name="DependeciaFacultad">
                                <label for="DependeciaFacultad">Dependencia/Facultad</label>
                            </div>
                        </div>
                                               
                        
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdCarreraProfesion', $profesiones->pluck('CarreraProfesion', 'IdCarreraProfesion'), null, ['class' => 'form-control', 'id' => 'IdCarreraProfesion']) }}
                                <label for="IdCarreraProfesion">Profesion/Carrera</label>
                            </div>
                        </div> 
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Escolaridad" name="Escolaridad">
                                <label for="Escolaridad"> Escolaridad </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                         
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdCargo', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control', 'id' => 'IdCargo']) }}
                                <label for="IdCargo"> Cargo </label>
                            </div>
                        </div> 
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdNivelCompetencia', $nivelCompetencias->pluck('Denominacion', 'IdNivelCompetencia'), null, ['class' => 'form-control', 'id' => 'IdNivelCompetencia']) }}
                                <label for="IdNivelCompetencia"> Nivel Competencia SECAD </label>
                            </div>
                        </div> 

                    </div>
                    
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{-- <input type="text" class="form-control" id="Experiencia" name="Experiencia"> --}}
                                <textarea type="text" class="form-control" id="Experiencia" name="Experiencia"></textarea>
                                <label for="Experiencia"> Experiencia </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="input-group date" id="demo-date-format">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" id="FechaIncorporacionSecad" name="FechaIncorporacionSecad">
                                        <label for="FechaIncorporacionSecad">Fecha Incorporación SECAD</label>
                                    </div>
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">                        
                        
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdAreaExperiencia', $areasExperiencia->pluck('AreaExperiencian', 'IdAreaExperiencia'), null, ['class' => 'form-control', 'id' => 'IdAreaExperiencia']) }}
                                <label for="AreaSecad"> Area SECAD </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                {{ Form::select('IdSupervisor', $personal->pluck('Nombres' , 'IdPersonal'), null, ['class' => 'form-control', 'id' => 'IdSupervisor']) }}
                                <label for="IdSupervisor"> Supervisor SECAD </label>
                            </div>
                        </div>
                                              
                                                
                    </div>

                    <div class="row">                        
                        
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Celular" name="Celular">
                                <label for="Celular">Celular</label>
                            </div>
                        </div>                        
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Fijo" name="Fijo">
                                <label for="Fijo">Fijo</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Oficina" name="Oficina">
                                <label for="Oficina"> Oficina </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">                        
                        <div class="col-xs-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="PaisResidencia" name="PaisResidencia">
                                <label for="PaisResidencia">Pais</label>
                            </div>
                        </div>                            
                        <div class="col-xs-4">
                            <div class="form-group">
                                <div class="input-group date" id="demo-date-format">
                                <div class="input-group-content">
                                    <input type="text" class="form-control" id="FechaTermino" name="FechaTermino">
                                    <label for="FechaTermino">Fecha termino</label>
                                </div>
                                <span class="input-group-addon"></span>
                            </div>
                            </div>
                        </div> 
                        <div class="col-xs-4">
                            <div class="form-group">
                                <select class="form-control" id="EstadoCivil" name="EstadoCivil">
                                    <option value=""></option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Union Libre">Union Libre</option>
                                </select>
                                <label for="EstadoCivil"> Estado Civil </label>
                            </div>
                        </div>                
                    </div>

                    <div class="row">                        
                        
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="DireccionResi" name="DireccionResi">
                                <label for="DireccionResi">Direccion Residencia</label>
                            </div>
                        </div>  
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Barrio" name="Barrio">
                                <label for="Barrio">Barrio</label>
                            </div>
                        </div>                        
                                                
                    </div>
                </div> 
            </div> 

            <div class="card" id="infoMilitar">
                <div class="card-head card-head-sm style-primary">
                    <header>
                        Información Militar
                    </header>
                </div><!--end .card-head -->
                <div class="card-body">  

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                 {{ Form::select('IdGrado', $grados->pluck('NombreGrado', 'IdGrado'), null, ['class' => 'form-control', 'id' => 'IdGrado']) }}
                                <label for="IdGrado">Grado </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="CodigoMilitar" name="CodigoMilitar" >
                                <label for="CodigoMilitar">Codigo Militar</label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="NFolio" name="NFolio" >
                                <label for="NFolio">N. Folio de Vida</label>
                            </div>
                        </div>                        
                        
                    </div>



                    <div class="row">

                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdFuerza', $fuerzas->pluck('NombreFuerza', 'IdFuerza'), null, ['class' => 'form-control', 'id' => 'IdFuerza']) }}
                                <label for="IdFuerza"> Fuerza </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                               {{--  {{ Form::select('IdCuerpo', $cuerpos->pluck('NombreCuerpo', 'IdCuerpo'), null, ['class' => 'form-control', 'id' => 'IdCuerpo']) }} --}}
                                <select name="IdCuerpo" id="IdCuerpo" class="form-control"></select>
                                <label for="IdCuerpo"> Cuerpo </label>
                            </div>
                        </div> 

                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdEspecialidad1', $especialidades->pluck('NombreEspecialidad', 'IdEspecialidad'), null, ['class' => 'form-control', 'id' => 'IdEspecialidad1']) }}
                                <label for="EspPrimaria"> Esp. Primaria </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdEspecialidad2', $especialidades->pluck('NombreEspecialidad', 'IdEspecialidad'), null, ['class' => 'form-control', 'id' => 'IdEspecialidad2']) }}
                                <label for="EspSecundaria"> Esp. Secundaria </label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="input-group date" id="demo-date-format">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" id="FechaIncorporacion" name="FechaIncorporacion" >
                                        <label for="FechaIncorporacion">Fecha Incorporación</label>
                                    </div>
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="input-group date" id="demo-date-format">
                                    <div class="input-group-content">
                                        <input type="text" class="form-control" id="FechaAsense" name="FechaAsense" >
                                        <label for="FechaAsense">Fecha Último Ascenso</label>
                                    </div>
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>   
                    </div>

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'id' => 'IdUnidad']) }}
                                <label for="IdUnidad"> Unidad </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdGrupo', $grupos->pluck('NombreGrupo', 'IdGrupo'), null, ['class' => 'form-control', 'id' => 'IdGrupo']) }}
                                <label for="GrupoJefa"> Grupo/Jefatura </label>
                            </div>
                        </div>
                         <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdTaller', $talleres->pluck('NombreTaller', 'IdTaller'), null, ['class' => 'form-control', 'id' => 'IdTaller']) }}
                                <label for="DependenciaTaller"> Dependencia/ Taller </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdEscuadron', $escuadrones->pluck('NombreEscuadron', 'IdEscuadron'), null, ['class' => 'form-control', 'id' => 'IdEscuadron']) }}
                                <label for="IdEscuadron">Escuadron</label>
                            </div>
                        </div>  
                    </div>

                     <div class="row">
                         <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdCarreraProfesionMil', $profesiones->pluck('CarreraProfesion', 'IdCarreraProfesion'), null, ['class' => 'form-control', 'id' => 'IdCarreraProfesionMil']) }}
                                <label for="IdCarreraProfesionMil"> Profesion </label>
                            </div>
                        </div>
                         <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdCargoMil', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control', 'id' => 'IdCargoMil']) }}
                                <label for="IdCargoMil"> Cargo </label>
                            </div>
                        </div> 
                         <div class="col-xs-3">
                            <div class="form-group">
                               {{ Form::select('IdEspecialidadCertificacion', $espeCert->pluck('Especialidad', 'IdEspecialidadCertificacion'), null, ['class' => 'form-control', 'id' => 'IdEspecialidadCertificacion']) }}
                                <label for="IdEspecialidadCertificacion"> Especialidad Certificación </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                {{ Form::select('IdNivelCompetenciaMil', $nivelCompetencias->pluck('Denominacion', 'IdNivelCompetencia'), null, ['class' => 'form-control', 'id' => 'IdNivelCompetenciaMil']) }}
                                <label for="IdNivelCompetenciaMil"> Nivel de competencia</label>
                            </div>
                        </div>  
                        
                    </div>
               
                </div>
			</div>

		  {{-- submit button --}}
		
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("personal.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
        </div>
		{!! Form::close() !!}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.min.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.all.min.js"></script>

        <script type="text/javascript">
            $('select').select2();
        </script>

<script type="text/javascript">
    $('#IdCarreraProfesion').change(function(event) {
        console.log(event.target.value);
    });

    $('#infoMilitar').hide();
    $('#infoCivil').hide();
    $('#Categoria').change(function(event) {
        console.log(event.target.value);
        var tipoPersonal = event.target.value;

        if(tipoPersonal == 'Militar'){
            $('#infoMilitar').show();
            $('#infoCivil').hide();

            $("#infoMilitar input").prop('required',true);
            $("#infoMilitar select").prop('required',true);
            $('.select2-container input').prop('required',false);
            $('#IdEspecialidad2').prop('required',false);
            $('#IdEscuadron').prop('required',false);

            $("#infoCivil input").prop('required',false);
            $("#infoCivil select").prop('required',false);
        }
        else
        {
            $('#infoMilitar').hide();
            $('#infoCivil').show();

            $("#infoMilitar input").prop('required',false);
            $("#infoMilitar select").prop('required',false);

            $("#infoCivil input").prop('required',true);
            $("#infoCivil select").prop('required',true);
            $('.select2-container input').prop('required',false);
        }

        if(tipoPersonal == ''){
            $('#infoMilitar').hide();
            $('#infoCivil').hide();

            $("#infoMilitar input").prop('required',false);
            $("#infoMilitar select").prop('required',false);

            $("#infoCivil input").prop('required',false);
            $("#infoCivil select").prop('required',false);

            $('.select2-container input').prop('required',false);
        }
    });

    /*GET Cuerpos By Grado*/
    $('#IdGrado').change(function(event) {
        console.log(event.target.value);

        $.get("Cuerpos/" + event.target.value + "", function(response, state){

            $('#IdCuerpo').empty();
            $('#IdCuerpo').append('<option value="" selected="selected"></option>');

            for(i=0; i<response.length; i++){
                $('#IdCuerpo').append('<option value="' + response[i].IdCuerpo + '">' +  response[i].NombreCuerpo + '</option>');
            }
        });
    });

    // Previw Img
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });

    $("#Edad").focusin(function(){
        var fecha = $('#FechaNacim').val();
        var edad = calcularEdad(fecha);
        $('#Edad').val(edad);
    });

    // GET EDAD
    function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }

        return edad;
    }

    $('#IdEspecialidad2').change(function(event) {
        var espP = $('#IdEspecialidad1').val();
        var espS = event.target.value;
        if(espP == espS)
        {
            toastr.warning('Seleccione otra Especialidad Secundaria');
            $('#IdEspecialidad2').val($("#IdEspecialidad2 option:first").val());
        }
    });

    $('#IdEspecialidad1').change(function(event) {
        var espS = $('#IdEspecialidad2').val();
        var espP = event.target.value;
        if(espP == espS)
        {
            toastr.warning('Seleccione otra Especialidad Primaria');
            $('#IdEspecialidad1').val($("#IdEspecialidad1 option:first").val());
        }
    });

    $('#Cedula').on('blur', function() {
        var cedula = $(this).val(); 

        if (cedula != '') {
            $.ajax({
                url: '{{ route("verificar.cedula") }}',  
                type: 'GET',
                data: { cedula: cedula },
                success: function(response) {
                    if (response.existe) {
                        Swal.fire({
                            icon: 'error',
                            title: '¡Cédula Existente!',
                            text: 'Este número de identificación ya está registrado. Por favor, ingrese otro número.',
                            confirmButtonText: 'Cerrar',
                        });
                        // Limpiar el campo de cédula para que el usuario pueda ingresarla de nuevo
                        $('#Cedula').val('');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al verificar',
                        text: 'Hubo un error al verificar la cédula. Por favor, intente nuevamente.',
                        confirmButtonText: 'Cerrar',
                    });
                }
            });
        }
    });

</script>

		@endsection()

	@endsection()

@endsection()