<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\PlanInspeccion;
use App\Models\Auditoria;
use App\Models\Personal;

class PlanInspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;


        if (Auth::user()->hasRole('administrador')) {
            //$auditoriaInsp = Auditoria::find('IdPlanInspeccion')->planesInspeccion;
            $planesIns = PlanInspeccion::orderBy('IdPlanInspeccion', 'desc')
            ->join('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_PlanesInspeccion.IdAuditoria', '=', 'dbo.AU_Reg_Auditorias.IdAuditoria')
            ->select('dbo.AU_Reg_PlanesInspeccion.IdPlanInspeccion','dbo.AU_Reg_Auditorias.IdAuditoria' , 'dbo.AU_Reg_Auditorias.Codigo', 'dbo.AU_Reg_PlanesInspeccion.Fecha', 'dbo.AU_Reg_PlanesInspeccion.Observaciones')
            ->get();
            return view ('auditoria.ver_plan_inspeccion')->with('planesIns', $planesIns);
        }else{
            //$auditoriaInsp = Auditoria::find('IdPlanInspeccion')->planesInspeccion;


            $planesIns = PlanInspeccion::orderBy('IdPlanInspeccion', 'desc')
            ->join('dbo.AU_Reg_Auditorias as a', 'dbo.AU_Reg_PlanesInspeccion.IdAuditoria', '=', 'a.IdAuditoria')
            ->join('dbo.AU_Reg_usersLDAP as ul', 'ul.IdUserLDAP', '=', 'a.IdPersonalAudi')
            ->select('dbo.AU_Reg_PlanesInspeccion.IdPlanInspeccion', 'a.Codigo', 'dbo.AU_Reg_PlanesInspeccion.Fecha', 'dbo.AU_Reg_PlanesInspeccion.Observaciones')
            ->where('a.IdPersonalAudi ', '=', $idPersonal)
            ->orwhere('ul.name ', 'like', '%'.$name.'%')
            ->get();

            return view ('auditoria.ver_plan_inspeccion')->with('planesIns', $planesIns);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;

        if (Auth::user()->hasRole('administrador')) {
            //Set Dropdown Auditoria
            $auditoria = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditoria->prepend('None');

        }else{
            //Set Dropdown Auditoria
            //$auditoria = Auditoria::getByUserAuditorias($idPersonal, $name);
            $auditoria = Auditoria::getByUser($idPersonal);
            $auditoria->prepend('None');
        }
//dd($auditoria);
        //$dataPersonal = Personal::all();


        $dataPersonal = Personal::select(\DB::raw("IdPersonal, CONCAT(Nombres,' ', Apellidos) AS fullName"))->orderBy('fullName')->get();
        $dataPersonal->prepend('none');

        return view('auditoria.crear_plan_inspeccion')
                ->with('auditoria', $auditoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoy = getdate();
       /*Create Plan Inspeccion */
       $planesIns = new PlanInspeccion;
       // store info
       $planesIns->IdAuditoria = $request->input('IdAuditoria');
       $planesIns->Fecha =  $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
       $planesIns->Observaciones = $request->input('Observaciones');
       $planesIns->Activo = 1;
       $planesIns->save();

       return redirect()->route('planeInspeccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPlanInspeccion)
    {
        $idPersonal = Auth::user()->IdPersonal;
        $planesIns = PlanInspeccion::find($IdPlanInspeccion);

        $dataPersonal = Personal::select(\DB::raw("IdPersonal, CONCAT(Nombres,' ', Apellidos) AS fullName"))->get();
        $dataPersonal->prepend('none');

        if (Auth::user()->hasRole('administrador')) {
            //Set Dropdown Auditoria
            $auditoria = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditoria->prepend('None');

        }else{
            //Set Dropdown Auditoria
            $auditoria = Auditoria::getByUser($idPersonal);
            $auditoria->prepend('None');
        }

        return view('auditoria.editar_plan_inspeccion')
                ->withPlanInspeccion($planesIns)
                ->with('auditoria', $auditoria)
                ->with('personal', $dataPersonal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdPlanInspeccion)
    {
       $planesIns = PlanInspeccion::find($IdPlanInspeccion);

        // store info
         $planesIns->IdAuditoria = $request->input('IdAuditoria');
         $planesIns->Fecha = $request->input('Fecha');
         $planesIns->Observaciones = $request->input('Observaciones');
         $planesIns->Activo = 1;
         $planesIns->save();

       return redirect()->route('planeInspeccion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdPlanInspeccion)
    {
        $exists = \DB::table('AU_Reg_ActividadesPlanInspeccion')->where('IdPlanInspeccion', $IdPlanInspeccion)->first();

        if(!$exists){
        $planesIns = PlanInspeccion::find($IdPlanInspeccion);
        $planesIns->delete();

        $success = array(
                'message' => 'Registro borrado',
                'alert-type' => 'success'
            );

        return redirect()->route('planeInspeccion.index')->with($success);
        }else{
            $error = array(
                'message' => 'No se puede borrar este registro',
                'alert-type' => 'error'
            );

            return back()->with($error);
        }
    }
}
