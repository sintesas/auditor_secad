<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VWInformeResumenPrograma extends Model
{
    protected $table = 'dbo.AUFACVW_InformeResumenPrograma';

	public $timestamps = false;

	protected $fillable = [

		'IdPrograma',
		'Consecutivo',
		'IdTipoPrograma',
		'Tipo',
		'IdAeronave',
		'Equipo',
		'IdUnidad',
		'NombreUnidad',
		'IdEmpresa',
		'NombreEmpresa',
		'Proyecto',
		'Alcance',
		'IdEstadoPrograma',
		'Estado',
		'AccionSECAD',
		'IdProductoServicio',
		'NombreProductoServicio',
		'FechaInicio',
		'FechaTermino',
		'IdPersonalJefePrograma',
		'Nombres',
		'Apellidos',
		'NombresSuplente',
		'ApellidosSuplente',
		'Anio',
	];
}
