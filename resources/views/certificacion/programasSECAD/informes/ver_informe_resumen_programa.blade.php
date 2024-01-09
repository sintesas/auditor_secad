@extends('partials.card_big')

@extends('layout')

@section('title')
	Programas - Informe Resumen Programa 
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <h4>CONTROL DE PROGRAMAS</h4>
                        </div>                        
                   </div>                              
               </div>

			<div class="col-lg-12">	
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
					<thead  style="font-size: 9.5px;">
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
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Producto</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Avance%</b></th>
							{{-- <th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha Inicio</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha Termino</b></th> --}}
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Jefe Programa</b></th>
							<th style="width: 51.6px;padding-left: 0px; padding-right: 0px; text-align: center;"><b>Recursos</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
						 @foreach ($programa as $id=> $programas)
						<tr>
							<td style="font-size: 9px;">{{$programas[0]->Consecutivo}}</td>
							<td style="font-size: 9px;">{{$programas[0]->Anio}}</td>
							<td style="font-size: 8px;">{{$programas[0]->Tipo}}</td>
							<td style="font-size: 9px;">{{$programas[0]->Equipo}}</td>
							<td style="font-size: 9px;">{{$programas[0]->NombreUnidad}}</td>
							<td style="font-size: 9px;">{{$programas[0]->NombreEmpresa}}</td>
							<td style="font-size: 9px;">{{$programas[0]->Proyecto}}</td>
							<td><p align="justify" style="margin: 0;">{{$programas[0]->Alcance}}</p></td>
							<td style="font-size: 8px;">{{$programas[0]->Estado}}</td>
							<td style="font-size: 9px;">{{$programas[0]->NombreProductoServicio}}</td>
							<td style="font-size: 9px;">{{number_format($programas[0]->PorcentajeAvance,2)}}</td>
							<td style="font-size: 8px;">{{$programas[0]->Nombres.' '.$programas[0]->Apellidos}}</td>
							<td style="font-size: 8px;">{{$programas[0]->NombresSuplente.' '.$programas[0]->ApellidosSuplente}}</td>
						</tr>
						@endforeach 
					</tbody>
				</table>
				<h5 id="conteo"></h5>
				<input type="hidden" id="tablehtml">

				<a id="pdfAction" href="{{route('informeresumenprograma.create') }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
				
				{{--route('informeresumenprograma.create') --}}

				</div><!--end .table-responsive -->
			</div><!--end .col -->
		</div>
			 

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
	                        var cantidad = ($('#datatable1').rowCount());
	                        savedataPDf(pdfexport,cantidad);
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
	    var cantidad = ($('#datatable1').rowCount());
		savedataPDf(pdfexport,cantidad);
	});

	$.fn.rowCount = function() {
	    return $('tr', $(this).find('tbody')).length;
	};


	function savedataPDf(pdfexport,cantidad){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({

    		type: 'post',
    		url: 'pdftodb',
    		data: {
    			'table' : pdfexport,
    			'cantidad':cantidad,
    		},
    		success: function(data){
    			// alert("Saved to db");
    		}
    	});
	}

</script>



@endsection()|
	

@endsection()