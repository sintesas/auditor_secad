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
                            <h5 style="margin-top: 3px; margin-bottom: 3px;">CONTROL DE OBSERVACIONES</h5>
                        </div>                          
                   </div>                              
               </div>
			
				<table id="datatable1" class="table table-striped table-hover">
					<thead  style="display: table-header-group; font-size: 9.5px; background-color: #CCC; color: #000;">
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>No Control</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Año</b></th>
							<th style="width: 49.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Tipo</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Equipo</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Unidad</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Empresa</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Proyecto</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Estado</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Observación</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Avance</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Responsable de Programa</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Suplente</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
						@foreach ($programas as $programa)
							<tr style="page-break-inside: avoid;">
								<td style="font-size: 8px;">{{$programa->Consecutivo}}</td>
								<td style="font-size: 8px;">{{$programa->Anio}}</td>
								<td style="font-size: 8px;">{{$programa->Tipo}}</td>
								<td style="font-size: 8px;">{{$programa->Equipo}}</td>
								<td style="font-size: 8px;">{{$programa->NombreUnidad}}</td>
								<td style="font-size: 8px;">{{$programa->NombreEmpresa}}</td>
								<td style="font-size: 8px;">{{$programa->Proyecto}}</td>
								<td style="font-size: 8px;">{{$programa->Estado}}</td>
								<td style="font-size: 8px;">{{$programa->Observacion}}</td>
								<td style="font-size: 8px;">{{round($programa->PorcentajeAvance,2)}}</td>
								<td style="font-size: 8px;">{{$programa->Jefe}}</td>
								<td style="font-size: 8px;">{{$programa->ApellidosSuplente}} {{$programa->NombresSuplente}}</td>
							</tr>
						@endforeach	
					</tbody>
				</table>
				
				<div class="row">
					<div class="col-sm-4" style="text-align: left;">
						Cantidad de programas {{$count}}
					</div>
					<div class="col-sm-4 col-sm-offset-4"  style="text-align: right;">
						{{$fecha}}
					</div>
				</div>

	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>