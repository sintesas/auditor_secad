@extends('partials.card')

@extends('layout')

@section('title')
	Informe Visita y Acompañamiento
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array()) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Visita y Acompañamiento--}}
			{{ Breadcrumbs::render('informevisitaacompanamiento') }}

		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdAuditoria', $auditoria->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'id' => 'IdAuditoria']) }}
								<label for="IdAuditoria">Auditoría</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
								<select id="VisitaControlNo" name="VisitaControlNo" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="VisitaControlNo">Visita</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<button type="submit" style="" class="btn btn-info btn-block" onclick="{{route('informevisitaacompanamiento.store') }}">Ver Informe</button>
							</div>
						</div>
					</div>					
			</div>			

		{!! Form::close() !!}

		<script type="text/javascript">
			$(document).ajaxStart(function () {
                $('#status').show();
            });
            $(document).ajaxStop(function () {
                $('#status').hide();
            });
			$('#IdAuditoria').change(function(event) {
				$.get("informevisitaacompanamiento/NoVisitas/" + event.target.value + "", function(response, state){
					console.log(JSON.stringify(response));
					$('#VisitaControlNo').empty();
					$('#CargoRespo').val('');
					$('#VisitaControlNo').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#VisitaControlNo').append('<option value="' + response[i].IdSeguimiento + '">' +  response[i].VisitaControlNo + '</option>');
					}
				});
			});		
		</script>
		@endsection()

	@endsection()

@endsection()