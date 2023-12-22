<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

use App\Models\Evento;
use App\Models\ParticipantesEvento;

class InformeAsistenciaController extends Controller
{
    public function index()
    {
        $evento = Evento::all();
        return view ('auditoria.eventos.informes.ver_informe_asistencia')
            ->with('evento', $evento);
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
        $eventoById= Evento::where('IdEvento','=',$IdEvento)->get(); 
        $participantesEvento= ParticipantesEvento::where('IdEvento','=',$IdEvento)->get();       
        return view ('auditoria.eventos.informes.visual_informe_asistencia')
                    ->with('eventoById', $eventoById)
                    ->with('participantesEvento', $participantesEvento);
    }

    public function edit($IdEvento)
    {
        $eventoById= Evento::where('IdEvento','=',$IdEvento)->get();  
        $participantesEvento= ParticipantesEvento::where('IdEvento','=',$IdEvento)->get();       

        // return \PDF::loadView('auditoria.eventos.informes.pdf_informe_asistencia', ['eventoById' => $eventoById, 'participantesEvento' => $participantesEvento])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');


        return \PDF::loadView('auditoria.eventos.informes.pdf_informe_asistencia', ['eventoById' => $eventoById, 'participantesEvento' => $participantesEvento])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-empresas.pdf');    

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
