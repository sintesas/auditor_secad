@extends('partials.card')

@extends('layout')

@section('title')
	Actividades de Inspección
@endsection()

@section('content')

@section('card-content')

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('planinspeccionDetalle') }}
		<!-- The Modal -->
		@if(count($actividadesPlan)>0)
			<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif

		@endsection()

		@section('card-content')

		
		<div class="col-lg-12">

		@if(count($actividadesPlan)==0)
			<div style="text-align: center;" id="lunch">
				<h2> No existen actividades de inspección, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2>
			</div>
		@else
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="width: 200px;"><b>Actividad</b></th>
							<th><b>Criterio</b></th>
							<th><b>Inspector</b></th>
							<th><b>FechaInicio</b></th>
							<th><b>HoraInicio</b></th>
							<th><b>FechaCierre</b></th>
							<th><b>HoraFinal</b></th>
							<th style="width: 100px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($actividadesPlan as $actividad)
						 <tr>
							<td>{{$actividad->Actividades}}</td>
							<td>{{$actividad->Norma}}</td>
							<td>{{$actividad->Name}}</td>
							<td>{{$actividad->FechaInicio}}</td>
							<td>{{$actividad->HoraInicio}}</td>
							<td>{{$actividad->FechaCierre}}</td>
							<td>{{$actividad->HoraFinal}}</td>	
							<td>
								<div class="col-sm-5">

									{!! Form::open(['route' => ['actividadesInspeccion.destroy', $actividad->IdActividadPlanIns,], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>


								<div class="col-sm-7">

									<a href="{{route('actividadesInspeccion.edit', $actividad->IdActividadPlanIns) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>
						</tr> 
						@endforeach
					</tbody>
				</table>
				
			</div><!--end .table-responsive -->
		@endif
		</div><!--end .col -->

		{{-- BEGIN CREATE MODAL --}}
		<div id="id1" class="modal" style="padding-top:80px;">

			<div class="modal-content" style="width:60%;">

				<div class="card-head style-primary">
					<header>Crear Nueva Capacidad</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<div class="card">
					<div class="card-body floating-label">

						{!! Form::open(array('route' => 'actividadesInspeccion.store')) !!}

						{{ csrf_field()}}

						<div class="card">
							<div class="card-body">

								<div class="row">
									<div class="col-sm-12">
									<label for="IdCriterios" style="font-size:17px; color:#9399a1;">Criterios*</label>
										<div class="form-group">
											{{ Form::select('IdCriterios', $criterios->pluck('Norma' , 'IdCriterio'), null, ['onchange' => "", 'class' => 'form-control', 'id' => 'IdCriterios', 'name' => 'IdCriterios', 'required']) }}
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<textarea class="form-control" id="Actividades" name="Actividades" rows="3" required> </textarea>
											<label for="Actividades">Actividad</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="lugar" name="lugar" >
											<label for="lugar">Lugar</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											{{ Form::select('IdPersonalInspWS', $personalWS->pluck('Name' , 'IdUserLDAP'), null, ['class' => 'form-control', 'id' => 'IdPersonalInspWS']) }}
											<label for="IdPersonalInspWS">Inspeccionado*</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											@if($estado == 'usuarioWS')
												{{ Form::select('IdPersonalInspector', $inspectores->pluck('Name' , 'IdUserLDAP'), null, ['class' => 'form-control', 'id' => 'IdPersonalInspector']) }}
											@else
												{{ Form::select('IdPersonalInspector', $inspectores->pluck('Nombres' , 'IdFuncionarioEmpresa'), null, ['class' => 'form-control', 'id' => 'IdPersonalInspector']) }}
											@endif
											<label for="IdPersonalInsp">Inspector*</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group date" id="demo-date-format">
												<div class="input-group-content">
													<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
													<label for="FechaInicio">Fecha Inicio*</label>
												</div>
												<span class="input-group-addon"></span>
											</div>	
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="input-group date" id="demo-date-format">
												<div class="input-group-content">
													<input type="text" class="form-control" id="FechaCierre" name="FechaCierre" required>
													<label for="FechaCierre">Fecha Cierre*</label>
												</div>
												<span class="input-group-addon"></span>
											</div>	
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<select id="HoraInicio" name="HoraInicio" class="form-control" required aria-required="true">
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="14:30">14:30</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
											<label for="HoraInicio">Hora Inicio*</label>
											<p class="help-block">Time: 24h</p>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<select id="HoraFinal" name="HoraFinal" class="form-control" required aria-required="true">
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
										<label for="HoraFinal">Hora Final*</label>
										<p class="help-block">Time: 24h</p>
										</div>
									</div>
									
									<input type="hidden" value="{{$planesIns->IdPlanInspeccion}}" name="IdPlanInspeccion">
									<input type="hidden" value="{{$estado}}" name="estadoUsuario" id="estadoUsuario">
			
								</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
							</div>
							<div class="col-sm-6">
								<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
							</div>
						</div>


					</div>
				</div>

			</div>
		</div>
		{{-- END CREATE MODAL --}}
		@endsection()

	@endsection()
	
	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

		<script>
			$(document).ready(function(){
				$('select').select2();
				$('#datatable1').DataTable({
					"order": [[ 4, "asc" ]],
					"order": [[ 4, "asc" ]],
				});
				$('#IdPersonalInspWS').select2({
					placeholder: "",
					minimumInputLength: 3,
					allowClear: true
				});
			});
		</script>

		<script type="text/javascript">
			$(document).ajaxStart(function () {
		        $('#status').show();
		    });
		    $(document).ajaxStop(function () {
		        $('#status').hide();
		    });
		</script>

		@endsection()

@endsection()