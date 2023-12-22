<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OfertasSectorAeronautico;
use App\Models\Empresa;

class InformeEmpresasXSectorController extends Controller
{
    public function index()
    {
        $OfertaSectorAeronautico = OfertasSectorAeronautico::all();
        return view ('fomento.sectorAeronautico.informes.ver_informe_empresas_sector')
                    ->with('OfertaSectorAeronautico', $OfertaSectorAeronautico);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdSector)
    {
        
        $empresas = Empresa::empresasBySector($IdSector);
        $count = Empresa::empresasBySector($IdSector)->count();
        $sectoraeronautico = OfertasSectorAeronautico::find($IdSector);

        return view ('fomento.sectorAeronautico.informes.visual_informe_empresas_sector')
                    ->with('empresas', $empresas)
                    ->with('count', $count)
                    ->with('sectoraeronautico', $sectoraeronautico);
    }

   
    public function edit($IdSector)
    {
        $empresas = Empresa::empresasBySector($IdSector);
        $count = Empresa::empresasBySector($IdSector)->count();
        $sectoraeronautico = OfertasSectorAeronautico::find($IdSector);

        return \PDF::loadView('fomento.sectorAeronautico.informes.pdf_informe_empresas_sector', 
            ['empresas' => $empresas,
            'count' => $count,
            'sectoraeronautico' => $sectoraeronautico
            ])
            ->setOption('disable-smart-shrinking', false)
            ->setOption('margin-top', '25mm')
            ->setOption('lowquality', false)
            ->setOption('page-size', 'A4')
            ->setOption('footer-center',utf8_decode(date('\ d/m/Y\ \ ').'     Página [page] de [topage] '))
            ->download('informe-inspeccion-empresas.pdf');
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
