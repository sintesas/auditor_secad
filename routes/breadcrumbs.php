<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail) {
	$trail->push('Inicio', route('dashboard'));
});

Breadcrumbs::for('usuario', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Usuarios', route('usuario.index'));
});

Breadcrumbs::for('crear_usuario', function(BreadcrumbTrail $trail) {
	$trail->parent('usuario');
	$trail->push('Crear Usuario', route('usuario.create'));
});

Breadcrumbs::for('editar_usuario', function(BreadcrumbTrail $trail) {
	$trail->parent('usuario');
	$trail->push('Actualizar Usuario', route('usuario.edit', '$usuario_id'));
});

Breadcrumbs::for('asignar_rol', function(BreadcrumbTrail $trail) {
	$trail->parent('usuario');
	$trail->push('Asignar Rol', route('asignar.rol', '$usuario_id'));
});

Breadcrumbs::for('rol', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Roles', route('rol.index'));
});

Breadcrumbs::for('crear_rol', function(BreadcrumbTrail $trail) {
	$trail->parent('rol');
	$trail->push('Crear Rol', route('rol.create'));
});

Breadcrumbs::for('editar_rol', function(BreadcrumbTrail $trail) {
	$trail->parent('rol');
	$trail->push('Actualizar Rol', route('rol.edit', '$rol_id'));
});

Breadcrumbs::for('rolprivilegio', function(BreadcrumbTrail $trail) {
	$trail->parent('rol');
	$trail->push('Rol Privilegios', route('rolprivilegio.indice', '$rol_id'));
});

Breadcrumbs::for('crear_rol_privilegio', function(BreadcrumbTrail $trail) {
	$trail->parent('rolprivilegio');
	$trail->push('Crear Rol Privilegios', route('rolprivilegio.crear', '$rol_id'));
});

Breadcrumbs::for('editar_rol_privilegio', function(BreadcrumbTrail $trail) {
	$trail->parent('rolprivilegio');
	$trail->push('Actualizar Rol Privilegios', route('rolprivilegio.edit', '$rol_privilegio_id'));
});

Breadcrumbs::for('nombre_lista', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Nombres Listas', route('nombrelista.index'));
});

Breadcrumbs::for('crear_nombre_lista', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Crear Nombres Listas', route('nombrelista.create'));
});

Breadcrumbs::for('actualizar_nombre_lista', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Actualizar Nombres Listas', route('nombrelista.edit', '$nombre_lista_id'));
});

Breadcrumbs::for('lista_dinamica', function(BreadcrumbTrail $trail) {
	$trail->parent('nombre_lista');
	$trail->push('Listas Valores', route('listasvalores.indice', '$nombre_lista_id'));
});

Breadcrumbs::for('crear_lista_dinamica', function(BreadcrumbTrail $trail) {
	$trail->parent('lista_dinamica');
	$trail->push('Crear Listas Valores', route('listasvalores.create'));
});

Breadcrumbs::for('actualizar_lista_dinamica', function(BreadcrumbTrail $trail) {
	$trail->parent('lista_dinamica');
	$trail->push('Actualizar Listas Valores', route('listasvalores.edit', '$lista_dinamica_id'));
});

// empresas
Breadcrumbs::for('empresa', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Empresas', route('empresa.index'));
});

Breadcrumbs::for('crear_empresa', function(BreadcrumbTrail $trail){
	$trail->parent('empresa');
	$trail->push('Crear Empresa', route('empresa.create'));
});

Breadcrumbs::for('editar_empresa', function(BreadcrumbTrail $trail){
	$trail->parent('empresa');
	$trail->push('Editar Empresa', route('empresa.edit', 'IdEmpresa'));
});

Breadcrumbs::for('controlempresa', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Control de Actualización de Empresas', route('empresa.index'));
});

Breadcrumbs::for('resumenempresa', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Cuadro Resumen Empresas', route('empresa.index'));
});

Breadcrumbs::for('controlcontratos', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Cuadro Control Contratos', route('InformeContrato.index'));
});

Breadcrumbs::for('formcontrolcontratos', function(BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Crear Contratos', route('FormularioContrato.index'));
});


Breadcrumbs::for('capacidades_empresa', function(BreadcrumbTrail $trail){
	$trail->parent('empresa');
	$trail->push('capacidades', route('capacidadesEmpresa.show', 'IdEmpresa'));
});

Breadcrumbs::for('funcionarios_empresa', function(BreadcrumbTrail $trail){
	$trail->parent('empresa');
	$trail->push('funcionarios', route('funcionariosEmpresa.show', 'IdEmpresa'));
});
//Informes
//Informe Empresas
Breadcrumbs::for('informe_empresas', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Ver Empresas', route('informeempresas.index'));
});
Breadcrumbs::for('informe_empresa', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Empresas', route('informeempresas.index'));
    $trail->push('Informe Empresa', route('informeempresas.index'));
});
//Informe Funcionarios Empresas
Breadcrumbs::for('ver_funcionarios_empresas', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Empresas', route('informefuncionariosempresa.index'));
});
Breadcrumbs::for('funcionarios_empresas', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Empresas', route('informefuncionariosempresa.index'));
    $trail->push('Informe Funcionarios Empresas', route('informefuncionariosempresa.index'));
});
//Informe Total Empresas
Breadcrumbs::for('ver_informe_total_empresas', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Total Empresas', route('informeempresas.index'));
});
//Informe Areas x cooperacion industrial
Breadcrumbs::for('ver_informe_areas_x_cooperacion_industrial', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Áreas x cooperación Industrial', route('informeareasxcoopindustri.index'));
});
//Informe Dinamico
Breadcrumbs::for('ver_informe_dinamico_empresas', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Dinámico', route('informedinamicoempresa.index'));
});

