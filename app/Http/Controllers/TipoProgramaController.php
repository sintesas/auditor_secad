<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoPrograma;
use App\Models\Permiso;

class TipoProgramaController extends Controller
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
        /*$tipoprogramas= \DB::select("EXEC AUFACSP_Mst_TiposPrograma @ProcId = 5");*/
        $tipoprogramas= TipoPrograma::all();
        return view ('certificacion.variables.ver_tipo_programa')->with('tipoprogramas', $tipoprogramas)->with('permiso', $permiso);
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

    
    public function editTipoPrograma(Request $req)
    {
        $tipoprograma = TipoPrograma::find($req->id);
        
        if ($tipoprograma) {
            $tipoprograma->Tipo = $req->tipo;
            $tipoprograma->HH = $req->hh;
            $tipoprograma->Activo = $req->activo; 
            $tipoprograma->save();
    
            // Retorna un JSON indicando éxito
            return response()->json(['success' => true, 'message' => 'Información actualizada correctamente.']);
        }
        
        return response()->json(['success' => false, 'message' => 'Tipo de programa no encontrado.'], 404);
    }
    
    

    public function store(Request $request)
    {
        // make an object to catch the input
       $tipoprograma = new TipoPrograma;
       // tipoprograma info        
       $tipoprograma->Tipo = $request->input('Tipo');
       $tipoprograma->HH = $request->input('HH');       
       $tipoprograma->Activo = ($request->get('activo') == true) ? 1 : 0;
       $tipoprograma->save();
       return redirect()->route('tipoprograma.index');
       /* // make an object to catch the input
       $TipoPrograma = new TipoPrograma;
       // store info 
       $TipoPrograma->Tipo = $request->input('Tipo');
       $TipoPrograma->HH = $request->input('HH');
       
       $TipoPrograma->Activo = 1; 

       \DB::update('EXEC AUFACSP_Mst_TiposPrograma @ProcId=2, @Tipo = ?, @HH = ?,  @Activo =?', array($TipoPrograma->Tipo, $TipoPrograma->HH, $TipoPrograma->Activo));

       // EXEC dbo.AUFACSP_Reg_ATA @ProcId = 2 , @CODATA='codtest',@GENERAL='', @Capitulo = '', @Activo = 1
         
        return redirect()->route('tipoprograma.index');*/
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
    public function edit($IdTipoPrograma)
    {
        //$tipoprograma = TipoPrograma::find($TipoPrograma);
        return view('certificacion.variables.editar_tipoprograma');
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
    public function destroy($IdTipoPrograma)
    {     
     // find instance
        $tipoPrograma = TipoPrograma::find($IdTipoPrograma);
        // delete
        $tipoPrograma->delete();        
        return redirect()->route('tipoprograma.index');   
        /*\DB::delete('EXEC AUFACSP_Mst_TiposPrograma @ProcId=4, @IdTipoPrograma = ?', array($IdTipoPrograma));
        return back();*/
    }
}