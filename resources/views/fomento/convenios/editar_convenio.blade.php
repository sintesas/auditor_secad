
@extends('partials.card')

@extends('layout')

@section('title')
Editar Convenio
@endsection()

@section('content')

@section('card-content')
@section('card-title')
	{{ Breadcrumbs::render('editar_convenio') }}
@endsection()
@section('card-content')

@section('form-tag')


{!! Form::model($convenio, ['route' => ['convenio.update', $convenio->IdConvenios], 'method' => 'PUT' ]) !!}

{{ csrf_field()}}

@endsection


<div class="col-lg-12">
	<div class="table-responsive">
		<!-- BEGIN STRUCTURE  -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion1">
					<div class="card panel">
						<div class="card-head expanded" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-1">
							<header>Editar Convenio</header>
							<div class="tools">
								<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
							</div>
						</div>
						{{-- PANEL 1 CREAR EMPRESA --}}
						<div id="accordion1-1" class="collapse in">


							<div class="card">
								<div class="card-body floating-label">

									{!! Form::model($convenio, ['route' => ['convenio.update', $convenio->IdConvenios], 'method' => 'PUT' ]) !!}

									{{ csrf_field()}}

									<div class="card">
										<div class="card-body">

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Nombre" value="{{old('Nombre', $convenio->NombreConv)}}" name="NombreConv" required>
														<label for="Nombre">Nombre Convenio</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Entidad" value="{{old('Entidad', $convenio->Entidad)}}" name="Entidad" required>
														<label for="Entidad">Entidad</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group date" id="demo-date-format">
															<div class="input-group-content">
																<input type="text" class="form-control" id="Fecha" value="{{old('Fecha', $convenio->Fecha)}}" name="Fecha" required >
																<label for="Fecha">Fecha</label>
															</div>
															<span class="input-group-addon"></span>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="input-group date" id="demo-date-format">
															<div class="input-group-content">
																<input type="text" class="form-control" id="Vigencia" value="{{old('Vigencia', $convenio->Vigencia)}}" name="Vigencia" required >
																<label for="Vigencia">Vigencia</label>
															</div>
															<span class="input-group-addon"></span>
														</div>
													</div>
												</div>
																								<div class="row">
													<div class="col-sm-6">
													<div class="form-group floating-label">
														<select name="IdCaracterConvenio" id="IdCaracterConvenio" class="form-control" required>
															<option value=""></option>
															@foreach($caraterConvenios as $caracter)
															<option value="{{$caracter->IdCaracterConvenio}}" @if( (int)$convenio->IdCaracterConvenio == (int)$caracter->IdCaracterConvenio) selected @endif>{{$caracter->NombreCaracterConvenio}}</option>
															@endforeach
														</select>
													<label for="IdCaracterConvenio">Caracter Convenio</label>
													</div>
														<div class="form-group">


														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group floating-label">
															{{ Form::select('IdEstadoConvenio', $estadoConvenios->pluck('NombreEstadoConvenio' , 'IdEstadoConvenio'), null, ['class' => 'form-control', 'id' => 'IdEstadoConvenio']) }}
															<label for="Entidad">Estado Convenio</label>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<textarea class="form-control" id="Objeto" name="Objeto"  rows="2" required> {{old('Objeto', $convenio->Objeto)}}  </textarea>
														<label for="Observaciones">Objeto</label>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<input type="text" class="form-control" id="Antecedente" value="{{old('Antecedente', $convenio->Antecedente)}}" name="Antecedente" required>
														<label for="Antecedente">Antecedente</label>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<input type="text" class="form-control" id="Responsable" value="{{old('Responsable', $convenio->Responsable)}}" name="Responsable" required>
														<label for="Responsable">Responsable</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Contacto" value="{{old('Contacto', $convenio->Contacto)}}" name="Contacto" required>
														<label for="Contacto">Contacto</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Celular" value="{{old('Celular', $convenio->Celular)}}" name="Celular" required>
														<label for="Celular">Celular</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Email" value="{{old('Email', $convenio->Email)}}" name="Email" required>
														<label for="Email">Email</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="Pendiente" value="{{old('Pendiente', $convenio->Pendiente)}}" name="Pendiente" required>
														<label for="Pendiente">Pendiente</label>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<input type="text" class="form-control" id="DSDS" value="{{old('DSDS', $convenio->DSDS)}}" name="DSDS" required>
														<label for="DSDS">DSDS</label>
													</div>
												</div>
												<div class="col-sm-6" style ="visibility: hidden">
													<div class="form-group floating-label">
															{{ Form::select('IdTipoConvenio', $TipoConvenio->pluck('NombreTipoConvenio' , 'IdTipoConvenio'), null, ['class' => 'form-control', 'id' => 'IdTipoConvenio']) }}
															{{ Form::label('NombreTipoConvenio', 'TipoConvenio')}}
													</div>
												</div>



											</div>

										</div>
									</div>


									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
											</div>
											<div class="col-sm-6">
												<button type="button" onclick="window.location='{{ route("convenio.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
											</div>
										</div>
									</div>




								</div>

								{!! Form::close() !!}

							</div>
						</div><!--end .panel -->

						{{-- END PANEL EDITAR CONVENIO --}}



					</div><!--end .panel-group -->
				</div><!--end .col -->
			</div><!--end .row -->
			<!-- END STRUCTURE -->
		</div><!--end .table-responsive -->











		{{-- ////////////////////////// --}}





		{{-- BEGIN CREATE MODAL --}}
		<div id="id1" class="modal" style="padding-top:135px;">

			<div class="modal-content">


				<div class="card-head style-primary">
					<header>Creación de codigos ATA	</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span>
				</div>

				<center>

					{!! Form::open(array('route' => 'ata.store', 'data-parsley-validate' => 'parsley')) !!}

					{{ csrf_field()}}

					<br>
					Convenio{{ Form::label('ATA', 'ATA')}}
					{{ Form::text('ATA', null, array('class' => 'form-control', 'style' => 'width: 60%', 'required' => '' )) }}

					<br>
					{{ Form::label('codigo_ata', 'Codigo Ata')}}
					{{ Form::text('codigo_ata', null, array('class' => 'form-control', 'style' => 'width: 60%', 'required' => '' )) }}


					<br>
					{{ Form::label('general', 'General')}}
					{{ Form::text('general', null, array('class' => 'form-control', 'style' => 'width: 60%',  'required' => '' )) }}

					<br>

					<div class="form-group">
						<center><button type="submit" class="btn btn-info">Crear Codigo</button></center>
					</div>


				</center>



				{!! Form::close() !!}

				<script>
					function ConfirmDelete()
					{
						var x = confirm("Are you sure you want to delete?");
						if (x)
							return true;
						else
							return false;
					}
				</script>




			</div>
		</div>


		{{-- END CREATEMODAL --}}


		@endsection()




		@endsection()




		@endsection()