// SectorAeronautico
//Informes
//Ver Empresas X Sector
Breadcrumbs::for('ver_empresas_sector', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Empresas por Sector', route('informeempresasxsector.index'));
});
//Empresas X Sector
Breadcrumbs::for('empresas_sector', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Ver Empresas por Sector', route('informeempresasxsector.index'));
    $trail->push('Empresas por Sector', route('informeempresasxsector.index'));
});
//Informe Ofertas Sector Aeronautico
Breadcrumbs::for('informe_ofertas_sector_aeronautico', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Ofertas Sector Aeronautico', route('informeofertassectoraeronautico.index'));
});
//Informe Capacidad Total Pais
Breadcrumbs::for('informe_capacidad_total_pais', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Informe Capacidad Total Pais', route('informecapacidadtotalpais.index'));
});
// clusters

Breadcrumbs::for('clusters', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('clusters', route('cluster.index'));
});

 Breadcrumbs::for('editar_cluster', function(BreadcrumbTrail $trail){
 	$trail->parent('clusters');
 	$trail->push('Editar Cluster', route('cluster.edit', 'IdCluster'));
});

Breadcrumbs::for('afiliados_cluster', function(BreadcrumbTrail $trail){
 	$trail->parent('clusters');
 	$trail->push('Afiliados Cluster', route('afiliado.show', 'IdCluster'));
});

 // Estados programa

Breadcrumbs::for('estadosprograma', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Estados Programa', route('estadosprograma.index'));
});


// atas
 Breadcrumbs::for('ata', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Ver ATAS', route('ata.index'));
 });

 Breadcrumbs::for('editar_ata', function(BreadcrumbTrail $trail){
 	$trail->parent('ata');
 	$trail->push('Editar Ata', route('ata.edit', 'IdATA'));
 });

 // mocs
 Breadcrumbs::for('moc', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('MOC', route('readmocs'));
 });

 Breadcrumbs::for('editar_moc', function(BreadcrumbTrail $trail){
 	$trail->parent('moc');
 	$trail->push('Editar MOC', route('moc.edit', 'IdMOC'));
 });
// Aeronaves
 Breadcrumbs::for('aeronaves', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Aeronaves', route('aeronave.index'));
 });

 Breadcrumbs::for('editar_aeronave', function(BreadcrumbTrail $trail){
 	$trail->parent('aeronaves');
 	$trail->push('Editar Aeronave', route('aeronave', 'IdAeronave'));
 });


 // Unidad
 Breadcrumbs::for('unidades', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tablas Unidades', route('unidad.index'));
 });


 Breadcrumbs::for('editar_contrato', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Editar Contratos');
});


// eventos

  Breadcrumbs::for('eventos', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tablas Eventos Capacitación', route('evento.index'));
 });

Breadcrumbs::for('crear_evento', function(BreadcrumbTrail $trail){
 	$trail->parent('eventos');
 	$trail->push('Crear Evento de Capacitación', route('evento.create'));
 });

 Breadcrumbs::for('editar_evento', function(BreadcrumbTrail $trail){
 	$trail->parent('eventos');
 	$trail->push('Editar Evento de Capacitación', 'IdEvento');
 });

 Breadcrumbs::for('participantes_evento', function(BreadcrumbTrail $trail){
 	$trail->parent('eventos');
 	$trail->push('Participantes Evento de Capacitación', route('participantesevento.show', 'IdEvento'));
 });

 //Actividades Hallazgos
 Breadcrumbs::for('actividades_hallazgos', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Actividades', route('actividadesHallazgo.index'));
});

// Anotacion
 Breadcrumbs::for('anotacion', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tablas Anotación', route('anotacion.index'));
 });

 Breadcrumbs::for('crear_anotacion', function(BreadcrumbTrail $trail){
 	$trail->parent('anotacion');
 	$trail->push('Crear nueva Anotación');
 });

 Breadcrumbs::for('editar_anotacion', function(BreadcrumbTrail $trail){
 	$trail->parent('anotacion');
 	$trail->push('Editar Anotación', 'IdAnotacion');
 });

 Breadcrumbs::for('ver_detalle_anotacion', function(BreadcrumbTrail $trail){
 	$trail->parent('anotacion');
 	$trail->push('Detalle Anotación', 'IdAnotacion');
 });

 Breadcrumbs::for('editar_causa_raiz', function(BreadcrumbTrail $trail){
	$trail->parent('ver_detalle_anotacion');
	$trail->push('Editar Causa Raiz', 'IdAnotacion');
});


