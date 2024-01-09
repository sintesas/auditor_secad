@extends('partials.card')

@extends('layout')

@section('title')
Crear Evento
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{-- {{ Breadcrumbs::render('crear_evento') }} --}}
Aprobación  - Matriz
@endsection()

@section('form-tag')
{!! Form::open(['route' => 'aprobacionMocsSupartes.store']) !!}
{{ csrf_field()}}
@endsection()

<div class="card">
	<div class="card-body floating-label">
		
		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<select name="Aprobado" id="Aprobado" class="form-control">
						<option value=""></option>
						<option value="1">Si</option>
						<option value="0">No</option>
					</select>
					<label for="Aprobado">Aprobado</label>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					{{-- <input type="text" class="form-control" id="Evento" name="Evento" required> --}}
					<textarea name="Obervaciones" id="Obervaciones" rows="1" class="form-control"></textarea>
					<label for="Evento">Observaciones</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" class="form-control" id="NombresApellidos" name="NombresApellidos" required>
					<label for="Descripcion">Nombres y Apellido</label>
				</div>		
			</div>



		</div>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<div class="input-group date" id="demo-date-format">
						<span class="input-group-addon"></span>
						<div class="input-group-content">
							<input type="text" class="form-control" id="Fecha" name="Fecha" required>
							<label for="Fecha">Fecha</label>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-sm-9">
				<div class="form-group">
					<input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
					<label for="Descripcion">Firma</label>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-6">
                <div class="form-group">
                    <label for="Documentos">Nota de Validez</label>
                   {!! Form::file('Documento', array('class' => 'form-control', 'id' => 'inputFile', 'required')) !!}
                   
                </div>
            </div>
		</div>
	</div>
	
	<input type="hidden" id="IdMocRequisito" name="IdMocRequisito" value="{{$IdMocRequisito}}">
	{{-- submit button --}}

	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
			</div>
			<div class="col-sm-6">
				<button type="button" onclick="window.location='{{ route("aprobacionMocsSupartes.show", $mocRequi->IdRequsito) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
			</div>
		</div>
	</div>
</div>	
{!! Form::close() !!}

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
	$('select').select2();
</script>
<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()

@endsection()