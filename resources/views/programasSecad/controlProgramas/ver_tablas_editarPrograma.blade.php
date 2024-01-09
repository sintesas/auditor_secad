@extends('partials.card')

@extends('layout')

@section('title')
Editar Programa
@endsection()

@section('addcss')

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')

@section('card-content')

@section('card-title')
{{ Breadcrumbs::render('detalleprograma') }}	
@endsection()

@section('card-content')

<div class="card-body floating-label">

                {{-- TABS HEADERS --}}
                <ul class="nav nav-tabs" data-toggle="tabs">
                	<li><a  href="#home">Programa</a></li>
                	<li><a  href="#menu1">Especialistas</a></li>				      
                	<li><a  href="#menu3">Bancos</a></li>
                	<li><a  href="#menu4">Ensayos</a></li>
                </ul>
                {{-- END TABS HEADERS --}}
                {{-- TAB CREAR PROGRAMA --}}
                
                <div class="tab-content">

                	<div id="home" class="tab-pane active">
						
					{!!Form::model($programa,array('route' => ['programa.update', $programa->IdPrograma], 'method' => 'PUT' ))!!}

                			{{ csrf_field()}}


                			<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}">


                		<div class="row">
                			<div class="col-lg-4">	
                				<div class="form-group floating-label">	
                					<input type="text" class="form-control" id="NoPrograma" name="NoPrograma" value="{{old('NoPrograma', $programa->Consecutivo)}}" required disabled>
                					<label for="NoPrograma">No Programa</label>
                				</div>
                			</div>
						<div class="col-lg-4">	
							<div class="form-group floating-label">
								{{ Form::select('IdTipoPrograma', $TipoProgramas->pluck('Tipo', 'IdTipoPrograma'), old('IdTipoPrograma',  isset($programa->IdTipoPrograma) ? $programa->IdTipoPrograma : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdTipoPrograma', 'Tipo')}}
							</div>									
						</div>
						<div class="col-lg-4">	
							<div class="form-group floating-label">
								{{ Form::select('IdAeronave', $Aeronaves->pluck('Aeronave', 'IdAeronave'),  old('IdAeronave',  isset($programa->IdAeronave) ? $programa->IdAeronave : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdAeronave', 'Equipo')}}
							</div>															
						</div>
					</div>		
					<div class="row">
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdUnidad', $Unidades->pluck('NombreUnidad', 'IdUnidad'), old('IdUnidad',  isset($programa->IdUnidad) ? $programa->IdUnidad : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdUnidad', 'Unidad')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdEmpresa', $Empresas->pluck('NombreEmpresa', 'IdEmpresa'), old('IdEmpresa',  isset($programa->IdEmpresa) ? $programa->IdEmpresa : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdEmpresa', 'Empresa')}}
							</div>
						</div>															
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdEstadoPrograma', $Estados->pluck('Descripcion', 'IdEstadoPrograma'), old('IdEstadoPrograma',  isset($programa->IdEstadoPrograma) ? $programa->IdEstadoPrograma : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdEstadoPrograma', 'Estado')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<div class="form-group floating-label">
									{{ Form::select('AccionSECAD', $areas, null, ['class' => 'form-control', 'required' => '']) }}
									{{ Form::label('Area', 'Area')}}
								</div>
							</div>
						</div>							
					</div>	
					<div class="row">
						<div class="col-lg-6">	
							<div class="form-group floating-label">
								<textarea name="Proyecto" id="Proyecto" class="form-control" rows="3" required="">{{old('Proyecto',  isset($programa->Proyecto) ? $programa->Proyecto : null)}}</textarea>
								<label for="Proyecto">Descripción proyecto</label>
							</div>
						</div>	
						<div class="col-lg-6">	
							<div class="form-group floating-label">
								{{ Form::select('Alcance', $alcances, null, ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('Alcance', 'Alcance')}}
							</div>
						</div>			
					</div>
					<div class="row">
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdProductoServicio', $Productos->pluck('Nombre', 'IdDemandaPotencial'), old('IdProductoServicio',  isset($programa->IdProductoServicio) ? $programa->IdProductoServicio : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdProductoServicio', 'Producto Aeronautico')}}
							</div>
						</div>	
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								<input type="text" class="form-control" name="IdHorasTipoPrograma" value="{{ old('IdHorasTipoPrograma',  isset($programa->IdHorasTipoPrograma) ? $programa->IdHorasTipoPrograma : null)}}" id="IdHorasTipoPrograma" placeholder="" required="">
								<label for="IdHorasTipoPrograma">Horas Tipo Programa</label>
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdPersonalJefePrograma', $Personal->pluck('Nombres', 'IdPersonal'), old('IdPersonalJefePrograma',  isset($programa->IdPersonalJefePrograma) ? $programa->IdPersonalJefePrograma : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdPersonalJefePrograma', 'Jefe Programa')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdPersonalJefeSuplente', $Personal->pluck('Nombres', 'IdPersonal'), old('IdPersonalJefeSuplente',  isset($programa->IdPersonalJefeSuplente) ? $programa->IdPersonalJefeSuplente : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdPersonalJefeSuplente', 'Suplente')}}
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-lg-3">	
							<div class="form-group control-width-normal">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										{{ Form::text('FechaInicio', old('FechaInicio',  isset($programa->FechaInicio) ? $programa->FechaInicio : null), array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('FechaInicio', 'Fecha Inicio')}}	
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>	
							</div>	
						</div>
						<div class="col-lg-3">	
							<div class="form-group control-width-normal">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										{{ Form::text('FechaTermino', old('FechaTermino',  isset($programa->FechaTermino) ? $programa->FechaTermino : null), array('class' => 'form-control', 'required' => '' )) }}
										{{ Form::label('FechaTermino', 'Fecha Termino')}}	
									</div>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>	
							</div>	
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdRespuestoModificacion', $Repuesto->pluck('Descripcion', 'IdRepuesto'), old('IdRespuestoModificacion',  isset($programa->IdRespuestoModificacion) ? $programa->IdRespuestoModificacion : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdRespuestoModificacion', 'Repuesto/Modif')}}
							</div>
						</div>
						<div class="col-lg-3">	
							<div class="form-group floating-label">
								{{ Form::select('IdAReferenciaPrograma', $Referencia->pluck('Descripcion', 'IdReferencia'), old('IdAReferenciaPrograma',  isset($programa->IdAReferenciaPrograma) ? $programa->IdAReferenciaPrograma : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdAReferenciaPrograma', 'Referencia')}}
							</div>
						</div>	
					</div>												
					<div class="row">													
						{{-- <div class="col-lg-6">	
							<div class="form-group floating-label">
								{{ Form::select('IdBaseCertificacion', $BaseCertificacion->pluck('Nombre', 'IdBaseCertificacion'), old('IdBaseCertificacion',  isset($programa->IdBaseCertificacion) ? $programa->IdBaseCertificacion : null), ['class' => 'form-control', 'required' => '']) }}
								{{ Form::label('IdBaseCertificacion', 'Base Certificación')}}
							</div>
						</div>		 --}}											
						<div class="col-lg-3">	
							<div class="checkbox checkbox-styled">
								<label class="checkbox-inline checkbox-styled">
									{{ Form::checkbox('Finalizado', '1', old('Finalizado',  isset($programa->Finalizado) ? $programa->Finalizado : null)) }}<span>Finalizado</span>
								</label>
							</div>
						</div>
					</div>															
					<input type="submit" name="submitprograma" id="submitprograma" class="btn btn-info btn-block" value="Actualizar" />

                        
                        <div class="alert alert-danger print-error-msg-caracteristicas" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg-caracteristicas" style="display:none">
                        <ul></ul>
                        </div>

                   {!!Form::close()!!}
				</div>

			


				{{-- END TAB CREAR PROGRAMA --}}
				{{-- TAB ESPECIALIDADES --}}
				<div id="menu1" class="tab-pane fade">
					<div class="card-body floating-label">
						<div class="row">
							<div class="col-lg-12">
								<div class="table-responsive">
									<table style="width: 100%" id="datatable1" class="table table-striped table-hover">
										<thead>
											<tr>
												<th><b>Especialidad</b></th>
												<th><b>Nombre Especialista</b></th>
												<th><b>Horas</b></th>
												<th style="width: 120px;"><b>Acción</b></th>
											</tr>
										</thead>
										<tbody style="width: 100%" id="listaespecialidades" name="listaespecialidades">
										@foreach ($especialidades as $especialidad)
										<tr style="width: 100%" class="especialidad{{$especialidad->IdEspecialidadPrograma}}">
										<td>{{$especialidad->especialidadlistado->Especialidad}}</td>
											<td>{{$especialidad->personalListado->Nombres}}</td>
											<td>{{$especialidad->Horas}}</td>
											<td><button class="btn btn-danger btn-delete delete-record-especialidad pull-right" value="{{$especialidad->IdEspecialidadPrograma}}"><span class="glyphicon glyphicon-trash"></span></button></td>
										</tr>
										@endforeach
									</tbody>
								</table>
									
									<form name="especialidades" id="especialidades">
					                  {{ csrf_field()}}

							                <table class="table table-striped table-hover" id="dynamic_field_especialidades">
							                	<input type="hidden" class="form-control" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}" >

							                </table>

							                <br>  
							                <button type="button" name="addespecialidad" id="addespecialidad" class="btn btn-success">Nuevo Campo</button>
							                <br>
							              
							              <br>
							              
							              <input type="button" name="submitespecialidades" id="submitespecialidades" class="btn btn-info btn-block" value="Guardar" />

							              {{-- alerts --}}
							                <div class="alert alert-danger print-error-msg-especialidades" style="display:none">
							                  <ul></ul>
							                </div>

							                <div class="alert alert-success print-success-msg-especialidades" style="display:none">
							                  <ul></ul>
							                </div> 

					              	</form>

							</div><!--end .table-responsive -->
						</div><!--end .col -->
					</div>
				</div>
			</div>   
			{{-- END TAB ESPECIALIDADES --}}    
			{{-- TAB H/B --}}
			<div id="menu3" class="tab-pane fade">
				<div class="card-body floating-label">
					<div class="row">
						<div class="row">
						<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable2" class="table table-striped table-hover">
										<thead>
											<tr>
												<th><b>Banco</b></th>
												<th><b>Horas</b></th>
												<th style="width: 120px;"><b>Acción</b></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($bancos as $banco)
											<tr class="horabanco{{$banco->IdProgramasBancos}}">
												<td>{{$banco->bancosListado->Nombre}}</td>
												<td>{{$banco->Horas}}</td>
												<td><button class="btn btn-danger btn-delete delete-record-horabanco pull-right" value="{{$banco->IdProgramasBancos}}"><span class="glyphicon glyphicon-trash"></span></button></td>
											</tr>
											@endforeach
										</tbody>
									</table>

									<form name="horasbanco" id="horasbanco">
					                  {{ csrf_field()}}

							                <table class="table table-striped table-hover" id="dynamic_field_horabanco">
							                	<input type="hidden" class="form-control" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}" >
							                </table>

							                <br>  
							                <button type="button" name="addhorabanco" id="addhorabanco" class="btn btn-success">Nuevo Campo</button>
							                <br>
							              
							              <br>
							              
							              <input type="button" name="submithorasbanco" id="submithorasbanco" class="btn btn-info btn-block" value="Guardar" />

							              {{-- alerts --}}
							                <div class="alert alert-danger print-error-msg-horasbanco" style="display:none">
							                  <ul></ul>
							                </div>

							                <div class="alert alert-success print-success-msg-horasbanco" style="display:none">
							                  <ul></ul>
							                </div> 

					              </form>

								</div><!--end .table-responsive -->
						</div><!--end .col -->
					</div> {{-- end row --}}
				</div> {{-- end row --}}
			</div>  {{-- end card body floating label --}}
		</div>


			{{-- END TAB H/B --}}    
			{{-- TAB H/E --}}
			<div id="menu4" class="tab-pane fade">
				<div class="card-body floating-label">
					<div class="row">
						<div class="row">
						<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable3" class="table table-striped table-hover">
										<thead>
											<tr>
												<th><b>Ensayo</b></th>
												<th><b>Tipo</b></th>
												<th><b>Horas</b></th>
												<th style="width: 120px;"><b>Acción</b></th>
											</tr>
										</thead>
										<tbody>
										@foreach ($ensayos as $ensayo)
										<tr class="horaensayo{{$ensayo->IdProgramasEnsayos}}">
											<td>{{$ensayo->ensayoListado->Nombre}}</td>
											<td>{{$ensayo->tipoEnsayoListado->Descripcion}}</td>
											<td>{{$ensayo->Horas}}</td>
											<td><button class="btn btn-danger btn-delete delete-record-horaensayo pull-right" value="{{$ensayo->IdProgramasEnsayos}}"><span class="glyphicon glyphicon-trash"></span></button></td>
										</tr>
										@endforeach
									</tbody>
								</table>

								<form name="horasensayo" id="horasensayo">
					                  {{ csrf_field()}}

							                  <input type="hidden" class="form-control" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}" >
							                  
							                <table class="table table-striped table-hover" id="dynamic_field_horaensayo">
							                </table>

							                <br>  
							                <button type="button" name="addhoraensayo" id="addhoraensayo" class="btn btn-success">Nuevo Campo</button>
							                <br>
							              
							              <br>
							              
							              <input type="button" name="submithorasensayo" id="submithorasensayo" class="btn btn-info btn-block" value="Guardar" />

							              {{-- alerts --}}
							                <div class="alert alert-danger print-error-msg-horasensayo" style="display:none">
							                  <ul></ul>
							                </div>

							                <div class="alert alert-success print-success-msg-horasensayo" style="display:none">
							                  <ul></ul>
							                </div> 
					              </form>
							</div><!--end .table-responsive -->



				<script src="{{asset('js/soloNumeros.js')}}"></script>
				<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

				{{-- AJAX  --}}
				<script>

					$(document).ready(function(){

						$('#datatable1').DataTable();
						$('#datatable2').DataTable();
						$('#datatable3').DataTable();

						var postURL = "<?php echo url('/storeprograma'); ?>";
						var postURLESPECIALIDADES = "<?php echo url('/storeespecialidades'); ?>";
						var postURLBANCOS = "<?php echo url('/storebancos'); ?>";
						var postURLENSAYOS = "<?php echo url('/storeensayos'); ?>";

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});




						$('#submitprograma').click(function(){    
							$.ajax({  
								url:postURL,  
								method:"POST",  
								data:$('#programa').serialize(),
								type:'json',
								success:function(data){
									if(data.error){
										printErrorMsg(data.error);
									}else{
										i=1;

										$(".print-success-msg-caracteristicas").find("ul").html('');
										$(".print-success-msg-caracteristicas").css('display','block');
										$(".print-error-msg-caracteristicas").css('display','none');
										$(".print-success-msg-caracteristicas").find("ul").append("<center><li style='list-style: none;'> Información actualizada </li> </center>");
										$('#caracteristicasempresa :input').attr("disabled", true);
									}
								}  
							});  

						}); 


						var i=1;
						var j=1;
						var k=1;

						$('#addespecialidad').click(function(){
  							i++;
							$('#dynamic_field_especialidades').append('<tr id="row'+i+'" class="dynamic_field_especialidad-added">'+
								'<td>{{ Form::select('IdEspecialidadCertificacion[]', $listaespecialidadescertificacion->pluck('Especialidad', 'IdEspecialidadCertificacion'), null, ['class' => 'form-control', 'id' => 'IdEspecialidadCertificacion']) }}</td>'+
								'<td>{{ Form::select('IdPersonal[]', $listapersonal->pluck('Nombres', 'IdPersonal'), null, ['class' => 'form-control', 'id' => 'IdEspecialidadCertificacion']) }}</td>'+
								'<td><input type="number" onKeyPress="return soloNumeros(event)" id="Horas" name="Horas[]"> </td>'+
								'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove-especialidad">X</button></td></tr>');  
						});

						$('#addhorabanco').click(function(){
							j++;  
							$('#dynamic_field_horabanco').append('<tr id="row'+j+'" class="dynamic_field_horabanco-added">'+
								'<td>{{ Form::select('IdBanco[]', $listabancos->pluck('Nombre', 'IdBanco'), null, ['class' => 'form-control', 'id' => 'IdBanco', 'style' => 'margin-right:80px;"']) }}</td>'+
								'<td><input type="number" style="margin-bottom:15px;" onKeyPress="return soloNumeros(event)" id="Horas" name="Horas[]"> </td>'+
								'<td><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn_remove-horabanco pull-right">X</button></td></tr>');  
						});

						$('#addhoraensayo').click(function(){
							k++;  
							$('#dynamic_field_horaensayo').append('<tr id="row'+k+'" class="dynamic_field_horaensayo-added">'+
								'<td>{{ Form::select('IdEnsayo[]', $listaensayos->pluck('Nombre', 'IdEnsayo'), null, ['class' => 'form-control', 'id' => 'IdEnsayo', 'style' => 'width: 204px;']) }}</td>'+
								'<td>{{ Form::select('IdTipoEnsayo[]', $listatipoensayos->pluck('Descripcion', 'IdTipoEnsayo'), null, ['class' => 'form-control', 'id' => 'IdTipoEnsayo', 'style' => 'width: 124px;']) }}</td>'+
								'<td><input type="number" onKeyPress="return soloNumeros(event)" id="Horas" name="Horas[]"></td>'+
								'<td><button type="button" name="remove" id="'+k+'" class="btn btn-danger btn_remove-horaensayo">X</button></td></tr>');  
						});

						 function RefreshTable1() {
    						   $( "#datatable1" ).load( "{{route('programa.edit', $programa->IdPrograma) }} #datatable1");
   						 }

						$('#submitespecialidades').click(function(){

							$.ajax({  
								url:postURLESPECIALIDADES,  
								method:"POST",  
								data: $('#especialidades').serialize(),
								type:'json',
								success:function(data){
									if(data.error){
										printErrorMsg(data.error);
									}else{
										i=1;
										console.log(data);
										// var table = $('#datatable1').DataTable();
										// table.rows.add(especialidades_data).draw();
										RefreshTable1();
										// table.ajax.reload({
										// 	ajax: especialidades_data
										// });
										
										
										$('.dynamic_field_especialidad-added').remove();

										$(".print-success-msg-especialidades").find("ul").html('');
										$(".print-success-msg-especialidades").css('display','block');
										$(".print-error-msg-especialidades").css('display','none');
										$(".print-success-msg-especialidades").find("ul").append('<li style="list-style:none; text-align:center;">Especialidad añadida satisfactoriamente</li>');
										// $('#especialidades :input').attr("disabled", true);

										
									}
								}  
							});  

						});

						function RefreshTable2() {
    						   $( "#datatable2" ).load( "{{route('programa.edit', $programa->IdPrograma) }} #datatable2");
   						 }

						$('#submithorasbanco').click(function(){            
							$.ajax({  
								url:postURLBANCOS,  
								method:"POST",  
								data:$('#horasbanco').serialize(),
								type:'json',
								success:function(data){
									if(data.error){
										printErrorMsg(data.error);
									}else{
										i=1;
										RefreshTable2();

										$('.dynamic_field_horabanco-added').remove();

										$(".print-success-msg-horasbanco").find("ul").html('');
										$(".print-success-msg-horasbanco").css('display','block');
										$(".print-error-msg-horasbanco").css('display','none');
										$(".print-success-msg-horasbanco").find("ul").append('<li style="list-style:none; text-align:center;">Hora banco añadida satisfactoriamente</li>');
										$('#horasbanco :input').attr("disabled", true);
									}
								}  
							});  

						});

						function RefreshTable3() {
    						   $( "#datatable3" ).load( "{{route('programa.edit', $programa->IdPrograma) }} #datatable3");
   						 }

						$('#submithorasensayo').click(function(){            
							$.ajax({  
								url:postURLENSAYOS,  
								method:"POST",  
								data:$('#horasensayo').serialize(),
								type:'json',
								success:function(data){
									if(data.error){
										printErrorMsg(data.error);
									}else{
										i=1;
										RefreshTable3();
										$('.dynamic_field_horaensayo-added').remove();
										$(".print-success-msg-horasensayo").find("ul").html('');
										$(".print-success-msg-horasensayo").css('display','block');
										$(".print-error-msg-horasensayo").css('display','none');
										$(".print-success-msg-horasensayo").find("ul").append('<li style="list-style:none; text-align:center;">Especialidad añadida satisfactoriamente</li>');
										$('#horasensayo :input').attr("disabled", true);
									}
								}  
							});  

						});



						$(document).on('click','.delete-record-especialidad',function(){

							var idespecialidad = $(this).val();

							$.ajax({
								type: "DELETE",
								url: '/deleteespecialidad' + '/' + idespecialidad,
								success: function (data) {
									console.log(data);
									$(".especialidad" + idespecialidad).remove();
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						});

						$(document).on('click','.delete-record-horabanco',function(){

							var idhorabanco = $(this).val();

							$.ajax({
								type: "DELETE",
								url: '/deletehorabanco' + '/' + idhorabanco,
								success: function (data) {
									console.log(data);
									$(".horabanco" + idhorabanco).remove();
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						});




						$(document).on('click','.delete-record-horaensayo',function(){

							var idhoraensayo = $(this).val();

							$.ajax({
								type: "DELETE",
								url: '/deletehoraensayo' + '/' + idhoraensayo,
								success: function (data) {
									console.log(data);
									$(".horaensayo" + idhoraensayo).remove();
								},
								error: function (data) {
									console.log('Error:', data);
								}
							});
						});



						// remove rows

						$(document).on('click', '.btn_remove-especialidad', function(){  
							var button_id = $(this).attr("id");   
							$('#row'+button_id+'').remove();  
						});

						$(document).on('click', '.btn_remove-horabanco', function(){  
							var button_id = $(this).attr("id");   
							$('#row'+button_id+'').remove();  
						});

						$(document).on('click', '.btn_remove-horaensayo', function(){  
							var button_id = $(this).attr("id");   
							$('#row'+button_id+'').remove();  
						});



					});






				</script>














						</div><!--end .col -->
					</div>
				</div>
			</div>
		</div>   

			  </div>
			 </div>
			</div>
			@endsection()

			@endsection()

			@section('addjs')			
			@endsection()


			@endsection()