@extends('partials.card')

@extends('layout')

@section('title')
	Crear Criterios
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Creación de Criterios
		@endsection()

		@section('card-content')


			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Firstname2">
						<label for="Firstname2">Firstname</label>
					</div>
				</div>
				<div class="col-sm-6">
					<button type="submit" class="btn btn-flat btn-primary ink-reaction">Anadir Criterio</button>
				</div>
			</div>

			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>ID</b></th>
							<th><b>CRITERIO</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($criterios as $criterio)
						<tr>
							<td>{{$criterio->IdCriterio}}</td>
							<td>{{$criterio->Descripcion}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-resp
		


		@endsection()



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