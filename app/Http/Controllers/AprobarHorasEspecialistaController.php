<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\ActividadesTipoPrograma;
use App\Models\TipoPrograma;
use App\Models\ListasSeguimiento;
use App\Models\EspecialistasSeguimiento;
use App\Models\Permiso;
use App\Models\AprobarHorasEspecialistas;

class AprobarHorasEspecialistaController extends Controller
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
        $aprobarespecialistas = new AprobarHorasEspecialistas;
        $aprobarespecialistas->IdListaSeguimiento = $request->input('IdListaSeguimiento');
        $aprobarespecialistas->IdEspecialistaSeguimiento = $request->input('IdEspecialistaSeguimiento');
        $aprobarespecialistas->Proyecto = $request->input('Proyecto');
        $aprobarespecialistas->Especialista = $request->input('Especialista');
        $aprobarespecialistas->Actividad = $request->input('Actividad');
        $aprobarespecialistas->Evidencia = $request->input('Evidencias');
        $aprobarespecialistas->Rol = $request->input('Rol');
        $aprobarespecialistas->DescripcionTrabajo = $request->input('DescripcionTrabajo');
        $aprobarespecialistas->Fecha = $request->input('Fecha');
        $aprobarespecialistas->HorasReportadas = $request->input('HorasReportadas');
        $aprobarespecialistas->HorasAprobadas = $request->input('HorasAprobadas');       
        $aprobarespecialistas->Aprobador = \Session::get('username');   
        $aprobarespecialistas->fecha_aprobacion = $request->input('fecha_aprobacion');      
        $aprobarespecialistas->EstadoAprobacion = 1;     
        $aprobarespecialistas->save();
        return back();
       
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
        $IdPrograma = $variables[0];
        $IdPersonal = $variables[1];

        $listasSeguimiento = ListasSeguimiento::where('IdPrograma', $IdPrograma)->pluck('IdListaSeguimiento');

        
        $especialistasseguimiento = \DB::table('VWAU_Reg_EspecialistasSeguimiento')
    ->whereIn('IdListaSeguimiento', $listasSeguimiento)
    ->where('IdPersonal', $IdPersonal)  
    ->get();


    

    $nombreespecialista = \DB::table('AUFACVW_PersonalHH')
    ->where('IdPersonal', $IdPersonal)
    ->first();

   

        $programa = Programa::find($IdPrograma);

        $p = new Permiso;
        $permiso = $p->getPermisos('CP');


        return view ('certificacion.horasPersonas.ver_tablas_aprobarHorasEspecialistas')
                ->with('programa', $programa)
                ->with('especialistasseguimiento', $especialistasseguimiento)
                ->with('nombreespecialista', $nombreespecialista)
                ->with('permiso', $permiso)
                ->with('IdPrograma', $IdPrograma);
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
    public function update(Request $request, $id_aprobarhoras)
    {
        
        $aprobarespecialistas = AprobarHorasEspecialistas::find($id_aprobarhoras);
    
        if (!$aprobarespecialistas) {
            return redirect()->back()->with('error', 'Registro no encontrado');
        }
    
        
        $aprobarespecialistas->IdListaSeguimiento = $request->input('IdListaSeguimiento');
        $aprobarespecialistas->IdEspecialistaSeguimiento = $request->input('IdEspecialistaSeguimiento');
        $aprobarespecialistas->Proyecto = $request->input('Proyecto');
        $aprobarespecialistas->Especialista = $request->input('Especialista');
        $aprobarespecialistas->Actividad = $request->input('Actividad');
        $aprobarespecialistas->Evidencia = $request->input('Evidencias');
        $aprobarespecialistas->Rol = $request->input('Rol');
        $aprobarespecialistas->DescripcionTrabajo = $request->input('DescripcionTrabajo');
        $aprobarespecialistas->Fecha = $request->input('Fecha');
        $aprobarespecialistas->HorasReportadas = $request->input('HorasReportadas');
        $aprobarespecialistas->HorasAprobadas = $request->input('HorasAprobadas');
        $aprobarespecialistas->Aprobador = \Session::get('username');  
        $aprobarespecialistas->fecha_aprobacion = $request->input('fecha_aprobacion');
        $aprobarespecialistas->EstadoAprobacion = 1;     

        
        $aprobarespecialistas->save();
    
       
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdListaSeguimiento)
    {
        $especi = EspecialistasSeguimiento::where('IdListaSeguimiento', '=',$IdListaSeguimiento);
        $especi->delete();


        $seguimiento = ListasSeguimiento::find($IdListaSeguimiento);
        $seguimiento->delete();



        $notification = array(
                'message' => 'Datos eliminados correctamente', 
                'alert-type' => 'success'
            );
         return back()->with($notification);
    }
}
