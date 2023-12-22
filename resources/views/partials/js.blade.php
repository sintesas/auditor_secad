<!-- BEGIN JAVASCRIPT -->
<script src="{{URL::asset('js/libs/pivot/plotly-latest.min.js')}}"></script>
<script src="{{URL::asset('js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
<script src="{{URL::asset('js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{URL::asset('js/libs/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{URL::asset('js/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/libs/spin.js/spin.min.js')}}"></script>
<script src="{{URL::asset('js/libs/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{URL::asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('js/libs/moment/moment.min.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/jquery.flot.min.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/jquery.flot.orderBars.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('js/libs/flot/curvedLines.js')}}"></script>
<script src="{{URL::asset('js/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{URL::asset('js/libs/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::asset('js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{URL::asset('js/libs/d3/d3.min.js')}}"></script>
<script src="{{URL::asset('js/libs/d3/d3.v3.js')}}"></script>
<script src="{{URL::asset('js/libs/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{URL::asset('js/core/source/App.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppNavigation.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppOffcanvas.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppCard.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppForm.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppNavSearch.js')}}"></script>
<script src="{{URL::asset('js/core/source/AppVendor.js')}}"></script>
<script src="{{URL::asset('js/core/demo/Demo.js')}}"></script>
<script src="{{URL::asset('js/core/demo/DemoFormComponents.js')}}"></script>
<script src="{{URL::asset('js/dropdown.js')}}"></script>
<script src="{{URL::asset('js/libs/pivot/pivot.js')}}"></script>
<script src="{{URL::asset('js/libs/pivot/plotly_renderers.js')}}"></script>
<script src="{{URL::asset('js/libs/dropzone/dropzone.min.js')}}"></script>
<script src="{{URL::asset('js/libs/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('js/libs/nestable/jquery.nestable.js')}}"></script>
<script src="{{URL::asset('js/libs/ckeditor/ckeditor.js')}}"></script>
<script src="{{URL::asset('js/libs/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{URL::asset('js/libs/bootstrap-treeview/bootstrap-treeview.js')}}"></script>
<script src="{{URL::asset('js/libs/dhtmlxscheduler/dhtmlxscheduler.js')}}"></script>
<script src="{{URL::asset('js/libs/dhtmlxscheduler/ext/dhtmlxscheduler_minical.js')}}"></script>
<script src="{{URL::asset('js/jquery.doubleScroll.js')}}"></script>

<script>
	@if (Session::has('message'))
	var type = "{{ Session::get('alert-type', 'info') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('message') }}");
		break;
		
		case 'warning':
		toastr.warning("{{ Session::get('message') }}");
		break;

		case 'success':
		toastr.success("{{ Session::get('message') }}");
		break;

		case 'error':
		toastr.error("{{ Session::get('message') }}");
		break;
	}
	@endif
</script>
<script type="text/javascript">
	$(document).ajaxStart(function () {
		$('#status').show();
	});
	$(document).ajaxStop(function () {
		$('#status').hide();
	});
</script>
<!-- END JAVASCRIPT -->

@yield('addjs')