@extends('partials.card')

@extends('layout')

@section('title')
Crear Plan Acción Hallazgos
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'planaccionhallazgos.store', 'method' => 'POST')) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('crearplanaccionhallazgos', $id_auditoriaprog) }}	
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
					<h2><b>Crear Plan Acción Hallazgos</b></h2>
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
                            {{ Form::text('fecha_planaccion', null, array('class' => 'form-control', 'required' => '' )) }}
                            {{ Form::label('fecha_planaccion', 'Fecha Plan de Acción Hallazgos')}}	
                        </div>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>	
                </div>	
            </div>
        </div>


        <div class="row" style="margin-top:20px;">
            <div class="input-group">
                <label style="color: #3F518D; font-size: 16px;font-weight: bold;margin-left:12px">Lista de No Conformidades y Oportunidades de Mejora</label>
            </div>
        </div>

        <div class="row">
    <div class="form-table">
        <div class="table-content">
            <table class="table flex-table" id="particularTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipo Hallazgo</th>
                        <th>Descripcion Hallazgo</th>
                        <th>Causa Raiz</th>
                        <th>Acciones de Mejora</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Evaluación</th>
                    </tr>
                </thead>
                <tbody id="hallazgosBody">
                @foreach($planinformehallazgos as $index => $informeh)

                    <tr>
                        <td style="vertical-align: middle;">
                        {{ $index + 1 }}
                        </td>
                        <td style="vertical-align: middle;">
                        {{ Form::hidden('id_informeauditoriahallazgos[]', $informeh->id_informeauditoriahallazgos) }} 
                        {{ Form::text('tipo_hallazgo[]', $informeh->TipoHallazgo, ['class' => 'form-control tipohallazgo_id_listas', 'required' => '', 'style' => 'border: none; border-bottom: 2px solid #48548c;', 'onchange' => 'updateTotals()', 'readonly' => 'readonly']) }}                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="descripcion_hallazgos[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="3000" readonly>{{ $informeh->descripcion }}</textarea>
                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="causa_raiz[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="2000" required></textarea>
                        @error('causa_raiz.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="acciones_mejora[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="2000" required></textarea>
                        @error('acciones_mejora.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                        </td>
                        <td style="vertical-align: middle;">
    <div class="input-group date" id="demo-date-format">
        <div class="input-group-content" style="display: flex; align-items: center;">
            {{ Form::text('fecha_inicio[]', null, ['class' => 'form-control', 'required' => '', 'style' => 'width:100px;border: none; border-bottom: 2px solid #48548c;' ]) }}
        </div>
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>	
</td>

<td style="vertical-align: middle;">
    <div class="input-group date" id="demo-date-format">
        <div class="input-group-content" style="display: flex; align-items: center;">
            {{ Form::text('fecha_fin[]', null, ['class' => 'form-control', 'required' => '', 'style' => 'width:100px;border: none; border-bottom: 2px solid #48548c;' ]) }}
        </div>
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>	
</td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="evaluacion[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="1000" required></textarea>
                        @error('evaluacion.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>

        <div class="row" style="margin-top:50px;">
             <div class="col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="2" maxlength="500" style="resize: vertical; overflow-y: auto;" required></textarea>
                    <label for="observaciones">Observaciones</label>
                    @error('observaciones')
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
         




			@endsection()

		@endsection()

@endsection()