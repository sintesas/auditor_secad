@extends('partials.card')

@extends('layout')

@section('title')
	Aprobación Horas Especialistas
@endsection()

@section('content')

	@section('card-content')

		@section('card-title')

		{{ Breadcrumbs::render('aprobacionhorasespecialistas', $programa->IdPrograma) }}
			<!-- Begin Modal -->
			
			{{-- End modal --}}

		@endsection()

		@section('card-content')

		<span style="margin-left: 12px; margin-top: -3px;font-size: 15px;">
        <strong>Número Programa:</strong> {{ $programa->Consecutivo }}
            </span>
            <br>
            <span style="margin-left: 12px; margin-top: -3px;font-size: 15px;">
        <strong>Nombre:</strong> {{ $programa->Proyecto }}
            </span>

			<div class="col-lg-12">
				<div class="table-responsive">

					<table id="datatable1" class="table table-striped table-hover">
						<thead>
							<tr>
								<th>No. de Identificación</th>
								<th>NombreEspecialista</th>
								<th style="text-align: center;">EstadoAprobado</th>
                                <th><b>Aprobar</b></th>
							</tr>
						</thead>
						<tbody>
    @foreach ($especialistas1 as $programa)
        @if ($permiso->consultar == 1)
            <tr>
                <td>{{ $programa->Cedula }}</td>
                <td>{{ $programa->NombreCompleto }}</td>
				@php
    // Obtener el estado final de aprobación para el personal específico
    $estadoAprobacionPersonal = $estadoAprobacionFinal[$programa->IdPersonal] ?? 0;
@endphp

<td style="text-align: center;">
    @if ($estadoAprobacionPersonal == 1)
        
        <i class="fa fa-check-circle" style="color: green;"></i>
    @else
        
        <i class="fa fa-ellipsis-h" style="color: black;"></i>
    @endif
</td>



                <td>
                    <div class="col-sm-3" style="margin-left:20px;">
                        <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center;" onclick="window.location.href='{{ route('aprobarhorasespecialistas.show', $IdPrograma . '&' . $programa->IdPersonal) }}'">
                            <i class="fa fa-list-ul"></i> 
                        </button>
                    </div>
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

		@endsection()

	@endsection()

	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('#datatable1').DataTable();
			});
		</script>

	@endsection()

@endsection()