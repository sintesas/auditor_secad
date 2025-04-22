@extends('partials.card')

@extends('layout')

@section('title')
	Plan Auditoria
@endsection()

@section('content')

	@section('card-content')
    @section('card-title')
    <div style="display: flex; align-items: center;">
        <span>
            {{ Breadcrumbs::render('auditoriaprogplanauditoria') }}
        </span>

        @if(isset($programaEspecifico))
            <span style="margin-left: 2px; margin-top: 1px;font-size: 12px; color:#b7bcc2">
            - Programa {{ $programaEspecifico->Consecutivo }}
            </span>
        @endif
    </div>
    <!-- Botón de acción -->
    <button type="button" onclick="redirectToCrearPlanAuditoria('{{ $programaEspecifico->id_auditoriaprog }}')" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn">
    <span class="fa fa-plus"></span>
</button>


@endsection()


		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Auditoría</b></th>
							<th><b>Fecha Plan</b></th>
                            <th><b>Fecha Auditoria</b></th>
							<th><b>Plan Auditoría</b></th>
                            <th><b>Informe Auditoría</b></th>
							<th><b>Plan Acción Hallazgos</b></th>
							<th><b>Seguimiento</b></th>
                            <th><b>Informe General</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($actividadesPlan as $programa)
						<tr>
							<td>{{$programa->plan_auditoria}}</td>
							<td>{{$programa->fecha_planauditoria}}</td>
                            <td>{{$programa->fecha_auditoria}}</td>
							<td>
                            <!-- <div class="col-sm-3" style="margin-left: -10px;">
                                {!! Form::open(['route' => ['auditoriaprogplanauditoria.destroy', $programa->id_planauditoria], 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger" style="padding-right: 15px;">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </div> -->

                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('auditoriaprogplanauditoria.edit', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-pencil"></i> 
                                    </button>
								</div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('auditoriaprogplanauditoria.view', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-eye"></i> 
                                    </button>
								</div>
                                <div class="col-sm-3">
                                <button type="button" class="btn btn-primary btn-block editbutton" onclick="informeplanauditoria({{$programa->id_planauditoria}})">
    <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
</button>
							</div>
							</td>
                            <td>
                                @if(!in_array($programa->id_planauditoria, $idPlanauditoriaConDatos))
                                <div class="col-sm-3" style="margin-left:45px;">
                                <button type="button" onclick="window.location.href='{{ route('planinformeauditoriaprog.show', $programa->id_planauditoria) }}'" class="btn btn-info ink-reaction btn-primary">
                                <span class="fa fa-plus"></span>
                                    </button>
                                    </div>
                                    @endif
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanauditoriaConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planinformeauditoriaprog.edit', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-pencil"></i> 
                                    </button>
                                @endif
								</div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanauditoriaConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planinformeauditoriaprog.view', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-eye"></i> 
                                    </button>
                                @endif
                                </div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanauditoriaConDatos))
                                <button type="button" class="btn btn-primary btn-block editbutton" onclick="informeplanauditoriainforme({{$programa->id_planauditoria}})">
    <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
</button>
							    @endif
                        </div>
                            </td>
                            <td>
                            @if(in_array($programa->id_planauditoria, $idPlanauditoriaConDatos))
                            @if(!in_array($programa->id_planauditoria, $idPlanAccionConDatos))
                             <div class="col-sm-3" style="margin-left:43px;">
                                <button type="button" onclick="window.location.href='{{ route('planaccionhallazgos.show', $programa->id_planauditoria) }}'" class="btn btn-info ink-reaction btn-primary">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                            @endif
                            @else
                            <div class="col-sm-3" style="margin-left:43px;">
                                <button type="button" class="btn btn-info ink-reaction btn-primary" disabled>
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                            @endif

                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanAccionConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planaccionhallazgos.edit', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-pencil"></i> 
                                    </button>
                                @endif
								</div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanAccionConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planaccionhallazgos.view', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-eye"></i> 
                                    </button>
                                @endif
                                </div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idPlanAccionConDatos))
                                <button type="button" class="btn btn-primary btn-block editbutton" onclick="informeplanaccion({{$programa->id_planauditoria}})">
    <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
</button>
							    @endif
                        </div>
                            </td>
                            <td>
                            @if(in_array($programa->id_planauditoria, $idPlanAccionConDatos))
                            @if(!in_array($programa->id_planauditoria, $idSeguimientoConDatos))
                            <div class="col-sm-3" style="margin-left:43px;">
                            <button type="button" onclick="window.location.href='{{ route('planauditoriaseguimiento.show', $programa->id_planauditoria) }}'" class="btn btn-info ink-reaction btn-primary">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </div>
                                @endif
                                @else
                            <div class="col-sm-3" style="margin-left:43px;">
                                <button type="button" class="btn btn-info ink-reaction btn-primary" disabled>
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                            @endif
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idSeguimientoConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planauditoriaseguimiento.edit', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-pencil"></i> 
                                    </button>
                                @endif
								</div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idSeguimientoConDatos))
                                    <button type="button" class="btn btn-primary btn-block editbutton" style="display: flex; align-items: center; justify-content: center; " onclick="window.location.href='{{ route('planauditoriaseguimiento.view', $programa->id_planauditoria) }}'">
                                        <i class="fa fa-eye"></i> 
                                    </button>
                                @endif
                                </div>
                                <div class="col-sm-3">
                                @if(in_array($programa->id_planauditoria, $idSeguimientoConDatos))
                                <button type="button" class="btn btn-primary btn-block editbutton" onclick="informeseguimientoplanaccion({{$programa->id_planauditoria}})">
    <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
