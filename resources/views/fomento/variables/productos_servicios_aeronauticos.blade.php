@extends('partials.card')
@extends('layout')


@section('title')
	Productos Y Servicios Aeronauticos
@endsection()

@section('content')
	
	@section('card-title')
		Productos Y servicios Aeronauticos
	@endsection()

	@section('card-content')
	
	<div class="card-body floating-label">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<select id="select1" name="select1" class="form-control" required>
						{{-- This is a demo --}}
						<option value="">&nbsp;</option>
						<option value="">Producto</option>
						<option value="">Producto2</option>
						<option value="">Producto3</option>
						<option value="">Producto4</option>
						<option value="">Producto5</option>
					</select>
					<label for="select1">Producto o Servicio</label>
				</div>
			</div> {{-- end col-sm-12 --}}
			
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="Lastname2">
					<label for="Lastname2">Codigo del Producto</label>
				</div>
			</div> {{--end label codigo del producto --}}

			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="Lastname2">
					<label for="Lastname2">Numero de Parte</label>
				</div>
			</div> {{-- End Numero de parte --}}
			
			<div class="col-sm-12">
				<div class="form-group">
					<input type="text" class="form-control" id="Lastname2">
					<label for="Lastname2">Descripción</label>
				</div>
			</div> {{-- Fabricante --}}

			<div class="col-sm-12">
				<div class="form-group">
					<input type="text" class="form-control" id="Lastname2">
					<label for="Lastname2">Fabricante</label>
				</div>
			</div> {{-- Fabricante --}}

			<div class="col-sm-12">
				<div class="form-group">
					<input type="text" class="form-control" id="Lastname2">
					<label for="Lastname2">Nacionalidad Fabricante</label>
				</div>
			</div> {{-- Nacionalidad --}}

		</div> {{-- end .row --}}
	</div> {{-- end .card-body --}}
	

	@endsection()
	

	@section('button')
		Agregar Nuevo Producto
	@endsection

@endsection()