// Tipo programa

 Breadcrumbs::for('tiposprograma', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tipos de Programa', route('tipoprograma.index'));
 });

Breadcrumbs::for('activ_tiposprograma', function(BreadcrumbTrail $trail){
 	$trail->parent('tiposprograma');
 	$trail->push('Actividades Tipo de Programa', route('tipoprograma.index'));
 });

// programa
Breadcrumbs::for('programa', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tabla Programas', route('programa.index'));
 });

Breadcrumbs::for('editar_programa', function(BreadcrumbTrail $trail){
 	$trail->parent('programa');
 	$trail->push('Tabla Programas', route('programa.index'));
 	$trail->push('Editar Programa', 'IdPrograma');
 });

 Breadcrumbs::for('auditoriaprograma', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Auditorias Programas', route('auditoriaprograma.index'));
});

Breadcrumbs::for('auditoriaprogplanauditoria', function(BreadcrumbTrail $trail){
	$trail->parent('auditoriaprograma');
	$trail->push('Gestión Auditorias', route('auditoriaprograma.index'));
});

Breadcrumbs::for('visualplanauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('auditoriaprograma');
	$trail->push('Gestión Auditorias', route('auditoriaprogplanauditoria.show', $IdProg));
});

Breadcrumbs::for('crearplanauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Crear Plan Auditoria', route('crearplanauditoria.index'));
});

Breadcrumbs::for('editarplanauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Editar Plan Auditoria', route('auditoriaprograma.index'));
});

Breadcrumbs::for('verplanauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Detalle Plan Auditoria', route('auditoriaprograma.index'));
});

Breadcrumbs::for('crearplaninformeauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Crear Informe Auditoría', route('auditoriaprograma.index'));
});

Breadcrumbs::for('editarplaninformeauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Editar Informe Auditoría', route('auditoriaprograma.index'));
});

Breadcrumbs::for('verplaninformeauditoria', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Detalle Informe Auditoría', route('auditoriaprograma.index'));
});

Breadcrumbs::for('crearplanaccionhallazgos', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Crear Plan Acción Hallazgos', route('auditoriaprograma.index'));
});

Breadcrumbs::for('editarplanaccionhallazgos', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Editar Plan Acción Hallazgos', route('auditoriaprograma.index'));
});

Breadcrumbs::for('verplanaccionhallazgos', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Detalle Plan Acción Hallazgos', route('auditoriaprograma.index'));
});

Breadcrumbs::for('crearplanauditoriaseguimiento', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Crear Seguimiento', route('auditoriaprograma.index'));
});

Breadcrumbs::for('editarplanauditoriaseguimiento', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Editar Seguimiento', route('auditoriaprograma.index'));
});

Breadcrumbs::for('verplanauditoriaseguimiento', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('visualplanauditoria', $IdProg);
	$trail->push('Detalle Seguimiento', route('auditoriaprograma.index'));
});

Breadcrumbs::for('aprobacionhoras', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Aprobación Horas', route('aprobacionhoras.index'));
});

Breadcrumbs::for('aprobacionhorasespecialistas', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('aprobacionhoras');
	$trail->push('Aprobación Horas Especialistas', route('aprobacionhoras.show', $IdProg));
});

Breadcrumbs::for('aprobarespecialistas', function(BreadcrumbTrail $trail, $IdProg){
	$trail->parent('aprobacionhorasespecialistas', $IdProg);
	$trail->push('Aprobar Horas Especialista', route('aprobacionhoras.index'));

});

Breadcrumbs::for('reportehoraspersonal', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Reporte Horas Personal', route('reportehoraspersonal.index'));
});

 //Riesgos programa producto
 Breadcrumbs::for('riesgo_crear', function(BreadcrumbTrail $trail){
  	$trail->parent('dashboard');
  	$trail->push('Crear Riesgos - Programas', route('riesgoprograma.create'));
  });

	Breadcrumbs::for('riesgo_ver', function(BreadcrumbTrail $trail){
		 $trail->parent('dashboard');
		 $trail->push('Ver Riesgos - Programas', route('riesgoprograma.index'));
	 });


/* Lista seguimiento */
//Lista seguiemitno programas
Breadcrumbs::for('programasSeguimiento', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Programas Lista Seguimiento', route('listasProyecto.index'));
 });

Breadcrumbs::for('actividadesSeguimiento', function(BreadcrumbTrail $trail, $IdProg){
 	$trail->parent('programasSeguimiento');
 	$trail->push('Actividades Lista Seguimiento', route('listasProyecto.show', $IdProg));
 });

Breadcrumbs::for('verseguimiento', function(BreadcrumbTrail $trail, $IdProg, $Ids){
 	$trail->parent('actividadesSeguimiento', $IdProg);
 	$trail->push('Ver Seguimiento', route('seguimientoActividades.show', $Ids));
 });

Breadcrumbs::for('crearseguimiento', function(BreadcrumbTrail $trail, $IdProg, $Ids){
 	$trail->parent('verseguimiento', $IdProg, $Ids);
 	$trail->push('Crear Seguimiento', route('seguimiento.index'));
 });

 Breadcrumbs::for('editarseguimiento', function(BreadcrumbTrail $trail, $IdProg, $Ids){
	$trail->parent('verseguimiento', $IdProg, $Ids);
	$trail->push('Editar Seguimiento', route('seguimiento.index'));
});

