@extends('partials.card')

@extends('layout')

@section('title')
Crear Evidencia
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{-- {{ Breadcrumbs::render('crear_evento') }} --}}
Crear Evidencia - MOC - Requisito

@endsection()

@section('form-tag')
{!! Form::open(['route' => 'evidenciasReq.store']) !!}
{{ csrf_field()}}
@endsection()

<div class="card">
	<div class="card-body floating-label">
		
		<div class="row">
			
			<div class="col-sm-6">
				<div class="form-group">
					<input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
					<label for="Descripcion">Descripción</label>
				</div>		
			</div>
			
			<div class="col-sm-6">
				<div class="form-group">					
					{{ Form::select('Estado', [
                                    '' => '',
                                    'Aprobado' => 'Aprobado',
                                    'No Aprobado' => 'No Aprobado',
                                    'En Proceso' => 'En Proceso',
                                    'Cancelado' => 'Cancelado',
                                    'Pendiente' => 'Pendiente'
                                ], null, ['class' => 'form-control', 'id' => 'Estado'])}}
					<label for="Estado">Estado</label>
				</div>		
			</div>
			
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					{{-- <input type="text" class="form-control" id="Evento" name="Evento" required> --}}
					<textarea name="Obervaciones" id="Obervaciones" rows="2" class="form-control"></textarea>
					<label for="Obervaciones">Observaciones</label>
				</div>
			</div>
			<div class="col-sm-6">
                <div class="form-group">
                    <label for="Documentos">Documento</label>
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
				<button type="button" onclick="window.location='{{ route("evidenciasMocReq.show", $IdMocRequisito) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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