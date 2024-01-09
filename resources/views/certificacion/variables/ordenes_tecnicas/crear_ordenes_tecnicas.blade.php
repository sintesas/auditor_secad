@extends('partials.card')

@extends('layout')

@section('title')
	Crear Ordenes Tecnicas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			CLS MAESTRAPUBLITECNICA
		@endsection()

		@section('card-content')

		
		{{-- DO WE NEED INPUT ? --}}

		
		<br>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>ID</b></th>
							<th><b>Descripción</b></th>
							<th><b>Numero</b></th>
							<th><b>Fabricante</b></th>
							<th><b>Fecha</b></th>
							<th><b>Disponible</b></th>
							<th><b>Vigente</b></th>
							<th><b>PAGFIGIND</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($ordenes as $orden)
						<tr>
							<td>{{$orden->ID}}</td>
							<td>{{$orden->MANUALTECNICO}}</td>
							<td>{{$orden->NUMERO}}</td>
							<td>{{$orden->FABRICANTE}}</td>
							<td>{{$orden->FECHA}}</td>
							<td>{{$orden->DISPONIBLE}}</td>
							<td>{{$orden->VIGENTE}}</td>
							<td>{{$orden->PAGFIGIND}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->


		@endsection()

{{-- 		@section('button')
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