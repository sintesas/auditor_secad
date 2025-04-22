@extends('partials.card')

@extends('layout')

@section('title')
Editar Informe Auditoría
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::model($planinforme, ['route' => ['planinformeauditoriaprog.update', $planinforme->id_planinformeauditoria], 'method' => 'PUT', 'files' =>true ]) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('editarplaninformeauditoria', $id_auditoriaprog) }}	
        </span>

        @if(isset($Consecutivo))
            <span style="margin-left: 2px; margin-top: 1px;font-size: 12px; color:#b7bcc2">
             - Programa {{ $Consecutivo }} - {{ $plan_auditoria }}
            </span>
        @endif
    </div>
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
					
					<h2><b>Editar Informe Auditoría</b></h2>
					<hr>
					<br><br>

                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                <div class="tab-content">
                {!! Form::hidden('id_planauditoria', session('id_planauditoria')) !!}


    <div id="home" class="tab-pane active">
       
        <div class="row">
            <div class="col-lg-3">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_informe_auditoria', $planinforme->fecha_informe_auditoria, array('class' => 'form-control', 'required' => '')) }}
                            {{ Form::label('fecha_informe_auditoria', 'Fecha Informe Auditoría')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
        </div>

        <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="desarrollo_auditoria" name="desarrollo_auditoria" rows="2" maxlength="5000" required>{{ $planinforme->desarrollo_auditoria }} </textarea>
                    <label for="desarrollo_auditoria">Desarrollo de Auditoría*</label>
                    @error('desarrollo_auditoria')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                </div>
             </div>
        </div>


        <input type="hidden" id="id_planinformeauditoria" value="{{ $planinforme->id_planinformeauditoria }}">


        <div class="row">
    <div class="form-table">
        <div class="table-content">
            <div class="table-responsive"> 
                <table class="table flex-table" id="particularTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipo Hallazgo</th>
                            <th>Descripcion Hallazgo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="hallazgosBody">
                    @foreach($planinformehallazgos as $index => $infohallazgos)
                        <tr>
                            <td style="vertical-align: middle;">
                                {{ $index + 1 }}
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="hidden" name="id_informeauditoriahallazgos[]" value="{{ $infohallazgos->id_informeauditoriahallazgos }}">
                                {{ Form::select('tipohallazgo_id_listas[]', $hallazgosinfo->pluck('TipoHallazgo', 'IdTipoHallazgo'), $infohallazgos->tipohallazgo_id_listas, ['class' => 'form-control tipohallazgo_id_listas', 'required' => '', 'style' => 'width:100%; border: none; border-bottom: 2px solid #48548c;', 'onchange' => 'updateTotals()']) }}
                                @error('tipohallazgo_id_listas.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td style="vertical-align: middle;">
                                <textarea type="text" name="descripcion[]" class="form-control" style="width: 100%; height:42px; border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="3000">{{ $infohallazgos->descripcion }}</textarea>
                                @error('descripcion.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td style="vertical-align: middle;">
                                <button type="button" class="btn btn-danger" onclick="eliminar(this)" data-id="{{ $infohallazgos->id_informeauditoriahallazgos }}">
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
    <div class="col" style="text-align: right;">
        <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addHallazgos()">Agregar</button>
        <button type="button" class="btn btn-success" style="background-color:#48548c;border-color:#48548c;" onclick="guardarHallazgos()">Guardar</button>

    </div>
</div>

<div class="row" style="margin-top:30px;">
        <table style="width: 60%; margin: 0 auto;">
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total Conformidades</td>
                <td style="text-align: left;" id="total-conformidades">{{ $planinforme->total_conformidades}}</td>
                <input type="hidden" name="total_conformidades" id="hidden-total-conformidades" value="{{ $planinforme->total_conformidades }}">
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total Oportunidades de Mejora</td>
                <td style="text-align: left;" id="total-oportunidades">{{ $planinforme->total_oportunidad_mejora}}</td>
                <input type="hidden" name="total_oportunidad_mejora" id="hidden-total-oportunidades" value="{{ $planinforme->total_oportunidad_mejora}}">
            </tr>
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total No Conformidades Menor</td>
                <td style="text-align: left;" id="total-no-conformidades-menor">{{ $planinforme->total_no_conformidades_menor}}</td>
                <input type="hidden" name="total_no_conformidades_menor" id="hidden-total-no-conformidades-menor" value="{{ $planinforme->total_no_conformidades_menor}}">
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total No Conformidades Mayor</td>
                <td style="text-align: left;" id="total-no-conformidades-mayor">{{ $planinforme->total_no_conformidades_mayor}}</td>
                <input type="hidden" name="total_no_conformidades_mayor" id="hidden-total-no-conformaciones-mayor" value="{{ $planinforme->total_no_conformidades_mayor}}" >
            </tr>
        </table>
    </div>


        <div class="row" style="margin-top:50px;">
             <div class="col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="conclusiones_hallazgos" name="conclusiones_hallazgos" rows="2" maxlength="1000" style="resize: vertical; overflow-y: auto;" required>{{ $planinforme->conclusiones_hallazgos }} </textarea>
                    <label for="conclusiones_hallazgos">Conclusiones Hallazgos*</label>
                    @error('conclusiones_hallazgos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
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
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.all.min.js"></script>

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
          <script>
function initializeSelect2(element, width) {
    $(element).select2({
        width: width, 
        placeholder: 'Seleccionar...',
        allowClear: true
    });
}

let totals = {
    '2004': 0, 
    '2005': 0, 
    '2006': 0, 
    '2007': 0  
};

let previousValues = {};

let rowCount = 1; 

function addHallazgos() {
    const tableBody = document.getElementById('hallazgosBody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
    <td style="vertical-align: middle;">${tableBody.children.length + 1}</td> 
    <td style="vertical-align: middle;">
        <input type="hidden" name="id_informeauditoriahallazgos[]" value="">
        <select name="tipohallazgo_id_listas[]" class="form-control tipohallazgo_id_listas" data-id="${tableBody.children.length}" style="width:100%; border: none; border-bottom: 2px solid #48548c;" required>
            <option value="none"></option>
            @foreach ($hallazgosinforme as $id => $item)
                <option value="{{ $item->IdTipoHallazgo }}">{{ $item->TipoHallazgo }}</option>
            @endforeach
        </select>
        @error('tipohallazgo_id_listas.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </td>
    <td style="vertical-align: middle;">
        <textarea type="text" name="descripcion[]" class="form-control" style="width:100%; height:42px; border: none; border-bottom: 2px solid #48548c;" maxlength="3000"></textarea>
        @error('descripcion.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </td>
    <td style="vertical-align: middle;">
        <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa fa-times-circle"></i></button>
    </td>
`;

tableBody.appendChild(newRow);

newRow.querySelector('.tipohallazgo_id_listas').addEventListener('change', updateTotals);

rowCount++;

}

function updateTotals() {
    const selects = document.querySelectorAll('select[name="tipohallazgo_id_listas[]"]');

    for (let key in totals) {
        totals[key] = 0;
    }

    selects.forEach(select => {
        const selectedValue = select.value;

        if (selectedValue) {
            if (totals[selectedValue] !== undefined) {
                totals[selectedValue] += 1;
            }
        }
    });

    document.getElementById('total-conformidades').innerText = totals['2004'];
    document.getElementById('total-oportunidades').innerText = totals['2006'];
    document.getElementById('total-no-conformidades-menor').innerText = totals['2005'];
    document.getElementById('total-no-conformidades-mayor').innerText = totals['2007'];

    document.getElementById('hidden-total-conformidades').value = totals['2004'];
    document.getElementById('hidden-total-oportunidades').value = totals['2006'];
    document.getElementById('hidden-total-no-conformidades-menor').value = totals['2005'];
    document.getElementById('hidden-total-no-conformaciones-mayor').value = totals['2007'];
}

function updateRowNumbers() {
    const rows = document.querySelectorAll('#hallazgosBody tr');

    rows.forEach((row, index) => {
        row.querySelector('td:first-child').innerText = index + 1; 
    });
}

function removeRow(button) {
    const row = button.closest('tr');
    const select = row.querySelector('select[name="tipohallazgo_id_listas[]"]');
    
    const selectedValue = select.value;
    const selectId = select.dataset.id;

    if (selectedValue !== "none" && totals[selectedValue] !== undefined) {
        totals[selectedValue] = Math.max(0, totals[selectedValue] - 1);
    }

    row.remove();

    updateRowNumbers();

    updateTotals();
}

function eliminar(button) {
    var id_informeauditoriahallazgos = $(button).data('id');

    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Si elimina este registro, automáticamente se eliminará en Plan Acción y en Seguimiento.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/eliminarHallazgo', 
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  
                    id_informeauditoriahallazgos: id_informeauditoriahallazgos
                },
                success: function(response) {
                    if (response.success) {
                        $(button).closest('tr').remove(); 
                        updateRowNumbers(); 
                        updateTotals();  
                        Swal.fire(
                            'Eliminado!',
                            'El registro ha sido eliminado correctamente.',
                            'success'
                        );
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

function guardarHallazgos() {
    var tipohallazgo_id_listas = [];
    var descripcion = [];
    var id_informeauditoriahallazgos = [];
    
    $('#hallazgosBody tr').each(function() {
        var tipohallazgo = $(this).find('select[name="tipohallazgo_id_listas[]"]').val(); 
        var desc = $(this).find('textarea[name="descripcion[]"]').val(); 
        var id_hallazgo = $(this).find('input[name="id_informeauditoriahallazgos[]"]').val(); 

        console.log('Fila:', tipohallazgo, desc, id_hallazgo);

        tipohallazgo_id_listas.push(tipohallazgo);
        descripcion.push(desc);
        id_informeauditoriahallazgos.push(id_hallazgo);
    });

    var id_planinformeauditoria = $('#id_planinformeauditoria').val(); 
    
    var total_conformidades = $('#hidden-total-conformidades').val();
    var total_oportunidades = $('#hidden-total-oportunidades').val();
    var total_no_conformidades_menor = $('#hidden-total-no-conformidades-menor').val();
    var total_no_conformidades_mayor = $('#hidden-total-no-conformaciones-mayor').val();

    console.log({
        tipohallazgo_id_listas: tipohallazgo_id_listas,
        descripcion: descripcion,
        id_informeauditoriahallazgos: id_informeauditoriahallazgos,
        id_planinformeauditoria: id_planinformeauditoria,
        total_conformidades: total_conformidades,
        total_oportunidades: total_oportunidades,
        total_no_conformidades_menor: total_no_conformidades_menor,
        total_no_conformidades_mayor: total_no_conformidades_mayor
    });

    $.ajax({
        url: '{{ route("guardarhallazgosinformea.guardarHallazgo") }}',  
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',  
            tipohallazgo_id_listas: tipohallazgo_id_listas,
            descripcion: descripcion,
            id_planinformeauditoria: id_planinformeauditoria,
            id_informeauditoriahallazgos: id_informeauditoriahallazgos,
            total_conformidades: total_conformidades,
            total_oportunidades: total_oportunidades,
            total_no_conformidades_menor: total_no_conformidades_menor,
            total_no_conformidades_mayor: total_no_conformidades_mayor
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Hallazgos guardados correctamente',
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
                title: 'Hubo un error al guardar los hallazgos',
                text: error,
                confirmButtonText: 'Cerrar'
            });
        }
    });
}



function guardar() {
    var tipohallazgo_id_listas = [];
    var descripcion = [];
    var id_informeauditoriahallazgos = []; 
    
    $('#hallazgosBody tr').each(function() {
        var tipo_hallazgo = $(this).find('select[name="tipohallazgo_id_listas[]"]').val();
        var descripcionH = $(this).find('select[name="descripcion[]"]').val();
        var hallazgosId = $(this).find('input[name="id_informeauditoriahallazgos[]"]').val();  

        tipohallazgo_id_listas.push(tipo_hallazgo);
        descripcion.push(descripcionH);
        id_informeauditoriahallazgos.push(hallazgosId);  
    });

    var id_planinformeauditoria = $('#id_planinformeauditoria').val();  

    console.log({
        tipohallazgo_id_listas: tipohallazgo_id_listas,
        descripcion: descripcion,
        id_informeauditoriahallazgos: id_informeauditoriahallazgos,
        id_planinformeauditoria: id_planinformeauditoria
    });

    $.ajax({
        url: '{{ route("guardarhallazgosinformea.guardarHallazgo") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        tipohallazgo_id_listas: tipohallazgo_id_listas,
        descripcion: descripcion,
        id_informeauditoriahallazgos: id_informeauditoriahallazgos,
        id_planinformeauditoria: id_planinformeauditoria
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Hallazgos guardado correctamente',
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

</script>




			@endsection()

		@endsection()

@endsection()