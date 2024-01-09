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
                        {{-- <h3>SECCION DE CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3> --}}
                        <div>
                            <h4>Observaciones del Programa</h4>
                            <h5>{{$programa->Consecutivo}}</h5>
                            <h5>{{$programa->Proyecto}}</h5>
                        </div>                        
                   </div>                              
               </div>

			<div class="col-lg-12">	
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover" style="font-size: 10px;">
					<thead  style="font-size: 9.5px;">
						<tr>
							<th style="width:10%; padding-left: 0px; padding-right: 0px; text-align: center;"><b>Fecha</b></th>
							<th style="width: 90%; padding-left: 0px; padding-right: 0px; text-align: center;"><b>Observacion</b></th>
						</tr>
					</thead>
					
					<tbody id="data_table" name="data_table">
						@foreach ($observaciones as $observacion)
						<tr>
							<td style="font-size: 8px;">{{$observacion->Fecha}}</td>
							<td style="font-size: 9px;">{{$observacion->Observacion}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
				<input type="hidden" id="tablehtml">

				<a id="pdfAction" href="{{route('obsercavionesProgramafr212.edit', $programa->IdPrograma) }}"  style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>

				{{-- {{route('informeresumenprograma.create') }} --}}

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
		
	    $('#datatable1').DataTable();
	});



	$(window).bind("load", function() {
	   var pdfexport = $('#data_table').html().trim();
		savedataPDf(pdfexport);
	});




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