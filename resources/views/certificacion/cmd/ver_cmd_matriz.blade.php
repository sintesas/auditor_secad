@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Matriz Cumplimiento
@endsection()

@section('content')
	
	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		@endsection()

		@section('card-content')
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}}</h4>

		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover" style="width: 2000px;">
					<thead>
						<tr>
							{{-- <th><b>Norma</b><p>Documento Normativo</p></th>
							<th><b>Nombre</b><br><p>Especifique Documento Normativo</p></th> --}}
							<th><b>Sub-Parte</b><p>Identific. Nombre</p></th>
							<th><b>ID</b><p>Código del Requisito</p></th>
							<th><b>Nombre General del Requisito</b><p>Trasnquiba Textualmente el Requisito</p></th>
							<th><b>Descripcion del Requisito</b><p>Trasnquiba Textualmente el Requisito  desde su <br> Fuente Manteniendo su Forma e Idioma Original</p></th>
							<th><b>Guia Aplicable, Referencia & Obervaciones</b><p>AMC-GM / AC / Otro Material Guia</p></th>
							<th style="width: 120px;"><b>MoC</b><p>Código Medio de Cumplimiento</p></th>
							<th style="width: 120px;"><b>Evidencias</b><p>Evidencias de Cumplimeinto</p></th>
							<th style="width: 180px;"><b>Control Configuración</b><p>Subniveles Contro Configuración</p></th>
							<th style="width: 180px;"><b>Evidencias Niveles</b><p></p></th>

						</tr>
					</thead>
					<tbody>
						@foreach ($subPartes as $subParte)
						<tr>
							{{-- <td>{{$baseCerti->Referencia}}</td>
							<td>{{$baseCerti->Nombre}}</td> --}}
							<td>{{$subParte->SubParte}}</td>
							<td>{{$subParte->CodigoRquisito}}</td>
							<td>{{$subParte->NombreRequisito}}</td>
							<td>{{$subParte->DescripcioRequisito}}</td>
							<td>{{$subParte->GuiaAplicable}}</td>
							<td>

								<div class="col-sm-6">

									<a href="{{route('mocsSupartes.show', $subParte->IdSubParteMatriz) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>
							<td>

								<div class="col-sm-6">

									<a href="{{route('evidenciasMocsSupartes.show', $subParte->IdSubParteMatriz) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
							</td>							
							<td>

								<div class="col-sm-6">

									<a href="{{route('cmdcontrolconfiguracion.show', $subParte->IdSubParteMatriz) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>

								<div class="col-sm-6">

									<a href="{{route('cmdcontrolconfiguracion.edit', $subParte->IdSubParteMatriz) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->
			{{-- submit button --}}
		
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("matrizCumplimiento.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div><!--end .col -->
				
		@endsection()


	@endsection()

@section('addjs')

{{-- <script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script> --}}

@endsection()
	

@endsection()