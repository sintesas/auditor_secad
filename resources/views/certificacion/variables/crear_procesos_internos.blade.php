@extends('partials.card')

@extends('layout')

@section('title')
	Crear Procesos Internos
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			Crear Procesos Internos
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
								<label for="Proceso">Proceso</label>
							</div>
						</div>

					</div>	
				</div>
			</div>	

		@endsection()

		@section('button')
			Agregar nuevo Registro
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