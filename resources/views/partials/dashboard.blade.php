@extends('partials.card_big')
@extends('layout')

@section('title')
	
	Inicio

@endsection()

@section('content')
	
	@section('card-content')

		@section('card-title')
			Bienvenido!
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			
			<div class="row">
				<div class="col-sm-12">
		            <div class="card">
		                <div class="card-head card-head-sm style-primary">
		                    <header>
		                        Calendario
		                    </header>
		                </div>
		                <div class="card-body" style="height: 1000px;">
		                	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
								<div class="dhx_cal_navline">
									<div class="dhx_cal_prev_button">&nbsp;</div>
									<div class="dhx_cal_next_button">&nbsp;</div>
									<div class="dhx_cal_today_button"></div>
									<div class="dhx_cal_date"></div>
									<div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
									<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
									<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
									<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
								</div>
								<div class="dhx_cal_header">
								</div>
								<div class="dhx_cal_data">
								</div>
							</div>
		                </div> 
		            </div> 
				</div> 
		    </div> 
        </div>
		
		<script src="{{URL::asset('js/libs/dhtmlxscheduler/dhtmlxscheduler.js')}}"></script>
		<script src="{{URL::asset('js/libs/dhtmlxscheduler/ext/dhtmlxscheduler_minical.js')}}"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				init();
			});

			function init() {
				scheduler.config.multi_day = true;
				var currentTime = new Date();
				
				scheduler.config.xml_date="%Y-%m-%d %H:%i";
				scheduler.init('scheduler_here', new Date(currentTime), "week");

				var dp = new dataProcessor("./scheduler_data");
        		dp.init(scheduler);
			}
			
			function show_minical() {
				if (scheduler.isCalendarVisible())
					scheduler.destroyCalendar();
				else
					scheduler.renderCalendar({
						position:"dhx_minical_icon",
						date:scheduler._date,
						navigation:true,
						handler:function(date,calendar){
							scheduler.setCurrentView(date);
							scheduler.destroyCalendar()
						}
					});
			}
		</script>
		@endsection()

	@endsection()

@endsection()