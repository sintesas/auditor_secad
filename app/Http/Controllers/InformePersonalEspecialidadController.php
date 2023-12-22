<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Especialidades;
use App\Models\VWPersonal;

class InformePersonalEspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidades::where('dbo.AU_Mst_EspecialidadesPersonal.Idcuerpo','=', '2');
        return view ('gestionRecursos.recursoHumano.informes.ver_informe_personal_especialidad')
                ->with('especialidades', $especialidades);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($IdEspecialidad)
    {
        $personal = VWPersonal::where('IdEspecialidad','=', $IdEspecialidad)->get();

        return view ('gestionRecursos.recursoHumano.informes.visual_informe_personal_especialidad')
                ->with('personal', $personal);
    }

    public function edit($id)
    {
        $personal = VWPersonal::where('IdEspecialidad','=', $IdEspecialidad)->get();

        return \PDF::loadView('gestionRecursos.recursoHumano.informes.pdf_informe_personal_especialidad', ['personal' => $personal])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        //
    }
}
