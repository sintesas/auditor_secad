@extends('partials.card')

@extends('layout')

<link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet">
<style>
	.multiselect-container>li>a>label {
		padding: 4px 20px 3px 20px;
	}
</style>

@section('title')
Crear Empresa
@endsection()


@section('content')

	@section('card-title')

	{{ Breadcrumbs::render('crear_empresa') }}

	@endsection()

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'empresa.store')) !!}

			{{ csrf_field()}}

		@endsection
		
		@section('card-content')


			<div class="card-body floating-label">
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="nombre" name="NombreEmpresa" required>
							<label for="nombre">Nombre de la Organización (Razón Social)</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="SiglasNombreClave" name="SiglasNombreClave" required>
							<label for="SiglasNombreClave">Siglas Organización</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="nit" name="Nit" required>
							<label for="nit">NIT</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="Email" required>
							<label for="email">Email</label>
						</div>
					</div>
				</div>
				<div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="IdPais_listasdinamicas">País:</label>
                    {{ Form::select('IdPais_listasdinamicas', $paises->pluck('Pais', 'IdPais'), null, ['class' => 'form-control', 'id' => 'IdPais_listasdinamicas']) }}
                    @error('IdPais_listasdinamicas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="IdDepartamento_listasdinamicas">Departamento:</label>
                    {{ Form::select('IdDepartamento_listasdinamicas', [], null, ['class' => 'form-control', 'id' => 'IdDepartamento_listasdinamicas', 'disabled' => 'disabled']) }}
                    @error('IdDepartamento_listasdinamicas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="IdCiudad_listasdinamicas">Ciudad:</label>
                    {{ Form::select('IdCiudad_listasdinamicas', [], null, ['class' => 'form-control', 'id' => 'IdCiudad_listasdinamicas', 'disabled' => 'disabled']) }}
                    @error('IdCiudad_listasdinamicas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="telefax" name="Telefono" required>
							<label for="telefax">Telefono</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Pagina_web" name="PaginaWeb" required>
							<label for="Pagina_web">Pagina Web</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
							<select id="TipoOrganizacion" name="TipoOrganizacion" class="form-control" required="" aria-required="true">
								<option value="">&nbsp;</option>
								<option value="Estado">Estado</option>
								<option value="Academia">Academia</option>
								<option value="Industria">Industria</option>
								<option value="FAC">FAC</option>
							</select>
							<label for="TipoOrganizacion">Tipo de organización</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="direccion" name="Direccion" required>
							<label for="direccion">Dirección</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdEstadoEmpresa', $estadoEmpresa->pluck('Descripcion' , 'IdEstadoEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEstadoEmpresa']) }}
							<label for="IdEstadoEmpresa">Estado</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdDominioIndustrial', $dominioIndustrial->pluck('Descripcion' , 'IdDominioIndustrial'), null, ['class' => 'form-control', 'id' => 'IdDominioIndustrial']) }}
							<label for="IdDominioIndustrial">Dominio Industrial</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="Pagina_web" name="NombreCertificaInfo">
							<label for="Pagina_web">Representante Legal</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="FechaActualizacion" name="FechaActualizacion" value="{{$ldate}}" readonly>
							<label for="FechaActualizacion">Fecha Actualización</label>
						</div>
					</div>
				</div>

				<div class="row">
				<div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::select('TipoDocumento_listasdinamicas', $tipodoc->pluck('TipoDocumento', 'IdTipoDocumento'), null, ['class' => 'form-control', 'id' => 'TipoDocumento_listasdinamicas']) }}
                                <label for="TipoDocumento_listasdinamicas">Tipo Documento Representante Legal</label>
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="NumeroDocumento" name="NumeroDocumento" >
                                <label for="NumeroDocumento">Número de Documento Representante Legal</label>
                            </div>
                        </div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Alcance" name="Alcance" rows="3"> </textarea>
							<label for="Alcance">Alcance</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"> </textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdAreasCooperacionIndustrial', $areasCooperacionIndustrial->pluck('Descripcion' , 'IdAreasCooperacionIndustrial'), null, ['placeholder' => '', 'onchange' => 'return subAreas(this.value);','class' => 'form-control', 'id' => 'IdAreasCooperacionIndustrial']) }}
							<label for="IdAreasCooperacionIndustrial">Áreas claves de cooperación industrial en la cadena de suministros</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdSubAreasCooperacionIndustrial', $subAreasCooperacionIndustrial->where('IdAreasCooperacionIndustrial', '=', '')->pluck('Descripcion' , 'IdSubAreasCooperacionIndustrial'), null, ['placeholder' => '', 'onchange' => 'return subArea(this.value);','class' => 'form-control', 'id' => 'IdSubAreasCooperacionIndustrial']) }}
							<label for="IdSubAreasCooperacionIndustrial">Subáreas</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label for="IdActividadEconomica">Clasificación de Actividades Económicas - CIIU</label>
						<div class="form-group">
							{{ Form::select('IdActividadEconomica', $actividadesEconomicas, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdActividadEconomica', 'name' => 'IdActividadEconomica[]']) }}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-2 control-label">Actividades de la empresa</label>
							<div class="col-sm-10">
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('DisenoDesarrollo', '1') !!}<span>Diseño</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('Fabricante', '1') !!}<span>Producción</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('PrestacionServicios', '1') !!}<span>Servicios</span>
								</label>

								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('MantenimientoAeronaves', '1') !!}<span>Mantenimiento de Aeronaves</span>
								</label>

							</div><!--end .col -->
						</div><!--end .form-group -->
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="checkbox-inline checkbox-styled">
								{!! Form::checkbox('autorizacion', '1'); !!}
								<span><b>Autorización:</b> La empresa autoriza a la seccion de certificacion Aeronautica de la defensa SECAD de la fuerza aerea Colombiana para transmitir la informacion contenida en este formulario FRE a travez del catalogo de industria y Aeroespacial Colombiano (CIACEC)</span>
							</label>
						</div>
					</div>
				</div>

				
				<br>
				<div class="row">
					<div class="col-sm-6">	
						{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
					</div>	
					<div class="col-sm-6">	
						{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}	
					</div>										
				</div>
			</div>	
			

			{!! Form::close() !!}

							
		@endsection
		@section('addjs')
		<script src="{{asset('js/soloNumeros.js')}}"></script>
		<script src="{{asset('js/bootstrap-multiselect.js')}}"></script>
		<script src="{{asset('js/select2.full.js')}}"></script>
		<script>

			function subAreas(value) {
			var url = '{{ url("searchSubArea", "id") }}';
			url = url.replace('id', value);
				$.ajax({

					type: 'get',
					url: url,

					success: function (result) {
						var html = '<option value=""></option>';
						for (data in result) {
							for (index in data) {
								for (item in result[data[index]]) {
									html += '<option value="' + result[data[index]].IdSubAreasCooperacionIndustrial + '">' + result[data[index]].Descripcion + '</option>';
									break;
								}
							}
						}
						$("#IdSubAreasCooperacionIndustrial").html(html);
					}

				});
			}

			setTimeout(function(){
				$("#IdActividadEconomica").select2( {
					'placeholder': 'resolve',
					'width': null,
					'containerCssClass': ':all:'
				} );

				/*var removeOption = $('#IdActividadEconomica').val();
				$('option[value="'+ removeOption +'"]').remove();
				$('#IdActividadEconomica').multiselect({
					includeSelectAllOption: true
				});*/
			}, 100);

		</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paisSelect = document.getElementById('IdPais_listasdinamicas');
    const departamentoSelect = document.getElementById('IdDepartamento_listasdinamicas');
    const ciudadSelect = document.getElementById('IdCiudad_listasdinamicas');

    paisSelect.addEventListener('change', function() {
        const paisId = this.value;

        // Limpiar los selects de departamento y ciudad
        departamentoSelect.innerHTML = '';
        ciudadSelect.innerHTML = '';
        ciudadSelect.disabled = true;

        if (paisId) {
            fetch(`/api/departamentos/${paisId}`)
                .then(response => response.json())
                .then(data => {
                    departamentoSelect.disabled = false;
                    data.forEach(departamento => {
                        const option = new Option(departamento.Departamento, departamento.IdDepartamento);
                        departamentoSelect.add(option);
                    });
                });
        } else {
            departamentoSelect.disabled = true;
        }
    });

    departamentoSelect.addEventListener('change', function() {
        const departamentoId = this.value;

        // Limpiar el select de ciudad
        ciudadSelect.innerHTML = '';

        if (departamentoId) {
            fetch(`/api/ciudades/${departamentoId}`)
                .then(response => response.json())
                .then(data => {
                    ciudadSelect.disabled = false;
                    data.forEach(ciudad => {
                        const option = new Option(ciudad.Ciudad, ciudad.IdCiudad);
                        ciudadSelect.add(option);
                    });
                });
        } else {
            ciudadSelect.disabled = true;
        }
    });
});
</script>
@endsection()

@endsection()

