<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\ListaSegProgEmp;

class SeguimientoEmpresaController extends Controller
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
        $seguimiento = new ListaSegProgEmp;
        
        $seguimiento->IdPrograma = $request->input('IdPrograma');
        $seguimiento->IdTipoPrograma = $request->input('IdTipoPrograma');
        $seguimiento->IdActividad = $request->input('IdActividad');
        $seguimiento->Fecha = $request->input('Fecha');        
        $seguimiento->Observaciones = $request->input('Observaciones');
        
        try { 
            $consecutivo = $request->input('consecutivo');
            $actividad = $request->input('actividad');
            
            $files = $request->file('docs');

            if(!empty($files)){
                $seguimientoPath = public_path('secad\Programas\\' . $consecutivo . '\\1. Gestion de Programa\\3. Ejecucion y Seguimiento\\6. Documentos Cargados');
                $documentos = '';
                foreach ($files as $file){
                    $fileName = $file->getClientOriginalName();                
                    $file->move($seguimientoPath, $fileName);
                    //dd($documentos);
                    if($documentos == ''){
                         $documentos = $fileName;
                    }
                    else{
                        $documentos = $documentos.'&'.$fileName;
                    }
                   
                }
                $seguimiento->Documentos = $documentos;
            }

            // $data = array('consecutivo' => $consecutivo,
            //               'actividad' => $actividad,
            //               'observaciones' => $seguimiento->Observaciones,
            //               'fileName' => $fileName);

            // Mail::send('emails.mail_seguimiento',  $data, function($message){
            //     $message->from('testprojectsysoft@gmail.com', 'Auditor Plus - Seguimiento Porgama');
            //     $message->to('ruben.wilches@symetrixsoft.com')
            //             // ->cc('jane.arguello@fac.mil.com')
            //             // ->cc('diana.rodriguezt@fac.mil.com')
            //              ->subject('Se ha adjuntado un nuevo documeto');
            // });

            $seguimiento->save();

            $notification = array(
                    'message' => 'Datos guardados correctamente', 
                    'alert-type' => 'success'
                );

            return redirect()->route('seguimientoActividadesEmp.show', $seguimiento->IdActividad . '&' . $seguimiento->IdPrograma)
                             ->with($notification) ;
        }
        catch(Exception $e){
            Log::info('Error occured: ' . $e);

            $notification = array(
                    'message' => 'Se ha generado un error, por favor intentelo de nuevo, en caso de fallar nuevamente comuniquece con el aministrador.', 
                    'alert-type' => 'error'
                );

            return redirect()->route('seguimientoActividadesEmp.show', $seguimiento->IdActividad . '&' . $seguimiento->IdPrograma)
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

        $dcr = date('Y/m/d');

        return view ('certificacion.programasSECAD.seguimientoProgramas.seguimientoEmpresa.crear_lista_seguimiento_emp')
                ->with('programa', $programa)
                ->with('actividad', $actividad)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('dcr', $dcr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdListaSeguimientoEmp)
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
    public function update(Request $request, $IdListaSeguimientoEmp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdListaSeguimientoEmp)
    {
        $seguimiento = ListaSegProgEmp::find($IdListaSeguimientoEmp);
        $seguimiento->delete();

        //$programa = Programa::find($seguimiento->IdPrograma);
        // $seguimientoPath = public_path('secad\Programas\\' . $programa->Consecutivo . '\\1. Gestion de Programa\\3. Ejecucion y Seguimiento\\6. Documentos Cargados');
        // Storage::delete($seguimientoPath.'\\'.$seguimiento->Documentos);

        $notification = array(
                'message' => 'Datos eliminados correctamente', 
                'alert-type' => 'success'
            );
         return back()->with($notification);
    }
}