Breadcrumbs::for('especialistassegui', function(BreadcrumbTrail $trail, $IdProg, $Ids){
 	$trail->parent('verseguimiento', $IdProg, $Ids);
 	$trail->push('Ver Especialistas', route('seguimientoActividades.index'));
 });

Breadcrumbs::for('programasObservaciones212', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Programas Observaciones Informe LAFR212', route('listasProyecto.index'));
 });

Breadcrumbs::for('Observaciones212', function(BreadcrumbTrail $trail){
 	$trail->parent('programasObservaciones212');
 	$trail->push('Observaciones Informe LAFR212', route('listasProyecto.index'));
 });

// LAFR212
Breadcrumbs::for('programasla', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tabla Programas LAFR212', route('informelafr212.index'));
 });

Breadcrumbs::for('lafr212', function(BreadcrumbTrail $trail){
 	$trail->parent('programasla');
 	$trail->push('Informe LAFR212', route('informelafr212.index'));
 });


/* Lista seguimiento Empresa*/
//Lista seguiemitno programas
Breadcrumbs::for('programasSeguimientoEmp', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Seguimiento - Programas', route('listasProyectoEmp.index'));
 });

Breadcrumbs::for('actividadesSeguimientoEmp', function(BreadcrumbTrail $trail, $IdProg){
 	$trail->parent('programasSeguimientoEmp');
 	$trail->push('Seguimiento - Actividades', route('listasProyectoEmp.show', $IdProg));
 });

Breadcrumbs::for('verseguimientoEmp', function(BreadcrumbTrail $trail, $IdProg, $Ids){
 	$trail->parent('actividadesSeguimientoEmp', $IdProg);
 	$trail->push('Ver Evidencias', route('seguimientoActividadesEmp.show', $Ids));
 });

Breadcrumbs::for('crearseguimientoEmp', function(BreadcrumbTrail $trail, $IdProg, $Ids){
 	$trail->parent('verseguimientoEmp', $IdProg, $Ids);
 	$trail->push('Crear Seguimiento', route('seguimiento.index'));
 });
/* End Lista seguiemitno programas*/

// Demanda Potencial
Breadcrumbs::for('demandaPotencialImpacto', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Demanda Potencial', route('demandapotencial.index'));
 });



//  detalleprograma
Breadcrumbs::for('detalleprograma', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tabla Programas', route('programa.index'));
 	$trail->push('Detalle Programa', route('detalleprograma.index'));
 });

Breadcrumbs::for('demandapotencial', function(BreadcrumbTrail $trail){
 	$trail->parent('detalleprograma');
 	$trail->push('Demanda Potencial', route('demandapotencial.index'));
 });




// basecertificacion
Breadcrumbs::for('basecertificacion', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Base Certificación', route('baseCertificacion.index'));
 });

Breadcrumbs::for('crearbasecertificacion', function(BreadcrumbTrail $trail){
 	$trail->parent('basecertificacion');
 	$trail->push('Crear Base Certificación', route('baseCertificacion.create'));
 });


Breadcrumbs::for('editarbasecertificacion', function(BreadcrumbTrail $trail){
 	$trail->parent('basecertificacion');
 	$trail->push('Editar Base Certificación', route('baseCertificacion.edit', 'IdBaseCertificación'));
 });


//Matriz de Cumplimiento
Breadcrumbs::for('progMatrizCumplimiento', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Matriz Cumplimiento - Programas', route('baseCertificacion.index'));
 });

//CMD
Breadcrumbs::for('progCMD', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('CMD - Programas', route('baseCertificacion.index'));
 });
Breadcrumbs::for('matrizCMD', function(BreadcrumbTrail $trail){
 	$trail->parent('progCMD');
 	$trail->push('CMD - Matriz', route('baseCertificacion.index'));
 });

// Especialidades Certificación


Breadcrumbs::for('especialidadescertificacion', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Especialidades Certificación', route('especialidades.index'));
 });


Breadcrumbs::for('crearespecialidadecertificacion', function(BreadcrumbTrail $trail){
 	$trail->parent('basecertificacion');
 	$trail->push('Crear Especialidad Certificación', route('especialidades.create'));
 });

// Tipo de auditoria

Breadcrumbs::for('tipoauditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tipo Auditoria', route('tipoAuditoria.index'));
 });

Breadcrumbs::for('editar_tipoAuditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('tipoauditoria');
 	$trail->push('Editar Tipo Auditoria', route('tipoAuditoria.edit', 'IdTipoAuditoria'));
 });


 //Criterios Crear
Breadcrumbs::for('criterios', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Criterios', route('criteriosAuditoria.index'));
});

//Editar Criterio
Breadcrumbs::for('edit_criterio', function(BreadcrumbTrail $trail){
	$trail->parent('criterios');
	$trail->push('Editar criterio');
});


// Auditoria

Breadcrumbs::for('auditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Auditorias', route('auditoria.index'));
 });

Breadcrumbs::for('crear_auditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('auditoria');
 	$trail->push('Crear Auditoria', route('auditoria.create'));
 });

