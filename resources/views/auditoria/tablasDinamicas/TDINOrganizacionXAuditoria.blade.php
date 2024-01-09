@extends('partials.card_big')

@extends('layout')

@section('title')
	Organización X Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Organización X Auditoria
		@endsection()

		@section('card-content')
		

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);
			    // This example is the most basic usage of pivotUI()
				$.get('organizacionXAuditoria/vistaAuditorias/', function(response, state){
				// console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["Empresa", "Proceso"],
			                cols: ["Codigo", "TipoAnotacion", "NoAnota"],
			                aggregatorName: "Count",
			            }
			        );
				});

			    $(function(){
			        
			     });
        	</script>
		@endsection()

	@endsection()

@endsection()