<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Convenio;
use App\Models\CaracterConvenios;
use App\Models\EstadoConvenios;
use App\Models\TipoConvenio;

class ConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::all();

        $caraterConvenios = CaracterConvenios::all();
        $caraterConvenios->prepend('None');

        $estadoConvenios = EstadoConvenios::all();
        $estadoConvenios->prepend('None');

        $TipoConvenio = TipoConvenio::all();
        $TipoConvenio->prepend('None');

        return view('fomento.convenios.convenios')
                ->with('convenios', $convenios)
                ->with('caraterConvenios', $caraterConvenios)
                ->with('estadoConvenios', $estadoConvenios)
                ->with('TipoConvenio', $TipoConvenio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not used separately.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create object to holdd info
        $convenio = new Convenio;

        $convenio->NombreConv = $request->input('NombreConv');
        $convenio->Entidad = $request->input('Entidad');
        $convenio->Fecha = $request->input('Fecha');
        $convenio->Vigencia = $request->input('Vigencia');
        //$convenio->IdCaracterConvenio = $request->input('IdCaracterConvenios');
        $convenio->IdCaracterConvenio = $request->IdCaracterConvenio;
        $convenio->IdEstadoConvenio = $request->input('IdEstadoConvenio');
        $convenio->Objeto = $request->input('Objeto');
        $convenio->Antecedente = $request->input('Antecedente');
        $convenio->Responsable = $request->input('Responsable');
        $convenio->Contacto = $request->input('Contacto');
        $convenio->Celular = $request->input('Celular');
        $convenio->Email = $request->input('Email');
        $convenio->Pendiente = $request->input('Pendiente');
        $convenio->DSDS = $request->input('DSDS');
        $convenio->IdTipoConvenio = $request->input('IdTipoConvenio');


        $convenio->save();

        return redirect()->route('convenio.index');

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
    public function edit($IdConvenios)
    {
        //$convenios = Convenio::all();

        $caraterConvenios = CaracterConvenios::all();
        //$caraterConvenios->prepend('None');
        $estadoConvenios = EstadoConvenios::all();
        $estadoConvenios->prepend('None');
        $convenio = Convenio::find($IdConvenios);

        $TipoConvenio = TipoConvenio::all();
        $TipoConvenio->prepend('None');

        return view('fomento.convenios.editar_convenio')
        ->withConvenio($convenio)
        ->with('caraterConvenios', $caraterConvenios)
        ->with('estadoConvenios', $estadoConvenios)
        ->with('TipoConvenio', $TipoConvenio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdConvenios)
    {

        $convenio = Convenio::find($IdConvenios);
        $convenio->NombreConv = $request->input('NombreConv');
        $convenio->Entidad = $request->input('Entidad');
        $convenio->Fecha = $request->input('Fecha');
        $convenio->Vigencia = $request->input('Vigencia');
        $convenio->IdCaracterConvenio = $request->IdCaracterConvenio;
        $convenio->IdEstadoConvenio = $request->input('IdEstadoConvenio');
        $convenio->Objeto = $request->input('Objeto');
        $convenio->Antecedente = $request->input('Antecedente');
        $convenio->Responsable = $request->input('Responsable');
        $convenio->Contacto = $request->input('Contacto');
        $convenio->Celular = $request->input('Celular');
        $convenio->Email = $request->input('Email');
        $convenio->Pendiente = $request->input('Pendiente');
        $convenio->DSDS = $request->input('DSDS');
        $convenio->IdTipoConvenio = $request->input('IdTipoConvenio');

        $convenio->save();

        return redirect()->route('convenio.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdConvenios)
    {
        $convenio = Convenio::find($IdConvenios);
        $convenio->delete();
        return redirect()->route('convenio.index');
    }
}
