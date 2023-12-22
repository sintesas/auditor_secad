<div id="content">
	<div class="section-body contain-lg">
		<!-- BEGIN VERTICAL FORM -->
		<div class="row">
			<div class="col-lg-offset-0 col-md-12">
				
				@yield('form-tag')
				
					<div class="card">
						<div class="card-head style-primary">
							<header>@yield('card-title')</header>
						</div>

						<div class="card-body">

							@yield('card-content')

						</div><!--end .card-body -->						
					</div><!--end .card -->
							
				</form>
			</div><!--end .col -->
		</div> <!-- End row -->
	</div> <!-- End section container for card -->
</div>{{-- End content --}}
