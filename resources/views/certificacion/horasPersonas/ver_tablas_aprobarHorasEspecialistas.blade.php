@extends('partials.card')

@extends('layout')

@section('title')
	Aprobar Horas Especialista
@endsection()

@section('content')

	@section('card-content')

		@section('card-title')

        {{ Breadcrumbs::render('aprobarespecialistas', $programa->IdPrograma) }}		
			
			{{-- End modal --}}

		@endsection()

		@section('card-content')

        <span style="margin-left: 12px; margin-top: -3px;font-size: 15px;">
        <strong>Número Programa:</strong> {{ $programa->Consecutivo }}
            </span>
        <br>
        <span style="margin-left: 12px; margin-top: -3px;font-size: 15px;">
        <strong>Programa:</strong> {{ $programa->Proyecto }}
            </span>
            <br>
            <span style="margin-left: 12px; margin-top: -3px;font-size: 15px;">
        <strong>Especialista:</strong> {{ $nombreespecialista->NombreCompleto }}
            </span>

            <div class="col-sm-3" style="margin-left:90%;margin-top:-100px">
                        <button type="button" class="btn btn-primary btn-info" style="width:100px;display: flex; align-items: center; justify-content: center;" onclick="window.location.href='{{ route('aprobacionhoras.show', $programa->IdPrograma) }}'">
                            <i class="fa fa-arrow-left" style="margin-right:5px"></i> Volver
                        </button>
                    </div>

			<div class="col-lg-12">
				<div class="table-responsive">

					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Actividad</th>
								<th>Evidencia</th>
								<th>Rol</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Horas reportadas</th>
                                <th>Horas Aprobadas</th>
                                <th>Aprobador</th>
                                <th>Fecha Aprobación</th>
                                <th>Aprobar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($especialistasseguimiento as $programa)
							@if ($permiso->consultar == 1)
							<tr>
								<td>{{ $programa->IdListaSeguimiento }}</td>
								<td>{{ $programa->Actividad }}</td>
								<td>{{ $programa->Evidencias}}</td>
                                @php                    
                                $rolText = $programa->Rol ? $programa->Rol : 'Sin rol asignado';
                                @endphp
								<td>{{ $rolText}}</td>
                                <td>{{ $programa->DescripcionTrabajo}}</td>
                                <td>{{ $programa->Fecha}}</td>
                                <td>{{ $programa->Horas}}</td>
                                <td>{{ $programa->HorasAprobadas}}</td>
                                <td>{{ $programa->Aprobador}}</td>
                                <td>{{ $programa->fecha_aprobacion}}</td>
                                <td>
                                <button type="button" 
    class="btn btn-info ink-reaction btn-primary editbutton" 
    data-idlistaseguimiento="{{ $programa->IdListaSeguimiento }}" 
    data-actividad="{{ $programa->Actividad }}"
    data-evidencias="{{ $programa->Evidencias }}"
    data-fecha="{{ $programa->Fecha }}"
    data-horas="{{ $programa->Horas }}"
    data-descripcion="{{ $programa->DescripcionTrabajo }}"
    data-idespecialistaseguimiento="{{ $programa->IdEspecialistaSeguimiento }}"
    data-proyecto="{{ $programa->Proyecto}}"
    data-especialista="{{ $programa->Nombres }}"
    data-rol="{{ $programa->Rol }}"
    data-idaprobarhoras="{{ $programa->id_aprobarhoras }}"
    data-horasaprobadas="{{ $programa->HorasAprobadas}}"
    onclick="openModal(this)" 
    style="display: flex; justify-content: center; align-items: center; text-align:center; height: 40px; width: 40px; padding: 0;">
    <span class="fa fa-check-circle" style="font-size: 20px;"></span>
