<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personal;
use App\Models\VWPersonal;
use App\Models\CursosPersonal;
use App\Models\Familiares;
use App\Models\Permiso;

class InformeHojaDeVidaController extends Controller
{
    public function index()
    {
        $personal = Personal::getPersonalWithRango();
        $p = new Permiso;
        $permiso = $p->getPermisos('GR');
        return view ('gestionRecursos.recursoHumano.informes.ver_informe_hoja_vida')
                ->with('personal', $personal)->with('permiso', $permiso);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($IdPersonal)
    {
        $personal = VWPersonal::where('IdPersonal','=',$IdPersonal)->get();
        // dd($personal);
        return view ('gestionRecursos.recursoHumano.informes.visual_informe_hoja_vida')
                ->with('personal', $personal);
    }


    public function edit($IdPersonal)
    {
        $personal = VWPersonal::where('IdPersonal','=',$IdPersonal)->get()->first();
        $cursos = CursosPersonal::CursosPersonal($IdPersonal);
        $familiares = Familiares::familiaresPersonal($IdPersonal);

        // return view ('gestionRecursos.recursoHumano.informes.pdf_informe_hoja_vida')
        //         ->with('familiares', $familiares)
        //         ->with('personal', $personal)
        //         ->with('cursos', $cursos);

        return \PDF::loadView('gestionRecursos.recursoHumano.informes.pdf_informe_hoja_vida', 
                                ['personal' => $personal,
                                'cursos' => $cursos,
                                'familiares' => $familiares]
                                )
                    ->setOption('disable-smart-shrinking', false)
                    ->setOption('margin-top', '25mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '280')
                    ->setOption('page-height', '380')
                    ->download('hoja_de_vida.pdf');

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
