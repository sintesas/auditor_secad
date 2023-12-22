<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\ActividadesEconomicas;

class ActividadesEconomicasController extends Controller
{
    public function __Construct(){

		$this->middleware('auth');

	}

	public function index(){
	}

	public function ClassSections(){
		$resultSection = ActividadesEconomicas::
		select('Division', 'Descripcion')
			->where('Division', 'LIKE', "%".utf8_encode('SECCION').'%')
			->get();

		$buildSection = array();
		foreach(json_decode($resultSection) AS $value){
			$buildSection[$value->Division]=$value->Descripcion;
		}

		$resultClass = ActividadesEconomicas::
		select('IdActividadEconomica', 'Clase', 'Descripcion')
			->where('Clase', 'LIKE', '%[0-9]%')
			->get();

		$buildMergeGroupClass = array();
		foreach (range('A', 'U') AS $word) {
			switch($word){
				case 'R':
				case 'T':
					$buildMergeGroupClass[$buildSection[utf8_encode('SECCION '.$word.' ')]] = array();
					break;
				default:
					$buildMergeGroupClass[$buildSection[utf8_encode('SECCION '.$word.'')]] = array();
					break;
			}
		}
		foreach(json_decode($resultClass) AS $value){
			switch (substr($value->Clase,0,2)) {
					case '01':
					case '02':
					case '03':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION A')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
						break;
						case '05':
						case '06':
						case '07':
						case '08':
						case '09':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION B')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '10':
						case '11':
						case '12':
						case '13':
						case '14':
						case '15':
						case '16':
						case '17':
						case '18':
						case '19':
						case '20':
						case '21':
						case '22':
						case '23':
						case '24':
						case '25':
						case '26':
						case '27':
						case '28':
						case '29':
						case '30':
						case '31':
						case '32':
						case '33':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION C')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '35':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION D')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '36':
						case '37':
						case '38':
						case '39':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION E')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '41':
						case '42':
						case '43':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION F')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '45':
						case '46':
						case '47':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION G')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '49':
						case '50':
						case '51':
						case '52':
						case '53':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION H')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '55':
						case '56':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION I')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '58':
						case '59':
						case '60':
						case '61':
						case '62':
						case '63':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION J')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '64':
						case '65':
						case '66':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION K')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '68':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION L')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '69':
						case '70':
						case '71':
						case '72':
						case '73':
						case '74':
						case '75':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION M')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '77':
						case '78':
						case '79':
						case '80':
						case '81':
						case '82':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION N')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '84':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION O')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '85':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION P')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '86':
						case '87':
						case '88':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION Q')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '90':
						case '91':
						case '92':
						case '93':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION R ')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '94':
						case '95':
						case '96':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION S')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '97':
						case '98':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION T ')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
						case '99':
							$buildMergeGroupClass[$buildSection[utf8_encode('SECCION U')]] += array($value->IdActividadEconomica => $value->Clase . ' ' . $value->Descripcion);
							break;
			}
		}

		return $buildMergeGroupClass;
	}

	public function DivisionSections(){
		$resultSection = ActividadesEconomicas::
		select('Division', 'Descripcion')
			->where('Division', 'LIKE', "%".utf8_encode('SECCION').'%')
			->get();

		$buildSection = array();
		foreach(json_decode($resultSection) AS $value){
			$buildSection[$value->Division]=$value->Descripcion;
		}

		$resultDivision = ActividadesEconomicas::
		select('Division', 'Descripcion')
			->where('Division', 'LIKE', '%[0-9]%')
			->get();

		$buildDivision = array();
		foreach (range('A', 'U') AS $word) {
			switch($word){
				case 'R':
				case 'T':
					$buildDivision[$buildSection[utf8_encode('SECCION '.$word.' ')]] = array();
					break;
				default:
					$buildDivision[$buildSection[utf8_encode('SECCION '.$word.'')]] = array();
					break;
			}
		}
		foreach(json_decode($resultDivision) AS $value){
					switch($value->Division) {
						case '01':
						case '02':
						case '03':
							$buildDivision[$buildSection[utf8_encode('SECCION A')]] += array($value->Division => $value->Descripcion);
							break;
						case '05':
						case '06':
						case '07':
						case '08':
						case '09':
							$buildDivision[$buildSection[utf8_encode('SECCION B')]] += array($value->Division => $value->Descripcion);
							break;
						case '10':
						case '11':
						case '12':
						case '13':
						case '14':
						case '15':
						case '16':
						case '17':
						case '18':
						case '19':
						case '20':
						case '21':
						case '22':
						case '23':
						case '24':
						case '25':
						case '26':
						case '27':
						case '28':
						case '29':
						case '30':
						case '31':
						case '32':
						case '33':
							$buildDivision[$buildSection[utf8_encode('SECCION C')]] += array($value->Division => $value->Descripcion);
							break;
						case '35':
							$buildDivision[$buildSection[utf8_encode('SECCION D')]] += array($value->Division => $value->Descripcion);
							break;
						case '36':
						case '37':
						case '38':
						case '39':
							$buildDivision[$buildSection[utf8_encode('SECCION E')]] += array($value->Division => $value->Descripcion);
							break;
						case '41':
						case '42':
						case '43':
							$buildDivision[$buildSection[utf8_encode('SECCION F')]] += array($value->Division => $value->Descripcion);
							break;
						case '45':
						case '46':
						case '47':
							$buildDivision[$buildSection[utf8_encode('SECCION G')]] += array($value->Division => $value->Descripcion);
							break;
						case '49':
						case '50':
						case '51':
						case '52':
						case '53':
							$buildDivision[$buildSection[utf8_encode('SECCION H')]] += array($value->Division => $value->Descripcion);
							break;
						case '55':
						case '56':
							$buildDivision[$buildSection[utf8_encode('SECCION I')]] += array($value->Division => $value->Descripcion);
							break;
						case '58':
						case '59':
						case '60':
						case '61':
						case '62':
						case '63':
							$buildDivision[$buildSection[utf8_encode('SECCION J')]] += array($value->Division => $value->Descripcion);
							break;
						case '64':
						case '65':
						case '66':
							$buildDivision[$buildSection[utf8_encode('SECCION K')]] += array($value->Division => $value->Descripcion);
							break;
						case '68':
							$buildDivision[$buildSection[utf8_encode('SECCION L')]] += array($value->Division => $value->Descripcion);
							break;
						case '69':
						case '70':
						case '71':
						case '72':
						case '73':
						case '74':
						case '75':
							$buildDivision[$buildSection[utf8_encode('SECCION M')]] += array($value->Division => $value->Descripcion);
							break;
						case '77':
						case '78':
						case '79':
						case '80':
						case '81':
						case '82':
							$buildDivision[$buildSection[utf8_encode('SECCION N')]] += array($value->Division => $value->Descripcion);
							break;
						case '84':
							$buildDivision[$buildSection[utf8_encode('SECCION O')]] += array($value->Division => $value->Descripcion);
							break;
						case '85':
							$buildDivision[$buildSection[utf8_encode('SECCION P')]] += array($value->Division => $value->Descripcion);
							break;
						case '86':
						case '87':
						case '88':
							$buildDivision[$buildSection[utf8_encode('SECCION Q')]] += array($value->Division => $value->Descripcion);
							break;
						case '90':
						case '91':
						case '92':
						case '93':
							$buildDivision[$buildSection[utf8_encode('SECCION R ')]] += array($value->Division => $value->Descripcion);
							break;
						case '94':
						case '95':
						case '96':
							$buildDivision[$buildSection[utf8_encode('SECCION S')]] += array($value->Division => $value->Descripcion);
							break;
						case '97':
						case '98':
							$buildDivision[$buildSection[utf8_encode('SECCION T ')]] += array($value->Division => $value->Descripcion);
							break;
						case '99':
							$buildDivision[$buildSection[utf8_encode('SECCION U')]] += array($value->Division => $value->Descripcion);
							break;
					}
		}

		return $buildDivision;
	}

	public function GroupSections(){
		$resultSection = ActividadesEconomicas::
		select('Division', 'Descripcion')
			->where('Division', 'LIKE', "%".utf8_encode('SECCION').'%')
			->get();

		$buildSection = array();
		foreach(json_decode($resultSection) AS $value){
			$buildSection[$value->Division]=$value->Descripcion;
		}

		$resultGroup = ActividadesEconomicas::
		select('Grupo', 'Descripcion')
			->where('Grupo', 'LIKE', '%[0-9]%')
			->get();

		$buildMergeDivisionGroup = array();
		foreach (range('A', 'U') AS $word) {
			switch($word){
				case 'R':
				case 'T':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION '.$word.' ')]] = array();
					break;
				default:
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION '.$word.'')]] = array();
					break;
			}
		}
		foreach(json_decode($resultGroup) AS $value){
			switch (substr($value->Grupo,0,2)) {
				case '01':
				case '02':
				case '03':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION A')]] += array($value->Grupo => $value->Descripcion);
					break;
				case '05':
				case '06':
				case '07':
				case '08':
				case '09':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION B')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '10':
				case '11':
				case '12':
				case '13':
				case '14':
				case '15':
				case '16':
				case '17':
				case '18':
				case '19':
				case '20':
				case '21':
				case '22':
				case '23':
				case '24':
				case '25':
				case '26':
				case '27':
				case '28':
				case '29':
				case '30':
				case '31':
				case '32':
				case '33':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION C')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '35':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION D')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '36':
				case '37':
				case '38':
				case '39':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION E')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '41':
				case '42':
				case '43':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION F')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '45':
				case '46':
				case '47':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION G')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '49':
				case '50':
				case '51':
				case '52':
				case '53':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION H')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '55':
				case '56':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION I')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '58':
				case '59':
				case '60':
				case '61':
				case '62':
				case '63':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION J')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '64':
				case '65':
				case '66':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION K')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '68':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION L')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '69':
				case '70':
				case '71':
				case '72':
				case '73':
				case '74':
				case '75':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION M')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '77':
				case '78':
				case '79':
				case '80':
				case '81':
				case '82':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION N')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '84':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION O')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '85':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION P')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '86':
				case '87':
				case '88':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION Q')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '90':
				case '91':
				case '92':
				case '93':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION R ')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '94':
				case '95':
				case '96':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION S')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '97':
				case '98':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION T ')]] += array($value->Grupo=>$value->Descripcion);
					break;
				case '99':
					$buildMergeDivisionGroup[$buildSection[utf8_encode('SECCION U')]] += array($value->Grupo=>$value->Descripcion);
					break;
			}
		}

		return $buildMergeDivisionGroup;
	}
}
