<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VistaProgramas;
use App\Models\Permiso;

class VistaBalanceoManoObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.programasSECAD.informes.ver_informe_balanceo_mano_obra')->with('permiso', $permiso);
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

    public function vBalanceo(Request $request){
        if($request->ajax())
        {
            $programas = VistaProgramas::all('Tipo', 'EstadoProgama', 'Consecutivo', 'NombreJefe', 'Horas');

            $cadena = [];

            foreach($programas as $programa){
              $datos = [
                'Consecutivo' => $programa->Consecutivo,
                'EstadoProgama' => $programa->EstadoProgama,
                'Horas' => intval($programa->Horas),
                'NombreJefe' => $programa->NombreJefe,
                'Tipo' => $programa->Tipo
              ];
              array_push($cadena,$datos);
            }
            //dd($programas, $cadena);
            //$auditorias = Empresa::all();
            return response()->json($cadena);
        }
    }
}
