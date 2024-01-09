<?php

namespace App\Http\Controllers;

set_time_limit(300);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\ClasesConnotaciones;
use App\Models\CriteriosAuditorias;
use App\Models\ProgramaCalidad;
use App\Models\FuenteAnotacion;
use App\Models\ProcesoInterno;
use App\Models\TipoAnotacion;
use App\Models\CriticidadAnotacion;
use App\Models\Auditoria;
use App\Models\Anotacion;
use App\Models\CausaRaiz;
use App\Models\Aspecto5m;
use App\Models\Fivem;
use App\Models\UsersLDAP;
use App\Models\DependenciasLDAP;
use App\Models\AnotacionesResponsables;
use App\Models\AnotacionesFiles;
use App\Models\ActividadesInspeccion;

class AnotacionesController extends Controller
{
    public function index()
    {
        // $rol = UsersLDAP::perteneceIGEFA();
        // $rolAdd = "";

        $anotaciones = Anotacion::getAllAnotaciones();

        // if($rol){
        //     $anotaciones = Anotacion::getAllAnotaciones();
        // }else{
        //     $rol = UsersLDAP::perteneceCEOAF();
        //     if($rol){
        //         $anotaciones = Anotacion::getAllAnotaciones();
        //         $rol = 'limitador';
        //     }else{

        //         $rol = false;

        //         $name = Auth::user()->name;
        //         $idPersonal = Auth::user()->IdPersonal;

        //         $anotaciones = Anotacion::getAnotacionesByUser($idPersonal, $name);

        //         $rol = 'limitador';
        //         $rolAdd = 'limitador-user';
        //     }
        // }


         return view('auditoria.anotaciones.ver_tablas_anotaciones')
                ->with('anotaciones', $anotaciones);
    }

    //Genera Consecutivo auditoria siguente para el empresa
    public function getMarcoLegal(Request $request, $id){
      if($request->ajax())
        {
            $anotacion = Anotacion::sigla($id);
            return response()->json($anotacion);
        }
    }



    public function create()
    {
        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;

        if (Auth::user()->hasRole('administrador')) {
           //Set Dropdown Auditoria
            $auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditorias->prepend('None');
        }else{
            //Set Dropdown Auditoria
            //$auditorias = Auditoria::getByUserAuditorias($idPersonal, $name);
            $auditorias = Auditoria::getByUser($idPersonal);
            $auditorias->prepend('None');
        }

        $clasesAnotaciones = ClasesConnotaciones::all();
        $clasesAnotaciones->prepend('none');

        $programasCalidad = ProgramaCalidad::all(['IdProgramaCalidad', 'ProgramaCalidad']);
        $programasCalidad->prepend('none');

        $fuentesAnotacion = FuenteAnotacion::all(['IdFuentesAnotacion', 'Fuente']);
        $fuentesAnotacion->prepend('none');

        $procesosInternos = ProcesoInterno::all(['IdProcesoInterno', 'Descripcion']);
        $procesosInternos->prepend('none');

        $tiposAnotacion = TipoAnotacion::all(['IdTipoAnotacion','Anotacion']);
        $tiposAnotacion->prepend('none');

        $criticidadesAnotacion = CriticidadAnotacion::all(['IdCriticidadAnotacion','CriticidadAnotacion']);
        $criticidadesAnotacion->prepend('none');

        $personalLDAP = $this->getFuncionariosLDAP();

        $dependencias = $this->getDependencias();

        return view ('auditoria.anotaciones.crear_anotacion')
            ->with('auditorias', $auditorias)
            ->with('programasCalidad', $programasCalidad)
            ->with('fuentesAnotacion', $fuentesAnotacion)
            ->with('procesosInternos', $procesosInternos)
            ->with('clasesAnotaciones', $clasesAnotaciones)
            ->with('tiposAnotacion', $tiposAnotacion)
            ->with('dependencias', $dependencias)
            ->with('personalLDAP', $personalLDAP)
            ->with('criticidadesAnotacion', $criticidadesAnotacion);
    }


