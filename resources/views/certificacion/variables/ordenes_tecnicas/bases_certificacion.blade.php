@extends('partials.card')

@extends('layout')

@section('title')
	Ingreso Bases Certificación
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Ingreso Bases Certificación
		@endsection()

		@section('card-content')
		

			<div class="card-body floating-label">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="numero">
							<label for="numero">Numero</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="origen">
							<label for="origen">Origen</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="">
							<label for="">Autoridad</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="clase">
							<label for="clase">Clase</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="referencia">
							<label for="referencia">Referencia</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="nombre">
							<label for="nombre">Nombre</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="aplicacion">
							<label for="aplicación">Aplicación</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="fecha">
							<label for="fecha">Fecha</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="disponible">
							<label for="disponible">disponible</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="">
							<label for="">Enmienda</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="PAG FIG INC">
							<label for="PAG FIG INC">PAG FIG INC</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="estado">
							<label for="estado">Estado</label>
						</div>
					</div>

				</div>
			</div>


		


		@endsection()



		@section('button')
			Eliminar Registro
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