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
			{{ Breadcrumbs::render('consultahoraslaborales') }}

		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('consultahoraslaboradas/info/', function(response, state){
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: [ "Proyecto"],
			                cols: ["Nombres"],
			                aggregatorName: "Sum",
                			vals: ["Horas","Fecha","Actividad", "Consecutivo", "Tipo","Estado_Programa"],
			            }
			        );
				});
        	</script>
		@endsection()

	@endsection()

@endsection()
