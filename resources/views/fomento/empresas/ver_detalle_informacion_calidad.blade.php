@extends('partials.card')

@extends('layout')

@section('title')
Información Calidad
@endsection()

@section('addcss')

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


{{-- wizard --}}
<script type="text/javascript">
  $(document).ready(function(){
    $('input[type="radio"]').click(function(){
      var inputValue = $(this).attr("value");
      var targetBox = $("." + inputValue);
      $(".cardmain").not(targetBox).hide();
      $(targetBox).show();
    });
  });
</script>

@endsection()



@section('content')

@section('card-content')
@section('card-title')

<div class="row">
  {{ Breadcrumbs::render('detalle_informacion_calidad') }}

</div>

@endsection()

@section('card-content')


<div class="col-lg-12">
	{{-- TABS HEADERS --}}
  <h2 style="color:navy;float:right; padding-bottom: 30px;">{!!$empresa->NombreEmpresa!!}/Nit:{!! $empresa->Nit!!}</h2>
  <ul class="nav nav-tabs">
   <li class="active"><a data-toggle="tab" href="#home">Gestión Calidad</a></li>
   <li><a data-toggle="tab" href="#menu1">Aspectos<br>estrategicos</a></li>

 </ul>
 {{-- END TABS HEADERS --}}
 {{-- TABS CONTENT --}}
 <div class="tab-content">

   {{-- Gestion Calidad Content --}}
   <div id="home" class="tab-pane fade in active">    
    <div class="row">
      <div class="col-md-12">
        
        <div class="panel-group" id="accordion1">
          <div class="cardmain card panel">
            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1" aria-expanded="false">
              <header>La Empresa cuenta con un sistema de certificacion de calidad de productos?</header>
              <div class="tools">
                <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
            <div id="accordion1-1" class="collapse" aria-expanded="false" style="height: 0px;">
              <center>
                <div class="card-body">
                  <div class="row">
                    <div>
                      <label class="radio-inline radio-styled">
                        <input type="radio" name="user-input" value="yes"><span>Si</span>
                      </label>
                      <label class="radio-inline radio-styled">
                        <input type="radio" name="user-input" value="no"><span>No / No Aplica</span>
                      </label>

                    </div>
                  </div>
                </div>
              </center>
            </div>
          </div><!--end .panel -->
          <div style="display:none;" class="yes card panel" >
            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2" aria-expanded="false">
              <header>Indicar todas las certificaciones (incluyendo el producto si es relevante)</header>
              <div class="tools">
                <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
            <div id="accordion1-2" class="collapse" aria-expanded="false" style="height: 0px;">
      
            <div class="card-body"> 
              <div class="table-responsive">  
                  <table class="table table-striped table-hover"> 
                    <thead>
                      <th>Norma de certificación</th>
                      <th>Organismo certificador</th>
                      <th>Fecha de validez</th>
                      <th>X</th>
                    </thead> 
                    <tbody>
                      @foreach ($sistemascertcalidad as $sistemacert)
                      <tr class="sistemacertificacion{{$sistemacert->IdSistemaCalidad}}">
                        <td>{{$sistemacert->NormaCertificacion}}</td>
                        <td>{{$sistemacert->OrganismoCertificador}}</td>
                        <td>{{$sistemacert->FechaValidezCertificacion}}</td>
                        <td>
                          <button class="btn btn-danger btn-delete delete-record" value="{{$sistemacert->IdSistemaCalidad}}"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                      </tr>
                      @endforeach()
                    </tbody>
                  </table> 

                  </div>
              
              <form name="gestioncalidadsi" id="gestioncalidadsi">
                  {{ csrf_field()}}

                  <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}" >
                  
                <table class="table table-striped table-hover" id="dynamic_field_sistemacertificacioncalidad">
                </table>

                 <br>  
                <button type="button" name="add_certificacion" id="add_certificacion" class="btn btn-success">Nuevo Campo</button>
                <br>
              
              <br>
              
              <input type="button" name="submitgestioncalidadsi" id="submitgestioncalidadsi" class="btn btn-info btn-block" value="Guardar" />

              {{-- alerts --}}
                <div class="alert alert-danger print-error-msg-gestioncalidadsi" style="display:none">
                  <ul></ul>
                </div>

                <div class="alert alert-success print-success-msg-gestioncalidadsi" style="display:none">
                  <ul></ul>
                </div> 

              </form>
              
              </div> {{-- card body --}}

            </div>
          </div>
        </div><!--end .panel -->

        


        {{-- GESTION CALIDAD (ANSWER IS NO) --}}

        <div style="display:none;" class="no card panel">
          <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-3" aria-expanded="false">
            <header>Porfavor responda al siguiente cuestionario</header>
            <div class="tools">
              <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>

          <div id="accordion1-3" class="collapse" aria-expanded="false">
            <div class="card-body">


              <div class="card-body no-padding">

                <form name="gestioncalidadno" id="gestioncalidadno">

                <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}" required>

                  <ul class="list">
                    <li class="tile">
                      <a class="tile-content ink-reaction">
                        {!! Form::select('SGCImplementado', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->SGCImplementado) ? $gestioncalidad->SGCImplementado : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

                        <div class="tile-text">
                          <small>
                           <b>1.</b> La empresa tiene un SGC implementado?
                         </small>
                       </div>

                     </a>
                   </li>

                   <li class="divider-full-bleed"></li>

                   <li class="tile">
                    <a class="tile-content ink-reaction">
                      {!! Form::select('SGCFaseEjecucion', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->SGCFaseEjecucion) ? $gestioncalidad->SGCFaseEjecucion : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                      <div class="tile-text">
                        <small>
                         <b>2.</b> La empresa tiene un SGC en la fase de ejecución?
                       </small>

                     </div>
                   </a>
                 </li>

                 <li class="divider-full-bleed"></li>

                 <li class="tile">
                  <a class="tile-content ink-reaction">
                    {!! Form::select('ManualCalidadProcedimientos', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ManualCalidadProcedimientos) ? $gestioncalidad->ManualCalidadProcedimientos : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                    <div class="tile-text">
                      <small>
                       <b>3.</b> Existe un manual de calidad y procedimientos escritos?
                     </small>

                   </div>
                 </a>
               </li>

               <li class="divider-full-bleed"></li>


               <li class="tile">
                <a class="tile-content ink-reaction">
                  {!! Form::select('ProcedimientoControlDocumentos', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ProcedimientoControlDocumentos) ? $gestioncalidad->ProcedimientoControlDocumentos : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                  <div class="tile-text">
                    <small>
                     <b>4.</b> Existe un procedimiento de control de documentos?
                   </small>

                 </div>
               </a>
             </li>

             <li class="divider-full-bleed"></li>


             <li class="tile">
              <a class="tile-content ink-reaction">
                {!! Form::select('ProcesoFabricacionServicios', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ProcesoFabricacionServicios) ? $gestioncalidad->ProcesoFabricacionServicios : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
                <div class="tile-text">
                  <small>
                   <b>5.</b> Procesos de fabricación y servicios estan documentados?
                 </small>
               </div>
             </a>
           </li>

           <li class="divider-full-bleed"></li>


           <li class="tile">
            <a class="tile-content ink-reaction">
              {!! Form::select('EspecificacionesCliente', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->EspecificacionesCliente) ? $gestioncalidad->EspecificacionesCliente : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
              <div class="tile-text">

                <small>
                 <b>6.</b> Se examinan en detalle las especificaciones del cliente?
               </small>
             </div>
           </a>
         </li>

         <li class="divider-full-bleed"></li>

         <li class="tile">
          <a class="tile-content ink-reaction">
           {!! Form::select('TrazabilidadProductos', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->TrazabilidadProductos) ? $gestioncalidad->TrazabilidadProductos : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
            <div class="tile-text">

              <small>
               <b>7.</b> El sistema permite trazabilidad de los productos?
             </small>
           </div>
         </a>
       </li>
       <li class="divider-full-bleed"></li>
       <li class="tile">
        <a class="tile-content ink-reaction">
          {!! Form::select('ProcedimientoEscritoInspecciones', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ProcedimientoEscritoInspecciones) ? $gestioncalidad->ProcedimientoEscritoInspecciones : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
          <div class="tile-text"> 
            <small>
             <b>8.</b> Existe un procedimiento escrito para las inspecciones?
           </small>
         </div>
       </a>
     </li>


     <li class="tile">
      <a class="tile-content ink-reaction">
        {!! Form::select('ProcedimientoProductoNoConforme', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ProcedimientoProductoNoConforme) ? $gestioncalidad->ProcedimientoProductoNoConforme : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
        <div class="tile-text">
          <small>
           <b>9.</b> Existe un procedimiento de producto no conforme?
         </small>
       </div>
     </a>
   </li>


   <li class="tile">
    <a class="tile-content ink-reaction">
      {!! Form::select('ProcedimientoAccionesCorrectivas', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->ProcedimientoAccionesCorrectivas) ? $gestioncalidad->ProcedimientoAccionesCorrectivas : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
      <div class="tile-text"> 
        <small>
         <b>10.</b> Existe un procedimiento de acciones correctivas?
       </small>
     </div>
   </a>
 </li>


 <li class="tile">
  <a class="tile-content ink-reaction">
    {!! Form::select('PlanCalibracionEquipos', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->PlanCalibracionEquipos) ? $gestioncalidad->PlanCalibracionEquipos : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}
    <div class="tile-text">
      <small>
       <b>11.</b> Existe un plan para la calibración de equipos?
     </small>
   </div>
 </a>
</li>

<li class="tile">
  <a class="tile-content ink-reaction">
    {!! Form::select('SistemasCertificacion', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($gestioncalidad->SistemasCertificacion) ? $gestioncalidad->SistemasCertificacion : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

    <div class="tile-text">
      <small>
        <b>12.</b> La empresa cuenta con un sistema de certificación de calidad de productos?
     </small>
   </div>

 </a>
</li>

</ul>


<br><br>
<div class="col-sm-6">  
 <input type="button" name="submitgestioncalidadno" id="submitgestioncalidadno" class="btn btn-info btn-block" value="Guardar" />
</div>

<div class="col-sm-6">  
  <button type="button" class="btn btn-danger btn-block">Cancelar</button>
</div> 

</form>

{{-- alerts --}}
  <div class="alert alert-danger print-error-msg-gestioncalidadno" style="display:none">
    <ul></ul>
  </div>

  <div class="alert alert-success print-success-msg-gestioncalidadno" style="display:none">
    <ul></ul>
  </div>


</div> {{-- card-body no padding --}}
</div>
</div>
</div><!--end .panel -->
</div><!--end .panel-group -->
</div><!--end .col -->




</div>


{{-- Aspectos estrategicos content --}}
<div id="menu1" class="tab-pane fade">
 <div class="card-body floating-label">
<form name="aspectosestrategicos" id="aspectosestrategicos">
    {{ csrf_field() }}

  <input type="hidden" name="IdEmpresa" id="IdEmpresa" value="{{$empresa->IdEmpresa}}">
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12">
          <div class="form-group">
            {!! Form::select('SistemasPlaneacion', [
                         'si' => 'si',
                         'no' => 'no',
                         'n/a' => 'n/a',
                         ], old('value', isset($aspectoestrategico->SistemasPlaneacion) ? $aspectoestrategico->SistemasPlaneacion : null ), [ 'class' =>  'pull-right form-control', 'style' => 'width: 20%', 'required']) !!}

                         <label for="SistemasPlaneacion">9.1 La Empresa Cuenta con Sistemas de Planeación ?</label>
          </div>
        </div>
        <div class="col-xs-12">
         <h4> 9.2 En la siguiente tabla indique que Objetivos Estratégicos de los que se encuentran en el listado desplegable de la primera columna tiene actualmente la empresa</h4>
       </div>
     </div>   
   </div>       

   <div class="row">
    <div class="card-body"> 
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <th>Objetivo</th>
            <th>Aceptación</th>
            <th>Observaciones</th>
            <th>x</th>
          </thead>
          <tbody>
            @foreach($objetivosestrategicosaspectos as $objetivoestrategicoaspecto)
            <td>{{$objetivoestrategicoaspecto->objetivosEstrategicos->NombreObjetivo}}</td>
            <td>{{$objetivoestrategicoaspecto->AceptacionObjetivo}}</td>
            <td>{{$objetivoestrategicoaspecto->Observaciones}}</td>
            <td><button class="btn btn-danger btn-delete delete-record" value="{{$objetivoestrategicoaspecto->IdObjetivoEstrategicoEmp}}"><span class="glyphicon glyphicon-trash"></span></button></td>
          </tbody>
          @endforeach()
        </table>
        <table id="dynamic_field_aspectosestrategicos">
          
        </table>
        <br>  
        <button type="button" name="addaspectoestrategico" id="addaspectoestrategico" class="btn btn-success">Nuevo Campo</button>
        <br>
      </div>

    </div>


  </div>

  <br>
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-12">
        <div class="row">
          <div class="form-group">
            <label for="PorcentajeTiempoTrab">9.3 Formación de recursos Humanos: Cuál es el Porcentaje estimado de tiempo de trabajo que se emplea en la formación del personal ? <br> % Tiempo de Formación Estimado <br> (No. Horas Entretenimiento Hombre/ No. Horas Trabajo Hombre =) </label>
          </div>

          <input style="width: 40%;" type="text" class="form-control" value="{{old('HorasTiempoTrabajo', isset($aspectoestrategico->HorasTiempoTrabajo) ? $aspectoestrategico->HorasTiempoTrabajo : null) }}" id="HorasTiempoTrabajo" name="HorasTiempoTrabajo" required>
        </div>
      </div>                          
    </div>   
  </div>
  <input type="hidden" class="form-control" id="IdEmpresa" name="IdEmpresa" value="{{$empresa->IdEmpresa}}" required>
  <br>

  <div class="alert alert-danger print-error-msg-aspectosestrategicos" style="display:none">
    <ul></ul>
  </div>

  <div class="alert alert-success print-success-msg-aspectosestrategicos" style="display:none">
    <ul></ul>
  </div>

  <br>
  <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
        <input type="button" name="submitaspectosestrategicos" id="submitaspectosestrategicos" class="btn btn-info btn-block" value="Guardar" />
      </div>
      <div class="col-sm-6">
        <button type="button"  style="" class="btn btn-danger btn-block">Cancelar</button>
      </div>
    </div>
  </div>                    
</div>{{-- End Aspectos estrategicos form --}}

</form>

</div>
{{-- END estrategicos content --}}
</div>

{{-- END TABS CONTENT --}}
</div><!--end .col -->




{{-- AJAX gestioncalidadsi --}}
<script type="text/javascript">

  $(document).ready(function(){

   
    var postURLGESTIONCALIDADSI = "<?php echo url('/storegestioncalidadsi'); ?>";
    var i=1; 
'<input type="hidden" name="IdEmpresa" id="IdEmpresa">'+
    $(document).on('click', '#add_certificacion', function(){  
     i++;  
      $('<tr id="row'+i+'" class="dynamic_field_sistemacertificacioncalidad-added">'+
        '<td><input type="text" name="NormaCertificacion[]"/></td>'+
        '<td><input name="OrganismoCertificador[]" type="text" /></td>'+
        '<td><div class="input-group date" id="demo-date-'+i+'"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><div class="input-group-content"><input style="width: 80%;" name="FechaValidezCertificacion[]" type="text" class="form-control"></div></div></td>'+
        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_certificacion">X</button></td></tr>').appendTo('#dynamic_field_sistemacertificacioncalidad');
   });  

    // datapicker appending
    $(document).on('focus',".date", function(){
      $(this).datepicker();
    });

    // remove field
    $(document).on('click', '.btn_remove_certificacion', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   }); 


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#submitgestioncalidadsi').click(function(){            
     $.ajax({
      url:postURLGESTIONCALIDADSI,  
      method:"POST",  
      data:$('#gestioncalidadsi').serialize(),
      type:'json',
      success:function(data){
        if(data.error){
          printErrorMsggestioncalidadsi(data.error);
        }else{
          i=1;

          $(".print-success-msg-gestioncalidadsi").find("ul").html('');
          $(".print-success-msg-gestioncalidadsi").css('display','block');
          $(".print-error-msg-gestioncalidadsi").css('display','none');
          $(".print-success-msg-gestioncalidadsi").find("ul").append("<center><li style='list-style: none;'>Sistema certificación añadido satisfactoriamente</li> </center>");
          // $('#gestioncalidadsi :input').attr("disabled", true);
          $('#dynamic_field_sistemacertificacioncalidad :input').prop("disabled", true);
        }
      }  
    });  
   }); 

    function printErrorMsggestioncalidadsi(msg) {
     $(".print-error-msg-gestioncalidadsi").find("ul").html('');
     $(".print-error-msg-gestioncalidadsi").css('display','block');
     $(".print-success-msg-gestioncalidadsi").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg-gestioncalidadsi").find("ul").append('<li>'+value+'</li>');
    });
   }


    // delete gestion calidad

   $(document).on('click','.delete-record',function(){
        
        var idsistemacalidad = $(this).val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type: "DELETE",
            url: '/deletegestioncalidadsi' + '/' + idsistemacalidad,
            success: function (data) {
                console.log(data);
                $(".sistemacertificacion" + idsistemacalidad).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });





 }); 


  


</script>


{{-- AJAX (storeGestionCalidadNo)  --}}
<script type="text/javascript">

  $(document).ready(function(){

    var postURLGESTIONCALIDADNO = "<?php echo url('/storegestioncalidadno'); ?>";

    $('#submitgestioncalidadno').click(function(){            
     $.ajax({  
      url:postURLGESTIONCALIDADNO,  
      method:"POST",  
      data:$('#gestioncalidadno').serialize(),
      type:'json',
      success:function(data){
        if(data.error){
          printErrorMsggestioncalidadno(data.error);
        }else{
          i=1;

          $(".print-success-msg-gestioncalidadno").find("ul").html('');
          $(".print-success-msg-gestioncalidadno").css('display','block');
          $(".print-error-msg-gestioncalidadno").css('display','none');
          $(".print-success-msg-gestioncalidadno").find("ul").append("<center><li style='list-style: none;'>Gestion calidad añadido</li> </center>");
          $('#gestioncalidadno :input').attr("disabled", true);
        }
      }  
    });  
   }); 

    function printErrorMsggestioncalidadno (msg) {
     $(".print-error-msg-gestioncalidadno").find("ul").html('');
     $(".print-error-msg-gestioncalidadno").css('display','block');
     $(".print-success-msg-gestioncalidadno").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg-gestioncalidadno").find("ul").append('<li>'+value+'</li>');
    });
   }

 }); 



</script>



{{-- Ajax  --}}
<script type="text/javascript">
  $(document).ready(function(){      
    // setup variable to post to controller
    var postURL = "<?php echo url('informacioncalidad'); ?>";
    var i=1;  

    $('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added-gestioncalidadsi"><td><input type="text" name="name[]"/></td><td><input name="OrganismoCertificador[]" type="text" /></td><td><div class="input-group date" id="demo-date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><div class="input-group-content"><input style="width: 80%;" name="FechaValidezCertificacion[]" type="text" class="form-control"></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
   });  

    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  


    $('#submit').click(function(){            
     $.ajax({  
      url:postURL,  
      method:"POST",  
      data:$('#objetivos').serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          printErrorMsg(data.error);
        }else{
          i=1;
          $('.dynamic-added').remove();
          $('#objetivos')[0].reset();
          $(".print-success-msg").find("ul").html('');
          $(".print-success-msg").css('display','block');
          $(".print-error-msg").css('display','none');
          $(".print-success-msg").find("ul").append('<li>Record anadido exitosamente.</li>');
        }
      }  
    });  
   });  

    function printErrorMsg (msg) {
     $(".print-error-msg").find("ul").html('');
     $(".print-error-msg").css('display','block');
     $(".print-success-msg").css('display','none');
     $.each( msg, function( key, value ) {
      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
   }
 });  
</script>


{{-- Ajax (Aspectos Estrategicos) --}}
<script type="text/javascript">

  $(document).ready(function(){      
    // setup variable to post to controller
    var postURLASPECTOSESTRATEGICOS = "<?php echo url('/storeaspectosestrategicos'); ?>";
    var i=1;  
    var j=-1;

    $(document).on('click', '#addaspectoestrategico', function(){  
     i++;
     j++;  
    $('<table>'+
      '<tbody>'+
      '<tr id="row'+i+'" class="dynamic-added-aspecto">'+
       '<input type="hidden" name="IdEmpresa" id="IdEmpresa">'+  
      '<td><div class="form-group">{{ Form::select('IdObjetivoEstrategico[]', $objetivos->pluck('NombreObjetivo', 'IdObjetivoEstrategico'), null, ['class' => 'form-control', 'id' => 'IdObjetivoEstrategico']) }}</div></td>'+
      '<td><input style="margin-left:40px; margin-right: 20px;" type="radio"  name="AceptacionObjetivo['+j+']" id="si_'+j+'" value="si" /><label>Si</label></td>'+
      '<td><input style="margin-left:20px; margin-right: 20px;" type="radio"  name="AceptacionObjetivo['+j+']" id="no_'+j+'" value="no" /><label>No</label> </td>'+
      '<td><input style="margin-left:20px; margin-right: 20px;" type="radio"  name="AceptacionObjetivo['+j+']" id="n/a_'+j+'" value="n/a"/><label>N/A </label> </td>'+
      '<td><input style="margin-left:60px;" name="Observaciones[]" type="text" />'+
      '</td><td><button style="margin-left:30px;" type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr></tbody></table>').appendTo('#dynamic_field_aspectosestrategicos');  

   });  

    $(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
   });  

    $('#submitaspectosestrategicos').click(function(){            
     $.ajax({  
      url:postURLASPECTOSESTRATEGICOS,  
      method:"POST",
      beforeSend: function (xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
      },  
      data:$('#aspectosestrategicos').serialize(),
      type:'json',
      success:function(data)  
      {
        if(data.error){
          $(".print-error-msg-aspectosestrategicos").find("ul").html('');
          $(".print-success-msg-aspectosestrategicos").css('display','none');
          $(".print-error-msg-aspectosestrategicos").css('display','block');
          $.each( msg, function( key, value ) {
            $(".print-error-msg-aspectosestrategicos").find("ul").append('<li>'+value+'</li>');
          });
        }else{
          i=1;
          $(".print-success-msg-aspectosestrategicos").find("ul").html('');
          $(".print-success-msg-aspectosestrategicos").css('display','block');
          $(".print-error-msg-aspectosestrategicos").css('display','none');
          $(".print-success-msg-aspectosestrategicos").find("ul").append('<li>Aspecto añadido satisfactoriamente</li>');
        }
      } 
    });  
   });  


    $(document).on('click','.delete-record',function(){
        
        var idaspectoestrategico = $(this).val();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            type: "DELETE",
            url: '/deleteaspectoestrategico' + '/' + idaspectoestrategico,
            success: function (data) {
                console.log(data);
                $(".aspectoestrategico" + idaspectoestrategico).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });







 });  


</script>


@endsection()

@endsection()

@endsection()