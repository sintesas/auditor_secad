@extends('partials.card_big')

@extends('layout')

@section('title')
OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD
     	CONTROL ACTUALIZACIONES DE EMPRESAS
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('controlempresa') }}


@endsection()

@section('card-content')

<div class="row encabezadoPlanInspeccion">

    <!-- titulo Formulario -->
    <div class="col-xs-12 text-center">
        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
        <div>
            <h4>CONTROL ACTUALIZACIONES DE EMPRESAS</h4>
        </div>                        
   </div>                              
</div>

<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="width: 40%"><b>Nombre</b></th>
					<th style="width: 30%"><b>Fecha Creción</b></th>
					<th style="width: 30%"><b>Fecha Actualización</b></th>					
				</tr>
			</thead>
			<tbody>
				@foreach ($empresas as $empresa)
				@if ($permiso->consultar == 1)
				<tr>
					<td>{{$empresa->NombreEmpresa}}</td>
					<td>{{$empresa->FechaCreacion}}</td>
					<td>{{$empresa->FechaActualizacion}}</td>
				</tr>
				@endif
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th style="width: 40%"><b>Nombre</b></th>
					<th style="width: 30%"><b>Fecha Creción</b></th>
					<th style="width: 30%"><b>Fecha Actualización</b></th>					
				</tr>
			</tfoot>			
		</table>
	
	</div><!--end .table-responsive -->
</div><!--end .col -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>



@endsection()

@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>

	$(document).ready(function(){
	$('#datatable1 tfoot th').each( function () {
     	   var title = $(this).text();
      	 $(this).html( '<input type="text" placeholder="Busca '+title+'" />' );
    } );


		$('#datatable1').DataTable({

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
							pageSize: 'TABLOID',
							pageMargins:  [ 0, 0, 0, 12 ],
							alignment: 'center',
							FontFamily: 'ARIAL',
							Fontsize: '4'
					}
				],
		 		columnDefs: [
					{ width: "40%", targets: 0 },
					{ width: "30%", targets: 1 },
					{ width: "30%", targets: 2 },
				
				]

		});
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


</script>



@endsection()


@endsection()