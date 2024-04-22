@extends('partials.card')

@extends('layout')

@section('title')
	Programas - Informe LA-FR 212
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

		<div class="col-lg-12 text-center" >
			 <div class="row encabezadoPlanInspeccion">
                            
				<div class="col-xs-12 text-center">
                        <h3>OFICINA CERTIFICACION AERONAUTICA DE LA DEFENSA - SECAD</h3>
                        <div> 
                            <h4>SEGUIMIENTO PROGRAMAS </h4>
                        </div>                        
				</div>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Consecutivo</b></th>
							<th><b>Proyecto</b></th>
							{{-- @role('jefe-area-certificacion|administrador') --}}
							<th><b>Observaciones</b></th>

							{{-- @endrole --}}

							<th style="width: 120px;" colspan = "1" class="text-center"><b>Ver Informe</b></th>
							<th style="width: 100px;" colspan = "1" class="text-center"><b>Descargar Evidencias</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($programa as $programas)
						@if ($permiso->consultar == 1)
						<tr>
							<td>{{$programas->Consecutivo}}</td>
							<td>{{$programas->Proyecto}}</td>
							{{-- @role('jefe-area-certificacion|administrador') --}}
							<td>
								<div class="col-sm-6">

									<a href="{{route('obsercavionesfr212.show', $programas->IdPrograma) }}" class="btn btn-primary btn-block editbutton"><div class="gui-icon"><i class="fa fa-search"></i></div></a>

								</div>
							</td>
							{{-- @endrole --}}
							<td>
								{{-- <div class="col-sm-6">

									{!! Form::open(['route' => ['programa.destroy', $programa->IdPrograma], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div> --}}


								{{-- <div class="col-sm-6">
									<a href="{{route('informelafr212.show', $programas->IdPrograma) }}" class="btn btn-danger btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
								</div> --}}

								<div class="col-sm-6">
									<button type="button" class="btn btn-primary btn-block editbutton" onclick="informe({{$programas->IdPrograma}})"><div class="gui-icon"><i class="fa fa-search"></i></div></button>

								</div>
								

							</td>
							<td style="padding-left: 30px;">
    <div class="col-sm-6">
        <form id="copyFolderForm" action="{{ route('descargar-carpeta-directa', ['consecutivo' => $programas->Consecutivo]) }}" method="POST">
            @csrf
            <button type="button" class="btn btn-primary btn-block editbutton" onclick="descargarCarpeta('{{ $programas->Consecutivo }}')">
                <div class="gui-icon"><i class="fa fa-download"></i></div>
            </button>
        </form>
    </div>
</td>


							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->

		<div id="lafr212Modal" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Informe</h3>
						<span class="close-modal" onclick="document.getElementById('lafr212Modal').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframe" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('lafr212Modal').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="larfr212Descargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>

		@endsection()


	@endsection()

	<style>
		#iframe {
    		height: calc(100% - 2px);
		}
    </style>

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
     function descargarCarpeta(consecutivo) {
        // Puedes usar Ajax para manejar la respuesta del controlador
        $.ajax({
            url: `/descargar-carpeta-zip/${consecutivo}`,
            type: 'GET',
            success: function(response) {
                // Verificar si hay un error en la respuesta
                if (response.status == false) {
                    Swal.fire({
                                        icon: 'error',
                                        title: 'INFO',
                                        html: response.mensaje,
                                        confirmButtonText: 'Aceptar',
                                        confirmButtonColor: "#3085d6"
                                    });
                } else {
                    // Lógica para manejar la respuesta exitosa
                    // Por ejemplo, podrías redirigir o realizar otras acciones
					window.location.href = `/descargar-carpeta-zip/${consecutivo}`;
                }
            },
            error: function(error) {
                console.error('Error en la solicitud Ajax:', error);
            }
        });
    }
	
</script>
<script>
	$(document).ready(function(){
		$('#example').DataTable({
			"order": [[ 0, "desc" ]]
		});
	});
</script>
<script>
	function informe(id) {
		var url = '{{ route("lafr212.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframe').src = url;

		var url_descargar = '{{ route("lafr212.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('larfr212Descargar').href = url_descargar;

		document.getElementById('lafr212Modal').style.display = 'block';
	};
</script>

<script>
	function informe(id) {
		var url = '{{ route("lafr212.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframe').src = url;
		var url_descargar = '{{ route("lafr212.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('larfr212Descargar').href = url_descargar;
		document.getElementById('lafr212Modal').style.display = 'block';
	};
</script>

@endsection()
	

@endsection()