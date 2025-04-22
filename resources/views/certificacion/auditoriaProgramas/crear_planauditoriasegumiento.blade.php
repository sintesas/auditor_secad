@extends('partials.card')

@extends('layout')

@section('title')
Crear Seguimiento
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'planauditoriaseguimiento.store', 'method' => 'POST', 'files' =>true)) !!}


{{ csrf_field()}}

@endsection

@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('crearplanauditoriaseguimiento', $id_auditoriaprog) }}	
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
					<h2><b>Crear Seguimiento</b></h2>
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
                            {{ Form::text('fecha_seguimiento', null, array('class' => 'form-control', 'required' => '' )) }}
                            {{ Form::label('fecha_seguimiento', 'Fecha Seguimiento')}}	
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
                        <th>Acciones de Mejora</th>
                        <th>Seguimiento</th>
                        <th style="text-align:center;">Subir Evidencia</th>
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
                        <textarea type="text" name="descripcion_hallazgos[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="3000" readonly>{{ $informeh->descripcion_hallazgos }}</textarea>
                        </td>
                        <td style="vertical-align: middle;">
                        {{ Form::hidden('id_planaccionhallazgoslista_accionesmejora[]', $informeh->id_planaccionhallazgoslista) }} 
                        <textarea type="text" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" readonly>{{ $informeh->acciones_mejora }}</textarea>
                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="seguimiento[]" class="height:41px;form-control" style="border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" maxlength="1000" required></textarea>
                        @error('seguimiento.*')
            <div class="text-danger">{{ $message }}</div>
        @enderror
</td>
<td style="vertical-align: middle; text-align: center;">
    <div>
        <label for="archivo_{{ $index }}" class="btn btn-primary">
            <i class="fa fa-upload"></i>
        </label>
        <input type="file" name="archivos[]" id="archivo_{{ $index }}" style="display:none;" onchange="mostrarNombreArchivo(event, {{ $index }})">
    </div>
    <div id="nombreArchivo{{ $index }}" style="margin-top: 10px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 170px; text-align: center; display: inline-block;">
        Ningún archivo seleccionado
    </div>
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
                    <textarea class="form-control" id="conclusiones" name="conclusiones" rows="2" maxlength="1000" style="resize: vertical; overflow-y: auto;" required></textarea>
                    <label for="conclusiones">Conclusiones</label>
                    @error('conclusiones')
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
    function mostrarNombreArchivo(event, index) {
        const archivo = event.target.files[0];
        const nombreArchivo = archivo ? archivo.name : 'Ningún archivo seleccionado';
        document.getElementById('nombreArchivo' + index).textContent = nombreArchivo;
    }
</script>



			@endsection()

		@endsection()

@endsection()