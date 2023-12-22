<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EspecialistasSeguimiento;
use App\Models\ListasSeguimiento;
use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\Personal;

class EspecialistasSeguimientoController extends Controller
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
        $especialista = new EspecialistasSeguimiento;

        $especialista->IdListaSeguimiento = $request->input('IdListaSeguimiento');
        $especialista->IdPersonal = $request->input('IdPersonal');
        $especialista->Horas = $request->input('Horas');
        $especialista->Fecha = $request->input('Fecha');

        $especialista->save();

        $seguimiento = ListasSeguimiento::find($especialista->IdListaSeguimiento);
        $seguimiento->Horas = $seguimiento->Horas + $especialista->Horas;
        $seguimiento->save();

        $notification = array(
            'message' => 'Datos guardados correctamente', 
            'alert-type' => 'success'
        );

        return redirect()->route('especialistasSeg.show', $especialista->IdListaSeguimiento)
                         ->with($notification) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdListaSeguimiento)
    {
        $especialistas = EspecialistasSeguimiento::getEspecialistasBySeguimiento($IdListaSeguimiento);
        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);

        $programa = Programa::find($seguimiento->IdPrograma);
        $actividad = ActividadesTipoPrograma::find($seguimiento->IdActividad);
        $tipoPrograma = TipoPrograma::find($seguimiento->IdTipoPrograma);

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $dcr = date('Y/m/d');


        return view ('certificacion.programasSECAD.seguimientoProgramas.ver_lista_seguimiento_especialistas')
                ->with('dcr', $dcr)
                ->with('programa', $programa)
                ->with('actividad', $actividad)
                ->with('tipoPrograma', $tipoPrograma)
                ->with('seguimiento', $seguimiento)
                ->with('especialistas', $especialistas)
                ->with('personal', $personal);
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
    public function destroy($IdEspecialistaSeguimiento)
    {
        $especialistas = EspecialistasSeguimiento::find($IdEspecialistaSeguimiento);
        $especialistas->delete();

        $seguimiento = ListasSeguimiento::find($especialistas->IdListaSeguimiento);
        $seguimiento->Horas = $seguimiento->Horas - $especialistas->Horas;
        $seguimiento->save();

        $notification = array(
            'message' => 'Datos eliminados correctamente', 
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
