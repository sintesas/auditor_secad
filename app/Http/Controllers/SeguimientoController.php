<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Tools;
use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\ListasSeguimiento;
use App\Models\ListaSegProgEmp;


class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $seguimiento = new ListasSeguimiento;

        $seguimiento->IdPrograma = $request->input('IdPrograma');
        $seguimiento->IdTipoPrograma = $request->input('IdTipoPrograma');
        $seguimiento->IdActividad = $request->input('IdActividad');
        $seguimiento->Fecha = $request->input('Fecha');
        $seguimiento->Situacion = $request->input('Situacion');
        $seguimiento->Evidencias = $request->input('Evidencias');
        if($request->input('Situacion')=='Proceso')
        {
            $seguimiento->Porcentaje = $request->input('Porcentaje');
        }
        else
        {
            if($request->input('Situacion')=='Pendiente')
                $seguimiento->Porcentaje = 0;
            else
                $seguimiento->Porcentaje = 100;
        }
        $seguimiento->Horas = 0;

        try { 
            
            $consecutivo = $request->input('consecutivo');
            $actividad = $request->input('actividad');
            $folder = $request->input('folder');

            $files = $request->file('docs');
            $fileName = '';
            if(!empty($files)){
                $seguimientoPath = public_path('secad\Programas\\'.$consecutivo.'\\'.$folder .'\\');

                $documentos = '';
                foreach ($files as $file){
                    // $fileName = tools::slugify($file->getClientOriginalName());
                    $fileName = $file->getClientOriginalName();
                    $file->move($seguimientoPath, $fileName);
                    if($documentos == ''){
                        $documentos = 'secad\Programas\\'.$consecutivo.'\\'.$folder .'\\'.$fileName;
                    }
                    else
                    {
                        $documentos = $documentos.'&'.'secad\Programas\\'.$consecutivo.'\\'.$folder .'\\'.$fileName;
                    }
                }
                $seguimiento->Documentos = $documentos;
            }

            // $data = array('consecutivo' => $consecutivo,
            //               'actividad' => $actividad,
            //               'observaciones' => $seguimiento->Evidencias,
            //               'fileName' => $fileName);

            // Mail::send('emails.mail_seguimiento',  $data, function($message){
            //     $message->from('testprojectsysoft@gmail.com', 'Auditor Plus - Seguimiento Porgama');
            //     $message->to('ruben.wilches@symetrixsoft.com')
            //              ->subject('Se ha adjuntado un nuevo documeto');
            // });
           
            $seguimiento->save();


            $seguimientoEmp = new ListaSegProgEmp;
            $seguimientoEmp->IdPrograma = $request->input('IdPrograma');
            $seguimientoEmp->IdTipoPrograma = $request->input('IdTipoPrograma');
            $seguimientoEmp->IdActividad = $request->input('IdActividad');
            $seguimientoEmp->Fecha = $request->input('Fecha');        
            $seguimientoEmp->Observaciones = $request->input('Evidencias');
            $seguimientoEmp->save();
            
            $notification = array(
                    'message' => 'Datos guardados correctamente', 
                    'alert-type' => 'success'
                );

            return redirect()->route('seguimientoActividades.show', $seguimiento->IdActividad . '&' . $seguimiento->IdPrograma)
                         ->with($notification) ;
        }
        catch(Exception $e){
            Log::error('Error occured: ' . $e);
            $notification = array(
                    'message' => 'Se ha generado un error, por favor intentelo de nuevo, en caso de fallar nuevamente comuniquece con el aministrador.', 
                    'alert-type' => 'error'
                );

            return redirect()->route('seguimientoActividades.show', $seguimiento->IdActividad . '&' . $seguimiento->IdPrograma)
                         ->with($notification);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ids)
    {
        $variables = explode("&", $ids);
        $idPrograma = $variables[0];
        $idActividad = $variables[1];
        

        $programa = Programa::find($idPrograma);
        $actividad = ActividadesTipoPrograma::find($idActividad);
        $tipoPrograma = TipoPrograma::find($programa->IdTipoPrograma);

        $listaSegProgEmpDoc = ListaSegProgEmp::getSeguimientoEmpByProgByActi($idPrograma, $idActividad);

        $dcr = date('Y/m/d');
        $lastSeguimiento = ListasSeguimiento::where('IdPrograma',$idPrograma)
                                    ->where('IdActividad',$idActividad)
                                    ->where('IdTipoPrograma',$programa->IdTipoPrograma)
                                    ->get()->last();

        return view ('certificacion.programasSECAD.seguimientoProgramas.crear_lista_seguimiento')
                ->with('programa', $programa)
                ->with('actividad', $actividad)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('dcr', $dcr)
                ->with('lastSeguimiento', $lastSeguimiento)
                ->with('listaSegProgEmpDoc', $listaSegProgEmpDoc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdListaSeguimiento)
    {
        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);        
        $programa = Programa::find($seguimiento->IdPrograma);
        $actividad = ActividadesTipoPrograma::find($seguimiento->IdActividad);
        $tipoPrograma = TipoPrograma::find($seguimiento->IdTipoPrograma);

        $dcr = date('Y/m/d');

        return view ('certificacion.programasSECAD.seguimientoProgramas.editar_lista_seguimiento')
                ->with('programa', $programa)
                ->with('actividad', $actividad)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('dcr', $dcr)
                ->with('seguimiento', $seguimiento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdListaSeguimiento)
    {
        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);

        $seguimiento->IdPrograma = $request->input('IdPrograma');
        $seguimiento->IdTipoPrograma = $request->input('IdTipoPrograma');
        $seguimiento->IdActividad = $request->input('IdActividad');

        $seguimiento->Fecha = $request->input('Fecha');
        $seguimiento->Situacion = $request->input('Situacion');

        $seguimiento->Evidencias = $request->input('Evidencias');

        $seguimiento->save();

         $notification = array(
                'message' => 'Datos guardados correctamente', 
                'alert-type' => 'success'
            );

        return redirect()->route('seguimientoActividades.show', $seguimiento->IdActividad . '&' . $seguimiento->IdPrograma)
                         ->with($notification) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdListaSeguimiento)
    {
        $exists = \DB::table('AU_Reg_EspecialistasSeguimiento')->where('IdListaSeguimiento', $IdListaSeguimiento)->first();
        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);

        if(!$exists){
            $seguimiento->delete();
            $notification = array(
                'message' => 'Datos eliminados correctamente', 
                'alert-type' => 'success'
            );
        }
        else
        {
            $notification = array(
                'message' => 'No se puede eliminar la Evidencia, tiene datos asignados en horas de Especialistas', 
                'alert-type' => 'warning'
            );
        }
        return back()->with($notification);
    }
}
