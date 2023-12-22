{{-- BEGIN MENUBAR --}}
<div id="menubar" class="menubar-inverse ">
	<div class="menubar-fixed-panel">
		<div>
			<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="expanded">
			<a href="../../html/dashboards/dashboard.html">
				<span class="text-lg text-bold text-primary ">Fuerza Aerea</span>
			</a>
		</div>
	</div>

	{{--1.certificacion
		2. reconocimiento y evaluacion
		3, fomento aeronautico
		4. gestion de recursos --}}

	<div class="menubar-scroll-panel">

		<!-- BEGIN MAIN MENU -->
		<ul id="main-menu" class="gui-controls">

		
			<!-- BEGIN DASHBOARD -->
			<li>
				<a href="{{route('dashboard')}}" class="active">
					<div class="gui-icon"><i class="md md-home"></i></div>
					<span class="title">Pagina Principal</span>
				</a>
			</li><!--end /menu-li -->
			<!-- END DASHBOARD -->


			{{-- BEGIN RECONOCIMIENTO Y EVALUACION  --}}
			<li class="gui-folder">
				<a>
					<div class="gui-icon"><i class="fa fa-puzzle-piece"></i></div>
					<span class="title">Reconocimiento y Evaluación </span>
				</a>

				<ul>
					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Auditorias</span></a>
						<ul>
							<li><a href="{{route('tipoAuditoria.index')}}"><span class="title">Crear Tipo Auditoria </span></a></li>

							<li><a href="{{route('auditoria.index')}}"><span class="title">Crear Auditorias </span></a></li>

							<li><a href="{{route('planeInspeccion.index')}}"><span class="title">Crear Plan Inspección </span></a></li>

							<li><a href="{{route('anotacion.index')}}"><span class="title">Crear Anotaciones </span></a></li>

							<li><a href="{{route('informeInspeccion.index')}}"><span class="title">Crear Informe Inspección </span></a></li>

							<li><a href="{{route('seguimientoCausaRaiz.index')}}"><span class="title">Seguimiento </span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes </span></a>
								<ul>
									<li><a href="{{route('informeplaninspeccionfinal.index')}}"><span class="title">Plan Inspección Final IC-FR-2 </span></a></li>

									<li><a href="{{route('informeplanmejora.index')}}"><span class="title">Plan de Mejora <br>(Hallazgo) </span></a></li>

									<li><a href="{{route('informeinspeccionicfr03.index')}}"><span class="title">Informe de <br>Inspección IC-FR-3 </span></a></li>

									<li><a href="{{route('informeinspeccionicfr08.index')}}"><span class="title">Informe de <br>Inspección IC-FR-8 </span></a></li>

									<li><a href="{{route('informeseguimientoconsolidado.index')}}"><span class="title">Seguimiento <br>Consolidado </span></a></li>

									<li><a href="{{route('informeanotacionesseguimiento.index')}}"><span class="title">Anotaciones <br>con Seguimiento </span></a></li>

									<li><a href="{{route('informevisitaacompanamiento.index')}}"><span class="title">Visita y <br>Acompañamiento </span></a></li>

									<li class="gui-folder">
									<a href="javascript:void(0);"><span class="title">Anotaciones ODCIN</span></a>
										<ul>
											<li><a href="{{route('cantidadAnotaciones.index')}}"><span class="title">Cantidad <br>Anotaciones</span></a></li>
											<li><a href="{{route('tipoAuditoria.index')}}"><span class="title">Resumen <br>Anotaciones ODCIN</span></a></li>
											<li><a href="{{route('informehallazgosgenerados.index')}}"><span class="title">Hallazgos <br>Generados Inspección</span></a></li>
											<li><a href="{{route('informehallazgosgenerados.index')}}"><span class="title">Anotaciones<br>Parciales</span></a></li>
										</ul>
									</li>

									<li><a href="{{route('apacAuditoria.index')}}"><span class="title">Consolidado <br>AP AC x Auditoria  </span></a></li>

									<li><a href="{{route('nuerepadi.index')}}"><span class="title">Consolidado <br>NUE, REP, ADIC</span></a></li>

									<li><a href="{{route('consolidadoxfuente.index')}}"><span class="title">Consolidado por <br>Fuente </span></a></li>

									<li><a href="{{route('consolidadoXProgramaCalidad.index')}}"><span class="title">Consolidado <br>X Programa Calidad</span></a></li>

									<li><a href="{{route('consolidadoXProgramaTipo.index')}}"><span class="title">Consolidado <br>Programa x Tipo</span></a></li>

									<li><a href="{{route('organizacionXAuditoria.index')}}"><span class="title">Organización X Auditoria</span></a></li>

									<li><a href="{{route('anotacionesXObjeto.index')}}"><span class="title">Anotaciones X Objeto</span></a></li>

									<li><a href="{{route('anotacionesXEstadoParcial.index')}}"><span class="title">Anotaciones Estado Parcial</span></a></li>

								</ul>
							</li>


						</ul>
					</li>



					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Capacitación y Entrenamiento</span></a>
						<ul>
							<li><a href="{{route('evento.index')}}"><span class="title">Crear Evento <br> y Participantes</span></a></li>

							<li><a href="{{route('informeescarapelas.index')}}"><span class="title">Imprimir Escarapela</span></a></li>

							<li class="gui-folder"><a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informeasistencia.index')}}"><span class="title">Reporte de <br> Asistencia</span></a></li>

									<li><a href=""><span class="title">Entrenamientos <br> por año</span></a></li>

									<li><a href=""><span class="title">Participantes <br> por entrenamiento</span></a></li>
								</ul>
							</li>
						</ul>
					</li>


					<li><a href=""><span class="title">Ensayos Aeronauticos</span></a></li>
				</ul>

				

			</li>
			{{-- END RECONOCIMIENTO Y EVALUACION  --}}
			

		</ul><!--end .main-menu -->
		<!-- END MAIN MENU -->
				
		{{-- @endrole --}}


	</div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
			<!-- END MENUBAR