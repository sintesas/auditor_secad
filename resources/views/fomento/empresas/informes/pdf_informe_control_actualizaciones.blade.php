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
					<h5 style="margin-top: 3px; margin-bottom: 3px;">OFICINA CERTIFICACIÓN AERONÁUQUTICA DE LA DEFENSA (SECAD)</h5>
					<div>
                        <h5 style="margin-top: 3px; margin-bottom: 3px;">CONTROL DE ACTUALIZACIONES EMPRESA</h5>
                    </div>                          
               </div>                              
           </div>
			
			<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
				<thead  style="font-size: 10px; background-color: #CCC; color: #000;">
					<th><b>Nombre</b></th>
					<th><b>Fecha Creción</b></th>
					<th><b>Fecha Actualización</b></th>
				</thead>
				
				<tbody id="data_table" name="data_table">
					@foreach ($data as $empresa)
					<tr>
						<td>{{$empresa->NombreEmpresa}}</td>
						<td>{{$empresa->FechaCreacion}}</td>
						<td>{{$empresa->FechaActualizacion}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>