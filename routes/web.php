<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\RolPrivilegioController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\UsuarioRolController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Param\ListaController;
use App\Http\Controllers\Param\ListaDinamicaController;
use App\Http\Controllers\ActividadesEconomicasController; 
use App\Http\Controllers\ActividadesHallazgoController; 
use App\Http\Controllers\ActividadesInspeccionesController; 
use App\Http\Controllers\ActividadesTipoController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\AeronaveController; 
use App\Http\Controllers\AfiliadoController; 
use App\Http\Controllers\AnotacionesController; 
use App\Http\Controllers\AnotacionesEstadoParcialController; 
use App\Http\Controllers\AnotacionesXObjetoController; 
use App\Http\Controllers\APACxAuditoriaController; 
use App\Http\Controllers\ApiRestUsersAllController; 
use App\Http\Controllers\AprobacionMocsMatrizController; 
use App\Http\Controllers\AreasCooperacionController; 
use App\Http\Controllers\AreasCooperacionIndustrialController; 
use App\Http\Controllers\AsignarUsuarioController; 
use App\Http\Controllers\AsignarUsuarioEmpresaController; 
use App\Http\Controllers\AtaController; 
use App\Http\Controllers\AuditoriaController; 
use App\Http\Controllers\BancosController; 
use App\Http\Controllers\BaseCertificacionController; 
use App\Http\Controllers\BasesCertificacionProgramaController; 
use App\Http\Controllers\CapacidadesEmpresaController; 
use App\Http\Controllers\CaracteristicaEmpresaController; 
use App\Http\Controllers\CargosController; 
use App\Http\Controllers\CausaRaizController; 
use App\Http\Controllers\ClusterController; 
use App\Http\Controllers\CMDControlConfiguracionController; 
use App\Http\Controllers\CMDEvidenciasCaracteristicasController; 
use App\Http\Controllers\CMDEvidenciasController; 
use App\Http\Controllers\CMDEvidenciasInspeccionConformidadController; 
use App\Http\Controllers\CMDEvidenciasManteniAeronavegaCompController; 
use App\Http\Controllers\CMDEvidenciasManufacturaController; 
use App\Http\Controllers\CMDEvidenciasSSAController; 
use App\Http\Controllers\CMDProgramasConsultarController; 
use App\Http\Controllers\CMDProgramasController; 
use App\Http\Controllers\ConsolidadoProgramaXTipoController; 
use App\Http\Controllers\ConsolidadoXfuenteController; 
use App\Http\Controllers\ConsolidadoXProgramaCalidadController; 
use App\Http\Controllers\ConsultaHorasLaboradasController; 
use App\Http\Controllers\ContenidoTematicoController; 
use App\Http\Controllers\ContratosAnualController; 
use App\Http\Controllers\ControlContratosController; 
use App\Http\Controllers\ControlProyectosController; 
use App\Http\Controllers\ConveniosController; 
use App\Http\Controllers\CostosHHController; 
use App\Http\Controllers\CriteriosController; 
use App\Http\Controllers\CursosCargoController; 
use App\Http\Controllers\CursosController; 
use App\Http\Controllers\CursosFormacionController; 
use App\Http\Controllers\CursosPersonalController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\DemandaPotencialController; 
use App\Http\Controllers\DetalleProgramaController; 
use App\Http\Controllers\DynamicDependent; 
use App\Http\Controllers\EACController; 
use App\Http\Controllers\EmpresasController; 
use App\Http\Controllers\EnsayosController; 
use App\Http\Controllers\EspecialidadesController; 
use App\Http\Controllers\EspecialistasSeguimientoController; 
use App\Http\Controllers\EstadosProgramaController; 
use App\Http\Controllers\EventoController; 
use App\Http\Controllers\EvidenciaRequisitoController; 
use App\Http\Controllers\EvidenciasMOCReqController; 
use App\Http\Controllers\EvidenciasMocsMatrizController; 
use App\Http\Controllers\FamiliaresController; 
use App\Http\Controllers\FCARController; 
use App\Http\Controllers\FCARMocController;
use App\Http\Controllers\FuncionariosEmpresaController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\InformacionCalidadController; 
use App\Http\Controllers\InformacionProduccionController; 
use App\Http\Controllers\InformeActualizacionesEmpController; 
use App\Http\Controllers\InformeAfiliadosClusterController; 
use App\Http\Controllers\InformeAnotacionesSeguimientoController; 
use App\Http\Controllers\InformeAreasXCooperacionIndustrialController; 
use App\Http\Controllers\InformeAsistenciaController; 
use App\Http\Controllers\InformeBalanceoManoObraController; 
use App\Http\Controllers\InformeCantidadAanotacionesController; 
use App\Http\Controllers\InformeCapacidadTotalPaisController; 
use App\Http\Controllers\InformeControlContratosController; 
use App\Http\Controllers\informeControlObservacionesController; 
use App\Http\Controllers\InformeControlProyectosController; 
use App\Http\Controllers\InformeConveniosController; 
use App\Http\Controllers\InformeCostoHHController; 
use App\Http\Controllers\InformeCuadroEmpresasController; 
use App\Http\Controllers\InformeCursoController; 
use App\Http\Controllers\InformeCursosFuncionarioController; 
use App\Http\Controllers\InformeDinamicoEmpresaController; 
use App\Http\Controllers\InformeEmpresasController; 
use App\Http\Controllers\InformeEmpresasXSectorController; 
use App\Http\Controllers\InformeEscarapelasController; 
use App\Http\Controllers\informeFuncionariosAuditoriasController; 
use App\Http\Controllers\InformeFuncionariosEmpresaController; 
use App\Http\Controllers\InformeHallazgosGeneradosController; 
use App\Http\Controllers\InformeHistorialProgramaController; 
use App\Http\Controllers\InformeHojaDeVidaController; 
use App\Http\Controllers\InformeInspeccionController; 
use App\Http\Controllers\InformeInspeccionIcfr03Controller; 
use App\Http\Controllers\InformeInspeccionIcfr08Controller; 
use App\Http\Controllers\InformeLAFR212Controller; 
use App\Http\Controllers\InformeMatrizCumplimientoProgramaController; 
use App\Http\Controllers\InformeObservacionesController; 
use App\Http\Controllers\InformeOfertasPorCapacidadController; 
use App\Http\Controllers\InformeOfertasPorCiudadController; 
use App\Http\Controllers\InformeOfertasSectorAeronauticoController; 
use App\Http\Controllers\InformePersonalAreaSECADController; 
use App\Http\Controllers\InformePersonalEspecialidadController; 
use App\Http\Controllers\InformePersonalHHController; 
use App\Http\Controllers\InformePersonalPerfilController; 
use App\Http\Controllers\InformePlanCapacitacionController; 
use App\Http\Controllers\InformePlanInspeccionFinalController; 
use App\Http\Controllers\InformePlanMejoraController; 
use App\Http\Controllers\InformeResumenClusterController; 
use App\Http\Controllers\InformeResumenProgramaController; 
use App\Http\Controllers\InformeSeguimientoConsolidadoController; 
use App\Http\Controllers\InformeTotalCursosController; 
use App\Http\Controllers\InformeTotalEmpresasController; 
use App\Http\Controllers\InformeTotalOfertasxCiudadController; 
use App\Http\Controllers\InformeTotalOfertasxPaisController; 
use App\Http\Controllers\InformeTotalPersonalController; 
use App\Http\Controllers\InformeVisitaAcompanamientoController;
use App\Http\Controllers\ListadoDemandaPotencialController; 
use App\Http\Controllers\ListadoMatrizCumplimientoController; 
use App\Http\Controllers\ListaSegProgActEmpController; 
use App\Http\Controllers\ListaSeguimientoProgActController; 
use App\Http\Controllers\ListaSeguimientoProgController; 
use App\Http\Controllers\ListasSegProgEmpController; 
use App\Http\Controllers\MailController; 
use App\Http\Controllers\MatrizComplimientoRequisitosProgController; 
use App\Http\Controllers\MatrizCumplimientoController; 
use App\Http\Controllers\MocController; 
use App\Http\Controllers\MocsSubparteController; 
use App\Http\Controllers\NivelCompetenciaController; 
use App\Http\Controllers\NUEREPADICController; 
use App\Http\Controllers\ObservacionesContratoController; 
use App\Http\Controllers\ObservacionesLAFR212Controller; 
use App\Http\Controllers\ObservacionesProgramaLAFR212Controller; 
use App\Http\Controllers\ObservacionProyectoController; 
use App\Http\Controllers\OfertasComercialesController; 
use App\Http\Controllers\OrganizacionXAuditoriaController; 
use App\Http\Controllers\PagesController; 
use App\Http\Controllers\ParticipantesEventoController; 
use App\Http\Controllers\PDFController; 
use App\Http\Controllers\PerfilController; 
use App\Http\Controllers\PersonalController; 
use App\Http\Controllers\PlanCapacitacionController; 
use App\Http\Controllers\PlanCertificacionController; 
use App\Http\Controllers\PlanInspeccionController; 
use App\Http\Controllers\ProcesosController; 
use App\Http\Controllers\ProductosController; 
use App\Http\Controllers\ProgramaController; 
use App\Http\Controllers\ProgramasBancosController; 
use App\Http\Controllers\ProgramasEnsayosController; 
use App\Http\Controllers\ProgramasEspecialidadesController; 
use App\Http\Controllers\RequisitosCargoController; 
use App\Http\Controllers\RequisitosNivelCompetenciaController; 
use App\Http\Controllers\RiesgoProgramaController; 
use App\Http\Controllers\RiesgoProgramaSeguimientoController; 
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeguimientoCausaRaizController;
use App\Http\Controllers\SeguimientoController; 
use App\Http\Controllers\SeguimientoEmpresaController; 
use App\Http\Controllers\SeguimientoPercentage; 
use App\Http\Controllers\SistemaCertificacionCalidadController; 
use App\Http\Controllers\TipoAuditoriaController; 
use App\Http\Controllers\TipoProgramaController; 
use App\Http\Controllers\UnidadController; 
use App\Http\Controllers\VistaBalanceoManoObraController; 
use App\Http\Controllers\VistaHHAuditoriasController; 
use App\Http\Controllers\VistaHHAuditoriasController2; 
use App\Http\Controllers\VistaProgramasCompController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index']);

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('usuario', UsuarioController::class);
    Route::resource('usuariorol', UsuarioRolController::class);
    Route::get('usuariorol/asignar/{id}', [UsuarioRolController::class, 'asignarRol'])->name('asignar.rol');
    Route::post('usuariorol/asignar/crear', [UsuarioRolController::class, 'crearAsignar'])->name('crear.asignar');
    Route::get('usuariorol/asignar/eliminar/{id}', [UsuarioRolController::class, 'eliminarAsignar'])->name('eliminar.asignar');

    Route::resource('rol', RolController::class);
    Route::resource('rolprivilegio', RolPrivilegioController::class);
    Route::get('rolprivilegio/privilegio/{id}', [RolPrivilegioController::class, 'getRolPrivilegiosById'])->name('rolprivilegio.indice');
    Route::get('rolprivilegio/privilegio/crear/{id}', [RolPrivilegioController::class, 'createRolPrivilegio'])->name('rolprivilegio.crear');
    Route::post('rolprivilegio/privilegio/eliminar', [RolPrivilegioController::class, 'eliminarPrivilegios'])->name('rolprivilegio.eliminar');

    Route::resource('nombrelista', ListaController::class);
    Route::resource('listasvalores', ListaDinamicaController::class);
    Route::get('listasvalores/lista/{id}', [ListaDinamicaController::class, 'getListasValoresById'])->name('listasvalores.indice');

    Route::post('editata', [AtaController::class,'editAta'])->name('editAta');
    Route::delete('deleteata/{idata}', [AtaController::class,'deleteAta']);
    Route::resource('ata', AtaController::class);
    
    // -------------mocs ---------------//
    Route::get('/mocs', [MocController::class,'readMocs'])->name('readmocs');
    Route::post('addmoc', [MocController::class,'addMoc'])->name('addmoc');
    Route::post('editmoc', [MocController::class,'editMoc'])->name('editmoc');
    Route::delete('deletemoc/{idmoc}', [MocController::class,'deleteMoc'])->name('deletemoc');
    // -------------end mocs ---------------//
    
    Route::resource('empresa', EmpresasController::class);
    
    // -----produccion ----//
    Route::post('/storecaracteristicasempresa', [InformacionProduccionController::class,'storeCaracteristicasEmpresa'])->name('storecaracteristicasempresa');
    Route::post('/storemercado', [InformacionProduccionController::class,'storeMercado'])->name('storemercado');
    Route::delete('deleteproductoffmm/{idproductoffmm}', [InformacionProduccionController::class,'deleteProductoFfmm']);
    Route::post('/storeproductosffmm', [InformacionProduccionController::class,'storeProductosffmm'])->name('storeproductosffmm');
    Route::delete('deletemateriaprima/{idmateriaprima}', [InformacionProduccionController::class,'deleteMateriaPrima']);
    Route::post('/storemateriaprima', [InformacionProduccionController::class,'storeMateriaPrima'])->name('storemateriaprima');
    Route::delete('deleteservicioofrecido/{idservicioofrecido}', [InformacionProduccionController::class,'deleteServicioOfrecido']);
    Route::post('/storeserviciosofrecidos', [InformacionProduccionController::class,'storeServiciosOfrecidos'])->name('storeserviciosofrecidos');
    Route::post('/storetecnologias', [InformacionProduccionController::class,'storeTecnologias'])->name('storetecnologias');
    Route::delete('deleteproductoofrecido/{idproductoofrecido}', [InformacionProduccionController::class,'deleteProductoOfrecido']);
    Route::post('/storeproductosofrecidos', [InformacionProduccionController::class,'storeProductosOfrecidos'])->name('storeproductosofrecidos');
    Route::post('/storeproduccionempresa', [InformacionProduccionController::class,'storeProduccionEmpresa'])->name('storeproduccionempresa');
    Route::resource('informacionproduccion', InformacionProduccionController::class);
    // -----/produccion ----//
    
    // -----Calidad -----_//
    Route::delete('deletegestioncalidadsi/{idsistemacalidad}', [InformacionCalidadController::class,'deleteGestionCalidadSi']);
    Route::post('/storegestioncalidadsi', [InformacionCalidadController::class,'storeGestionCalidadSi'])->name('storegestioncalidadsi');
    Route::post('/storegestioncalidadno', [InformacionCalidadController::class,'storeGestionCalidadNo'])->name('storegestioncalidadno');
    Route::delete('deleteaspectoestrategico/{idaspectoestrategico}', [InformacionCalidadController::class,'deleteAspectoEstrategico']);   
    Route::post('/storeaspectosestrategicos', [InformacionCalidadController::class,'storeAspectosEstrategicos'])->name('storeaspectosestrategicos');    
    Route::post('/storeaspectosestrategicos', [InformacionCalidadController::class,'storeAspectosEstrategicos']);    
    Route::resource('informacioncalidad', InformacionCalidadController::class);
    // ----/calidad ------- //    
       
    Route::post('editcapacidad', [CapacidadesEmpresaController::class,'editCapacidad']);    
    Route::delete('deletecapacidad/{idofertacomercial}', [CapacidadesEmpresaController::class,'deleteCapacidad']);    
    Route::resource('capacidadesEmpresa', CapacidadesEmpresaController::class);
    Route::delete('/deletefuncionario/{idfuncionario}', [FuncionariosEmpresaController::class,'deleteFuncionario'])->name('deletefuncionario');
    Route::post('/editfuncionario', [FuncionariosEmpresaController::class,'editFuncionario'])->name('editfuncionario');
    Route::resource('funcionariosEmpresa', FuncionariosEmpresaController::class);
    Route::delete('deletecluster/{idcluster}', [ClusterController::class,'deleteCluster'])->name('deletecluster');
    Route::post('editcluster', [ClusterController::class,'editCluster'])->name('editcluster');
    Route::resource('cluster', ClusterController::class);
    Route::resource('aeronave', AeronaveController::class);
    Route::delete('deleteunidad/{idunidad}', [UnidadController::class,'deleteUnidad']);
    Route::post('editunidad', [UnidadController::class,'editUnidad'])->name('editunidad');
    Route::resource('unidad', UnidadController::class);
    Route::resource('convenio', ConveniosController::class);
    
    Route::delete('/deleteparticipante/{idparticipante}', [ParticipantesEventoController::class,'deleteParticipante'])->name('deleteparticipante');
    Route::post('/editparticipante', [ParticipantesEventoController::class,'editParticipante'])->name('editparticipante');    
    Route::resource('participantesevento', ParticipantesEventoController::class);    
    Route::resource('evento', EventoController::class);
    
    // dependant dropdown with marco legal added    
    Route::get('anotacion/marcolegal/{id}',[AnotacionesController::class,'getMarcoLegal']);
    Route::resource('anotacion', AnotacionesController::class);
    Route::delete('deleteafiliado/{idafiliado}', [AfiliadoController::class,'deleteAfiliado'])->name('deleteafiliado');
    Route::post('editafiliado', [AfiliadoController::class,'editAfiliado'])->name('editafiliado');
    Route::resource('afiliado', AfiliadoController::class);
    
    // oferta comercial
    
    Route::post('editoferta', [OfertasComercialesController::class,'editOferta']);
    Route::delete('deleteoferta/{idoferta}', [OfertasComercialesController::class,'deleteOferta']);
    Route::resource('ofertacomercial', OfertasComercialesController::class);
    
    //
    
    //Route::get('fomento.variables.productos_servicios_aeronauticos', ['as' => 'productos_servicios_aeronauticos', 'uses' => 'PagesController@productosyServiciosAeronauticos']);
    Route::get('formento.variables.productos_servicios_aeronauticos', [PagesController::class, 'productosyServiciosAeronauticos'])->name('productos_servicios_aeronauticos');
    
    // Route::resource('criterio', 'CriteriosController');
    
    Route::post('edittipoprograma', [TipoProgramaController::class,'editTipoPrograma'])->name('edittipoprograma');
    
    Route::resource('tipoprograma', TipoProgramaController::class);
    
    Route::post('/storeprograma', [ProgramaController::class,'storePrograma'])->name('storeprograma');
    
    Route::post('/storeespecialidades', [ProgramaController::class,'storeEspecialidades'])->name('storeespecialidades');
    
    Route::post('/storebancos', [ProgramaController::class,'storeBancos'])->name('storebancos');

    Route::post('/storeensayos', [ProgramaController::class,'storeEnsayos'])->name('storeensayos');
    
    Route::delete('deleteespecialidad/{idespecialidad}', [ProgramaController::class,'deleteEspecialidad']);
    
    Route::delete('deletehorabanco/{idhorabanco}', [ProgramaController::class,'deleteHoraBanco']);
    
    Route::delete('deletehoraensayo/{idhoraensayo}', [ProgramaController::class,'deleteHoraEnsayo']);
    
    Route::resource('programa', ProgramaController::class);
    Route::resource('basesCertiPrograma', BasesCertificacionProgramaController::class);
    
    //Informe LAFR212
    Route::resource('obsercavionesfr212', ObservacionesLAFR212Controller::class);
    Route::resource('obsercavionesProgramafr212', ObservacionesProgramaLAFR212Controller::class);
    Route::resource('informelafr212', InformeLAFR212Controller::class);
    Route::resource('informehistorialprograma', InformeHistorialProgramaController::class);
    Route::post('pdftodb', [InformeResumenProgramaController::class,'pdftodb'])->name('pdftodb');
    Route::resource('informeresumenprograma', InformeResumenProgramaController::class);

    Route::get('informe/informelafr212/preview/{id}', [InformeLAFR212Controller::class, 'informe_preview'])->name('lafr212.informe.preview');
    Route::get('informe/informelafr212/{id}', [InformeLAFR212Controller::class, 'informe'])->name('lafr212.informe');
    
    Route::get('informe/informelafr212/preview/{id}', [InformeLAFR212Controller::class, 'informe_preview'])->name('lafr212.informe.preview');
    Route::get('informe/informelafr212/{id}', [InformeLAFR212Controller::class, 'informe'])->name('lafr212.informe');
    
    Route::resource('observaContratos', ObservacionesContratoController::class);
    Route::resource('detalleprograma', DetalleProgramaController::class);
    Route::resource('baseCertificacion', BaseCertificacionController::class);    
    
    // Route::resource('contenidos_programa', 'ContenidosController');    
    
    // Route::get('certificacion.variables.crear_criterio', ['as' => 'crear_criterios', 'uses' => 'PagesController::class,'crearCriterios' ]);    
    
    // Route::get('certificacion.variables.crear_equipo', ['as' => 'crear_equipo', 'uses' => 'PagesController@crearEquipo']);
    Route::get('certificacion.variables.crear_equipo', [PagesController::class, 'crearEquipo'])->name('crear_equipo');
    
    // Route::get('certificacion.variables.crear_especialidades_certificacion', ['as' => 'crear_especialidades', 'uses' => 'PagesController::class,'crearEspecialidadesCertificacion']);    
    
    //Route::get('certificacion.variables.crear_moc', ['as' => 'crear_moc', 'uses' => 'PagesController@crearMoc']);
    Route::get('certificacion.variables.crear_moc', [PagesController::class,'crearMoc'])->name('crear_moc');    
    
    //Route::get('certificacion.variables.crear_procesos_internos', ['as' => 'crear_procesos_internos', 'uses' => 'PagesController@crearProcesosInternos']);
    Route::get('certificacion.variables.crear_procesos_internos', [PagesController::class,'crearProcesosInternos'])->name('crear_procesos_internos');
    
    //Route::get('certificacion.variables.crear_requerimientos_pdr', ['as' => 'crear_requerimientos_pdr', 'uses' => 'PagesController@crearRequerimientosPdr']);
    Route::get('certificacion.variables.crear_requerimientos_pdr', [PagesController::class,'crearRequerimientosPdr'])->name('crear_requerimientos_pdr');
    
    //Route::get('certificacion.variables.crear_sitios', ['as' => 'crear_sitios', 'uses' => 'PagesController@crearSitios']);
    Route::get('certificacion.variables.crear_sitios', [PagesController::class, 'crearSitios'])->name('crear_sitios');    
    
    Route::delete('deleteestadoprograma/{idestadoprograma}', [EstadosProgramaController::class,'deleteEstadoPrograma'])->name('deleteestadoprograma');
    
    Route::post('editestadoprograma', [EstadosProgramaController::class,'editEstadoPrograma'])->name('editestadoprograma');
    
    Route::resource('estadosprograma', EstadosProgramaController::class);
    
    //****** Certificacion de productos *******
    Route::resource('productos', ProductosController::class);
    Route::post('pca', [ProductosController::class,'pca'])->name('productos.pca');
    Route::get('productos/{id}/notas', [ProductosController::class,'notas'])->name('productos.notas');
    Route::get('productos/{id}/aprobarnota', [ProductosController::class,'aprobarnota'])->name('productos.aprobarnota');
    
    Route::resource('PlanCertificacion', PlanCertificacionController::class);
    Route::get('PlanCertificacion/{id}/notas', [PlanCertificacionController::class,'notas'])->name('PlanCertificacion.notas');
    Route::get('PlanCertificacion/{id}/aprobarnota', [PlanCertificacionController::class,'aprobarnota'])->name('PlanCertificacion.aprobarnota');
    Route::get('pdf/{pca}', [PlanCertificacionController::class,'pdf']);
    
    Route::get('pruebashtml/{pca}', [PlanCertificacionController::class,'pruebahtml']); 
    
    Route::post('storedemandapotencial', [DemandaPotencialController::class,'storeDemandaPotencial'])->name('storedemandapotencial');
    
    Route::post('storeconsumorotacion', [DemandaPotencialController::class,'storeConsumoRotacion'])->name('storeconsumorotacion');
    
    Route::post('storefactibilidadtecnica', [DemandaPotencialController::class,'storeFactibilidadTecnica'])->name('storefactibilidadtecnica');
    
    Route::post('storeprioridaduma', [DemandaPotencialController::class,'storePrioridadUma'])->name('storeprioridaduma');
    
    Route::post('storevaloracioneconomica', [DemandaPotencialController::class,'storeValoracionEconomica'])->name('storevaloracioneconomica');
    
    Route::post('storevaloraciontecnica', [DemandaPotencialController::class,'storeValoracionTecnica'])->name('storevaloraciontecnica');
    
    Route::post('storeofertaaeronautica', [DemandaPotencialController::class,'storeOfertaAeronautica'])->name('storeofertaaeronautica');
       
    Route::delete('deleteofertaaeronautica/{idofertaaeronautica}', [DemandaPotencialController::class,'deleteOfertaAeronautica']);
    
    Route::delete('deletevaloraciontecnica/{idvaloraciontecnica}', [DemandaPotencialController::class,'deleteValoracionTecnica']);
    
    Route::delete('deletevaloracioneconomica/{idvaloracioneconomica}', [DemandaPotencialController::class,'deleteValoracionEconomica']);
    
    Route::delete('deleteprioridaduma/{idprioridaduma}', [DemandaPotencialController::class,'deletePrioridadUma']);
    
    Route::delete('deletefactibilidadtecnica/{idfactibilidad}', [DemandaPotencialController::class,'deleteFactibilidadTecnica']);
    
    Route::delete('deleteconsumorotacion/{idconsumorotacion}', [DemandaPotencialController::class,'deleteconsumorotacion']);
    
    Route::get('demandapotencial/afiliados/{id}', [DemandaPotencialController::class,'getAfiliados']);
    
    Route::resource('demandapotencial', DemandaPotencialController::class);
    
    Route::get('listademandapotencial/matriz',[ListadoDemandaPotencialController::class,'vmatrizDemandaPotencial']);
    Route::resource('listademandapotencial', ListadoDemandaPotencialController::class);
    
    Route::resource('listadomatrizcumplimiento', ListadoMatrizCumplimientoController::class);
       
    Route::post('/editactividad', [ActividadesTipoController::class,'editActividad'])->name('editactividad');
        
    Route::resource('actividadesTipoProg', ActividadesTipoController::class);
    
    //Seguimiento SECAD
    Route::resource('listasProyecto', ListaSeguimientoProgController::class); //Lista de Proyectos
    Route::resource('seguimientoActividades', ListaSeguimientoProgActController::class); //Seguimieto Actividades SeguimientoController
    Route::resource('seguimiento', SeguimientoController::class); //Seguimieto
    Route::resource('especialistasSeg', EspecialistasSeguimientoController::class); //Especialistas Seguimiento
    
    //Segumiento Empresas
    Route::resource('listasProyectoEmp', ListasSegProgEmpController::class); //Lista de Proyectos
    Route::resource('seguimientoActividadesEmp', ListaSegProgActEmpController::class); //Seguimieto Actividades SeguimientoController
    Route::resource('seguimientoEmp', SeguimientoEmpresaController::class); //Seguimieto
    
    //Matriz Cumplimiento
    Route::resource('matrizCumplimiento', MatrizCumplimientoController::class); //matriz
    Route::put('matrizCumplimiento/{id}/update_anexos', [MatrizCumplimientoController::class,'update_anexos'])->name('matrizCumplimiento.update_anexos');
    Route::put('matrizCumplimiento/{id}/update_aprobacion', [MatrizCumplimientoController::class,'update_aprobacion'])->name('matrizCumplimiento.update_aprobacion');
    Route::resource('requisitosMatrizCumpli', MatrizComplimientoRequisitosProgController::class); //Requsitos
    Route::resource('evidenciasMocReq', EvidenciasMOCReqController::class); //Evidencias
    Route::resource('evidenciasReq', EvidenciaRequisitoController::class); //Evidencias req
    Route::resource('fcarMoc', FCARMocController::class); //FCAR MOCs
    Route::resource('fcar', FCARController::class); //FCAR    
    
    Route::resource('informeMatrizCumpli', InformeMatrizCumplimientoProgramaController::class); //Evidencias req
    
    Route::get('vistaProgramas/vistaTipoEstado',[VistaProgramasCompController::class,'vProgramas']);
    Route::resource('vistaProgramas', VistaProgramasCompController::class); //Evidencias req
      
    Route::get('vistaBalanceo/vistaBalanceoManoObra',[VistaBalanceoManoObraController::class,'vBalanceo']);
    Route::resource('vistaBalanceo', VistaBalanceoManoObraController::class); //Evidencias req
    
    Route::get('consultahoraslaboradas/info', [ConsultaHorasLaboradasController::class,'vBalanceo']); //Evidencias req
    Route::resource('consultahoraslaboradas', ConsultaHorasLaboradasController::class);
       
    Route::resource('mocsSupartes', MocsSubparteController::class);
    Route::resource('evidenciasMocsSupartes', EvidenciasMocsMatrizController::class);
    Route::resource('aprobacionMocsSupartes', AprobacionMocsMatrizController::class);
    
    //CMD
    
    Route::resource('cmdProgramas', CMDProgramasController::class); //Seguimieto
    Route::resource('cmdProgramasConsultar', CMDProgramasConsultarController::class);
    Route::resource('cmdcontrolconfiguracion', CMDControlConfiguracionController::class);
    Route::resource('cmdEvidencias', CMDEvidenciasController::class);
    Route::resource('cmdEvidenciasCaracteristicas', CMDEvidenciasCaracteristicasController::class);
    Route::resource('cmdEvidenciasManufactura', CMDEvidenciasManufacturaController::class);
    Route::resource('cmdEvidenciasInspeccion', CMDEvidenciasInspeccionConformidadController::class);
    Route::resource('cmdEvidenciasSSA', CMDEvidenciasSSAController::class);
    Route::resource('cmdEvidenciasMAC', CMDEvidenciasManteniAeronavegaCompController::class);
    
    //RIESGOS PRODUCTOS POR PROGRAMAS
    Route::resource('riesgoprogramaseguimiento', RiesgoProgramaSeguimientoController::class);
    Route::resource('riesgoprograma', RiesgoProgramaController::class);
    Route::get('riesgoprograma/crear/{id}', [RiesgoProgramaController::class,'store'])->name('riesgoprograma.crear');
    Route::post('riesgoprograma/crear', [RiesgoProgramaController::class,'crear'])->name('riesgoprograma.creado');
       
    //****** End Certificacion de productos *******
    
    /*** Fomento Aeronautico ***/
    //*** Informes Empresas *****
    Route::resource('informeempresas', InformeEmpresasController::class);
    Route::resource('informeareasxcoopindustri', InformeAreasXCooperacionIndustrialController::class);
    Route::resource('informefuncionariosempresa', InformeFuncionariosEmpresaController::class);
    Route::resource('informetotalempresas', InformeTotalEmpresasController::class);
    Route::resource('informeactulizacionempresas', InformeActualizacionesEmpController::class);
    Route::resource('informeresumen', InformeCuadroEmpresasController::class, ['only' => ['index', 'store']]);
    Route::resource('informedinamicoempresa', InformeDinamicoEmpresaController::class);
        
    //*** End Informes Empresas *****

    //*** Informes Fomento Aeronautico *****
    Route::resource('informecapacidadtotalpais', InformeCapacidadTotalPaisController::class);
    Route::resource('informeempresasxsector', InformeEmpresasXSectorController::class);
    Route::resource('informeofertassectoraeronautico', InformeOfertasSectorAeronauticoController::class);
    Route::resource('informecapacidadtotalciudad', InformeTotalOfertasxCiudadController::class);
    Route::resource('informetotalofertaspais', InformeTotalOfertasxPaisController::class);
    Route::resource('informeofertasporciudad', InformeOfertasPorCiudadController::class);
    Route::resource('informeofertasporcapacidad', InformeOfertasPorCapacidadController::class);
    Route::resource('informeControlObservaciones', InformeControlObservacionesController::class);
    Route::post('informeControlObservaciones/crear', [InformeControlObservacionesController::class,'create'])->name('controlObservaciones.create');
    Route::get('informeControlObservaciones/download', [InformeControlObservacionesController::class, 'download'])->name('controlObservaciones.download');
    //*** End Informes Fomento Aeronautico *****
    
    //*** Informes Agremiaciones *****
    Route::resource('informeafiliadoscluster', InformeAfiliadosClusterController::class);
    Route::resource('informeresumencluster', InformeResumenClusterController::class);
    //*** End Informes Agremiaciones *****

    //*** Informes Convenios *****
    Route::resource('informeconvenios', InformeConveniosController::class);
    //*** End Informes Convenios *****

        //*** Informes Capacitacion Empresas *****
    Route::resource('informeasistencia', InformeAsistenciaController::class);
    Route::resource('informeescarapelas', InformeEscarapelasController::class);
    //*** End Informes Capacitacion Empresas *****

    //Control proyectos 1234abcd
    Route::resource('controlProyectos', ControlProyectosController::class);
    Route::resource('informeControlProyectos', InformeControlProyectosController::class);
    Route::resource('observacionProyecto', ObservacionProyectoController::class);
    Route::resource('informeObservaciones', InformeObservacionesController::class);
    
    
    //Informe H/H Auditorias
    /*
    
        Route::get('vistaBalanceo/vistaBalanceoManoObra','VistaBalanceoManoObraController::class,'vBalanceo');
        Route::resource('vistaBalanceo', 'VistaBalanceoManoObraController'); //Evidencias req
    */
    
        //Route::get('vistaHHAuditoria/{id}','VistaHHAuditoriasController::class,'vAuditoria');
        //Route::resource('vistaHHAuditoria', 'VistaHHAuditoriasController'); //Evidencias req
    
        //1234abcd
    /*
        Route::get('getHHAuditoria','VistaHHAuditoriasController::class,'vAuditoria');
        Route::resource('vistaBalanceo', 'VistaHHAuditoriasController'); //Evidencias req
    */
        // Route::get('getHHAuditoria', array(
        //     'as' => 'getHHAuditoria',
        //     'uses' => [VistaHHAuditoriasController::class,'vAuditoria']
        //  ));

    Route::get('getHHAuditoria', [VistaHHAuditoriasController::class,'vAuditoria'])->name('getHHAuditoria');

    Route::resource('VistaHHAuditorias', VistaHHAuditoriasController::class);

    Route::resource('informeFuncionariosAuditorias', InformeFuncionariosAuditoriasController::class);
        
    /*** End Fomento Aeronautico ***/    
    
    //*** Auditoria *****
    Route::resource('tipoAuditoria', TipoAuditoriaController::class);
    Route::resource('criteriosAuditoria', CriteriosController::class);
    Route::resource('auditoria', AuditoriaController::class);
    Route::resource('planeInspeccion', PlanInspeccionController::class);
    Route::resource('actividadesInspeccion', ActividadesInspeccionesController::class);
    Route::resource('informeInspeccion', InformeInspeccionController::class);
    Route::resource('seguimientoCausaRaiz', SeguimientoCausaRaizController::class);
    Route::resource('actividadesHallazgo', ActividadesHallazgoController::class);
    
    //informe inspeccion obtner cantidad
    Route::get('informeInspeccion/totalAnotacionesAll/{id}',[InformeInspeccionController::class,'getTotalAnotacionesAll']);
    
    Route::resource('causaRaiz', CausaRaizController::class);
    
    //*** Informes Auditoria *****
    Route::resource('informeplaninspeccionfinal', InformePlanInspeccionFinalController::class);
    Route::resource('informeplanmejora', InformePlanMejoraController::class);
    Route::resource('informeinspeccionicfr03', InformeInspeccionIcfr03Controller::class);
    Route::resource('informeinspeccionicfr08', InformeInspeccionIcfr08Controller::class);
    Route::resource('informeseguimientoconsolidado', InformeSeguimientoConsolidadoController::class);
    Route::resource('informeanotacionesseguimiento', InformeAnotacionesSeguimientoController::class);
    Route::resource('informevisitaacompanamiento', InformeVisitaAcompanamientoController::class);

    Route::resource('informehallazgosgenerados', InformeHallazgosGeneradosController::class);
    //*** End Informes Auditoria *****
    
    Route::resource('APACxAuditoria', APACxAuditoriaController::class);
    
    //Dependent Dropdowns
    Route::get('auditoria/funcionarios/{id}',[AuditoriaController::class,'getFuncionarios']);
    Route::get('auditoria/funcionariosLDAP/{id}',[AuditoriaController::class,'getFuncionariosLDAP']);
    Route::get('auditoria/funcionariosAuditoria/{id}',[AuditoriaController::class,'getAuditorias']);
    Route::get('informevisitaacompanamiento/NoVisitas/{id}',[InformeVisitaAcompanamientoController::class,'getNoVisita']);
    Route::get('auditoria/consecutivo/{id}',[AuditoriaController::class,'getNextCodeAuditoriaEmpresa']);
    
    //Datos Funcionario
    Route::get('auditoria/funcionario/{id}',[AuditoriaController::class,'getFuncionario']);
    
    //Consecutivo ANotaciones X Auditoria
    Route::get('anotacion/consecutivo/{id}',[AnotacionesController::class,'getNextNotaAuditoria']);
    Route::get('anotacion/actividadesInspeccion/{id}',[AnotacionesController::class,'getActividadesInspeccion']);
    Route::get('anotacion/estadoAuditoria/{id}',[AnotacionesController::class,'getEstadoInsertOrganizacion']);
    Route::get('anotacion/subProcesosAuditoria/{id}',[AnotacionesController::class,'getSubProcesos']);
    Route::get('anotacion/equipoInspectorEmpresa/{id}',[AnotacionesController::class,'getEquipoInspectorEmpresa']);
    Route::get('anotacion/equipoInspectorLDAP/{id}',[AnotacionesController::class,'getEquipoInspectorLDAP']);
    Route::get('anotacion/CriterioActividad/{id}',[AnotacionesController::class,'getCriterioActividad']);
    
    //*** Informes Auditoria *****
    Route::resource('informeplaninspeccionfinal', InformePlanInspeccionFinalController::class);
    Route::resource('informeplanmejora', InformePlanMejoraController::class);
    //*** End Informes Auditoria *****
    
    //Datos Auditor auditoria
    Route::get('seguimientoCausaRaiz/auditor/{id}',[SeguimientoCausaRaizController::class,'getAuditor']);
    Route::get('seguimientoCausaRaiz/anotaciones/{id}',[SeguimientoCausaRaizController::class,'getAnotacionesAuditoria']);
    Route::get('seguimientoCausaRaiz/causaraiz/{id}',[SeguimientoCausaRaizController::class,'getCausaRaizaAnotacion']);
    Route::get('seguimientoCausaRaiz/tareascausaraiz/{id}',[SeguimientoCausaRaizController::class,'getTareasCausasRaiz']);
    Route::get('exportSeguimientoCausaRaiz', [SeguimientoCausaRaizController::class,'exportSeguimientos']);
    Route::get('seguimientoCausaRaiz/AprobarSeguimiento/{id}',[SeguimientoCausaRaizController::class,'aprobarSeguimiento']);
    
    
    Route::resource('/SeguimientoPercentage', SeguimientoPercentage::class, [
        'names' => [
            'create' => 'SeguimientoPercentage'
        ]
    ]);
    
    //*** Vista Auditorias *****
    Route::get('apacAuditoria/vistaAuditorias',[APACxAuditoriaController::class,'vAuditorias']);
    Route::resource('apacAuditoria', APACxAuditoriaController::class);
    Route::resource('nuerepadi', NUEREPADICController::class);
    Route::get('consolidadoxfuente/vistaAuditorias',[ConsolidadoXfuenteController::class,'vAuditorias']);
    Route::resource('consolidadoxfuente', ConsolidadoXfuenteController::class);
    Route::get('consolidadoXProgramaCalidad/vistaAuditorias',[ConsolidadoXProgramaCalidadController::class,'vAuditorias']);
    Route::resource('consolidadoXProgramaCalidad', ConsolidadoXProgramaCalidadController::class);
    Route::get('consolidadoXProgramaTipo/vistaAuditorias',[ConsolidadoProgramaXTipoController::class,'vAuditorias']);
    Route::resource('consolidadoXProgramaTipo', ConsolidadoProgramaXTipoController::class);
    Route::get('organizacionXAuditoria/vistaAuditorias',[OrganizacionXAuditoriaController::class,'vAuditorias']);
    Route::resource('organizacionXAuditoria', OrganizacionXAuditoriaController::class);
    Route::get('anotacionesXObjeto/vistaAuditorias',[AnotacionesXObjetoController::class,'vAuditorias']);
    Route::resource('anotacionesXObjeto', AnotacionesXObjetoController::class);
    
    Route::get('anotacionesXEstadoParcial/vistaAuditorias',[AnotacionesEstadoParcialController::class,'vAuditorias']);
    Route::resource('anotacionesXEstadoParcial', AnotacionesEstadoParcialController::class);

    // Route::resource('cantidadAnotaciones/vistaAnotaciones', [InformeCantidadAanotacionesController::class,'vAnotaciones']);
    Route::resource('cantidadAnotaciones', InformeCantidadAanotacionesController::class);
    Route::get('cantidadAnotaciones/vistaAnotaciones', [InformeCantidadAanotacionesController::class,'vAnotaciones']);
    //*** End Vista Auditorias *****    
    
    //*** End Auditoria *****
    
    //**** Nomograma Y Contratos *************/
    
    /**********Informe Control Contratos *****/
    Route::resource('InformeContratosA', InformeControlContratosController::class);
    Route::resource('InformeContrato', ContratosAnualController::class, ['only' => ['index', 'store'.'show']]);
    /*********End Informe Control Contratos***/
    /**********Informe Control Contratos *****/
    Route::resource('FormularioContrato', ControlContratosController::class);
    /*********End Informe Control Contratos***/   
       
    /***End Nomograma Y Contratos*** */      
    
    /*GestionRecursos*/
    
    /******** Gestion Recurso *******/
    
    Route::resource('especialidades', EspecialidadesController::class);
    Route::resource('cargos', CargosController::class);
    //Route::resource('perfilesCert', 'PerfilCertificacionController');
    Route::resource('eac', EACController::class);
    Route::resource('nivelCompetencia', NivelCompetenciaController::class);
    Route::resource('costoshh', CostosHHController::class);
    
    Route::resource('asignarusuario', AsignarUsuarioController::class);
    Route::resource('asignarusuarioEmpresa', AsignarUsuarioEmpresaController::class);
    Route::resource('perfil', PerfilController::class);
    Route::get('asignarusuarioEmpresa/funcionariosEmpresa/{id}', [AsignarUsuarioEmpresaController::class,'getFuncionariosEmpresas']);
    

    Route::post('/descargar-carpeta-directa/{consecutivo}', [InformeLAFR212Controller::class, 'copiarCarpetaEscritorio'])->name('descargar-carpeta-directa');
    Route::get('/descargar-carpeta-zip/{consecutivo}', [InformeLAFR212Controller::class, 'descargarCarpetaZip'])->name('descargar-carpeta-zip');
    /*	Cursos Requeridos */
    
    Route::resource('contenidoTematico', ContenidoTematicoController::class);
    Route::resource('requisitosNivelCompe', RequisitosNivelCompetenciaController::class);
    Route::resource('requisitosCargo', RequisitosCargoController::class);
    Route::resource('cursosCargo', CursosCargoController::class);    
    
    //*** Personal *****
    Route::resource('personal', PersonalController::class);
    
    //*** Informes Personal *****
    Route::resource('informehojadevida', InformeHojaDeVidaController::class);
    Route::resource('informetotalpersonal', InformeTotalPersonalController::class);
    Route::resource('informepersonalareasecad', InformePersonalAreaSECADController::class);
    Route::resource('informepersonalespecialidad', InformePersonalEspecialidadController::class);
    Route::resource('informepersonalperfil', InformePersonalPerfilController::class);
    Route::resource('informebalanceomanoobra', InformeBalanceoManoObraController::class);
    Route::resource('informecostohh', InformePersonalHHController::class);
    //*** End Informes Personal  *****
    //*** End Personal *****
    
    //*** Capacitacion Personal SECAD *****
    Route::resource('cursosformacion', CursosFormacionController::class);
    Route::resource('cursos', CursosController::class);
    Route::resource('familiares', FamiliaresController::class);
    Route::resource('cursosPersonal', CursosPersonalController::class);
    
    //Get
    Route::get('personal/Cuerpos/{id}',[PersonalController::class,'getCuerposByGrado']);
    
    //*** Informes Personal SECAD *****
    Route::resource('informecursosfuncionario', InformeCursosFuncionarioController::class);
    Route::resource('informecurso', InformeCursoController::class);
    Route::resource('informetotalcursos', InformeTotalCursosController::class);
    Route::resource('informeplancapacitacion', InformePlanCapacitacionController::class);
    //*** End Informes Personal SECAD  *****
    //*** End Capacitacion Personal SECAD  *****
    
    /*End GestionRecursos*/
    
    // /**** MAIL ****/
    // 	Route::get('sendmail', function (){
    // 		$data = array('name' => 'Seguimiento Porgama');
    
    // 		Mail::send('emails.mail_seguimiento', $data, function($message){
    // 			$message->from('testprojectsysoft::class,'gmail.com', 'Auditor Plus - Seguimiento Porgama');
    // 			$message->to('ruben.wilches::class,'symetrixsoft.com')
    // 					 ->subject('Se ha adjuntado un nuevo documeto');
    // 		});
    
    // 		return "Se ha enviado el email correctamente";
    // 	});
    
    
    Route::match(['get', 'post'], '/scheduler_data', [DashboardController::class,'data']);
    
    /**SubAreasCooperacionIndustrial**/
    Route::get('searchSubArea/{area}', [AreasCooperacionController::class,'searchSubArea']);
    /**filterDinamicCompanyReportCreator**/
    Route::get('filterDinamicCompanyReportCreator', [InformeDinamicoEmpresaController::class,'filterDinamicCompanyReportCreator']);
});

Route::get('/info', function() {
    dd(phpinfo());
});