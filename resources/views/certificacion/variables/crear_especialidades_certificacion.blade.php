@extends('partials.card')

@extends('layout')

@section('title')
	Crear especialidades Certificación
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('crearespecialidadecertificacion') }}
			
		@endsection()

		@section('card-content')

		<button type="submit" class="btn btn-flat btn-primary ink-reaction">Crear nueva especialidad</button>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>ID</b></th>
							<th><b>Especialidad</b></th>
							<th><b>Codigo</b></th>
							<th><b>Descripción</b></th>
							<th><b>X</b></th>
						</tr>
					</thead>
					<tbody>
						{{-- @foreach ($especialidades as $especialidad) --}}
						<tr>
							{{-- <td>{{$especialidad->ID}}</td> --}}
							{{-- THIS WILL BE LEFT PENDING UNTIL THE FOLLOWING "ERRORS" ARE FIXED. 
							As a suggestion the button can be added with a foreachloop next to each record.
							IT IS NOT CLEAR WHICH TABLE THIS MAPS TO, THERE ARE TWO TABLES WITH NAMES:  TBLESPECIALIDADPROGRAMA	dbo	9/12/2017 10:45:54 PM
							 TBLESPECIALIDADXPERSONA
							--}}
						</tr>
						{{-- @endforeach --}}
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->


		@endsection()
{{--
	THIS WILL BE LEFT PENDING DEPENDING ON WHAT THE AF DETERMINES IF THERE'D BE A PDF OPTION TO PRINT.

		@section('button')
			Imprimir Tabla
		@endsection()
 --}}

{{-- 
	Name	Info
    ID	    int, not null
    ATA	    nvarchar(255), null
    CODATA	nvarchar(255), null
    GENERAL	nvarchar(255), null
    Campo4  nvarchar(255), null
 --}}


	@endsection()

@endsection()