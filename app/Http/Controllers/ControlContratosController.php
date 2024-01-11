<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ControlContratos;
use App\Models\EstadoCPA;
use App\Models\UnidadMedidaCPA;
use App\Models\Bienyservicio;
use App\Models\VWcontratoanualsearch;
use App\Models\Controlcontratostotal;
use App\Models\Permiso;

class ControlContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = ControlContratos::all();

        $UnidadMedidaCPA = UnidadMedidaCPA::all();
        $UnidadMedidaCPA->prepend('None');

        $EstadoCPA = EstadoCPA::all();
        $EstadoCPA->prepend('None');

        $Bienyservicio = Bienyservicio::all();
        $Bienyservicio->prepend('None');

        $p = new Permiso;
        $permiso = $p->getPermisos('PG');
        
        return view('Normogramaycontratos.Contratos.formcontrolcontratos')
                ->with('contratos', $contratos)
                ->with('UnidadMedidaCPA', $UnidadMedidaCPA)
                ->with('EstadoCPA', $EstadoCPA)
                ->with('Bienyservicio', $Bienyservicio)
                ->with('permiso', $permiso);
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not used separately.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create object to holdd info
        $contratos = new ControlContratos;

        $contratos->Ordenador = $request->input('Ordenador');
        $contratos->BS = $request->input('SB');
        $contratos->Rubro = $request->input('Rubro');
        $contratos->Subordinal = $request->input('Subordinal');
        $contratos->DescripcionRubro = $request->input('DescripcionRubro');
        $contratos->Descripcion = $request->input('Descripcion');
        $contratos->CodigoClasificacionUNSPSC = $request->input('CodigoClasificacionUNSPSC');
        $contratos->Recurso = $request->input('Recurso');
        $contratos->UnidadMedida = $request->input('IdUnidadMedida');
        $contratos->TotalRecursosCorriente = $request->input('TotalRecursosCorriente');
        $contratos->Cantidad = $request->input('Cantidad');
        $contratos->Valor = $request->input('Valor');
        $contratos->NombreContrato = $request->input('NombreContrato');
        $contratos->NumeroContrato = $request->input('CodigoClasificacionUNSPSC');
        $contratos->Responsable = $request->input('Responsable');
        $contratos->Grupo = $request->input('Grupo');
        $contratos->Situacion = $request->input('Situacion');
        $contratos->FuncionarioDECOMEMACO = $request->input('FuncionarioDECOMEMACO');
        $contratos->MesCRP = $request->input('MesCRP');
        $contratos->MesObligacion = $request->input('MesObligacion');
        $contratos->ValorObligacion = $request->input('ValorObligacion');
        $contratos->Proveedor = $request->input('Proveedor');
        $contratos->Pagos = $request->input('Pagos');
        $contratos->NoCPA = $request->input('NoCPA');
        $contratos->FechaCPA = $request->input('FechaCPA');
        $contratos->NoCPD = $request->input('NoCPD');
        $contratos->FechaCPD = $request->input('FechaCPD');
        $contratos->NoCRP = $request->input('NoCRP');
        $contratos->FechaCRP = $request->input('FechaCRP');
        $contratos->FechaEntregaMaterial = $request->input('FechaEntregaMaterial');
        $contratos->Observaciones = $request->input('Observaciones');
        $contratos->PostVenta = $request->input('PostVenta');
        $contratos->InformesSupervisionAlDia = $request->input('InformesSupervisionAlDia');
        $contratos->Supervisor = $request->input('Supervisor');
        $contratos->PorcentajeEjecucion = $request->input('PorcentajeEjecucion');
        $contratos->PlazoEjecucion = $request->input('PlazoEjecucion');
        $contratos->EstadoCPA = $request->input('IdEstadoPCA');
        
 
        $contratos->save();

        return redirect()->route('FormularioContrato.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Vigencia)
    {
        $UnidadMedidaCPA = UnidadMedidaCPA::all();
        $UnidadMedidaCPA->prepend('None');

        $EstadoCPA = EstadoCPA::all();
        $EstadoCPA->prepend('None');

        $Bienyservicio = Bienyservicio::all();
        $Bienyservicio->prepend('None');
        $contratostotal = Controlcontratostotal::all();
    
        //
        $contratostotal = Controlcontratostotal::find($Vigencia);
        $contratos = VWcontratoanualsearch::find($Vigencia);
        return view('Normogramaycontratos.Contratos.InformeContratosA')
        ->with('contratostotal', $contratostotal)
        ->with('contratos', $contratos)
        ->with('UnidadMedidaCPA', $UnidadMedidaCPA)
        ->with('EstadoCPA', $EstadoCPA)
        ->with('Bienyservicio', $Bienyservicio);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPCA)
    {
        //$contratos = contrato::all();
        $Bienyservicio = Bienyservicio::all();
        $Bienyservicio->prepend('None');

        $UnidadMedidaCPA = UnidadMedidaCPA::all();
        $UnidadMedidaCPA->prepend('None');

        $EstadoCPA = EstadoCPA::all();
        $EstadoCPA->prepend('None');
        $contratos = ControlContratos::find($IdPCA);


        return view('Normogramaycontratos.Contratos.editar_contrato')
                ->with('contratos', $contratos)
                ->with('UnidadMedidaCPA', $UnidadMedidaCPA)
                ->with('EstadoCPA', $EstadoCPA)
                ->with('Bienyservicio', $Bienyservicio);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdPCA)
    {
        
        //$contratos = contrato::all();

        $contratos = ControlContratos::find($IdPCA);
 
        $contratos->Ordenador = $request->input('Ordenador');
        $contratos->BS = $request->input('SB');
        $contratos->Rubro = $request->input('Rubro');
        $contratos->Subordinal = $request->input('Subordinal');
        $contratos->DescripcionRubro = $request->input('DescripcionRubro');
        $contratos->Descripcion = $request->input('Descripcion');
        $contratos->CodigoClasificacionUNSPSC = $request->input('CodigoClasificacionUNSPSC');
        $contratos->Recurso = $request->input('Recurso');
        $contratos->UnidadMedida = $request->input('IdUnidadMedida');
        $contratos->TotalRecursosCorriente = $request->input('TotalRecursosCorriente');
        $contratos->Cantidad = $request->input('Cantidad');
        $contratos->Valor = $request->input('Valor');
        $contratos->NombreContrato = $request->input('NombreContrato');
        $contratos->NumeroContrato = $request->input('NumeroContrato');
        $contratos->Responsable = $request->input('Responsable');
        $contratos->Grupo = $request->input('Grupo');
        $contratos->Situacion = $request->input('Situacion');
        $contratos->FuncionarioDECOMEMACO = $request->input('FuncionarioDECOMEMACO');
        $contratos->MesCRP = $request->input('MesCRP');
        $contratos->MesObligacion = $request->input('MesObligacion');
        $contratos->ValorObligacion = $request->input('ValorObligacion');
        $contratos->Proveedor = $request->input('Proveedor');
        $contratos->Pagos = $request->input('Pagos');
        $contratos->NoCPA = $request->input('NoCPA');
        $contratos->FechaCPA = $request->input('FechaCPA');
        $contratos->NoCPD = $request->input('NoCPD');
        $contratos->FechaCPD = $request->input('FechaCPD');
        $contratos->NoCRP = $request->input('NoCRP');
        $contratos->FechaCRP = $request->input('FechaCRP');
        $contratos->FechaEntregaMaterial = $request->input('FechaEntregaMaterial');
        $contratos->Observaciones = $request->input('Observaciones');
        $contratos->PostVenta = $request->input('PostVenta');
        $contratos->InformesSupervisionAlDia = $request->input('InformesSupervisionAlDia');
        $contratos->Supervisor = $request->input('Supervisor');
        $contratos->PorcentajeEjecucion = $request->input('PorcentajeEjecucion');
        $contratos->PlazoEjecucion = $request->input('PlazoEjecucion');
        $contratos->EstadoCPA = $request->input('IdEstadoPCA');             
 
        $contratos->save();

        return redirect()->route('FormularioContrato.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdPCA)
    {
        $contratos = ControlContratos::find($IdPCA);
        $contratos->delete();
        return redirect()->route('FormularioContrato.index');
    }
}
