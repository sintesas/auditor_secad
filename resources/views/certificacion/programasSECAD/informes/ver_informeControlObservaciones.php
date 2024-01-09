@extends('partials.card_big')

@extends('layout')

@section('title')
	Fomento - Informe Resumen Empresas
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('resumenempresa') }}
		<!-- Begin Modal -->
		{{-- <button type="button" onclick="window.location='{{ route("informelafr212.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> --}}
		{{-- End modal --}}
		


		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>CONTROL EMPRESAS</h4>
                        </div>                        
                   </div>                              
               </div>

				<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%;
     width:100%;" >	
			<div class="table-responsive" >
				<table id="example" 
				class="table table-striped table-hover " style="font-size: 9px; width:2000px;" >
					<thead  style="font-size: 9px; " class="text-align">
						<tr>
							<th><b>Nombre</b></div></th>
							<th><b>Teléfono</b></th>
							<th><b>Direccion</b></th>
							<th><b>Representante Legal</b></th>
							<th><b>Alcance</b></th>
							<th><b>Observaciones</b></th>
							<th><b>Ciudad</b><br/></th>
							<th><b>Agremiación/Cluster <br/></b></th>
							<th><b>Tipo</b> <br/></th>
							<th><b>Dominio</b><br/></th>
							<th><b>Actividades</b><br/></th>
							<th><b>Estado</b><br/></th>
							<th><b>Fecha Actualización</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
						@foreach ($empresas as $empresa)
						<tr>
							<td  >{{$empresa->NombreEmpresa}}</td>
							<td  >{{$empresa->Telefono}}</td>
							<td  >{{$empresa->Direccion}}</td>
							<td  >{{$empresa->NombreCertificaInfo}}</td>
							<td  >{{$empresa->Alcance}}</td>
							<td  >{{$empresa->Observaciones}}</td>
							<td  >{{$empresa->Ciudad}}</td>
							<td  >{{$empresa->NombreCluster}}</td>
							<td  >{{$empresa->TipoOrganizacion}}</td>
							<td  >{{$empresa->DominioIndustrial}}</td>
							<td  >{{$empresa->ActividadesEmpresa}}</td>
							<td  >{{$empresa->Estado}}</td>
							<td  >{{$empresa->FechaActualizacion}}</td>
						</tr>
						@endforeach

					</tbody>
					<tfoot>
						<tr>
							<th ><b>Nombre</b></th>
							<th ><b>Teléfono</b></th>
							<th ><b>Direccion</b></th>
							<th ><b>Representante Legal</b></th>
							<th ><b>Alcance</b></th>
							<th ><b>Observaciones</b></th>
							<th ><b>Ciudad</b><br/></th>
							<th ><b>Agremiación/Cluster <br/></b></th>
							<th ><b>Tipo</b> <br/></th>
							<th ><b>Dominio</b><br/></th>
							<th ><b>Capacidades</b><br/></th>
							<th ><b>Estado</b><br/></th>		
							<th ><b>Fecha Actualización</b></th>
						</tr>
					</tfoot>
				</table>
				<h5 id="conteo"></h5>
				
				<input type="hidden" id="tablehtml">

				{{-- {{route('informeresumenprograma.create') }} --}}

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
			{ width: "110px", targets: 0 },
			{ width: "10px", targets: 1 },
			{ width: "150px", targets: 2 },
			{ width: "1px", targets: 3 },
			{ width: "1px", targets: 4 },
			{ width: "1px", targets: 5 },
			{ width: "1px", targets: 6 },
			{ width: "1px", targets: 7 },
			{ width: "1px", targets: 8 },
			{ width: "1px", targets: 9 },
			{ width: "1px", targets: 10 },
			{ width: "1px", targets: 11 },
			{ width: "1px", targets: 12 }
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