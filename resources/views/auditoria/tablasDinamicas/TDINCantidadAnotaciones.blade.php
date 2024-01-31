@extends('partials.card_big')

@extends('layout')

@section('title')
	Cantidad Anotaciones
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			CantidadS Anotaciones
			{{-- {{ Breadcrumbs::render('APACxAuditoria') }} --}}

		@endsection()

		@section('card-content')

	
		@if ($permiso->consultar == 1)
			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('anotacionesXEstadoParcial/vistaAuditorias/', function(response, state){				
					$("#output").pivotUI(
			            response,
			            {	
			            	renderers: renderers,
			                rows: ["TipoAuditoria"],
			                cols: ["Año", "NombreEmpresa"],
			            }
			        );
				});
        	</script>
		@endif
		@endsection()

	@endsection()

@endsection()