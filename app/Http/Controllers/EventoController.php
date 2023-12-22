<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\Empresa;
use App\Models\TipoAuditoria;
use App\Models\ClaseEvento;
use App\Models\TipoEvento;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view ('auditoria.eventos.eventos')->with('eventos', $eventos);
    }

    
    public function create()
    {   
        $empresas = Empresa::all();
        $eventos = Evento::all();

        $clasesevento = ClaseEvento::all();
        $tiposevento = TipoEvento::all();

        $tiposauditoria = TipoAuditoria::all();
        return view('auditoria.eventos.crear_evento')->with('empresas', $empresas)->with('tiposAuditoria', $tiposauditoria)->with('clasesevento', $clasesevento)->with('tiposevento', $tiposevento);
    }

   
    public function store(Request $request)
    {
        $evento = new Evento;
        
        $evento->Evento  = $request->input('Evento');
        $evento->Fecha = $request->input('Fecha');
        $evento->Lugar = $request->input('Lugar');
        $evento->Descripcion = $request->input('Descripcion');
        $evento->HorasTotal = $request->input('HorasTotal');
        $evento->Responsable = $request->input('Responsable');
        $evento->DirectivaNo = $request->input('DirectivaNo');
        $evento->Horario = $request->input('Horario');
        $evento->Ciudad = $request->input('Ciudad');
        $evento->IdTipoEvento = $request->input('IdTipoEvento');
        $evento->IdClaseEvento = $request->input('IdClaseEvento');
        $evento->Duracion = $request->input('Duracion');
        $evento->Actvio = 1;

        $evento->save();

        return back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($IdEvento)
    {
        $evento = Evento::find($IdEvento);
        $tiposevento = TipoEvento::all();
        $clasesevento = ClaseEvento::all();
        return view('fomento.eventos.editar_evento')->with('evento', $evento)->with('tiposevento', $tiposevento)->with('clasesevento', $clasesevento);
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($IdEvento)
    {
        $exists = \DB::table('AU_Reg_ParticipantesEvento')->where('IdEvento', $IdEvento)->first();

        // dd($exists);
        if(!$exists){
            $evento = Evento::find($IdEvento);
            $evento->delete();
            
            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar este Evento ya que tiene Participantes.', 
            'alert-type' => 'warning'
          );
        }
        
        return redirect()->route('evento.index')->with($notification);
    }
}
