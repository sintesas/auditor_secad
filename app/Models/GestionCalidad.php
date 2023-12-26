<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestionCalidad extends Model
{
    
    protected $table = 'AU_Reg_GestionCalidad';

    protected $primaryKey = 'IdGestionCalidad';

    public $timestamps = false;

    protected $fillable = [
    	'IdEmpresa',
    	'SGCImplementado',
    	'SGCFaseEjecucion',
    	'ManualCalidadProcedimientos',
    	'ProcedimientoControlDocumentos',
    	'ProcesoFabricacionServicios',
    	'EspecificacionesCliente',
    	'TrazabilidadProductos',
    	'ProcedimientoEscritoInspecciones',
    	'ProcedimientoProductoNoConforme',
    	'ProcedimientoAccionesCorrectivas',
    	'PlanCalibracionEquipos',
    	'SistemasCertificacion',
    	'Activo',
    ];


}
