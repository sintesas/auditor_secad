<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

use App\Models\AuditoriaProgramas;
use App\Models\Permiso;
use App\Models\vistaProgramas;

class AuditoriaProgramasController extends Controller
{
    
    
    public function index()
    {        
        $auditoriaprograma = AuditoriaProgramas::getAllFromVista();
        $p = new Permiso;
        $permiso = $p->getPermisos('CP');
        $Empresas = vistaProgramas::all(['IdPrograma', 'Consecutivo', 'Tipo', 'NombreEmpresa', 'Proyecto'])->sortBy('Consecutivo');
        $Empresas->prepend('None');
        $programasArray = $Empresas->pluck('Tipo', 'IdPrograma');
        $programasEmpresaArray = $Empresas->pluck('NombreEmpresa', 'IdPrograma');
        $programasDescripcionArray = $Empresas->pluck('Proyecto', 'IdPrograma');
        return view ('certificacion.auditoriaProgramas.ver_tablas_auditoriaPrograma')->with('auditoriaprograma', $auditoriaprograma)->with('permiso', $permiso)
        ->with('Empresas', $Empresas)->with('programasArray', $programasArray)->with('programasEmpresaArray', $programasEmpresaArray)
        ->with('programasDescripcionArray', $programasDescripcionArray);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
{
    
    $existingAuditoria = \DB::table('vw_AU_Reg_AuditoriaProgramas')
    ->where('IdPrograma', $request->input('IdPrograma'))
    ->first();

    
    if ($existingAuditoria) {
        return redirect()->route('auditoriaprograma.index')
                         ->with('error', 'Ya existe un registro creado con el No. Programa: ' . $existingAuditoria->Consecutivo);
    }
    
    $auditoriaprograma = new AuditoriaProgramas;
    $auditoriaprograma->IdPrograma = $request->input('IdPrograma');
    $auditoriaprograma->descripcion_programa = $request->input('descripcion_programa');
    $auditoriaprograma->certificado_aplicable = $request->input('certificado_aplicable');
    $auditoriaprograma->organizacion = $request->input('organizacion');
    $auditoriaprograma->save();

    

    return redirect()->route('auditoriaprograma.index')
                     ->with('success', 'Auditoría creada con éxito.');
}


    
    public function show($id)
    {
        //
    }

    
    public function edit($id_auditoriaprog)
    {
        $auditoriaprograma = AuditoriaProgramas::find($id_auditoriaprog);
    }

    
    public function update(Request $request, $id_auditoriaprog)
    {
        
        $auditoriaprograma = AuditoriaProgramas::find($request->input('id_auditoriaprog'));

        
        $auditoriaprograma->IdPrograma = $request->input('IdPrograma');
        $auditoriaprograma->descripcion_programa = $request->input('descripcion_programa');
        $auditoriaprograma->certificado_aplicable = $request->input('certificado_aplicable');
        $auditoriaprograma->organizacion = $request->input('organizacion');
        $auditoriaprograma->save();
        

        return redirect()->route('auditoriaprograma.index');
    }

    
    public function destroy($IdAeronave)
    {
           
        $aeronave = Aeronave::find($IdAeronave);
        $ip = $this->get_client_ip();
        // delete
        $aeronave->delete();

        // activity()
        //     ->performedOn($aeronave)
        //     ->withProperties($ip)
        //     ->log('Aeronave Borrada');
        
        return redirect()->route('auditoriaprograma.index');
    }
}
