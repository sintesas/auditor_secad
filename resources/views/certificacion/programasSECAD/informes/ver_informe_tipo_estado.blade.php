@extends('partials.card_big')

@extends('layout')

@section('title')
	Resumen Tipo Estado
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Resumen Tipo Estado
			{{-- {{ Breadcrumbs::render('APACxAuditoria') }} --}}

		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('vistaProgramas/vistaTipoEstado/', function(response, state){				
					$("#output").pivotUI(
			            response,
			            {	
			            	renderers: renderers,
			                rows: ["Tipo"],
			                cols: ["EstadoProgama"],
			            }
			        );
				});
        	</script>
		@endsection()

	@endsection()

@endsection()