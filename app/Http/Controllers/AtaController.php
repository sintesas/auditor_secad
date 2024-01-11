<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ata;
use App\Models\Permiso;
class AtaController extends Controller
{
    public function index()
    {        
        // laravel's standard way
        $atas = Ata::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        return view ('certificacion.variables.ver_tablas_ata')->with('atas', $atas)->with('permiso', $permiso);       
        
    }

    public function deleteAta($idata){
  
        $ata = Ata::destroy($idata);
        return response()->json($ata);    
    }


    public function editAta(Request $request){

        $ata = Ata::find($request->idata);

        $ata->ATA = $request->ata;
        $ata->CodATA = $request->codata;
        $ata->General = $request->general;
        $ata->Activo = 1;

        $ata->save();

        return response()->json($ata);

    }

    public function create()
    {
        return view('certificacion.variables.ver_tablas_ata');
    }
    
    public function store(Request $request)
    {
        // make an object to catch the input
       $ata = new Ata;
       // store info 
       $ata->ATA = $request->input('ATA');
       $ata->CodATA = $request->input('CodATA');
       $ata->General = $request->input('General');
       $ata->Activo = 1; 
       $ata->save();
       return redirect()->route('ata.index');
 
    }
    
    public function show()
    {
        // $record = Ata::find($IdATA);
        // return view('posts.index')->withAta($record);
    }
    
    public function edit($IdATA)
    {   
        
        $ata = Ata::find($IdATA);
        return view('certificacion.variables.editar_ata')->withAta($ata);
    
    }
    
    public function update(Request $request, $IdATA)
    {
        // bring one record using id or something
       $ata = Ata::find($IdATA);
       
       $ata->ATA = $request->input('ATA');
       $ata->CodATA = $request->input('CodATA');
       $ata->General = $request->input('General');

        $ata->save();

        return redirect()->route('ata.index');

    }
    
    public function destroy($IdATA)
    {

        // find instance
        $ata = Ata::find($IdATA);
        // delete
        $ata->delete();
        
        return redirect()->route('ata.index');
    }
}
