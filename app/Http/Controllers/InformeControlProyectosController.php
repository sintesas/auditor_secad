<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWProyectos;
use App\Models\ResumenProgramaRecord;
use App\Models\Permiso;

class InformeControlProyectosController extends Controller
{
    function index(){
        //Data Control proyectos
        $proyectos = VWProyectos::Estado();
        $p = new Permiso;
        $permiso = $p->getPermisos('FA');
        //Vista Informe proyectos
        return view('fomento.proyectos.informes.visual_informe_proyectos')
              ->with('proyectos',$proyectos)->with('permiso', $permiso);
    }

    function create(){
        $data = ResumenProgramaRecord::getLastrow();
        //$data = VWProyectos::Estado();
        $fecha = date("d-m-Y G:i");

        //return \PDF::loadView('fomento.proyectos.informes.pdf_informe_proyectos', ['data' => $proyectos], ['fecha' => $fecha])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-control-proyectos.pdf');
        return view ('fomento.proyectos.informes.pdf_informe_proyectos', compact('data','fecha'));
    }
}
