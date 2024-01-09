@extends('partials.card')

@extends('layout')

@section('title')
	Crear Empresa
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'empresa.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		Crear Empresa
		@endsection()

		@section('card-content')
			
			<div class="card-body floating-label">
				<div class="row">

						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="nombre" name="NombreEmpresa" required>
								<label for="nombre">Nombre de la Empresa</label>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="nit" name="Nit" required>
								<label for="nit">NIT</label>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="Email" required>
								<label for="email">Email</label>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="ciudad" name="Ciudad" required>
								<label for="ciudad">Ciudad</label>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="telefax" name="Telefono" required>
								<label for="telefax">Telefono</label>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="Pagina_web" name="PaginaWeb" required>
								<label for="Pagina_web">Pagina Web</label>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="direccion" name="Direccion" required>
								<label for="direccion">Dirección</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Actividades de la empresa</label>
							<div class="col-sm-9">
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('option1', '1'); !!}<span>Diseno y Desarrollo</span>
									{{-- <input type="checkbox" value="option1"><span>Diseno y desarrollo</span> --}}
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('option2', '1'); !!}<span>Fabricante</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('option3', '1'); !!}<span>Prestacion de servicios</span>
								</label>

								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('option4', '1'); !!}<span>Mantenimiento de aeronaves</span>
								</label>

							</div><!--end .col -->
						</div><!--end .form-group -->

						<div style="margin-top: 300px;" class="row">
							<div class="col-sm-8">
								<div class="form-group">
									<input type="text" class="form-control" id="Pagina_web" name="NombreCertificaInfo">
									<label for="Pagina_web">Nombre del funcionario que certifica la veracidad de la información</label>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<input type="text" class="form-control" id="Pagina_web" name="CargoCertificaInfo">
									<label for="Pagina_web">Cargo</label>
								</div>
							</div>
						</div>
							

							<br>
						<div class="form-group">
							
							<div class="col-sm-12">
								<label class="checkbox-inline checkbox-styled">
									<input type="checkbox" value="option1"><span><b>Autorización:</b> La empresa autoriza a la seccion de certificacion Aeronautica de la defensa SECAD de la fuerza aerea Colombiana para transmitir la informacion contenida en este formulario FRE a travez del catalogo de industria y Aeroespacial Colombiano (CIACEC)</span>
								</label>
							</div>
						</div>
							
						

					</div>	
				</div>
			</div>	


			<div class="col-sm-6">
				<div class="form-group">
					<center><button type="submit" class="btn btn-info">Crear Funcionario</button></center>
				</div>
			</div>

			{!! Form::close() !!}
		@endsection()




	@endsection()

@endsection()