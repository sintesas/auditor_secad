@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Requisitos Matriz
@endsection()

@section('content')
	
	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Requisitos Matriz de Cumplimiento

		<!-- The Modal -->
		<button type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

		@section('card-content')
			<h4><strong>Base Certificación:</strong> {{$baseCertificacion->Referencia}} - {{$baseCertificacion->Nombre}}</h4>
			<h4><strong>Sub-Parte:</strong> {{$subParte->SubParte}}</h4>		

		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover" style="width: 2000px;">
					<thead>
						<tr>
							{{-- datos		 --}}
							<th style="width: 120px;"><b>ID</b><p>Código del Requisito</p></th>
							<th style="width: 260px;"><b>Nombre General del Requisito</b><p>Trasnquiba Textualmente el Requisito</p></th>
							<th style="width: 450px;"><b>Descripcion del Requisito</b><p>Trasnquiba Textualmente el Requisito  desde su Fuente Manteniendo su Forma e Idioma Original</p></th>
							<th style="width: 330px;"><b>Guia Aplicable, Referencia & Obervaciones</b><p>AMC-GM / AC / Otro Material Guia</p></th>
							{{-- botones --}}
							<th style="width: 120px;"><b>MoC</b><p>Código Medio de Cumplimiento</p></th>
							<th style="width: 120px;"><b>Evidencias</b><p>Evidencias de Cumplimeinto</p></th>
							<th style="width: 120px;"><b>Estado</b></th>
							<th style="width: 180px;"><b>FCAR</b><p>Ficha de Control de Asuntos <br> Relevantes por Requisito</p></th>
							<th style="width: 180px;"><b>Aprobación</b><p>Especialista en Certificación / Tecnico Control Aeronavegabilidad</p></th>
							<th style="width: 120px;"><b>Acciones</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach ($requsitos as $requsito)
						
						<tr>
							<td><div class="row"><div class="col-sm-12">{{$requsito->CodigoRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->NombreRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->DescripcioRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->GuiaAplicable}}</div></div></td>
							
							<td>

								<div class="col-sm-6">

									<a href="{{route('mocsSupartes.show', $requsito->IdRequsito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>
							<td>

								<div class="col-sm-6">

									<a href="{{route('evidenciasMocsSupartes.show', $requsito->IdRequsito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>
							@if($requsito->Estado == 'En Proceso')
								<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FFFF00; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$requsito->Estado}} </div></div>
							</td>
							@elseif ($requsito->Estado == 'Aprobado')
								<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #00c01d; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$requsito->Estado}} </div></div>
							</td>
							@endif
							<td>

								<div class="col-sm-6">

									<a href="{{route('fcarMoc.show', $requsito->IdRequsito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>

								<div class="col-sm-6">
									<a href="{{route('aprobacionMocsSupartes.show', $requsito->IdRequsito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>

								<div class="col-sm-6">

									{!! Form::open(['route' => ['requisitosMatrizCumpli.destroy',  $requsito->IdRequsito], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>

								<div class="col-sm-6">

									<a href="{{route('requisitosMatrizCumpli.edit', $requsito->IdRequsito) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->			

		</div><!--end .col -->

		<div id="id1" class="modal" style="padding-top:135px;">
			<div class="modal-content">
				<div class="card-head style-primary">
					<header>Crear Requisito	</header>
					<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
					class="close">x</span> 
				</div>

				<div class="card">
					<div class="card-body floating-label">
						{!! Form::open(array('route' => 'requisitosMatrizCumpli.store')) !!}

						{{ csrf_field()}}

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="CodigoRequisito" name="CodigoRequisito" required>
									<label for="CodigoRequisito">Código Requisito</label>
								</div>
							</div>	
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="NombreRequisito" name="NombreRequisito" required>
									<label for="NombreRequisito">Nombre Requisito</label>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea name="DescripcioRequisito" id="DescripcioRequisito"  class="form-control"></textarea>
									<label for="DescripcioRequisito">Descripción Requisito</label>
								</div>
							</div>	
							
						</div>		
						<div class="row">
							<div class="col-sm-12">
				                <div class="form-group">
				                    <label for="Documentos">Imagenes</label>
				                   {!! Form::file('images', array('class' => 'form-control', 'id' => 'inputFile')) !!}
				                   
				                </div>
				            </div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="GuiaAplicable" name="GuiaAplicable" required>
									<label for="GuiaAplicable">Guia Aplicable</label>
								</div>
							</div>	
						</div>
						<input type="hidden" id="IdSubParteMatriz" name="IdSubParteMatriz" value="{{$subParte->IdSubParteMatriz}}">

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
								</div>
								<div class="col-sm-6">
									<button type="button" onclick="window.location='{{route('requisitosMatrizCumpli.show', $subParte->IdSubParteMatriz) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			{!! Form::close() !!}

			<script>
				$(".delete").on("submit", function(){
					return confirm("Esta seguro que desea borrar este codigo?");
				});
			</script>

		</div>
				
		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()
	

@endsection()