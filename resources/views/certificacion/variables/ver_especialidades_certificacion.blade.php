@extends('partials.card')

@extends('layout')

@section('title')
Tablas Especialidades Certificacion
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('especialidadescertificacion') }} 

<!-- Begin Modal -->
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
{{-- End modal --}}


@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Especialidad</b></th>
					<th><b>Codigo</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($especialidades as $especialidad)
				<tr>
					<td>{{$especialidad->Especialidad}}</td>
					<td>{{$especialidad->Codigo}}</td>

					<td style="width: 120px;">
						{{-- Edit Button --}}

						<div class="col-sm-2" style="padding-right: 30px;">

									{{-- {!! Form::open(['route' => ['especialidad.destroy', $ata->IdATA], 'class'=> 'delete', 'method' => 'DELETE']) !!}

										{{csrf_field()}}

									{!! Html::linkRoute('ata.destroy', 'Delete', 'array($ata->IdATA)', array('class' => 'btn btn-danger btn-default')) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger btn-default']) !!}

									{!! Form::close() !!} --}}
								</div>

								<div class="col-sm-2">
									{{-- Delete Button --}}
									<button type="button" class="btn btn-default ink-reaction btn-success"><span class="fa fa-edit"></span></button>
								</div>



								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->

		<div id="id1" class="modal">
			<div class="modal-content">
				<div class="card-head style-primary">
					<header>Creación Especialidades Certificación</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<label for="codigo_ata">Especialidad</label>
							<input type="text" class="form-control" id="codigo_ata" name="codigo_ata" >
						</div>

						<div class="form-group">
							<label for="capitulo">Código</label>
							<input type="text" class="form-control" id="capitulo" name="capitulo" >
						</div>

					</div>

					<div class="form-group">
						<center><button type="submit" class="btn btn-primary">Crear Codigo</button></center>
					</div>	
				</div>

				
				{{-- <div class="form-group">
					<label for="codigo_ata">Codigo Ata</label>
					<input type="text" class="form-control" id="codigo_ata" name="codigo_ata" >
				</div>
 
				<div class="form-group">
					<label for="capitulo">Capitulo</label>
					<input type="text" class="form-control" id="capitulo" name="capitulo" >
				</div>

				

				<div class="form-group">
					<label for="general">General</label>
					<textarea type="textarea" class="form-control" id="general" name="general" ></textarea>
				</div>

				--}}

				{{-- submit button --}}
				




				{!! Form::close() !!}

				<script>
					$(".delete").on("submit", function(){
						return confirm("Esta seguro que desea borrar este codigo?");
					});
				</script>



				
			</div>
		</div>


		@endsection()

		




		{{-- override --}}
{{-- 
		@section('button')
			Imprimir Tabla
			@endsection() --}}


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