<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWPersonal;
use App\Models\Permiso;
class InformeTotalPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$personal = Personal::getPersonalWithRango();*/
        $personal = VWPersonal::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('GR');
        return view ('gestionRecursos.recursoHumano.informes.visual_informe_total_personal')
                ->with('personal', $personal)->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = VWPersonal::all();

        return \PDF::loadView('gestionRecursos.recursoHumano.informes.pdf_informe_total_personal', ['personal' => $personal])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');
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
