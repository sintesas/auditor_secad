<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa;

class InformeActualizacionesEmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view ('fomento.empresas.informes.ver_informe_control_actualizaciones')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Empresa::all();

        // return view ('fomento.empresas.informes.pdf_informe_control_actualizaciones')->with('data', $data);
        try{
            return \PDF::loadView('fomento.empresas.informes.pdf_informe_control_actualizaciones', ['data' => $data])
                    ->setOption('margin-top', '15mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '150000mm')
                    ->setOption('orientation', 'landscape')
                    ->setOption('footer-right',utf8_decode(date('\ d/m/Y\ \ ').'     Página [page] de [topage] '))
                    ->download('cudro_control_programa.pdf');
        }
        catch (\RuntimeException  $e) {
             $notification = array(
                'message' => 'No se puede generar el archivo: error - '.$e->getMessage(), 
                'alert-type' => 'error'
            );
            
            return back()->with($notification);
        }
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
