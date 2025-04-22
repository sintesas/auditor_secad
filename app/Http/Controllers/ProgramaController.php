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

class ProgramaController extends Controller
{
  public function index()
  {


    $nombreCompleto = auth()->user()->nombre_completo;


    
      $idPersonal = \DB::table('AUFACVW_PersonalHH')->where('NombreCompleto', $nombreCompleto)->value('IdPersonal');
      $todosprogramas =  \DB::table('AUFACVW_PersonalHH')->where('IdPersonal', $idPersonal)->value('TodosProgramas');
      if ($todosprogramas == 1) {
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::all();
        return view('programasSecad.controlProgramas.ver_tablas_Crearprograma')->with('programas', $programas)->with('permiso', $permiso);
    } else{
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programas = Programa::getByUser($idPersonal);        
        return view('programasSecad.controlProgramas.ver_tablas_Crearprograma')->with('programas', $programas)->with('permiso', $permiso);
    }
    
    }



    
  
    public function deleteEspecialidad($idespecialidad){

      $record = \DB::table('AU_Reg_ProgramasEspecialidades')->where('IdEspecialidadPrograma', $idespecialidad)->delete();
        return response()->json($record);


    }
    public function deleteHoraBanco($idhorabanco){

      $record = \DB::table('AU_Reg_ProgramasBancos')->where('IdProgramasBancos', $idhorabanco)->delete();
        return response()->json($record);

    }
    public function deleteHoraEnsayo($idhoraensayo){

      $record = \DB::table('AU_Reg_ProgramasEnsayos')->where('IdProgramasEnsayos', $idhoraensayo)->delete();
        return response()->json($record);

    }


    public function storeEspecialidades(Request $req){

        $especialidad = new ProgramaEspecialidad;


        foreach ($req->IdEspecialidadCertificacion as $key => $v) {
            $data = array(
                'IdPrograma' => $req->IdPrograma,
                'IdEspecialidadCertificacion' => $req->IdEspecialidadCertificacion [$key],
                'IdPersonal' => $req->IdPersonal [$key],
                'Horas' => $req->Horas [$key],
                'Activo' => 1,  
            );
            ProgramaEspecialidad::insert($data);
        }

        
      return response()->json(['data' => $data, 'success'=>'done']);  

      return response()->json(['error'=>$validator->errors()->all()]);

    }


    public function storeBancos(Request $req){


      foreach ($req->IdBanco as $key => $v) {
            $data = array(
                'IdPrograma' => $req->IdPrograma,
                'IdBanco' => $req->IdBanco [$key],
                'Horas' => $req->Horas [$key],
                'Activo' => 1,
            );
            ProgramaBanco::insert($data);

        }



      return response()->json(['success'=>'done']);
    
      return response()->json(['error'=>$validator->errors()->all()]);

    }


    public function storeEnsayos(Request $req){

      foreach ($req->IdEnsayo as $key => $v) {
            $data = array(
                'IdPrograma' => $req->IdPrograma,
                'IdEnsayo' => $req->IdEnsayo [$key],
                'IdTipoEnsayo' => $req->IdTipoEnsayo [$key],
                'Horas' => $req->Horas [$key],
                'Activo' => 1,
            );
            ProgramaEnsayo::insert($data);

        }

      return response()->json(['success'=>'done']);
    
      return response()->json(['error'=>$validator->errors()->all()]);

    }


