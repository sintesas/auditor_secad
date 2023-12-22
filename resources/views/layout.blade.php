<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body class="menubar-hoverable header-fixed ">

	@include('partials.header')	
	<!-- BEGIN BASE-->
	<div id="base">
		<!-- BEGIN LOADING -->
		<div id="status" class="modalFAC" style="display: none">
		    <div class="centerModalFAC">
		    	<img src="{{URL::asset('img/Ripple.svg')}}" alt="">
		        <div style="text-align:center; color: #ffffff;">
		            Cargando...
		        </div>
		    </div>
		</div>
		<!-- END LOADING -->		
		<!-- BEGIN OFFCANVAS LEFT -->
		<div class="offcanvas">
		</div><!--end .offcanvas-->
		<!-- END OFFCANVAS LEFT -->
		
		{{-- insert content here --}}
		@yield('content')
		{{-- end content --}}

		@include('partials.menu', ['menus' => Session::get('menus')])

	</div><!--end #base-->
	<!-- END BASE -->	
	@include('partials.js')

	{{-- addcss --}}
</body>
</html>