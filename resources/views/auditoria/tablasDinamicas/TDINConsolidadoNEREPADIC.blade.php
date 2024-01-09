@extends('partials.card_big')

@extends('layout')

@section('title')
	Consolidado NUE, REP, ADIC
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Consolidado NUE, REP, ADIC
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">

			 	/*REVISAR CON LA CAPITAN ESL MISMO AL ANTERIOR*/
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('apacAuditoria/vistaAuditorias/', function(response, state){
				// console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["Codigo", "Empresa", "Proceso"],
			                cols: ["TipoAnotacion"],
			                aggregatorName: "List Unique Values",
                			vals: ["NoAnota"],
                			hideTotals: 'true',
			            }
			        );
				});

			    $(function(){
			        
			     });
        	</script>
		@endsection()

	@endsection()

@endsection()