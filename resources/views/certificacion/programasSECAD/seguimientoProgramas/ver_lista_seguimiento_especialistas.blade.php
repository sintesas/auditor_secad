@extends('partials.card')

@extends('layout')

@section('title')
	Seguimiento Actividades
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('especialistassegui', $programa->IdPrograma, $actividad->IdActividad.'&'.$programa->IdPrograma) }}
{{-- <button type="button" onclick="window.location='{{ route("especialistasSeg.show", "$programa->IdPrograma" . "&" ."$actividad->IdActividad") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> --}}

<!-- The Modal -->

<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>

@endsection()

@section('card-content')

<div class="col-lg-12">
	<div class="table-responsive">
		<h4><strong>Programa:</strong> {{$programa->Consecutivo}} / <strong>Tipo Programa:</strong> {{$tipoPrograma->Tipo}}</h4>
		<h4><strong>Actividad:</strong> {{$actividad->Actividad}}</h4>
		<h4><strong>Seguimiento:</strong> {{$seguimiento->Evidencias}}</h4>
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Fecha</b></th>
					<th><b>Especialista</b></th>
					<th><b>Rol</b></th>
					<th><b>Horas</b></th>
					<th><b>Descripción del Trabajo</b></th>
					<th style="width: 120px;"><b>Acciones</b></th>
	
				</tr>
			</thead>
			<tbody>
				@foreach ($especialistas as $especialista)
				<tr>
					<td>{{$especialista->Fecha}}</td>
					<td>{{$especialista->Nombres}}</td>
					<td>{{$especialista->Rol}}</td>
					<td>{{$especialista->Horas}}</td>
					<td>{{$especialista->DescripcionTrabajo}}</td>
					<td>
						<div class="col-sm-6">

							{!! Form::open(['route' => ['especialistasSeg.destroy', $especialista->IdEspecialistaSeguimiento], 'method' => 'DELETE']) !!}

							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

							{!! Form::close() !!}
						</div>
					</td>
		
				</tr>
				@endforeach
			</tbody>
		</table>
	</div><!--end .table-responsive -->
</div><!--end .col -->

{{-- Modal --}}
<div id="id1" class="modal" style="padding-top:135px;">
	<div class="modal-content">
		<div class="card-head style-primary">
			<header>Asignar Especialistas</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span>
		</div>

		<div class="card">
			<div class="card-body floating-label">
				{!! Form::open(array('route' => 'especialistasSeg.store')) !!}

				{{ csrf_field()}}

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdPersonal', $personal->pluck('Nombres' , 'IdPersonal'), null, ['class' => 'form-control', 'id' => 'IdPersonal']) }}
							<label for="Codigo">Especialista</label>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-12">    
    <div class="form-group">
	<select name="IdRol_listasdinamicas" class="form-control">
    <option value=""></option>
    <option value="Responsable de Programa">Responsable de Programa</option>
    <option value="Especialista de Certificacion">Especialista de Certificación</option>
    <option value="Tecnico Especialista de Certificacion">Técnico Especialista de Certificación</option>
    <option value="Auditor Lider">Auditor Lider</option>
    <option value="Auditor">Auditor</option>
    <option value="Profesional Asesor">Profesional Asesor</option>
</select>

        {{ Form::label('IdRol_listasdinamicas', 'Rol') }}
    </div>
</div>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="Fecha" name="Fecha" required>
									<label for="Fecha">Fecha</label>
								</div>
								<span class="input-group-addon"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="number" class="form-control" id="Horas" name="Horas" required  onKeyPress="return soloNumeros(event)">
							<label for="Horas">Horas</label>
						</div>
					</div>
				</div>

				<div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                <textarea class="form-control" id="DescripcionTrabajo" name="DescripcionTrabajo" rows="2" maxlength="250" required></textarea>
                <label for="DescripcionTrabajo">Descripcion del trabajo realizado</label>
                </div>
             </div>
        </div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("especialistasSeg.show", $seguimiento->IdListaSeguimiento) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>

				<input type="hidden" id="IdListaSeguimiento" name="IdListaSeguimiento" value="{{$seguimiento->IdListaSeguimiento}}">
			</div>

		</div>
	</div>
	{!! Form::close() !!}
	<script src="{{asset('js/soloNumeros.js')}}"></script>
	<script>
		$(".delete").on("submit", function(){
			return confirm("Esta seguro que desea borrar este codigo?");
		});
	</script>

</div>

@endsection()

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