Breadcrumbs::for('editar_auditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('auditoria');
 	$trail->push('Editar  Auditoria', route('auditoria.edit', 'IdAuditoria'));
 });


// planeInspeccion
Breadcrumbs::for('planinspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Planes Inspección', route('planeInspeccion.index'));
 });
 // planeInspeccion Detalle
Breadcrumbs::for('planinspeccionDetalle', function(BreadcrumbTrail $trail){
	$trail->parent('planinspeccion');
	$trail->push('Actividades de Inspección', route('planeInspeccion.index'));
});

Breadcrumbs::for('crear_plan_inspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('planinspeccion');
 	$trail->push('Crear Plan Inspección', route('planeInspeccion.create'));
 });


Breadcrumbs::for('editar_plan_inspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('planinspeccion');
 	$trail->push('Editar Plan Inspección', route('planeInspeccion.edit', 'IdPlanInspeccion'));
 });

// informe Inspeccion

Breadcrumbs::for('informeinspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informes Inspección', route('informeInspeccion.index'));
 });

Breadcrumbs::for('crear_informe_inspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('informeinspeccion');
 	$trail->push('Crear Informe Inspección', route('informeInspeccion.create'));
 });


Breadcrumbs::for('editar_informe_inspeccion', function(BreadcrumbTrail $trail){
 	$trail->parent('informeinspeccion');
 	$trail->push('Editar Informe Inspección', route('informeInspeccion.edit', 'IdCrearInforme'));
 });

// seguimientoCausaRaiz

Breadcrumbs::for('seguimientocausaraiz', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Seguimientos Causa Raiz', route('seguimientoCausaRaiz.index'));
});

Breadcrumbs::for('seguimientocausaraizporcentaje', function(BreadcrumbTrail $trail){
	$trail->parent('seguimientocausaraiz');
	$trail->push('Seguimientos Causa Raiz - Actividad', route('seguimientoCausaRaiz.index'));
});

Breadcrumbs::for('crear_seguimientocausaraiz', function(BreadcrumbTrail $trail){
 	$trail->parent('seguimientocausaraiz');
 	$trail->push('Crear Seguimiento Causa Raiz', route('seguimientoCausaRaiz.create'));
 });

Breadcrumbs::for('editar_seguimientocausaraiz', function(BreadcrumbTrail $trail){
 	$trail->parent('seguimientocausaraiz');
 	$trail->push('Editar Seguimiento Causa Raiz', route('seguimientoCausaRaiz.edit', 'IdSeguimiento'));
 });


// informeplaninspeccionfinal

Breadcrumbs::for('informeplaninspeccionfinal', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Plan Inspección Final', route('informeplaninspeccionfinal.index'));
 });

Breadcrumbs::for('ver_planinspeccionfinal', function(BreadcrumbTrail $trail){
 	$trail->parent('informeplaninspeccionfinal');
 	$trail->push('Informe Plan Final de Inspección', route('seguimientoCausaRaiz.show', 'informeinspeccion' ));
 });


// informeplanmejora
Breadcrumbs::for('informeplanmejora', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informes Plan MEJORAMIENTO', route('informeplanmejora.index'));
 });

Breadcrumbs::for('ver_planmejora', function(BreadcrumbTrail $trail){
 	$trail->parent('informeplanmejora');
 	$trail->push('Informe Plan de MEJORAMIENTO (Hallazgos)', route('informeplanmejora.show', 'informemejora'));
 });


// informeinspeccionicfr03

Breadcrumbs::for('informeinspeccionicfr03', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('INFORMES DE INSPECCIÓN', route('informeinspeccionicfr03.index'));
 });

Breadcrumbs::for('ver_informeinspeccionicfr03', function(BreadcrumbTrail $trail){
 	$trail->parent('informeinspeccionicfr03');
 	$trail->push('INFORME DE INSPECCIÓN', route('informeinspeccionicfr03.show', 'audiorias'));
 });

// informeinspeccionicfr08

Breadcrumbs::for('informeinspeccionicfr08', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('INFORME DE INSPECCIÓN Y SEGUIMIENTO ', route('informeinspeccionicfr08.index'));
 });

Breadcrumbs::for('ver_informeinspeccionicfr09', function(BreadcrumbTrail $trail){
 	$trail->parent('informeinspeccionicfr08');
 	$trail->push('INFORME DE INSPECCIÓN Y SEGUIMIENTO DE ACCIONES CORRECTIVAS', route('informeinspeccionicfr08.show', 'informeinspeccionicfr08'));
 });

// informeseguimientoconsolidado

Breadcrumbs::for('informeseguimientoconsolidado', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('INFORME ANALISIS DE CAUSAS', route('informeseguimientoconsolidado.index'));
 });

Breadcrumbs::for('ver_informeseguimientoconsolidado', function(BreadcrumbTrail $trail){
 	$trail->parent('informeseguimientoconsolidado');
 	$trail->push('INFORME ANALISIS DE CAUSAS', route('informeseguimientoconsolidado.show', 'informeseguimientoconsolidado'));
 });

// informeanotacionesseguimiento

