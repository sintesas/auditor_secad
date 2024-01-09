@extends('partials.card')

@extends('layout')

@section('title')
	Estados de Programa
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Estados de Programa
		@endsection()

		@section('card-content')

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>ID</b></th>
							<th><b>ESTADO</b></th>
						</tr>
					</thead>
					<tbody>
						{{-- @foreach ($programas as $programa)
						<tr>
							<td>{{$programa->ID}}</td>
							<td>{{$programa->ESTADO}}</td>
						</tr>
						@endforeach --}}
					</tbody>
				</table>
			</div><!--end .table-resp -->

		</div>
		


		@endsection()


	{{-- ASK DAVE TO CREATE THE STORED PROCEDURE FOR THIS TABLE. --}}
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