<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DependenciasLDAP;

class ApiRestAllDependence extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        set_time_limit(1000);

        if($request->search_dependence != ''){
            $letra =  $request->search_dependence;
            try{
                $ldap_dn = "CN=AUDITOR PLUS,OU=Service Account,DC=FAC,DC=CO";
        
                $ldap_password = "@ud1t0RPlu4";
                
                $ldap_con = ldap_connect("172.20.101.108","389");
        
                if(ldap_bind($ldap_con, $ldap_dn, $ldap_password) or exit("Conection faild!")) {
        
                    $result = ldap_search($ldap_con,"OU=OU_Usuarios,DC=FAC,DC=CO","(physicaldeliveryofficename=$letra*)") or exit("No results found!");
                    $data = ldap_get_entries($ldap_con, $result);
                       
                    if ($data["count"] > 0)
                    {                              
                        $someArray = [];
                        $dataResult = [];
                        
                        for ($i=0; $i<$data["count"]; $i++)
                        {
                            if (in_array("physicaldeliveryofficename", $data[$i])) {                              
                                array_push($someArray, array('Dependencia'=> $data[$i]["physicaldeliveryofficename"][0]));
                            }
                        }
                        $result = array_unique($someArray, SORT_REGULAR);
                        $cantidadResult = count($result);
                        $cont = 1;
                        print('[');
                        foreach ($result as $value) {

                            $dependencia=mb_convert_encoding($value["Dependencia"], 'UTF-8', 'ISO-8859-1');
                            //Fecha Actual
                            $hoy = getdate();
                            $userExis = DependenciasLDAP::select('Nombre')
                                                        ->where('Nombre', 'like',$dependencia)
                                                        ->get();

                            if(count($userExis) == 0){
                                $user = new DependenciasLDAP;
                                $user->Nombre = $dependencia;
                                $user->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                                $user->save();
                            }

                            if($cont == $cantidadResult){
                                $cadena = "{\"Dependencia\":\"".$dependencia."\"}";
                                print ($cadena);
                            }else{
                                $cadena = "{\"Dependencia\":\"".$dependencia."\"},";
                                print ($cadena);
                            }
                            $cont++;
                        }
                        print(']');   
                          
                    }else{
                        echo "No results found!";
                    }
                } else {
                    echo "Invalid user/pass or other errors!";
                }
            }catch(Exception $ex){
                echo "Conection faild!";
            }
        }else{
            echo '[{"search_dependence":null}]';
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
