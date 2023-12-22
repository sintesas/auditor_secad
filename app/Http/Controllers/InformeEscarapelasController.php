<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

class InformeEscarapelasController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view ('auditoria.eventos.informes.ver_informe_escarapela')->with('eventos', $eventos);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdEvento)
    {
        $participantes = Evento::find($IdEvento)->participantesEvento;
        $evento = Evento::where('dbo.AU_Reg_Eventos.IdEvento','=',$IdEvento)->get(); 

        return view('auditoria.eventos.informes.visual_informe_escarapela')->with('participantes', $participantes)->with('evento', $evento);
    }

    
    public function edit($IdEvento)
    {
        $participantes = Evento::find($IdEvento)->participantesEvento;
        $evento = Evento::find($IdEvento);

        return \PDF::loadView('auditoria.eventos.informes.pdf_informe_escarapela', ['participantes' => $participantes, 'evento' => $evento])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('escarapelas.pdf');

        // return \PDF::loadView('auditoria.eventos.informes.pdf_informe_escarapela', ['participantes' => $participantes, 'evento' => $evento])->setOption('page-size', 'A4')->setOption('disable-smart-shrinking', false)->setOption('image-quality', 100)->setOption('disable-pdf-compression', true)->download('escarapelas.pdf');



    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
