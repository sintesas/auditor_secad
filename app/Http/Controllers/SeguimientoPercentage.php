<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SeguimientoCausaRaiz;
use App\Models\SeguimientoFiles;

class SeguimientoPercentage extends Controller
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
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdSeguimiento)
    {
        $seguimiento = SeguimientoCausaRaiz::find($IdSeguimiento);
        
        //Fecha Actual
        $hoy = getdate();
        $estado = $request->input('estadoSeguimiento');//Estado
        $seguimiento->Mensaje = $request->input('mensaje');//Mensaje
        $seguimiento->IdEstadoSeguimiento = $estado ;//Estado
        $seguimiento->Porcentaje = $request->input('porcentaje') ;//Estado

        switch($estado){
            case 1://RESPONSABLE
                $seguimiento->Porcentaje = 10;//Estado
                break;
            case 3://CEOAF
                $seguimiento->Porcentaje = 50;//Estado
                break;
            case 4://No aprobado por CEOAF
                $seguimiento->Porcentaje = 20;//Estado
                break;
            case 5://IGEFA
                $seguimiento->Porcentaje = 90;//Estado
                break;
            case 7://NO APROBADO POR IGEFA
                $seguimiento->Porcentaje = 60;//Estado
                break;
            case 8://Completada
                $seguimiento->Porcentaje = 100;//Estado
                break;
        }

        $seguimiento->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']; //Fecha Creación


        $files = $request->file('docs');
        if(!empty($files)){
            $seguiemientoPath = public_path('secad\Seguimiento\\'. $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday']);
            $documentos = '';
            foreach ($files as $file){
                $fileName = $file->getClientOriginalName();
                $documentos = 'secad\Seguimiento\\' . $request->input('Codigo') . '\\Documentos_Cargados_'.$hoy['year']."_".$hoy['mon']."_".$hoy['mday'].'\\'.$fileName;
                $file->move($seguiemientoPath, $fileName);
                $regSeguimientoFiles = new SeguimientoFiles;
                $regSeguimientoFiles->IdSeguimiento = $IdSeguimiento;
                $regSeguimientoFiles->FileNameDoc = $fileName;
                $regSeguimientoFiles->PathDoc = $documentos;
                $regSeguimientoFiles->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                $regSeguimientoFiles->save();
            }
        }

        $seguimiento->save();

        $notification = array(
            'message' => 'Se ha enviado a aprobación',
            'alert-type' => 'success'
        );

        return redirect()->route('seguimientoCausaRaiz.index')->with($notification);
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
