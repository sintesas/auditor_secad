
@extends('partials.card')

@extends('layout')

@section('title')
Editar Cluster
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('editar_cluster') }}
@endsection()

@section('card-content')

@section('form-tag')


{!! Form::model($cluster, ['route' => ['cluster.update', $cluster->IdCluster], 'method' => 'PUT' ]) !!}

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
							<header>Editar Cluster</header>
							<div class="tools">
								<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
							</div>
						</div>
						{{-- PANEL 1 CREAR EMPRESA --}}
						<div id="accordion1-1" class="collapse in">


							<div class="card-body floating-label">
								<div class="row">

									<div class="col-sm-8">
										<div class="form-group">
											<input type="text" class="form-control" id="nombre_cluster" name="NombreCluster" value="{{old('nombre_cluster', $cluster->NombreCluster)}}" required>
											<label for="nombre_cluster">Nombre del cluster</label>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" class="form-control" id="sigla" name="Sigla" value="{{old('sigla',$cluster->Sigla)}}"  required>
											<label for="sigla">Sigla</label>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="ciudad" name="Ciudad" value="{{old('ciudad', $cluster->Ciudad)}}" required>
											<label for="ciudad">Ciudad</label>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="region" name="Region" value="{{old('region', $cluster->Region)}}" required>
											<label for="region">Región</label>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="direccion" name="Direccion" value="{{old('direccion', $cluster->Direccion)}}" required>
											<label for="direccion">Dirección</label>
										</div>
									</div>
									{{--  --}}
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="representante_legal" name="RepresLegal" value="{{old('representante_legal', $cluster->RepresLegal)}}" required>
											<label for="representante_legal">Representante Legal</label>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" id="email" name="Email" value="{{old('email', $cluster->Email)}}" required>
											<label for="email">email</label>
										</div>
									</div>
								</div>	
							</div>




						</div>	

						{!! Form::close() !!}

					</div>
				</div><!--end .panel -->

				{{-- END PANEL CREAR EMPRESA --}}


				{{-- START CAPACIDADES --}}
				<div class="card panel">
					<div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1" data-target="#accordion1-2">
						<header>Afiliados Cluster</header>
						<div class="tools">
							<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
						</div>
					</div>
					<div id="accordion1-2" class="collapse">
						<div class="col-lg-12">
							
						</div>
					</div>
				</div><!--end .panel -->

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
			{{ Form::label('ATA', 'ATA')}}
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

			$('select').select2();
		</script>




	</div>
</div>


{{-- END CREATEMODAL --}}


@endsection()




@endsection()




@endsection()