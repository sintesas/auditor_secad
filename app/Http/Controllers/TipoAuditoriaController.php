<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TipoAuditoria;
use App\Models\UsersLDAP;
use App\Models\Permiso;

class TipoAuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = UsersLDAP::perteneceIGEFA();
        
        $tipoAuds = TipoAuditoria::all();
        
        $p = new Permiso;
        $permiso = $p->getPermisos('RE');
        return view ('auditoria.ver_tipo_auditoria')
                    ->with('tipoAuds', $tipoAuds)
                    ->with('rol', $rol)
                    ->with('permiso', $permiso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // make an object to catch the input
       $tipoAud = new TipoAuditoria;
       // store info
       $tipoAud->TipoAuditoria = $request->input('TipoAuditoria');
       $tipoAud->Activo = 1;
       $tipoAud->save();
       return redirect()->route('tipoAuditoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdTipoAuditoria)
    {
        $tipoAudi = TipoAuditoria::find($IdTipoAuditoria);
        return view('auditoria.editar_tipo_auditoria')->withTipoAuditoria($tipoAudi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdTipoAuditoria)
    {
        // bring one record using id or something
       $tipoAud = TipoAuditoria::find($IdTipoAuditoria);

       $tipoAud->TipoAuditoria = $request->input('TipoAuditoria');
       $tipoAud->save();

       return redirect()->route('tipoAuditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdTipoAuditoria)
    {
        //Validar si tiene auditoiras asociadas
        $existTipoAuditoria = \DB::table('AU_Reg_Auditorias')->where('IdTipoAuditoria', $IdTipoAuditoria)->first();
        if(!$existTipoAuditoria){
            // USING MODELS
            $tipoAud = TipoAuditoria::find($IdTipoAuditoria);
            $tipoAud->delete();

            $notification = array(
              'message' => 'Tipo Auditoria eliminada correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
                'message' => 'No se puede eliminar este tipo de auditoria ya que contiene datos asociados.',
                'alert-type' => 'warning'
          );
        }
        return redirect()->route('tipoAuditoria.index')->with($notification);
    }
}
