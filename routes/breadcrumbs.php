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

Breadcrumbs::for('lista_dinamica', function(BreadcrumbTrail $trail) {
	$trail->parent('nombre_lista');
	$trail->push('Listas Valores', route('listasvalores.indice', '$nombre_lista_id'));
});

Breadcrumbs::for('aeronaves', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Aeronaves', route('aeronave.index'));
});

Breadcrumbs::for('unidades', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Unidades', route('unidad.index'));
});

Breadcrumbs::for('ata', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Ver ATA', route('ata.index'));
});

Breadcrumbs::for('estadosprograma', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Estados Programa', route('estadosprograma.index'));
});

Breadcrumbs::for('tiposprograma', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Tipo de Programa', route('tipoprograma.index'));
});

Breadcrumbs::for('basecertificacion', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Base Certificación', route('baseCertificacion.index'));
});

Breadcrumbs::for('productos', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Productos Aeronauticos', route('productos.index'));
});

Breadcrumbs::for('crear_productos', function(BreadcrumbTrail $trail) {
	$trail->parent('productos');
	$trail->push('Crear Productos Aeronauticos', route('productos.create'));
});

Breadcrumbs::for('demandaPotencialImpacto', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Demanda Potencial', route('demandapotencial.index'));
});

Breadcrumbs::for('programa', function(BreadcrumbTrail $trail) {
	$trail->parent('dashboard');
	$trail->push('Tabla Programas', route('programa.index'));
});