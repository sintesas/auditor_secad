@extends('partials.card')

@extends('layout')

@section('title')
	Demandas Potenciales
@endsection()
@section('addcss')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('demandaPotencialImpacto') }}
		{{-- pending to change --}}
		@endsection()

		@section('card-content')
			<div class="total-card">
	<div class="row encabezadoPlanInspeccion">
	<!-- titulo Formulario -->
		<div class="col-xs-12 text-center">
                	<h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4> DEMANDA POTENCIAL - MATRIZ DE IMPACTO </h4>
                        </div>                        
                   </div>                              
         </div>

			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Producto Aeronautico</b></th>
							<th><b>Parte Número</b></th>
							{{-- <th><b>Equipo</b></th> --}}
							<th><b>Unidad</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($demandaspotenciales as $demandapotencial)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$demandapotencial->Nombre}}</td>
							<td>{{$demandapotencial->ParteNumero}}</td>
							{{-- <td>{{$demandapotencial->equipoRelation->Equipo}}</td> --}}
							<td>{{$demandapotencial->NombreUnidad}}</td>
							<td>
								{{-- <div class="col-sm-6">

									{!! Form::open(['route' => ['programa.destroy', $programa->IdPrograma], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div> --}}

								@if ($permiso->actualizar == 1)
								<div class="col-sm-6">

									<a href="{{route('demandapotencial.edit', $demandapotencial->IdDemandaPotencial) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
								@endif
							</td>
							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endif
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th><b>Producto Aeronautico</b></th>
							<th><b>Parte Número</b></th>
							<th><b>Equipo</b></th>
							<th><b>Unidad</b></th>
							
						</tr>
					</tfoot>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->
</div>
		@endsection()


	@endsection()

@section('addjs')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

{{-- <script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script> --}}

<script>
	$(document).ready(function(){
		
	var table = $('#datatable1').DataTable(
		{
			dom: 'Bfxrtip',
			sPaginationType: "full_numbers",
    		bProcessing: true,
			bAutoWidth: false,
			buttons: [
             'copy', 'csv', 'excel', 'print',
				{
					extend: 'pdfHtml5',
					text: 'PDF',
					pageSize: 'TABLOID',
					pageMargins:  [ 0, 0, 0, 12 ],
					alignment: 'center',
					FontFamily: 'ARIAL',
					Fontsize: '4'
			  	}
			]
		}
	);
	 

	});
</script>

@endsection()
	

@endsection()