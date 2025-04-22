@extends('partials.card')

@extends('layout')

@section('title')
Crear Informe Auditoría
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'planinformeauditoriaprog.store', 'method' => 'POST')) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('crearplaninformeauditoria', $id_auditoriaprog) }}	
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
                {{-- <ul class="nav nav-tabs" data-toggle="tabs">
                	<li><a  href="#home">Crear<br>Programa</a></li>
                </ul> --}}
					
					<h2><b>Crear Informe Auditoría</b></h2>
					<hr>
					<br><br>

                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                <div class="tab-content">
                {{ Form::hidden('id_planauditoria', $auditoriaPrograma->id_planauditoria) }} 


    <div id="home" class="tab-pane active">
       
        <div class="row">
            <div class="col-lg-3">	
                <div class="form-group control-width-normal">
                    <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                            {{ Form::text('fecha_informe_auditoria', null, array('class' => 'form-control', 'required' => '' )) }}
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
                    <textarea class="form-control" id="desarrollo_auditoria" name="desarrollo_auditoria" rows="2" maxlength="5000"> </textarea>
                    <label for="desarrollo_auditoria">Desarrollo de Auditoría*</label>
                    @error('desarrollo_auditoria')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                </div>
             </div>
        </div>



      <!--  <div class="row">
    <div class="form-table">
        <div class="table-content">
            <table class="table flex-table" id="particularTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="margin-left: 120px;">Tipo Hallazgo</th>
                        <th style="margin-left: 180px;">Descripcion Hallazgo</th>
                        <th style="margin-left: 80px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="hallazgosBody">
                    <tr>
                        <td style="vertical-align: middle;">
                            1
                        </td>
                        <td style="vertical-align: middle;">
                        {{ Form::select('tipohallazgo_id_listas[]', $hallazgosinfo->pluck('TipoHallazgo', 'IdTipoHallazgo'), null, ['class' => 'form-control tipohallazgo_id_listas', 'style' => 'width:200px; border: none; border-bottom: 2px solid #48548c;', 'onchange' => 'updateTotals()']) }}
                        @error('tipohallazgo_id_listas.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="descripcion[]" class="form-control" style="width: 600px;height:42px;border: none; border-bottom: 2px solid #48548c;" maxlength="3000"></textarea>
                        @error('descripcion.*')
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
        <button type="button" class="btn btn-primary" style="background-color:#48548c;border-color:#48548c;" onclick="addHallazgos()">Agregar</button>
    </div>
</div> 

<div class="row" style="margin-top:30px;">
        <table style="width: 60%; margin: 0 auto;">
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total Conformidades</td>
                <td style="text-align: left;" id="total-conformidades">00</td>
                <input type="hidden" name="total_conformidades" id="hidden-total-conformidades" value="0">
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total Oportunidades de Mejora</td>
                <td style="text-align: left;" id="total-oportunidades">00</td>
                <input type="hidden" name="total_oportunidad_mejora" id="hidden-total-oportunidades" value="0">
            </tr>
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total No Conformidades Menor</td>
                <td style="text-align: left;" id="total-no-conformidades-menor">00</td>
                <input type="hidden" name="total_no_conformidades_menor" id="hidden-total-no-conformidades-menor" value="0">
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total No Conformidades Mayor</td>
                <td style="text-align: left;" id="total-no-conformidades-mayor">00</td>
                <input type="hidden" name="total_no_conformidades_mayor" id="hidden-total-no-conformaciones-mayor" value="0">
            </tr>
        </table>
    </div> -->


        <div class="row" style="margin-top:50px;">
             <div class="col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="conclusiones_hallazgos" name="conclusiones_hallazgos" style="resize: vertical; overflow-y: auto;" rows="2" maxlength="1000"> </textarea>
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
            <select name="tipohallazgo_id_listas[]" class="form-control tipohallazgo_id_listas" data-id="${tableBody.children.length}" style="width:200px;border: none; border-bottom: 2px solid #48548c;">
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
            <textarea type="text" name="descripcion[]" class="form-control" style="width: 600px;height:42px;border: none; border-bottom: 2px solid #48548c;" maxlength="3000"></textarea>
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

</script>




			@endsection()

		@endsection()

@endsection()