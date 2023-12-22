<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsersLDAP;

class PagesController extends Controller
{
    public function index(){
    	return view('partials.index');
    }

    public function ofertasSectorAeronautico(){
    	return view('fomento.variables.sectores_ofertas_sector_aeronautico');
    }

    public function productosyServiciosAeronauticos(){
    	return view('fomento.variables.productos_servicios_aeronauticos');
    }

    public function crearEmpresaSectorAeronautico(){
    	return view('fomento.crear_empresa_sector_aeronautico');
    }

    public function crearCriterios(){
        return view('certificacion.variables.crear_criterio');
    }

    public function crearEquipo(){
        return view('certificacion.variables.crear_equipo');
    }

    public function crearEspecialidadesCertificacion(){
        return view('certificacion.variables.crear_especialidades_certificacion');
    }

    public function crearEstadosProgramas(){
        return view('certificacion.variables.crear_estados_programas');
    }

    public function crearMoc(){
        return view('certificacion.variables.crear_moc');
    }

    public function crearProcesosInternos(){
        return view('certificacion.variables.crear_procesos_internos');
    }

    public function crearRequerimientosPdr(){
        return view('certificacion.variables.crear_requerimientos_pdr');
    }

    public function crearSitios(){
        return view('certificacion.variables.crear_sitios');
    }

    public function crearTipoPrograma(){
        return view('certificacion.variables.crear_tipo_programa');
    }


    // Begin certificacion

    // public function crearAta(){
    //     return view('certificacion.variables.crear_ata');
    // }
}
