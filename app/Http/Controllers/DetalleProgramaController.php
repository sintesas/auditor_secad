<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Models\Personal;

class DetalleProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){       
        //Get Dates
        $dcr = date_create("today");
        $presente_anio =  date_format($dcr, 'Y'); 
        
        //Set Consecutivo
        $Programa = Programa::where('dbo.AU_Reg_Programas.Consecutivo','LIKE', '%' . $presente_anio . '%')
            ->select("dbo.AU_Reg_Programas.Consecutivo")->take(1)->orderBy('Consecutivo', 'DESC')->get();

        if (count($Programa) == 0) {
          $consecutivo = $presente_anio.'001';
        }
        else{
          $ProgramaW = Programa::where('dbo.AU_Reg_Programas.Consecutivo','LIKE', '%' . $presente_anio . '%')
            ->select("dbo.AU_Reg_Programas.Consecutivo")->take(1)->orderBy('Consecutivo', 'DESC')->get();
            /*$consecutivo = (array_column($ProgramaW->toArray(), 'Consecutivo'));*/
            //$consecutivo = str_replace(array('"', '[', ']'), '', $ProgramaW->pluck('Consecutivo'));
            //$consecutivoExplode = explode($presente_anio, $consecutivo);
            //$consecutivo  = $consecutivoExplode[1] + 1;
            $consecutivo = preg_replace("/[^0-9]/", '', $ProgramaW->pluck('Consecutivo'));         
            $consecutivo = $consecutivo + 1;
            //Se añaden 0 como prefijo
            // $result = array();
            // for ($n = $consecutivo; $n < $consecutivo + 1; $n++) {
            //     $result[] = str_pad($n, 3, "0", STR_PAD_LEFT);
            // }

            // $consecutivo = $presente_anio . $result[0];
        }
        //Set Dropdown TipoPrograma
        $TipoProgramas = TipoPrograma::all(['IdTipoPrograma', 'Tipo']);
        $TipoProgramas->prepend('None');  
         //Set Dropdown Aeronave
        $Aeronaves = Aeronave::all(['IdAeronave', \DB::raw("CONCAT (Aeronave, ' | ', Equipo ) as Aeronave")]);
        $Aeronaves->prepend('None');  
         //Set Dropdown Unidad
        $Unidades = Unidad::all(['IdUnidad', 'NombreUnidad'])->sortBy("Lugar");
        $Unidades->prepend('None');  
         //Set Dropdown Estado
        $Estados = Estado::all(['IdEstadoPrograma', 'Descripcion']);
        $Estados->prepend('None');  
        //Set Dropdown ATA
        $atas = ATA::all(['IdATA', 'ATA'])->sortBy("ATA");
        $atas->prepend('None');  
         //Set Dropdown Empresa
        $Empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa'])->sortBy("NombreEmpresa");
        $Empresas->prepend('None');  
        //Set Dropdown Productos
        // $Productos = DemandaPotencial::all(['IdDemandaPotencial', 'Nombre'])->sortBy("Nombre");
        $Productos = DemandaPotencial::demandaPotencialWithParteNumeroActivo();
        $Productos->prepend('None');  
        // //Set Dropdown Personal
        // $Personal = VWPersonal::all(['IdPersonal', 'AbreNom'])->sortBy("AbreNom");
        // $Personal->prepend('None');  

        //Set Dropdown Personal
        $Personal = Personal::getPersonalWithRango();
        $Personal->prepend('None');  


        //Set Dropdown Repuesto
        $Repuesto = Repuesto::all(['IdRepuesto', 'Descripcion'])->sortBy("Descripcion");
        $Repuesto->prepend('None');  
        //Set Dropdown Referencia
        $Referencia = Referencia::all(['IdReferencia', 'Descripcion'])->sortBy("Descripcion");
        $Referencia->prepend('None');  

