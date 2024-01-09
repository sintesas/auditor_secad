@extends('partials.card_big_no_h')

@extends('partials.pdf')


<body style="background-color: white">
	


@section('content')

	@section('card-content')

			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                       <h5 style="margin-top: 3px; margin-bottom: 3px;">FUERZA AÉREA COLOMBIANA</h5>
						<h5 style="margin-top: 3px; margin-bottom: 3px;">JEFATURA LOGISTICA</h5>
						<h5 style="margin-top: 3px; margin-bottom: 3px;">OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA (SECAD)</h5>
						 <div>
                            <h5 style="margin-top: 3px; margin-bottom: 3px;">CONTROL DE PROGRAMAS DE CERTIFICACIÓN</h5>
                        </div>                          
                   </div>                              
               </div>
			
				<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
					<thead  style="font-size: 10px; background-color: #CCC; color: #000;">
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>No Control</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Año</b></th>
							<th style="width: 49.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Tipo</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Equipo</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Unidad</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Empresa</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Proyecto</b></th>
							<th style="width: 54.6px;padding-left: 55px; padding-right: 55px; text-align: center;"><b>Alcance</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Estado</b></th>
							{{-- <th><b>Accion SECAD</b></th> --}}
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Producto</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Avance%</b></th>
							{{-- <th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha Inicio</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha Termino</b></th> --}}
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Jefe Programa</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Recursos</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
						{!!$data[0]->Text!!}
					</tbody>
				</table>
				
				<div class="row">
					<div class="col-sm-4" style="text-align: left;">
						Cantidad de programas {{$data[0]->cantidad}}
					</div>
					<div class="col-sm-4 col-sm-offset-4"  style="text-align: right;">
						{{$fecha}}
					</div>
				</div>

	{{-- <script src="{{URL::asset('js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
	<script src="{{URL::asset('js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script> --}}

	<script>

		// $(document).ready(function() {
		// 	$('#data_table').html(window.localStorage.getItem('tabla'));
			
		// } );

		// document.addEventListener("DOMContentLoaded", function(event) {
		//     document.getElementById("data_table").innerHTML = window.localStorage.getItem('tabla');
		// }); 

		
	</script>

	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>