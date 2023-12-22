<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\ParticipantesEvento;

class ParticipantesEventoController extends Controller
{
    public function store(Request $request)
    {
        $participante = new ParticipantesEvento;

        $participante->IdEvento = $request->input('IdEvento');
        $participante->Nombre = $request->input('Nombre');
        $participante->CC = $request->input('CC');
        $participante->Fecha = $request->input('Fecha');
        $participante->IdOrigen = $request->input('IdOrigen');
        $participante->Grado = $request->input('Grado');
        $participante->Telefono = $request->input('Telefono');
        $participante->Email = $request->input('Email');
        $participante->Active = 1;

        $participante->save();

        return back();
    }


    public function show($IdEvento)
    {
        $participantes = Evento::find($IdEvento)->participantesEvento;
        $evento = Evento::find($IdEvento);

        return view('auditoria.eventos.participantes_evento')->with('participantes', $participantes)->with('evento', $evento);
    }

    public function deleteParticipante($idparticipante){

        $participante = ParticipantesEvento::destroy($idparticipante);
        return response()->json($participante);

    }

    public function editParticipante(Request $request){

        $participante = ParticipantesEvento::find($request->id);

        $participante->Nombre = $request->nombre;
        $participante->CC = $request->cc;
        $participante->Telefono = $request->telefono;
        $participante->Fecha = $request->fecha;
        $participante->Grado = $request->grado;
        $participante->Email = $request->email;
        $participante->IdOrigen = $request->idorigen;
        $participante->Active = 1;

        $participante->save();

        return response()->json($participante);

    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function edit($id)
    {
        //
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