    public function store(Request $request)
    {

        //Fecha Actual
        $hoy = getdate();

        $anotacion = new Anotacion;
        $anotacion->IdAuditoria = $request->input('IdAuditoria');//IdAuditoria
        $anotacion->NoAnota = $request->input('NoAnota');// No anotación
        $anotacion->IdTipoAnotacion = $request->input('IdTipoAnotacion');//Tipo Anotación
        $anotacion->Fecha = $request->input('Fecha');//Fecha
        $anotacion->IdFuentesAnotacion = $request->input('IdFuentesAnotacion');// Fuente
        $anotacion->IdActividadPlanInspeccion = $request->input('IdActividadPlanInspeccion');// Actividad Plan Inspección
        $anotacion->IdClaseAnotacion = $request->input('IdClaseAnotacion');//Clase
        $anotacion->IdEnUnaAnotacion = $request->input('IdEnUnaAnotacion');// Es una Anotación
        $anotacion->DescripcionEvidencia = $request->input('DescripcionEvidencia');// Descripción
        $anotacion->Plazo = $request->input('Plazo');// Plazo
        $anotacion->IdProgramaCalidad = $request->input('IdProgramaCalidad');//Programa Calidad afecto
        $anotacion->Correccion = $request->input('Correccion'); //Corrección
        $anotacion->IdCriticidadAnotacion = $request->input('IdCriticidadAnotacion');//Criticidad
        $anotacion->IdResponsableAprobacion = $request->input('IdResponsableAprobacion');//Responsable Aprobación
        $anotacion->AuditoriaAnterior = $request->input('AuditoriaAnterior');//Se reporto en una auditoria anterior
        $anotacion->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');//Estado usuario


        $anotacion->save();

        /**
         * Responsables
         */

        $IdAnotacion = $anotacion->getKey();

        $IdDependenciaResponsableCorreccion = $request->input('IdDependenciaResponsableCorreccion');
        if(is_array($IdDependenciaResponsableCorreccion)){
            foreach ($IdDependenciaResponsableCorreccion AS $value) {
                $regAnotacionesResponsablesCorreccion = new AnotacionesResponsables;
                $regAnotacionesResponsablesCorreccion->IdAnotacion = $IdAnotacion;
                $regAnotacionesResponsablesCorreccion->IdResponsableCorreccion = $value;
                $regAnotacionesResponsablesCorreccion->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regAnotacionesResponsablesCorreccion->save();
            }
        }

        $IdDependenciaResponsableMejoramiento = $request->input('IdDependenciaResponsableMejoramiento');
        if(is_array($IdDependenciaResponsableMejoramiento)){
            foreach ($IdDependenciaResponsableMejoramiento AS $value) {
                $regAnotacionesResponsablesMejoramiento = new AnotacionesResponsables;
                $regAnotacionesResponsablesMejoramiento->IdAnotacion = $IdAnotacion;
                $regAnotacionesResponsablesMejoramiento->IdResponsableMejoramiento = $value;
                $regAnotacionesResponsablesMejoramiento->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regAnotacionesResponsablesMejoramiento->save();
            }
        }

        $IdDependenciaResponsableHallazgo = $request->input('IdDependenciaResponsableHallazgo');
        if(is_array($IdDependenciaResponsableHallazgo)){
            foreach ($IdDependenciaResponsableHallazgo AS $value) {
                $regAnotacionesResponsablesHallazgo = new AnotacionesResponsables;
                $regAnotacionesResponsablesHallazgo->IdAnotacion = $IdAnotacion;
                $regAnotacionesResponsablesHallazgo->IdResponsableHallazgo = $value;
                $regAnotacionesResponsablesHallazgo->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regAnotacionesResponsablesHallazgo->save();
            }
        }

        $IdResponsableSeguimiento = $request->input('IdResponsableSeguimiento');
        if(is_array($IdResponsableSeguimiento)){
            foreach ($IdResponsableSeguimiento AS $value) {
                $regAnotacionesResponsablesHallazgo = new AnotacionesResponsables;
                $regAnotacionesResponsablesHallazgo->IdAnotacion = $IdAnotacion;
                $regAnotacionesResponsablesHallazgo->IdResponsableSeguimiento = $value;
                $regAnotacionesResponsablesHallazgo->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regAnotacionesResponsablesHallazgo->save();
            }
        }

        $files = $request->file('docs');

        if(!empty($files)){
            $anotacionesPath = public_path('secad\Anotaciones\\' . $request->input('NoAnota') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday']);
            $documentos = '';
            foreach ($files as $file){
                $fileName = $file->getClientOriginalName();
                $documentos = 'secad\Anotaciones\\' . $request->input('NoAnota') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday'].'\\'.$fileName;
                $file->move($anotacionesPath, $fileName);
                $regAnotacionesFiles = new AnotacionesFiles;
                $regAnotacionesFiles->IdAnotacion = $IdAnotacion;
                $regAnotacionesFiles->FileNameDoc = $fileName;
                $regAnotacionesFiles->PathDoc = $documentos;
                $regAnotacionesFiles->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regAnotacionesFiles->save();
            }
        }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );
        return redirect()->route('anotacion.index')->with($notification);
    }


