@extends('partials.card')

@extends('layout')

@section('title')
	Auditoria Programas
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
		{{ Breadcrumbs::render('auditoriaprograma') }}
		<!-- Begin Modal -->
		<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		{{-- End modal --}}

		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>No.Programa</b></th>
							<th><b>Descripción Programa</b></th>
							<th><b>Certificado Aplicable</b></th>
							<th><b>Organización</b></th>
							<th style="width: 120px;"><b>Auditorías</b></th>
							<th style="width: 120px;"><b>Acciones</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($auditoriaprograma as $programa)
						<tr>
							<td>{{$programa->Consecutivo}}</td>
							<td>{{$programa->descripcion_programa}}</td>
							<td>{{$programa->certificado_aplicable}}</td>
							<td>{{$programa->organizacion}}</td>
							<td>
								
							<div class="col-sm-6">
								<a href="{{route('auditoriaprogplanauditoria.show', $programa->id_auditoriaprog) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-list-ul"></i></div></a>
							</div>
							
						    </td>
							<td>
								<div class="col-sm-6">
								<button class="btn btn-primary edit-modal" 
								data-id_auditoriaprog="{{$programa->id_auditoriaprog}}" 
								data-id_programa="{{$programa->IdPrograma}}" 
								data-consecutivo="{{$programa->Consecutivo}}"
								data-descripcion_programa="{{$programa->descripcion_programa}}"
								data-certificado_aplicable="{{$programa->certificado_aplicable}}"
								data-organizacion="{{$programa->organizacion}}">
								<span class="fa fa-edit"></span>
							</button>
								
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div class="text-center">
				{{-- {!! $atas->links(); !!} --}}
				</div>

				


			</div>
		</div>
		<style>
		#iframe {
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

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.27/dist/sweetalert2.all.min.js"></script>
		{{-- Mostrar mensajes de éxito o error --}}
		@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonText: 'Cerrar'
        });
    </script>
@endif



		{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:135px;">

		<div class="modal-content">


			<div class="card-head style-primary">
				<header>Crear Auditoria</header>
				 <span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
				class="close">x</span> 
			</div>						
					<div class="card">
						<div class="card-body floating-label">
							{!! Form::open(array('route' => 'auditoriaprograma.store')) !!}
							{{ csrf_field()}}
							<div class="row">
							<div class="col-lg-6">	
								<div class="form-group floating-label">
									{{ Form::select('IdPrograma', $Empresas->pluck('Consecutivo', 'IdPrograma')->prepend('', null), null, ['class' => 'form-control', 'required' => '', 'id' => 'IdPrograma']) }}
									{{ Form::label('IdPrograma', 'No.Programa') }}
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">										
									{{ Form::text('certificado_aplicable', null, ['class' => 'form-control', 'required' => '', 'id' => 'Tipo', 'readonly']) }}
									{{ Form::label('certificado_aplicable', 'Certificado Aplicable') }}
								</div>
							</div>

							</div>							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">											
									{{ Form::text('descripcion_programa', null, ['class' => 'form-control', 'required' => '', 'id' => 'Proyecto', 'readonly']) }}
									{{ Form::label('descripcion_programa', 'Descripción Programa') }}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">										
										{{ Form::text('organizacion', null, ['class' => 'form-control', 'required' => '', 'id' => 'NombreEmpresa', 'readonly']) }}
										{{ Form::label('organizacion', 'Organización') }}
									</div>
								</div>	
							</div>												
							
							<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
								</div>
								<div class="col-sm-6">
									<button type="button" onclick="window.location='{{ route("auditoriaprograma.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
								</div>
							</div>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
		</div>
	</div>


	<script type="text/javascript">
				$('select').select2();
	</script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#IdPrograma').select2();

        $('#IdPrograma').on('change', function() {
            var selectedId = this.value;
            var tipos = @json($programasArray);

            console.log('Selected ID:', selectedId);
            console.log('Tipos:', tipos);

            var tipoField = document.getElementById('Tipo');
            tipoField.value = tipos[selectedId] || '';
            tipoField.dispatchEvent(new Event('change'));
        });

		$('#IdPrograma').on('change', function() {
            var selectedId = this.value;
            var tipos = @json($programasEmpresaArray);

            var tipoField = document.getElementById('NombreEmpresa');
            tipoField.value = tipos[selectedId] || '';
            tipoField.dispatchEvent(new Event('change'));
        });

		$('#IdPrograma').on('change', function() {
            var selectedId = this.value;
            var tipos = @json($programasDescripcionArray);

            var tipoField = document.getElementById('Proyecto');
            tipoField.value = tipos[selectedId] || '';
            tipoField.dispatchEvent(new Event('change'));
			
        });
    });
