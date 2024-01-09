@extends('partials.card_big_no_h')

@extends('partials.pdf')


<body style="background-color: white">
	


@section('content')

	@section('card-content')

				<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA DE CERTIFICACIÓN AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>CONTROL DE CONTRATOS SECAD</h4>
							<h4>VIGENCIA: {{$vigencia}}</h4>
                        </div>                        
                   </div>                               
               </div>

			   <br/><br/>
				<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
				<tr>
					<th colspan="3">VALOR TOTAL PRESUPUESTADO</th>
					<td>@if($valorTotal) ${{number_format($valorTotal, 0, '', '.')}}@endif</td>
				</tr>
					<tr>
						<th colspan="3">VALOR PRESUPUESTO CANCELADO</th>
						<td>@if($valorCancelado) ${{number_format($valorCancelado, 0, '', '.')}}@endif</td>
					</tr>
					<tr>
						<th colspan="3">VALOR TOTAL CONTRATADO</th>
						<td>@if($valorTotalContratado) ${{number_format($valorTotalContratado, 0, '', '.')}}@endif</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th COLSPAN="2">PORCENTAJE CONTRATADO</th>
						<td>{{$porcentajeContratado}} %</td><th></th></tr>
					<tr><th colspan="3">VALOR EN ESTRUCTURACION</th><td>@if($valorEnEstructuracion) ${{number_format($valorEnEstructuracion, 0, '', '.')}}@endif</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th COLSPAN ="2">PORCENTAJE EN ESTRUCTURACION</th><td>{{$porcentajeEstructuracion}}%</td></tr>
					<tr><th colspan="3">VALOR EJECUTADO</th><td>@if($valorEjecutado) ${{number_format($valorEjecutado, 0, '', '.')}}@endif</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th COLSPAN ="2">PORCENTAJE EN EJECUCION</th><td>{{$porcentajeEjecutado}}%</td></tr>	
				</table>
+
				<table id="datatable2" class="table table-striped table-hover" style="font-size: 8px;">

					<thead  style="font-size: 9px; " class="text-align">
					
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Ordenador</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>B/S</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Rubro</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Codigo Clasificacion UNSPSC</b><br/></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Recurso<br/></b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Unidad Medida</b> <br/></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Total Recursos Corrientes</b><br/></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Cantidad	</b><br/></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Valor</b><br/></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Nombre Contrato</b></th>--
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° Contrato</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Responsable</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Grupo</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Funcionario DECOM - EMACO</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Mes CRP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Mes Obligación</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Valor</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Proveedor</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° CPA</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha CPA</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° CDP</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
					 @foreach ($contratos as $Vercontratos)
						<tr style="page-break-inside: avoid;">
							<td>{{$Vercontratos->Ordenador}}</td>	
							<td>{{$Vercontratos->BS}}</td>
							<td>{{$Vercontratos->Rubro}}</td>
							<td>{{$Vercontratos->CodigoClasificacionUNSPSC}}</td>
							<td>{{$Vercontratos->Recurso}}</td>
							<td>{{$Vercontratos->NombreUnidadMedida}}</td>
							<td>{{$Vercontratos->TotalRecursosCorriente}}</td>
							<td>{{$Vercontratos->Cantidad}}</td>
							<td>{{$Vercontratos->Valor}}</td>
							<td>{{$Vercontratos->NombreContrato}}</td>
							<td>{{$Vercontratos->NumeroContrato}}</td>
							<td>{{$Vercontratos->Responsable}}</td>
							<td>{{$Vercontratos->Grupo}}</td>
							<td>{{$Vercontratos->FuncionarioDECOMEMACO}}</td>
							<td>{{$Vercontratos->MesCRP}}</td>
							<td>{{$Vercontratos->MesObligacion}}</td>
							<td>{{$Vercontratos->ValorObligacion}}</td>
							<td>{{$Vercontratos->Proveedor}}</td>
							<td>{{$Vercontratos->NoCPA}}</td>
							<td>{{$Vercontratos->FechaCPA}}</td>
							<td>{{$Vercontratos->NoCPD}}</td>
						</tr> 
					 @endforeach  

					</tbody>
					
				</table>
	@endsection()

@section('addjs')

@endsection()
	

@endsection()

</body>