    public function show($id)
    {

    }
    public function edit($IdAnotacion)
    {

        $rol = UsersLDAP::perteneceIGEFA();

        if($rol){
            $rol = true;
        }else{
            $rol = UsersLDAP::perteneceCEOAF();
            if($rol){
                $rol = 'limitador';
            }else{
                $rol = 'limitador-all';
            }
        }

        $anotacion = Anotacion::find($IdAnotacion);

        $criterio = Anotacion::findCriterio($IdAnotacion);

        $auditoria = Auditoria::find($anotacion->IdAuditoria);

        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;

        if (Auth::user()->hasRole('administrador') || $rol == true) {
           //Set Dropdown Auditoria
            $auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditorias->prepend('None');
        }else{
            //Set Dropdown Auditoria
            $auditorias = Auditoria::getByUserAuditorias($idPersonal, $name);
            $auditorias->prepend('None');
        }

        $clasesAnotaciones = ClasesConnotaciones::all();
        $clasesAnotaciones->prepend('none');

        $fileAnotaciones = AnotacionesFiles::where('IdAnotacion', '=', $IdAnotacion)->get();

        $programasCalidad = ProgramaCalidad::all(['IdProgramaCalidad', 'ProgramaCalidad']);
        $programasCalidad->prepend('none');

        $fuentesAnotacion = FuenteAnotacion::all(['IdFuentesAnotacion', 'Fuente']);
        $fuentesAnotacion->prepend('none');

        $procesosInternos = ProcesoInterno::all(['IdProcesoInterno', 'Descripcion']);
        $procesosInternos->prepend('none');

        $tiposAnotacion = TipoAnotacion::all(['IdTipoAnotacion','Anotacion']);
        $tiposAnotacion->prepend('none');

        $tipoAnotacion = TipoAnotacion::find($anotacion->IdTipoAnotacion);

        $criticidadesAnotacion = CriticidadAnotacion::all(['IdCriticidadAnotacion','CriticidadAnotacion']);
        $criticidadesAnotacion->prepend('none');

        $personalLDAP = $this->getFuncionariosLDAP();

        $dependencias = $this->getDependencias();

        $personalLDAPAprobacion = UsersLDAP::all(['IdUserLDAP', 'Name']);
        $personalLDAPAprobacion->prepend('none');

        //Dependencias Responsables Correccion
        $resultResponsableCorreccion = AnotacionesResponsables::select('IdResponsableCorreccion')->where('IdAnotacion', '=', \DB::raw($IdAnotacion.'  and IdResponsableCorreccion IS NOT NULL'))->get();

        $buildResponsableCorreccion= array();
        foreach(json_decode($resultResponsableCorreccion) AS $value){
            $buildResponsableCorreccion[] = $value->IdResponsableCorreccion;
        }

        //Dependencias Responsables Mejoramiento
        $resultResponsableMejoramiento = AnotacionesResponsables::select('IdResponsableMejoramiento')->where('IdAnotacion', '=', \DB::raw($IdAnotacion.'  and IdResponsableMejoramiento IS NOT NULL'))->get();

        $buildResponsableMejoramiento= array();
        foreach(json_decode($resultResponsableMejoramiento) AS $value){
            $buildResponsableMejoramiento[] = $value->IdResponsableMejoramiento;
        }

        //Dependencias Responsables Hallazgo
        $resultResponsableHallazgo = AnotacionesResponsables::select('IdResponsableHallazgo')->where('IdAnotacion', '=', \DB::raw($IdAnotacion.'  and IdResponsableHallazgo IS NOT NULL'))->get();

        $buildResponsableHallazgo= array();
        foreach(json_decode($resultResponsableHallazgo) AS $value){
            $buildResponsableHallazgo[] = $value->IdResponsableHallazgo;
        }

        //Responsables Seguimiento
        $resultResponsableSeguimiento = AnotacionesResponsables::select('IdResponsableSeguimiento')->where('IdAnotacion', '=', \DB::raw($IdAnotacion.'  and IdResponsableSeguimiento IS NOT NULL'))->get();

        $buildResponsableSeguimiento= array();
        foreach(json_decode($resultResponsableSeguimiento) AS $value){
            $buildResponsableSeguimiento[] = $value->IdResponsableSeguimiento;
        }



        return view ('auditoria.anotaciones.editar_anotacion')
            ->with('auditorias', $auditorias)
            ->with('auditoria', $auditoria)
            ->with('programasCalidad', $programasCalidad)
            ->with('fuentesAnotacion', $fuentesAnotacion)
            ->with('procesosInternos', $procesosInternos)
            ->with('tipoAnotacion',$tipoAnotacion)
            ->with('tiposAnotacion', $tiposAnotacion)
            ->with('dependencias', $dependencias)
            ->with('criterio', $criterio)
            ->with('personalLDAP', $personalLDAP)
            ->with('personalLDAPAprobacion', $personalLDAPAprobacion)
            ->with('clasesAnotaciones', $clasesAnotaciones)
            ->with('buildResponsableCorreccion', json_encode($buildResponsableCorreccion))
            ->with('buildResponsableMejoramiento', json_encode($buildResponsableMejoramiento))
            ->with('buildResponsableHallazgo', json_encode($buildResponsableHallazgo))
            ->with('buildResponsableSeguimiento', json_encode($buildResponsableSeguimiento))
            ->with('criticidadesAnotacion', $criticidadesAnotacion)
            ->with('fileAnotaciones', $fileAnotaciones)
            ->with('anotacion', $anotacion)
            ->with('rol', $rol);
    }


