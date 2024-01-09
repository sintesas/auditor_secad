@extends('partials.card')

@extends('layout')

@section('title')
    Informe CIIU
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

        @if(isset($empresas))
	    {!! Form::model($empresas) !!}
        @endif
        {{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- Informe Inspección IC FR 08 --}}
            {{ Breadcrumbs::render('ver_informe_dinamico_empresas') }}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
            <div id="">
                <section>
                    <div class="section-body">
                      <div class="total-card">
                        <div class="row encabezadoPlanInspeccion">
                        <!-- titulo Formulario -->
                            <div class="col-xs-12 text-center">
                                        <h3>OFICINA CERTIFICACIÓN AERONÁUTICA DE LA DEFENSA - SECAD</h3>
                                            <div>
                                                <h4>Listado de Información de Empresas</h4>
                                            </div>
                                    </div>
                            </div>

                        </div><!--end .row -->



                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('TipoOrganizacion', [
                                        'Estado' => 'Estado',
                                        'Academia' => 'Academia',
                                        'Industrias' => 'Industrias',
                                        ], old('value'), ['placeholder' => '', 'onchange' => "return dinamicCompanyReportCreator('filter')", 'class' =>  'form-control', 'id' => 'TipoOrganizacion']) }}
                                    <label for="TipoOrganizacion">Tipo de organización</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('IdEstadoEmpresa', $estadoEmpresa->pluck('Descripcion' , 'IdEstadoEmpresa'), null, ['onchange' => "return dinamicCompanyReportCreator('filter')", 'class' => 'form-control', 'id' => 'IdEstadoEmpresa']) }}
                                    <label for="IdEstadoEmpresa">Estado</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('IdDominioIndustrial', $dominioIndustrial->pluck('Descripcion' , 'IdDominioIndustrial'), null, ['onchange' => "return dinamicCompanyReportCreator('filter')", 'class' => 'form-control', 'id' => 'IdDominioIndustrial']) }}
                                    <label for="IdDominioIndustrial">Dominio Industrial</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::select('IdAreasCooperacionIndustrial', $areasCooperacionIndustrial->pluck('Descripcion' , 'IdAreasCooperacionIndustrial'), null, ['onchange' => "return dinamicCompanyReportCreator('filter')", 'class' => 'form-control', 'id' => 'IdAreasCooperacionIndustrial']) }}
                                    <label for="IdAreasCooperacionIndustrial">Áreas claves de cooperación industrial en la cadena de suministros</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::select('IdActividadEconomica', $secciones, null, ['placeholder' => '', 'onchange' => "return dinamicCompanyReportCreator('filter')", 'class' => 'form-control', 'id' => 'IdActividadEconomica', 'name' => 'IdActividadEconomica[]']) }}
                                    <label for="IdActividadEconomica">Clasificación de Actividades Económicas - CIIU</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 text-center gris57">
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso class=filaFormulario-->
                            <div class="col-xs-12 table-fixed">
                                <table class="table  table-x " id="tableDinamicCompany">
                                    <thead class="fondoAzulOscuro blanco" id="titleDinamicCompany">
                                        <tr>
                                            <th class="th-x"> Nombre Empresa</th>
                                            <th class="th-x" >  Nit</th>
                                            <th class="th-x" > Ciudad </th>
                                            <th class="th-x" > Teléfono </th>
                                        </tr>
                                    </thead>
                                    <tbody class="line-a" id="dataDinamicCompany">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div><!--end .row -->
                            <!--<br><br>
                        <button type="button" onclick="return exportFile('build');" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></button>-->

                    </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->


        @if(isset($empresas))
		{!! Form::close() !!}
        @endif
		@endsection()
        @section('addjs')
        <script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/jszip.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('js/select2.full.js')}}"></script>
        <script>
            setTimeout(function(){
                $("#IdActividadEconomica").select2( {
                    'placeholder': '',
                    'width': 'resolve',
                    'containerCssClass': ':all:'
                } );
                dinamicCompanyReportCreator('filter');
            }, 100);

            function exportFile(type){
                location.href='{{ url("filterDinamicCompanyReportCreator") }}' + '?data=' + dinamicDataConfig(type);
            }
            function dinamicDataConfig(type){
                var dt = {
                    "type" : type,
                    "TipoOrganizacion" : $('#TipoOrganizacion').val(),
                    "IdEstadoEmpresa" : $('#IdEstadoEmpresa').val(),
                    "IdDominioIndustrial" : $('#IdDominioIndustrial').val(),
                    "IdAreasCooperacionIndustrial" : $('#IdAreasCooperacionIndustrial').val(),
                    "IdActividadEconomica" : $('#IdActividadEconomica').val()
                }
                return encodeURIComponent(JSON.stringify(dt));
            }
                    function dinamicCompanyReportCreator(type) {
                        $("#tableDinamicCompany").dataTable().fnDestroy();
                        var data = dinamicDataConfig(type);
                        var url = '{{ url("filterDinamicCompanyReportCreator") }}';
                        $.ajax({

                            type: 'get',
                            url: url + '?data=' + data,
                            dataType:"json",
                            success: function (result) {

                                var htmlTitle = '<tr>'
                                              + '<th class="th-x">Nombre Empresa</th>'
                                              + '<th class="th-x">Nit</th>'
                                              + '<th class="th-x">Ciudad</th>'
                                              + '<th class="th-x">Teléfono</th>';
                                                    if($('#TipoOrganizacion').val() != '') {
                                                        htmlTitle += '<th class="th-x" >Tipo Org.</th>';
                                                    }
                                                    if($('#IdEstadoEmpresa').val() != '') {
                                                        htmlTitle += '<th class="th-x">Estado</th>';
                                                    }
                                                    if($('#IdDominioIndustrial').val() != ''){
                                                        htmlTitle += '<th class="th-x">D. Industrial</th>';
                                                    }
                                                    if($('#IdAreasCooperacionIndustrial').val() != ''){
                                                        htmlTitle += '<th class="th-x">Área</th>'
                                                                + '<th class="th-x"> Subárea </th>';
                                                    }
                                                    if($('#IdActividadEconomica').val() != ''){
                                                        htmlTitle += '<th class="th-x">Act. Económica</th>';
                                                    }
                                htmlTitle += '</tr>';

                                /**@argument
                                 * Respuesta Ajax
                                 * */
                                 var htmlData = '';

                                 $.each(result, function(i, item) {
                                        htmlData += '<tr>';
                                            htmlData += '<td>' + result[i].NombreEmpresa + '</td>'
                                                + '<td>' + result[i].Nit + '</td>'
                                                + '<td>' + result[i].Ciudad + '</td>'
                                                + '<td>' + result[i].Telefono + '</td>';
                                            if($('#TipoOrganizacion').val() != ''){
                                                htmlData += '<td>' + result[i].TipoOrganizacion + '</td>';
                                            }
                                            if($('#IdEstadoEmpresa').val() != ''){
                                                htmlData += '<td>' + result[i].STATUS + '</td>';
                                            }
                                            if($('#IdDominioIndustrial').val() != ''){
                                                htmlData += '<td>' + result[i].DIDescripcion + '</td>';
                                            }
                                            if($('#IdAreasCooperacionIndustrial').val() != ''){
                                                htmlData += '<td>' + result[i].ACIDescipcion + '</td>'
                                                        + '<td>' + result[i].SACIDescipcion + '</td>';
                                            }
                                            if($('#IdActividadEconomica').val() != ''){
                                                htmlData += '<td>' + result[i].AEDescripcion + '</td>';
                                            }
                                        htmlData += '</tr>';
                                });

                                $("#titleDinamicCompany").html(htmlTitle);
                                $("#dataDinamicCompany").html(htmlData);

                                /*for (data in result) {
                                    var htmlData = '';
                                    for (index in data) {
                                        htmlData += '<tr>';
                                        for (item in result[data[index]]) {
                                            htmlData += '<td>' + result[data[index]].NombreEmpresa + '</td>'
                                                    + '<td>' + result[data[index]].Nit + '</td>'
                                                    + '<td>' + result[data[index]].Ciudad + '</td>'
                                                    + '<td>' + result[data[index]].Telefono + '</td>';
                                            if($('#TipoOrganizacion').val() != ''){
                                                htmlData += '<td>' + result[data[index]].TipoOrganizacion + '</td>';
                                            }
                                            if($('#IdEstadoEmpresa').val() != ''){
                                                htmlData += '<td>' + result[data[index]].STATUS + '</td>';
                                            }
                                            if($('#IdDominioIndustrial').val() != ''){
                                                htmlData += '<td>' + result[data[index]].DIDescripcion + '</td>';
                                            }
                                            if($('#IdAreasCooperacionIndustrial').val() != ''){
                                                htmlData += '<td>' + result[data[index]].ACIDescipcion + '</td>'
                                                          + '<td>' + result[data[index]].SACIDescipcion + '</td>';
                                            }
                                            if($('#IdActividadEconomica').val() != ''){
                                                htmlData += '<td>' + result[data[index]].AEDescripcion + '</td>';
                                            }
                                            break;
                                        }
                                        htmlTitle += '</tr>';
                                        htmlData += '</tr>';
                                    }
                                }*/
                                

                                $('#tableDinamicCompany').DataTable(
                                        {
                                            dom: 'Bfrtip',
                                            buttons: [
                                                {
                                                    extend: 'excelHtml5',
                                                    text: 'Excel',
                                                    title: 'Export to datatable data to Excel',
                                                    download: 'open',
                                                    orientation:'landscape',
                                                    exportOptions: {
                                                        columns: ':visible'
                                                    },
                                                    className: "btn btn-primary"
                                                },
                                                /*     {
                                                 extend: 'pdfHtml5',
                                                 text: 'Pdf',
                                                 title: 'Export to datatable data to Pdf',
                                                 download: 'open',
                                                 orientation:'landscape',
                                                 exportOptions: {
                                                 columns: ':visible'
                                                 },
                                                 className: "btn btn-primary"
                                                 }*/
                                            ]
                                        }
                                );
                                $('.dt-buttons').prepend('<button type="button" onclick="return exportFile(\'build\');" style="padding: 4.5px 14px; width: 60px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"> PDF </button>&nbsp;');
                            }

                        });
                    }
        </script>
	@endsection()

@endsection()