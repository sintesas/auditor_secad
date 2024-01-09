@extends('partials.card')

@extends('layout')

@section('title')
	Familiares
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('familiares') }}
@if(count($familiares)>0)
	<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($familiares)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen Familiares Registrados, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else


	<div class="table-responsive">
		<h4><strong>Personal:</strong> {{$grado->Abreviatura}} | {{$persona->Nombres}}  {{$persona->Apellidos}}</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Parentesco</b></th>
					<th><b>Nombres y apellidos</b></th>
					<th><b>Telefono</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach ($familiares as $familiar)
				<tr>
					<td>{{$familiar->Parentesco}}</td>
					<td>{{$familiar->Nombre}}</td>
					<td>{{$familiar->Telefono}}</td>

					<td>

						<div class="col-sm-6">

							{!! Form::open(['route' => ['familiares.destroy', $familiar->IdFamiliar], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>

						<div class="col-sm-6">

							<a href="{{route('familiares.edit', $familiar->IdFamiliar) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

						</div>

					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
@endif
</div>


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Familiar</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'familiares.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<select class="form-control" id="Parentesco" name="Parentesco" required>
										<option value=""></option>
										<option value="Esposo(a)">Esposo(a)</option>
										<option value="Hijo(a)">Hijo(a)</option>
									</select>
									<label for="Parentesco">Parentesco</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Nombre" name="Nombre" required>
									<label for="Nombre">Nombres y apellidos</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
                                    <div class="input-group date" id="demo-date-format">
                                        <div class="input-group-content">
                                            <input type="text" class="form-control" id="FechaNacimiento" name="FechaNacimiento" required>
                                            <label for="FechaNacimiento"> Fecha de nacimiento </label>
                                        </div>
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
							</div>


							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Edad" name="Edad" required readonly="">
									<label for="Edad">Edad</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Telefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<select class="form-control" id="EstadoCivil" name="EstadoCivil">
                                        <option value=""></option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Union Libre">Union Libre</option>
                                    </select>
									<label for="EstadoCivil">Estado Civil</label>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Direccion" name="Direccion" required>
									<label for="Direccion">Dirección</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="EstadoCivil" name="EstadoCivil" required>
									<label for="EstadoCivil">Barrio</label>
								</div>
							</div>

							<input type="hidden" value="{{$persona->IdPersonal}}" name="IdPersonal">


						</div>


					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
				</div>
				<div class="col-sm-6">
					<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
				</div>
			</div>

			{!! Form::close() !!}

			<script type="text/javascript">
				$('select').select2();
			</script>
			<script type="text/javascript">
				$("#Edad").focusin(function(){
			        var fecha = $('#FechaNacimiento').val();
			        var edad = calcularEdad(fecha);
			        $('#Edad').val(edad);
			    });

			    // GET EDAD
			    function calcularEdad(fecha) {
			        var hoy = new Date();
			        var cumpleanos = new Date(fecha);
			        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
			        var m = hoy.getMonth() - cumpleanos.getMonth();

			        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
			            edad--;
			        }

			        return edad;
			    }
			</script>
			</div>
		</div>

	</div>

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>



@endsection()


@endsection()
