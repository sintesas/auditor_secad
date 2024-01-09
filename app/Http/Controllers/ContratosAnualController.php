<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VWcontratoanual;
use App\Models\VWcontratoanualsearch;
use App\Models\Permiso;

class ContratosAnualController extends Controller
{
    public function index()
    {
        $contrat = VWcontratoanual::all();
        $p = new Permiso;
        $permiso = $p->getPermisos('PG');
        return view('Normogramaycontratos.Contratos.ver_informe_contratoAnual')
                ->with('contrat', $contrat)->with('permiso', $permiso);
    }

    public function show($Vigencia)
    {
        //
        $contratos = VWcontratoanualsearch::find($Vigencia);
        return view('Normogramaycontratos.Contratos.formcontrolcontratosA')
            ->with('contratos', $contratos);
    }
}
