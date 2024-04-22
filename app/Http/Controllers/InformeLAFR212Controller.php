<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Programa;
use App\Models\InformeLAFR212;
use App\Models\ActividadesInformeLAFR212;
use App\Models\ObservacionesLAFR212;
use App\Models\Tools;
use App\Models\Permiso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class InformeLAFR212Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nombreCompleto = auth()->user()->nombre_completo;


    
      $idPersonal = \DB::table('AUFACVW_PersonalHH')->where('NombreCompleto', $nombreCompleto)->value('IdPersonal');
      $todosprogramas =  \DB::table('AUFACVW_PersonalHH')->where('IdPersonal', $idPersonal)->value('TodosProgramas');
      if ($todosprogramas == 1) {
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::all();
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_informe_LA_FR_212')->with('programa', $programas)->with('permiso', $permiso);
    } else{
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::getByUser($idPersonal);        
        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_informe_LA_FR_212')->with('programa', $programas)->with('permiso', $permiso);
    }
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrograma)
    {
        //Conulta datos basicos del informe Programa, Empresa, Producto, 
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        // fecha solicitud
        $dsl = date_create($informelafr212[0]->FechaInicio);
        $fechaSolicitud = Tools::getFecha($dsl);

        //Consulta datos de seguimiento por porgrama
        $informeHistorialPrograma = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->orderBy('Orden', 'ASC')->orderBy('Fecha', 'ASC')->get();

        /*VALIDA SI ES PMA PARA CALCULASR CCA Y CPA*/
        $porcentajeCCA = 0;
        $porcentajeCPA = 0;
        $porcentajeTotal = 0;
        if($informelafr212[0]->IdTipoPrograma == 4)
        {
            //Consulta Actividades Cumplidas hasta la 17
            $cumplidosCCA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','<=',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCCA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','<=',13)
                        ->count();

            //Consulta Actividades Cumplidas hasta la 13
            $cumplidosCPA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','>',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCPA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','>',13)
                        ->count();

            
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidosCCA / $totalCCA)*100, 2, '.', '');
            $porcentajeCPA = number_format(($cumplidosCPA / $totalCPA)*100, 2, '.', '');
            $porcentajeTotal = number_format((($porcentajeCCA + $porcentajeCPA)/2), 2, '.', '');
        }
        else
        {   
            //Consulta Actividades Cumplidas
            $cumplidos = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $total = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->count();

            /*FALTA VALIDAR SI ES CPA*/
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidos / $total)*100, 2, '.', '');
            $porcentajeTotal = $porcentajeCCA;
        }

        //Carga de datos Propios
        $programa = Programa::find($IdPrograma);
        $result = substr($informelafr212[0]->Consecutivo, 0, 4);
        $anio = $result; //Extrae el año del programa

        $dcr = date_create("today");
        $presente_anio = Tools::getFecha($dcr); //Extrae la fecha del dia en curso
        
        //$presente_anio = date('F, Y ', strtotime($dcr));
        $especialidades = Programa::find($IdPrograma)->especialidades;
        $especialistas = Array();
        if(count($especialidades) > 0){
            foreach($especialidades as $especialista){
                $info_especialista = Programa::infoPersona($especialista->IdPersonal);
                array_push($especialistas, $info_especialista);
            }
        }
        //dd($especialistas);

        //Observaciones
        $obervaciones = ObservacionesLAFR212::getLastByIdprograma($IdPrograma);
        //dd($programa->programas); //-> Programas en los cuales hay certificación del programa.
        $informelafr212R = $informelafr212->first();
        $jefe = Programa::infoPersona($informelafr212R->IdPersonalJefePrograma);
        $suplente = Programa::infoPersona($informelafr212R->IdPersonalJefeSuplente);
        return view('certificacion.programasSECAD.seguimientoProgramas.visual_informe_LA_FR_212')
                ->with('informelafr212', $informelafr212)
                ->with('informelafr212R', $informelafr212R)
                ->with('informeHistorialPrograma', $informeHistorialPrograma)
                ->with('anio',$anio)
                ->with('programa', $programa)
                ->with('presente_anio', $presente_anio)
                ->with('porcentajeCCA', $porcentajeCCA)
                ->with('porcentajeCPA', $porcentajeCPA)
                ->with('porcentajeTotal', $porcentajeTotal)
                ->with('obervaciones', $obervaciones)
                ->with('jefe', $jefe)
                ->with('suplente', $suplente)
                ->with('fechaSolicitud', $fechaSolicitud)
                ->with('especialistas', $especialistas);
    }

    public function informe_preview($IdPrograma) {
        //Conulta datos basicos del informe Programa, Empresa, Producto, 
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        // fecha solicitud
        $dsl = date_create($informelafr212[0]->FechaInicio);
        $fechaSolicitud = Tools::getFecha($dsl);

        //Consulta datos de seguimiento por porgrama
        $informeHistorialPrograma = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->orderBy('Orden', 'ASC')->orderBy('Fecha', 'ASC')->get();

        /*VALIDA SI ES PMA PARA CALCULASR CCA Y CPA*/
        $porcentajeCCA = 0;
        $porcentajeCPA = 0;
        $porcentajeTotal = 0;

        if ($informelafr212[0]->IdTipoPrograma == 4) {
            //Consulta Actividades Cumplidas hasta la 17
            $cumplidosCCA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','<=',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCCA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','<=',13)
                        ->count();

            //Consulta Actividades Cumplidas hasta la 13
            $cumplidosCPA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','>',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCPA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','>',13)
                        ->count();

            
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidosCCA / $totalCCA)*100, 2, '.', '');
            $porcentajeCPA = number_format(($cumplidosCPA / $totalCPA)*100, 2, '.', '');
            $porcentajeTotal = number_format((($porcentajeCCA + $porcentajeCPA)/2), 2, '.', '');
        }
        else {   
            //Consulta Actividades Cumplidas
            $cumplidos = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $total = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->count();

            /*FALTA VALIDAR SI ES CPA*/
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidos / $total)*100, 2, '.', '');
            $porcentajeTotal = $porcentajeCCA;
        }

        //Carga de datos Propios
        $programa = Programa::find($IdPrograma);
        $result = substr($informelafr212[0]->Consecutivo, 0, 4);
        $anio = $result; //Extrae el año del programa

        $dcr = date_create("today");
        $presente_anio = Tools::getFecha($dcr); //Extrae la fecha del dia en curso
        
        //$presente_anio = date('F, Y ', strtotime($dcr));
        $especialidades = Programa::find($IdPrograma)->especialidades;
        $especialistas = Array();

        if (count($especialidades) > 0) {
            foreach($especialidades as $especialista) {
                $info_especialista = Programa::infoPersona($especialista->IdPersonal);
                array_push($especialistas, $info_especialista);
            }
        }

        //Observaciones
        $obervaciones = ObservacionesLAFR212::getLastByIdprograma($IdPrograma);
        $informelafr212R = $informelafr212->first();
        $jefe = Programa::infoPersona($informelafr212R->IdPersonalJefePrograma);
        $suplente = Programa::infoPersona($informelafr212R->IdPersonalJefeSuplente);

        $pdf = Pdf::loadView('certificacion.programasSECAD.seguimientoProgramas.pdf_visual_informe_LAFR212',
                    compact('informelafr212',
                            'informelafr212R',
                            'informeHistorialPrograma',
                            'anio',
                            'programa',
                            'presente_anio',
                            'porcentajeCCA',
                            'porcentajeCPA',
                            'porcentajeTotal',
                            'obervaciones',
                            'jefe',
                            'suplente',
                            'fechaSolicitud',
                            'especialistas'));

        return $pdf->stream();
    }

    public function informe($IdPrograma) {
        //Conulta datos basicos del informe Programa, Empresa, Producto, 
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        // fecha solicitud
        $dsl = date_create($informelafr212[0]->FechaInicio);
        $fechaSolicitud = Tools::getFecha($dsl);

        //Consulta datos de seguimiento por porgrama
        $informeHistorialPrograma = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->orderBy('Orden', 'ASC')->orderBy('Fecha', 'ASC')->get();

        /*VALIDA SI ES PMA PARA CALCULASR CCA Y CPA*/
        $porcentajeCCA = 0;
        $porcentajeCPA = 0;
        $porcentajeTotal = 0;

        if ($informelafr212[0]->IdTipoPrograma == 4) {
            //Consulta Actividades Cumplidas hasta la 17
            $cumplidosCCA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','<=',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCCA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','<=',13)
                        ->count();

            //Consulta Actividades Cumplidas hasta la 13
            $cumplidosCPA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','>',13)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCPA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','>',13)
                        ->count();

            
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidosCCA / $totalCCA)*100, 2, '.', '');
            $porcentajeCPA = number_format(($cumplidosCPA / $totalCPA)*100, 2, '.', '');
            $porcentajeTotal = number_format((($porcentajeCCA + $porcentajeCPA)/2), 2, '.', '');
        }
        else {   
            //Consulta Actividades Cumplidas
            $cumplidos = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $total = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->count();

            /*FALTA VALIDAR SI ES CPA*/
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidos / $total)*100, 2, '.', '');
            $porcentajeTotal = $porcentajeCCA;
        }

        //Carga de datos Propios
        $programa = Programa::find($IdPrograma);
        $result = substr($informelafr212[0]->Consecutivo, 0, 4);
        $anio = $result; //Extrae el año del programa

        $dcr = date_create("today");
        $presente_anio = Tools::getFecha($dcr); //Extrae la fecha del dia en curso
        
        //$presente_anio = date('F, Y ', strtotime($dcr));
        $especialidades = Programa::find($IdPrograma)->especialidades;
        $especialistas = Array();

        if (count($especialidades) > 0) {
            foreach($especialidades as $especialista) {
                $info_especialista = Programa::infoPersona($especialista->IdPersonal);
                array_push($especialistas, $info_especialista);
            }
        }

        //Observaciones
        $obervaciones = ObservacionesLAFR212::getLastByIdprograma($IdPrograma);
        $informelafr212R = $informelafr212->first();
        $jefe = Programa::infoPersona($informelafr212R->IdPersonalJefePrograma);
        $suplente = Programa::infoPersona($informelafr212R->IdPersonalJefeSuplente);        

        $pdf = Pdf::loadView('certificacion.programasSECAD.seguimientoProgramas.pdf_visual_informe_LAFR212',
                    compact('informelafr212',
                            'informelafr212R',
                            'informeHistorialPrograma',
                            'anio',
                            'programa',
                            'presente_anio',
                            'porcentajeCCA',
                            'porcentajeCPA',
                            'porcentajeTotal',
                            'obervaciones',
                            'jefe',
                            'suplente',
                            'fechaSolicitud',
                            'especialistas'));

        return $pdf->download('informe_'.$programa->Proyecto.'.pdf');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPrograma)
    {
        //Conulta datos basicos del informe Programa, Empresa, Producto, 
        $informelafr212 = InformeLAFR212::where('dbo.AUFACVW_LAFR212.IdPrograma','=',$IdPrograma)->get();

        // fecha solicitud
        $dsl = date_create($informelafr212[0]->FechaInicio);
        $fechaSolicitud = Tools::getFecha($dsl);

        //Consulta datos de seguimiento por porgrama
        $informeHistorialPrograma = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->orderBy('Orden', 'ASC')->orderBy('Fecha', 'ASC')->get();

        /*VALIDA SI ES PMA PARA CALCULASR CCA Y CPA*/
        $porcentajeCCA = 0;
        $porcentajeCPA = 0;
        $porcentajeTotal = 0;
        if($informelafr212[0]->IdTipoPrograma == 4)
        {
            //Consulta Actividades Cumplidas hasta la 17
            $cumplidosCCA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','<=',17)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCCA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','<=',17)
                        ->count();

            //Consulta Actividades Cumplidas hasta la 17
            $cumplidosCPA = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')
                                ->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)
                                ->where('dbo.AUFACVW_Actividades_LAFR212.Orden','>',17)
                                ->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $totalCPA = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.Orden','>',17)
                        ->count();

            /*FALTA VALIDAR SI ES CPA*/
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidosCCA / $totalCCA)*100, 2, '.', '');
            $porcentajeCPA = number_format(($cumplidosCPA / $totalCPA)*100, 2, '.', '');
            $porcentajeTotal = number_format((($porcentajeCCA + $porcentajeCPA)/2), 2, '.', '');
        }
        else
        {   
            //Consulta Actividades Cumplidas
            $cumplidos = ActividadesInformeLAFR212::where('dbo.AUFACVW_Actividades_LAFR212.Situacion','=','Cumplido')->where('dbo.AUFACVW_Actividades_LAFR212.IdPrograma','=',$IdPrograma)->count();

            //Consulta Total de Actividades
            $programa = Programa::find($IdPrograma);
            $total = \DB::table('AU_Mst_Actividades_TipoPrograma')
                        ->where('dbo.AU_Mst_Actividades_TipoPrograma.IdTipoPrograma','=',$programa->IdTipoPrograma)
                        ->count();

            /*FALTA VALIDAR SI ES CPA*/
            //Calcula el porcentaje de avance 
            $porcentajeCCA = number_format(($cumplidos / $total)*100, 2, '.', '');
            $porcentajeTotal = $porcentajeCCA;
        }


       
       

        //Carga de datos Propios
        $programa = Programa::find($IdPrograma);
        $result = substr($informelafr212[0]->Consecutivo, 0, 4);
        $anio = $result; //Extrae el año del programa

        $dcr = date_create("today");
        $presente_anio = Tools::getFecha($dcr); //Extrae la fecha del dia en curso
        
        // $presente_anio = date('F, Y ', strtotime($dcr));

        //Observaciones
        $obervaciones = ObservacionesLAFR212::getLastByIdprograma($IdPrograma);
        $jefe = Programa::infoPersona($programa->IdPersonalJefePrograma);
        $suplente = Programa::infoPersona($programa->IdPersonalJefeSuplente);
        $informelafr212R = $informelafr212->first();
        
        $logo = '/img/logo_fac.png';

        $especialidades = Programa::find($IdPrograma)->especialidades;
        $especialistas = Array();
        if(count($especialidades) > 0){
            foreach($especialidades as $especialista){
                $info_especialista = Programa::infoPersona($especialista->IdPersonal);
                array_push($especialistas, $info_especialista);
            }
        }
        //dd($especialistas);