</script>

{{-- END CREATEMODAL --}}

{{-- BEGIN EDIT MODAL --}}
<div id="editModal" class="modal" style="padding-top:135px;">
    <div class="modal-content">
        <div class="card-head style-primary">
            <header>Edición de Auditoría</header>
        </div>    
        <div class="card">
            <div class="card-body floating-label">
                <form id="editForm" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    {!! Form::hidden('id_auditoriaprog', null, ['id' => 'id_auditoriaprog']) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group floating-label">
                            {{ Form::select('IdPrograma', $Empresas->pluck('Consecutivo', 'IdPrograma')->prepend('', null), null, ['class' => 'form-control', 'required' => '', 'id' => 'IdProgramaEdit']) }}
                                {{ Form::label('IdPrograma', 'No.Programa') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::text('certificado_aplicable', null, ['class' => 'form-control', 'required' => '', 'id' => 'TipoEdit', 'readonly']) }}
                                {{ Form::label('certificado_aplicable', 'Certificado Aplicable') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::text('descripcion_programa', null, ['class' => 'form-control', 'required' => '', 'id' => 'ProyectoEdit', 'readonly']) }}
                                {{ Form::label('descripcion_programa', 'Descripción Programa') }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::text('organizacion', null, ['class' => 'form-control', 'required' => '', 'id' => 'NombreEmpresaEdit', 'readonly']) }}
                                {{ Form::label('organizacion', 'Organización') }}
                            </div>
                        </div>    
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info btn-block">Editar</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" data-dismiss="modal" class="btn btn-danger btn-block">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#IdProgramaEdit').select2();

    $(document).on('click', '.edit-modal', function() {
        var id_auditoriaprog = $(this).data('id_auditoriaprog');
        var id_programa = $(this).data('id_programa');
        var descripcion_programa = $(this).data('descripcion_programa');
        var certificado_aplicable = $(this).data('certificado_aplicable');
        var organizacion = $(this).data('organizacion');

        
        $('#id_auditoriaprog').val(id_auditoriaprog);
        $('#IdProgramaEdit').val(id_programa).trigger('change');

        
        $('#editForm').attr('action', '{{ route("auditoriaprograma.update", ":id") }}'.replace(':id', id_auditoriaprog));

       
        $('#ProyectoEdit').val(descripcion_programa);
        $('#TipoEdit').val(certificado_aplicable);
        $('#NombreEmpresaEdit').val(organizacion);

        
        $('#editModal').modal('show');
    });

    
    $('#editModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });

	  


   
    $('#IdProgramaEdit').on('change', function() {
        var selectedId = this.value;

        
        var tipos = @json($programasArray);
        var empresaArray = @json($programasEmpresaArray);
        var descripcionArray = @json($programasDescripcionArray);

		$('#TipoEdit').val(tipos[selectedId] || '');
        $('#NombreEmpresaEdit').val(empresaArray[selectedId] || '');
        $('#ProyectoEdit').val(descripcionArray[selectedId] || '');

        $('#TipoEdit').trigger('change');
        $('#NombreEmpresaEdit').trigger('change');
        $('#ProyectoEdit').trigger('change');
    });
});
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
</script>
{{-- END EDIT MODAL --}}


		@endsection()
	@endsection()
@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>



@endsection()
	

@endsection()