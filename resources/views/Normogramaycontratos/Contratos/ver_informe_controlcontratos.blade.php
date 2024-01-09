@extends('partials.card_big')

@extends('layout')

@section('title')
Normograma - CONTROL DE CONTRATOS SECAD 
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('controlcontratos') }}
		<!-- Begin Modal -->
		{{-- <button type="button" onclick="window.location='{{ route("informelafr212.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> --}}
		{{-- End modal --}}
		


		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA DE CERTIFICACIÓN AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>CONTROL DE CONTRATOS SECAD</h4>
                        </div>                        
                   </div>                              
               </div>

				<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%;
     width:100%;" >	
			<div class="table-responsive" >
			<table border="0">
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

			<br/><br/>
				<table id="example" 
						class="table table-striped table-hover " 
							style="font-size: 8px;" >

					<thead  style="font-size: 8px; " class="text-align">
					
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Ordenador</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>B/S</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Rubro</b></th>
							<th style="min-width: 100px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Subordinal</b></th>
							<th style="min-width: 500px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Descripcion Rubro</b></th>
							<th style="min-width: 500px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Descripcion</b></th>
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
							<th style="min-width: 500px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Situación</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Funcionario DECOM - EMACO</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Mes CRP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Mes Obligación</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Valor</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Proveedor</b></th>
							<th style="min-width: 500px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Pagos</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° CPA</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha CPA</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° CDP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha CDP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>N° CRP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha CRP</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha Entrega Material</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Post-Venta</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Informes Supervisión al Día</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Supervisor</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Porcentaje Ejecución</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Plazo Ejecución</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Año Vigencia</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Estado</b></th>
							<th style="min-width: 900px !important;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Observaciones</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
					 @foreach ($contratos as $Vercontratos)
						<tr>
							<td>{{$Vercontratos->Ordenador}}</td>	
							<td>{{$Vercontratos->BS}}</td>
							<td>{{$Vercontratos->Rubro}}</td>
							<td>{{$Vercontratos->Subordinal}}</td>
							<td>{{$Vercontratos->DescripcionRubro}}</td>
							<td>{{$Vercontratos->Descripcion}}</td>
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
							<td>{{$Vercontratos->Situacion}}</td>
							<td>{{$Vercontratos->FuncionarioDECOMEMACO}}</td>
							<td>{{$Vercontratos->MesCRP}}</td>
							<td>{{$Vercontratos->MesObligacion}}</td>
							<td>{{$Vercontratos->ValorObligacion}}</td>
							<td>{{$Vercontratos->Proveedor}}</td>
							<td>{{$Vercontratos->Pagos}}</td>
							<td>{{$Vercontratos->NoCPA}}</td>
							<td>{{$Vercontratos->FechaCPA}}</td>
							<td>{{$Vercontratos->NoCPD}}</td>
							<td>{{$Vercontratos->FechaCPD}}</td>
							<td>{{$Vercontratos->NoCRP}}</td>
							<td>{{$Vercontratos->FechaCRP}}</td>
							<td>{{$Vercontratos->FechaEntregaMaterial}}</td>
							<td>{{$Vercontratos->PostVenta}}</td>
							<td>{{$Vercontratos->InformesSupervisionAlDia}}</td>
							<td>{{$Vercontratos->Supervisor}}</td>
							<td>{{$Vercontratos->PorcentajeEjecucion}}</td>
							<td>{{$Vercontratos->PlazoEjecucion}}</td>
							<td>{{$Vercontratos->AñoVigencia}}</td> 
							<td>{{$Vercontratos->NombreEstadoPCA}}</td>
							<td>{{$Vercontratos->Observaciones}}</td>
						</tr> 
					 @endforeach  

					</tbody>
					<tfoot>
						<tr>
							<th><b>Ordenador</b></div></th>
							<th><b>B/S</b></th>
							<th><b>Rubro</b></th>
							<th><b>Subordinal</b></th>
							<th><b>Descripcion Rubro</b></th>
							<th><b>Descripcion</b></th>
							<th><b>Codigo Clasificacion UNSPSC</b><br/></th>
							<th><b>Recurso<br/></b></th>
							<th><b>Unidad Medida</b> <br/></th>
							<th><b>Total Recursos Corrientes</b><br/></th>
							<th><b>Cantidad	</b><br/></th>
							<th><b>Valor</b><br/></th>
							<th><b>Nombre Contrato</b></th>
							<th><b>N° Contrato</b></th>
							<th><b>Responsable</b></th>
							<th><b>Grupo</b></th>
							<th><b>Situación</b></th>
							<th><b>Funcionario DECOM - EMACO</b></th>
							<th><b>Mes CRP</b></th>
							<th><b>Mes Obligación</b></th>
							<th><b>Valor</b></th>
							<th><b>Proveedor</b></th>
							<th><b>Pagos</b></th>
							<th><b>N° CPA</b></th>
							<th><b>Fecha CPA</b></th>
							<th><b>N° CDP</b></th>
							<th><b>Fecha CDP</b></th>
							<th><b>N° CRP</b></th>
							<th><b>Fecha CRP</b></th>
							<th><b>Fecha Entrega Material</b></th>
							<th><b>Post-Venta</b></th>
							<th><b>Informes Supervisión al Día</b></th>
							<th><b>Supervisor</b></th>
							<th><b>Porcentaje Ejecución</b></th>
							<th><b>Plazo Ejecución</b></th>
							<th><b>Año Vigencia</b></th>
							<th><b>Estado</b></th>
							<th><b>Observaciones</b></th>
						</tr>
					</tfoot>
				</table>
				<h5 id="conteo"></h5>
				
				<input type="hidden" id="tablehtml">
				<a id="pdfAction" href="{{route('InformeContratosA.create',['anio' => $vigencia]) }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

				{{-- {{route('InformeContratosA.create') }} --}}

				</div><!--end .table-responsive -->
			</div><!--end .col -->
		</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/filtering/row-based/range_dates.js"></script> --}}

