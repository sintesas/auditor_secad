@extends('partials.card')

@extends('layout')

@section('title')
	Cursos
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('cursosPersonal') }}
@if(count($cursos)>0)
	<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($cursos)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen Cursos Registrados, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else


	<div class="table-responsive">
		<h4><strong>Personal:</strong> {{$grado->Abreviatura}} | {{$persona->Nombres}}  {{$persona->Apellidos}}</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>NombreCurso</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach ($cursos as $curso)
				<tr>
					<td>{{$curso->NombreCurso}}</td>

					<td>
							
						<div class="col-sm-6">

							{!! Form::open(['route' => ['cursosPersonal.destroy', $curso->IdCursoPersonal], 'method' => 'DELETE']) !!}									

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>

						<div class="col-sm-6">

							<a href="{{route('cursosPersonal.edit', $curso->IdCursoPersonal) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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
			<header>Crear Nuevo Curso</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'cursosPersonal.store', 'files' =>true)) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									{{ Form::select('IdCurso', $listCursos->pluck('NombreCurso', 'IdCurso'), null, ['class' => 'form-control', 'id' => 'IdCurso']) }}
									<label for="IdCurso">Cursos</label>
								</div>
							</div>

						</div>
						<div class="row">
                            <div class="col-sm-4">
                                <div class="foto-diploma">
                                    {{-- <img id="image_upload_preview" src="" style=""> --}}
                                    <img id="image_upload_preview" src="{{URL::asset('/img/diplom.png')}}" alt="profile Pic">
                                </div>

                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                   {!! Form::file('foto', array('class' => 'form-control', 'id' => 'inputFile', 'required')) !!}
                                   
                                </div>
                            </div>
                        </div>

						<div class="row">

							<input type="hidden" value="{{$persona->IdPersonal}}" name="IdPersonal">
							<input type="hidden" value="{{$persona->Cedula}}" name="cedula">

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
				// Previw Img
	            function readURL(input) {
	                if (input.files && input.files[0]) {
	                    var reader = new FileReader();

	                    reader.onload = function (e) {
	                        $('#image_upload_preview').attr('src', e.target.result);
	                    }

	                    reader.readAsDataURL(input.files[0]);
	                }
	            }

	            $("#inputFile").change(function () {
	                readURL(this);
	            });

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