        $alcances = ['Aprobación de Diseño Aeronáutico'=>'Aprobación de Diseño Aeronáutico',
                      'Aprobación de Producción Aeronáutica' => 'Aprobación de Producción Aeronáutica',
                      'Reconocimiento Organización Aeronáutica' => 'Reconocimiento Organización Aeronáutica'];

        $areas = ['ACPA'=>'ACPA - Área Certificación Productos Aeronáuticos',
                  'AREV'=>'AREV - Área Reconocimiento y Evaluación'];

        $estado_cert = \DB::select("select * from vw_cp_estado_certificacion where ActivoCertificacion = 1");
        $estadosc = collect($estado_cert);
        $estadosc->prepend('None');
 
        return view ('programasSecad.controlProgramas.ver_tablas_detallePrograma')
               ->with('consecutivo', $consecutivo)
               ->with('TipoProgramas', $TipoProgramas)
               ->with('Aeronaves', $Aeronaves)
               ->with('Unidades', $Unidades)
               ->with('Estados', $Estados)
               ->with('atas', $atas)
               ->with('Empresas', $Empresas)
               ->with('Productos', $Productos)
               ->with('Personal', $Personal)
               ->with('Repuesto', $Repuesto)
               ->with('alcances', $alcances)
               ->with('areas', $areas)
               ->with('Referencia', $Referencia)
               ->with('estadosc', $estadosc);
    }

    public function generate_numbers($start, $count, $digits) {
     $result = array();
     for ($n = $start; $n < $start + $count; $n++) {
        $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
     }
     return $result;
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
        //Se valida consecutivo en BD
       //Get Dates
        $dcr = date_create("today");
        $presente_anio =  date_format($dcr, 'Y'); 
       //  $ProgramaW = Programa::where('dbo.AU_Reg_Programas.Consecutivo','LIKE', '%' . $presente_anio . '%')
       //       ->select("dbo.AU_Reg_Programas.Consecutivo")->take(1)->orderBy('IdPrograma', 'DESC')->get();
       //      /*$consecutivo = (array_column($ProgramaW->toArray(), 'Consecutivo'));*/
       //      $consecutivo = str_replace(array('"', '[', ']'), '', $ProgramaW->pluck('Consecutivo')); 
       //      $consecutivoExplode = explode("-", $consecutivo);           
       //      $consecutivo  = $consecutivoExplode[1] + 1;
       //      //Se añaden 0 como prefijo
       //      $result = array();
       //       for ($n = $consecutivo; $n < $consecutivo + 1; $n++) {
       //          $result[] = str_pad($n, 4, "0", STR_PAD_LEFT);
       //       }

       // $consecutivo = $consecutivoExplode[0] . '-' . $result[0]; 
       $programa = new Programa;
       // store info        
       $programa->Consecutivo = $request->input('NoPrograma');
       $programa->IdTipoPrograma = $request->input('IdTipoPrograma');
       $programa->IdAeronave = $request->input('IdAeronave');       
       $programa->IdUnidad = $request->input('IdUnidad');
       $programa->IdEmpresa = $request->input('IdEmpresa');       
       $programa->IdEstadoPrograma = $request->input('IdEstadoPrograma');
       $programa->AccionSECAD = $request->input('AccionSECAD');
       $programa->Proyecto = $request->input('Proyecto');
       $programa->Alcance = $request->input('Alcance');
       $programa->IdProductoServicio = $request->input('IdProductoServicio');
       $programa->IdHorasTipoPrograma = $request->input('IdHorasTipoPrograma');
       $programa->IdPersonalJefePrograma = $request->input('IdPersonalJefePrograma');
       $programa->IdPersonalJefeSuplente = $request->input('IdPersonalJefeSuplente');
       $programa->FechaInicio = $request->input('FechaInicio');
       $programa->FechaTermino = $request->input('FechaTermino');
       $programa->IdRespuestoModificacion = $request->input('IdRespuestoModificacion');
       $programa->IdAReferenciaPrograma = $request->input('IdAReferenciaPrograma');
       // $programa->IdBaseCertificacion = $request->input('IdBaseCertificacion');
       $programa->Finalizado = $request->input('Finalizado');
       $programa->FechaFin = $request->input('FechaFin');
       $programa->Active = 1; 
       $programa->save();

       /*Crea el arbol de directorios para la documentacion de los programas*/
       $programasPath = public_path('secad\Programas\\' . $programa->Consecutivo);
        if(!\File::exists($programasPath)) {
            \File::makeDirectory( $programasPath, 0755, true);
            $PathNode = 'secad\Programas\\' . $programa->Consecutivo . '\\';
            $proPath1 = public_path($PathNode.'\\'.'1. Gestion de Programa');
            $proPath2 = public_path($PathNode.'\\'.'1. Gestion de Programa\\1. Antecedentes');
            $proPath3 = public_path($PathNode.'\\'.'1. Gestion de Programa\\2. Apertura de Programa');

            $proPath4 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento');
            $proPath5 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento\\1. Cronograma de Trabajo');
            $proPath6 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento\\2. Actas de Seguimiento');
            $proPath7 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento\\3. Informes de Programa');
            $proPath8 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento\\4. Memorandos Outlook');
            $proPath9 = public_path($PathNode.'\\'.'1. Gestion de Programa\\3. Ejecucion y Seguimiento\\5. Oficios');

            $proPath10 = public_path($PathNode.'\\'.'1. Gestion de Programa\\4. Evaluacion y Certificacion');
            $proPath11 = public_path($PathNode.'\\'.'1. Gestion de Programa\\4. Evaluacion y Certificacion\\1. Auditorias e Inspecciones');
            $proPath12 = public_path($PathNode.'\\'.'1. Gestion de Programa\\4. Evaluacion y Certificacion\\2. Informacion de Certificacion');
            $proPath13 = public_path($PathNode.'\\'.'1. Gestion de Programa\\4. Evaluacion y Certificacion\\3. Costos y Compensacion');

            $proPath14 = public_path($PathNode.'\\'.'1. Gestion de Programa\\5. Cierre de Programa');

            $proPath15 = public_path($PathNode.'\\'.'2. Informacion de Diseno');
            $proPath16 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\1. Bases de Certificacion');
            
            $proPath17 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)');
            $proPath18 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\1. Caracterizacion Funcional');
            $proPath19 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\2. Caracterizacion Dimensional');
            $proPath20 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\3. Caracterizacion de Material');
            $proPath21 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\4. Caracterizacion de Fabricacion');
            $proPath22 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\5. Analisis de Seguridad');
            $proPath23 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\2. Diseno Preliminar (PDR)\\6. Otros');

            $proPath24 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)');
            $proPath25 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\1. Plan de Certificacion (PSCP)');
            $proPath26 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\2. Matriz de Cumplimiento');
            $proPath27 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\3. Plan de Ensayos');

            $proPath28 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR');
            $proPath29 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\1. Documentos Tecnicos Originales');
            $proPath30 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\2. Estudios de Ingenieria');
            $proPath31 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\3. Procesos de Fabricacion');
            $proPath32 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\4. Control de Configuracion');
            $proPath33 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\5.  Instrucciones ICAs');
            $proPath34 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\6.  Declaracion DDP');
            $proPath35 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\3. Diseno Critico (CDR)\\4. Documentos CDR\\7.  Otros');

            $proPath36 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\4. Aeronavegabilidad Continuada');
            $proPath37 = public_path($PathNode.'\\'.'2. Informacion de Diseno\\5. Informacion Complementaria');

            $proPath38 = public_path($PathNode.'\\'.'3. Informacion de Produccion');
            $proPath39 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion');
            $proPath40 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\1. Antecedentes');
            $proPath41 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\2. Apertura de Programa');

            $proPath42 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento');
            $proPath43 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\1. Cronograma de Trabajo');
            $proPath44 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\2. Actas de Seguimiento');
            $proPath45 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\3. Informes de Programa');
            $proPath46 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\4. Memorandos Outlook');
            $proPath47 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\3. Ejecucion y Seguimiento\\5. Oficios');

            $proPath48 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\4. Reconocimiento y Evaluacion');
            $proPath49 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\1. Gestion de Produccion\\5. Cierre de Programa');

            $proPath50 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\2. Requisitos RCP');
            $proPath51 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\3. Auditorias de Produccionn');
            $proPath52 = public_path($PathNode.'\\'.'3. Informacion de Produccion\\4. Informacion Complementaria');

            $proPath53 = public_path($PathNode.'\\'.'4. Certificados');

            \File::makeDirectory( $proPath1, 0755, true);
            \File::makeDirectory( $proPath2, 0755, true);
            \File::makeDirectory( $proPath3, 0755, true);
            \File::makeDirectory( $proPath4, 0755, true);
            \File::makeDirectory( $proPath5, 0755, true);
            \File::makeDirectory( $proPath6, 0755, true);
            \File::makeDirectory( $proPath7, 0755, true);
            \File::makeDirectory( $proPath8, 0755, true);
            \File::makeDirectory( $proPath9, 0755, true);
            \File::makeDirectory( $proPath10, 0755, true);
            \File::makeDirectory( $proPath11, 0755, true);
            \File::makeDirectory( $proPath12, 0755, true);
            \File::makeDirectory( $proPath13, 0755, true);
            \File::makeDirectory( $proPath14, 0755, true);
            \File::makeDirectory( $proPath15, 0755, true);
            \File::makeDirectory( $proPath16, 0755, true);
            \File::makeDirectory( $proPath17, 0755, true);
            \File::makeDirectory( $proPath18, 0755, true);
            \File::makeDirectory( $proPath19, 0755, true);
            \File::makeDirectory( $proPath20, 0755, true);
            \File::makeDirectory( $proPath21, 0755, true);
            \File::makeDirectory( $proPath22, 0755, true);
            \File::makeDirectory( $proPath23, 0755, true);
            \File::makeDirectory( $proPath24, 0755, true);
            \File::makeDirectory( $proPath25, 0755, true);
            \File::makeDirectory( $proPath26, 0755, true);
            \File::makeDirectory( $proPath27, 0755, true);
            \File::makeDirectory( $proPath28, 0755, true);
            \File::makeDirectory( $proPath29, 0755, true);
            \File::makeDirectory( $proPath30, 0755, true);
            \File::makeDirectory( $proPath31, 0755, true);
            \File::makeDirectory( $proPath32, 0755, true);
            \File::makeDirectory( $proPath33, 0755, true);
            \File::makeDirectory( $proPath34, 0755, true);
            \File::makeDirectory( $proPath35, 0755, true);
            \File::makeDirectory( $proPath36, 0755, true);
            \File::makeDirectory( $proPath37, 0755, true);
            \File::makeDirectory( $proPath38, 0755, true);
            \File::makeDirectory( $proPath39, 0755, true);
            \File::makeDirectory( $proPath40, 0755, true);
            \File::makeDirectory( $proPath41, 0755, true);
            \File::makeDirectory( $proPath42, 0755, true);
            \File::makeDirectory( $proPath43, 0755, true);
            \File::makeDirectory( $proPath44, 0755, true);
            \File::makeDirectory( $proPath45, 0755, true);
            \File::makeDirectory( $proPath46, 0755, true);
            \File::makeDirectory( $proPath47, 0755, true);
            \File::makeDirectory( $proPath48, 0755, true);
            \File::makeDirectory( $proPath49, 0755, true);
            \File::makeDirectory( $proPath50, 0755, true);
            \File::makeDirectory( $proPath51, 0755, true);
            \File::makeDirectory( $proPath52, 0755, true);
            \File::makeDirectory( $proPath53, 0755, true);

        }        
        $notification = array(
            'message' => 'Programa Creado Correctamente',
            'alert-type' => 'success'
        );
       return redirect()->route('programa.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}