<script type="text/javascript">




$(document).ready(function() {

	$('#example tfoot th').each( function () {
        var title = $(this).text();
       $(this).html( '<input type="text" placeholder="B '+title+'" />' );
     } );

    var table=$('#example').DataTable( {
		
		dom: 'Bfxrtip',
		sPaginationType: "full_numbers",
    	bProcessing: true,
    	bAutoWidth: false,
    	language: {
      	decimal: "",
      	emptyTable: "No hay test",
      	info:
        "Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
      	infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
      	infoFiltered: "(Filtrados del total de _MAX_ registros)",
      	infoPostFix: "",
      	thousands: ",",
      	lengthMenu: "Mostrar _MENU_ registros por página",
      	loadingRecords: "Cargando...",
      	processing: "Procesando...",
      	search: "Buscar:",
      	zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",
      	paginate: {
        first: "Primera",
        last: "Última",
        next: "Siguiente",
        previous: "Anterior"
      	},
      	aria: {
        	sortAscending: ": activate to sort column ascending",
        	sortDescending: ": activate to sort column descending"
      		}
    	},
		buttons: [
             'copy', 'csv', 'excel', 'print',
			{
					extend: 'pdfHtml5',
					text: 'PDF',
					orientation: 'landscape',
                	 pageSize: 'TABLOID',
					pageMargins:  [ 0, 0, 0, 12 ],
					alignment: 'center',
					FontFamily: 'ARIAL',
					Fontsize: '4'
			  }
		],
		 columnDefs: [
			{ width: "80px", targets: 0 },
			{ width: "10px", targets: 1 },
			{ width: "50px", targets: 2 },
			{ width: "90px", targets: 3 },
			{ width: "140px", targets: 4 },
			{ width: "180px", targets: 5 },
			{ width: "80px", targets: 6 },
			{ width: "70px", targets: 7 },
			{ width: "40px", targets: 8 },
			{ width: "90px", targets: 9 },
			{ width: "90px", targets: 10 },
			{ width: "70px", targets: 11 },
			{ width: "90px", targets: 12 },
			{ width: "100px", targets: 13 },
			{ width: "100px", targets: 14 },
			{ width: "80px", targets: 15 },
			{ width: "160px", targets: 16 },
			{ width: "90px", targets: 17 },
			{ width: "60px", targets: 18 },
			{ width: "90px", targets: 19 },
			{ width: "100px", targets: 20 },
			{ width: "250px", targets: 21 },
			{ width: "80px", targets: 22 },
			{ width: "60px", targets: 23 },
			{ width: "80px", targets: 24 },
			{ width: "60px", targets: 25 },
			{ width: "60px", targets: 26 },
			{ width: "60px", targets: 27 },
			{ width: "60px", targets: 28 },
			{ width: "100px", targets: 29 },
			{ width: "250px", targets: 30 },
			{ width: "90px", targets: 31 },
			{ width: "110px", targets: 32 },
			{ width: "90px", targets: 33 },
			{ width: "50px", targets: 34 },
			{ width: "120px", targets: 35 },
			{ width: "60px", targets: 36 }
			
		],
		
    } );

	{{-- table.columns([3]).every( function () {
    var that = this;
 
    $( 'input' ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value )
                .draw();
        	}
    	} );
	} );
	
 --}} 
    // DataTable
    //var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                   .draw();
            }
        } );
    } );

$.fn.table.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[14] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             	( isNaN( min ) && age <= max ) ||
             	( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        	{
            	return true;
        	}
        	return false;
    	}
	);

	$(document).ready(function() {
    //var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    	} );
	} );
	
} );


 





var orientation = '';
        var count = 0;
        $("table.dataTable").find('thead tr:first-child th').each(function () {
            count++;
        });
        if (count > 6) {
            orientation = 'landscape';
        } else {
            orientation = 'portrait';
        }
</script>



		@endsection()


	@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>



@endsection()
	

@endsection()