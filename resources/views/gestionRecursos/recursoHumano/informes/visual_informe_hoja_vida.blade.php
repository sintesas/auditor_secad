@extends('partials.card')

@extends('layout')

@section('title')
Informe Hoja de Vida
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($personal) !!}
{{ csrf_field()}}

@endsection


@section('card-title')
{{-- Informe Inspección IC FR 08 --}}
{{ Breadcrumbs::render('ver_informehojadevida') }}
@endsection()

@section('card-content')       

<div class="card-body floating-label">
  <!-- BEGIN BASE-->
  <div id="">


    @section('card-content')       
    <div class="card-body floating-label">
        @if(count($personal) != 0)
        @foreach($personal as $personalR)  
        <div class="card">
            <div class="card-head card-head-sm style-primary">
                <header>
                    Información Personal
                </header>
            </div><!--end .card-head -->     
            <div class="card-body">
               <div class="row">
                <div class="col-sm-3" >
                    <div class="foto-personalInf form-group">                                    
                        <img id="image_upload_preview" src="{{URL::asset('secad/Personal/Fotos/'.$personalR->Cedula.'/'.$personalR->Foto)}}" alt="profile Pic">
                    </div>

                </div>
                <div class="col-sm-9">
                    <div class="col-sm-6" >
                        <div class="form-group">
                            <label >Nombres:</label>
                            {{$personalR->Nombres}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="Apellidos">Apellidos:</label>
                            {{$personalR->Apellidos}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">                                   
                            <label for="NombreTipoDoc">Tipo Documento:</label>
                            {{$personalR->NombreTipoDoc}}
                        </div>
                    </div>    
                    <div class="col-sm-6" >
                        <div class="form-group">                                   
                            <label for="IdTipoDoc">Número de Documento:</label>
                            {{$personalR->Cedula}}
                        </div>
                    </div>

                    <div class="col-sm-6" >
                        <div class="form-group">                                   
                            <label for="IdTipoDoc">Lugar de Expedición:</label>
                            {{$personalR->Lugarexpedicion}}
                        </div>
                    </div>    
                    <div class="col-sm-6" >
                        <div class="form-group">                                   
                            <label for="IdTipoDoc">Lugar de nacimiento:</label>
                            {{$personalR->LugarNacim}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="LugarNacim"> Lugar de nacimiento: </label>
                            {{$personalR->LugarNacim}}
                        </div>
                    </div>    
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="LugarNacim"> Fecha de nacimiento: </label>
                            {{$personalR->FechaNacim}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="Edad"> Edad: </label>
                            {{$personalR->Edad}}
                        </div>
                    </div>    
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="Email"> Email Corporativo:</label>
                            {{$personalR->Email}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                        <div class="form-group">                                    
                            <label for="Email"> Email Personal:</label>
                            {{$personalR->EmailPersonal}}
                        </div>
                    </div>
                    <div class="col-sm-6" >
                       <div class="form-group">                                   
                        <label for="Categoria">Tipo Personal:</label>
                        {{$personalR->Categoria}}
                    </div>
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
                    <label for="IdEmpresa">Organización: </label>
                    {{$personalR->NombreEmpresa}}
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">                                   
                    <label for="DependenciaFacultad">Dependencia/Facultad:</label>
                    {{$personalR->DependeciaFacultad}}
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">                                   
                    <label for="IdCarreraProfesion">Profesion/Carrera:</label>
                    {{$personalR->CarreraProfesion}}
                </div>
            </div> 
            <div class="col-xs-6">
                <div class="form-group">                                    
                    <label for="Escolaridad"> Escolaridad: </label>
                    {{$personalR->Escolaridad}}
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-xs-6">
                <div class="form-group">                                   
                    <label for="IdCargo"> Cargo: </label>
                    {{$personalR->Cargo}}
                </div>
            </div> 
            <div class="col-xs-6">
                <div class="form-group">                                    
                    <label for="IdNivelCompetencia"> Nivel Competencia SECAD: </label>
                    {{$personalR->NivelCompetencia}}
                </div>
            </div> 

        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">                                  
                    <label for="Experiencia"> Experiencia: </label>
                    {{$personalR->AreaExperiencian}}
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">                                    
                    <label for="LugarNacim"> Fecha incorporación SECAD: </label>
                    ...
                </div>
            </div>
        </div>

        <div class="row">                      

            <div class="col-xs-6">
                <div class="form-group">                                 
                    <label for="AreaSecad"> Area SECAD: </label>
                    ...
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">                                 
                    <label for="IdSupervisor"> Supervisor SECAD: </label>
                    ...
                </div>

            </div>
        </div>

        <div class="row">                        

            <div class="col-xs-4">
                <div class="form-group">                                   
                    <label for="Celular">Celular:</label>
                    {{$personalR->Celular}}
                </div>
            </div>                        
            <div class="col-xs-4">
                <div class="form-group">                                    
                    <label for="Fijo">Fijo:</label>
                    {{$personalR->Fijo}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                                    
                    <label for="Oficina"> Oficina: </label>
                    {{$personalR->Oficina}}
                </div>
            </div>
        </div>

        <div class="row">                        
            <div class="col-xs-4">
                <div class="form-group">                                    
                    <label for="PaisResidencia">Pais:</label>
                    {{$personalR->PaisResidencia}}
                </div>
            </div>                            
            <div class="col-xs-4">
             <div class="form-group">                                    
                <label for="LugarNacim"> Fecha Termino: </label>
                {{$personalR->FechaTermino}}
            </div>
        </div> 
        <div class="col-xs-4">
            <div class="form-group">                                   
                <label for="EstadoCivil"> Estado Civil: </label>
                {{$personalR->EstadoCivil}}
            </div>
        </div>                
    </div>

    <div class="row">                        

        <div class="col-xs-6">
            <div class="form-group">                                    
                <label for="DireccionResi">Direccion Residencia:</label>
                {{$personalR->DireccionResi}}
            </div>
        </div>  
        <div class="col-xs-6">
            <div class="form-group">                                    
                <label for="Barrio">Barrio:</label>
                {{$personalR->Barrio}}
            </div>
        </div>                        

    </div>
</section>
</div><!--end #content-->
<!-- END CONTENT -->     
</div>


<div class="card" id="infoMilitar">
    <div class="card-head card-head-sm style-primary">
        <header>
            Información Militar
        </header>
    </div><!--end .card-head -->
    <div class="card-body">  

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">                                 
                    <label for="IdGrado">Grado: </label>
                    {{$personalR->NombreGrado}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                                
                    <label for="CodigoMilitar">Codigo Militar:</label>
                    {{$personalR->Abreviatura}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                                
                    <label for="NFolio">N. Folio de Vida:</label>
                    {{$personalR->NoFolioVida}}
                </div>
            </div>                        

        </div>

        <div class="row">

            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="IdFuerza"> Fuerza: </label>
                    {{$personalR->NombreFuerza}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="IdCuerpo"> Cuerpo: </label>
                    {{$personalR->NombreCuerpo}}
                </div>
            </div> 
            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="EspPrimaria"> Esp. Primaria: </label>
                    {{$personalR->NombreEspecialidad1}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">                                
                    <label for="EspSecundaria"> Esp. Secundaria: </label>
                    {{$personalR->NombreEspecialidad2}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                                    
                    <label for="LugarNacim"> Fecha Incorporación: </label>
                    {{$personalR->FechaIncorporacion}}
                </div>
            </div>                        
            <div class="col-xs-4">
                <div class="form-group">                                    
                    <label for="LugarNacim"> Fecha Último Ascenso: </label>
                    {{$personalR->FechaAsense}}
                </div>
            </div>  
        </div>

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="IdUnidad"> Unidad: </label>
                    {{$personalR->NombreUnidad}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                                
                    <label for="GrupoJefa"> Grupo/Jefatura: </label>
                    {{$personalR->NombreGrupo}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="DependenciaTaller"> Dependencia/ Taller: </label>
                    {{$personalR->NombreTaller}}
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="form-group">                               
                    <label for="IdEscuadron">Escuadron:</label>
                    {{$personalR->NombreEscuadron}}
                </div>
            </div>  
             <div class="col-xs-4">
                <div class="form-group">                                
                    <label for="IdCarreraProfesion"> Profesion: </label>
                    {{$personalR->CarreraProfesion}}
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col-xs-8">
                <div class="form-group">                                
                    <label for="IdCargo"> Cargo: </label>
                    {{$personalR->Cargo}}
                </div>
            </div> 
            <div class="col-xs-4">
                <div class="form-group">                               
                    <label for="IdEspecialidadCertificacion"> Especialidad Certificación: </label>
                    {{$personalR->Especialidad}}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">                               
                    <label for="IdNivelCompetencia"> Nivel de competencia:</label>
                    {{$personalR->Denominacion}}
                </div>
            </div> 
        </div>

</div>
</div>
@endforeach
<br>
@foreach($personal as $persona)
<a href="{{route('informehojadevida.edit', $persona->IdPersonal) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-right"><span class="fa fa-download">    Descargar PDF</span></a>
@endforeach()
@else
<div class="section-body">
    <div class="text-center">
        <h3>No hay datos para mostrar informe</h3>
    </div>
</div>
@endif       
</div>

    <script type="text/javascript">
        $(window).bind("load", function() {
            var tipoPersonal = '{{$personalR->Categoria}}';
            $('#Categoria').attr('readonly', true);

            if(tipoPersonal == 'Militar'){
                $('#infoMilitar').show();
                $('#infoCivil').hide();

            }
            else
            {
                $('#infoMilitar').hide();
                $('#infoCivil').show();

            }

            if(tipoPersonal == ''){
                $('#infoMilitar').hide();
                $('#infoCivil').hide();
            }

            var idgrado = $( "#IdGrado option:selected" ).val();
            $.get("../Cuerpos/" + idgrado + "", function(response, state){

                $('#IdCuerpo').empty();
                $('#IdCuerpo').append('<option value="" selected="selected"></option>');

                for(i=0; i<response.length; i++){
                    $('#IdCuerpo').append('<option value="' + response[i].IdCuerpo + '">' +  response[i].NombreCuerpo + '</option>');
                }

            var cuerpoId = $('#cuerpoId').val();
            $("#IdCuerpo option[value='" + cuerpoId + "']").attr("selected", true);

            var cuerpo = $( "#IdCuerpo option:selected" ).text();
            $("#select2-chosen-12").text(cuerpo);
            $("#lblCuerpo").css( "font-size", "12px" );
            });
        });


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

            $.get("../Cuerpos/" + event.target.value + "", function(response, state){

                $('#IdCuerpo').empty();
                $('#IdCuerpo').append('<option value="" selected="selected"></option>');

                for(i=0; i<response.length; i++){
                    $('#IdCuerpo').append('<option value="' + response[i].IdCuerpo + '">' +  response[i].NombreCuerpo + '</option>');
                }
            });
        });
       
    </script>
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

