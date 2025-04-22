<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\TipoPrograma;
use App\Models\Aeronave;
use App\Models\Estado;
use App\Models\Unidad;
use App\Models\Ata;
use App\Models\Empresa;
use App\Models\Programa;
use App\Models\DemandaPotencial;
use App\Models\VWPersonal;
use App\Models\Repuesto;
use App\Models\Referencia;
use App\Models\BaseCertificacion;
use App\Models\UsersLDAP;

// Associated tabs

use App\Models\ProgramaEspecialidad;
use App\Models\ProgramaBanco;
use App\Models\ProgramaEnsayo;

// dependant dropdownds

// Especialidades
use App\Models\EspecialidadCertificacion;
use App\Models\Personal;

// bancos
use App\Models\Banco;

// ensayos
use App\Models\Ensayo;
use App\Models\TipoEnsayo;
use App\Models\Permiso;
use App\Models\ListasSeguimiento;

class ReporteHorasPersonalController extends Controller
{
  public function index()
  {


    $nombreCompleto = auth()->user()->nombre_completo;


    
      $Personal = \DB::select("select * from AUFACVW_PersonalHH");

      $p = new Permiso;
      $permiso = $p->getPermisos('CP');
      $programas = Programa::all();
    
    return view('certificacion.horasPersonas.ver_tablas_reporte_personal')->with('personal', $Personal)->with('permiso', $permiso);

    
    }



    public function create()
    {
        //
    }

    public function show($IdPrograma)
{
    $listasSeguimiento = ListasSeguimiento::where('IdPrograma', $IdPrograma)->pluck('IdListaSeguimiento');

    $especialistas = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
        ->whereIn('IdListaSeguimiento', $listasSeguimiento)
        ->get()
        ->groupBy('IdPersonal');

    $idPersonales = $especialistas->keys();

    
    $especialistas1 = \DB::table('AUFACVW_PersonalHH')
        ->whereIn('IdPersonal', $idPersonales)
        ->get();

    
    $especialistasroles = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
        ->whereIn('IdPersonal', $idPersonales)
        ->whereNotNull('Rol')  
        ->get();

    
    $estadoAprobacion = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
        ->whereIn('IdPersonal', $idPersonales)
        ->where('IdPrograma', $IdPrograma)
        ->pluck('EstadoAprobacion', 'IdPersonal');  

    
    $p = new Permiso;
    $permiso = $p->getPermisos('CP');

    
    return view('certificacion.horasPersonas.ver_tablas_aprobacionHorasEspecialistas')
        ->with('permiso', $permiso)
        ->with('especialistas1', $especialistas1)
        ->with('especialistasroles', $especialistasroles)
        ->with('estadoAprobacion', $estadoAprobacion)  
        ->with('IdPrograma', $IdPrograma);
}

    

  }