</button>
                            @endif
							</div>
                            </td>
                            <td>
                            @if(in_array($programa->id_planauditoria, $idSeguimientoConDatos))
                            <div class="col-sm-6">
                            <button type="button" class="btn btn-primary btn-block editbutton" onclick="informe({{$programa->id_planauditoria}})">
                                <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
                            </button>
							</div>
                            @else
                            <div class="col-sm-6">
                            <button type="button" class="btn btn-primary btn-block editbutton" onclick="informe({{$programa->id_planauditoria}})" disabled>
                                <i class="fa fa-file-pdf-o" style="display: flex; justify-content: center; align-items: center; height: 100%;"></i>
                            </button>
							</div>
                            @endif
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>



			</div><!--end .table-responsive -->
		</div><!--end .col -->

        <style>
		#iframe {
    		height: calc(100% - 2px);
		}
        #iframeplanauditoria{
            height: calc(100% - 2px);
        }
        #iframeplanauditoriainforme{
            height: calc(100% - 2px);
        }
        #iframeinformeplanaccion{
            height: calc(100% - 2px);
        }
        #iframeinformesegplanaccionhallazgos{
            height: calc(100% - 2px);
        }
    </style>

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

        <div id="informeplanauditoria" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Reporte Plan Auditoría</h3>
						<span class="close-modal" onclick="document.getElementById('informeplanauditoria').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframeplanauditoria" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('informeplanauditoria').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="informeplanauditoriaDescargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>

        <div id="informeplanauditoriainforme" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Informe Plan Auditoria</h3>
						<span class="close-modal" onclick="document.getElementById('informeplanauditoriainforme').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframeplanauditoriainforme" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('informeplanauditoriainforme').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="informeplanauditoriainformeDescargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>

        <div id="informeplanaccion" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Informe Plan Acción Hallazgos</h3>
						<span class="close-modal" onclick="document.getElementById('informeplanaccion').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframeinformeplanaccion" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('informeplanaccion').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="informeplanaccionDescargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>

        <div id="informesegplanaccionhallazgos" class="modal-box">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-lg1 modal-box-h95">
					<div class="modal-box-header">
						<h3 class="modal-box-title">Informe Seguimiento Plan Acción Hallazgos</h3>
						<span class="close-modal" onclick="document.getElementById('informesegplanaccionhallazgos').style.display='none'"><i class="fa fa-times-circle"></i></span>
					</div>
					<div class="modal-box-body">
						<iframe id="iframeinformesegplanaccionhallazgos" width="100%"></iframe>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" onclick="document.getElementById('informesegplanaccionhallazgos').style.display='none'">Cerrar</button>
        				<button type="button" class="btn btn-primary"><a id="informesegplanaccionhallazgosDescargar" href="" style="text-decoration: none;">Descargar</a></button>
    				</div>
				</div>
			</div>
		</div>


		@endsection()


	@endsection()

@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

<script>
function redirectToCrearPlanAuditoria(id) {
    
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("redirectCrearPlanAuditoria") }}';
    form.style.display = 'none';

    
    var csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);

    
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id_auditoriaprog';
    input.value = id;
    form.appendChild(input);

    
    document.body.appendChild(form);
    form.submit();
}

function redirigirCrearInforme(id) {
    
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("redirigirCrearInforme") }}';
    form.style.display = 'none';

    
    var csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);

    
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id_planauditoria';
    input.value = id;
    form.appendChild(input);

    
    document.body.appendChild(form);
    form.submit();
}
</script>

<script>
	function informe(id) {
		var url = '{{ route("informegeneralauditoriaprograma.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframe').src = url;

		var url_descargar = '{{ route("informegeneralauditoriaprograma.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('larfr212Descargar').href = url_descargar;

		document.getElementById('lafr212Modal').style.display = 'block';
	};

    function informeplanauditoria(id) {
		var url = '{{ route("informeplanauditoriaprograma.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframeplanauditoria').src = url;

		var url_descargar = '{{ route("informeplanauditoriaprograma.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('informeplanauditoriaDescargar').href = url_descargar;

		document.getElementById('informeplanauditoria').style.display = 'block';
	};

    function informeplanauditoriainforme(id) {
		var url = '{{ route("informeplanainformeprograma.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframeplanauditoriainforme').src = url;

		var url_descargar = '{{ route("informeplanainformeprograma.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('informeplanauditoriainformeDescargar').href = url_descargar;

		document.getElementById('informeplanauditoriainforme').style.display = 'block';
	};

    function informeplanaccion(id) {
		var url = '{{ route("informeplanaccionhallazgos.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframeinformeplanaccion').src = url;

		var url_descargar = '{{ route("informeplanaccionhallazgos.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('informeplanaccionDescargar').href = url_descargar;

		document.getElementById('informeplanaccion').style.display = 'block';
	};

    function informeseguimientoplanaccion(id) {
		var url = '{{ route("informesegplanaccionhallazgos.informe.preview", ":id") }}';
      	url = url.replace(':id', id) + '#zoom=100&toolbar=0';
		document.getElementById('iframeinformesegplanaccionhallazgos').src = url;

		var url_descargar = '{{ route("informesegplanaccionhallazgos.informe", ":id") }}'
		url_descargar = url_descargar.replace(':id', id);
		document.getElementById('informesegplanaccionhallazgosDescargar').href = url_descargar;

		document.getElementById('informesegplanaccionhallazgos').style.display = 'block';
	};
</script>

@endsection()
	

@endsection()