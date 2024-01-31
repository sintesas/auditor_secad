<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\VWInformeResumenPrograma;
use App\Models\ResumenProgramaRecord;
use App\Models\Permiso;

class InformeControlObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // $programa = VWInformeResumenPrograma::all();
          $programa = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get();
          $count = VWInformeResumenPrograma::all()->count();
          $p = new Permiso;
          $permiso = $p->getPermisos('CP');
  
          return view ('certificacion.programasSECAD.informes.ver_informe_controlObservacion')
          ->with('programa', $programa)
          ->with('count', $count)->with('permiso', $permiso);
    }

    public function create(Request $request)
    {
        try {
            $estados = $request->input('estados');
            $consecutivo = $request->input('consecutivos');
            \Log::info("Estados recibidos: " . $estados);
            \Log::info("Consecutivos Recibidos: ". $consecutivo);
            
            $programas = VWInformeResumenPrograma::whereIn('consecutivo',  explode(',',$consecutivo))
            ->whereIn('estado',  explode(',',$estados))
            ->orderBy('Consecutivo', 'ASC')
            ->get();
        
            $count = $programas->count();
            $fecha = date("d-m-Y G:i");
    
            \Log::info("consultaprogramas: " . $programas);
    
            return \PDF::loadView('certificacion.programasSECAD.informes.pdf_informe_controlobservaciones', 
                ['programas' => $programas, 'count' => $count, 'fecha' => $fecha])
                ->setOption('margin-top', '15mm')
                ->setOption('lowquality', false)
                ->setOption('page-width', '150000mm')
                ->setOption('orientation', 'landscape')
                ->download('test-proyectos.pdf');
        } catch (\Exception $e) {
            \Log::error("Error en el controlador: " . $e->getMessage());
            return response()->json(['error' => 'Error en el servidor'], 500);
        }
    }
}