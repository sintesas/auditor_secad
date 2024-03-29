@extends('partials.card_big')

@extends('layout')

@section('title')
	Consolidado Programa x Tipo
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Consolidado Programa x Tipo
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
				$.get('consolidadoXProgramaTipo/vistaAuditorias/', function(response, state){
				// console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["Codigo", "Empresa", "ProgramaCalidad"],
			                cols: ["TipoAnotacion", "NoAnota"],
			                aggregatorName: "Count",
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