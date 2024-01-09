@extends('partials.card_big')

@extends('layout')

@section('title')
	Informe H/H Auditorias por func.
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('informeFuncionarioAuditoriaVisual') }}
		@endsection()

		@section('card-content')


			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">

				$( document ).ready(function() {
				    var derivers = $.pivotUtilities.derivers;
				    var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);	
				    // This example is the most basic usage of pivotUI()
				    $.ajax( {
					   url: '{{ URL::route('getHHAuditoria') }}', 
					   success: function(results) {
						   $("#output").pivotUI(
						   results,
							   {	
								   renderers: renderers,
								   rows: ["Funcionario", "NombreAuditoria", "codigo","TipoAuditoria" ,"totalHoras"],
								   cols: [],
								   aggregatorName: "Last",
								   vals: ["totalHoras"]
							   }
						   );
					   }
				   });
				});
        	</script>
		@endsection()

	@endsection()

@endsection()