    public function update(Request $request, $IdAnotacion)
    {
        //Fecha Actual
        $hoy = getdate();

        //Rol User
        $rol = $request->input('rolUser');

        //dd($IdAnotacion);

        if($rol === 'limitador'){//CEOAF

            $IdDependenciaResponsableSeguimiento = $request->input('IdResponsableSeguimiento');
            if(is_array($IdDependenciaResponsableSeguimiento)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableSeguimiento is not null'))->delete();
                foreach ($IdDependenciaResponsableSeguimiento AS $value) {
                    $regAnotacionesResponsablesSeguimiento = new AnotacionesResponsables;
                    $regAnotacionesResponsablesSeguimiento->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesSeguimiento->IdResponsableSeguimiento = $value;
                    $regAnotacionesResponsablesSeguimiento->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesSeguimiento->save();
                }
            }

            $IdDependenciaResponsableHallazgo = $request->input('IdDependenciaResponsableHallazgo');
            if(is_array($IdDependenciaResponsableHallazgo)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableHallazgo is not null'))->delete();
                foreach ($IdDependenciaResponsableHallazgo AS $value) {
                    $regAnotacionesResponsablesHallazgo = new AnotacionesResponsables;
                    $regAnotacionesResponsablesHallazgo->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesHallazgo->IdResponsableHallazgo = $value;
                    $regAnotacionesResponsablesHallazgo->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesHallazgo->save();

                    //Enviar email asignado
                    /*$subject = "Asunto del correo";
                    $for = "brandolvargas9@gmail.com";
                    Mail::send('auditoria.anotaciones.ver_tablas_anotaciones',$request->all(), function($msj) use($subject,$for){
                        $msj->from("brandolvargas9@gmail.com","NombreQueApareceráComoEmisor");
                        $msj->subject($subject);
                        $msj->to($for);
                    });*/

                    //Mail::to("brandolvargas9@gmail.com")->send(new TestMail("Prueba"));

                    /*$to_email = 'brandolvargas9@gmail.com';
                    $subject = 'Testing PHP Mail';
                    $message = 'This mail is sent using the PHP mail function';
                    $headers = 'From: noreply @ company . com';
                    mail($to_email,$subject,$message,$headers);*/

                /*$headers =  'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'From: Your name <info@address.com>' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // El mensaje
                    $mensaje = "un pequeño resumen";

                    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
                    $mensaje = wordwrap($mensaje, 70, "\r\n");

                    // Enviarlo
                    mail('brandolvargas9@gmail.com', 'Mi título', $mensaje, $headers);*/
                }
            }
        }else{
            $anotacion = Anotacion::find($IdAnotacion);
            $anotacion->IdAuditoria = $request->input('IdAuditoria');//IdAuditoria
            $anotacion->NoAnota = $request->input('NoAnota');// No anotación
            $anotacion->IdTipoAnotacion = $request->input('IdTipoAnotacion');//Tipo Anotación
            $anotacion->Fecha = $request->input('Fecha');//Fecha
            $anotacion->IdFuentesAnotacion = $request->input('IdFuentesAnotacion');// Fuente
            $anotacion->IdActividadPlanInspeccion = $request->input('IdActividadPlanInspeccion');// Actividad Plan Inspección
            $anotacion->IdClaseAnotacion = $request->input('IdClaseAnotacion');//Clase
            $anotacion->IdEnUnaAnotacion = $request->input('IdEnUnaAnotacion');// Es una Anotación
            $anotacion->DescripcionEvidencia = $request->input('DescripcionEvidencia');// Descripción
            $anotacion->Plazo = $request->input('Plazo');// Plazo
            $anotacion->IdProgramaCalidad = $request->input('IdProgramaCalidad');//Programa Calidad afecto
            $anotacion->Correccion = $request->input('Correccion'); //Corrección
            $anotacion->IdCriticidadAnotacion = $request->input('IdCriticidadAnotacion');//Criticidad
            $anotacion->AuditoriaAnterior = $request->input('AuditoriaAnterior');//Se reporto en una auditoria anterior
            $anotacion->IdResponsableAprobacion = $request->input('IdResponsableAprobacion');//Responsable Aprobación
            $anotacion->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');//Estado usuario

            $anotacion->save();

            $IdDependenciaResponsableCorreccion = $request->input('IdDependenciaResponsableCorreccion');
            if(is_array($IdDependenciaResponsableCorreccion)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableCorreccion is not null'))->delete();
                foreach ($IdDependenciaResponsableCorreccion AS $value) {
                    $regAnotacionesResponsablesCorreccion = new AnotacionesResponsables;
                    $regAnotacionesResponsablesCorreccion->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesCorreccion->IdResponsableCorreccion = $value;
                    $regAnotacionesResponsablesCorreccion->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesCorreccion->save();
                }
            }

            $IdDependenciaResponsableMejoramiento = $request->input('IdDependenciaResponsableMejoramiento');
            if(is_array($IdDependenciaResponsableMejoramiento)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableMejoramiento is not null'))->delete();
                foreach ($IdDependenciaResponsableMejoramiento AS $value) {
                    $regAnotacionesResponsablesMejoramiento = new AnotacionesResponsables;
                    $regAnotacionesResponsablesMejoramiento->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesMejoramiento->IdResponsableMejoramiento = $value;
                    $regAnotacionesResponsablesMejoramiento->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesMejoramiento->save();
                }
            }

            $IdDependenciaResponsableSeguimiento = $request->input('IdResponsableSeguimiento');
            if(is_array($IdDependenciaResponsableSeguimiento)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableSeguimiento is not null'))->delete();
                foreach ($IdDependenciaResponsableSeguimiento AS $value) {
                    $regAnotacionesResponsablesSeguimiento = new AnotacionesResponsables;
                    $regAnotacionesResponsablesSeguimiento->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesSeguimiento->IdResponsableSeguimiento = $value;
                    $regAnotacionesResponsablesSeguimiento->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesSeguimiento->save();
                }
            }

            $IdDependenciaResponsableHallazgo = $request->input('IdDependenciaResponsableHallazgo');
            if(is_array($IdDependenciaResponsableHallazgo)){
                AnotacionesResponsables::where('IdAnotacion', '=', \DB::raw($IdAnotacion . 'and IdResponsableHallazgo is not null'))->delete();
                foreach ($IdDependenciaResponsableHallazgo AS $value) {
                    $regAnotacionesResponsablesHallazgo = new AnotacionesResponsables;
                    $regAnotacionesResponsablesHallazgo->IdAnotacion = $IdAnotacion;
                    $regAnotacionesResponsablesHallazgo->IdResponsableHallazgo = $value;
                    $regAnotacionesResponsablesHallazgo->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesResponsablesHallazgo->save();
                }
            }

            $files = $request->file('docs');
            if(!empty($files)){
                AnotacionesFiles::where('IdAnotacion', $IdAnotacion)->delete();
                $anotacionesPath = public_path('secad\Anotaciones\\' . $request->input('NoAnota') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday']);
                $documentos = '';
                foreach ($files as $file){
                    $fileName = $file->getClientOriginalName();
                    $documentos = 'secad\Anotaciones\\' . $request->input('NoAnota') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday'].'\\'.$fileName;
                    $file->move($anotacionesPath, $fileName);
                    $regAnotacionesFiles = new AnotacionesFiles;
                    $regAnotacionesFiles->IdAnotacion = $IdAnotacion;
                    $regAnotacionesFiles->FileNameDoc = $fileName;
                    $regAnotacionesFiles->PathDoc = $documentos;
                    $regAnotacionesFiles->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                    $regAnotacionesFiles->save();
                }
            }
        }

        $notification = array(
            'message' => 'Datos actualizados correctamente',
            'alert-type' => 'success'
        );

        return redirect('/anotacion')->with($notification);
    }


    public function destroy($id)
    {
        $anotacion = Anotacion::find($id);
        $anotacion->causasraiz()->forceDelete();
        $anotacion->EstadoAnotacion = 0;
        $anotacion->save();

        $notification = array(
          'message' => 'Se ha eliminado la anotación correctamente',
          'alert-type' => 'success'
        );

        return redirect('anotacion')->with($notification);

    }


    //Genera Consecutivo de anotacion pox auditoria siguente para el empresa
    public function getNextNotaAuditoria(Request $request, $IdAuditoria)
    {
        if($request->ajax())
        {
            $anotacion = Anotacion::getNextNotaAuditoria($IdAuditoria);
            return response()->json($anotacion);
        }
    }

    //Obtener las actividades de inspeccioón
    public function getActividadesInspeccion(Request $request, $IdAuditoria)
    {
      if($request->ajax())
        {
            $actividades = Anotacion::getActividadesInspeccion($IdAuditoria);
            return response()->json($actividades);
        }
    }

    //Obtener Subprocesos
    public function getSubProcesos(Request $request, $textoSearch)
    {
      if($request->ajax())
        {
            $subProcesos = CriteriosAuditorias::getSubProcesosGroupBy($textoSearch);
            return response()->json($subProcesos);
        }
    }

    //Obtener Dependencias
    public function getDependencias(){
        $ResultDependencias = DependenciasLDAP::all(['IdDependencia', 'Nombre']);
        $buildSection = array();
        foreach(json_decode($ResultDependencias) AS $value){
            $buildSection[$value->IdDependencia] = $value->Nombre;
        }

        return $buildSection;
    }
    //Obtener Funcionarios de LDAP
    public function getFuncionariosLDAP()
    {
        $ResultUsersLDAP = UsersLDAP::all(['IdUserLDAP', 'Name']);
        $buildSection = array();
        foreach(json_decode($ResultUsersLDAP) AS $value){
            $buildSection[$value->IdUserLDAP] = $value->Name;
        }

        return $buildSection;
    }

    public function getEstadoInsertOrganizacion(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $auditoria = Auditoria::getEstadoAuditoriaUser($IdAuditoria);
            return response()->json($auditoria);
        }
    }

    public function getEquipoInspectorEmpresa(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $equipoInspectorEmpresa = Auditoria::getEquipoInspectorEmpresa($IdAuditoria);
            return response()->json($equipoInspectorEmpresa);
        }
    }
    public function getEquipoInspectorLDAP(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $equipoInspectorLDAP = Auditoria::getEquipoInspectorLDAP($IdAuditoria);
            return response()->json($equipoInspectorLDAP);
        }
    }
    public function getCriterioActividad(Request $request, $idActividad){
        $criterio = ActividadesInspeccion::getCriterioActividad($idActividad);
        return $criterio;
    }
}