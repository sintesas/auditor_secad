@extends('partials.card')

@extends('layout')

@section('title')
Detalle Seguimiento
@endsection()

@section('content')


@section('card-title')
<div style="display: flex; align-items: center;">
        <span>
        {{ Breadcrumbs::render('verplanauditoriaseguimiento', $id_auditoriaprog) }}	
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
					<h2><b>Detalle Seguimiento</b></h2>
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
                            {{ Form::text('fecha_seguimiento', $seguimiento->fecha_seguimiento, array('class' => 'form-control', 'required' => '', 'readonly' => 'readonly')) }}
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
                        <th style="text-align:center;">Descargar</th>
                    </tr>
                </thead>
                <tbody id="hallazgosBody">
                @foreach($seguimientoHallazgos as $index => $hallazgos)

                    <tr>
                        <td style="vertical-align: middle;">
                        {{ $index + 1 }}
                        </td>
                        <td style="vertical-align: middle;">
                        {{ Form::hidden('id_informeauditoriahallazgos[]', $hallazgos->id_informeauditoriahallazgos) }} 
                        {{ Form::text('tipo_hallazgo[]', $hallazgos->TipoHallazgo, ['class' => 'form-control tipohallazgo_id_listas', 'required' => '', 'style' => 'border: none; border-bottom: 2px solid #48548c;', 'onchange' => 'updateTotals()', 'readonly' => 'readonly']) }}                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="descripcion_hallazgos[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" readonly>{{ $hallazgos->descripcion_hallazgos }}</textarea>
                        </td>
                        <td style="vertical-align: middle;">
                        {{ Form::hidden('id_planaccionhallazgoslista_accionesmejora[]', $hallazgos->id_planaccionhallazgoslista_accionesmejora) }} 
                        <textarea type="text" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" readonly>{{ $hallazgos->acciones_mejora }}</textarea>
                        </td>
                        <td style="vertical-align: middle;">
                        <textarea type="text" name="seguimiento[]" class="form-control" style="height:41px;border: none; border-bottom: 2px solid #48548c;resize: vertical; overflow-y: auto;" readonly>{{ $hallazgos->seguimiento }}</textarea>

</td>
<td style="vertical-align: middle; text-align: center;">
    @if(isset($hallazgos->nombre_archivo) && !empty($hallazgos->nombre_archivo))
        <div>
        <a href="{{ route('descargar.archivo', $hallazgos->id_planaudseguimientohallazgo) }}" class="btn btn-primary">
            <i class="fa fa-download"></i> 
        </a>
        </div>
        <div style="margin-top: 5px; max-width: 170px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display: inline-block;" title="{{ $hallazgos->nombre_archivo }}">
            {{ $hallazgos->nombre_archivo }}
        </div>
    @else
        <span>No hay archivo disponible</span>
    @endif
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
                    <textarea class="form-control" id="conclusiones" name="conclusiones" rows="2" style="resize: vertical; overflow-y: auto;" readonly> {{ $seguimiento->conclusiones}} </textarea>
                    <label for="conclusiones">Conclusiones</label>
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
         
         <script>
    function mostrarNombreArchivo(event, index) {
        const archivo = event.target.files[0];
        const nombreArchivo = archivo ? archivo.name : 'Ningún archivo seleccionado';
        const nombreArchivoDiv = document.getElementById('nombreArchivo' + index);
        
        nombreArchivoDiv.textContent = nombreArchivo;
        nombreArchivoDiv.title = nombreArchivo; 
    }
</script>





		@endsection()

@endsection()