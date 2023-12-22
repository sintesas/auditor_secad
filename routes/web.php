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

    Route::resource('rol', RolController::class);
    Route::resource('rolprivilegio', RolPrivilegioController::class);
    Route::get('rolprivilegio/privilegio/{id}', [RolPrivilegioController::class, 'getRolPrivilegiosById'])->name('rolprivilegio.indice');
    Route::get('rolprivilegio/privilegio/crear/{id}', [RolPrivilegioController::class, 'createRolPrivilegio'])->name('rolprivilegio.crear');


    Route::resource('nombrelista', ListaController::class);
    Route::resource('listasvalores', ListaDinamicaController::class);
    Route::get('listasvalores/lista/{id}', [ListaDinamicaController::class, 'getListasValoresById'])->name('listasvalores.indice');

    Route::resource('aeronave', AeronaveController::class);
    Route::resource('unidad', UnidadController::class);
    Route::resource('ata', AtaController::class);
    Route::resource('estadosprograma', EstadosProgramaController::class);
    Route::resource('tipoprograma', TipoProgramaController::class);
    Route::resource('baseCertificacion', BaseCertificacionController::class);
});