    public function storePrograma(Request $request)
    {

       // $programa = new Programa;
       $programa = Programa::find($request->IdPrograma);
       // store info
       // $programa->IdPrograma = $request->IdPrograma;
       $programa->IdTipoPrograma = $request->IdTipoPrograma;
       $programa->IdAeronave = $request->IdAeronave;       
       $programa->IdUnidad = $request->IdUnidad;
       $programa->IdEmpresa = $request->IdEmpresa;       
       $programa->IdEstadoPrograma = $request->IdEstadoPrograma;
       $programa->AccionSECAD = $request->AccionSECAD;
       $programa->Proyecto = $request->Proyecto;
       $programa->Alcance = $request->Alcance;
       $programa->IdProductoServicio = $request->IdProductoServicio;
       $programa->IdHorasTipoPrograma = $request->IdHorasTipoPrograma;
       $programa->IdPersonalJefePrograma = $request->IdPersonalJefePrograma;
       $programa->IdPersonalJefeSuplente = $request->IdPersonalJefeSuplente;
       $programa->FechaInicio = $request->FechaInicio;
       $programa->FechaTermino = $request->FechaTermino;
       $programa->IdRespuestoModificacion = $request->IdRespuestoModificacion;
       $programa->IdAReferenciaPrograma = $request->IdAReferenciaPrograma;
       $programa->AnioCertificacion = $request->AnioCertificacion;
       $programa->IdEstadoCertificacion = $request->IdEstadoCertificacion;
       // $programa->IdBaseCertificacion = $request->IdBaseCertificacion;
       $programa->Finalizado = $request->Finalizado;
       $programa->FechaFin = $request->FechaFin;
       $programa->Active = 1; 
       $programa->save();

       

      // Programa::updateOrCreate(
            
      //       ['IdPrograma'   => $req->IdPrograma,],
            
      //       [
      //           'IdTipoPrograma' => $req->IdTipoPrograma,
      //           'IdAeronave' => $req->IdAeronave,
      //           'IdUnidad' => $req->IdUnidad,
      //           'IdEmpresa' => $req->IdEmpresa,
      //           'IdEstadoPrograma' => $req->IdEstadoPrograma,
      //           'AccionSECAD' => $req->AccionSECAD,
      //           'Proyecto' => $req->Proyecto,
      //           'Alcance' => $req->Alcance,
      //           'IdProductoServicio' => $req->IdProductoServicio,
      //           'IdHorasTipoPrograma' => $req->IdHorasTipoPrograma,
      //           'IdPersonalJefePrograma' => $req->IdPersonalJefePrograma,
      //           'IdPersonalJefeSuplente' => $req->IdPersonalJefeSuplente,
      //           'FechaInicio' => $req->FechaInicio,
      //           'FechaTermino' => $req->FechaTermino,
      //           'IdRespuestoModificacion' => $req->IdRespuestoModificacion,
      //           'IdAReferenciaPrograma' => $req->IdAReferenciaPrograma,
      //           'IdBaseCertificacion' => $req->IdBaseCertificacion,
      //           'Finalizado' => $req->Finalizado,
      //           'FechaFin' => $req->FechaFin,
      //           'Active' => 1 ,
      //   ]);

      //  return response()->json(['success'=>'done']);
    
      //  return response()->json(['error'=>$validator->errors()->all()]);

    }


    public function edit($IdPrograma)
    {

        $programa = Programa::find($IdPrograma);
         //Set Dropdown TipoPrograma
         $TipoProgramas = TipoPrograma::where('Activo', 1)->get(['IdTipoPrograma', 'Tipo']);
         $TipoProgramas->prepend('None');  
         //Set Dropdown Aeronave
        $Aeronaves = Aeronave::all(['IdAeronave', 'Aeronave']);
        $Aeronaves->prepend('None');  
         //Set Dropdown Unidad
        $Unidades = Unidad::all(['IdUnidad', 'NombreUnidad'])->sortBy("NombreUnidad");
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

        $Productos = DemandaPotencial::all(['IdDemandaPotencial', 'Nombre'])->sortBy("Nombre");
        $Productos->prepend('None');  

        //Set Dropdown Personal
        $Personal = Personal::getPersonalWithRango();
        $Personal->prepend('None'); 

        //Set Dropdown Repuesto
        $Repuesto = Repuesto::all(['IdRepuesto', 'Descripcion'])->sortBy("Descripcion");
        $Repuesto->prepend('None');  
        //Set Dropdown Referencia
        $Referencia = Referencia::all(['IdReferencia', 'Descripcion'])->sortBy("Descripcion");
        $Referencia->prepend('None');  
        //Set Dropdown BaseCertificacion
        $BaseCertificacion = BaseCertificacion::all(['IdBaseCertificacion', 'Nombre'])->sortBy("Nombre");
        $BaseCertificacion->prepend('None');  



        // Especialidades
          // ProgramaEspecialidad

        $especialidades = Programa::find($IdPrograma)->especialidades;
        $listaespecialidadescertificacion = EspecialidadCertificacion::all();
        $listapersonal = Personal::all();
          
        // bancos
          // ProgramaBanco

        $bancos = Programa::find($IdPrograma)->bancos;
        $listabancos = Banco::all();

        // Ensayos
          // ProgramaEnsayo

        $ensayos = Programa::find($IdPrograma)->ensayos;
        $listaensayos = Ensayo::all();
        $listatipoensayos = TipoEnsayo::all();

        $alcances = ['Aprobación de Diseño Aeronáutico'=>'Aprobación de Diseño Aeronáutico',
                      'Aprobación de Producción Aeronáutica' => 'Aprobación de Producción Aeronáutica',
                      'Reconocimiento Organización Aeronáutica' => 'Reconocimiento Organización Aeronáutica'];

        $areas = ['ACPA'=>'ACPA - Área Certificación Productos Aeronáuticos',
                  'AREV'=>'AREV - Área Reconocimiento y Evaluación'];
                  
        $estado_cert = \DB::select("select * from vw_cp_estado_certificacion where ActivoCertificacion = 1");
        $estadosc = collect($estado_cert);
        $estadosc->prepend('None');

  

        return view('programasSecad.controlProgramas.ver_tablas_editarPrograma')
            ->withPrograma($programa)
            ->with('TipoProgramas', $TipoProgramas)
            ->with('Aeronaves', $Aeronaves)
            ->with('Unidades', $Unidades)
            ->with('Estados', $Estados)
            ->with('Empresas', $Empresas)
            ->with('Productos', $Productos)
            ->with('Personal', $Personal)
            ->with('Repuesto', $Repuesto)
            ->with('Referencia', $Referencia)
            ->with('BaseCertificacion', $BaseCertificacion)
            ->with('especialidades', $especialidades)
            ->with('bancos', $bancos)
            ->with('listabancos', $listabancos)
            ->with('ensayos', $ensayos)
            ->with('listaensayos', $listaensayos)
            ->with('listatipoensayos', $listatipoensayos)
            ->with('listapersonal', $listapersonal)
            ->with('alcances', $alcances)
            ->with('areas', $areas)
            ->with('listaespecialidadescertificacion', $listaespecialidadescertificacion)
            ->with('estadosc', $estadosc);
    }

