@extends('partials.card')

@extends('layout')

@section('title')
	Crear Evidencia 
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'seguimiento.store', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crearseguimiento',$programa->IdPrograma, $actividad->IdActividad.'&'.$programa->IdPrograma)}} 
		@endsection()

		@section('card-content')
			 <div class="card-body floating-label">
                 <div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Efecturar Seguimiento a un Programa
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="consecutivo" name="consecutivo" readonly value="{{$programa->Consecutivo}}">
                                    <label>Programa</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="{{$tipoPrograma->Tipo}}">
                                    <label>Tipo Programa</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" id="Observaciones" name="Observaciones" readonly value="{{$actividad->Actividad}}"> --}}
                                    <textarea class="form-control" id="actividad" name="actividad" readonly>{{$actividad->Actividad}}</textarea>
                                    <label>Actividad</label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            @if($lastSeguimiento)
                            <div class="col-12">
                                <p>La situación del último seguimiento fue <b>{{$lastSeguimiento->Situacion}}</b> y se registró un porcentaje de <b>{{$lastSeguimiento->Porcentaje}}%</b> </p>
                            </div>
                            @endif
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" id="Fecha" name="Fecha" required value="{{$dcr}}" readonly>
                                    <label for="Fecha">Fecha</label> --}}

                                    <div class="input-group date" id="demo-date-format">
                                        <div class="input-group-content">
                                            <input type="text" class="form-control" id="Fecha" name="Fecha" required>
                                            <label for="FechaInicio">Fecha</label>
                                        </div>
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::select('Situacion', [
                                                        '' => '',
                                                        'Pendiente' => 'Pendiente',
                                                        'Proceso' => 'Proceso',
                                                        'Cumplido' => 'Cumplido'
                                                    ], null, ['class' => 'form-control', 'id' => 'Situacion','onchange'=>'validateState()'])}}
                                    <label for="Situacion">Situación</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="Porcentaje" name="Porcentaje" required onchange="validarPorcentaje()">
                                    <label for="Porcentaje">Porcentaje</label>
                                </div>
                                <span style="color:darkred;font-size: 10px;" id="mensajes" hidden="hidden"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="Evidencias" name="Evidencias"></textarea>
                                    <label for="Evidencias">Observaciones / Evidencia </label>
                                </div>
                            </div> 
                        </div> 
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
                                     {{-- <label for="tipoDoc" >Documentos</label> --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Selecccione la carpeta de destino</label>
                                    <div id="treeview2" class="treeview">
                                       
                                    </div>
                                </div>
                            </div>
                           {{--  <div class="col-sm-4">
                                <h2>Events</h2>
                                <div id="selectable-output"></div>
                            </div> --}}
                        </div>
                        
                        <input type="hidden" id="selectable-output" name="folder" >
                        <input type="hidden" value="{{$programa->IdPrograma}}" name="IdPrograma">
                        <input type="hidden" value="{{$actividad->IdActividad}}" name="IdActividad">
                        <input type="hidden" value="{{$tipoPrograma->IdTipoPrograma}}" name="IdTipoPrograma">

                    </div>
                </div>
            </div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route('seguimientoActividades.show', $actividad->IdActividad.'&'.$programa->IdPrograma) }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

        <script src="{{URL::asset('js/libs/bootstrap-treeview/bootstrap-treeview.js')}}"></script>
         <script type="text/javascript">
            $("#Porcentaje").keydown(function(e) {
                if(!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) 
                    || e.keyCode == 8 || e.keyCode == 9)) {
                        return false;
                }
            });

            $("#Porcentaje").keyup(function() {
                if($('#Porcentaje').val()<1 || $('#Porcentaje').val()>100){
                    var percentaje = document.getElementById('Porcentaje');
                    percentaje.value = percentaje.value.substring(0, percentaje.value.length - 1);
                }
            });

            function validateState()
            {
                var opcion = $('#Situacion').val();
                if(opcion== 'Pendiente')
                {
                    $('#Porcentaje').val("0");
                    $('#Porcentaje').attr('disabled', 'disabled');
                }
                else if(opcion == 'Proceso')
                {
                    $('#Porcentaje').removeAttr('disabled');
                    $('#Porcentaje').val("");
                }
                else if(opcion== 'Cumplido')
                {
                    $('#Porcentaje').val("100");
                    $('#Porcentaje').attr('disabled', 'disabled');
                }
            }
            
            function validarPorcentaje()
            {
                if($('#Situacion').val()=='Proceso')
                {
                    if($('#Porcentaje').val()==0 || $('#Porcentaje').val()==100)
                    {
                        $('#mensajes').text('Debe ingresar un valor entre mayor que 0 menor que 100');
                        $('#mensajes').removeAttr('hidden');
                    }
                    else
                    {
                        $('#mensajes').text('');
                        $('#mensajes').attr('hidden','hidden');
                    }
                }
            }



            $(function() {

                var defaultData = [{
                        text: '1. Gestión de Programa',
                        href: '1. Gestion de Programa',
                        nodes: [{
                                text: '1. Antecedentes',
                                href: '1. Gestion de Programa\\1. Antecedentes'
                            },
                            {
                                text: '2. Apertura de Programa',
                                href: '1. Gestion de Programa\\2. Apertura de Programa'
                                
                            },
                            {
                                text: '3. Ejecución y Seguimiento',
                                href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento',
                                nodes: [{
                                            text: '1. Cronograma de Trabajo',
                                            href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento\\1. Cronograma de Trabajo'
                                        },
                                        {
                                            text: '2. Actas de Seguimiento',
                                            href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento\\2. Actas de Seguimiento'
                                        },
                                        {
                                            text: '3. Informes de Programa',
                                            href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento\\3. Informes de Programa'
                                        },
                                        {
                                            text: '4. Memorandos Outlook',
                                            href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento\\4. Memorandos Outlook'
                                        },
                                        {
                                            text: '5. Oficios',
                                            href: '1. Gestion de Programa\\3. Ejecucion y Seguimiento\\5. Oficios'
                                        }
                                ]
                            },
                            {
                                text: '4. Evaluación y Certificación',
                                href: '1. Gestion de Programa\\4. Evaluacion y Certificacion',
                                nodes: [{
                                            text: '1. Auditorias e Inspecciones',
                                            href: '1. Gestion de Programa\\4. Evaluacion y Certificacion\\1. Auditorias e Inspecciones'
                                        },
                                        {
                                            text: '2. Información de Certificación',
                                            href: '1. Gestion de Programa\\4. Evaluacion y Certificacion\\2. Informacion de Certificacion'
                                        },
                                        {
                                            text: '3. Costos y Compensación',
                                            href: '1. Gestion de Programa\\4. Evaluacion y Certificacion\\3. Costos y Compensacion'
                                        }
                                ]
                            },
                            {
                                text: '5. Cierre de Programa',
                                href: '1. Gestion de Programa\\5. Cierre de Programa'
                            }
                        ]
                    },
                    {
                        text: '2. Información de Diseño',
                        href: '2. Informacion de Diseno',
                        nodes: [{
                                    text: '1. Bases de Certificación',
                                    href: '2. Informacion de Diseno\\1. Bases de Certificacion'
                                },
                                {
                                    text: '2. Diseno Preliminar (PDR)',
                                    href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)',
                                    nodes: [{
                                                text: '1. Caracterización Funcional',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\1. Caracterizacion Funcional'
                                            },
                                            {
                                                text: '2. Caracterización Dimensional',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\2. Caracterizacion Dimensional'
                                            },
                                            {
                                                text: '3. Caracterización de Material',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\3. Caracterizacion de Material'
                                            },
                                            {
                                                text: '4. Caracterización de Fabricacion',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\4. Caracterizacion de Fabricacion'
                                            },
                                            {
                                                text: '5. Analisis de Seguridad',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\5. Analisis de Seguridad'
                                            },
                                            {
                                                text: '6. Otros',
                                                href: '2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\6. Otros'
                                            }
                                    ]
                                },
                                {
                                    text: '3. Diseño Crítico (CDR)',
                                    href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)',
                                    nodes: [{
                                                text: '1. Plan de Certificación (PSCP)',
                                                href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\1. Plan de Certificacion (PSCP)'
                                            },
                                            {
                                                text: '2. Matriz de Cumplimiento',
                                                href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\2. Matriz de Cumplimiento'
                                            },
                                            {
                                                text: '3. Plan de Ensayos',
                                                href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\3. Plan de Ensayos'
                                            },
                                            {
                                                text: '4. Documentos CDR',
                                                href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR',
                                                nodes: [{
                                                            text: '1. Documentos Tecnicos Originales',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\1. Documentos Tecnicos Originales'
                                                        },
                                                        {
                                                            text: '2. Estudios de Ingeniería',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\2. Estudios de Ingenieria'
                                                        },
                                                        {
                                                            text: '3. Procesos de Fabricación',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\3. Procesos de Fabricacion'
                                                        },
                                                        {
                                                            text: '4. Control de Configuración',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\4. Control de Configuracion'
                                                        },
                                                        {
                                                            text: '5.  Instrucciones ICAs',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\5.  Instrucciones ICAs'
                                                        },
                                                        {
                                                            text: '6.  Declaración DDP',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\6.  Declaracion DDP'
                                                        },
                                                        {
                                                            text: '7.  Otros',
                                                            href: '2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\7.  Otros'
                                                        }
                                                ]
                                            }
                                    ]
                                },
                                {
                                    text: '4. Aeronavegabilidad Continuada',
                                    href: '2. Informacion de Diseno\\4. Aeronavegabilidad Continuada'
                                },
                                {
                                    text: '5. Información Complementaria',
                                    href: '2. Informacion de Diseno\\5. Informacion Complementaria'
                                }
                        ]
                    },
                    {
                        text: '3. Información de Producción',
                        href: '3. Informacion de Produccion',
                        nodes: [{
                                    text: '1. Gestion de Producción',
                                    href: '3. Informacion de Produccion\\1. Gestion de Produccion',
                                    nodes: [{
                                                text: '1. Antecedentes',
                                                href: '3. Informacion de Produccion\\1. Gestion de Produccion\\1. Antecedentes'
                                            },
                                            {
                                                text: '2. Apertura de Programa',
                                                href: '3. Informacion de Produccion\\1. Gestion de Produccion\\2. Apertura de Programa'
                                            },
                                            {
                                                text: '3. Ejecución y Seguimiento',
                                                href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento',
                                                nodes: [{
                                                            text: '1. Cronograma de Trabajo',
                                                            href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\1. Cronograma de Trabajo'
                                                        },
                                                        {
                                                            text: '2. Actas de Seguimiento',
                                                            href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\2. Actas de Seguimiento'
                                                        },
                                                        {
                                                            text: '3. Informes de Programa',
                                                            href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\3. Informes de Programa'
                                                        },
                                                        {
                                                            text: '4. Memorandos Outlook',
                                                            href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\4. Memorandos Outlook'
                                                        },
                                                        {
                                                            text: '5. Oficios',
                                                            href: '3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\5. Oficios'
                                                        }
                                                ]
                                            },
                                            {
                                                text: '4. Reconocimiento y Evaluación',
                                                href: '3. Informacion de Produccion\\1. Gestion de Produccion\\4. Reconocimiento y Evaluacion'
                                            },
                                            {
                                                text: '5. Cierre de Programa',
                                                href: '3. Informacion de Produccion\\1. Gestion de Produccion\\5. Cierre de Programa'
                                            }
                                    ]
                                },
                                {
                                    text: '2. Requisitos RCP',
                                    href: '3. Informacion de Produccion\\2. Requisitos RCP'
                                },
                                {
                                    text: '3. Auditorias de Producciónn',
                                    href: '3. Informacion de Produccion\\3. Auditorias de Produccionn'
                                },
                                {
                                    text: '4. Informacion Complementaria',
                                    href: '3. Informacion de Produccion\\4. Informacion Complementaria'
                                }
                        ]
                    },
                    {
                        text: '4. Certificados',
                        href: '4. Certificados'
                    }
                ];

                // $('#treeview2').treeview({
                //     levels: 1,
                //      expandIcon: "glyphicon glyphicon-folder-close",
                //      collapseIcon: "glyphicon glyphicon-folder-open",
                //     // nodeIcon: 'glyphicon glyphicon-folder-open',
                //     // showTags: true,
                //     data: defaultData
                // });

                var initSelectableTree = function() {
                    return $('#treeview2').treeview({
                        levels: 1,
                        expandIcon: "glyphicon glyphicon-folder-close",
                        collapseIcon: "glyphicon glyphicon-folder-open",
                        data: defaultData,
                        // multiSelect: $('#chk-select-multi').is(':checked'),
                        onNodeSelected: function(event, node) {
                            $('#selectable-output').val( node.href);
                        }
                    });
                };
                var $selectableTree = initSelectableTree();
                
            });
        </script>
        <script>
            $('.nestable-list').nestable();
        </script>

		@endsection()

	@endsection()

@endsection()