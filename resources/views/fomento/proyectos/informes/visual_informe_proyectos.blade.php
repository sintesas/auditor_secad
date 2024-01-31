@extends('partials.card_big')

@extends('layout')

@section('title')
	INFORME DE PROYECTOS REALIZADOS
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection()

@section('content')

		@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('informeProyectos') }}
		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="row encabezadoPlanInspeccion">

                    <!-- titulo Formulario -->
                    <div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD</h3>
                        <div>
                            <h4>CONTROL DE PROYECTOS</h4>
                        </div>                        
                   </div>                              
               </div>

			<div class="col-lg-12">	
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
					<thead  style="font-size: 9.5px;">
						<tr >
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
					@if ($permiso->consultar == 1)
					<tbody id="data_table" name="data_table">
						@forelse($proyectos as $item)
						<tr class="line-b">
							<th style="font-size: 9px;" >{{$item->NombreProyecto}}</th>
							<th style="font-size: 9px;">{{$item->FuenteRecurso}}</th>
							<th style="font-size: 9px;">{{$item->TipoProyecto}}</th>
							<th style="font-size: 9px;">{{$item->TipoEmpresa}}</th>
							<th style="font-size: 9px;">{{$item->Valor}}</th>
							<th style="font-size: 9px;">{{$item->Dependencia}}</th>
							<th style="font-size: 9px;">{{$item->EstadoProyecto}}</th>
							<th style="font-size: 9px;">{{$item->Alianza}}</th>
							<th style="font-size: 9px;">{{$item->FechaCreado}}</th>
							<th style="font-size: 9px;">{{$item->FechaEjecucion}}</th>
							<th style="font-size: 9px;">{{$item->EstadoFinanciacion}}</th>
							<th style="font-size: 9px;">{{$item->PendientesAdicionales}}</th>
							<th style="font-size: 9px;">
								<?php 
									$id = $item->IdControlProyecto;
									$data = DB::table('AU_Reg_ControlProyectos_Observaciones')
											->where('IdControlProyecto', $id)
											->orderBy('Created_at', 'desc')
											->first();
	
									if($data != null){
										echo $data->Descripcion;
									}
								?>
							</th>
						</tr>
						@empty
						<tr>
							<th colspan="5" style="text-align:center">
								<h4>No hay datos para mostrar informe</h4>
							</th>
						</tr>
						@endforelse
					</tbody>
					@endif
				</table>
				@if ($permiso->consultar == 1)
				<h5 id="conteo"></h5>
				<input type="hidden" id="tablehtml">

				<a id="pdfAction" href="{{route('informeControlProyectos.create') }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>
				@endif
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
	                if (column[0] != 11 && column[0] != 12) {
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