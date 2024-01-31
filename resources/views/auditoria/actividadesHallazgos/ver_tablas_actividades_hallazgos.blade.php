@extends('partials.card_big')

@extends('layout')

@section('title')
	Auditoria - Actividades
@endsection()

@section('addcss')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('actividades_hallazgos')}}
		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%; width:100%;" >
				<div class="table-responsive-lg table-responsive" >
					<table id="example" class="table table-striped table-hover table-responsive" style="font-size: 11px; width: 2000px;"  >
						<thead  class="text-align" style="font-size: 12px; width: 1000px;" >
							<tr>
								<th style="width: 120px;"><b>Acciones</b></th>
								<th><b>Organización auditada</b></th>
								<th><b>Organización que audita</b></th>
								<th><b>Porcentaje Acción</b></th>
								<th><b>Porcentaje Actividad</b></th>
								<th><b>Cogigo Anotación</b></th>
								<th><b>Cogigo Auditoria</b></th>
								<th><b>Tipo Anotación</b></th>
								<th><b>Es una Anotación</b></th>
								<th><b>Actividad</b></th>
								<th><b>Responsable del seguimiento</b></th>
								<th><b>Responsable del hallazgo</b></th>
								<th><b>Responsable actividad</b></th>
								<th><b>Dependencia</b></th>
								<th><b>Fecha Inicio</b></th>
								<th><b>Fecha Final</b></th>
								<th><b>Dias</b></th>
								<th><b>Estado</b></th>
								<th><b>Entregable</b></th>
								<th><b>Cantidad Entregable</b></th>
								<th><b>Causa Raíz</b></th>
								<th><b>Efecto</b></th>
								<th><b>Metodo 5M</b></th>
								<th><b>Aspecto 5M</b></th>
								<th><b>Priorización</b></th>
								<th><b>Nombre Programa</b></th>
								<th><b>Nombre Falencia</b></th>
								<th><b>Proceso</b></th>
							</tr>
						</thead>

						<tbody id="data_table" name="data_table">
							@foreach ($actividades as $actividad)
							@if ($permiso->consultar == 1)
								<tr>
									<td>
										<?php
											$respSeguimiento = explode("|", $actividad->Name);
												//$respSeguimiento = explode(".", $actividad->Name);
											if(count($respSeguimiento)<2){
												$respSeguimiento = explode(".", $actividad->Name);
											}
										?>
										@if($isAdmin == true)
										<div class="col-sm-6">
											<a href="{{route('actividadesHallazgo.show', $actividad->IdTarea) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-plus"></i></div></a>
										</div>
										@else
											@foreach ($respSeguimiento as $resp)

												@if (strcmp(trim($userLogueado),trim($resp)) == 0)
													<div class="col-sm-6">
														<a href="{{route('actividadesHallazgo.show', $actividad->IdTarea) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-plus"></i></div></a>
													</div>
													@break
												@endif
											@endforeach
										@endif
									</td>
									<td>{{$actividad->EmpresaAuditadaNombre}}</td>
									<td>{{$actividad->EmpresaAuditaNombre}}</td>
									<td>{{$actividad->Porcentaje}} %</td>
									<td>{{$actividad->Promedio}} %</td>
									<td>{{$actividad->NoAnota}}</td>
									<td>{{$actividad->codigoAuditoria}}</td>
									<td>{{$actividad->Anotacion}}</td>
									<td>{{$actividad->EsAnotacion}}</td>
									<td>{{$actividad->AccionTarea}}</td>
									<td>{{$actividad->ResponsablesSeguimientoAnotaciones}}</td>
									<td>{{$actividad->ResponsablesHallazgoAnotaciones}}</td>
									<td>{{$actividad->Name}} </td>
									<td>{{$actividad->Dependencia}} </td>
									<td>{{$actividad->FechaInicio}}</td>
									<td>{{$actividad->FechaFinal}}</td>
									@php(date_default_timezone_set("America/Bogota"))
									@php($fecha1 = new DateTime($actividad->FechaFinal))
									@php($fecha2 = new DateTime(date('Y-m-d')))
									@php($dias = $fecha1->diff($fecha2))
									@if($fecha1>$fecha2)
										<td>{{$dias->days}} dias</td>
										<td>Restantes</td>
									@else
										<td style="color:red">{{$dias->days}} dias</td>
										<td style="color:red">Vencida</td>
									@endif

									<td>{{$actividad->Entregable}}</td>
									<td>{{$actividad->CantidadEntregable}}</td>
									<td>{{$actividad->CausaRaiz}}</td>
									<td>{{$actividad->Efecto}}</td>
									<td>{{$actividad->Metodo}}</td>
									<td>{{$actividad->Aspecto}}</td>
									<td>{{$actividad->Priorizacion}}</td>
									<td>{{$actividad->NombrePrograma}}</td>
									<td>{{$actividad->NombreFalencia}}</td>
									<td>{{$actividad->Proceso}}</td>
								</tr>
								@endif
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th><b></b></th>
								<th><b>Organización Auditada</b></th>
								<th><b>Organización que Audita</b></th>
								<th><b>Porcentaje Acción</b></th>
								<th><b>Porcentaje Actividad</b></th>
								<th><b>Cogigo Anotación</b></th>
								<th><b>Cogigo Auditoria</b></th>
								<th><b>Tipo Anotación</b></th>
								<th><b>Es una Anotación</b></th>
								<th><b>Actividad</b></th>
								<th><b>Responsable seguimiento</b></th>
								<th><b>Responsable hallazgo</b></th>
								<th><b>Responsable Actividad</b></th>
								<th><b>Dependencia</b></th>
								<th><b>Fecha Inicio</b></th>
								<th><b>Fecha Final</b></th>
								<th><b>Dias</b></th>
								<th><b>Estado</b></th>
								<th><b>Entregable</b></th>
								<th><b>Cantidad Entregable</b></th>
								<th><b>Causa Raíz</b></th>
								<th><b>Efecto</b></th>
								<th><b>Metodo 5M</b></th>
								<th><b>Aspecto 5M</b></th>
								<th><b>Priorización</b></th>
								<th><b>Nombre Programa</b></th>
								<th><b>Nombre Falencia</b></th>
								<th><b>Proceso</b></th>
							</tr>
						</tfoot>
					</table>
					<h5 id="conteo"></h5>

					<input type="hidden" id="tablehtml">

			</div><!--end .table-responsive -->
		</div><!--end .col -->

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

	$('#example tfoot th').each( function () {
        var title = $(this).text();
       $(this).html( '<input type="text" placeholder="B '+title+'" />' );
    });

	var table=$('#example').DataTable({
		dom: 'Bfxrtip',
		sPaginationType: "full_numbers",
		bProcessing: true,
		bAutoWidth: false,
		language: {
		//decimal: "",
		emptyTable: "No hay test",
		info:
		"Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
		infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
		infoFiltered: "(Filtrados del total de _MAX_ registros)",
		/*infoPostFix: "",
		thousands: ",",*/
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
			{ width: "10px", targets: 0 },
			{ width: "15px", targets: 1 },
			{ width: "15px", targets: 2 },
			{ width: "15px", targets: 3 },
			{ width: "15px", targets: 4 },
			{ width: "100px", targets: 5 },
			{ width: "100px", targets: 6 },
			{ width: "100px", targets: 7 },
			{ width: "5px", targets: 8 },
			{ width: "100px", targets: 9 },
			{ width: "5px", targets: 10 },
			{ width: "5px", targets: 11 },
			{ width: "5px", targets: 12 },
			{ width: "5px", targets: 13 },
			{ width: "50px", targets: 14 },
			{ width: "10px", targets: 15 },
			{ width: "10px", targets: 16 },
			{ width: "10px", targets: 17 },
			{ width: "10px", targets: 18 },
			{ width: "10px", targets: 19 },
			{ width: "10px", targets: 20 },
			{ width: "10px", targets: 21 },
			{ width: "10px", targets: 22 },
			{ width: "10px", targets: 23 },
			{ width: "10px", targets: 24 },
			{ width: "10px", targets: 25 }
		],

	});


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

	/*$.fn.table.ext.search.push(
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
	} );*/

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
