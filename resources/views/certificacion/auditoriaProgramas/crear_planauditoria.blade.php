@extends('partials.card')

@extends('layout')

@section('title')
Crear Plan Auditoría
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'crearplanauditoria.store', 'method' => 'POST')) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{ Breadcrumbs::render('crearplanauditoria', $id_auditoriaprog) }} 
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
                {{-- <ul class="nav nav-tabs" data-toggle="tabs">
                    <li><a  href="#home">Crear<br>Programa</a></li>
                </ul> --}}
                    
                    <h2><b>Crear Plan Auditoria</b></h2>
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
                    <input type="text" class="form-control" id="no_programa" name="no_programa" value="{{ old('NoPrograma', $consecutivo) }}" required readonly>
                    <label for="no_programa">No Programa</label>
                </div>
            </div>

            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="descripcion_programa" name="descripcion_programa" value="{{ old('descripcion_programa', $descripcion_programa) }}" readonly>
                    <label for="descripcion_programa">Descripción del Programa</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="certificado_aplicable" name="certificado_aplicable" value="{{ old('certificadoAplicable', $certificado_aplicable) }}" readonly>
                    <label for="certificado_aplicable">Certificado Aplicable</label>
                </div>
            </div>

            <div class="col-lg-6 mb-3">    
                <div class="form-group floating-label">    
                    <input type="text" class="form-control" id="organizacion" name="organizacion" value="{{ old('organizacion', $organizacion) }}" readonly>
                    <label for="organizacion">Organización</label>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-3">
    <div class="form-group floating-label">
        {{ Form::select('planauditoria_id_listas', $plan_aud->pluck('PlanAuditoria', 'IdPlanAuditoria'), null, ['class' => 'form-control']) }}
        {{ Form::label('planauditoria_id_listas', 'Plan de Auditoría') }}
        
        <!-- Mostrar mensaje de error si hay uno -->
        @error('planauditoria_id_listas')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

            <div class="col-lg-3">  
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_planauditoria', null, array('class' => 'form-control', 'required' => '' )) }}
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
                            {{ Form::text('fecha_auditoria', null, array('class' => 'form-control', 'required' => '' )) }}
                            {{ Form::label('fecha_auditoria', 'Fecha Auditoría')}}  
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>  
                </div>  
            </div>
            <div class="col-lg-3">  
            <div class="form-group floating-label">
                        {{ Form::select('modalidad_id_listas', $modalidad->pluck('Modalidad', 'IdModalidad'), null, ['class' => 'form-control']) }}
                        {{ Form::label('modalidad_id_listas', 'Modalidad')}}

                         <!-- Mostrar mensaje de error si hay uno -->
        @error('modalidad_id_listas')
            <div class="text-danger">{{ $message }}</div>
        @enderror
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
                $Repuesto->pluck('Nombre', 'IdBaseCertificacion')->map(function($item, $key) use ($Repuesto) {
                    // Concatenamos Nombre y Referencia en el texto visible, pero aseguramos que el valor sea el IdBaseCertificacion
                    $referencia = $Repuesto->where('IdBaseCertificacion', $key)->pluck('Referencia')->first();
                    return [$key => $item . ' | ' . $referencia]; // Corrección aquí: usamos array() para retornar un array asociativo
                }),
                $normasCriterios, [
                    'multiple' => 'multiple',
                    'class' => 'form-control',
                    'id' => 'id_planauditoriocriterio',
                    'disabled' => 'disabled',
                    'style' => 'background-color:#e8e8e8; color:#000000; font-size:17px; -webkit-text-fill-color: #000000;'
            ]) }}
            @endif
            <div class="form-group">
            <!-- Campo hidden para enviar los IdBaseCertificacion -->
            @foreach ($Repuesto as $item)
                <input type="hidden" name="id_planauditoriocriterio[]" value="{{ $item->IdBaseCertificacion }}">
            @endforeach
        </div>
        </div>
    </div>
</div>