Breadcrumbs::for('informeanotacionesseguimiento', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Anotaciones con Seguimiento', route('informeanotacionesseguimiento.index'));
 });

Breadcrumbs::for('ver_informeanotacionesseguimiento', function(BreadcrumbTrail $trail){
 	$trail->parent('informeanotacionesseguimiento');
 	$trail->push('Informe', route('informeanotacionesseguimiento.show', 'informeseguimientoconsolidado'));
 });

// informevisitaacompanamiento

Breadcrumbs::for('informevisitaacompanamiento', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Visita y Acompañamiento', route('informevisitaacompanamiento.index'));
 });

// pending as no show was found under controller

// Breadcrumbs::for('ver_informevisitaacompanamiento', function(BreadcrumbTrail $trail){
//  	$trail->parent('informevisitaacompanamiento');
//  	$trail->push('Informe', route('informevisitaacompanamiento.show', 'informeseguimientoconsolidado'));
//  });

// informehallazgosgenerados

Breadcrumbs::for('informehallazgosgenerados', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Hallazgos Generados', route('informehallazgosgenerados.index'));
 });


// APACxAuditoria

Breadcrumbs::for('APACxAuditoria', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Consolidado AP AC x Auditoria', route('APACxAuditoria.index'));
 });

// Informacion produccion

Breadcrumbs::for('informacion_produccion', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Información de Producción', route('informacionproduccion.index') );
});

Breadcrumbs::for('detalle_informacion_produccion', function(BreadcrumbTrail $trail){
	$trail->parent('informacion_produccion');
	$trail->push('Detalle producción', 'IdEmpresa');
});


// Informacion crearespecialidadecertificacion

Breadcrumbs::for('informacion_calidad', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Información de Calidad', route('informacioncalidad.index'));
});


Breadcrumbs::for('detalle_informacion_calidad', function(BreadcrumbTrail $trail){
	$trail->parent('informacion_calidad');
	$trail->push('Detalle', 'IdEmpresa');
});

// oferta comercial
Breadcrumbs::for('ofertas_comerciales', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Ofertas Comerciales', route('ofertacomercial.index'));
});


// GestionRecursos

//Especialidades
Breadcrumbs::for('especialidades', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Especialidades FAC', route('especialidades.index'));
 });


Breadcrumbs::for('editar_especialidades', function(BreadcrumbTrail $trail){
 	$trail->parent('especialidades');
 	$trail->push('Editar Especialidades FAC', route('especialidades.edit', 'IdTipoAuditoria'));
 });


// Capacitacion Programas SECAD
Breadcrumbs::for('cursos', function(BreadcrumbTrail $trail){
	$trail->parent('dashboard');
	$trail->push('Crear Cursos', route('cursos.index') );
});

Breadcrumbs::for('crear_cursos', function(BreadcrumbTrail $trail){
	$trail->parent('cursos');
	$trail->push('Crear Cursos', route('cursos.store', 'IdCurso'));
});

Breadcrumbs::for('editar_cursos', function(BreadcrumbTrail $trail){
	$trail->parent('cursos');
	$trail->push('Editar Cursos', route('cursos.edit', 'IdCurso'));
});


//Especialidades
Breadcrumbs::for('cargos', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Cargos', route('cargos.index'));
 });

Breadcrumbs::for('editar_cargos', function(BreadcrumbTrail $trail){
 	$trail->parent('cargos');
 	$trail->push('Editar Cargos', route('cargos.edit', 'IdCargo'));
 });


//Perfil Certificacion
Breadcrumbs::for('nivelComp', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Nivel Competencia', route('nivelCompetencia.index'));
 });

Breadcrumbs::for('editar_nivelComp', function(BreadcrumbTrail $trail){
 	$trail->parent('nivelComp');
 	$trail->push('Editar Nivel Competencia', route('nivelCompetencia.edit', 'IdNivelCompetencia'));
 });

//Personal
Breadcrumbs::for('personal', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Personal', route('personal.index'));
 });

Breadcrumbs::for('crear_personal', function(BreadcrumbTrail $trail){
 	$trail->parent('personal');
 	$trail->push('Crear Personal', route('personal.create'));
 });

Breadcrumbs::for('editar_personal', function(BreadcrumbTrail $trail){
 	$trail->parent('personal');
 	$trail->push('Editar Personal', route('personal.edit', 'IdPersonal'));
 });

//EAC
Breadcrumbs::for('eac', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Escialidades Aeronautica de Certificacion EAC', route('eac.index'));
 });

Breadcrumbs::for('editar_eac', function(BreadcrumbTrail $trail){
 	$trail->parent('eac');
 	$trail->push('Editar Escialidades Aeronautica de Certificacion EAC', route('eac.edit', 'IdEspecialidadCertificacion'));
 });

//CostosHH
Breadcrumbs::for('costoshh', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Costos H/H', route('costoshh.index'));
 });

Breadcrumbs::for('editar_costoshh', function(BreadcrumbTrail $trail){
 	$trail->parent('costoshh');
 	$trail->push('Editar Costos H/H', route('costoshh.edit', 'IdGrado'));
 });

