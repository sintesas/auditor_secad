@extends('partials.card_big')

@extends('layout')

@section('title')
	OFICINA CERTIFICACIÓN AERONAÚTICA DE LA DEFENSA - CONTROL PROGRAMAS SECAD
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('programa') }}
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
                            <h4>CONTROL DE OBSERVACIONES</h4>
                        </div>                        
                   </div>                              
               </div>

		<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%; width:100%;" >
			<div class="table-responsive">
								<table id="example" 
				class="table table-striped table-hover " style="font-size: 10px; width:100%;" >

					<thead  style="font-size: 11px;">
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>No Control </b></th>
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
						 @foreach ($programa as $programas)
						<tr>
							<td style="font-size: 9px;">{{$programas->Consecutivo}}</td>
							<td style="font-size: 9px;">{{$programas->Anio}}</td>
							<td style="font-size: 8px;">{{$programas->Tipo}}</td>
							<td style="font-size: 9px;">{{$programas->Equipo}}</td>
							<td style="font-size: 9px;">{{$programas->NombreUnidad}}</td>
							<td style="font-size: 9px;">{{$programas->NombreEmpresa}}</td>
							<td style="font-size: 9px;">{{$programas->Proyecto}}</td>
							<td style="font-size: 8px;">{{$programas->Estado}}</td>
							<td style="font-size: 8px;">{{$programas->Observacion}}</td>
							<td style="font-size: 8px;">{{round($programas->PorcentajeAvance,2)}}</td>
							<td style="font-size: 8px;">{{$programas->Jefe}}</td>
							<td style="font-size: 8px;">{{$programas->ApellidosSuplente}} {{$programas->NombresSuplente}}</td>
						</tr>
						@endforeach 
					</tbody>
					<tfoot  style="font-size: 10px;">
						<tr>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>No Control</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Año</b></th>
							<th style="width: 49.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Tipo</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Equipo</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Unidad</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Proyecto</b></th>
							<th style="width: 50.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Estado</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: justify;"><b>Última Observación</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Avance</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Jefe de Programa</b></th>
						</tr>
					</tfoot>
				</table>
				<h5 id="conteo"></h5>
				<input type="hidden" id="tablehtml">

				<a id="pdfAction" href="{{route('informeControlObservaciones.create') }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
				
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
		
	    $('#example').DataTable({
	    	paging: false,
		 	info:false,
		 	ordering: false,
	        initComplete: function () {
	            this.api().columns().every( function () {
	                var column = this;
	                if (true) {
		                var select = $('<br><select style="color:#000; width:90%;"><option value=""></option></select>')
	                    .appendTo( $(column.header()) )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val(),
	                            filtros.push($(this).val()));

	                        column.search( val ? '^'+val+'$' : '', true, false ).draw();
	                        var pdfexport = $('#data_table').html().trim();
	                        var cantidad = ($('#datatable1').rowCount());
	                    } );
		 
		                column.data().unique().sort().each( function ( d, j ) {
		                    select.append( '<option value="'+d+'">'+d+'</option>' )
		                	});
	            	}
	           });	    		
	        }


	    });
})


</script>


		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>


<script>
	var filtros = [];
	var pdfexport;
	$(document).ready(function() {
		
	    $('#datatable1').DataTable({
	    	paging: false,
		 	info:false,
		 	ordering: false,
	        initComplete: function () {
	            this.api().columns().every( function () {
	                var column = this;
	                if (column[0] != 6 && column[0] != 7) {
		                var select = $('<br><select style="color:#000; width:90%;"><option value=""></option></select>')
	                    .appendTo( $(column.header()) )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val(),
	                            filtros.push($(this).val()));

	                        column.search( val ? '^'+val+'$' : '', true, false ).draw();
	                        var pdfexport = $('#data_table').html().trim();
	                        savedataPDf(pdfexport);
	                        console.log($('#datatable1').rowCount());
	                        $('#conteo').html('Cantidad de Programas ' + $('#datatable1').rowCount());
	                    } );
		 
		                column.data().unique().sort().each( function ( d, j ) {
		                    select.append( '<option value="'+d+'">'+d+'</option>' )
		                	});
	            	}
	           });	    		
	        }


	    });

	 //    var table = $('#datatable1').DataTable();
 
		if ( ! $('#datatable1').rowCount() ) {
			$('#conteo').html('0');
		}
		else
		{
			console.log($('#datatable1').rowCount());
			$('#conteo').html('Cantidad de Programas ' + $('#datatable1').rowCount());
		}

	    // $('#datatable1').tablesorter({sortList: [[7,1], [0,1]]});

	    //ajax setup
	});



	$(window).bind("load", function() {
	   var pdfexport = $('#data_table').html().trim();
		savedataPDf(pdfexport);
	});

	$.fn.rowCount = function() {
	    return $('tr', $(this).find('tbody')).length;
	};


	function savedataPDf(pdfexport){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({

    		type: 'post',
    		url: 'pdftodb',
    		data: {
    			'table' : pdfexport
    		},
    		success: function(data){
    			// alert("Saved to db");
    		}
    	});
	}

</script>



@endsection()|
	

@endsection()