<script>
    // Aplicamos estilos directamente a las opciones después de que Laravel renderice el select
    document.querySelectorAll("#id_planauditoriocriterio option").forEach(option => {
        option.style.color = "#000000"; // Texto negro
        option.style.backgroundColor = "#ffffff"; // Fondo blanco
    });

    document.querySelector('form').addEventListener('submit', function() {
        // Crear un campo oculto con el mismo nombre
        var select = document.getElementById('id_planauditoriocriterio');
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'id_planauditoriocriterio[]';
        hiddenInput.value = Array.from(select.selectedOptions).map(option => option.value).join(',');
        document.querySelector('form').appendChild(hiddenInput);
    });
</script>



<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <textarea class="form-control" id="objetivo_auditoria" name="objetivo_auditoria" rows="2" maxlength="500">{{ old('objetivo_auditoria') }}</textarea>
            <label for="objetivo_auditoria">Objetivos de la auditoría*</label>
            @error('objetivo_auditoria')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <textarea class="form-control" id="alcance_auditoria" name="alcance_auditoria" rows="2" maxlength="300">{{ old('alcance_auditoria') }}</textarea>
            <label for="alcance_auditoria">Alcance de la auditoría*</label>
            @error('alcance_auditoria')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>


       <!-- <div class="row">
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
                        <th style="margin-left: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="particularBody">
                    <tr>
                        <td style="vertical-align: middle;">
            {{ Form::select('id_integrante[]', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control', 'style' => 'width:400px;border: none; border-bottom: 2px solid #48548c;']) }}
            @error('id_integrante.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            
        </td>
        <td style="vertical-align: middle;">
            {{ Form::select('id_rol[]', $roles->pluck('Rol', 'IdRol'), null, ['class' => 'form-control', 'style' => 'width:400px;border: none; border-bottom: 2px solid #48548c;']) }}
            @error('id_rol.*') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </td>
                        <td style="vertical-align: middle;">
                            <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa fa-times-circle"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col" style="text-align: right;">
        <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addParticular()">Agregar</button>
    </div>
</div>-->



       <div class="row" style="margin-top:0px;">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">AGENDA DE LA AUDITORÍA</label>
            </div>
        </div>
  
        <div class="row" style="margin-top:10px">
            <div class="col-lg-4">  
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_reunion_apertura', null, array('class' => 'form-control', 'required' => '')) }}
                            {{ Form::label('fecha_reunion_apertura', 'Fecha Reunión de Apertura')}} 
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>  
                </div>  
            </div>
            
            <div class="col-lg-3">
                <div class="form-group">
                    {{ Form::time('hora_reunion_apertura', null, ['class' => 'form-control', 'required' => '']) }}
                    {{ Form::label('hora_reunion_apertura', 'Hora Reunión de Apertura', ['class' => 'control-label']) }}  
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">  
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_reunion_cierre', null, array('class' => 'form-control', 'required' => '' )) }}
                            {{ Form::label('fecha_reunion_cierre', 'Fecha Reunión de Cierre')}} 
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>  
                </div>  
            </div>
            
            <div class="col-lg-3">
                <div class="form-group">
                    {{ Form::time('hora_reunion_cierre', null, ['class' => 'form-control', 'required' => '']) }}
                    {{ Form::label('hora_reunion_cierre', 'Hora Reunión de Cierre', ['class' => 'control-label']) }}  
                </div>
            </div>
        </div>

        <!-- <div class="row" style="margin-top:20px;">
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
                                <th style="margin-left: 80px;">Hora Inicio</th>
                                <th style="margin-left: 80px;">Hora Final</th>
                                <th style="margin-left: 80px;">Responsable</th>
                                <th style="margin-left: 80px;">Auditado</th>
                                <th style="margin-left: 80px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="agenda">
                        <tr>
                            <td style="vertical-align: middle;">
                                <textarea type="text" name="proceso[]" class="form-control" style="width: 300px;height:45px;border: none; border-bottom: 2px solid #48548c;" placeholder="Ingrese el proceso." maxlength="300"></textarea>
                            </td>
                            <td style="vertical-align: middle;">
                                {{ Form::time('hora_inicio[]', null, ['class' => 'form-control',  'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                            </td>
                            <td style="vertical-align: middle;">
                                {{ Form::time('hora_fin[]', null, ['class' => 'form-control',  'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                            </td>
                            <td style="vertical-align: middle;">
                                {{ Form::select('id_responsable[]', $Personal->pluck('Nombres', 'IdPersonal'), [], ['class' => 'form-control id_responsable', 'style' => 'width: 200px;border: none; border-bottom: 2px solid #48548c;']) }}
                            </td>
                            <td style="vertical-align: middle;">
                                <textarea type="text" name="auditado[]" class="form-control" style="width: 200px;height:45px;border: none; border-bottom: 2px solid #48548c;" placeholder="Ingrese el auditado." maxlength="50"></textarea>
                            </td>
                            <td style="vertical-align: middle;">
                                <button type="button" class="btn btn-danger" onclick="removeRowAgenda(this)"><i class="fa fa-times-circle"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" style="text-align: right;">
                <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addAgenda()">Agregar</button>
            </div>
        </div>
-->

        <div class="row" style="margin-top:30px;">
    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::select('id_firma1', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control',  'id' => 'selectRespuesto']) }}
            {{ Form::label('id_firma1', 'Revisa') }}
            @error('id_firma1')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::select('id_cargo_firma1', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control']) }}
            {{ Form::label('id_cargo_firma1', 'Cargo') }}
            @error('id_cargo_firma1')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
</div>

<div class="row" style="margin-top:30px;">
    <div class="col-lg-6">    
        <div class="form-group floating-label">
        {{ Form::select('id_firma2', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control']) }}
        {{ Form::label('id_firma2', 'Revisa') }}
        @error('id_firma2')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::select('id_cargo_firma2', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control']) }}
            {{ Form::label('id_cargo_firma2', 'Cargo') }}
            @error('id_cargo_firma2')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>
</div>


        <div class="row" style="margin-top:30px;">
             <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control" id="auditor_lider" name="auditor_lider" value="SIN AUDITOR LÍDER ASOCIADO" rows="2" readonly> </input>
                    <label for="auditor_lider">Auditor Líder (Elabora)</label>
                    </div>
             </div>

             <div class="col-sm-6">
                <div class="form-group">
                    <input class="form-control" id="representante_legal" name="representante_legal" rows="2" value="{{ old('representantelegal', $representantelegal) }}"  required readonly> </input>
                    <label for="representante_legal">Representante Legal (Acepta)</label>
                    </div>
             </div>
        </div>


        <div class="row mt-3"> 
            <div class="col-sm-6 mb-3">    
                {{ Form::submit('Guardar', ['class' => 'btn btn-info btn-block']) }}    
            </div>    
            <div class="col-sm-6 mb-3">    
    <a href="{{ url('auditoriaprogplanauditoria/' . $id_auditoriaprog) }}" class="btn btn-danger btn-block">Cancelar</a>
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
      $('select[name="id_rol[]"]').on('change', function() {
    const selectedRole = $(this).find('option:selected').text();

    const $row = $(this).closest('tr'); 

    const idIntegranteValue = $row.find('select[name="id_integrante[]"]').find('option:selected').text();

    if (selectedRole === 'Auditor Líder') {
        $('#auditor_lider').val(idIntegranteValue); 

        var event = new Event('change');
        document.getElementById('auditor_lider').dispatchEvent(event);
    }
});

$('select[name="id_integrante[]"]').on('change', function() {
    const $row = $(this).closest('tr');
    const selectedRole = $row.find('select[name="id_rol[]"]').find('option:selected').text();

    if (selectedRole === 'Auditor Líder') {
        const idIntegranteValue = $(this).find('option:selected').text();

        $('#auditor_lider').val(idIntegranteValue); 

        var event = new Event('change');
        document.getElementById('auditor_lider').dispatchEvent(event);
    }
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
          <script>
function initializeSelect2(element, width) {
    $(element).select2({
        width: width, 
        placeholder: 'Seleccionar...',
        allowClear: true
    });
}

function addParticular() {
    const tableBody = document.getElementById('particularBody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="vertical-align: middle;">
            <select name="id_integrante[]" class="form-control id_integrante" style = "border: none; border-bottom: 2px solid #48548c;" required>
                <option value="none"></option>
                @foreach ($Personal1 as $id => $item)
                    <option value="{{ $item->IdPersonal }}">{{ $item->Nombres }}</option>
                @endforeach
            </select>
             @error('id_integrante.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </td>
         <td style="vertical-align: middle;">
            <select name="id_rol[]" class="form-control id_rol" style = "border: none; border-bottom: 2px solid #48548c;" required>
                <option value="none"></option>
                @foreach ($roles1 as $id => $item)
                    <option value="{{ $item->IdRol }}">{{ $item->Rol }}</option>
                @endforeach
            </select>
             @error('id_rol.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </td>
        <td style="vertical-align: middle;">
            <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa fa-times-circle"></i></button>
        </td>
    `;
    tableBody.appendChild(newRow);
    initializeSelect2(newRow.querySelector('.id_integrante'), '400px');
    initializeSelect2(newRow.querySelector('.id_rol'), '400px');

    $('select[name="id_rol[]"]').on('change', function() {
    const selectedRole = $(this).find('option:selected').text();

    const $row = $(this).closest('tr'); 

    const idIntegranteValue = $row.find('select[name="id_integrante[]"]').find('option:selected').text();

    if (selectedRole === 'Auditor Líder') {
        $('#auditor_lider').val(idIntegranteValue); 

        var event = new Event('change');
        document.getElementById('auditor_lider').dispatchEvent(event);
    }
});

$('select[name="id_integrante[]"]').on('change', function() {
    const $row = $(this).closest('tr');
    const selectedRole = $row.find('select[name="id_rol[]"]').find('option:selected').text();

    if (selectedRole === 'Auditor Líder') {
        const idIntegranteValue = $(this).find('option:selected').text();

        $('#auditor_lider').val(idIntegranteValue); 

        var event = new Event('change');
        document.getElementById('auditor_lider').dispatchEvent(event);
    }
});

  
}


function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
}

function addAgenda() {
    const tableBody = document.getElementById('agenda');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td style="vertical-align: middle;">
            <textarea type="text" name="proceso[]" class="form-control" style="width: 300px;height:45px;border: none; border-bottom: 2px solid #48548c;" placeholder="Ingrese el proceso." maxlength="300"></textarea>
        </td>
        <td style="vertical-align: middle;">
            {{ Form::time('hora_inicio[]', null, ['class' => 'form-control',  'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
        </td>
        <td style="vertical-align: middle;">
            {{ Form::time('hora_fin[]', null, ['class' => 'form-control',  'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
        </td>
        <td style="vertical-align: middle;">
            <select name="id_responsable[]" class="form-control id_responsable" style = "border: none; border-bottom: 2px solid #48548c;">
                <option value="none"></option>
                @foreach ($Personal1 as $id => $item)
                    <option value="{{ $item->IdPersonal }}">{{ $item->Nombres }}</option>
                @endforeach
            </select>
        </td>
        <td style="vertical-align: middle;">
            <textarea type="text" name="auditado[]" class="form-control" style="width: 200px;height:45px;border: none; border-bottom: 2px solid #48548c;" placeholder="Ingrese el auditado." maxlength="50"></textarea>
        </td>
        <td style="vertical-align: middle;">
            <button type="button" class="btn btn-danger" onclick="removeRowAgenda(this)"><i class="fa fa-times-circle"></i></button>
        </td>
    `;
    tableBody.appendChild(newRow);
    initializeSelect2(newRow.querySelector('.id_responsable'), '200px');
}

function removeRowAgenda(button) {
    const row = button.closest('tr');
    row.remove();
}

$(document).ready(function() {
    initializeSelect2('.IdPersonalJefePrograma', '400px');
    initializeSelect2('.IdRespuestoModificacion', '200px');
});
</script>




            @endsection()

        @endsection()

@endsection()