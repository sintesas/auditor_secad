@extends('partials.card')

@extends('layout')

@section('title')
	INFORME DE CONVENIOS REALIZADOS
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

	    {!! Form::model($convenio) !!}
        {{ csrf_field()}}

		@endsection

		@section('card-title')
        Informe Convenios
		@endsection()

        @section('card-content')
		@section('card-title')

        {{-- {{ Breadcrumbs::render('controlcontratos') }} --}}

		@endsection()

        @section('card-content')

		<div class="total-card">
        <div class="row encabezadoPlanInspeccion">
            <!-- titulo Formulario -->
            <div class="col-xs-12 text-center" >
                    <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                    <div>
                        <h4>INFORME DE CONVENIOS REALIZADOS</h4>
                    </div>
              </div>
          </div>


                        	<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%; width:100%;" >
                            <div class="table-responsive">
                                            <table id="exampleDataConevenios"
                                                    class="table table-striped table-hover "
                                                        style="font-size: 9px; width: 1000px;" >
                                                <thead  style="font-size: 9px; " class="text-align">
                                                    <tr>
                                                        <th class="th-x text-center" > Nombre Convenio</th>
                                                        <th class="th-x text-center" > No. Convenio</th>
                                                        <th class="th-x text-center" > Entidad</th>
                                                        <th class="th-x text-center" > Fecha Firma</th>
                                                        <th class="th-x text-center" > Fecha Vigencia</th>
                                                        <th class="th-x text-center" > Caracter</th>
                                                        <th class="th-x text-center" > Estado</th>
                                                        <th class="th-x text-center" > Objeto</th>
                                                        <th class="th-x text-center" > Antecedente</th>
                                                        <th class="th-x text-center" > Responsable </th>
                                                        <th class="th-x text-center" > Contacto </th>
                                                        <th class="th-x text-center" > Celular </th>
                                                        <th class="th-x text-center" > Email </th>
                                                        <th class="th-x text-center" > Pendientes </th>
                                                        <th class="th-x text-center" > DSDS </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data_tableConvenio" name="data_tableConvenio">
                                                @if(count($convenio) != 0)
                                                @foreach($convenio as $convenioR)
                                                @if ($permiso->consultar == 1)
                                                    <tr class="line-b">
                                                        <th class="text-center">{{$convenioR->NombreConv}}</th>
                                                        <th class="text-center">{{$convenioR->IdConvenios}}</th>
                                                        <th class="text-center">{{$convenioR->Entidad}}</th>
                                                        <th class="text-center">{{$convenioR->Fecha}}</th>
                                                        <th class="text-center">{{$convenioR->Vigencia}}</th>
                                                        <th class="text-center">{{$convenioR->NombreCaracterConvenio}}</th>
                                                        <th class="text-center">{{$convenioR->NombreEstadoConvenio}}</th>
                                                        <th class="text-center">{{$convenioR->Objeto}}</th>
                                                        <th class="text-center">{{$convenioR->Antecedente}}</th>
                                                        <th class="text-center">{{$convenioR->Responsable}}</th>
                                                        <th class="text-center">{{$convenioR->Contacto}}</th>
                                                        <th class="text-center">{{$convenioR->Celular}}</th>
                                                        <th class="text-center">{{$convenioR->Email}}</th>
                                                        <th class="text-center">{{$convenioR->Pendiente}}</th>
                                                        <th class="text-center">{{$convenioR->DSDS}}</th>
                                                    </tr>
                                                @endif
                                                @endforeach

                                                @else
                                                <div class="section-body">
                                                    <div class="text-center">
                                                        <h3>No hay datos para mostrar informe</h3>
                                                    </div>
                                                </div>
                                                @endif
                                                </tbody>
                                                @if ($permiso->consultar == 1)
                                                <tfoot>
                                                    <tr>
                                                        <th class="th-x text-center" > Nombre Convenio</th>
                                                        <th class="th-x text-center" > No. Convenio</th>
                                                        <th class="th-x text-center" > Entidad</th>
                                                        <th class="th-x text-center" > Fecha Firma</th>
                                                        <th class="th-x text-center" > Fecha Vigencia</th>
                                                        <th class="th-x text-center" > Caracter</th>
                                                        <th class="th-x text-center" > Estado</th>
                                                        <th class="th-x text-center" > Objeto</th>
                                                        <th class="th-x text-center" > Antecedente</th>
                                                        <th class="th-x text-center" > Responsable </th>
                                                        <th class="th-x text-center" > Contacto </th>
                                                        <th class="th-x text-center" > Celular </th>
                                                        <th class="th-x text-center" > Email </th>
                                                        <th class="th-x text-center" > Pendientes </th>
                                                        <th class="th-x text-center" > DSDS </th>

                                                    </tr>
                                                </tfoot>
                                                @endif
                                            </table>
                                            <h5 id="conteoConvenio"></h5>

				                        <input type="hidden" id="tablehtmlConvenios">
            <!-- END CONTENT -->

           </div>

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

	$('#exampleDataConevenios tfoot th').each( function () {
    var titleConvenio = $(this).text();
     $(this).html( '<input type="text" placeholder="B '+titleConvenio+'" />' );
   } );

    var tableDataConvenios=$('#exampleDataConevenios').DataTable({

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
			{ width: "90px", targets: 12 }

		],

    } );


	{{-- tableDataConvenios.columns([3]).every( function () {
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
    tableDataConvenios.columns().every( function () {
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
        tableDataConvenios.draw();
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
@section('addjs')


@endsection()
		{!! Form::close() !!}
	@endsection()

@endsection()
@endsection()