//EAC Contenido Tematico
Breadcrumbs::for('eacContenidoTematico', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('EAC Contenido Tematico', route('contenidoTematico.index'));
 });

Breadcrumbs::for('ver_ContenidoTematico', function(BreadcrumbTrail $trail){
 	$trail->parent('eacContenidoTematico');
 	$trail->push('Contenido Tematico', route('contenidoTematico.show', 'IdEspecialidadCertificacion'));
 });

Breadcrumbs::for('editar_ContenidoTematico', function(BreadcrumbTrail $trail){
 	$trail->parent('ver_ContenidoTematico');
 	$trail->push('Editar Contenido Tematico', route('contenidoTematico.edit', 'IdContenidoTematico'));
 });

//Requisitos Niveles Competencia
Breadcrumbs::for('nivelesComp', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Niveles Competencia', route('requisitosNivelCompe.index'));
 });

Breadcrumbs::for('ver_requisitosnilves', function(BreadcrumbTrail $trail){
 	$trail->parent('nivelesComp');
 	$trail->push('Requisitos Niveles Competencia', route('requisitosNivelCompe.show', 'IdNivelCompetencia'));
 });

Breadcrumbs::for('editar_requisitosnilves', function(BreadcrumbTrail $trail){
 	$trail->parent('ver_requisitosnilves');
 	$trail->push('Editar Requisitos Niveles Competencia', route('requisitosNivelCompe.edit', 'IdRequisitosCompetencia'));
 });

//Requisitos Cargos
Breadcrumbs::for('cargosReq', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Cargos', route('requisitosCargo.index'));
 });

Breadcrumbs::for('ver_cargosReq', function(BreadcrumbTrail $trail){
 	$trail->parent('cargosReq');
 	$trail->push('Requisitos Cargos', route('requisitosCargo.show', 'IdCargo'));
 });

Breadcrumbs::for('ver_cursoscargos', function(BreadcrumbTrail $trail){
 	$trail->parent('cargosReq');
 	$trail->push('Ver Cursos Cargos', route('requisitosCargo.edit', 'IdRequisitosCargo'));
 });


//Informes
//Hoja de vida
Breadcrumbs::for('informehojadevida', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Hoja de Vida', route('informehojadevida.index'));
 });

Breadcrumbs::for('ver_informehojadevida', function(BreadcrumbTrail $trail){
 	$trail->parent('informehojadevida');
 	$trail->push('Informe Hoja de Vida', route('informehojadevida.show', 'informehojadevida'));
 });
//TotalPersonal
Breadcrumbs::for('informetotalpersonal', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Total Personal', route('informetotalpersonal.index'));
 });

//Personal SECAD
Breadcrumbs::for('informepersonalareasecad', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Personal SECAD', route('informepersonalareasecad.index'));
 });

Breadcrumbs::for('ver_informepersonalareasecad', function(BreadcrumbTrail $trail){
 	$trail->parent('informepersonalareasecad');
 	$trail->push('Informe Personal SECAD', route('informepersonalareasecad.show', 'informepersonalareasecad'));
 });

//Personal Especialidad
Breadcrumbs::for('informepersonalespecialidad', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Personal Especialidad', route('informepersonalespecialidad.index'));
 });

Breadcrumbs::for('ver_informepersonalespecialidad', function(BreadcrumbTrail $trail){
 	$trail->parent('informepersonalespecialidad');
 	$trail->push('Informe Personal Especialidad', route('informepersonalespecialidad.show', 'informepersonalespecialidad'));
 });

//Personal Perfil
Breadcrumbs::for('informepersonalperfil', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Personal Perfil', route('informepersonalperfil.index'));
 });

Breadcrumbs::for('ver_informepersonalperfil', function(BreadcrumbTrail $trail){
 	$trail->parent('informepersonalperfil');
 	$trail->push('Informe Personal Perfil', route('informepersonalperfil.show', 'informepersonalperfil'));
 });

//Personal Personal H/H
Breadcrumbs::for('informecostohh', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Costo H/H', route('informecostohh.index'));
 });

//Personal Cursos Funcionario
Breadcrumbs::for('informecursosfuncionario', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Cursos Funcionario', route('informecursosfuncionario.index'));
 });

Breadcrumbs::for('ver_informecursosfuncionario', function(BreadcrumbTrail $trail){
 	$trail->parent('informecursosfuncionario');
 	$trail->push('Informe Cursos Funcionario', route('informecursosfuncionario.show', 'informecursosfuncionario'));
 });

//Personal Cursos
Breadcrumbs::for('informecurso', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Cursos ', route('informecurso.index'));
 });

Breadcrumbs::for('ver_informecurso', function(BreadcrumbTrail $trail){
 	$trail->parent('informecurso');
 	$trail->push('Informe Cursos ', route('informecurso.show', 'informecurso'));
 });

//Personal Familiares
Breadcrumbs::for('familiares', function(BreadcrumbTrail $trail){
 	$trail->parent('personal');
 	$trail->push('Familiares', route('familiares.index'));
 });

Breadcrumbs::for('editar_familiares', function(BreadcrumbTrail $trail){
 	$trail->parent('familiares');
 	$trail->push('Editar Familiares', route('familiares.edit', 'IdFamiliar'));
 });

