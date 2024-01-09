@extends('partials.card')

@extends('layout')

@section('title')
	Crear Requerimientos PDR
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Requerimientos PRELIM
		@endsection()

		@section('card-content')
			
			<div class="card-body floating-label">
				<div class="row">

						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Codigo">
								<label for="Codigo">ID</label>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="Proceso">
								<label for="Proceso">Requerimiento</label>
							</div>
						</div>

					</div>	
				</div>
			</div>	

		@endsection()

		@section('button')
			Agregar nuevo Registro
		@endsection()





	@endsection()

@endsection()