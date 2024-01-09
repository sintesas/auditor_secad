@extends('partials.card_big')

@extends('layout')


@section('title')
	Consolidado AP AC x Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{-- Consolidado AP AC x Auditoria --}}
			{{ Breadcrumbs::render('APACxAuditoria') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x:scroll;" id="output" ></div>
			</div>

			 <script type="text/javascript">
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
                			rowOrder: "value_a_to_z", colOrder: "value_z_to_a",
			            }
			        );
				});

			    $(function(){
			        
			     });
        	</script>
		@endsection()

	@endsection()

@endsection()

