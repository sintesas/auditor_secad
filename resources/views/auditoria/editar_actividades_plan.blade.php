@extends('partials.card')

@extends('layout')

@section('title')
	Editar Actividades de Inspección 
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($actividadesInspeccion, ['route' => ['actividadesInspeccion.update', $actividadesInspeccion->IdActividadPlanIns], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('editar_actividadesInspeccion')}} --}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">

				<div class="row">
					<div class="col-sm-12">
					<label for="IdCriterios" style="font-size:17px; color:#9399a1;">Criterios*</label>
						<div class="form-group">
							{{ Form::select('IdCriterio', $criterios->pluck('Norma' , 'IdCriterio'), null, ['onchange' => "", 'class' => 'form-control', 'id' => 'IdCriterios', 'name' => 'IdCriterios', 'required']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="Actividades" name="Actividades" rows="3" required>{{old('Actividades', $actividadesInspeccion->Actividades)}}</textarea>
							<label for="Actividades">Actividad</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="Lugar" name="Lugar" required value="{{old('Lugar', $actividadesInspeccion->Lugar)}}">
							<label for="Lugar">Lugar</label>
						</div>	
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdPersonalInsp', $personalWS->pluck('Name' , 'IdUserLDAP'), null, ['class' => 'form-control', 'id' => 'IdPersonalInsp']) }}
							<label for="IdPersonalInsp">Inspeccionado*</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							@if($actividadesInspeccion->EstadoInsertUsuario == 'usuarioWS')
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
									<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required value="{{old('FechaInicio', $actividadesInspeccion->FechaInicio)}}">
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
									<input type="text" class="form-control" id="FechaCierre" name="FechaCierre" required value="{{old('FechaCierre', $actividadesInspeccion->FechaCierre)}}">
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
								<option value="0:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '0:00' ? 'selected' : '' }}>0:00</option>
								<option value="0:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '0:30' ? 'selected' : '' }}>0:30</option>
								<option value="1:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '1:00' ? 'selected' : '' }}>1:00</option>
								<option value="1:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '1:30' ? 'selected' : '' }}>1:30</option>
								<option value="2:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '2:00' ? 'selected' : '' }}>2:00</option>
								<option value="2:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '2:30' ? 'selected' : '' }}>2:30</option>
								<option value="3:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '3:00' ? 'selected' : '' }}>3:00</option>
								<option value="3:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '3:30' ? 'selected' : '' }}>3:30</option>
								<option value="4:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '4:00' ? 'selected' : '' }}>4:00</option>
								<option value="4:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '4:30' ? 'selected' : '' }}>4:30</option>
								<option value="5:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '5:00' ? 'selected' : '' }}>5:00</option>
								<option value="5:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '5:30' ? 'selected' : '' }}>5:30</option>
								<option value="6:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '6:00' ? 'selected' : '' }}>6:00</option>
								<option value="6:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '6:30' ? 'selected' : '' }}>6:30</option>
								<option value="7:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '7:00' ? 'selected' : '' }}>7:00</option>
								<option value="7:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '7:30' ? 'selected' : '' }}>7:30</option>
								<option value="8:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '8:00' ? 'selected' : '' }}>8:00</option>
								<option value="8:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '8:30' ? 'selected' : '' }}>8:30</option>
								<option value="9:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '9:00' ? 'selected' : '' }}>9:00</option>
								<option value="9:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '9:30' ? 'selected' : '' }}>9:30</option>
								<option value="10:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '10:00' ? 'selected' : '' }}>10:00</option>
								<option value="10:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '10:30' ? 'selected' : '' }}>10:30</option>
								<option value="11:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '11:00' ? 'selected' : '' }}>11:00</option>
								<option value="11:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '11:30' ? 'selected' : '' }}>11:30</option>
								<option value="12:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '12:00' ? 'selected' : '' }}>12:00</option>
								<option value="12:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '12:30' ? 'selected' : '' }}>12:30</option>
								<option value="13:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '13:00' ? 'selected' : '' }}>13:00</option>
								<option value="13:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '13:30' ? 'selected' : '' }}>13:30</option>
								<option value="14:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '14:00' ? 'selected' : '' }}>14:00</option>
								<option value="14:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '14:30' ? 'selected' : '' }}>14:30</option>
								<option value="15:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '15:00' ? 'selected' : '' }}>15:00</option>
								<option value="15:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '15:30' ? 'selected' : '' }}>15:30</option>
								<option value="16:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '16:00' ? 'selected' : '' }}>16:00</option>
								<option value="16:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '16:30' ? 'selected' : '' }}>16:30</option>
								<option value="17:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '17:00' ? 'selected' : '' }}>17:00</option>
								<option value="17:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '17:30' ? 'selected' : '' }}>17:30</option>
								<option value="18:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '18:00' ? 'selected' : '' }}>18:00</option>
								<option value="18:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '18:30' ? 'selected' : '' }}>18:30</option>
								<option value="19:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '19:00' ? 'selected' : '' }}>19:00</option>
								<option value="19:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '19:30' ? 'selected' : '' }}>19:30</option>
								<option value="20:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '20:00' ? 'selected' : '' }}>20:00</option>
								<option value="20:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '20:30' ? 'selected' : '' }}>20:30</option>
								<option value="21:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '21:00' ? 'selected' : '' }}>21:00</option>
								<option value="21:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '21:30' ? 'selected' : '' }}>21:30</option>
								<option value="22:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '22:00' ? 'selected' : '' }}>22:00</option>
								<option value="22:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '22:30' ? 'selected' : '' }}>22:30</option>
								<option value="23:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '23:00' ? 'selected' : '' }}>23:00</option>
								<option value="23:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '23:30' ? 'selected' : '' }}>23:30</option>
							</select>
							<label for="HoraInicio">Hora Inicio</label>
							<p class="help-block">Time: 24h</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<select id="HoraFinal" name="HoraFinal" class="form-control" required aria-required="true">
								<option value="" selected="selected"></option>
								<option value="0:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '0:00' ? 'selected' : '' }}>0:00</option>
								<option value="0:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '0:30' ? 'selected' : '' }}>0:30</option>
								<option value="1:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '1:00' ? 'selected' : '' }}>1:00</option>
								<option value="1:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '1:30' ? 'selected' : '' }}>1:30</option>
								<option value="2:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '2:00' ? 'selected' : '' }}>2:00</option>
								<option value="2:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '2:30' ? 'selected' : '' }}>2:30</option>
								<option value="3:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '3:00' ? 'selected' : '' }}>3:00</option>
								<option value="3:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '3:30' ? 'selected' : '' }}>3:30</option>
								<option value="4:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '4:00' ? 'selected' : '' }}>4:00</option>
								<option value="4:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '4:30' ? 'selected' : '' }}>4:30</option>
								<option value="5:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '5:00' ? 'selected' : '' }}>5:00</option>
								<option value="5:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '5:30' ? 'selected' : '' }}>5:30</option>
								<option value="6:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '6:00' ? 'selected' : '' }}>6:00</option>
								<option value="6:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '6:30' ? 'selected' : '' }}>6:30</option>
								<option value="7:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '7:00' ? 'selected' : '' }}>7:00</option>
								<option value="7:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '7:30' ? 'selected' : '' }}>7:30</option>
								<option value="8:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '8:00' ? 'selected' : '' }}>8:00</option>
								<option value="8:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '8:30' ? 'selected' : '' }}>8:30</option>
								<option value="9:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '9:00' ? 'selected' : '' }}>9:00</option>
								<option value="9:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '9:30' ? 'selected' : '' }}>9:30</option>
								<option value="10:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '10:00' ? 'selected' : '' }}>10:00</option>
								<option value="10:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '10:30' ? 'selected' : '' }}>10:30</option>
								<option value="11:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '11:00' ? 'selected' : '' }}>11:00</option>
								<option value="11:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '11:30' ? 'selected' : '' }}>11:30</option>
								<option value="12:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '12:00' ? 'selected' : '' }}>12:00</option>
								<option value="12:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '12:30' ? 'selected' : '' }}>12:30</option>
								<option value="13:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '13:00' ? 'selected' : '' }}>13:00</option>
								<option value="13:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '13:30' ? 'selected' : '' }}>13:30</option>
								<option value="14:00" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '14:00' ? 'selected' : '' }}>14:00</option>
								<option value="14:30" {{ old('HoraInicio', $actividadesInspeccion->HoraInicio) == '14:30' ? 'selected' : '' }}>14:30</option>
								<option value="15:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '15:00' ? 'selected' : '' }}>15:00</option>
								<option value="15:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '15:30' ? 'selected' : '' }}>15:30</option>
								<option value="16:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '16:00' ? 'selected' : '' }}>16:00</option>
								<option value="16:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '16:30' ? 'selected' : '' }}>16:30</option>
								<option value="17:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '17:00' ? 'selected' : '' }}>17:00</option>
								<option value="17:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '17:30' ? 'selected' : '' }}>17:30</option>
								<option value="18:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '18:00' ? 'selected' : '' }}>18:00</option>
								<option value="18:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '18:30' ? 'selected' : '' }}>18:30</option>
								<option value="19:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '19:00' ? 'selected' : '' }}>19:00</option>
								<option value="19:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '19:30' ? 'selected' : '' }}>19:30</option>
								<option value="20:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '20:00' ? 'selected' : '' }}>20:00</option>
								<option value="20:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '20:30' ? 'selected' : '' }}>20:30</option>
								<option value="21:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '21:00' ? 'selected' : '' }}>21:00</option>
								<option value="21:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '21:30' ? 'selected' : '' }}>21:30</option>
								<option value="22:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '22:00' ? 'selected' : '' }}>22:00</option>
								<option value="22:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '22:30' ? 'selected' : '' }}>22:30</option>
								<option value="23:00" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '23:00' ? 'selected' : '' }}>23:00</option>
								<option value="23:30" {{ old('HoraFinal', $actividadesInspeccion->HoraFinal) == '23:30' ? 'selected' : '' }}>23:30</option>
							</select>
							<label for="HoraFinal">Hora Cierre</label>
							<p class="help-block">Time: 24h</p>
						</div>
					</div>

					<input type="hidden" value="{{$actividadesInspeccion->IdPlanInspeccion}}" name="IdPlanInspeccion">
					<input type="hidden" value="{{$actividadesInspeccion->EstadoInsertUsuario}}" name="estadoUsuario" id="estadoUsuario">

				</div>
			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("actividadesInspeccion.show", $actividadesInspeccion->IdPlanInspeccion) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}
		<script type="text/javascript">
			$('select').select2();
			$(document).ready(function(){
				$('#IdPersonalInsp').select2({
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

@endsection()