//Personal Cursos
Breadcrumbs::for('cursosPersonal', function(BreadcrumbTrail $trail){
 	$trail->parent('personal');
 	$trail->push('Cursos', route('cursosPersonal.index'));
 });


//Personal Total Cursos
Breadcrumbs::for('informetotalcursos', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Informe Total Cursos ', route('informetotalcursos.index'));
 });

//Productos
Breadcrumbs::for('productos', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Productos Aeronauticos', route('productos.index'));
 });

Breadcrumbs::for('crear_productos', function(BreadcrumbTrail $trail){
 	$trail->parent('productos');
 	$trail->push('Crear Productos Aeronauticos', route('productos.create'));
 });

Breadcrumbs::for('editar_productos', function(BreadcrumbTrail $trail){
 	$trail->parent('productos');
 	$trail->push('Editar Productos Aeronauticos', route('productos.create'));
 });
 Breadcrumbs::for('notas_productos', function(BreadcrumbTrail $trail){
  	$trail->parent('productos');
  	$trail->push('Notas Producto Aeronautico', route('productos.index'));
  });

 //PCA
 Breadcrumbs::for('pca', function(BreadcrumbTrail $trail){
  	$trail->parent('dashboard');
  	$trail->push('Plan Certificación Anual', route('PlanCertificacion.index'));
  });

 Breadcrumbs::for('crear_pca', function(BreadcrumbTrail $trail){
  	$trail->parent('pca');
  	$trail->push('Crear Plan Certificación Anual', route('PlanCertificacion.create'));
  });

 Breadcrumbs::for('editar_pca', function(BreadcrumbTrail $trail){
  	$trail->parent('pca');
  	$trail->push('Editar Plan Certificación Anual', route('PlanCertificacion.create'));
  });

	Breadcrumbs::for('notas_pca', function(BreadcrumbTrail $trail){
		 $trail->parent('pca');
		 $trail->push('Notas Plan Certificación Anual', route('PlanCertificacion.index'));
	 });


Breadcrumbs::for('lista_personal', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Lista Personal');
});

Breadcrumbs::for('asignar_usuario', function(BreadcrumbTrail $trail){
    $trail->parent('lista_personal');
    $trail->push('Asignar Usuario', route('asignarusuario.create'));
});


Breadcrumbs::for('balanceo', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Balanceo Mano de Obra');
});

Breadcrumbs::for('consultahoraslaborales', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('H/H ingresadas(TDIN)');
});

// Convenios

 Breadcrumbs::for('convenios', function(BreadcrumbTrail $trail){
 	$trail->parent('dashboard');
 	$trail->push('Tablas Convenios', route('convenio.index'));
 });

 Breadcrumbs::for('editar_convenio', function(BreadcrumbTrail $trail){
 	$trail->parent('convenios');
 	$trail->push('Editar Convenios');
 });


//Control Proyecto Fomento Aeronautico 1234abcd
Breadcrumbs::for('controlProyectos', function(BreadcrumbTrail $trail){
 $trail->parent('dashboard');
 $trail->push('Crear Proyectos', route('controlProyectos.index'));
});

//Editar proyecto
 Breadcrumbs::for('edit', function(BreadcrumbTrail $trail){
 	$trail->parent('controlProyectos');
 	$trail->push('Editar Proyecto');
 });

  // Estados programa

Breadcrumbs::for('informeProyectos', function(BreadcrumbTrail $trail){
$trail->parent('dashboard');
$trail->push('Informe Proyectos', route('informeControlProyectos.index'));
});

 //observaciones proyecto
  Breadcrumbs::for('observacionesControlProyectos', function(BreadcrumbTrail $trail){
  	$trail->parent('controlProyectos');
  	$trail->push('Crear Observación del Proyecto');
  });

	Breadcrumbs::for('observacionesControlProyectosEdit', function(BreadcrumbTrail $trail){
  	$trail->parent('observacionesControlProyectos');
  	$trail->push('Editar Observación');
  });

	//Informe Observaciones
	Breadcrumbs::for('informeObservacionesProyectos', function(BreadcrumbTrail $trail){
	 $trail->parent('dashboard');
	 $trail->push('Historial de Observaciones', route('informeObservaciones.index'));
	});

	Breadcrumbs::for('informeObservacionesProyectosVisual', function(BreadcrumbTrail $trail){
	 $trail->parent('informeObservacionesProyectos');
	 $trail->push('Informe Observaciones', route('informeObservaciones.index'));
	});
 //Informes Fomento Aeronautico
 Breadcrumbs::for('informeControlProyectos', function(BreadcrumbTrail $trail) {
     $trail->parent('dashboard');
     $trail->push('Informes Proyectos', route('informeControlProyectos.index'));
 });

 //Informe funcionarios Auditorias
 Breadcrumbs::for('informeFuncionarioAuditoriaVer', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Informes Funcionarios por Auditorias', route('informeFuncionariosAuditorias.index'));
});
//informe Visual
Breadcrumbs::for('informeFuncionarioAuditoriaVisual', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Informe H/H Auditorias por funcionario', route('informeFuncionariosAuditorias.index'));
});

?>