    public function update(Request $request, $idPrograma){
      $programa = Programa::find($idPrograma);
       $programa->IdTipoPrograma = $request->IdTipoPrograma;
       $programa->IdAeronave = $request->IdAeronave;       
       $programa->IdUnidad = $request->IdUnidad;
       $programa->IdEmpresa = $request->IdEmpresa;       
       $programa->IdEstadoPrograma = $request->IdEstadoPrograma;
       $programa->AccionSECAD = $request->AccionSECAD;
       $programa->Proyecto = $request->Proyecto;
       $programa->Alcance = $request->Alcance;
       $programa->IdProductoServicio = $request->IdProductoServicio;
       $programa->IdHorasTipoPrograma = $request->IdHorasTipoPrograma;
       $programa->IdPersonalJefePrograma = $request->IdPersonalJefePrograma;
       $programa->IdPersonalJefeSuplente = $request->IdPersonalJefeSuplente;
       $programa->FechaInicio = $request->FechaInicio;
       $programa->FechaTermino = $request->FechaTermino;
       $programa->IdRespuestoModificacion = $request->IdRespuestoModificacion;
       $programa->IdAReferenciaPrograma = $request->IdAReferenciaPrograma;
       $programa->AnioCertificacion = $request->AnioCertificacion;
       $programa->IdEstadoCertificacion = $request->IdEstadoCertificacion;

       // $programa->IdBaseCertificacion = $request->IdBaseCertificacion;
       if($request->Finalizado)
       {
        $programa->Finalizado = $request->Finalizado;
       }
       $programa->save();

       $empresa = \App\Models\VistaProgramas::where('IdPrograma', $programa->IdPrograma)
    ->where('IdEmpresa', $programa->IdEmpresa)
    ->first(['NombreEmpresa']); 


if ($empresa) {
    \DB::table('AU_Reg_AuditoriaProgramas')
        ->where('IdPrograma', $programa->IdPrograma)  
        ->update([
            'organizacion' => $empresa->NombreEmpresa  // Actualizamos el campo `organizacion`
        ]);
}



       $notification = array(
              'message' => 'Datos actualizados correctamente',
              'alert-type' => 'success'
          );
       return redirect()->route('programa.index')->with($notification);
    }


    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function destroy($IdPrograma)
    {
        $existsSeguimiento = \DB::table('AU_Reg_ListasSeguimiento')->where('IdPrograma', $IdPrograma)->first();
        $existsCMDRequesitos = \DB::table('AU_Reg_CMDRequisitos')->where('IdPrograma', $IdPrograma)->first();

        // // dd($exists);
        if(!$existsSeguimiento && !$existsCMDRequesitos){
            try {
            $programa = Programa::find($IdPrograma);
            $programa->delete();
            
            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        } catch (Exception $e) {
            $notification = array(
            'message' => 'No se puede eliminar este Programa error:'.$e, 
            'alert-type' => 'warning'
          );
        }
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar este Programa ya tiene datos asignados.', 
            'alert-type' => 'warning'
          );
        }

        

        
        return redirect()->route('programa.index')->with($notification);
    }

  }