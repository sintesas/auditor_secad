@extends('partials.card')

@extends('layout')

@section('title')
	Crear Ubicaciones
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Crear Ubicaciones
		@endsection()

		@section('card-content')
			
			<div class="card-body floating-label">
				<div class="row">

						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="id">
								<label for="id">ID</label>
							</div>
						</div>

						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="lugar">
								<label for="Proceso">lugar</label>
							</div>
						</div>

					</div>	
				</div>
			</div>	

		@endsection()

		@section('button')
			Imprimir
		@endsection()





	@endsection()

@endsection()