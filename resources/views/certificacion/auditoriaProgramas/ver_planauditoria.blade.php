@extends('partials.card')

@extends('layout')

@section('title')
Detalle Plan Auditoría
@endsection()

@section('content')

@section('card-title')
{{ Breadcrumbs::render('verplanauditoria', $id_auditoriaprog) }}	
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
                {{-- <ul class="nav nav-tabs" data-toggle="tabs">
                	<li><a  href="#home">Crear<br>Programa</a></li>
                </ul> --}}
					
					<h2><b>Detalle Plan Auditoría</b></h2>
					<hr>
					<br><br>

                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                <div class="tab-content">
                {!! Form::hidden('id_auditoriaprog', session('id_auditoriaprog')) !!}

    <div id="home" class="tab-pane active">
        <div class="row">
            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="no_programa" name="no_programa" value="{{ old('NoPrograma', $auditoriaPrograma->no_programa) }}" required readonly>
                    <label for="no_programa">No Programa</label>
                </div>
            </div>

            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="descripcion_programa" name="descripcion_programa" value="{{ old('descripcion_programa', $auditoriaPrograma->descripcion_programa) }}" readonly>
                    <label for="descripcion_programa">Descripción del Programa</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="certificado_aplicable" name="certificado_aplicable" value="{{ old('certificadoAplicable', $auditoriaPrograma->certificado_aplicable) }}" readonly>
                    <label for="certificado_aplicable">Certificado Aplicable</label>
                </div>
            </div>

            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="organizacion" name="organizacion" value="{{ old('organizacion', $auditoriaPrograma->organizacion) }}" readonly>
                    <label for="organizacion">Organización</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">	
                <div class="form-group floating-label">
                {{ Form::text('planauditoria_id_listas', $plan_aud->pluck('PlanAuditoria', 'IdPlanAuditoria')->get($auditoriaPrograma->planauditoria_id_listas), ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) }}
                {{ Form::label('planauditoria_id_listas', 'Plan de Auditoría')}}
                </div>
            </div>
            <div class="col-lg-3">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                        {{ Form::text('fecha_planauditoria', $auditoriaPrograma->fecha_planauditoria, ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) }}
                        {{ Form::label('fecha_planauditoria', 'Fecha Plan Auditoría')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
            <div class="col-lg-3">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_auditoria', $auditoriaPrograma->fecha_auditoria, array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly' )) }}
                            {{ Form::label('fecha_auditoria', 'Fecha Auditoría')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
            <div class="col-lg-3">	
            <div class="form-group floating-label">
                            {{ Form::text('modalidad_id_listas',  $modalidad->pluck('Modalidad', 'IdModalidad')->get($auditoriaPrograma->modalidad_id_listas), array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly' )) }}
                            {{ Form::label('modalidad_id_listas', 'Modalidad')}}	
                </div>	
            </div>
        </div>
       
        <div class="row">
    <div class="col-sm-12">
        <label for="i" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px;">Normas y/o Criterios de la Auditoría (Bases Certificación)</label>
        <div class="form-group">
        @if($Repuesto->isEmpty()) 
                <!-- Si Repuesto está vacío, mostramos el mensaje -->
                <span>Sin Bases de Certificación</span>
            @else
            {{ Form::select('id_planauditoriocriterio[]', 
                $Repuesto->mapWithKeys(function($item) {
                    // Concatenar Nombre y Referencia
                    return [$item->IdBaseCertificacion => $item->Nombre . ' | ' . $item->Referencia];
                }),
                $normasCriterios, [
                    'multiple' => 'multiple',
                    'class' => 'form-control',
                    'id' => 'id_planauditoriocriterio',
                    'required',
                    'disabled' => 'disabled',
                    'style' => 'background-color:#e8e8e8; color:#000000; font-size:17px; -webkit-text-fill-color: #000000;'
            ]) }}
            @endif
        </div>
    </div>
</div>

<script>
    // Aplicamos estilos directamente a las opciones después de que Laravel renderice el select
    document.querySelectorAll("#id_planauditoriocriterio option").forEach(option => {
        option.style.color = "#000000"; // Texto negro
        option.style.backgroundColor = "#ffffff"; // Fondo blanco
    });
</script>




        <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                <textarea class="form-control" id="objetivo_auditoria" name="objetivo_auditoria" rows="2" style="resize: vertical; overflow-y: auto;" required readonly>{{ $auditoriaPrograma->objetivo_auditoria }}</textarea>
                <label for="objetivo_auditoria">Objetivos de la auditoría*</label>
                </div>
             </div>
        </div>

        <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                <textarea class="form-control" id="alcance_auditoria" name="alcance_auditoria" rows="2" style="resize: vertical; overflow-y: auto;" required readonly>{{ $auditoriaPrograma->alcance_auditoria }}</textarea>
                <label for="alcance_auditoria">Alcance de la auditoría*</label>
                </div>
             </div>
        </div>

        <div class="row">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">EQUIPO AUDITOR</label>
            </div>
        </div>

        <div class="row">
    <div class="form-table">
        <div class="table-content">
            <table class="table flex-table" id="particularTable">
                <thead>
                    <tr>
                        <th style="margin-left: 120px;">Integrante</th>
                        <th style="margin-left: 180px;">Rol</th>
                    </tr>
                </thead>
                <tbody id="particularBody">
    @foreach($equipoAuditor as $integrante)
        <tr>
            <td style="vertical-align: middle;">
            {{ Form::text('id_integrante[]', $integrante->integrante, ['class' => 'form-control', 'required' => '', 'style' => 'width:400px;border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
            </td>
            <td style="vertical-align: middle;">
                {{ Form::text('id_rol[]', $integrante->Rol, ['class' => 'form-control', 'required' => '', 'style' => 'width:400px;border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>





        <div class="row" style="margin-top:20px;">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">AGENDA DE LA AUDITORÍA</label>
            </div>
        </div>
  
        <div class="row" style="margin-top:10px;">
            <div class="col-lg-4">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_reunion_apertura', $auditoriaPrograma->fecha_reunion_apertura, array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly')) }}
                            {{ Form::label('fecha_reunion_apertura', 'Fecha Reunión de Apertura')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
            
            <div class="col-lg-3">
                <div class="form-group">
                    {{ Form::time('hora_reunion_apertura', $horaApertura, ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) }}
                    {{ Form::label('hora_reunion_apertura', 'Hora Reunión de Apertura', ['class' => 'control-label']) }}  
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_reunion_cierre', $auditoriaPrograma->fecha_reunion_cierre, array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly')) }}
                            {{ Form::label('fecha_reunion_cierre', 'Fecha Reunión de Cierre')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
            
            <div class="col-lg-3">
                <div class="form-group">
                    {{ Form::time('hora_reunion_cierre', $horaCierre, ['class' => 'form-control', 'required' => '', 'readonly' => 'readonly']) }}
                    {{ Form::label('hora_reunion_cierre', 'Hora Reunión de Cierre', ['class' => 'control-label']) }}  
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px;">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">Agenda Auditoría</label>
            </div>
        </div>

        <div class="row">
            <div class="form-table">
                <div class="table-content">
                    <table class="table flex-table" id="particularTable">
                        <thead>
                            <tr>
                                <th style="margin-left: 120px;">Proceso / Aspectos a Auditar / Actividad</th>
                                <th style="margin-left: 80px;">Fecha</th>
                                <th style="margin-left: 80px;">Hora Inicio</th>
                                <th style="margin-left: 80px;">Hora Final</th>
                                <th style="margin-left: 80px;">Responsable</th>
                                <th style="margin-left: 80px;">Auditado</th>
                            </tr>
                        </thead>
                        <tbody id="agenda">
                        @foreach($agendaAuditoria as $agenda)
                        <tr>
        <td style="vertical-align: middle;">
            <textarea type="text" name="proceso[]" class="form-control" style="width: 300px;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el proceso." readonly>{{ $agenda->proceso }}</textarea>
        </td>
        <td style="vertical-align: middle;">
        <input type="text" name="proceso[]" class="form-control" style="width: 80px; height:41px; border: none; border-bottom: 2px solid #48548c; resize: vertical; overflow-y: auto;" value="{{ $agenda->Fecha }}" readonly />
        </td>
        <td style="vertical-align: middle;">
            {{ Form::time('hora_inicio[]', $horaInicio, ['class' => 'form-control', 'required' => '', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
        </td>
        <td style="vertical-align: middle;">
            {{ Form::time('hora_fin[]', $horaFin, ['class' => 'form-control', 'required' => '', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
        </td>
        <td style="vertical-align: middle;">
            {{ Form::text('id_responsable[]',  $agenda->responsable, ['class' => 'form-control id_responsable', 'required', 'style' => 'width: 200px;border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
        </td>
        <td style="vertical-align: middle;">
            <textarea type="text" name="auditado[]" class="form-control" style="width: 150px;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el auditado." readonly>{{ $agenda->auditado }}</textarea>
        </td>
     
    </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

 
                

        <div class="row" style="margin-top:30px;">
        <div class="col-lg-6">    
    <div class="form-group floating-label">
        {{ Form::text('id_firma1', $auditoriaPrograma->Firma1, ['class' => 'form-control', 'required',  'readonly' => 'readonly']) }}
        {{ Form::label('id_firma1', 'Revisa') }}
    </div>
</div>

    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::text('id_cargo_firma1', $auditoriaPrograma->Cargo_Firma1, ['class' => 'form-control', 'required',  'readonly' => 'readonly']) }}
            {{ Form::label('id_cargo_firma1', 'Cargo ') }}
        </div>
    </div>
</div>

<div class="row" style="margin-top:30px;">
<div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::text('id_firma2', $auditoriaPrograma->Firma2, ['class' => 'form-control', 'required',  'readonly' => 'readonly']) }}
            {{ Form::label('id_firma2', 'Revisa') }}
        </div>
    </div>

    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::text('id_cargo_firma2', $auditoriaPrograma->Cargo_Firma2, ['class' => 'form-control', 'required',  'readonly' => 'readonly']) }}
            {{ Form::label('id_cargo_firma2', 'Cargo') }}
        </div>
    </div>
</div>


<div class="row" style="margin-top:30px;">
    <div class="col-sm-6">
        <div class="form-group">
            <input class="form-control" id="auditor_lider" name="auditor_lider" value="{{ $auditoriaPrograma->auditor_lider }}" readonly>
            <label for="auditor_lider">Auditor Líder (Elabora)</label>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <input class="form-control" id="representante_legal" name="representante_legal" value="{{ $auditoriaPrograma->representante_legal }}" readonly>
            <label for="representante_legal">Representante Legal (Acepta)</label>
        </div>
    </div>
</div>



        <div class="row mt-3">   
            <div class="col" style="text-align: right;">    
            <button onclick="location.href='{{ url('auditoriaprogplanauditoria/' . $id_auditoriaprog) }}'" class="btn" style="background:#48548c; color: white;">Volver</button>
            </div>                          
        </div>
    </div>
</div>

			{!! Form::close() !!}
            
			<script type="text/javascript">
				$('select').select2();
			</script>
             <style>
            label {
    margin-top: -20px; 
}
        </style>
<script>
$(document).ready(function() {
    $('#selectRespuesto').on('change', function() {
        const selectedValue = $(this).find('option:selected').text(); 
        $('#auditor_lider').val(selectedValue); 

        var event = new Event('change');
        document.getElementById('auditor_lider').dispatchEvent(event);
    });

    $('#selectJefeArea').on('change', function() {
        const selectedValue = $(this).find('option:selected').text(); 
        $('#representante_legal').val(selectedValue); 

        var event = new Event('change');
        document.getElementById('representante_legal').dispatchEvent(event);
    });
});
</script>


         
			<script type="text/javascript">
				$('#IdPersonalJefeSuplente').change(function(event) {
	                var espP = $('#IdPersonalJefePrograma').val();
	                var espS = event.target.value;
	                if(espP == espS)
	                {
	                    toastr.warning('Seleccione otro(a) Suplente');
	                    $('#select2-chosen-14').text('');
	                    $('#IdPersonalJefeSuplente').val($("#IdPersonalJefeSuplente option:first").val());
	                }
	            });

	            $('#IdPersonalJefePrograma').change(function(event) {
	                var espS = $('#IdPersonalJefeSuplente').val();
	                var espP = event.target.value;
	                if(espP == espS)
	                {
	                    toastr.warning('Seleccione otro(a) Jefe de Programa');
	                    $('#select2-chosen-13').text('');
	                    $('#IdPersonalJefePrograma').val($("#IdPersonalJefePrograma option:first").val());
	                }
	            });
            </script>
 






			@endsection()

		@endsection()

