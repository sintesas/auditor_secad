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
                            <h5 style="margin-top: 3px; margin-bottom: 3px;">CONTROL DE PROYECTOS</h5>
                        </div>                          
                   </div>                              
               </div>
			
				<table id="datatable1" class="table table-striped table-hover" >
					<thead  style="background-color: #CCC; color: #000;">
						<tr>
							<th style="width: 600px;padding-left: 0px; padding-right: 0px; text-align: center;" > Nombre </th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Fuente Recurso</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Tipo Proyecto</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Empresa</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Valor</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Dependencia</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Estado Actual</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Alianza</th>
							<th style="width: 800px;padding-left: 0px; padding-right: 0px; text-align: center;"> Fecha Creación</th>
							<th style="width: 800px;padding-left: 0px; padding-right: 0px; text-align: center;"> Fecha Ejecución</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Estado de Financiación</th>
							<th style="width: 200px;padding-left: 0px; padding-right: 0px; text-align: center;"> Pendientes Adicionales</th>
							<th style="width: 1000px;padding-left: 0px; padding-right: 0px; text-align: center;"> Observación</th>
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
	<script>
	</script>

	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>