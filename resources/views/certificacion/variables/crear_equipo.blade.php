@extends('partials.card')

@extends('layout')

@section('title')
	Crear Aplicación
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Crear Aplicación
		@endsection()

		@section('card-content')
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="codigo">
					<label for="codigo">código</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="tipo">
					<label for="tipo">tipo</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="equipo">
					<label for="equipo">equipo</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="aeronave">
					<label for="aeronave">aeronave</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="grupo">
					<label for="grupo">grupo</label>
				</div>
			</div>
			<div class="col-sm-6">
				<button type="submit" class="btn btn-flat btn-primary ink-reaction">Crear Equipo</button>
			</div>
		</div>

		<br>

		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Codigo</b></th>
							<th><b>Tipo</b></th>
							<th><b>Equipo</b></th>
							<th><b>Aeronave</b></th>
							<th><b>Grupo</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($aplicaciones as $aplicacion)
						<tr>
							<td>{{$aplicacion->COD}}</td>
							<td>{{$aplicacion->APLICACION}}</td>{{-- APLICACION IS THE SAME AS TIPO BASED ON TABLE --}}
							<td>{{$aplicacion->EQUIPO}}</td>
							<td>{{$aplicacion->AERONAVE}}</td>
							<td>{{$aplicacion->GRUPO}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->

		{{-- THIS MAPS TO DBO.APLICA ASK DAVE TO HELP WITH CRUD STORED PROCEDURE  --}}
		@endsection()
	
		{{-- THIS BUTTON HAS TO STAY AS TO PER USER STORY. --}}
		@section('button')
			Imprimir Tabla
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