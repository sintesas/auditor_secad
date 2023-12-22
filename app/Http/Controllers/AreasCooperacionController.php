<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\SubAreasCooperacionIndustrial;

class AreasCooperacionController extends Controller
{
    public function __Construct(){

		$this->middleware('auth');

	}
    
	public function index(){
	}

	public function searchSubArea()
	{
		$area       = trim(\request('area'));
		$results = SubAreasCooperacionIndustrial::where('idAreasCooperacionIndustrial', '=', '' . $area . '')->distinct()->get();

		return \Response::json($results);
	}
}