</button>

			</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
					{{-- {!! $atas->links(); !!} --}}
					</div>

				</div><!--end .table-responsive -->
			</div><!--end .col -->

    <div<div id="id1" class="modal" style="padding-top:135px;">
    <div class="modal-content">
        <div class="card-head style-primary">
            <header id="modalHeader">Aprobar Horas</header>
            <span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'" class="close">x</span>
        </div>

        <div class="card">
            <div class="card-body floating-label">
                {{-- El formulario cambia dependiendo si estamos editando o creando --}}
                <form id="aprobarHorasForm" action="" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Actividad" name="Actividad" required readonly>
                            <label for="Actividad">Actividad</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="Evidencias" name="Evidencias" required readonly>
                            <label for="Evidencias">Evidencias</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group date" id="demo-date-format">
                                <div class="input-group-content">
                                    <input type="text" class="form-control" id="Fecha" name="Fecha" required readonly>
                                    <label for="Fecha">Fecha</label>
                                </div>
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="number" class="form-control" id="HorasReportadas" name="HorasReportadas" required onKeyPress="return soloNumeros(event)" readonly>
                            <label for="Horas">Horas Reportadas</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="number" class="form-control" id="HorasAprobadas" name="HorasAprobadas" required onKeyPress="return soloNumeros(event)">
                            <label for="HorasAprobadas">Horas Aprobadas</label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group date" id="demo-date-format">
                                <div class="input-group-content">
                                    <input type="date" class="form-control" id="fecha_aprobacion" name="fecha_aprobacion" required readonly>
                                    <label for="fecha_aprobacion">Fecha Aprobación</label>
                                </div>
                                <span class="input-group-addon"></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Campos ocultos que se utilizan para almacenar datos adicionales --}}
                <input type="hidden" id="IdListaSeguimiento" name="IdListaSeguimiento">
                <input type="hidden" id="IdEspecialistaSeguimiento" name="IdEspecialistaSeguimiento">
                <input type="hidden" id="Proyecto" name="Proyecto">
                <input type="hidden" id="Especialista" name="Especialista">
                <input type="hidden" id="Rol" name="Rol">
                <input type="hidden" id="DescripcionTrabajo" name="DescripcionTrabajo">
                <input type="hidden" id="id_aprobarhoras" name="id_aprobarhoras"> 

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info btn-block" id="submitButton">
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" onclick="window.location='{{route('aprobarhorasespecialistas.show', $IdPrograma . '&' . $nombreespecialista->IdPersonal) }}'" class="btn btn-danger btn-block">Cancelar</button>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
		@endsection()

	@endsection()

	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('#datatable1').DataTable();
			});
		</script>

<script>
    function openModal(button) {
       
        var idaprobarhoras = button.getAttribute('data-idaprobarhoras'); 
        var actividad = button.getAttribute('data-actividad');
        var evidencias = button.getAttribute('data-evidencias');
        var fecha = button.getAttribute('data-fecha');
        var horas = button.getAttribute('data-horas');
        var descripcion = button.getAttribute('data-descripcion');
        var idespecialistaseguimiento = button.getAttribute('data-idespecialistaseguimiento');
        var proyecto = button.getAttribute('data-proyecto');
        var especialista = button.getAttribute('data-especialista');
        var rol = button.getAttribute('data-rol');
        var horasaprobadas = button.getAttribute('data-horasaprobadas');
        console.log('horasaprobadas ' + horasaprobadas);

        
        $('#Actividad').val(actividad || '').trigger('change');
        $('#Evidencias').val(evidencias || '').trigger('change');
        $('#Fecha').val(fecha || '').trigger('change');
        $('#HorasReportadas').val(horas || '').trigger('change');
        $('#DescripcionTrabajo').val(descripcion || '').trigger('change');
        $('#HorasAprobadas').val(horasaprobadas || '').trigger('change');

        
        document.getElementById('IdListaSeguimiento').value = button.getAttribute('data-idlistaseguimiento');
        document.getElementById('IdEspecialistaSeguimiento').value = idespecialistaseguimiento;
        document.getElementById('Proyecto').value = proyecto;
        document.getElementById('Especialista').value = especialista;
        document.getElementById('Rol').value = rol;
        document.getElementById('DescripcionTrabajo').value = descripcion;

        
        document.getElementById('id_aprobarhoras').value = idaprobarhoras;

        
        var header = document.querySelector('#modalHeader');
        var submitButton = document.querySelector('#submitButton');
        var form = document.querySelector('#aprobarHorasForm');

        if (idaprobarhoras > 0) {
            header.textContent = 'Editar Horas';
            submitButton.textContent = 'Actualizar';
            form.action = "{{ route('aprobarhorasespecialistas.update', ':id') }}".replace(':id', idaprobarhoras);  
            form.method = 'POST'; 
            var methodField = document.createElement('input');
            methodField.setAttribute('type', 'hidden');
            methodField.setAttribute('name', '_method');
            methodField.setAttribute('value', 'PUT');
            form.appendChild(methodField); 
        } else {
            header.textContent = 'Aprobar Horas';
            submitButton.textContent = 'Crear';
            form.action = "{{ route('aprobarhorasespecialistas.store') }}";  
            form.method = 'POST';  
        }

        
        document.getElementById('id1').style.display = 'block';
    }
</script>








<script>
    window.onload = function() {
        // Obtener la fecha actual
        var today = new Date();
        
        // Obtener el formato YYYY-MM-DD (el formato requerido por los inputs de tipo 'date')
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // Los meses empiezan desde 0
        var yyyy = today.getFullYear();
        
        today = yyyy + '-' + mm + '-' + dd;
        
        // Asignar la fecha al input
        var fechaInput = document.getElementById('fecha_aprobacion');
        fechaInput.value = today;

        // Disparar el evento 'change' para asegurarnos de que cualquier lógica asociada al cambio se ejecute
        $(fechaInput).trigger('change');
    };
</script>



	@endsection()

@endsection()