@extends('partials.card')

@extends('layout')

@section('title')
Detalle Informe Auditoría
@endsection()

@section('content')



@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('verplaninformeauditoria', $id_auditoriaprog) }}	
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
					
					<h2><b>Detalle Informe Auditoría</b></h2>
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
                            {{ Form::text('fecha_informe_auditoria', $planinforme->fecha_informe_auditoria, array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly' )) }}
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
                    <textarea class="form-control" id="desarrollo_auditoria" name="desarrollo_auditoria" rows="2" required readonly>{{ $planinforme->desarrollo_auditoria }} </textarea>
                    <label for="desarrollo_auditoria">Desarrollo de Auditoría*</label>
                </div>
             </div>
        </div>



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
                        </tr>
                    </thead>
                    <tbody id="hallazgosBody">
                    @foreach($planinformehallazgos as $index => $infohallazgos)
                        <tr>
                            <td style="vertical-align: middle;">
                                {{ $index + 1 }}
                            </td>
                            <td style="vertical-align: middle;">
                            {{ Form::text('tipohallazgo_id_listas[]', $infohallazgos->TipoHallazgo, ['class' => 'form-control tipohallazgo_id_listas', 'required' => '', 'style' => 'width:100%; border: none; border-bottom: 2px solid #48548c;', 'readonly' => 'readonly']) }}
                            </td>
                            <td style="vertical-align: middle;">
                                <textarea type="text" name="descripcion[]" class="form-control" style="width: 100%; height:42px; border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="3000" readonly>{{ $infohallazgos->descripcion }}</textarea>
                                @error('descripcion.*')
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
</div>



<div class="row" style="margin-top:30px;">
        <table style="width: 60%; margin: 0 auto;">
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total Conformidades</td>
                <td style="text-align: left;" id="total-conformidades">{{ $planinforme->total_conformidades}}</td>
                <input type="hidden" name="total_conformidades" id="hidden-total-conformidades">
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total Oportunidades de Mejora</td>
                <td style="text-align: left;" id="total-oportunidades">{{ $planinforme->total_oportunidad_mejora}}</td>
                <input type="hidden" name="total_oportunidad_mejora" id="hidden-total-oportunidades">
            </tr>
            <tr>
                <td style="padding-left:10px; font-weight: bold; text-align: left;">Total No Conformidades Menor</td>
                <td style="text-align: left;" id="total-no-conformidades-menor">{{ $planinforme->total_no_conformidades_menor}}</td>
                <input type="hidden" name="total_no_conformidades_menor" id="hidden-total-no-conformidades-menor" >
                <td style="padding-left:100px; font-weight: bold; text-align: left;">Total No Conformidades Mayor</td>
                <td style="text-align: left;" id="total-no-conformidades-mayor">{{ $planinforme->total_no_conformidades_mayor}}</td>
                <input type="hidden" name="total_no_conformidades_mayor" id="hidden-total-no-conformaciones-mayor" >
            </tr>
        </table>
    </div>


        <div class="row" style="margin-top:50px;">
             <div class="col-sm-12">
                <div class="form-group">
                    <textarea class="form-control" id="conclusiones_hallazgos" name="conclusiones_hallazgos" rows="2" style="resize: vertical; overflow-y: auto;" required readonly>{{ $planinforme->conclusiones_hallazgos }} </textarea>
                    <label for="conclusiones_hallazgos">Conclusiones Hallazgos*</label>
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