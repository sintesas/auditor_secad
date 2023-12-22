<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Programa;
use App\Models\BaseCertificacion;
use App\Models\SubPartesBaseCertificacion;
use App\Models\Moc;
use App\Models\SubParteMatrizCumpliProg;
use App\Models\MocsRequsitoMatriz;
use App\Models\RequisitosSubParteMatrizCumpliProg;

class MocsSubparteController extends Controller
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
        $IdSubParteMatriz = $request->input('IdSubParteMatriz');
        $IdRequsito = $request->input('IdRequsito');        
        $exists = \DB::table('AU_Reg_MocsRequisito')->where('IdRequsito', $IdRequsito)->first();
        $mocs = Moc::all();

        /***** FALTA VALIDAR QUE TENGAN EVIDENCIAS *****/

        //Valida si exietn datos den la tabla
        if(!$exists){
            foreach($mocs as $moc){
                $check = $request->input('moc_'.$moc->IdMOC);

                if ($check == 'on'){
                    
                    $mocsub = new MocsRequsitoMatriz;

                    $mocsub->IdMOC = $moc->IdMOC;
                    $mocsub->IdRequsito = $IdRequsito;
                    $mocsub->Estado = 'En Proceso';

                    $mocsub->save();
                }                
            }
        }
        else
        {
            //$mocsSaved = MocsRequsitoMatriz::getMocsByRequisito($IdRequsito);
            $mocsSaved = \DB::select('EXEC  dbo.AUFACSP_MOCS_Requsitos @IdRequsito = '.$IdRequsito);

            foreach($mocsSaved as $mocsave)
            {
                $check = $request->input('moc_'.$mocsave->IdMOC);
                if ($check == 'on' && $mocsave->MocSelected != '1'){
                    
                    $mocsub = new MocsRequsitoMatriz;

                    $mocsub->IdMOC = $mocsave->IdMOC;
                    $mocsub->IdRequsito = $IdRequsito;
                    $mocsub->Estado = 'En Proceso';

                    $mocsub->save();
                }

            }            
        }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


       
        $subParte = SubParteMatrizCumpliProg::find($IdSubParteMatriz);
        $baseCertificacion = BaseCertificacion::find($subParte->IdBaseCertificacion);
        $requsitos = RequisitosSubParteMatrizCumpliProg::getRequistosBySubParte($IdSubParteMatriz);

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_requisitos')
                ->with('subParte', $subParte)
                ->with('requsitos', $requsitos)
                ->with('baseCertificacion', $baseCertificacion)
                ->with($notification);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdRequsito)
    {  
        // $subPartes = SubParteMatrizCumpliProg::find($id);
        $mocs = \DB::select('EXEC  dbo.AUFACSP_MOCS_Requsitos @IdRequsito = '.$IdRequsito);

        $requisito = RequisitosSubParteMatrizCumpliProg::find($IdRequsito);

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_mocs')
                ->with('mocs', $mocs)
                ->with('requisito', $requisito);
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
