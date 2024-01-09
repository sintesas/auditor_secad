@extends('partials.card')

@extends('layout')

@section('title')
	Asignar Bases de Certificación
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


@endsection()

@section('javascript')
<script language="javascript">

				function check(a) {
  					document.getElementById(a).checked = true;
					  alert('Si entro mi pets');
				}

				function uncheck(a) {
					document.getElementById(a).checked = false;
				alert('llego al alerta un check');
				}
</script>
@endsection()

@section('content')




	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'basesCertiPrograma.store', 'files' =>true,'id'=>'formenvio')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_personal')}} --}}
			Asignar Bases de Certificación - Programa
		@endsection()

		@section('card-content')







		 <div class="card-body floating-label">

            <div class="card">

	           <div class="card-body">
					<div class="row">


						<div class="col-sm-12">
							<div class="form-group">
								<select class="form-control" id="bases" name="bases">
									<option value="">Seleccionar</option>
									@foreach($basesCertificacion as $baseCertificacion)
									<option value="{{$baseCertificacion->IdBaseCertificacion}}">{{$baseCertificacion->Nombre}} | {{$baseCertificacion->Referencia}}</option>
									@endforeach
								</select>
								<label for="bases">Bases de certificación</label>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<input type="hidden" name="basecerti" id="basecerti" value="{{$cadena}}">
							<button type="button" class="btn btn-primary" style="margin-bottom:2rem;" id="add_definicion">Agregar</button>
						</div>
					</div>

					<div class="col-sm-12">
						<ul id="list_basecerti">
						 @php($cant = count($normas))
							 @if($cant>0)
							 @php($i = 1)
								@foreach($normas as $norma)
										<li id="Definiciones_{{$i}}"><pre>{{$norma->Nombre}} | {{$norma->Referencia}}</pre><button type="button" class="close remove_item" onclick="list_remove('Definiciones_{{$i}}')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>
										@php($i++)
								@endforeach
							@else
								Aún no hay bases de certificación.
							@endif
						</ul>
					</div>
				</div>



					<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$IdPrograma}}">

            </div>
		</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" id="load" class="btn btn-info btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando">Guardar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ url("programa") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
        </div>
		{!! Form::close() !!}

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

	$('#load').on('click', function()
	{
	    var $this = $(this);
	   	$('#formenvio').submit();
	    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Cargando...';
	    if ($(this).html() !== loadingText) {
	      $this.data('original-text', $(this).html());
	      $this.html(loadingText);
	      $this.attr('disabled', 'disabled');
	    }
	    setTimeout(function() {
	      $this.html($this.data('original-text'));
	      $this.removeAttr('disabled');
	    }, (180*1000)); //3 minutos
	  });
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
      	emptyTable: "No se han encontrado Datos",
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
             'copy'
		],
		 columnDefs: [
			{ width: "5%", targets: 0 },
			{ width: "95%", targets: 1 }
		],

    } );
/*
    $(document).ready(function(){
					$('#example').DataTable({
						dom: 'Bfxrtip',
						sPaginationType: "full_numbers",
			    		bProcessing: true,
						bAutoWidth: false,
						buttons: [
			             'excel',
			             ]
						});
				});*/

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



				//AGREGAR BASE DE CERTIFICACIÓ

				$('#add_definicion').on('click', function(){
					var titulo = $('select[id=bases]');
					var texto = $('#bases option[value='+titulo.val()+']').html();

					var cadena = $('#basecerti').val();

					if (titulo.val() == '') {
						var html = '<div class="alert alert-warning alert-dismissible show" role="alert" id="alert_deficinicion"><strong>Cuidado!</strong> Faltan campos por llenar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						$('#add_definicion').after(html);

					} else {
						if (cadena == '')
						{
								cadena = [];
						}
						else {
								cadena = JSON.parse(cadena);
						}

						var dato = {nn: cadena.length+1 ,id:titulo.val(), texto:texto};
						cadena.push(dato);
						$('#basecerti').val(JSON.stringify(cadena));
						var html = '';
						$.each(cadena, function(index, value){

							var tx = value['texto'];
							var id = value['nn'];
								var item = '<li id="Definiciones_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
								html = html+item;
						})
						$('#list_basecerti').html(html);
						titulo.val('');
						$('#alert_deficinicion').remove();
					}
				})
				function list_remove(valor) {
					var ini = valor.split('_');
					var item_remove = parseInt(ini[1]);
					var old_list = $('#basecerti').val();
					var new_list = [];
					var cadena = JSON.parse(old_list);
					var i = 1;
					var html = '';
					$.each(cadena, function(index, value){

						if(parseInt(value['nn']) == item_remove){
							console.log('Removido item: '+item_remove+' '+value['texto']);
						}else{
							var tx = value['texto'];
							var tt = value['id'];
							var id = i;
							var item = '<li id="Definiciones_'+id+'"><pre>'+tx+'</pre><button type="button" class="close remove_item" onclick="list_remove(\'Definiciones_'+id+'\')" aria-label="Close"><span aria-hidden="true">&times;</span></button></li>';
							html = html+item;
							i++;
							var dato = {nn:id ,id:tt, texto:tx};
							new_list.push(dato);
						}
					})
					$('#basecerti').val(JSON.stringify(new_list));
					$('#list_basecerti').html(html);

					if ($('#list_basecerti li').length == 0) {
						$('#list_basecerti').html('Aún no hay bases de certificacion.');
					}
				}

</script>



		@endsection()

	@endsection()

@endsection()
