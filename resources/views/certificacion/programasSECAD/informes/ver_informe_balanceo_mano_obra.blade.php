@extends('partials.card_big')

@extends('layout')

@section('title')
	Balanceo Mano de Obra
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('balanceo') }}

		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('vistaBalanceo/vistaBalanceoManoObra/', function(response, state){
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["EstadoProgama", "Consecutivo"],
			                cols: ["NombreJefe", "Horas"],
			                aggregatorName: "Sum",
                			vals: ["Horas"],
			            }
			        );
				});
        	</script>
		@endsection()

	@endsection()

@endsection()
