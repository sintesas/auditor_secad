@extends('partials.card_big')

@extends('layout')

@section('title')
	Anotaciones Estado Parcial
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Anotaciones Estado Parcial
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
				// console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["EstadoSeguimiento", "Empresa", "Centro"],
			                cols: ["Objeto", "TipoAnotacion"],
			                aggregatorName: "List Unique Values",
                			vals: ["DescripcionEvidencia"],
                			hideTotals: 'true',
			            }
			        );
				});

			    $(function(){
			        
			     });
        	</script>
		@endif
		@endsection()

	@endsection()

@endsection()