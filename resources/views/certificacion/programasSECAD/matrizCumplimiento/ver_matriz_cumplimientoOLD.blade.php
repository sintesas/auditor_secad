@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Matriz Cumplimiento
@endsection()

@section('content')
	
	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Matriz de Cumplimiento
		@endsection()

		@section('card-content')
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}}</h4>		


		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover" >
					<thead>
						<tr>
							<th><b>Norma</b><p>Documento Normativo</p></th>
							<th><b>Nombre</b><br><p>Especifique Documento Normativo</p></th>
							<th><b>Sub-Parte</b><p>Identific. Nombre</p></th>
							<th style="width: 120px;"><b>Estado</b></th>
							<th style="width: 120px;"><b>Requisitos</b></th>
							<th style="width: 120px;"><b>Acciones</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach ($subPartes as $subParte)
						
						<tr>
							{{-- plug id to add updates --}}
							<input type="hidden" name="IdSubParteMatriz[]" value="{{$subParte->IdSubParteMatriz}}" >
							<td><div class="row"><div class="col-sm-12">{{$subParte->Referencia}} </div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$subParte->NombreBaseCert}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$subParte->SubParte}}</div></div></td>
							@if( $subParte->SubParte != 'Control Configuración')
								@if($subParte->Estado == 'En Proceso')
									<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #FFFF00; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$subParte->Estado}} </div></div>
								</td>
								@else
									<td><div class="row"><div class="col-sm-12"><div style="width: 18px; height: 18px; background-color: #00c01d; float: left; border: solid 1px #ccc; border-radius: 2px; margin: 3px; "></div> &#32; {{$subParte->Estado}} </div></div>
								</td>
								@endif
							@else
								<td><div class="row"><div class="col-sm-12"></div></div></td>
							@endif
							<td>

								<div class="col-sm-6">

									<a href="{{route('requisitosMatrizCumpli.show', $subParte->IdSubParteMatriz) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							
							<td>
								@if($subParte->SubParte != 'Control Configuración')
								<div class="col-sm-8">

									{!! Form::open(['route' => ['matrizCumplimiento.destroy',  $subParte->IdSubParteMatriz], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>
								@endif				
							</td>
							
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->
			{{-- submit button --}}
		
			{{-- <div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("matrizCumplimiento.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div> --}}
			<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$programa->IdPrograma}}">
		</div><!--end .col -->
				
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