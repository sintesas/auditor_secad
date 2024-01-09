@extends('partials.card')

@extends('layout')

@section('title')
Crear Evento
@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('crear_evento') }}

@endsection()

@section('form-tag')
{!! Form::open(['route' => 'evento.store']) !!}
@endsection()

{{ csrf_field()}}

<div class="card">
	<div class="card-body ">
		{!! Form::open(array('route' => 'auditoria.store', 'data-parsley-validate' => 'parsley')) !!}
		{{ csrf_field()}}
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					{{ Form::label('Codigo', 'Codigo')}}
					{{ Form::text('Codigo', null, array('class' => 'form-control', 'required' => '' )) }}
				</div>
			</div>
			<div class="col-sm-4">
								{{-- <div class="form-group">
									{{ Form::label('Fecha de Inicio', 'Fecha de Inicio')}}
									{{ Form::text('FechaInicio', null, array('class' => 'form-control','required' => '' )) }}
								</div> --}}

								<div class="form-group">
									{{ Form::label('FechaInicio', 'Fecha de Inicio')}}
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											{{ Form::text('FechaInicio', null, array('class' => 'form-control', 'required' => '' )) }}
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>	
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::label('IdEmpresa', 'Organización')}}
									{{-- {{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control']) }} --}}
									{{ Form::select('IdEmpresa', $empresas->prepend('none')->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa']) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Responsable', 'Responsable')}}
									{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
									<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required="" aria-required="true">
										<option value="">&nbsp;</option>
										<option value="1">Alfredo Duque Padilla</option>
										<option value="2">Ernesto  Juliao </option>
										<option value="3">Luisa Fernanda Leal C.</option>
										<option value="4">LAURA PARDO</option>
										<option value="5">MIGUEL GARCIA SOTO</option>
										<option value="6">Carlos Alberto Londono Masso</option>
										<option value="7">Moris Osvaldo Vargas Rozo</option>
										<option value="8">GUILLERMO RAMOS JIMENEZ</option>
										<option value="9">JAVIER SEGURA HORTUA</option>
										<option value="10">CLEYTON CUESTA MARTINEZ</option>
										<option value="11">CRISTIAN ANDRES TAMAYO FERNANDEZ</option>
										<option value="12">YURANNY DEL CARMEN CASTRO</option>
										<option value="13">ALFREDO RAMIREZ  PUENTES</option>
										<option value="14">Marcela Ariza</option>
										<option value="15">Ana Cárdenas  Mendoza</option>
										<option value="16">Andres Osorio Plata</option>
										<option value="17">Alfonso Enrique Villamizar De La Hoz</option>
										<option value="18">Fernando Gomez Escobar</option>
										<option value="19">Alfonso Vasquez</option>
										<option value="20">ANDRES PALOMINO</option>
										<option value="21">LUIS EDUARDO SAENZ</option>
										<option value="22">Carlos David  Salazar</option>
										<option value="23">Huber Espinal Z.</option>
										<option value="24">Diego Torres</option>
										<option value="25">CARLOS ENRIQUE RIOS</option>
										<option value="26">EDGAR RICARDO FUENTES CASTILLO</option>
										<option value="27">Alvaro Marin Cancino     </option>
										<option value="28">Erwing Morales</option>
										<option value="29">Edwin Zambrano</option>
										<option value="30">Juan Carlos  Molinas Velez</option>
										<option value="31">Isabel Cristina Roldan Hoyos</option>
										<option value="32">Edwin  Ariza</option>
										<option value="33">ARNOLD ESCOBAR GARZON</option>
										<option value="34">MAGDA CAVIEDES RIVERA</option>
										<option value="35">Felipe Vergara Williams</option>
										<option value="36">Juan Manuel Torres     </option>
										<option value="37">Rosalba Londono Duque</option>
										<option value="38">Alberto Robles</option>
										<option value="39">Jorge Armando Alvarez Galvis</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="Lastname1">
									<label for="Lastname1">Lastname</label> --}}
									{{ Form::label('Cargo responsable', 'Cargo responsable')}}
									{{ Form::text('CargoRespo', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Nombre Auditoria', 'Nombre Auditoria')}}
									{{ Form::text('NombreAuditoria', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Inspector Lider', 'Inspector Lider')}}
									{{-- {{ Form::text('IdPersonalInsp', null, array('class' => 'form-control','required' => '' )) }} --}}
									<select id="IdPersonalInsp" name="IdPersonalInsp" class="form-control" required="" aria-required="true">
										<option value="">&nbsp;</option>
										<option value="1">Alfredo Duque Padilla</option>
										<option value="2">Ernesto  Juliao </option>
										<option value="3">Luisa Fernanda Leal C.</option>
										<option value="4">LAURA PARDO</option>
										<option value="5">MIGUEL GARCIA SOTO</option>
										<option value="6">Carlos Alberto Londono Masso</option>
										<option value="7">Moris Osvaldo Vargas Rozo</option>
										<option value="8">GUILLERMO RAMOS JIMENEZ</option>
										<option value="9">JAVIER SEGURA HORTUA</option>
										<option value="10">CLEYTON CUESTA MARTINEZ</option>
										<option value="11">CRISTIAN ANDRES TAMAYO FERNANDEZ</option>
										<option value="12">YURANNY DEL CARMEN CASTRO</option>
										<option value="13">ALFREDO RAMIREZ  PUENTES</option>
										<option value="14">Marcela Ariza</option>
										<option value="15">Ana Cárdenas  Mendoza</option>
										<option value="16">Andres Osorio Plata</option>
										<option value="17">Alfonso Enrique Villamizar De La Hoz</option>
										<option value="18">Fernando Gomez Escobar</option>
										<option value="19">Alfonso Vasquez</option>
										<option value="20">ANDRES PALOMINO</option>
										<option value="21">LUIS EDUARDO SAENZ</option>
										<option value="22">Carlos David  Salazar</option>
										<option value="23">Huber Espinal Z.</option>
										<option value="24">Diego Torres</option>
										<option value="25">CARLOS ENRIQUE RIOS</option>
										<option value="26">EDGAR RICARDO FUENTES CASTILLO</option>
										<option value="27">Alvaro Marin Cancino     </option>
										<option value="28">Erwing Morales</option>
										<option value="29">Edwin Zambrano</option>
										<option value="30">Juan Carlos  Molinas Velez</option>
										<option value="31">Isabel Cristina Roldan Hoyos</option>
										<option value="32">Edwin  Ariza</option>
										<option value="33">ARNOLD ESCOBAR GARZON</option>
										<option value="34">MAGDA CAVIEDES RIVERA</option>
										<option value="35">Felipe Vergara Williams</option>
										<option value="36">Juan Manuel Torres     </option>
										<option value="37">Rosalba Londono Duque</option>
										<option value="38">Alberto Robles</option>
										<option value="39">Jorge Armando Alvarez Galvis</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Lugar', 'Lugar')}}
									{{ Form::text('Lugar', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Centro', 'Centro')}}
									{{ Form::text('Centro', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::label('Auditor Lider', 'Auditor Lider')}}
									{{-- {{ Form::text('IdPersonalAudi', null, array('class' => 'form-control','required' => '' )) }} --}}
									<select id="IdPersonalAudi" name="IdPersonalAudi" class="form-control" required="" aria-required="true">
										<option value="">&nbsp;</option>
										<option value="1">Alfredo Duque Padilla</option>
										<option value="2">Ernesto  Juliao </option>
										<option value="3">Luisa Fernanda Leal C.</option>
										<option value="4">LAURA PARDO</option>
										<option value="5">MIGUEL GARCIA SOTO</option>
										<option value="6">Carlos Alberto Londono Masso</option>
										<option value="7">Moris Osvaldo Vargas Rozo</option>
										<option value="8">GUILLERMO RAMOS JIMENEZ</option>
										<option value="9">JAVIER SEGURA HORTUA</option>
										<option value="10">CLEYTON CUESTA MARTINEZ</option>
										<option value="11">CRISTIAN ANDRES TAMAYO FERNANDEZ</option>
										<option value="12">YURANNY DEL CARMEN CASTRO</option>
										<option value="13">ALFREDO RAMIREZ  PUENTES</option>
										<option value="14">Marcela Ariza</option>
										<option value="15">Ana Cárdenas  Mendoza</option>
										<option value="16">Andres Osorio Plata</option>
										<option value="17">Alfonso Enrique Villamizar De La Hoz</option>
										<option value="18">Fernando Gomez Escobar</option>
										<option value="19">Alfonso Vasquez</option>
										<option value="20">ANDRES PALOMINO</option>
										<option value="21">LUIS EDUARDO SAENZ</option>
										<option value="22">Carlos David  Salazar</option>
										<option value="23">Huber Espinal Z.</option>
										<option value="24">Diego Torres</option>
										<option value="25">CARLOS ENRIQUE RIOS</option>
										<option value="26">EDGAR RICARDO FUENTES CASTILLO</option>
										<option value="27">Alvaro Marin Cancino     </option>
										<option value="28">Erwing Morales</option>
										<option value="29">Edwin Zambrano</option>
										<option value="30">Juan Carlos  Molinas Velez</option>
										<option value="31">Isabel Cristina Roldan Hoyos</option>
										<option value="32">Edwin  Ariza</option>
										<option value="33">ARNOLD ESCOBAR GARZON</option>
										<option value="34">MAGDA CAVIEDES RIVERA</option>
										<option value="35">Felipe Vergara Williams</option>
										<option value="36">Juan Manuel Torres     </option>
										<option value="37">Rosalba Londono Duque</option>
										<option value="38">Alberto Robles</option>
										<option value="39">Jorge Armando Alvarez Galvis</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::label('Cargo Auditor', 'Cargo Auditor')}}
									{{ Form::text('CargoAuditor', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::label('Marco Legal', 'Marco Legal')}}
									{{ Form::text('MarcoLegal', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Objeto', 'Objeto')}}
									{{ Form::textarea('Objeto', null, array('class' => 'form-control', 'rows="1"','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Tipo Auditoria', 'Tipo Auditoria')}}
									{{ Form::select('IdTipoAuditoria', $tiposAuditoria->prepend('none')->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['class' => 'form-control']) }}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									{{ Form::label('FechaAperAudit', 'Fecha Apertura')}}
									{{-- {{ Form::text('FechaAperAudit', null, array('class' => 'form-control','required' => '' )) }} --}}
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											{{ Form::text('FechaAperAudit', null, array('class' => 'form-control', 'required' => '' )) }}
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									{{ Form::label('Hora Inicio', 'Hora Inicio')}}
									{{ Form::text('HoraIni', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									{{ Form::label('FechaTermino', 'Fecha Termino')}}
									{{-- {{ Form::text('FechaTermino', null, array('class' => 'form-control','required' => '' )) }} --}}
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											{{ Form::text('FechaTermino', null, array('class' => 'form-control', 'required' => '' )) }}
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									{{ Form::label('Hora Cierre', 'Hora Cierre')}}
									{{ Form::text('HoraTermi', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Alcance', 'Alcance')}}
									{{ Form::textarea('Alcance', null, array('class' => 'form-control', 'rows="1"','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Equipo Inspector', 'Equipo Inspector')}}
									{{ Form::textarea('EquipoInspector', null, array('class' => 'form-control', 'rows="1"','required' => '' )) }}
									{{-- <select id="select1" name="select1" class="form-control" required="" aria-required="true">
										<option value="">&nbsp;</option>
										<option value="30">30</option>
										<option value="40">40</option>
										<option value="50">50</option>
										<option value="60">60</option>
										<option value="70">70</option>
									</select> --}}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Expertos Tecnicos', 'Expertos Tecnicos')}}
									{{ Form::text('ExpertosTecnicos', null, array('class' => 'form-control','required' => '' )) }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									{{ Form::label('Observaciones', 'Observaciones')}}
									{{ Form::textarea('Observaciones', null, array('class' => 'form-control','required', 'rows="1"' => '' )) }}
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- submit button --}}
				
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("auditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>	
			{!! Form::close() !!}
			
			@endsection()

			@section('addjs')

			<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
			<script type="text/javascript">
				$('select').select2();
			</script>
			<script>
				$(document).ready(function(){
					$('#datatable1').DataTable();
				});
			</script>

			@endsection()

			@endsection()