<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWInformeResumenPrograma;
use App\Models\ResumenProgramaRecord;
use App\Models\Permiso;

class InformeResumenProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $programa = VWInformeResumenPrograma::all();
        // $programa = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $programa = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get()->groupBy('IdPrograma');
        $count = VWInformeResumenPrograma::all()->count();

        return view ('certificacion.programasSECAD.informes.ver_informe_resumen_programa')
                ->with('programa', $programa)
                ->with('count', $count)->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$programa = VWInformeResumenPrograma::all();

        $data = ResumenProgramaRecord::getLastrow();
        $fecha = date("d-m-Y G:i");
        return view ('certificacion.programasSECAD.informes.pdf_informe_resumen_programa', compact('data','fecha'));

        

        // try
        // {
        // return \PDF::loadView('certificacion.programasSECAD.informes.pdf_informe_resumen_programa', ['data' => $data])
        //             ->setOption('margin-top', '15mm')
        //             ->setOption('lowquality', false)
        //             ->setOption('page-width', '150000mm')
        //             ->setOption('orientation', 'landscape')
        //             ->setOption('footer-right',utf8_decode(date('\ d/m/Y\ \ ').'     Página [page] de [topage] '))
        //             ->download('cudro_control_programa.pdf');
        //         }
        // catch (\RuntimeException  $e) {
        //      $notification = array(
        //         'message' => 'No se puede generar el archivo: error - '.$e->getMessage(), 
        //         'alert-type' => 'error'
        //     );
        //     //return $e->getMessage();
        //     return back()->with($notification);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

    }

    public function pdftodb(Request $req){
        ResumenProgramaRecord::truncate();

        $resumen = new ResumenProgramaRecord;
        $resumen->Text = $req->table;
        $resumen->cantidad = $req->cantidad;
        $resumen->save();

        return response()->json($resumen);
        

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
    public function destroy($id)
    {
        //
    }
}