/*        return view('certificacion.programasSECAD.seguimientoProgramas.pdf_informe_LA_FR_212')
                ->with('informelafr212', $informelafr212)
                ->with('informeHistorialPrograma', $informeHistorialPrograma)
                ->with('anio',$anio)
                ->with('programa', $programa)
                ->with('presente_anio', $presente_anio)
                ->with('porcentajeCCA', $porcentajeCCA)
                ->with('porcentajeCPA', $porcentajeCPA)
                ->with('porcentajeTotal', $porcentajeTotal)
                ->with('obervaciones', $obervaciones)
                ->with('informelafr212R', $informelafr212R)
                ->with('jefe', $jefe)
                ->with('logo', $logo)
                ->with('suplente', $suplente)
                ->with('fechaSolicitud', $fechaSolicitud);*/

        return \PDF::loadView('certificacion.programasSECAD.seguimientoProgramas.pdf_informe_LA_FR_212', 
                             ['informelafr212' => $informelafr212, 
                             'informeHistorialPrograma' => $informeHistorialPrograma, 
                             'anio' => $anio, 
                             'programa' => $programa, 
                             'presente_anio' => $presente_anio,
                             'porcentajeCCA' => $porcentajeCCA,
                             'porcentajeCPA' => $porcentajeCPA,
                             'porcentajeTotal' => $porcentajeTotal,
                             'obervaciones' => $obervaciones,
                             'informelafr212R' => $informelafr212R,
                             'jefe' => $jefe,
                             'logo' => $logo,
                             'suplente' => $suplente,
                             'fechaSolicitud' => $fechaSolicitud,
                             'especialistas' => $especialistas])
                    ->setOption('disable-smart-shrinking', false)
                    ->setOption('margin-top', '25mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '280')
                    ->setOption('page-height', '380')
                    ->download('informe_'.$programa->Proyecto.'.pdf');  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function descargarCarpetaZip(Request $request, $consecutivo)
{
    try {
        // Ruta de la carpeta principal
        $carpetaPrincipal = base_path('public/secad/Programas');
        
        // Ruta de la carpeta específica con el consecutivo
        $rutaCarpeta = $carpetaPrincipal . DIRECTORY_SEPARATOR . $consecutivo;

        // Valida si la carpeta existe
        if (!is_dir($rutaCarpeta)) {
            // Devuelve un aviso en lugar de lanzar una excepción
            return response()->json(array('status' => false, 'mensaje' => 'No hay documentos para descargar.'));
           
        }

        // Define el nombre del archivo ZIP
        $zipFileName = "{$consecutivo}.zip";

        // Comprime la carpeta en un archivo ZIP
        $zipPath = storage_path("app/{$zipFileName}");

        $zip = new ZipArchive();
        $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $this->agregarCarpetaAZip($zip, $rutaCarpeta, $consecutivo);

        $zip->close();

        // Descarga el archivo ZIP con el nombre deseado
        return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
}
    private function agregarCarpetaAZip(ZipArchive $zip, $carpeta, $nombreCarpeta)
{
    $archivos = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($carpeta),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($archivos as $archivo) {
        $archivoNombre = $archivo->getBasename();
        $archivoRuta = $archivo->getRealPath();
        $archivoRutaRelativa = substr($archivoRuta, strlen($carpeta) + 1);

        if ($archivo->isDir()) {
            // Agrega el directorio al ZIP con la ruta relativa
            $zip->addEmptyDir("{$nombreCarpeta}/{$archivoRutaRelativa}");
        } else {
            // Agrega el archivo al ZIP con la ruta relativa
            $zip->addFile($archivoRuta, "{$nombreCarpeta}/{$archivoRutaRelativa}");
        }
    }
}

    
}
