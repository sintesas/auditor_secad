<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CausaRaiz;
use App\Models\ProgramaCalidad;
use App\Models\FuenteAnotacion;
use App\Models\ProcesoInterno;
use App\Models\TipoAnotacion;
use App\Models\CriticidadAnotacion;
use App\Models\Auditoria;
use App\Models\Anotacion;
use App\Models\Aspecto5m;
use App\Models\Fivem;
use App\Models\UsersLDAP;
use App\Models\CriteriosAuditorias;
use App\Models\ProgramasCausaRaiz;
use App\Models\FalenciasCausaRaiz;
use App\Models\CausasRaizTareas;

class CausaRaizController extends Controller
{
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //Fecha Actual
        $hoy = getdate();

        $causaRaiz = new CausaRaiz;

        $causaRaiz->IdAnotacion = $request->input('IdAnotacion');
        $causaRaiz->IdAnotacion = $request->input('IdAnotacion');
        $causaRaiz->CausaRaiz = $request->input('CausaRaiz');
        $causaRaiz->Efecto = $request->input('Efecto');   
        $causaRaiz->Id5M = $request->input('Id5M');
        $causaRaiz->IdAspecto5M = $request->input('IdAspecto5M');
        $causaRaiz->Priorizacion = $request->input('Priorizacion');
        //$causaRaiz->IdPrograma = $request->input('IdPrograma');
        $causaRaiz->IdFalencia = $request->input('IdFalencia');
        //$causaRaiz->IdProceso = $request->input('IdProceso');
        $causaRaiz->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];

        $causaRaiz->save();

        $IdCausaRaiz = $causaRaiz->getKey();
        
        //Actividades
        CausasRaizTareas::where('IdCausaRaiz', $IdCausaRaiz)->delete();
                
        $accionTarea = $request->input('AccionTarea');
        $fechaFinal = $request->input('FechaFinal');
        $fechaInicio = $request->input('FechaInicio');
        $IdUserResponsable = $request->input('IdUserResponsable');
        $Entregable = $request->input('Entregable');
        $CantidadEntregable = $request->input('CantidadEntregable');

        if(is_array($accionTarea)){
            foreach($accionTarea as $key => $accion) {
                $regCausasRaizTareas = new CausasRaizTareas;
                $regCausasRaizTareas->IdCausaRaiz = $IdCausaRaiz;
                $regCausasRaizTareas->AccionTarea = $accion;
                $regCausasRaizTareas->FechaFinal = isset($fechaFinal[$key]) ? $fechaFinal[$key] : ''; 
                $regCausasRaizTareas->IdResponsable = isset($IdUserResponsable[$key]) ? $IdUserResponsable[$key] : ''; 
                $regCausasRaizTareas->fechaInicio = isset($fechaInicio[$key]) ? $fechaInicio[$key] : ''; 
                $regCausasRaizTareas->Entregable = isset($Entregable[$key]) ? $Entregable[$key] : ''; 
                $regCausasRaizTareas->CantidadEntregable = isset($CantidadEntregable[$key]) ? $CantidadEntregable[$key] : ''; 
                $regCausasRaizTareas->save();
            }
        }
        return back();
    }

    
    public function show($IdAnotacion)
    {   
        $personalLDAP = UsersLDAP::all();
        $personalLDAP->prepend('none'); 

        $falaneciasCausaRaiz = FalenciasCausaRaiz::all();       
        $falaneciasCausaRaiz->prepend('none');

        $programasCausaRaiz = ProgramasCausaRaiz::all();       
        $programasCausaRaiz->prepend('none');

        $procesosCriterios = CriteriosAuditorias::getProcesosGroupBy();       
        $procesosCriterios->prepend('none');

        //$causasRaiz = Anotacion::getCausasRaizByAnotacion($IdAnotacion);

        $causasRaiz = \DB::table('AU_Reg_CausasRaiz as ca')
            ->select('ca.IdCausaRaiz', 'ca.IdAnotacion', 'ca.CausaRaiz', 'ca.Efecto',
                    'm.Metodo', 'ap.Aspecto', 'ca.Priorizacion', 
                    'pr.NombrePrograma', 'fa.NombreFalencia', 'cr.Proceso')
            ->leftjoin('AU_Mst_5M as m', 'm.Id5M', '=', 'ca.Id5M')
            ->leftjoin('AU_Mst_Aspectos5M as ap', 'ap.IdAspecto5M', '=', 'ca.IdAspecto5M')
            ->leftjoin('AU_Mst_ProgramasCausasRaiz as pr', 'pr.IdPrograma', '=', 'ca.IdPrograma')
            ->leftjoin('AU_Mst_FalenciasCausasRaiz as fa', 'fa.IdFalencia', '=', 'ca.IdFalencia')
            ->leftjoin('AU_Reg_CriteriosAuditorias as cr', 'cr.IdCriterio', '=', 'ca.IdProceso')
            ->where('ca.IdAnotacion', '=', $IdAnotacion)
            ->get();

        $anotacion = Anotacion::find($IdAnotacion);

        $aspectos5m = Aspecto5m::all(['IdAspecto5M', 'Aspecto']);

        $record5m = Fivem::all(['Id5M', 'Metodo']);

        return view('auditoria.anotaciones.ver_detalle_anotacion')
        ->with('anotacion', $anotacion)
        ->with('causasRaiz', $causasRaiz)
        ->with('aspectos5m', $aspectos5m)
        ->with('personalLDAP', $personalLDAP)
        ->with('procesosCriterios', $procesosCriterios)
        ->with('falaneciasCausaRaiz', $falaneciasCausaRaiz)
        ->with('programasCausaRaiz', $programasCausaRaiz)
        ->with('record5m', $record5m);
    }

    
    public function edit($IdCausaRaiz)
    {
        $personalLDAP = UsersLDAP::take(1000)->get();
        $personalLDAP->prepend('none'); 

        $falaneciasCausaRaiz = FalenciasCausaRaiz::all();       
        $falaneciasCausaRaiz->prepend('none');

        $programasCausaRaiz = ProgramasCausaRaiz::all();       
        $programasCausaRaiz->prepend('none');

        $procesosCriterios = CriteriosAuditorias::getProcesosGroupBy();       
        $procesosCriterios->prepend('none');

        $causaRaiz = CausaRaiz::find($IdCausaRaiz);

        $aspectos5m = Aspecto5m::all(['IdAspecto5M', 'Aspecto']);

        $record5m = Fivem::all(['Id5M', 'Metodo']);

        $resultCausas = CausasRaizTareas::select('IdCausaRaiz','AccionTarea')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and AccionTarea IS NOT NULL'))->get();
        $resultFechaInicio = CausasRaizTareas::select('IdCausaRaiz','FechaInicio')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and FechaInicio IS NOT NULL'))->get();
        $resultFechaFinal = CausasRaizTareas::select('IdCausaRaiz','FechaFinal')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and FechaFinal IS NOT NULL'))->get();
        $resultIdResponsable = CausasRaizTareas::select('IdCausaRaiz','IdResponsable')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and IdResponsable IS NOT NULL'))->get();
        $resultEntregable = CausasRaizTareas::select('IdCausaRaiz','Entregable')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and Entregable IS NOT NULL'))->get();
        $resultCantidadEntregable = CausasRaizTareas::select('IdCausaRaiz','CantidadEntregable')->where('IdCausaRaiz', '=', \DB::raw($IdCausaRaiz.'  and CantidadEntregable IS NOT NULL'))->get();

        return view('auditoria.anotaciones.editar_causa_raiz')
        ->with('causaRaiz', $causaRaiz)
        ->with('aspectos5m', $aspectos5m)
        ->with('personalLDAP', $personalLDAP)
        ->with('record5m', $record5m)
        ->with('procesosCriterios', $procesosCriterios)
        ->with('falaneciasCausaRaiz', $falaneciasCausaRaiz)
        ->with('programasCausaRaiz', $programasCausaRaiz)
        ->with('resultCausas', $resultCausas)
        ->with('resultFechaInicio', $resultFechaInicio)
        ->with('resultFechaFinal', $resultFechaFinal)
        ->with('resultIdResponsable', $resultIdResponsable)
        ->with('resultEntregable', $resultEntregable)
        ->with('resultCantidadEntregable', $resultCantidadEntregable);
    }

    public function update(Request $request, $IdCausaRaiz)
    {

        //Insert Causa Raiz
        $causaRaiz = CausaRaiz::find($IdCausaRaiz);

        //Fecha Actual
        $hoy = getdate();

        $causaRaiz->CausaRaiz = $request->input('CausaRaiz');
        $causaRaiz->Efecto = $request->input('Efecto');   
        $causaRaiz->Id5M = $request->input('Id5M');
        $causaRaiz->IdAspecto5M = $request->input('IdAspecto5M');
        $causaRaiz->Priorizacion = $request->input('Priorizacion');
        $causaRaiz->IdPrograma = $request->input('IdPrograma');
        $causaRaiz->IdFalencia = $request->input('IdFalencia');
        $causaRaiz->IdProceso = $request->input('IdProceso');
        $causaRaiz->Update_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];

        $causaRaiz->save();

        //Actividades
        CausasRaizTareas::where('IdCausaRaiz', $IdCausaRaiz)->delete();
        
        $accionTarea = $request->input('AccionTarea');
        $fechaFinal = $request->input('FechaFinal');
        $fechaInicio = $request->input('FechaInicio');
        $IdUserResponsable = $request->input('IdUserResponsable');
        $Entregable = $request->input('Entregable');
        $CantidadEntregable = $request->input('CantidadEntregable');

        if(is_array($accionTarea)){
            foreach($accionTarea as $key => $accion) {
                $regCausasRaizTareas = new CausasRaizTareas;
                $regCausasRaizTareas->IdCausaRaiz = $IdCausaRaiz;
                $regCausasRaizTareas->AccionTarea = $accion;
                $regCausasRaizTareas->FechaFinal = isset($fechaFinal[$key]) ? $fechaFinal[$key] : ''; 
                $regCausasRaizTareas->IdResponsable = isset($IdUserResponsable[$key]) ? $IdUserResponsable[$key] : ''; 
                $regCausasRaizTareas->fechaInicio = isset($fechaInicio[$key]) ? $fechaInicio[$key] : ''; 
                $regCausasRaizTareas->Entregable = isset($Entregable[$key]) ? $Entregable[$key] : ''; 
                $regCausasRaizTareas->CantidadEntregable = isset($CantidadEntregable[$key]) ? $CantidadEntregable[$key] : ''; 
                $regCausasRaizTareas->save();
            }
        }

        $notification = array(
            'message' => 'Datos actualizados correctamente', 
            'alert-type' => 'success'
        );

        return redirect('/anotacion')->with($notification);
    }

    
    public function destroy($IdCausaRaiz)
    {
        CausasRaizTareas::where('IdCausaRaiz', $IdCausaRaiz)->delete();
        $causaRaiz = CausaRaiz::find($IdCausaRaiz);
        $causaRaiz->delete();
        return back();
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
}
