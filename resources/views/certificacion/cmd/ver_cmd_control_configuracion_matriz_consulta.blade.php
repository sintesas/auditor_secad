@extends('partials.card')

@extends('layout')

@section('title')
	Ver Niveles
@endsection()

@section('content')

	@section('addcss')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	@endsection()

	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Niveles Control Configuración
		@endsection()

		@section('card-content')
		<style media="screen">
			.caja_interior{
				padding:2rem;
				border: solid 1px #2a2a2a2a;
				margin-bottom: 1rem;
				margin-top: -1rem;
			}
			.link_pre {
				cursor: pointer;
			}
			.link_pre:hover{
				font-weight: 900;
				background-color: #dcdcdc;
			}
			.detalles{
				margin-bottom: 1rem;
				border: solid 1px #2a2a2a2a;
			}
		</style>
			<h4><strong>Programa:</strong> {{$programa->Consecutivo}} - {{$programa->Proyecto}}</h4>


<div class="card-body floating-label">
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="cadena" id="cadena" value="{{$cadena}}">
			<h4>Lista de niveles</h4>
			<ul id="lista">

			</ul>
		</div>
	</div>
	</div>

	<div class="col-lg-12">
		<div class="table-responsive">
			<table id="datatable2" class="table table-striped table-hover" style="display: none" >
				<thead>
					<tr>
						<th><b>ID</b></th>
						<th><b>Titulo</b></th>
						<th><b>Nivel</b></th>
						<th><b>Padre</b></th>
						<th><b>Elemento</b></th>
						<th><b>Parte</b></th>
						<th><b>Cantidad</b></th>
						<th><b>Ata</b></th>
						<th><b>Versión</b></th>
						<th><b>Fecha</b></th>
					</tr>
				</thead>
				<tbody>
					@php($lista = json_decode($cadena))
					@php($i = 1)
					@foreach($lista as $nivel)
					<tr>
						<td>{{$i}}</td>
						<td>{{$nivel->titulo}}</td>
						<td>{{$nivel->nivel}}</td>
						<td>{{$nivel->nombre_padre}}</td>
						<td>{{$nivel->elemento}}</td>
						<td>{{$nivel->parte}}</td>
						<td>{{$nivel->cantidad}}</td>
						<td>{{$nivel->ata}}</td>
						<td>{{$nivel->version}}</td>
						<td>{{$nivel->fecha}}</td>
						@php($i++)
					</tr>
					@endforeach
				</tbody>
			</table>
			<style media="screen">
			#datatable2_info, #datatable2_paginate, #datatable2_filter {
				display: none;
			}
			</style>

		</div><!--end .table-responsive -->

	</div>

		<div class="col-sm-12" style="padding-top:1rem;">
			<a href="{{route('cmdProgramasConsultar.index') }}" class="btn btn-danger">Volver a lista de programas</a>
		</div>

		<script type="text/javascript">

		$(document).on('ready', function(){
			cargar_lista();
		})


		function cargar_lista(){

			var cadena = $('#cadena');
			if (cadena.val() == '')
			{
					cadena = [];
			}
			else {
					cadena = JSON.parse(cadena.val());
			}
			$('#lista li').remove();

			for(var i = 1;i<=7;i++){
				$.each(cadena, function(index, value){
					var tx = value['titulo'];
					var nn = value['nn'];
					var nv = value['nivel'];
					var id = value['id'];
					var pd = value['padre'];
					if(parseInt(nv)==i){
						var item = '<li id="nivel_'+id+'" nivel="'+nv+'"><pre onclick="$(\'#area_'+id+'\').toggle();" class="link_pre">'+tx+'</pre><div id="area_'+id+'" style="display:none;" class="caja_interior"><div class="row"><div class="col-sm-6 detalles"><b>Elemento:</b><br>'+value['elemento']+'<br></div><div class="col-sm-6 detalles"><b>Parte Número:</b><br>'+value['parte']+'<br></div><div class="col-sm-6 detalles"><b>Cantidad:</b><br>'+value['cantidad']+'<br></div><div class="col-sm-6 detalles"><b>ATA:</b><br>'+value['ata']+'<br></div><div class="col-sm-6 detalles"><b>Versión:</b><br>'+value['version']+'<br></div><div class="col-sm-6 detalles"><b>Fecha:</b><br>'+value['fecha']+'<br></div></div><h4>Subniveles:</h4><ul id="list_'+id+'"></ul></div></li>';
						if(i==1){
							$('#lista').append(item);
						}
						else{
							if($('#list_'+pd).length > 0){
								$('#list_'+pd).append(item);
							}
						}
					}

				})
			}

		}
		</script>
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
			$('#datatable2').DataTable( {
				dom: 'Bfxrtip',
				sPaginationType: "full_numbers",
					bProcessing: true,
				bAutoWidth: false,
				buttons: [
							 'excel',
							 ]
			} );
	} );
		</script>

		@endsection()


	@endsection()

@section('addjs')

@endsection()


@endsection()
