@extends('partials.card')

@extends('layout')

@section('title')
Editar Plan Auditoría
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($auditoriaPrograma, ['route' => ['auditoriaprogplanauditoria.update', $auditoriaPrograma->id_planauditoria], 'method' => 'PUT', 'files' =>true ]) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{ Breadcrumbs::render('editarplanauditoria', $id_auditoriaprog) }}    
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
                {{-- <ul class="nav nav-tabs" data-toggle="tabs">
                    <li><a  href="#home">Crear<br>Programa</a></li>
                </ul> --}}
                    
                    <h2><b>Editar Plan Auditoria</b></h2>
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
                    {{ Form::select('planauditoria_id_listas', $plan_aud->pluck('PlanAuditoria', 'IdPlanAuditoria'), null, ['class' => 'form-control', 'required' => '']) }}
                    {{ Form::label('planauditoria_id_listas', 'Plan de Auditoría')}}
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
                        {{ Form::select('modalidad_id_listas', $modalidad->pluck('Modalidad', 'IdModalidad'), null, ['class' => 'form-control', 'required' => '']) }}
                        {{ Form::label('modalidad_id_listas', 'Modalidad')}}
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
                <textarea class="form-control" id="objetivo_auditoria" name="objetivo_auditoria" rows="2" maxlength="500" style="resize: vertical; overflow-y: auto;" required>{{ $auditoriaPrograma->objetivo_auditoria }}</textarea>
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
                <textarea class="form-control" id="alcance_auditoria" name="alcance_auditoria" rows="2" maxlength="300" style="resize: vertical; overflow-y: auto;" required>{{ $auditoriaPrograma->alcance_auditoria }}</textarea>
                <label for="alcance_auditoria">Alcance de la auditoría*</label>
                @error('alcance_auditoria')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                </div>
             </div>
        </div>

        <input type="hidden" id="id_planauditoria" value="{{ $auditoriaPrograma->id_planauditoria }}">


        <div class="row">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">EQUIPO AUDITOR</label>
            </div>
        </div>

        <div class="row">
    <div class="form-table">
        <div class="table-content">
            <div class="table-responsive">
                <table class="table flex-table" id="particularTable">
                    <thead>
                        <tr>
                            <th>Integrante</th>
                            <th>Rol</th>
                            <th class="text-center">Acciones</th>  <!-- Centramos el encabezado -->
                        </tr>
                    </thead>
                    <tbody id="particularBody">
                        @foreach($equipoAuditor as $integrante)
                            <tr>
                                <td style="vertical-align: middle;">
                                    <input type="hidden" name="id_equipoauditor[]" value="{{ $integrante->id_equipoauditor }}">
                                    {{ Form::select('id_integrante[]', $Personal->pluck('Nombres', 'IdPersonal')->toArray(), $integrante->id_integrante, ['class' => 'form-control select-field', 'required' => '', 'style' => 'border: none; border-bottom: 2px solid #48548c;']) }}
                                    @error('id_integrante.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ Form::select('id_rol[]', $roles->pluck('Rol', 'IdRol'), $integrante->id_rol, ['class' => 'form-control select-field', 'required' => '', 'style' => 'border: none; border-bottom: 2px solid #48548c;']) }}
                                    @error('id_rol.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="text-center" style="vertical-align: middle;">  <!-- Centramos el contenido -->
                                    <button type="button" class="btn btn-danger" onclick="eliminar(this)" data-id="{{ $integrante->id_equipoauditor }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col text-right"> <!-- Centramos el contenido de los botones -->
        <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addParticular()">Agregar</button>
        <button type="button" class="btn btn-success" style="background-color:#48548c;border-color:#48548c;" onclick="guardar()">Guardar</button>
    </div>
</div>




        <div class="row" style="margin-top:20px;">
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
                    {{ Form::time('hora_reunion_apertura', $horaApertura, ['class' => 'form-control', 'required' => '']) }}
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
                    {{ Form::time('hora_reunion_cierre', $horaCierre, ['class' => 'form-control', 'required' => '']) }}
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
            <div class="table-responsive">
                <table class="table flex-table" id="particularTable">
                    <thead>
                        <tr>
                            <th>Proceso / Aspectos a Auditar / Actividad</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Final</th>
                            <th>Responsable</th>
                            <th>Auditado</th>
                            <th class="text-center">Acciones</th> 
                        </tr>
                    </thead>
                    <tbody id="agenda">
                        @if($agendaAuditoria->count() !== 0)
                            @foreach($agendaAuditoria as $index => $agenda)
                                <tr>
                                    <td style="vertical-align: middle;">
                                    <input type="hidden" name="id_agendaauditoria[]" value="{{ $agenda->id_agendaauditoria }}">
                                        <textarea type="text" name="proceso[]" class="form-control" style="width: 100%;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el proceso." maxlength="1000">{{ $agenda->proceso }}</textarea>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="form-group control-width-normal">
                                            <div class="input-group date" id="demo-date-format">
                                                <div class="input-group-content">
                                                {{ Form::text('Fecha[]', $agenda->Fecha, array('class' => 'form-control', 'style' => 'width: 100%;height:41px;margin-top:15px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;', 'required' => '')) }}
                                                </div>
                                                <span class="input-group-addon"><i style="margin-left:-20px;" class="fa fa-calendar"></i></span>
                                            </div>  
                                        </div>  
                                </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::time('hora_inicio[]',  $agendaHoras[$index]['hora_inicio'], ['class' => 'form-control', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::time('hora_fin[]', $agendaHoras[$index]['hora_fin'], ['class' => 'form-control', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::select('id_responsable[]', $PersonalAgenda->pluck('integrante', 'id_equipoauditor'), $agenda->id_responsable, ['class' => 'form-control id_responsable', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <textarea type="text" name="auditado[]" class="form-control" style="width: 100%;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el auditado." maxlength="50" required>{{ $agenda->auditado }}</textarea>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"> 
                                        <button type="button" class="btn btn-danger" onclick="eliminarAgenda(this)" data-id="{{ $agenda->id_agendaauditoria }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach($agendaAuditoria as $agenda)
                                <tr>
                                    <td style="vertical-align: middle;">
                                        <textarea type="text" name="proceso[]" class="form-control" style="width: 100%;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el proceso." maxlength="1000" required></textarea>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="form-group control-width-normal">
                                            <div class="input-group date" id="demo-date-format">
                                                <div class="input-group-content">
                                                {{ Form::text('Fecha[]', $agenda->Fecha, array('class' => 'form-control', 'style' => 'width: 100%;height:41px;margin-top:15px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;', 'required' => '')) }}
                                                </div>
                                                <span class="input-group-addon"><i style="margin-left:-20px;" class="fa fa-calendar"></i></span>
                                            </div>  
                                        </div>  
                                </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::time('hora_inicio[]', null, ['class' => 'form-control', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::time('hora_fin[]', null, ['class' => 'form-control', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ Form::select('id_responsable[]', $PersonalAgenda->pluck('integrante', 'id_equipoauditor'), $agenda->id_responsable, ['class' => 'form-control id_responsable', 'style' => 'width: 100%;border: none; border-bottom: 2px solid #48548c;']) }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <textarea type="text" name="auditado[]" class="form-control" style="width: 100%;height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el auditado." required></textarea>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;"> <!-- Centrado del contenido -->
                                        <button type="button" class="btn btn-danger" onclick="removeRowAgenda(this)">
                                            <i class="fa fa-times-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col text-right"> <!-- Centramos los botones -->
        <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addAgenda()">Agregar</button>
        <button type="button" class="btn btn-success" style="background-color:#48548c;border-color:#48548c;" onclick="guardarAgenda()">Guardar</button>
    </div>
</div>


        <div class="row" style="margin-top:30px;">
        <div class="col-lg-6">    
    <div class="form-group floating-label">
        {{ Form::select('id_firma1', $Personal->pluck('Nombres', 'IdPersonal'), $auditoriaPrograma->id_firma1, ['class' => 'form-control', 'required']) }}
        {{ Form::label('id_firma1', 'Revisa') }}
        @error('id_firma1')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::select('id_cargo_firma1', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control', 'required']) }}
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
            {{ Form::select('id_firma2', $Personal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control', 'required']) }}
            {{ Form::label('id_firma2', 'Revisa') }}
            @error('id_firma2')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <div class="col-lg-6">    
        <div class="form-group floating-label">
            {{ Form::select('id_cargo_firma2', $cargos->pluck('Cargo', 'IdCargo'), null, ['class' => 'form-control', 'required']) }}
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
            
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.min.css">
            <!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <style>
            label {
    margin-top: -20px; 
}
        </style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.all.min.js"></script>

            <script type="text/javascript">
                $('select').select2();
            </script>
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
function guardar() {
    var integrantes = [];
    var roles = [];
    var id_equipoauditor = []; 
    
    $('#particularBody tr').each(function() {
        var id_integrante = $(this).find('select[name="id_integrante[]"]').val();
        var id_rol = $(this).find('select[name="id_rol[]"]').val();
        var equipoAuditorId = $(this).find('input[name="id_equipoauditor[]"]').val();  
        integrantes.push(id_integrante);
        roles.push(id_rol);
        id_equipoauditor.push(equipoAuditorId);  
    });

    var id_planauditoria = $('#id_planauditoria').val();  
    console.log({
        id_integrante: integrantes,
        id_rol: roles,
        id_planauditoria: id_planauditoria,
        id_equipoauditor: id_equipoauditor
    });

    $.ajax({
        url: '{{ route("guardarequipoauduitor.guardar") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id_integrante: integrantes,
            id_rol: roles,
            id_planauditoria: id_planauditoria,
            id_equipoauditor: id_equipoauditor  
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Equipo Auditor guardado correctamente',
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Hubo un error al guardar Equipo Auditor',
                text: error,
                confirmButtonText: 'Cerrar'
            });
        }
    });
}

function guardarAgenda() {
    var procesos = [];
    var fechas = [];
    var horas_inicio = [];
    var horas_fin = [];
    var responsables = [];
    var auditados = [];
    var id_agendaauditoria = []; 
    
    $('#agenda tr').each(function() {
        var proceso = $(this).find('textarea[name="proceso[]"]').val(); 
        var Fecha = $(this).find('input[name="Fecha[]"]').val(); 
        var hora_inicio = $(this).find('input[name="hora_inicio[]"]').val(); 
        var hora_fin = $(this).find('input[name="hora_fin[]"]').val(); 
        var id_responsable = $(this).find('select[name="id_responsable[]"]').val(); 
        var auditado = $(this).find('textarea[name="auditado[]"]').val(); 
        var agendaAuditoriaId = $(this).find('input[name="id_agendaauditoria[]"]').val();

        console.log('Fila:', proceso, Fecha, hora_inicio, hora_fin, id_responsable, auditado, agendaAuditoriaId);

        procesos.push(proceso);
        fechas.push(Fecha);
        horas_inicio.push(hora_inicio);
        horas_fin.push(hora_fin);
        responsables.push(id_responsable);
        auditados.push(auditado);
        id_agendaauditoria.push(agendaAuditoriaId);  
    });

    var id_planauditoria = $('#id_planauditoria').val();  
    
    console.log({
        proceso: procesos,
        Fecha: fechas,
        hora_inicio: horas_inicio,
        hora_fin: horas_fin,
        id_responsable: responsables,
        auditado: auditados,
        id_planauditoria: id_planauditoria,
        id_agendaauditoria: id_agendaauditoria
    });

    $.ajax({
        url: '{{ route("guardaragendaauditoria.guardarAgenda") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            proceso: procesos,
            Fecha: fechas,
            hora_inicio: horas_inicio,
            hora_fin: horas_fin,
            id_responsable: responsables,
            auditado: auditados,
            id_planauditoria: id_planauditoria,
            id_agendaauditoria: id_agendaauditoria  
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Agenda Auditoría guardado correctamente',
                showConfirmButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Hubo un error al guardar Agenda Auditoría',
                text: 'Por favor diligencie todos los campos.',
                confirmButtonText: 'Cerrar'
            });
        }
    });
}


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
        <select name="id_integrante[]" style="border: none; border-bottom: 2px solid #48548c; width: 100%;" class="form-control id_integrante" required>
            <option value="none"></option>
            @foreach ($Personal1 as $id => $item)
                <option value="{{ $item->IdPersonal }}">{{ $item->Nombres }}</option>
            @endforeach
        </select>
    </td>
    <td style="vertical-align: middle;">
        <select name="id_rol[]" style="border: none; border-bottom: 2px solid #48548c; width: 100%;" class="form-control id_rol" required>
            <option value="none"></option>
            @foreach ($roles1 as $id => $item)
                <option value="{{ $item->IdRol }}">{{ $item->Rol }}</option>
            @endforeach
        </select>
    </td>
    <td class="text-center" style="vertical-align: middle;">
        <input type="hidden" name="id_equipoauditor[]" value="">  <!-- Aquí agregamos un campo oculto para id_equipoauditor -->
        <button type="button" class="btn btn-danger" onclick="removeRow(this)">
            <i class="fa fa-times-circle"></i>
        </button>
    </td>
    `;

    tableBody.appendChild(newRow);

    initializeSelect2(newRow.querySelector('.id_integrante'), '100%'); 
    initializeSelect2(newRow.querySelector('.id_rol'), '100%'); 

    $('select[name="id_rol[]"]').on('change', function() {
        const selectedRole = $(this).find('option:selected').text();

        const $row = $(this).closest('tr');

        const idIntegranteValue = $row.find('select[name="id_integrante[]"]').find('option:selected').text();

        const existingLeader = $("select[name='id_rol[]']").filter(function() {
            return $(this).find('option:selected').text() === 'Auditor Líder';
        });

        if (selectedRole === 'Auditor Líder') {
            if (existingLeader.length > 1) {
                Swal.fire({
                    icon: 'warning',
                    title: '¡Advertencia!',
                    text: 'Ya hay un Auditor Líder asignado.',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#48548c'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $row.find('select[name="id_rol[]"]').val('none').trigger('change'); 
                    }
                });
            } else {
                $('#auditor_lider').val(idIntegranteValue);

                var event = new Event('change');
                document.getElementById('auditor_lider').dispatchEvent(event);
            }
        }
    });

    $('select[name="id_integrante[]"]').on('change', function() {
        const $row = $(this).closest('tr');
        const selectedRole = $row.find('select[name="id_rol[]"]').find('option:selected').text();
        const idIntegranteValue = $(this).find('option:selected').text();

        if (selectedRole === 'Auditor Líder') {
            const existingLeader = $("select[name='id_rol[]']").filter(function() {
                return $(this).find('option:selected').text() === 'Auditor Líder';
            });

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
            <textarea type="text" name="proceso[]" class="form-control" style="width: 100%; height: 41px; border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el proceso." maxlength="1000"></textarea>
        </td>
        <td style="vertical-align: middle;">
            <div class="form-group control-width-normal">
                <div class="input-group date" id="demo-date-format">
                    <div class="input-group-content">
                        <input type="text" name="Fecha[]" class="form-control" style="width: 100%;height:41px;margin-top:15px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" required />
                    </div>
                    <span class="input-group-addon"><i style="margin-left:-20px;" class="fa fa-calendar"></i></span>
                </div>  
            </div>  
        </td>
        <td style="vertical-align: middle;">
            <input type="time" name="hora_inicio[]" class="form-control" style="width: 100%; border: none; border-bottom: 2px solid #48548c;" />
        </td>
        <td style="vertical-align: middle;">
            <input type="time" name="hora_fin[]" class="form-control" style="width: 100%; border: none; border-bottom: 2px solid #48548c;" />
        </td>
        <td style="vertical-align: middle;">
            <select name="id_responsable[]" class="form-control id_responsable" style="width: 100%; border: none; border-bottom: 2px solid #48548c;">
                <option value="none"></option>
                @foreach ($PersonalAgenda1 as $id => $item)
                    <option value="{{ $item->id_equipoauditor }}">{{ $item->integrante }}</option>
                @endforeach
            </select>
        </td>
        <td style="vertical-align: middle;">
            <textarea type="text" name="auditado[]" class="form-control" style="width: 100%; height: 41px; border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" placeholder="Ingrese el auditado." maxlength="50" required></textarea>
        </td>
        <td class="text-center" style="vertical-align: middle;">
            <input type="hidden" name="id_agendaauditoria[]" value="">
            <button type="button" class="btn btn-danger" onclick="removeRowAgenda(this)"><i class="fa fa-times-circle"></i></button>
        </td>
    `;
    tableBody.appendChild(newRow);

    // Inicializa el datepicker correctamente
    $(newRow.querySelector('.input-group.date input')).datepicker({
        format: 'yyyy-mm-dd', // Formato de fecha (puedes ajustarlo si lo necesitas)
        autoclose: true, // Cierra automáticamente el calendario después de seleccionar la fecha
        todayHighlight: true, // Resalta el día actual
    });

    // Inicializa Select2 si es necesario
    initializeSelect2(newRow.querySelector('.id_responsable'), '100%');
}



function removeRowAgenda(button) {
    const row = button.closest('tr');
    row.remove();
}

$(document).ready(function() {
    
    initializeSelect2('.IdPersonalJefePrograma', '400px');
    initializeSelect2('.IdRespuestoModificacion', '200px');
});


function eliminar(button) {
    var id_equipoauditor = $(button).data('id');

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Si elimina este registro, automáticamente en agenda auditoría el campo de responsable que este asociado a este, quedará en blanco. ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/eliminarEquipo', 
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  
                    id_equipoauditor: id_equipoauditor
                },
                success: function(response) {
                    if (response.success) {
                        $(button).closest('tr').remove(); 
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado correctamente.',
                            'success'
                        ).then(() => {
                            location.reload(); 
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'Hubo un problema al eliminar el registro.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'Hubo un error en la solicitud.',
                        'error'
                    );
                }
            });
        } else {
            console.log('Eliminación cancelada.');
        }
    });
}

function eliminarAgenda(button) {
    var id_agendaauditoria = $(button).data('id');

    Swal.fire({
        title: '¿Estás seguro?',
        text: '',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/eliminarAgenda', 
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  
                    id_agendaauditoria: id_agendaauditoria
                },
                success: function(response) {
                    console.log(response);  
                    if (response.success) {
                        $(button).closest('tr').remove();
                        Swal.fire(
                            'Eliminado!',
                            response.message,  
                            'success'
                        ).then(() => {
                            location.reload(); 
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message || 'Hubo un problema al eliminar el registro.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error en la solicitud: ', error);  
                    Swal.fire(
                        'Error!',
                        'Hubo un error en la solicitud.',
                        'error'
                    );
                }
            });
        } else {
            console.log('Eliminación cancelada.');
        }
    });
}


</script>




            @endsection()

        @endsection()

@endsection()