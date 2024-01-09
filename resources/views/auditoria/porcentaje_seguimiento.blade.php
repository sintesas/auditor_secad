@extends('partials.card')

@extends('layout')

@section('title')
	Porcentaje Seguimiento
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($seguimiento, ['route' => ['SeguimientoPercentage.update', $seguimiento[0]->IdSeguimiento],'files' => true , 'method' => 'PUT']) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('seguimientocausaraizporcentaje')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			{{-- Datos a Mostrar --}}
			<p><strong >Nombre del seguimiento:</strong> {{ $seguimiento[0]->AccionSeguimiento }}</p>
			<p><strong >Fecha del seguimiento:</strong> {{ $seguimiento[0]->FechaSeguimiento }} &nbsp; <strong >Codigo Auditoria:</strong> {{ $seguimiento[0]->Codigo }} &nbsp; <strong >Codigo Anotación:</strong> {{ $seguimiento[0]->NoAnota }}</p>
			<p><strong >Hallazgo:</strong> {{ $seguimiento[0]->Hallazgo }}</p>
			<p><strong >Causa Raiz:</strong> {{ $seguimiento[0]->CausaRaiz }}</p>
			<p><strong >Acción Tarea:</strong> {{ $seguimiento[0]->AccionTarea }}</p>
			<p><strong >Cantidad Entregable:</strong> {{ $seguimiento[0]->CantidadEntregable }}</p>
			<p><strong >Última Observación :</strong> {{ $seguimiento[0]->Mensaje }}</p>
			<br>

			{{-- Datos a guardar ocultos --}}
			<input type="hidden" name="Codigo" value="{{$seguimiento[0]->Codigo}}">

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="mensaje" name="mensaje" required rows="2"></textarea>
						<label for="Mensaje">Observaciones *</label>
					</div>
				</div>
			</div>
			<br>
			@if ($seguimiento[0]->IdEstadoSeguimiento != 1)
				<div class="row" style="border-style: solid;border-width: 1px;">
					<div class="col-sm-6">
						<label for="tipoDoc" >Anexos</label>
						<div class="form-group">
							{!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group" id="archivoVisual">
							<a href=""></a>
						</div>
					</div>
				</div>
				<br>
			@endif

		<div class="row">
			<div class="col-sm-12">
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				Ver Historicos
			</button><br>
				<div class="collapse" id="collapseExample">
					<div class="card card-body">
						<div class="row">
							<div class="table-responsive" style="margin:20px">
								<table id="datatable1" class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Codigo Auditoria</th>
											<th>Anotación</th>
											<th>Causa Raiz</th>
											<th>Actividad</th>
											<th>Acciones Mejora</th>
											<th>Porcentaje</th>
											<th>Mensaje</th>
											<th>Estado</th>
											<th>Fecha Seguimiento</th>
										</tr>
									</thead>

									<tbody class="input_fields_wrap">
										@foreach($seguimientosHistoricos as $itemHistorico)
										<tr>
											<td>{{$itemHistorico->Codigo}}</td>
											<td>{{$itemHistorico->NoAnota}}</td>
											<td>{{$itemHistorico->CausaRaiz}}</td>
											<td>{{$itemHistorico->AccionTarea}}</td>
											<td>{{$itemHistorico->AccionSeguimiento}}</td>
											<td>{{$itemHistorico->Porcentaje}}</td>
											<td>{{$itemHistorico->Mensaje}}</td>
											<td>{{$itemHistorico->NombreEstado}}</td>
											<td>{{$itemHistorico->FechaSeguimiento}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		{{-- submit button --}}

		<input type="hidden" name="estadoSeguimiento" id="estadoSeguimiento" value="{{ $seguimiento[0]->IdEstadoSeguimiento }}">

		<div class="form-group">
			<div class="row">
				@if ($seguimiento[0]->IdEstadoSeguimiento != 5 )
					<div class="col-sm-4">
						<button type="submit" style="" id="aprobar" class="btn btn-info btn-block">Enviar aprobación</button>
					</div>
				@else
					<div class="col-sm-4">
						<button type="submit" style="" id="aprobar" class="btn btn-info btn-block">Aprobar</button>
					</div>
				@endif


				@if ($seguimiento[0]->IdEstadoSeguimiento != 1 && $seguimiento[0]->IdEstadoSeguimiento != 4)
					<div class="col-sm-4">
						<button type="submit" id="rechazar" style="" class="btn btn-warning btn-block">No aprobado</button>
					</div>
				@endif
				<div class="col-sm-4">
					<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
				</div>
				</div>
			</div>
		</div>

        {!! Form::close() !!}

        <script>
            $(document).ready(function(){
				$('select').select2();
				$('.hidden').hide();
			});

			$('#inputFile').on("change", function(e)
			{
				$('#archivoVisual').empty();
				for(var i=0; i< this.files.length; i++){
					$('#archivoVisual').append(
						"<a>"+e.target.files[i].name+"</a><br>"
					);
				}
			});

			/**
			*	Estados seguimeintos
			**/
			$('#aprobar').click(function(){
				var estado = parseInt($('#estadoSeguimiento').val());

				switch(estado){
					case 1://Responsable
						estado = 3; //CEOAF
						break;
					case 3://CEOAF
						estado = 5; //IGEFA
						break;
					case 4://NO APROBADA POR CEOAF
						estado = 3; //CEOAF
						break;
					case 5://IGEFA
						estado = 8;//Completada
						break;
					case 7://NO APROBADA POR IGEFA
						estado = 5;//IGEFA
						break;
				}
				$('#estadoSeguimiento').val(estado +'');
			});
			$('#rechazar').click(function(){
				var estado = parseInt($('#estadoSeguimiento').val());
				switch(estado){
					case 5://IGEFA
						estado = 7; //CEOAF
						break;
					case 7://NO APROBADO POR IGEFA
						estado = 4; //IGEFA
						break;
					case 3:
						estado = 4;
						break;
				}
				$('#estadoSeguimiento').val(estado + '');
			});
        </script>

		@endsection()


	@endsection()


@endsection()
